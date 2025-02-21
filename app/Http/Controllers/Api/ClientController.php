<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    // Lister les clients dans un fichier Json
    public function index(){
        $clients = Client::all();
        return response()->json($clients);
    }

    // Récupérer le client par son numéro dans un fichier Json
    public function show($id){
        // Trouver le client avec la méthode find()
        $client = Client::find($id);

        // Effectuer un retour 404 si le client n'existe pas
        if(!$client){
            return response()->json(["message"=> "Client non trouvé !"],404);
        }

        // Sinon, retourner le client
        return response()->json($client);
    }

    // Créer un nouveau client dans un fichier Json
    public function store(Request $request){
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'age' => 'required',
            'adresse' => 'required',
            'email' => 'required|email',
            'carteBancaire' => 'required'
        ]);

        // Créer le client
        $client = Client::create($request->all());
        return response()->json($client, 201);
    }


    // Mettre à jour un client dans un fichier Json
    public function update(Request $request, $id){
        $client = Client::find($id);

        if(!$client){
            return response()->json(["message"=> "Client non trouvé !"],404);
        }

        // Mettre à jour le client
        $client->update($request->all());
        return response()->json($client);
    }

    // Supprimer un client dans un fichier Json
    public function destroy($id){
        $client = Client::find($id);

        if(!$client){
            return response()->json(["message"=> "Client non trouvé !"],404);
        }
        //Efface le client
        $client->delete();
        return response()->json(["message"=> "Client supprimé !"]);
    }
}