<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
        Blade::directive('currency', function ($expression) {
            return "Rp. <?= number_format($expression,0,',','.'); ?>";
        });

        Blade::directive('rating', function ($rating) {
            return "<?= number_format((float)$rating, 2); ?>";
        });

        
        Gate::define('pemilik', function(User $user){
            return $user->rule === 'Pemilik';
        });

        Gate::define('customer', function(User $user){
            return $user->rule === 'Customer';
        });
    }
}
