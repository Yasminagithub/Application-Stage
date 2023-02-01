<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use App\Models\Renumeration;
use Illuminate\Http\Request;

class RenumerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renumerations = Renumeration::all();
        return view('Renumeration.index',compact('renumerations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employes = Employe::all();
        return view('Renumeration.create',compact('employes'));
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
            'Type_renumeration'=>'required',
            'Valeur_renumeration'=>'required|min:1|max:10000',
            'Date_renumeration'=>'required',
            'DateFrom'=>'required',
            'DateTo'=>'required',
        ]);

        $renumeration = new Renumeration();
        $renumeration->employe_id = $request->input('employe_id');
        $renumeration->Type_renumeration = $request->input('Type_renumeration');
        $renumeration->Valeur_renumeration = $request->input('Valeur_renumeration');
        $renumeration->Date_renumeration = $request->input('Date_renumeration');
        $renumeration->DateFrom = $request->input('DateFrom');
        $renumeration->DateTo = $request->input('DateTo');
        $renumeration->save();

        return redirect()->route('Renumeration.index')->with('message','Renumeration est Ajouter');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Renumeration  $renumeration
     * @return \Illuminate\Http\Response
     */
    public function show(int $employe)
    {
        $employes = Employe::all();
        $renumeration = Renumeration::findOrFail($employe);
        return view('Renumeration.show', compact('renumeration','employes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Renumeration  $renumeration
     * @return \Illuminate\Http\Response
     */
    public function edit(int $employe)
    {
        $employes = Employe::all();
        $renumeration = Renumeration::findOrFail($employe);
        return view('Renumeration.edit', compact('renumeration','employes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Renumeration  $renumeration
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request,$employe)
    // {



    //      //Validation rules
    //      $request->validate([
    //         'Type_renumeration'=>'required',
    //         'Valeur_renumeration'=>'required|min:1|max:10000',
    //         'Date_renumeration'=>'required',
    //         'DateFrom'=>'required',
    //         'DateTo'=>'required',
    //     ]);

    //     // $renumeration = Renumeration::findOrFail($employe);
    //     // $payload = $request->post();
    //     // $renumeration->employe->update($payload);

    //     // $renumeration->employe_id = $request->input('employe_id');
    //     // $renumeration->Type_renumeration = $request->input('Type_renumeration');
    //     // $renumeration->Valeur_renumeration = $request->input('Valeur_renumeration');
    //     // $renumeration->Date_renumeration = $request->input('Date_renumeration');
    //     // $renumeration->DateFrom = $request->input('DateFrom');
    //     // $renumeration->DateTo = $request->input('DateTo');
    //     // $renumeration->update();

    //     // $renumeration = Employe::where('employe_id',$employe_id)->first();
    //     // $payload = $request->post();
    //     // $renumeration->update($payload);

    //     $renumeration = Employe::find($employe_id)->first();
    //     $payload = $request->post();
    //     $employe->renumeration->update($payload);

    //     return redirect()->route('Renumeration.index')->with('message','Renumeration est Modifier');
    // }

        public function update(Request $request,$renumeration_id){

            $renumeration = Renumeration::findOrFail($renumeration_id);
            $payload = $request->post();
            $renumeration->update($payload);
            return redirect()->route('Renumeration.index')->with('message','Renumeration est Modifier');
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Renumeration  $renumeration
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Renumeration::findorFail($id)->delete();
        return redirect()->route('Renumeration.index')->with('message','La Renumeration d\'employe est supprime avec success');
    }
}
