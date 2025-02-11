<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'message',
        'article_id',
        'user_id',
    ];

    // Relation avec l'utilisateur (un commentaire appartient à un utilisateur)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation avec l'article (un commentaire appartient à un article)
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Règles de validation
    public static function rules()
    {
        return [
            'message' => 'required|string|max:1000',
            'article_id' => 'required|exists:articles,id',
            'user_id' => 'required|exists:users,id',
        ];
    }
}