<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecoles = Ecole::all();
        return view('Ecole.index',compact('ecoles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Ecole.create');
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
            'Nom_Ecole'=>'required',
            'Academie'=>'required',
            'Commune'=>'required',
            'Direction_provinciable'=>'required',
        ]);

        $requestData = $request->all();

        if ($image = $request->file('Photo')) {
            $fileName = time().$request->file('Photo')->getClientOriginalName();
            $path = $request->file('Photo')->storeAs('images' , $fileName , 'public');
            $requestData["Photo"] = '/storage/'.$path;
        }

        Ecole::create($requestData);

        return redirect()->route('Ecole.index')->with('message','Ecole est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ecole = Ecole::find($id);
        return view('Ecole.show')->with('ecoles',$ecole);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ecole = Ecole::findorFail($id);
        return view('Ecole.edit', compact('ecole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ecole = Ecole::findorFail($id);

        $request->validate([
            'Nom_Ecole'=>'required',
            'Academie'=>'required',
            'Commune'=>'required',
            'Direction_provinciable'=>'required',
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

        $ecole->update($requestData);

        return redirect()->route('Ecole.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ecole  $ecole
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Ecole::findorFail($id)->delete();
        return redirect()->route('Ecole.index')->with('message','Ecole est supprime avec success');
    }
}
