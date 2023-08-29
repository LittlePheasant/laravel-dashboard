<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ActualReport;

class Particular extends Model
{
    use HasFactory;
    protected $table = 'particulars_tbl';
    protected $primaryKey = 'particulars_id';

    public function actualreports()
    {
        return $this->hasMany(ActualReport::class);
    }

    public function getParticularList() {
        return $this->all();
    }
}
