<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function dashboard_index () {
        return view('backend.dashboard');
    }

    function page_settings() {
        return view('backend.page-settings');
    }


    function site_settings () {
        return view ('backend.site-settings');
    }
}
