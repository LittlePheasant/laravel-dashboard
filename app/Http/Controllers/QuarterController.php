<?php

namespace App\Http\Controllers;
use App\Models\Quarter;

use Illuminate\Http\Request;

class QuarterController extends Controller
{
    function __construct() {
        $this->quarter = new Quarter;
    }
}
