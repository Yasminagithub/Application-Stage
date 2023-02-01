<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employes = Employe::all();
        return view('Employe.index',compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Employe.create');
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
            'CIN'=>'required|unique:employes',
            'Nom_employe'=>'required',
            'Prenom_employe'=>'required',
            'Date_Naissance'=>'required',
            'Numero_Tel'=>'required',
           // 'Diplome'=>'required',
            'Profession'=>'required',
            'Date_Entree'=>'required',
            //'Date_Sortie'=>'required',
            //'Statut'=>'required',
            'CNSS'=>'required',
            'salaireFixe'=>'required|min:1|max:10000',
            'Adresse'=>'required',
        ]);

        $requestData = $request->all();

            if ($image = $request->file('photo')) {
                $fileName = time().$request->file('photo')->getClientOriginalName();
                $path = $request->file('photo')->storeAs('images' , $fileName , 'public');
                $requestData["photo"] = '/storage/'.$path;
            }

            Employe::create($requestData);


            return redirect()->route('Employe.index')->with('message','Employe est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employe = Employe::find($id);
        return view('Employe.show')->with('employes',$employe);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employe = Employe::find($id);
        return view('Employe.edit', compact('employe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $employe = Employe::find($id);

          //Validation rules
          $request->validate([
            'CIN'=>'required',
            'Nom_employe'=>'required',
            'Prenom_employe'=>'required',
            'Date_Naissance'=>'required',
            'Numero_Tel'=>'required',
            //'Diplome'=>'required',
            'Profession'=>'required',
            'Date_Entree'=>'required',
            //'Date_Sortie'=>'required',
            //'Statut'=>'required',
            'CNSS'=>'required',
            'salaireFixe'=>'required|min:1|max:10000',
            'Adresse'=>'required',
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

        $employe->update($requestData);


        return redirect()->route('Employe.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employe  $employe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employe::findorFail($id)->delete();
        return redirect()->route('Employe.index')->with('message','Employe est supprime avec success');
    }
}
