<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commandes=Commande::all();
        return view('commande.index',compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('commande.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'adress_de_livraison' => 'required|string|max:150'
        ]);

        //recuperer les produits du panier
        $paniers = \Cart::getContent();
        //instancier un objet commande
        $commande = new Commande();
        //referencer la commande
        $commande->reference = rand(1000000,9000000);
        //recupere le total qui est le total dans le panier
        $commande->total = \Cart::getTotal();
        //recuperer l'id d'utilisateur
        $commande->user_id =Auth::user()->id;
        //recuperer l'adresse de livraison
        $commande->adress_de_livraison = $request->adress_de_livraison;
        //enregistrer la commande
        $commande->save();
        //parcourir chaque element du panier
        foreach ($paniers as $panier){
            //a méthode attach est utilisée pour associer un produit ($panier->id) 
            //à une commande via une relation many-to-many.
            $commande->produits()->attach($panier->id,
                [
                    'quantite' => $panier->quantity,
                    'prix' => $panier->price,
                ]
            );
            //recuperation du produit 
            $produit = Produit::find($panier->id);
            //reduction de stock
            $produit->quantite -= $panier->quantity;
        }
        
        //vider le panier
        \Cart::clear();

        

        return redirect()->route('confirmation');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }
    public function confirmation(){
        return view('commande.confirmation');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $commande=Commande::find($id);
        $commande->delete();
        return view(('commande.index'));

    }
}
