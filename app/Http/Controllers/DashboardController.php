<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function showDashboard() {
        $data = [];

        return view('pages.dashboard', $data);
    }

}
