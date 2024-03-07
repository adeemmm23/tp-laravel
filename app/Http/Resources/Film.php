<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Film extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'titre' => $this->titre,
            'categorie' => $this->categorie,
            'anneesortie' => $this->anneesortie,
            'description' => $this->description,
            'duree' => $this->duree,
        ];
    }
}
