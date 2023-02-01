<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Employe;
use App\Models\Kilometrage;
use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = Transport::all();
        return view('Transport.index',compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$employes = Employe::all();
        $employes = DB::table('employes')->where('Profession', 'Chauffeur')->get();
        return view('Transport.create',compact('employes'));
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
            'Immatriculation'=>'required',
            'Marque'=>'required',
            'Date_fin_Vignette'=>'required',
            'Date_Visite_Assurance_Debut'=>'required',
            'Date_Visite_Assurance_Fin'=>'required',
            'Date_Visite_technique_Fin'=>'required',
            'Date_Visite_equipement_Fin'=>'required',
        ]);

        $transport = new Transport();
        $transport->employe_id = $request->input('employe_id');
        $transport->Immatriculation = $request->input('Immatriculation');
        $transport->Marque = $request->input('Marque');
        $transport->Date_fin_Vignette = $request->input('Date_fin_Vignette');
        $transport->Date_Visite_Assurance_Debut = $request->input('Date_Visite_Assurance_Debut');
        $transport->Date_Visite_Assurance_Fin = $request->input('Date_Visite_Assurance_Fin');
        $transport->Date_Visite_technique_Fin = $request->input('Date_Visite_technique_Fin');
        $transport->Date_Visite_equipement_Fin = $request->input('Date_Visite_equipement_Fin');
        $transport->save();

        return redirect()->route('Transport.index')->with('message','Transport est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function show(int $employe)
    {
        $employes = Employe::all();
        $transport = Transport::findOrFail($employe);
        return view('Transport.show', compact('transport','employes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function edit(int $employe)
    {
        $employes = Employe::all();
        $transport = Transport::findOrFail($employe);
        return view('Transport.edit', compact('transport','employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,$transport_id){

        $transport = Transport::findOrFail($transport_id);
        $payload = $request->post();
        $transport->update($payload);
        return redirect()->route('Transport.index')->with('message','Transport est Modifier');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transport  $transport
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
         Transport::findorFail($id)->delete();
        return redirect()->route('Transport.index')->with('message','le materiel de Transport et ses kilometrage sont supprimes');
    }
}
