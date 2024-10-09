<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable = ['sujet', 'description', 'etat'];

    public function reponses()
    {
        return $this->hasMany(Reponse::class);
    }
}
