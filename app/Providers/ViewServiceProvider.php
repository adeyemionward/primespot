<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use App\Models\Company;
use App\Models\User;
use App\Models\SiteSetting;
use App\Models\JobLocation;
use App\Models\ExpenseCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function ($view) {
            // Calculate remaining days or retrieve from database
        

        });
    }
}
