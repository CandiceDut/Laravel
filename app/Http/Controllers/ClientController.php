<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all(); // Récupérer tous les clients de la base de données
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'email' => 'required|email',
            'carteBancaire' => 'required',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index');
    }

    public function show(string $id)
    {
        $client = Client::where('NumeroClient', $id)->firstOrFail();
        return view('clients.show', compact('client'));
    }

    public function edit(string $id)
    {
        $client = Client::where('NumeroClient', $id)->firstOrFail();
        return view('clients.edit', compact('client'));
    }
    
    public function update(string $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'carteBancaire' => 'required',
        ]);

        Client::update($request->all());

        return redirect()->route('clients.index');
    }

    public function destroy(string $id)
    {
        $client = Client::where('NumeroClient', $id)->firstOrFail();
        $client->delete();
        return redirect()->route('clients.index');
    }
}