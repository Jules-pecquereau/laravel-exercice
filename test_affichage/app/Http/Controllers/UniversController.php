<?php

namespace App\Http\Controllers;

use App\Models\Univers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UniversController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $liste = Univers::all();
        return view('univers_info' , compact('liste'));
    }
    public function AjouterForm()
    {
        $liste = Univers::all();
        return view('formulaire' , compact('liste')); //affiche le formulaire de création
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $liste = Univers::all();
        return view('formulaire' , compact('liste')); //affiche le formulaire de création
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=> 'required|max:255',
            'description'=> 'required|max:1000',
            'img'=> 'required|file|mimes:png,jpg,jpeg',
            'ImgDeFond'=> 'required|file|mimes:png,jpg,jpeg',
            'couleur_principale'=>'required|hex_color',
            'couleur_secondaire'=>'required|hex_color',
        ]);

        $pathImg = $request ->file('img')->store('image','public');
        $pathImgFond = $request ->file('ImgDeFond')->store('image','public');

        Univers::create([
            'nom'=> $request->nom,
            'description'=> $request->description,
            "lien_vers_le_logo" => $pathImg,
            "lien_vers_l_image" => $pathImgFond,
            'couleur_principale'=>$request->couleur_principale,
            'couleur_secondaire'=>$request->couleur_secondaire,
        ]);
        return redirect()->route('/')->with('success', 'univers crée');
    }

    /**
     * Display the specified resource.
     */
    public function show(Univers $univers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Univers $univers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Univers $univers)
    {
        //
    }
    public function supprimer($id){
         $univers = Univers::findOrFail($id);

    // Supprimer les fichiers image associés
    if ($univers->lien_vers_le_logo) {
        \Storage::disk('public')->delete($univers->lien_vers_le_logo);
    }
    if ($univers->lien_vers_l_image) {
        \Storage::disk('public')->delete($univers->lien_vers_l_image);
    }

    // Supprimer l'univers
    $univers->delete();

    return redirect()->route('/')->with('success', 'Univers supprimé avec succès !');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Univers $univers)
    {
        Auth::logout();
        return redirect()->route('/')->with('success', 'déconnecter');
    }
}
