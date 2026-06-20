<?php

namespace App\Http\Controllers;

use App\Models\Donneur;
use App\Models\Don;
use App\Models\Centre;
use App\Models\Actualite;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $nombre_donneurs = Donneur::count();
        $nombre_dons = Don::count();
        $nombre_centres = Centre::count();
        $nombre_messages = Message::count();
        $donneurs_recents = Donneur::orderBy('created_at', 'desc')->take(5)->get();
        $dons_recents = Don::with(['donneur', 'centre'])->orderBy('created_at', 'desc')->take(5)->get();
        return view('admin.dashboard', compact(
            'nombre_donneurs', 'nombre_dons', 'nombre_centres',
            'nombre_messages', 'donneurs_recents', 'dons_recents'
        ));
    }

    public function donneurs()
    {
        $donneurs = Donneur::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.donneurs.index', compact('donneurs'));
    }

    public function donneur_show($id)
    {
        $donneur = Donneur::with(['dons.centre', 'badges'])->findOrFail($id);
        return view('admin.donneurs.show', compact('donneur'));
    }

    public function donneur_destroy($id)
    {
        Donneur::findOrFail($id)->delete();
        return redirect()->route('admin.donneurs')->with('succes', 'تم حذف المتبرع بنجاح');
    }

    public function dons()
    {
        $dons = Don::with(['donneur', 'centre'])->orderBy('date_don', 'desc')->paginate(15);
        return view('admin.dons.index', compact('dons'));
    }

    public function don_valider($id)
    {
        $don = Don::findOrFail($id);
        $don->update(['statut' => 'valide']);
        return redirect()->route('admin.dons')->with('succes', 'تم تاكيد التبرع');
    }

    public function centres()
    {
        $centres = Centre::orderBy('ville')->get();
        return view('admin.centres.index', compact('centres'));
    }

    public function centre_store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:200',
            'ville' => 'required|string|max:100',
            'adresse' => 'required|string|max:300',
            'telephone' => 'nullable|string|max:20',
        ]);
        Centre::create($request->all());
        return redirect()->route('admin.centres')->with('succes', 'تم اضافة المركز بنجاح');
    }

    public function centre_destroy($id)
    {
        Centre::findOrFail($id)->delete();
        return redirect()->route('admin.centres')->with('succes', 'تم حذف المركز');
    }

    public function actualites()
    {
        $actualites = Actualite::orderBy('date_publication', 'desc')->get();
        return view('admin.actualites.index', compact('actualites'));
    }

    public function actualite_store(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:300',
            'contenu' => 'required|string',
            'date_publication' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('actualites', 'public');
        }

        Actualite::create($data);
        return redirect()->route('admin.actualites')->with('succes', 'تم اضافة الخبر بنجاح');
    }

    public function actualite_destroy($id)
    {
        Actualite::findOrFail($id)->delete();
        return redirect()->route('admin.actualites')->with('succes', 'تم حذف الخبر');
    }

    public function messages()
    {
        $messages = Message::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    public function utilisateurs()
    {
        $utilisateurs = User::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.utilisateurs.index', compact('utilisateurs'));
    }

    public function utilisateur_changer_role(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);
        return redirect()->route('admin.utilisateurs')->with('succes', 'تم تغيير الدور بنجاح');
    }
}
