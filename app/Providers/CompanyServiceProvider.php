<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Company;
class CompanyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {  //get the company_id, such that it can be passed accross all controllers.
        //this is to avoid pasing same code base to all controllers.
        $this->app->bind('company_id', function () {
            $subdomain = explode('.', request()->getHost())[0];
            $company_details = Company::where('subdomain', $subdomain)->first();
            return $company_details ? $company_details->id : null;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
