<?php

namespace App\Http\Controllers;

use App\Models\DonArgent;
use Illuminate\Http\Request;

class DonArgentController extends Controller
{
    public function index()
    {
        return view('pages.don_argent');
    }

    public function envoyer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'email' => 'required|email',
            'montant' => 'required|numeric|min:10',
            'message' => 'nullable|string',
        ]);

        DonArgent::create($request->all());

        return redirect()->route('don.argent')->with('succes', 'شكرا على تبرعك — غادي نتواصلو معاك قريبا لاتمام العملية');
    }
}
