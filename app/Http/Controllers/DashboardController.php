<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $updatedData = [
            ['id' => 1, 'name' => 'Updated Brand 1'],
            ['id' => 2, 'name' => 'Updated Brand 2'],
            // Add more records as needed
        ];
        // dd($request->all());
        DB::table('page_settings')->update([
            // 'key' => $request->keys(),
            // 'status' => $request->values(),
        ]);
        return redirect()->route('settings.page')->withToastSuccess('Saved');
    }


    function site_settings () {
        return view ('backend.site-settings');
    }
}
