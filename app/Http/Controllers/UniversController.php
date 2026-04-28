<?php

namespace App\Http\Controllers;

use App\Mail\InfoMail;
use App\Models\Favori;
use App\Models\Univers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class UniversController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public static function middleware()
    {
        return [new middleware('admin_test', ['univers.supprimer'])];
    }

    public function index(): View
    {
        $liste = Univers::all();

        return view('univers_info', compact('liste'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $liste = Univers::all();

        return view('formulaire', compact('liste')); // affiche le formulaire de création
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required|max:1000',
            'img' => 'required|file|mimes:png,jpg,jpeg',
            'ImgDeFond' => 'required|file|mimes:png,jpg,jpeg',
            'couleur_principale' => 'required|hex_color',
            'couleur_secondaire' => 'required|hex_color',
        ]);

        $pathImg = $request->file('img')->store('image', 'public');
        $pathImgFond = $request->file('ImgDeFond')->store('image', 'public');

        Univers::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'lien_vers_le_logo' => $pathImg,
            'lien_vers_l_image' => $pathImgFond,
            'couleur_principale' => $request->couleur_principale,
            'couleur_secondaire' => $request->couleur_secondaire,
        ]);

        return redirect()->route('/')->with('success', 'univers crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Univers $univers): void
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id): View
    {
        $univers = Univers::findOrFail($id);

        return view('formulaire', compact('univers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $univers = Univers::findOrFail($id);

        $request->validate([
            'nom' => 'required|max:255',
            'description' => 'required|max:1000',
            'couleur_principale' => 'required|hex_color',
            'couleur_secondaire' => 'required|hex_color',
        ]);

        if ($request->hasFile('img')) {
            \Storage::disk('public')->delete($univers->lien_vers_le_logo);
            $univers->lien_vers_le_logo = (string) $request->file('img')->store('image', 'public');
        }

        if ($request->hasFile('ImgDeFond')) {
            \Storage::disk('public')->delete($univers->lien_vers_l_image);
            $univers->lien_vers_l_image = (string) $request->file('ImgDeFond')->store('image', 'public');
        }

        $univers->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'couleur_principale' => $request->couleur_principale,
            'couleur_secondaire' => $request->couleur_secondaire,
        ]);

        return redirect()->route('/')->with('success', 'Univers mis à jour avec succès !');
    }

    public function supprimer(int $id): RedirectResponse
    {
        $univers = Univers::findOrFail($id);

        if ($univers->lien_vers_le_logo) {
            \Storage::disk('public')->delete($univers->lien_vers_le_logo);
        }
        if ($univers->lien_vers_l_image) {
            \Storage::disk('public')->delete($univers->lien_vers_l_image);
        }

        $univers->delete();

        return redirect()->route('/')->with('success', 'Univers supprimé avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Univers $univers): RedirectResponse
    {
        Auth::logout();

        return redirect()->route('/')->with('success', 'déconnecter');
    }

    public function envoyerMail(): RedirectResponse
    {
        $details = [
            'nom' => 'Jules',
            'email' => 'jules@example.com',
            'message' => 'Ceci est un test Mailtrap ! 🚀',
        ];

        Mail::to('jules.pecquereau4@gmail.com')->send(new InfoMail($details));

        return redirect()->route('/')->with('success', 'Email envoyer !');
    }

    public function toggleFavori(Request $request): JsonResponse
    {
        $universId = $request->input('univers_id');
        $userId = auth()->id();

        $favori = Favori::where('user_id', $userId)
            ->where('univers_id', $universId)
            ->first();

        if ($favori) {
            $favori->delete();
            $status = 'removed';
        } else {
            Favori::create([
                'user_id' => $userId,
                'univers_id' => $universId,
            ]);
            $status = 'added';
        }

        return response()->json(['status' => $status]);
    }
}
