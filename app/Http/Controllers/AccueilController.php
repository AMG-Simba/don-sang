<?php

namespace App\Http\Controllers;

use App\Models\Actualite;
use App\Models\Donneur;
use App\Models\Don;
use App\Models\Temoignage;
use App\Models\Centre;

class AccueilController extends Controller
{
    public function index()
    {
        $nombre_donneurs = Donneur::count();
        $nombre_dons = Don::count();
        $nombre_centres = Centre::count();
        $actualites = Actualite::orderBy('date_publication', 'desc')->take(3)->get();
        $temoignages = Temoignage::all();

        return view('accueil', compact(
            'nombre_donneurs',
            'nombre_dons',
            'nombre_centres',
            'actualites',
            'temoignages'
        ));
    }
}
