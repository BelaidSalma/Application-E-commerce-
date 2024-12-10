<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Ajouter une Role') }}
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
                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST ')
                             <div class="mb-3">
                            
                        </div>
                        <div class="mb-3">
                            <strong>Name :</strong>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="guard_name" value="web" hidden>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="grid grid-cols-4 mb-3  ">
                            <strong>Permissions :</strong>
                            @foreach ($permissions as $permission)
                                <div class="mt-3">
                                    <input 
                                        class="rounded" 
                                        type="checkbox" 
                                        name="permissions[]" 
                                        value="{{ $permission->id }}" 
                                        id="permission-{{ $permission->id }}">
                                    <label 
                                        class="form-check-label" 
                                        for="permission-{{ $permission->id }}">
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                        
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
