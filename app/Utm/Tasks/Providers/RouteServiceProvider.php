<?php

namespace App\Utm\Tasks\Providers;

use App\Utm\Common\Traits\RouteServiceProviderTrait;
use App\Utm\Tasks\Models\Task;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 * @package App\Utm\Tasks\Providers
 */
class RouteServiceProvider extends ServiceProvider
{
    use RouteServiceProviderTrait;

    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Utm\Tasks\Controllers';

    /**
     * @var string
     */
    protected $routePath = 'Utm\Tasks\Routes';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('task', function ($value) {
            return Task::withTrashed()->find($value);
        });

        parent::boot();
    }
}
