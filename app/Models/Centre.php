<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Centre extends Model
{
    protected $fillable = [
        'nom',
        'ville',
        'adresse',
        'telephone',
        'latitude',
        'longitude',
    ];

    public function dons()
    {
        return $this->hasMany(Don::class);
    }
}
