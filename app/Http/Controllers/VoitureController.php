<?php

namespace App\Http\Controllers;

use App\Models\Voiture;
use App\Http\Controllers\Controller;
use App\Models\Magasin;
use App\Models\Marque;
use Illuminate\Http\Request;

class VoitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allVoitures = Voiture::all();
        $allMarques = Marque::all(); //il faut récupérer un tableau avec tout les objets marque parce que cela fait partie de voiture et parce que après on en aurra besoin pour store
        $allMagasins = Magasin::all(); //il faut récupérer un tableau avec tout les objets magasin parce que cela fait partie de voiture et parce que après on en aurra besoin pour store


        return view('voiture_index', compact('allVoitures', 'allMarques', 'allMagasins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pas besoin de le renseigner car nous n'avons pas de vue dediée
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //dd(request());
        $voiture = new Voiture;
        $voiture->label = request()->label;
        $voiture->id_marque = request()->marque;
        $voiture->id_magasin = request()->magasin;
        $voiture->save();
        return redirect('/voiture');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function show(Voiture $voiture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $voiture = Voiture::find($id);
        $marque = (Marque::find($voiture->id_marque))->label;

        /*$marque = Marque::find($voiture->id_marque);
        $label = $marque->label;*/

        $magasin = (Magasin::find($voiture->id_magasin))->label;

        $allMarques = Marque::all(); //il faut récupérer un tableau avec tout les objets marque parce que cela fait partie de voiture et parce que après on en aurra besoin pour store
        $allMagasins = Magasin::all(); //il faut récupérer un tableau avec tout les objets magasin parce que cela fait partie de voiture et parce que après on en aurra besoin pour store

        return view('edit_voiture', compact('voiture', 'marque', 'magasin','allMarques', 'allMagasins'));//? 'magasin' dans compact('voiture')-	Voiture c’est le tableau d’objets, mais la fonction compact de laravel reconnait que c’est le tableau et il n’y a pas besoin de lui ajouter le $ des variables
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {

        $voiture = Voiture::find($id);
        $voiture->label = request()->label;
        $voiture->id_marque = request()->marque;
        $voiture->id_magasin = request()->magasin;
        $voiture->update();
        return redirect('/voiture');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voiture  $voiture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $voiture = Voiture::find($id);
        $voiture->delete();
        return redirect('/voiture');
    }
}
