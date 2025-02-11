<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class issue extends Model
{
    protected $fillable = [
        'title',
        'publication_date',
        'status', // Exemple : 'draft', 'published', 'archived'
    ];

    // Relation avec les articles (un numéro peut contenir plusieurs articles)
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
