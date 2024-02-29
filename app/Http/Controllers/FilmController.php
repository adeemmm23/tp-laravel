<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Categorie;

class FilmController extends Controller
{

    public function index()
    {
        $films = Film::paginate(5);
        $categories = Categorie::all();
        return view('index', compact('films'), compact('categories'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $categories = Categorie::all();
        $films = Film::where('titre', 'like', "%$search%")->get();
        return view('index', compact('films'), compact('categories'));
    }

    public function categorie(string $nom)
    {
        $categories = Categorie::all();
        $cate = Categorie::where('nom', $nom)->first();
        $films = $cate->films;
        return view('index', compact('films'), compact('categories'));
    }

    public function create()
    {
        $categories = Categorie::all();
        return view('create', compact('categories'));
    }

    public function store(Request $request)
    {
        $film = new Film();
        $film->titre = $request->input('titre');
        $film->categorie_id = $request->input('categorie');
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
        $categories = Categorie::all();
        return view('edit', compact('film'), compact('categories'));
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
