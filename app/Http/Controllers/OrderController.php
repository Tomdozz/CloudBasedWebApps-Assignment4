<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Order;
use App\Product;
use App\Cost;
use App\OrderInProg;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $order = Order::all();
      //\Log::info('We are in INDEX function.');
      return view("orders.index", [
        "orders" => $order
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("orders.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $order = new Order;
      $order->title = $request->input("title");
      $order->image = $request->input("image");
      $order->description = $request->input("description");
      $order->maxprice = $request->input("price");
      $order->name = $request->input("name");
      $order->email = $request->input("email");
      $order->phonenumber = $request->input("phonenumber");
      $order->save();

      $cost = new Cost;
      $cost->order_id = $order->id;
      $cost->worktime = 0;
      $cost->meterialcost = 0;
      $cost->hourcost = 0;
      $cost->totalcost = 0;
      $cost->notes = " ";
      $cost->save();

      $orderinprog = new OrderInProg;
      $orderinprog->order_id = $order->id;
      $orderinprog->title = $request->input("title");
      $orderinprog->image = " ";
      $orderinprog->description = " ";
      $orderinprog->expecteddate = " ";
      $orderinprog->timesincestart = " ";
      $orderinprog->save();

      return redirect()->route('orders.create')->with('success', true)->with('message','Din order är registrerad!');

      //return redirect()->route('orders.create');
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
      $order = Order::find($id);
      $order->title = $request->input("title");
      $order->image = $request->input("image");
      $order->description = $request->input("description");
      $order->maxprice = $order->maxprice;
      $order->name = $request->input("name");
      $order->email = $request->input("email");
      $order->phonenumber = $request->input("phonenumber");
      $order->save();
      return redirect()->route('home')->with('delete', true)->with('message','Order'. $order->id . ' har uppdaterats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Order::destroy($id);
      DB::table('costs')->where('order_id', $id)->delete();
      DB::table('orderinprogs')->where('order_id', $id)->delete();
      return redirect()->route('home')->with('update', true)->with('message','Ordern har tagits bort');

      //return redirect()->route('home');
    }
}
