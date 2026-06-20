<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
    protected $fillable = [
        'titre',
        'contenu',
        'image',
        'date_publication',
    ];

    protected $casts = [
        'date_publication' => 'date',
    ];
}
