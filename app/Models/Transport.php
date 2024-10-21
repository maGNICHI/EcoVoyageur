<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transport extends Model
{
    protected $fillable = ['type', 'description', 'capacite', 'itineraire_id'];

    public function itineraire()
    {
        return $this->belongsTo(Itineraire::class);
    }

   
    public static function types()
    {
        return ['velo', 'bateau', 'avion', 'bus', 'train'];
    }
}
