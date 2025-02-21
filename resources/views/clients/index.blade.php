
@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('clients.create') }}" class="btn btn-primary mb-3">Ajouter un client</a>
        <h2>Liste des Clients</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Carte Bancaire</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->NumeroClient }}</td>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->carteBancaire }}</td>

                        <td>
                            <a href="{{ route('clients.edit', $client->NumeroClient) }}" class="btn btn-warning btn-sm">Edit</a>
                            
                            <a href="{{ route('clients.show', $client->NumeroClient) }}" class="btn btn-info btn-sm">Voir</a>

                            <!-- Delete button -->
                            <form action="{{ route('clients.destroy', $client->NumeroClient) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce client ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
