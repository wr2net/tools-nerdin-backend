<?php

namespace App\Utm\Users\Providers;

use App\Utm\Common\Traits\RouteServiceProviderTrait;
use App\Utm\Users\Models\User;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Class RouteServiceProvider
 * @package App\Utm\Users\Providers
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
    protected $namespace = 'App\Utm\Users\Controllers';

    /**
     * @var string
     */
    protected $routePath = 'Utm\Users\Routes';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('user', function ($value) {
            return User::withTrashed()->find($value);
        });

        parent::boot();
    }
}
