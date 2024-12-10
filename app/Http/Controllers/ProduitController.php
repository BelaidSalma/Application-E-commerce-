<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les produits avec leurs catégories associées
        $produits = Produit::with('categorie')->get();
        return view('produit.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::all();
        return view('produit.create', compact('categories')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'categorie_id'=>'required',
            'libelle' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prix' => 'required',
            'quantite' => 'required',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename); // Déplace l'image dans le dossier public/images
        }
    
        Produit::create([
            'categorie_id' => $request->input('categorie_id'),
            'libelle' => $request->input('libelle'),
            'image' => isset($filename) ? $filename : null, // Ajoute le nom de l'image ou null si aucune image
            'prix' => $request->input('prix'),
            'quantite' => $request->input('quantite')
        ]);
        
        return redirect()->route('produit.index')->with('success', 'produit ajouté avec');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $produits = Produit::find($id);
        $categories=Categorie::all();
        return view('produit.edit', compact('produits','categories')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'categorie_id'=>'required',
            'libelle' => 'required',
            'prix' => 'required',
            'quantite' => 'required',
        ]);
        $produits = Produit::find($id);

        $produits->categorie_id = $request->categorie_id;
        $produits->libelle = $request->libelle;
        $produits->prix = $request->prix;
        $produits->quantite = $request->quantite;

        if ($request->hasFile('image')) {
            // Si une nouvelle image est envoyée
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            // Mettre à jour le chemin de l'image dans la base de données
            $produits->image =isset($filename) ? $filename : null;
        }
        $produits->save();
        return redirect()->route('produit.index')->with('success', 'produit modifié avec');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $produit=Produit::find($id);
      $produit->delete();
      return redirect()->route('produit.index')->with('success', 'produit supprimé');
    }
}
