<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'organisme_emetteur',
        'date_attribution',
        'date_expiration',
        'partenaire_id'
    ];

    /**
     * Get the partenaire that owns the certificat.
     */
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
