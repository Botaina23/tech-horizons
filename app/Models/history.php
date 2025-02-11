<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'user_id',
        'article_id',
    ];

    // Relation avec l'article
    public function article()
    {
        return $this->belongsTo(Article::class);
    }

    // Relation avec l'utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Règles de validation
    public static function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'article_id' => 'required|exists:articles,id',
        ];
    }


}
