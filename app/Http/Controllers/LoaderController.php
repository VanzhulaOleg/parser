<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Services\ServiceParser;

ini_set("max_execution_time", 0);

class LoaderController extends Controller
{
    public function index()
    {
        $pars = new ServiceParser();
        $pars->index();
    }
}

