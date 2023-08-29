<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Particular;

class ParticularController extends Controller
{
    function __construct() {
        $this->particular = new Particular;
    }
}
