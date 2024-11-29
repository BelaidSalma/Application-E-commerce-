<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Produit;
use Cart;

use Illuminate\Http\Request;

class PanierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $produits=Produit::all();
        $total = \Cart::getTotal();
        return view('panier.index',compact('total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produit = Produit::find($request->produit_id);
         //Vérifie que la quantité demandée par l'utilisateur ($request->quantite) est inférieure 
        //ou égale à la quantité en stock ($produit->quantite)

        if ($produit->quantite < $request->quantite)
        {
            return redirect()->back()->with('msg_error',"Nous avons pas cette quantité en stock; Quantité disponible : $produit->quantite ");
        }
    
       
      

        try {
            \Cart::add(array(
                'id' => $produit->id,
                'name' => $produit->libelle,
                'price' => $produit->prix,
                'quantity' => $request->quantite,
                'attributes' => [
                'image' => $produit->image,
            ],
            ));
    
            // Mise à jour de la quantité en stock
            $produit->quantite -= $request->quantite;
            $produit->save();
    
            return redirect()->back()->with('msg', 'Produit ajouté avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('msg_error', "Erreur lors de l'ajout au panier : " . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
       /* $produit=Produit::find($request->id);

        \Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));
        dd(\Cart::content()); // Affiche tout le contenu du panier
        return redirect()->route('panier.index')->with('message','Panier mis à jour avec succes'); */
    

    // Afficher le contenu du panier avant la mise à jourdd(\Cart::getContent());  // Inspectez le contenu actuel du panier

    // Mettre à jour la quantité
    \Cart::update($id, array(
        'quantity' => array(
            'relative' => false,
            'value' => $request->quantity,  // Nouvelle quantité
        ),
    ));

    // Afficher le contenu du panier après la mise à jour
    //dd(\Cart::getContent());  // Inspectez le contenu du panier après la mise à jour

    // Retourner la réponse
    return redirect()->route('panier.index')->with('message', 'Panier mis à jour avec succès');


       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            \Cart::remove($id);
            return redirect()->back()->with('msg', 'Produit supprimé avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('msg_error', "Erreur lors de la suppression : " . $e->getMessage());
        }
        
    }
}
