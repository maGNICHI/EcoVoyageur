<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'image', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function avis()
    {
        return $this->hasMany(Avis::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class, 'activite_likes', 'activite_id', 'user_id');
    }

    // Méthode pour vérifier si l'utilisateur a déjà liké l'activité
    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }
    

}
