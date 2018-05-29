<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
      return response()->view("errors.generalerror", ["exceptionMessage" => "" ,
      "errorMessage"=>"Inte implementerad än", "errorCode" => "501"])->setStatusCode(501);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return response()->view("errors.generalerror", ["exceptionMessage" => "" ,
      "errorMessage"=>"Inte implementerad än", "errorCode" => "501"])->setStatusCode(501);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return response()->view("errors.generalerror", ["exceptionMessage" => "" ,
      "errorMessage"=>"Inte implementerad än", "errorCode" => "501"])->setStatusCode(501);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return response()->view("errors.generalerror", ["exceptionMessage" => "" ,
      "errorMessage"=>"Inte implementerad än", "errorCode" => "501"])->setStatusCode(501);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      return response()->view("errors.generalerror", ["exceptionMessage" => "" ,
      "errorMessage"=>"Inte implementerad än", "errorCode" => "501"])->setStatusCode(501);
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
      try{
        $costs = Cost::findOrFail($id);

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
      } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return response()->view("errors.generalerror", ["exceptionMessage" => "" ,
        "errorMessage"=>"Ordern hittades inte", "errorCode" => "404"])->setStatusCode(404);
      }

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
      return response()->view("errors.generalerror", ["exceptionMessage" => "" ,
      "errorMessage"=>"Inte implementerad än", "errorCode" => "501"])->setStatusCode(501);
    }
}
