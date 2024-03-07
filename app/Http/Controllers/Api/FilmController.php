<?php

namespace App\Http\Controllers\Api;

use App\Models\Film;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Film as FilmResource;

class FilmController extends Controller
{
    public function index()
    {
        $films = Film::all();
        return FilmResource::collection($films);
    }

    public function store(Request $request)
    {
        $requiredFields = ['titre', 'categorie', 'anneesortie', 'description', 'duree'];

        foreach ($requiredFields as $field) {
            if (!$request->has($field)) {
                return response()->json(
                    [
                        'message' => "Le champ $field est obligatoire !"
                    ],
                    400
                );
            }
        }

        $film = new Film();
        $film->titre = $request->input('titre');
        $film->categorie_id = $request->input('categorie');
        $film->anneesortie = $request->input('anneesortie');
        $film->description = $request->input('description');
        $film->duree = $request->input('duree');
        $film->save();
        return response()->json(
            [
                'message' => "Le film a été ajouté avec succès !",
                'film' => $film
            ]
        );
    }

    public function show(string $id)
    {
        $film = Film::find($id);
        return new FilmResource($film);
    }

    public function update(Request $request, string $id)
    {
        $film = Film::find($id);
        $film->titre = $request->input('titre');
        $film->categorie_id = $request->input('categorie');
        $film->anneesortie = $request->input('anneesortie');
        $film->description = $request->input('description');
        $film->duree = $request->input('duree');
        $film->save();
        return response()->json(
            [
                'message' => "Le film a été modifié avec succès !",
                'film' => $film
            ]
        );
    }

    public function destroy(string $id)
    {
        $film = Film::find($id);
        $film->delete();
        return response()->json(
            [
                'message' => "Le film a été supprimé avec succès !",
                'film' => $film
            ]
        );
    }
}
