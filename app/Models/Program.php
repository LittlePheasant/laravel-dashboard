<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Report;
use App\Models\User;

class Program extends Model
{
    use HasFactory;

    protected $table = 'college_programs_tbl';
    protected $primaryKey = 'program_id';

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function getProgramList() {
        return $this->all();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
