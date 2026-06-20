<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Don extends Model
{
    protected $fillable = [
        'donneur_id',
        'centre_id',
        'date_don',
        'type_don',
        'volume',
        'statut',
    ];

    protected $casts = [
        'date_don' => 'date',
    ];

    public function donneur()
    {
        return $this->belongsTo(Donneur::class);
    }

    public function centre()
    {
        return $this->belongsTo(Centre::class);
    }
}
