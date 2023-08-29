<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Particular;
use App\Models\Quarter;

class ActualReport extends Model
{
    use HasFactory;
    protected $table = 'actualreportbytotal_tbl';
    protected $primaryKey = 'actual_id';

    protected $guarded = ['actual_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getActualReportList() {
        return $this->all();
    }

    public function particular()
    {
        return $this->belongsTo(Particular::class, 'particular_id');
    }

    public function quarter()
    {
        return $this->belongsTo(Quarter::class, 'quarter_id');
    }
}
