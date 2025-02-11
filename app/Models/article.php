<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_REJECTED = 'rejected';

    protected $fillable = [
        'title',
        'content',
        'theme_id',
        'user_id',
        'status', // Utilisez les constantes pour définir les statuts
    ];

    // Relation avec l'utilisateur (un article appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec le thème (un article appartient à un thème)
    public function theme()
    {
        return $this->belongsTo(Theme::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }

    // Relation avec les commentaires (un article peut avoir plusieurs commentaires)
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relation avec les notes (un article peut avoir plusieurs notes)
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Accesseur pour vérifier si l'article est accepté
    public function getIsAcceptedAttribute()
    {
        return $this->status === self::STATUS_ACCEPTED;
    }

    // Règles de validation
    public static function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'theme_id' => 'required|exists:themes,id',
            'user_id' => 'required|exists:users,id',
            'status' => 'required|in:pending,accepted,rejected',
        ];
    }


}