<?php

namespace App\Providers;

use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Exception;
use Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // ADDED TO TAKEN CSS NOT LOADING IN HTTPS
        if (env('APP_ENV') === 'local') {
			if (request()->server('HTTP_X_FORWARDED_PROTO') === 'https') {
				URL::forceScheme('https');
			}
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        Schema::defaultStringLength(191);
        try {
            if (Schema::hasTable('themes')) {
                $themes = Theme::where('is_active', 1)->oldest()->get();
                view()->share('themes', $themes);
            }
        } catch (Exception $e) {
            // Log the exception
            Log::error('An error occurred while retrieving themes: ' . $e->getMessage());

            // Optionally, you can throw or re-throw the exception
            // throw $e;
        }
    }
}