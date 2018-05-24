<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderInProg;
class OrderInProgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $orderInProgs = OrderInProg::all();
      return view("orderProg.index", [
        "orderinProgs" => $orderInProgs
      ]);
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
      $orderinprg = OrderInProg::find($id);
      $orderinprg->title = $request->input("title");
      if(is_null($request->input("image"))){
        $orderinprg->image =$orderinprg->image;
      }
      else {
        $orderinprg->image = $request->input("image");
      }
      if(is_null($request->input("description"))){
        $orderinprg->description = $orderinprg->description;
      }
      else {
          $orderinprg->description = $request->input("description");
      }
      $orderinprg->save();
      return redirect()->route('home')->with('updateprocess', true)->with('message','Order processen '. $orderinprg->id . ' har uppdaterats');
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
