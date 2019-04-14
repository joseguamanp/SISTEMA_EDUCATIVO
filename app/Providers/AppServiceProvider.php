<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Illuminate\Support\Facades\DB;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('*', function($view)
        {
             $lista=DB::table('tb_rutas as r')
            ->join('tb_rutas','r.escalon','=','tb_rutas.id')
            ->select('r.*')
            ->get();
            $view->with('lista',$lista);
        });


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
