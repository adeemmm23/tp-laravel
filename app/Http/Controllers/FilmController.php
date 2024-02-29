<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{

    public function index()
    {
        $films = Film::paginate(5);
        return view('index', compact('films'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $films = Film::where('titre', 'like', "%$search%")->get();
        return view('index', compact('films'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $film = new Film();
        $film->titre = $request->input('titre');
        $film->anneesortie = $request->input('anneesortie');
        $film->description = $request->input('description');
        $film->duree = $request->input('duree');
        $film->save();
        return redirect()->route('films.index')->with('message', "Le film $film->titre a été ajouté avec succès !");
    }

    public function show(string $id)
    {
        $film = Film::find($id);
        return view('show', compact('film'));
    }

    public function edit(string $id)
    {
        $film = Film::find($id);
        return view('edit', compact('film'));
    }

    public function update(Request $request, string $id)
    {
        $film = Film::find($id);
        $film->titre = $request->input('titre');
        $film->anneesortie = $request->input('anneesortie');
        $film->description = $request->input('description');
        $film->duree = $request->input('duree');
        $film->save();
        return redirect()->route('films.index')->with('message', "Le film $film->titre a été modifié avec succès !");
    }

    public function destroy(string $id)
    {
        $film = Film::find($id);
        $film->delete();
        return redirect()->route('films.index')->with('message', "Le film $film->titre a été supprimé avec succès !");
    }
}
