<?php

namespace App\Http\Controllers;

use App\Models\Dolgozo;
use App\Http\Requests\StoreDolgozoRequest;
use App\Http\Requests\UpdateDolgozoRequest;
use DB;


class DolgozoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dolgozok = Dolgozo::all();
        return view( "home", ["dolgozok"=>$dolgozok] );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view( "add_dolgozo" );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDolgozoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDolgozoRequest $request)
    {
        $dolgozo = new Dolgozo;
 
        $dolgozo->nev = $request->nev;
        $dolgozo->varos = $request->varos;
        $dolgozo->szuletes = $request->szuletes;
        $dolgozo->fizetes = $request->fizetes;
     
        $dolgozo->save();

        $request->session()->flash( "success", "Kiírás sikeres" );
        return redirect( "/create" );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dolgozo  $dolgozo
     * @return \Illuminate\Http\Response
     */
    public function show( $id )
    {
        $dolgozok = Dolgozo::where( "id", $id )->get();
        return view( "home", ["dolgozok"=>$dolgozok] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dolgozo  $dolgozo
     * @return \Illuminate\Http\Response
     */
    public function edit(Dolgozo $dolgozo)
    {
        //
    }

    public function showUpdateDolgozo( $id ) {
 
        $dolgozo = Dolgozo::find( $id );
     
        return view( "update_dolgozo", [
            "dolgozo" => $dolgozo
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDolgozoRequest  $request
     * @param  \App\Models\Dolgozo  $dolgozo
     * @return \Illuminate\Http\Response
     */
    public function submitUpdateDolgozo(UpdateDolgozoRequest $request)
    {
        $dolgozo = Dolgozo::find( $request[ "id" ]);
 
        $dolgozo->nev = $request[ "nev" ];
        $dolgozo->varos = $request[ "varos" ];
        $dolgozo->szuletes = $request[ "szuletes" ];
        $dolgozo->fizetes = $request[ "fizetes" ];
     
        $dolgozo->save();
    
        $request->session()->flash( "success", "Kiírás sikeres" );
        return redirect( "/home" );
    }

    public function deleteDolgozo( $id ) {
 
        $dolgozo = Dolgozo::find( $id );
        $dolgozo->delete();
     
        session()->flash( "success", "Dolgozó törölve" );
        return redirect( "/home" );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dolgozo  $dolgozo
     * @return \Illuminate\Http\Response
     */
    public function destroy(  )
    {
        //
    }
}
