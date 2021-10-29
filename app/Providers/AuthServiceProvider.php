<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Stores\Store'                   => 'App\Policies\Stores\StorePolicy',
        'App\Models\Brands\Brand'                   => 'App\Policies\Brands\BrandPolicy',
        'App\Models\Categories\Category'            => 'App\Policies\Categories\CategoryPolicy',
        'App\Models\Categories\InternalExternal'    => 'App\Policies\Categories\InternalExternalPolicy',
        'App\Models\Products\Product'               => 'App\Policies\Products\ProductPolicy',
        'App\Models\Prices\Price'                   => 'App\Policies\Prices\PricePolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
