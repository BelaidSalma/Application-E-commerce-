<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieControlle;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Frontend\AccueilController;
use App\Http\Controllers\Frontend\PanierController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\StripeWebhooks\StripeWebhooksController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route pour la page d'accueil
Route::get('/',function(){
return view('welcome');
});

Route::middleware(['role:Administrateur'])->group(function(){
    
    Route::resource('/categorie',CategorieControlle::class);
    Route::resource('/produit',ProduitController::class);
    Route::resource('/role',RoleController ::class);
    Route::resource('/permission',PermissionController::class);
    Route::resource('/users', UserController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/commande',CommandeController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
});
Route::middleware(['role:Utilisateur'])->group(function(){
    Route::resource('/commande',CommandeController::class);
    Route::get('/confirmation',[CommandeController::class, 'confirmation'])->name('commande.confirmation');
    Route::get('/echec',[CommandeController::class, 'echec'])->name('commande.echec');

});

Route::get('/index',function ( ){
    return view('index');
});
/* Route::resource('/home', AccueilController::class); */
Route::resource('/panier',PanierController::class);
Route::get('/home', [AccueilController::class, 'index'])->name('home.accueil');
Route::get('/shop', [AccueilController::class, 'shop'])->name('home.shop');
Route::get('/home/{id}', [AccueilController::class, 'show'])->name('home.show');
Route::post('stripe/webhook', StripeWebhooksController::class)->name('cashier.webhook')->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);
Route::get('/payer',function ( ){
    return view('subcribe');
});







require __DIR__.'/auth.php';
