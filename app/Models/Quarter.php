<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ActualReport;

class Quarter extends Model
{
    use HasFactory;

    protected $table = 'quarter_desc_table';
    protected $primaryKey = 'quarter_id';

    public function actualreports()
    {
        return $this->hasMany(ActualReport::class);
    }

    public function getQuarterList() {
        return $this->all();
    }
}
