<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter un Produit') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('produit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST ')
                        @can('gérer produits')
                             <div class="mb-3">
                            <label for="categorie_id" class="form-label">Catégorie </label>
                            <select name="categorie_id" id="categorie_id" class="form-select" required>
                                <option value="">Sélectionner une catégorie</option>
                                <!-- Ajouter les catégories dynamiquement depuis votre base de données -->
                                @foreach ($categories as $categorie)
                                    <option value="{{ $categorie->id }}">{{ $categorie->Libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Libelle</label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror"
                                name="libelle">
                            @error('libelle')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Prix</label>
                            <input type="text" class="form-control" name="prix" placeholder="Prix">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">quantite</label>
                            <input type="text" class="form-control" name="quantite" placeholder="Quantite">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Choisir une image :</label>
                            <input type="file" name="image" class="form-control" required accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        @endcan
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
