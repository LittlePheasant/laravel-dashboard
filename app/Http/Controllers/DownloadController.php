<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Download;

class DownloadController extends Controller
{
    function __construct() {
        $this->download = new Download;
    }

    public function downloads_list() {
        $downloads = $this->download->getDownloadsList();

        return view('file.download', compact('downloads'));
    }
}
