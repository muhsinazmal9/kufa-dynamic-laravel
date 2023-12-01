<?php

namespace App\Providers;

use App\Models\PageSettings;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // paginator ui
        Paginator::useBootstrap();

        // page Settings Stuffs

        // --------------- if I want to want cache  ---------------- \\
        // $pageSettings = cache()->remember(
        //     'pageSettings',
        //     3600,
        //     fn() => PageSettings::all()->keyBy('key')
        // );

        // ----------- otherwise -------------------- \\
        $pageSettings = PageSettings::all()->keyBy('key');

        // user first details
        $firstUser = User::firstOrFail();

        // global var set
        view()->share([
            'pageSettings' => $pageSettings,
            'user' => $firstUser
        ]);
    }
}
