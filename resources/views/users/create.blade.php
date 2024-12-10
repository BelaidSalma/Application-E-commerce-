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
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        @method('POST ')
                        
                        <div class="mb-3">
                             <label class="form-label">Name</label>
                             <input type="text" class="form-control" name="name" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Telephone</label>
                            <input type="text" class="form-control" name="telephone" >
                        </div>
                        <div class="row">
                            <strong>Roles</strong>
                            @foreach ($roles as $role)
                                <div class="col-md-4"> <!-- Chaque role occupe 1/3 de la ligne -->
                                    
                                    <input 
                                        class="form-check-input" 
                                        type="checkbox" 
                                        name="roles[]" 
                                        value="{{ $role->id }}" 
                                        id="role-{{ $role->id }}">
                                    <label 
                                        class="form-check-label" 
                                        for="role-{{ $role->id }}">
                                        {{ $role->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        </div>  
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                      
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
