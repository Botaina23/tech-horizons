<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const ROLE_GUEST = 'guest';
    const ROLE_SUBSCRIBER = 'subscriber';
    const ROLE_THEME_MANAGER = 'theme_manager';
    const ROLE_EDITOR = 'editor';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relation avec les articles
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    // Relation avec les commentaires
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // Relation avec les abonnements
    public function subscriptions()
    {
        return $this->belongsToMany(Theme::class, 'subscriptions', 'user_id', 'theme_id');
    }

    // Relation avec l'historique de navigation
    public function history()
    {
        return $this->hasMany(History::class);
    }

    // Relation avec les notes
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }


    // Accesseur pour le nombre total d'articles
    public function getTotalArticlesAttribute()
    {
        return $this->articles()->count();
    }

    // Mutateur pour hacher le mot de passe
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Méthodes pour vérifier les rôles
    public function isGuest()
    {
        return $this->role === self::ROLE_GUEST;
    }

    public function isSubscriber()
    {
        return $this->role === self::ROLE_SUBSCRIBER;
    }

    public function isThemeManager()
    {
        return $this->role === self::ROLE_THEME_MANAGER;
    }

    public function isEditor()
    {
        return $this->role === self::ROLE_EDITOR;
    }

    // Règles de validation
    public static function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|in:guest,subscriber,theme_manager,editor',
        ];
    }
    public function themes()
{
    return $this->belongsToMany(Theme::class, 'subscriptions');
}

public function subscribedThemes()
{
    return $this->belongsToMany(Theme::class, 'theme_user'); // Pivot table entre utilisateur et thèmes
}

}
