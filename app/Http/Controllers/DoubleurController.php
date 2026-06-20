<?php

namespace App\Http\Controllers;

use App\Models\Centre;

class DoubleurController extends Controller
{
    public function faq()
    {
        return view('pages.faq');
    }

    public function conditions()
    {
        return view('pages.conditions');
    }

    public function comment_ca_marche()
    {
        return view('pages.comment_ca_marche');
    }

    public function qui_sommes_nous()
    {
        return view('pages.qui_sommes_nous');
    }

    public function nos_activites()
    {
        return view('pages.nos_activites');
    }

    public function don_argent()
    {
        return view('pages.don_argent');
    }

    public function centres()
    {
        $centres = Centre::orderBy('ville')->get();
        return view('pages.centres', compact('centres'));
    }
}
