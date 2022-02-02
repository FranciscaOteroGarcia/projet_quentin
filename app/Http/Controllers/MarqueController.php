<?php

namespace App\Http\Controllers;

use App\Models\Marque;
use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class MarqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marque = Marque::all();
        return view('marque_index', compact('marque'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //pas besoin d'une vue create car peu de données à renseigner. On se servira de l'index avec un petit formulaire
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $newMarque= new Marque();
        $newMarque->label = request()->label;
        $newMarque->save();
        return redirect('/marque');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function show(Marque $marque)
    {
        // On aura pas non plus besoin d'un vue show dediée car peu de données à montrer
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $marque = Marque::find($id);
        return view('edit_marque', compact('marque')); //? 'edit_marque' dans compact('marque')-	Magasin c’est le tableau d’objets, mais la fonction compact de laravel reconnait que c’est le tableau et il n’y a pas besoin de lui ajouter le $ des variables
      }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
            $marque = Marque::find($id);
            $marque->label = request()->label;
            $marque->update();
            return redirect('/marque');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marque  $marque
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marque = Marque::find($id);
        $voiture=null;
        $voiture = Voiture::where('id_marque' , $id)->first();
        if($voiture==null)
            $marque->delete();
        return redirect('/marque');
    }
}
