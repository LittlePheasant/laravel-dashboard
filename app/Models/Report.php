<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Program;

class Report extends Model
{
    use HasFactory;
    protected $table = 'monthlyreport_tbl';
    protected $primaryKey = 'entry_id';

    protected $guarded = ['entry_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAccReportList() {
        return $this->paginate(5);
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
