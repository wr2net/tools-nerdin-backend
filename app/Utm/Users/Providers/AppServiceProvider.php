<?php

namespace App\Utm\Users\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Utm\Users\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Utm\Users\Models\Repositories\UserRepositoryInterface',
            'App\Utm\Users\Models\Repositories\UserRepository'
        );
    }
}
