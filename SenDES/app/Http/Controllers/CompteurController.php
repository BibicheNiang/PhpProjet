<?php

namespace App\Http\Controllers;
use App\Models\Compteur;
use Illuminate\Http\Request;

class CompteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compteurs=Compteur::all();
        return view('compteur',compact('compteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compteur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edite($id)
    {
        $compteurs=Compteur::find($id);
        return view('editioncompteur', compact('compteurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updated(Request $request, $id)
    {
        $request->validate([
            'numero'=>'required'
          ]);
    
          $compteurs = Compteur::find($id);
          $compteurs->numero = $request->get('numero');
          $compteurs->save();
    
          return redirect('/compteur')->with('success', 'Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compteurs=Compteur::find($id);
        $compteurs->delete();
        return view('compteur', compact('compteurs'));
    }
}
