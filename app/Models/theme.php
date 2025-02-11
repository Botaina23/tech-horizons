<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    const THEME_AI = 'Intelligence artificielle';
    const THEME_IOT = 'Internet des objets';
    const THEME_CYBER = 'Cybersécurité';
    const THEME_VR = 'Réalité virtuelle et augmentée';

    protected $fillable = ['name', 'description', 'image', 'created_by'];
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    // Relation avec les articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    
    // Relation avec les abonnés
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscriptions', 'theme_id', 'user_id');
    }

    // Relation avec le responsable du thème
    public function responsible()
    {
        return $this->belongsTo(User::class, 'responsible_id');
    }

    // Accesseur pour le nombre total d'articles
    public function getTotalArticlesAttribute()
    {
        return $this->articles()->count();
    }

    // Règles de validation
    public static function rules()
    {
        return [
            'name' => 'required|string|max:255|unique:themes',
            'description' => 'nullable|string',
        ];
    }
}