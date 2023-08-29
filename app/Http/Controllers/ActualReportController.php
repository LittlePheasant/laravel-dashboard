<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActualReport;

class ActualReportController extends Controller
{

    function __construct() {
        $this->actualreport = new ActualReport;
    }

    public function actual_reports() {

        $actualReports = ActualReport::with('particular:particulars_id,particulars', 'quarter:quarter_id,duration_period', 'user:user_id,name')->get();

        $reports = [];

        $actualReports->each(function($item) use (&$reports) {
            $particular_id = $item->particular_id;
            $quarter_id = $item->quarter_id;
            $user_id = $item->user_id;

            // Find the corresponding count value for this particular and quarter
            $count = ActualReport::where('particular_id', $particular_id)
                            ->where('quarter_id', $quarter_id)
                            ->where('user_id', $user_id)
                            ->first()
                            ->count;

            if (!isset($reports[$particular_id])) {
                $reports[$particular_id] = [];
            }
        
            if (!isset($reports[$particular_id][$quarter_id])) {
                $reports[$particular_id][$quarter_id] = [];
            }
                        
            // Store the count value in the reports array
            $reports[$particular_id][$quarter_id][$user_id] = [
                'count' => $count
            ];
        });

        // dd($reports);
        
        return view('report.actual_report', compact('reports'));
    }


}
