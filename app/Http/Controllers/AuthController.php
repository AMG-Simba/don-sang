<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Donneur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login_form()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role == 'admin' || $user->role == 'medecin' || $user->role == 'agent') {
                return redirect()->route('admin.dashboard');
            }
            return redirect()->route('donneur.dashboard');
        }

        return back()->withErrors(['email' => 'الايميل او كلمة السر غلط']);
    }

    public function inscription_form()
    {
        return view('auth.inscription');
    }

    public function inscription(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'cin' => 'required|string|unique:donneurs,cin',
            'sexe' => 'required|in:ذكر,انثى',
            'date_naissance' => 'required|date|before:-18 years',
            'groupe_sanguin' => 'required|in:A+,A-,B+,B-,O+,O-,AB+,AB-',
            'ville' => 'required|string|max:100',
            'telephone' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->prenom . ' ' . $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'donneur',
        ]);

        Donneur::create([
            'user_id' => $user->id,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'cin' => $request->cin,
            'sexe' => $request->sexe,
            'date_naissance' => $request->date_naissance,
            'groupe_sanguin' => $request->groupe_sanguin,
            'ville' => $request->ville,
            'telephone' => $request->telephone,
            'email' => $request->email,
        ]);

        Auth::login($user);
        return redirect()->route('donneur.dashboard')->with('succes', 'مرحبا بك في الوكالة المغربية للدم');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('accueil');
    }
}
