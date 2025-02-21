<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    //Liste les informations de l'utilisateur
    public function index()
    {
        return view('sessions.index');
    }

    //Connecte l'utilisateur
    public function create()
    {
        return view('auth.login');
    }

    //Effectue la connexion
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended('/home');
        }

        return back()->withErrors(['email' => 'Les identifiants fournis sont incorrects.']);
    }

    //Affiche plus de détails sur l'utilisateur
    public function show(string $id)
    {
        return view('sessions.show', ['user' => Auth::user()]);
    }

    //Modifie l'utilisateur
    public function edit(string $id)
    {
    
        return view('sessions.edit', ['user' => Auth::user()]);
    }


    //Déconnecte l'utilisateur
    public function destroy(string $id)
    {
        Auth::logout();
        return redirect('/login');
    }
}