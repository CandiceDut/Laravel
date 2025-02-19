@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Information sur le client</h2>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Carte Bancaire</th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                        <td>{{ $client->NumeroClient }}</td>
                        <td>{{ $client->nom }}</td>
                        <td>{{ $client->prenom }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->carteBancaire }}</td>
                    </tr>
            </tbody>
        </table>
    </div>
@endsection