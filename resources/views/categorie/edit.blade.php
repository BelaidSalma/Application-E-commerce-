  <x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Categorie') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  <form  action="{{ route('categorie.update',$categories->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    @can('gérer catégories')
                       <div class="mb-3">
                      <label class="form-label">Libelle</label>
                      <input type="text" class="form-control" value="{{$categories->Libelle}}" name="Libelle">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                    @endcan
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>