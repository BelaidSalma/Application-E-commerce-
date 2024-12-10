<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles=Role::all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation des donnes
        $this->validate($request,[
            'name' => 'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:8',
            'roles'=>'required'
        ]);
        //recuperation de tout les donnes de la requete
        $input=$request->all();
        //hasher le mot de passe
        $input['password']=bcrypt($input['password']);
        //creation d'un nouveau user
        $user=User::create($input);
        //assigner les roles au user
        $roleArray=[];
        foreach ($request->roles as $role) {
            $roleArray[] = intval(value:$role);
        }

        $user->roles()->sync($roleArray);  
        return redirect()->route('users.index')->with('success','User created successfully');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect()->route('users.index')->with('success','User deleted successfully');
    }
}
