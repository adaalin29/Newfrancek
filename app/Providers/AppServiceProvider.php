<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Service;
use App\Salon;
use View;

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

        $this->loadHelpers(); // adaugi linia asta, si functia de mai jos
        // $salons = Salon::get();
        // $servicesForm = Service::get();
        // // dd($salons);


        // View::share('servicesForm',$servicesForm);
        // View::share('salons',$salons);
        View::composer(
        'parts.template','App\Http\View\Composers\MetaComposer'
        );
    }

    protected function loadHelpers()
    {
        foreach (glob(app_path('Helpers/*.php')) as $filename) {
            require_once $filename;
        }
    }
}
