<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{

    public function showDashboard() {
        //echo "<pre>";print_r(Session::all());
        
        $data = [];

        return view('pages.dashboard', $data);
    }

}
