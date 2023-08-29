<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    use HasFactory;

    protected $table = 'downloadable_files_tbl';
    protected $primaryKey = 'df_id';

    protected $guarded = ['df_id'];

    public function getDownloadsList() {
        return $this->all();
    }
}
