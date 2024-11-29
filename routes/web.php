<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategorieControlle;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\Frontend\AccueilController;
use App\Http\Controllers\Frontend\PanierController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

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
    //cree deux roole Admine et utilisateur
  
        // Créer les permissions avec le guard 'web'
        $adminRole = Role::firstOrCreate(['name' => 'Administrateur']);
        $userRole = Role::firstOrCreate(['name' => 'Utilisateur']);
    
        // Assigner les permissions aux rôles
        $adminRole->givePermissionTo([
            'gérer produits',
            'gérer catégories',
            'passer commande',
            'voir commandes',
        ]);
    
        $userRole->givePermissionTo([
            'voir produits',
            'voir categories',
            'passer commande',
        ]);
    
});

Route::middleware(['role:Administrateur'])->group(function(){
    Route::resource('/categorie',CategorieControlle::class);
    Route::resource('/produit',ProduitController::class);
    Route::resource('/role',RoleController ::class);
    Route::resource('/permission',PermissionController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

Route::resource('/home', AccueilController::class);
Route::resource('/panier',PanierController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


Route::middleware(['role:Utilisateur'])->group(function () {
    Route::resource('/commande',CommandeController::class);
    Route::get('/confirmation',[\App\Http\Controllers\CommandeController::class,'confirmation'])->name("confirmation"); 
});


require __DIR__.'/auth.php';
