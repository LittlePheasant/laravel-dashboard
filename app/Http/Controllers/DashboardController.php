<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\User;
use App\Models\Program;
use App\Models\ActualReport;

class DashboardController extends Controller
{
    function __construct() {
        $this->report = new Report;
        $this->user = new User;
        $this->program = new Program;
        $this->actualreport = new ActualReport;
    }

    public function index() {

        $user_length = count($this->user->getUserInfoList());

        $program_length = count($this->program->getProgramList());

        $report_length = count($this->report->getAccReportList());

        $actualreport_length = count($this->actualreport->getActualReportList());

        return view('components.dashboard', compact( 'user_length', 'program_length', 'report_length', 'actualreport_length'));
    }
    
    
}
