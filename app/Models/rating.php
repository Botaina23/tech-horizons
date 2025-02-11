<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class rating extends Model
{
    // Champs remplissables (mass assignable)
    protected $fillable = [
        'rating', // La note attribuée (par exemple, de 1 à 5)
        'article_id', // ID de l'article noté
        'user_id', // ID de l'utilisateur qui a noté l'article
    ];

    // Relation avec l'article (une note appartient à un article)
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Relation avec l'utilisateur (une note appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
