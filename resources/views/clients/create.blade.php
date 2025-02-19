@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Ajouter un nouveau client</h2>
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prenom :</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="age">Age :</label>
            <input type="text" name="age" id="age" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" id="adresse" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" name="email" id="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="carteBancaire">Carte Bancaire :</label>
            <input type="text" name="carteBancaire" id="carteBancaire" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Ajouter</button>
        <a href="{{ route('clients.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
    </form>
</div>
@endsection