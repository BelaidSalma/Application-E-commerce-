<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Categorie;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class CategorieControlle extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('voir categories')) {
            // Redirige vers une autre page avec un message flash
            return redirect()->route('/home')->with('error', 'Vous n\'avez pas la permission d\'accéder à cette page.');
        }
        $categories=Categorie::all();
        return view('categorie.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation des donnee
        $request->validate([
            'Libelle'=>'required'
        ]);
        // dd($request->all());
        Categorie::create($request->all());
        return redirect()->route('categorie.index')->with('success','categorie cree avec success');
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
        
        $categories = Categorie::find($id);
        return view('categorie.edit', compact('categories')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate([
            'Libelle'=>'required'
        ]); 
         $categories=Categorie::find($id);
         $categories->update($request->all());
        return redirect()->route('categorie.index')->with('success','categorie modifie avec success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categories=Categorie::find($id);
        $categories->delete();
         return redirect()->route('categorie.index')->with('success','categorie supprime avec success');
    }
}
