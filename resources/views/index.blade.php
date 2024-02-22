@extends('template')
@section('titre', 'Bienvenue !')
@section('contenu')
@if(session('message'))
<div class="alert alert-success">
    {{ session('message') }}
</div>
@endif
<h1 style="margin-top: 50px">Films</h1>
<a href="{{route('films.create')}}" class="btn btn-success" style="margin-top: 50px; margin-bottom: 50px">Ajouter un
    film</a>
<table class="table table-dark" style="width: 80%; margin-top: 100px;margin-bottom: 100px">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col" style="min-width: 200px;">Titre</th>
            <th scope="col" style="min-width: 200px;">Année de sortie</th>
            <th scope="col">Description</th>
            <th scope="col">Durée</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($films as $film)
        <tr>
            <th scope="row">{{ $film->id }}</th>
            <td class="text-truncate">{{ $film->titre }}</td>
            <td>{{ $film->anneesortie }}</td>
            <td class=" text-truncate" style="max-width: 500px;">{{ $film->description }}</td>
            <td>{{ $film->duree }}</td>
            <td> <a href="{{route('films.show', $film->id)}}" class="btn btn-primary">Détails</a></td>
            <td> <a href="{{route('films.delete', $film->id)}}" class="btn btn-danger">Supprimer</a></td>
            <td> <a href="{{route('films.edit', $film->id)}}" class="btn btn-warning">Modifier</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection