<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\Frais;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
//use PDF;
class FraisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frais = Frais::all();
        return view('Frais.index',compact('frais'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $etudiants = Etudiant::all();
        return view('Frais.create',compact('etudiants'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Validation rules
         $request->validate([
            'MontantPaiement'=>'required|min:1|max:5000',
            'DatePaiement'=>'required',
            'DateFrom'=>'required',
            'DateTo'=>'required',
        ]);

            $frais = new Frais();
            $frais->etudiant_id = $request->input('etudiant_id');
            $frais->MontantPaiement = $request->input('MontantPaiement');
            $frais->DatePaiement = $request->input('DatePaiement');
            $frais->DateFrom = $request->input('DateFrom');
            $frais->DateTo = $request->input('DateTo');
            $frais->save();

            return redirect()->route('Frais.index')->with('message','Frais est Ajouter');
    }




    // $etudiant = Frais::create([
        //     'etudiant_id'=>$request['etudiant_id'],
        //     'MontantPaiement'=>$request['MontantPaiement'],
        //     'DatePaiement'=>$request['DatePaiement'],
        //     'PeriodePaiement'=>$request['PeriodePaiement'],
        // ]);
        // $etudiant = Frais::get();
        // dd($etudiant);



        // $frais = new Frais;
        // $etudiant->etudiant_id = $request->input('etudiant_id');
        // $frais->MontantPaiement = $request->input('MontantPaiement');
        // $frais->DatePaiement = $request->input('DatePaiement');
        // $frais->PeriodePaiement = $request->input('PeriodePaiement');
        // $frais->etudiant()->associate($etudiant);
        // $frais->save();

          //$frais = new Frais(array('$request->etudiant_id',$request->input('MontantPaiement'),$request->input('DatePaiement'),$request->input('PeriodePaiement')));
          //$etudiant = Etudiant::find(1);
          //$frais = $etudiant->frais()->save($frais);

            // $data = $request->all();


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frais  $frais
     * @return \Illuminate\Http\Response
     */
    public function show(int $etudiant)
    {
        $etudiants = Etudiant::all();
        $frais = Frais::findOrFail($etudiant);
        return view('Frais.show', compact('frais','etudiants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frais  $frais
     * @return \Illuminate\Http\Response
     */
    public function edit(int $etudiant)
    {
        $etudiants = Etudiant::all();
        $frais = Frais::findOrFail($etudiant);
        return view('Frais.edit', compact('frais','etudiants'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frais  $frais
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$frais_id)
    {
        $frais = Frais::findOrFail($frais_id);
        $payload = $request->post();
        $frais->update($payload);
        return redirect()->route('Frais.index')->with('message','Frais est Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frais  $frais
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Frais::findorFail($id)->delete();
        return redirect()->route('Frais.index')->with('message','Le frais d\'etudiant est supprime avec success');
    }
    public function pdf($etudiant)
    {
        $etudiants = Etudiant::all();
        $frais = Frais::findOrFail($etudiants);
        //$f=$frais;
        view()->share('frais','etudiants');
        $pdf = PDF::loadView('Frais/TestPdf', $frais)->output();

        return $pdf->download('file.pdf');

    }

}
