<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\support\Facades\Schema;
use App\Request;
use App\RequestApproval;
use App\Observers\RequestObserver;
use App\Observers\RequestApprovalObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        Request::observe(RequestObserver::class);
        RequestApproval::observe(RequestApprovalObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
