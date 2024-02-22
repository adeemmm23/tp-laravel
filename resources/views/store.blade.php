@extends('template')
@section('titre', 'Bienvenue !')
@section('contenu')
<div class="card" style="width: 18rem">
    <div class="card-body">
        <h5 class="card-title">Ajouter</h5>
        <form action="{{ route('films.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="titre">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>
            <div class="form-group">
                <label for="anneesortie">Année de sortie</label>
                <input type="number" class="form-control" id="anneesortie" name="anneesortie" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
            </div>
            <div class="form-group">
                <label for="duree">Durée</label>
                <input type="number" class="form-control" id="duree" name="duree" required>
            </div>
            <br />
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>
@endsection