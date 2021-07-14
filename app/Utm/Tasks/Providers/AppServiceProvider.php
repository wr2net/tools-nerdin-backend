<?php

namespace App\Utm\Tasks\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider
 * @package App\Utm\Tasks\Providers
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
            'App\Utm\Tasks\Models\Repositories\TaskRepositoryInterface',
            'App\Utm\Tasks\Models\Repositories\TaskRepository'
        );
    }
}
