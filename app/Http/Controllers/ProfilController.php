<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profils = Profil::all();
        return view('Profil.index',compact('profils'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Profil.create');
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
            'nom'=>'required',
            'Prenom'=>'required',
            //'Email'=>'required',
            'Adresse'=>'required',
            //'Photo'=>'required',
        ]);

        $requestData = $request->all();
        if ($image = $request->file('Photo')) {
            $fileName = time().$request->file('Photo')->getClientOriginalName();
            $path = $request->file('Photo')->storeAs('images' , $fileName , 'public');
            $requestData["Photo"] = '/storage/'.$path;

        }

        Profil::create($requestData);

        return redirect()->route('Profil.index')->with('message','Profil est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = Profil::find($id);
        return view('Profil.show')->with('profils',$profil);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::findorFail($id);
        return view('Profil.edit', compact('profil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $profil = Profil::findorFail($id);

        //Validation rules
        $request->validate([
            'nom'=>'required',
            'Prenom'=>'required',
            //'Email'=>'required',
            'Adresse'=>'required',
            //'Photo'=>'required',
        ]);

        $requestData = $request->all();

        if ($image = $request->file('Photo')) {
            $fileName = time().$request->file('Photo')->getClientOriginalName();
            $path = $request->file('Photo')->storeAs('images' , $fileName , 'public');
            $requestData["Photo"] = '/storage/'.$path;

        }
        else{
            unset($requestData['Photo']);
        }
        $profil->update($requestData);

        return redirect()->route('Profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profil::findorFail($id)->delete();
        return redirect()->route('Profil.index')->with('message','Profil est supprime avec success');
    }
}
