<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'donneur_id',
        'titre',
        'message',
        'lu',
    ];

    protected $casts = [
        'lu' => 'boolean',
    ];

    public function donneur()
    {
        return $this->belongsTo(Donneur::class);
    }
}
