<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'user_tbl';
    protected $primaryKey = 'user_id';

    public function getUserInfoList() {
        return $this->all();
    }

    public function getUserLists() {
        return $this->paginate(5);
    }

    public function getuserInfoByID($id){

        // Retrieve user information based on the provided $id
        return $this->find($id);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

}
