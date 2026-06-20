<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donneur extends Model
{
    protected $fillable = [
        'user_id',
        'nom',
        'prenom',
        'cin',
        'sexe',
        'date_naissance',
        'groupe_sanguin',
        'ville',
        'telephone',
        'email',
        'taux_hemoglobine',
        'tension',
        'poids',
        'maladies_chroniques',
        'date_prochain_don',
    ];

    protected $casts = [
        'date_naissance' => 'date',
        'date_prochain_don' => 'date',
    ];

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function dons()
    {
        return $this->hasMany(Don::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'donneur_badge')->withPivot('date_obtention')->withTimestamps();
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function questionnaires()
    {
        return $this->hasMany(Questionnaire::class);
    }
}
