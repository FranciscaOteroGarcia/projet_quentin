<?php

namespace App\Http\Controllers;

use App\Models\Magasin;
use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class MagasinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $magasin = Magasin::all();
      return view('magasin_index', compact('magasin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       // dd(request());

       $newMagasin = new Magasin();
       $newMagasin->label = request()->label;

        // dd($newMagasin);
        $newMagasin->save();
        return redirect('/magasin'); /// ce n'est pas un url, c'est la route, pour cela il n'y a pas de /cor
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function show(Magasin $magasin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)  //si pas sur la meme page, on utilise la méthode edit
    {
        $magasin= Magasin::find($id);
        return view('edit_magasin', compact('magasin'));//? 'magasin' dans compact('magasin')-	Magasin c’est le tableau d’objets, mais la fonction compact de laravel reconnait que c’est le tableau et il n’y a pas besoin de lui ajouter le $ des variables
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //dd(request(), $id);
        $magasin= Magasin::find($id);
        $magasin->label = request()->label;
        $magasin->update();
        return redirect('/magasin');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magasin  $magasin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magasin = Magasin::find($id);

        /**
         * $voiture = Voiture::all();
         * $ok = true;
         * foreach($voiture as $voit){
         *      $idMarque = $voit->id_marque;
         *      if( $idMarque = $id ){
         *          $ok = false;
         *          break;
         *      }
         * }
         * if($ok = false)
         *      $magasin->delete();
         *
         * return redirect('/magasin');
         */
        $voiture = null;

         $voiture = Voiture::where('id_magasin', $id)->first();

            if($voiture==null){
                $magasin->delete();
            }

        return redirect('/magasin');
    }
}
