<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cost;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $costs = Cost::find($id);

        $costs->worktime = $request->input("worktime") + $costs->worktime ;
        $costs->meterialcost = $request->input("material") + $costs->meterialcost ;
        $costs->hourcost = $request->input("hourcost");
        if (is_null($request->input("notes"))) {
          $costs->notes = $costs->notes;
        }
        else {
          $costs->notes = $request->input("notes");
        }
        $costs->totalcost = (($costs->hourcost * $costs->worktime) + $costs->meterialcost);
        $costs->save();
        return redirect()->route('home')->with('updatecost', true)->with('message',' Du har uppdaterat kostnaden för en order. Den totala arbetstiden är nu '
        . $costs->worktime . 'timmar. Total matatrialkostnad är: ' . $costs->meterialcost . ' kr. Detta resulterar i en totalkostnad på '
        . $costs->totalcost . 'kr.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}