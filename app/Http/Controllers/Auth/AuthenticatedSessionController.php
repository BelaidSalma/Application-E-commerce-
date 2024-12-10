<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        
        $request->session()->regenerate();
       
        if (!Auth::check()) {
            return redirect('/login'); // Redirige si l'utilisateur n'est pas connecté
        }
        //retourne l'utilisateur actuellement connecté sous forme d'une instance du modèle User.
        $user = Auth::user();

        /** @var \App\User|null $user */
        
        if ($user->hasRole('Administration')) {
            return redirect()->route('dashboard'); // Redirige les admins
        } elseif ($user->hasRole('Utilisateur')) {
            return redirect()->route('home.accueil'); // Redirige les utilisateurs
        } 
        return redirect()->route('home.accueil'); // Redirige les utilisateurs
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
{
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    $user = Auth::user();
     /** @var \App\User|null $user */
    if ($user && $user->hasRole('Administration')) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('home.accueil');
}

}
