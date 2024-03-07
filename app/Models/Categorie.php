<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $hidden = ['created_at', 'updated_at'];
    protected $fillable = ['titre', 'categorie_id', 'anneesortie', 'description', 'duree'];
    public function films()
    {
        return $this->hasMany(Film::class);
    }
    use HasFactory;
}
