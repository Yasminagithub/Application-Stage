<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;

//use App\Http\Requests\StoreEtudiantRequest;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
        return view('etudiant.index',compact('etudiants'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiant.create');
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
                'CNE'=>'required|unique:etudiants|max:10',
                'Genre'=>'required',
                'Telephone_Parent'=>'required',
                'Cycle'=>'required',
                'Niveau'=>'required',
                'Groupe'=>'required',
                //'Statut'=>'required',
                //'Nouvelle_Ecole'=>'required',
                'TypePaiement'=>'required',
                'Transport'=>'required',
                'Nom_Etudiant'=>'required',
                'Prenom_Etudiant'=>'required',
                'Date_Naissance_Etudiant'=>'required',
                //'Nunero_Telephone_Etudiant'=>'required',
                //'Email_Etudiant'=>'required',
                //'photo'=>'required',
            ]);


            // $requestData = $request->all();
            // $fileName = time().$request->file('photo')->getClientOriginalName();
            // $path = $request->file('photo')->storeAs('images' , $fileName , 'public');
            // $requestData["photo"] = '/storage/'.$path;
            // Etudiant::create($requestData);

            $requestData = $request->all();

            if ($image = $request->file('photo')) {
                $fileName = time().$request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('images' , $fileName , 'public');
                $requestData["photo"] = '/storage/'.$path;
            }

            Etudiant::create($requestData);

            return redirect()->route('etudiant.index')->with('message','Etudiant est Ajouter');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);
        return view('etudiant.show')->with('etudiants',$etudiant);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $etudiant = Etudiant::findorFail($id);
        return view('etudiant.edit', compact('etudiant'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $etudiant = Etudiant::findorFail($id);

        //Validation rules
        $request->validate([
            'CNE'=>'required',
            'Genre'=>'required',
            'Telephone_Parent'=>'required',
            'Cycle'=>'required',
            'Niveau'=>'required',
            'Groupe'=>'required',
            //'Statut'=>'required',
            //'Nouvelle_Ecole'=>'required',
            'TypePaiement'=>'required',
            'Transport'=>'required',
            'Nom_Etudiant'=>'required',
            'Prenom_Etudiant'=>'required',
            'Date_Naissance_Etudiant'=>'required',
            //'Nunero_Telephone_Etudiant'=>'required',
            //'Email_Etudiant'=>'required',
            //'photo'=>'required',
        ]);


        $requestData = $request->all();

        if ($image = $request->file('photo')) {
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images' , $fileName , 'public');
            $requestData["photo"] = '/storage/'.$path;

        }
        else{
            unset($requestData['photo']);
        }

        $etudiant->update($requestData);


        return redirect()->route('etudiant.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $etudiant
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     Etudiant::findorFail($id)->delete();
    //     return redirect()->route('etudiant.index');
    // }

    public function destroy(int $id)
    {
        Etudiant::findorFail($id)->delete();
        return redirect()->route('etudiant.index')->with('message','Etudiant est supprime avec success');

    }
}
