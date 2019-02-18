<?php

namespace App\Http\Controllers;
use App\Models\Facture;
use App\Models\Abonnement;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factures=Facture::all();
        $abonnements=Abonnement::all();
        return view('facture',compact('factures','abonnements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facture');
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
            'mois'=>'required',
            'abonnement'=>'required'
          ]);
          $factures = new Facture([
            'mois' => $request->get('mois'),
            'comsommation'=>'300',
            'prix'=>'600000',
            'reglement'=>'0',
            'abonnement_id'=>$request->get('abonnement')
          ]);
          $factures->save();
          return Redirect('/facture')->with('success', 'Facture enregistrée avec succes');

       
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
    public function editedd($id)
    {
        $factures=Facture::find($id);
        return view('editionfacture', compact('factures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedd(Request $request, $id)
    {
        $request->validate([
            'mois'=>'required',
            'abonnement'=>'required'
          ]);
    
          $factures = Facture::find($id);
          $factures->contrat = $request->get('mois');
          $factures->date = $request->get('abonnement');
          $factures->save();
    
          return redirect('/facture')->with('success', 'Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroye($id)
    {
        $f=Facture::find($id);
        $f->delete();
        $factures=Facture::all();
        $abonnements=Abonnement::all();
        return view('facture',compact('factures'),compact('abonnements'))->with('success', 'Suppression reussie');
    }

    public function generer($id)
    {
        $factures = Facture::with('abonnement')->where('id',$id)->get();
        $pdf = PDF::loadView('factureformat', compact('factures'));
        return $pdf->stream();
        //var_dump($factures);
       // die();
        $content = $pdf->output();
        //{{$factures->abonnement->contrat}}
        $path = 'factures/NomFichier.pdf';
        file_put_contents(public_path($path), $content);
        return $pdf->stream();
        
    }
    public function liste()
    {
        $abonnements=Abonnement::all();
        return view('editionfacture',compact('abonnements'));
    }
    public function showapi()
    {
        $factures = Facture::with('abonnement')->get();
        return response()->json($factures);
    }

    public function showapiwithid()
    {
        //$factures=Facture::find($id);
        $factures = Facture::with('abonnement')->get();
        return response()->json($factures);
    }
}
