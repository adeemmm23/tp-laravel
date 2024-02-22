@extends('template')
@section('titre', 'Bienvenue !')
@section('contenu')
<div class="card" style="width: 18rem">
    <div class="card-body">
        <h5 class="card-title
        ">{{ $film->titre }}</h5>
        <p class="card-text">{{ $film->description }}</p>
        <p class="card-text">Année de sortie : {{ $film->anneesortie }}</p>
        <p class="card-text">Durée : {{ $film->duree }}</p>
        <a href="{{ route('films.index') }}" class="btn btn-primary">Retour</a>
    </div>
</div>
@endsection