<?php

namespace App\Providers;


use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use ConsoleTVs\Charts\Registrar as Charts;
use Illuminate\Support\Facades\URL;

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
    public function boot(Charts $charts)
    {
        if(env('APP_ENV') === 'production'){
            URL::forceScheme('https');
        }
        
        Paginator::useBootstrap();
       
    }

    // public function paginate()
    // {
    //     //
       
    // }
  
}
