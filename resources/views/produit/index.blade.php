<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste de Produit') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @can('voir produits')
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Libelle</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Quantite</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                            <tr>
                                <th scope="row"></th>
                                <td>{{$produit->id}}</td>
                                <td>{{$produit->libelle}}</td>
                                <td>{{ $produit->categorie ? $produit->categorie->Libelle : 'Aucune catégorie' }}</td>
                                <td>
                                    @if ($produit->image)
                                        <img src="{{ asset('images/' . $produit->image) }}" width="100" alt="{{ $produit->libelle }}">
                                    @else
                                        <span>Aucune image</span>
                                    @endif
                                </td>
                                <td>{{$produit->prix}}</td>
                                <td>{{$produit->quantite}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="{{ route('produit.edit', $produit->id) }}"
                                            ><i  style="color: blue;margin-right:10px;"class="fa-solid fa-pen-to-square"></i></a> 
                                            <form action="{{ route('produit.destroy',$produit->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                 <button><i  onclick="return confirm('Voulez-vous supprimer le role?')" class="fa-solid fa-trash" style="color: red;"></i></button>
                                            </form>
                                    </div>
                                </td>
                            
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    @endcan
                    <a href="produit/create"><button type="button" class="btn btn-outline-success">Ajouter un Produit</button></a>

                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


