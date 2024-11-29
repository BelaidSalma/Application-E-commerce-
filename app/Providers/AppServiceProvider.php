<?php

namespace App\Providers;

use App\Models\Categorie;
use Cart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer(['*'],function($view){
            $view->with([
                'nombredeproduit' => \Cart::getTotalQuantity(),
                'totalpanier' => \Cart::getTotal(),
                'paniers' => \Cart::getContent()->sort(),
                "categories_all" =>  Categorie::all(),
            ]);
        });
    }
}
