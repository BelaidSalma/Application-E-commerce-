<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $roles=Role::Orderby('id','ASC')->get();
  
      return view('role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions=Permission::orderBy('name','ASC')->get();
        return view('role.create',compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation du contenu envoyer
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permissions' => 'required',
            
        ]);
        $role = Role::create([
            'name' => $request->input('name'),
            // Ajoutez explicitement la valeur pour guard_name
        ]);
        $permissionTab=[];
        // parcourir les permissions contenues dans $request->permission
        //les convertir en entiers avant de les ajouter dans le tableau
        if (is_array($request->permissions) || is_object($request->permissions)) {
            foreach ($request->permissions as $permission) {
                $permissionTab[] = intval($permission);
            }
        }
            $role->syncPermissions($permissionTab);
        
                return redirect()->route('role.index')->with(key:'succes',value:'Role created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role=Role::find($id);
        $role->delete();
        return redirect()->route('role.index')->with(key:'succes',value:'Role deleted successfully');
    }
}
