<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

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
    $this->validate($request, [
        'adress_de_livraison' => 'required|string|max:150'
    ]);

    // Configurer la clé API Stripe
    Stripe::setApiKey(env('STRIPE_SECRET'));

    // Récupérer les produits du panier
    $paniers = \Cart::getContent();
    $lineItems = [];

    // Enregistrer la commande
    $commande = new Commande();
    $commande->reference = rand(1000000, 9000000);
    $commande->total = \Cart::getTotal();
    $commande->user_id = Auth::user()->id;
    $commande->adress_de_livraison = $request->adress_de_livraison;
    $commande->save();

    // Parcourir les éléments du panier
    foreach ($paniers as $panier) {
        // Attacher les produits à la commande
        $commande->produits()->attach($panier->id, [
            'quantite' => $panier->quantity,
            'prix' => $panier->price,
        ]);

        // Réduire le stock
        $produit = Produit::find($panier->id);
        $produit->quantite -= $panier->quantity;
        $produit->save();

        // Ajouter l'article à la liste pour Stripe
        $lineItems[] = [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $panier->name,
                ],
                'unit_amount' => $panier->price * 100, // en centimes
            ],
            'quantity' => $panier->quantity,
        ];
    }

    // Créer une session de paiement Stripe
    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => $lineItems,
        'mode' => 'payment',
        'success_url' => route('commande.confirmation'),
        'cancel_url' => route('commande.echec'),
    ]);

    // Vider le panier
    \Cart::clear();

    // Rediriger vers la session Stripe
    return redirect($session->url);
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
    public function echec(){
        return view('commande.echec');
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
