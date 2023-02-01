<?php

namespace App\Http\Controllers;

use App\Models\Depense;
use App\Models\Fournisseur;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depenses = Depense::all();
        return view('Depense.index',compact('depenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fournisseurs = Fournisseur::all();
        return view('Depense.create',compact('fournisseurs'));
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
            'categorie'=>'required',
            'SousCategorie'=>'required',
            'Date_Depense'=>'required',
            'Montant_Depense'=>'required',
            'Description'=>'required',
            'file' => 'required|mimes:pdf,csv,xls,xlsx,doc,docx,png,jpeg,ppt,pptx',
        ]);
        //Reserver pour le fichier et son nom
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/files');

        $depense = new Depense();
        $depense->fournisseur_id = $request->input('fournisseur_id');
        $depense->categorie = $request->input('categorie');
        $depense->SousCategorie = $request->input('SousCategorie');
        $depense->Date_Depense = $request->input('Date_Depense');
        $depense->Heure_Depense = $request->input('Heure_Depense');
        $depense->Montant_Depense = $request->input('Montant_Depense');
        $depense->Description = $request->input('Description');
        $depense->name = $name;
        $depense->path = $path;
        $depense->save();
        // $file = $request->file;
        // $filename = time().'.'.$file->getClientOriginalExtension();
        // $request->file->move('assets',$filename);
        // $depense->file=$filename;


        return redirect()->route('Depense.index')->with('message','Depense est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function show(int $fournisseur)
    {
        $fournisseurs = Fournisseur::all();
        $depense = Depense::findOrFail($fournisseur);
        return view('Depense.show', compact('depense','fournisseurs'));
    }

    public function download(int $fournisseur)
    {
        $fournisseurs = Fournisseur::all();
        $depense = Depense::findOrFail($fournisseur);
        return Storage::download($depense->path,$depense->name);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function edit(int $fournisseur)
    {

        $fournisseurs = Fournisseur::all();
        $depense = Depense::findOrFail($fournisseur);
        return view('Depense.edit', compact('depense','fournisseurs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */


    public function update(Request $request,$depense_id)
    {
        $depense = Depense::findOrFail($depense_id);
        $request->validate([
            'categorie'=>'required',
            'SousCategorie'=>'required',
            'Date_Depense'=>'required',
            'Montant_Depense'=>'required',
            'Description'=>'required',
            'file' => 'required|mimes:pdf,csv,xls,xlsx,doc,docx',
        ]);


        $payload = $request->post();

        if ($fichier = $request->file('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $path = $request->file('file')->store('public/files');
        }
        else{
            unset($payload['file']);
        }

        $depense->update($payload);

        return redirect()->route('Depense.index')->with('message','Depense est Modifier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depense  $depense
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Depense::findorFail($id)->delete();
        return redirect()->route('Depense.index')->with('message','Le depense est supprime avec success');
    }
}
