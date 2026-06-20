<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('pages.contact');
    }

    public function envoyer(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'nullable|string|max:100',
            'email' => 'required|email',
            'sujet' => 'required|string|max:200',
            'message' => 'required|string',
        ]);

        Message::create($request->all());

        return redirect()->route('contact')->with('succes', 'تم ارسال رسالتك بنجاح، غادي نتواصلو معاك قريبا');
    }
}
