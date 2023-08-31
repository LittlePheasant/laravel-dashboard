<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller
{
    public function store (Request $request) {

        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;

            $file->storeAs('files/tmp/' . $folder, $filename);  //store temporary file in storage/app/files/tmp directory

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename
            ]);

            Session::push('folder', $folder); // Save session folder
            Session::push('filename', $filename); // Save session filename

            return $filename;
        }

        return 'failed';
    }

    public function destroy(Request $request)
    {
        //check data from TemporaryFile
        $db = TemporaryFile::where('filename', $request->filename)->first();

        if($db){

            $folder = $db->folder;
            $filename = $db->filename;

            $path = storage_path('app'. DIRECTORY_SEPARATOR .'files' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $filename);
            if (File::exists($path)) {
                File::delete($path);
                rmdir(storage_path('app'. DIRECTORY_SEPARATOR . 'files' . DIRECTORY_SEPARATOR . 'tmp' . DIRECTORY_SEPARATOR . $folder));

                //delete record in table TemporaryFile
                TemporaryFile::where([
                    'folder' =>  $db->folder,
                    'filename' => $db->filename
                ])->delete();

                return 'deleted';
            }

            else {
                return 'failed';
            }
        }

        return 'not found';
    }
}
