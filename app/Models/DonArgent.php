<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonArgent extends Model
{
    protected $table = 'dons_argent';

    protected $fillable = [
        'nom',
        'email',
        'montant',
        'message',
    ];
}
