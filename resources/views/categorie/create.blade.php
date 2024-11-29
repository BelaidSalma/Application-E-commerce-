  <x-app-layout>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
      <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
              {{ __('Ajouter une Categorie') }}
          </h2>
      </x-slot>
      <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                  <div class="p-6 text-gray-900 dark:text-gray-100">
                     {{--  @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                          @endif --}}
                          <form action="{{ route('categorie.store') }}" method="POST">
                              @csrf
                              @method('POST ')
                              @can('gérer catégories')
                                  <div class="mb-3">
                                  <label class="form-label">Libelle</label>
                                  <input type="text" class="form-control @error('Libelle') is-invalid @enderror"
                                      name="Libelle">
                                  @error('Libelle')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                              </div>
                              <button type="submit" class="btn btn-primary">Ajouter</button>
                              @endcan
                              
                          </form>
                  </div>
              </div>
          </div>
      </div>
  </x-app-layout>
