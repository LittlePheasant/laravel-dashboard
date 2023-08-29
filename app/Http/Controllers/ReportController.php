<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    function __construct() {
        $this->report = new Report;
    }

    public function show($id){

        $report = Report::with('user')->find($id);
        
        return view('reports.show', compact('report'));
    }

    public function accomplishments_reports(Request $request) {

        $reports = Report::with('user:user_id,campus_name')->paginate(5);

        $headers = view('report.show')->render();

        return response()->json(['headers' => $headers, 'report' => $reports]);
    }

    
}
