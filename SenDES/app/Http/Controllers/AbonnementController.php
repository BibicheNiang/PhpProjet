<?php

namespace App\Http\Controllers;
use App\Models\Abonnement;
use App\Models\Compteur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbonnementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abonnements=Abonnement::all();
        return view('abonnement',compact('abonnements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('abonnement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'contrat'=>'required',
            'date'=>'required',
            'cumulNouv'=>'required',
            'numerocompteur'=>'required'
          ]);
         
          DB::beginTransaction();
          try{
           $compteur = new Compteur([
                'numero' => $request->get('numerocompteur')
              ]);
              
              $compteur->save();
              $abonnement = new Abonnement([
                'contrat' => $request->get('contrat'),
                'date'=>$request->get('date'),
                'cumulNouv'=>$request->get('cumulNouv'),
                'compteur_id'=>$compteur->id
              ]);
              $abonnement->save();
          }catch(ValidateException $e){
                DB::rollback();
                var_dump($e->getErrors());
          }
          DB::commit();
          return Redirect('/abonnement')->with('success', 'Abonnement enregistré avec succes');
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
    public function edit($id)
    {
        $abonnements=Abonnement::find($id);
        return view('editionabonnement', compact('abonnements'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'contrat'=>'required',
            'date'=>'required',
            'cumulNouv'=>'required'
          ]);
    
          $abonnements = Abonnement::find($id);
          $abonnements->contrat = $request->get('contrat');
          $abonnements->date = $request->get('date');
          $abonnements->cumulNouv = $request->get('cumulNouv');
          $abonnements->save();
    
          return redirect('/abonnement')->with('success', 'Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $a=Abonnement::find($id);
        $a->delete();
        $abonnements=Abonnement::all();
        return view('abonnement',compact('abonnements'))->with('success', 'Suppression reussie');
    }
}
