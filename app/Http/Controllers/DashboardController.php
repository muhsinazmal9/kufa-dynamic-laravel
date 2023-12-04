<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PageSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function dashboard_index () {
        return view('backend.dashboard');
    }

    function page_settings(Request $request) {
        return view('backend.page-settings');
    }

    function page_settings_update(Request $request) {
        // return $request->all();
        $pageSettings = PageSettings::all();

        foreach ($pageSettings as $setting) {
            $key = $setting->key;

            $isChecked = $request->has($key);

            $setting->update([
                'status' => $isChecked
            ]);
        }

        return redirect()->route('settings.page')->withToastSuccess('Saved');
    }


    function site_settings () {
        return view ('backend.site-settings');
    }
}
