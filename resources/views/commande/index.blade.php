<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste de Produit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @can('voir produits')
                    <table class="table">
                        <thead>
                          <tr>
                           
                            <th scope="col">ID</th>
                            <th scope="col">Reference</th>
                            <th scope="col">Total (Produit)</th>
                            <th scope="col">Adresse de livraison</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande)
                            <tr>
                            
                                <td>{{$commande->id}}</td>
                                <td>{{$commande->reference}}</td>
                                <td>{{$commande->status}}</td>
                                <td>{{$commande->adress_de_livraison}}</td>
                                <td>
                                    <form action="{{ route('commande.destroy',$commande->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')">
                                            Supprimer
                                        </button>
                                    </form>
                                </td>
                                
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    @endcan
                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


