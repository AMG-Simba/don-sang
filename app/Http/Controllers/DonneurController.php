<?php

namespace App\Http\Controllers;

use App\Models\Donneur;
use App\Models\Don;
use App\Models\Badge;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonneurController extends Controller
{
    public function dashboard()
    {
        $donneur = Auth::user()->donneur;
        if (!$donneur) {
            return redirect()->route('inscription.donneur');
        }
        $dons = Don::where('donneur_id', $donneur->id)->orderBy('date_don', 'desc')->take(5)->get();
        $badges = $donneur->badges;
        $notifications = Notification::where('donneur_id', $donneur->id)->where('lu', false)->get();
        return view('donneur.dashboard', compact('donneur', 'dons', 'badges', 'notifications'));
    }

    public function profil()
    {
        $donneur = Auth::user()->donneur;
        return view('donneur.profil', compact('donneur'));
    }

    public function modifier_profil(Request $request)
    {
        $donneur = Auth::user()->donneur;
        $request->validate([
            'telephone' => 'required|string|max:15',
            'ville' => 'required|string|max:100',
            'poids' => 'nullable|integer',
            'tension' => 'nullable|string',
            'maladies_chroniques' => 'nullable|string',
        ]);
        $donneur->update($request->only(['telephone', 'ville', 'poids', 'tension', 'maladies_chroniques']));
        return redirect()->route('donneur.profil')->with('succes', 'تم تحديث المعلومات بنجاح');
    }

    public function historique()
    {
        $donneur = Auth::user()->donneur;
        $dons = Don::where('donneur_id', $donneur->id)->orderBy('date_don', 'desc')->get();
        return view('donneur.historique', compact('donneur', 'dons'));
    }

    public function badges()
    {
        $donneur = Auth::user()->donneur;
        $tous_badges = Badge::all();
        $badges_obtenus = $donneur->badges->pluck('id')->toArray();
        return view('donneur.badges', compact('donneur', 'tous_badges', 'badges_obtenus'));
    }

    public function carte()
    {
        $donneur = Auth::user()->donneur;
        return view('donneur.carte', compact('donneur'));
    }

    public function notifications()
    {
        $donneur = Auth::user()->donneur;
        $notifications = Notification::where('donneur_id', $donneur->id)->orderBy('created_at', 'desc')->get();
        Notification::where('donneur_id', $donneur->id)->update(['lu' => true]);
        return view('donneur.notifications', compact('notifications'));
    }
}
