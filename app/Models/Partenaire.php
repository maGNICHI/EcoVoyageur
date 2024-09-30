<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'email',
        'adresse',
        'telephone',
        'type'
    ];

    /**
     * Get the certificates associated with the partenaire.
     */
    public function certificats()
    {
        return $this->hasMany(Certificat::class);
    }

    // Méthode pour récupérer les types de transport
    public static function types()
    {
        return ['Partenaire Hébergement', 'Partenaire Transport', 'Partenaire Tourisme Responsable'];
    }
}
