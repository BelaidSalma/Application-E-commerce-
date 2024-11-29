<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Liste de Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">name</th>
                            <th scope="col">permission</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <th scope="row">{{ $role->id }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if ($role->permissions)
                                            
                                        @foreach ($role->permissions as $item)
                                            {{ $item->name }}
                                        @endforeach
                                        @else
                                        <p class="text-primary">pas de role</p>
                                        @endif
                                        

                                     </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="{{ route('role.edit', $role->id) }}">Modifier</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                      </table>
                    <a href="{{ route('role.create') }}"><button type="button" class="btn btn-outline-success">Ajouter un Role</button></a>

                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


