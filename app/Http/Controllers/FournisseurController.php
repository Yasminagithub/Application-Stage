<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fournisseurs = Fournisseur::all();
        return view('Fournisseur.index',compact('fournisseurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Fournisseur.create');
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
            'Nom'=>'required',
            //'Numero_Bancaire'=>'required',
            'Telephone'=>'required',
            //'Email'=>'required',
            //'Description'=>'required',
        ]);

        $requestData = $request->all();

        Fournisseur::create($requestData);

        return redirect()->route('Fournisseur.index')->with('message','Fournisseur est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fournisseur = Fournisseur::find($id);
        return view('Fournisseur.show')->with('fournisseurs',$fournisseur);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fournisseur = Fournisseur::find($id);
        return view('Fournisseur.edit', compact('fournisseur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $fournisseur = Fournisseur::findorFail($id);

        //Validation rules
        $request->validate([
            'Nom'=>'required',
            //'Numero_Bancaire'=>'required',
            'Telephone'=>'required',
            //'Email'=>'required',
            //'Description'=>'required',
        ]);
        $requestData = $request->all();
        $fournisseur->update($requestData);
        return redirect()->route('Fournisseur.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fournisseur  $fournisseur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Fournisseur::findorFail($id)->delete();
        return redirect()->route('Fournisseur.index')->with('message','Fournisseur est supprime avec success');
    }
}
