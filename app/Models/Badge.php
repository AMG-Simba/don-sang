<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    protected $fillable = [
        'nom',
        'description',
        'condition_nombre',
    ];

    public function donneurs()
    {
        return $this->belongsToMany(Donneur::class, 'donneur_badge')->withPivot('date_obtention')->withTimestamps();
    }
}
