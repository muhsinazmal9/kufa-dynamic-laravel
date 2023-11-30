<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Models\GeneralSettings;
use App\Models\PortfolioCategory;

class FrontendController extends Controller
{
    function index() {
        // storing stuffs in $data
        $data = [
            'brands' => Brand::all(),
            'services' => Service::latest()->get(),
            'portfolio_items' => Portfolio::latest()->get(),
        ];

        return view('frontend.index' , $data);
    }


    function single_portfolio_item(Portfolio $portfolio) {
        $data['item'] = $portfolio;
        $data['item']['category'] = PortfolioCategory::findOrFail($portfolio->category_id);
        return view('frontend.portfolio.single', $data);
    }
}
