<?php

namespace App\Http\Controllers;

use App\Models\Kilometrage;
use App\Models\Transport;
use Illuminate\Http\Request;

class KilometrageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kilometrages = Kilometrage::all();
        return view('Kilometrage.index',compact('kilometrages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $transports = Transport::all();
        return view('Kilometrage.create',compact('transports'));
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
            'Kilometrage'=>'required',
            'Date_Kilometrage'=>'required',
            'Heure_Kilo'=>'required',
            'Commentaire_Kilometrage'=>'required',
        ]);

            $kilometrage = new Kilometrage();
            $kilometrage->transport_id = $request->input('transport_id');
            $kilometrage->Kilometrage = $request->input('Kilometrage');
            $kilometrage->Date_Kilometrage = $request->input('Date_Kilometrage');
            $kilometrage->Heure_Kilo = $request->input('Heure_Kilo');
            $kilometrage->Commentaire_Kilometrage = $request->input('Commentaire_Kilometrage');
            $kilometrage->save();

            return redirect()->route('Kilometrage.index')->with('message','Kilometrage est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kilometrage  $kilometrage
     * @return \Illuminate\Http\Response
     */
    public function show(int $transport)
    {
        $transports = Transport::all();
        $kilometrage  = Kilometrage::findOrFail($transport);
        return view('Kilometrage.show', compact('kilometrage','transports'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kilometrage  $kilometrage
     * @return \Illuminate\Http\Response
     */
    public function edit(int $transport)
    {
        $transports = Transport::all();
        $kilometrage  = Kilometrage::findOrFail($transport);
        return view('Kilometrage.edit', compact('kilometrage','transports'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kilometrage  $kilometrage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $transport_id)
    {
        $kilometrage = Kilometrage::findOrFail($transport_id);
        $payload = $request->post();
        $kilometrage->update($payload);
        return redirect()->route('Kilometrage.index')->with('message','Kilometrage est Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kilometrage  $kilometrage
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Kilometrage::findorFail($id)->delete();
        return redirect()->route('Kilometrage.index')->with('message','Le kilometrage est supprime avec success');
    }
}
