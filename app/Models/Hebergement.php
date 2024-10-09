<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hebergement extends Model
{
    use HasFactory; 

    protected $table = 'hebergement'; 
    protected $fillable = ['nom', 'description', 'duree', 'prix'];

   
    public static function types()
    {
        return ['hotel', 'auberge', 'appartement', 'chalet'];
    }
}
