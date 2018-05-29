<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Exceptions\Handler;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent;
use Exception;

class ProductController extends Controller
{
  public function __construct(){
    $this->middleware('auth', ['except' => ['index', 'show']]);
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      return view("products.index", [
        "products" => $products
      ]);
    }
    public function handleProducts()
    {
      $products = Product::all();
      //\Log::info('We are in INDEX function.');
      return view("products.edit", [
        "products" => $products
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view("products.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $product = new Product;
      $product->title = $request->input("title");
      $product->image = $request->input("image");
      $product->description = $request->input("description");
      $product->price = $request->input("price");
      $product->save();
      return redirect()->route('products.create')->with('success', true)->with('message','Produkten '. $product->title . ' har lagts till!');

      //return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      try{
        $product = Product::findOrFail($id);
      }
      catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return view("errors.generalerror", ["exceptionMessage" => $exception->getMessage() ,
        "errorMessage"=>"Tyvärr produkten finns inte!", "errorCode" => "404"]);
        //->with('error',true)->with('message','Produkten du letar efter finns inte!');
      }
      return view("products.show", [
        "product" => $product
      ]);
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
      try{
        $product = Product::findOrFail($id);
        $product->title = $request->input("title");
        $product->image = $request->input("image");
        $product->description = $request->input("description");
        $product->price = $request->input("price");
        $product->save();
      } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return view("errors.404", ["exception" => $exception]);
      }
      return redirect()->route('products.create');
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
        $product = Product::findOrFail($id);
      } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $exception){
        return view("errors.404", ["exception" => $exception]);
      }
      Product::destroy($id);
      return redirect()->route('products.create');
    }
}
