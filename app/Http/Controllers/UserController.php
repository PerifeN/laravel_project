<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //ALl users

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); //Download all users
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        //dd($request->all());

        $user = User::findOrFail($id); 

        // Walidacja danych
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,user', // - role user i admin
        ]);

        // Aktualizacja danych
        $user->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        // Przekierowanie / komunikat
        return redirect()->route('users.index')->with('success', 'Data has been updated.');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id); // znajdowanie
        $user->delete(); // Usuń 

        // Komunikat
        return redirect()->route('users.index')->with('success', 'User successully deleted.');
    }
}
