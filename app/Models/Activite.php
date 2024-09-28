<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    use HasFactory;

    protected $fillable = ['titre', 'contenu', 'image'];

    public function avis()
    {
        return $this->hasMany(Avis::class);
    }

}
