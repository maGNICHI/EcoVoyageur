<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    use HasFactory;

    protected $fillable = ['activite_id', 'contenu'];

    public function activite()
    {
        return $this->belongsTo(Activite::class);
    }
}
