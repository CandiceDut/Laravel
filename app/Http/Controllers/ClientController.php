<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    //Liste tous les clients
    public function index()
    {
        // Récupérer tous les clients de la base de données
        $clients = Client::all(); 
        return view('clients.index', compact('clients'));
    }

    //Créé un client
    public function create()
    {
        return view('clients.create');
    }

    //Stocke les données et créé le client
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'carteBancaire' => 'required',
        ]);
        //Créé le client
        Client::create($request->all());

        return redirect()->route('clients.index');
    }

    //Affiche un client
    public function show(string $id)
    {
        //Trouver le client avec la méthode where()
        $client = Client::where('NumeroClient', $id)->firstOrFail();
        return view('clients.show', compact('client'));
    }

    //Modifie un client
    public function edit(string $id)
    {
        $client = Client::where('NumeroClient', $id)->firstOrFail();
        return view('clients.edit', compact('client'));
    }
    
    //Stocke les données et modifie le client
    public function update(Request $request, string $id)
    {   
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'carteBancaire' => 'required',
        ]);
        //Modification du client
        Client::where('NumeroClient', $id)->update($request->except(['_token', '_method']));
        
        return redirect()->route('clients.index');
    }

    //Efface le client
    public function destroy(string $id)
    {
        $client = Client::where('NumeroClient', $id);
        //Effacer le client
        $client->delete();
        return redirect()->route('clients.index');
    }
}