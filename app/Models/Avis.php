<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $fillable = [ 'content', 'post_id'];
    public function post()
    {
        return $this->belongsTo(Activite::class);
    }
}