<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Order;
use App\Product;
use App\Cost;
use App\OrderInProg;
class OrderController extends Controller
{
    public function __construct(){
      $this->middleware('auth', ['except' => ['index', 'show', 'create','store']]);
    }
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
      return response()->view("orders.create")->setStatusCode(200 );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try{
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

        $orderinprog = new OrderInProg;
        $orderinprog->order_id = $order->id;
        $orderinprog->title = $request->input("title");
        $orderinprog->image = " ";
        $orderinprog->description = " ";
        $orderinprog->expecteddate = " ";
        $orderinprog->timesincestart = " ";

        $cost->save();
        $orderinprog->save();
      } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return response()->view("errors.generalerror", ["exceptionMessage" => $exception->getMessage() ,
        "errorMessage"=>"Något gick snett när du la till en produkt", "errorCode" => ""])->setStatusCode(304);
      }
      return redirect()->route('orders.create')->with('success', true)->with('message','Din order är registrerad!')->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //$response = new Response();
      return response()->view("errors.generalerror", ["exceptionMessage" => $exception->getMessage() ,
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
      //$response = new Response();
      return response()->view("errors.generalerror", ["exceptionMessage" => $exception->getMessage() ,
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
        $order = Order::findOrFail($id);
        $order->title = $request->input("title");
        $order->image = $request->input("image");
        $order->description = $request->input("description");
        $order->maxprice = $order->maxprice;
        $order->name = $request->input("name");
        $order->email = $request->input("email");
        $order->phonenumber = $request->input("phonenumber");
      } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return response()->view("errors.generalerror", ["exceptionMessage" => $exception->getMessage() ,
          "errorMessage"=>"Något gick snett kolla så att du gjorde rätt!", "errorCode" => "1"]);
      }
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
      try{
        Order::destroy($id);
        DB::table('costs')->where('order_id', $id)->delete();
        DB::table('orderinprogs')->where('order_id', $id)->delete();
      } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return response()->view("errors.generalerror", ["exceptionMessage" => $exception->getMessage() ,
          "errorMessage"=>"Inte implementerad än", "errorCode" => "404"])->setStatusCode(404);
      }

      return redirect()->route('home')->with('update', true)->with('message','Ordern har tagits bort');
    }
}
