<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PortfolioCategoryController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestimonialController;

Route::group(['middleware' => 'web'], function(){

    // Frontend Routes
    Route::group(['controller' => FrontendController::class], function(){
        Route::get('/', 'index');
        Route::get('portfolio/{portfolio:id}', 'single_portfolio_item')->name('portfolio.single');
    });

    // Backend Routes
    Route::group(['middleware' => ['auth', 'verified'] , 'prefix' => 'admin' ], function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboard_index'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::match(['put', 'patch'], '/profile/{user:id}', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // settings
        Route::get('page-settings', [DashboardController::class, 'page_settings'])->name('settings.page');
        Route::get('settings', [DashboardController::class, 'site_settings'])->name('settings.site');

        // Resources
        Route::resources([
            'brands' => BrandController::class,
            'portfolio-categories' => PortfolioCategoryController::class,
            'portfolios' => PortfolioController::class,
            'services' => ServiceController::class,
            'testimonials' => TestimonialController::class,
        ]);
    });
});

require __DIR__.'/auth.php';
