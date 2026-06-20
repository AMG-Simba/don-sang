<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $fillable = [
        'donneur_id',
        'reponses',
        'eligible',
    ];

    protected $casts = [
        'reponses' => 'array',
        'eligible' => 'boolean',
    ];

    public function donneur()
    {
        return $this->belongsTo(Donneur::class);
    }
}
