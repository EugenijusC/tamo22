<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;


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
        Paginator::useBootstrap();
        $this->activeLinks();
        //


    }
    public function activeLinks(){
        View::composer('layout', function($view) {
            $view->with('mainLink', (request()->is('start') or request()->is('admin') ) ? 'active':'');
            $view->with('rezLink', (request()->is('rezults') or request()->is('rezults/*')) ? 'active':'');
            $view->with('contactLink', request()->is('contacts') ? 'active':'');
        });       
        View::composer('user.testas_smulkiai', function($view) {
            $view->with('mainLink', request()->is('start') ? 'active':'');
            $view->with('rezLink', (request()->is('rezults') or request()->is('rezults/*')) ? 'active':'');
            $view->with('contactLink', request()->is('contacts') ? 'active':'');

        });   
    }
}
