<?php

namespace App\Http\Controllers;

use App\Models\Univers;
use Illuminate\Http\Request;

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
        return view('formulaire'); //affiche le formulaire de création
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom'=> 'required|string|max:255',
            'description'=> 'required|string|max:1000',
        ]);
        Univers::create([
            'nom'=> $request->nom,
            'description'=> $request->description,
        ]);
        return redirect()->route('Ajouter.form')->with('success', 'univers crée');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Univers $univers)
    {
        //
    }
}
