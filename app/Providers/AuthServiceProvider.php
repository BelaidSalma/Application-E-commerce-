<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    Gate::define('voir categories', function ($user) {
        // Vérifier si l'utilisateur connecté est celui avec l'ID 1
        return $user->id === 1; // L'utilisateur avec ID 1 est l'admin
    });
    Gate::define('voir produits', function ($user) {
        // Vérifier si l'utilisateur connecté est celui avec l'ID 1
        return $user->id === 1; // L'utilisateur avec ID 1 est l'admin
    });
    
    }
   


}
