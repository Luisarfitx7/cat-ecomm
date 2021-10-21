<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){
        $products = Product::all();
        return response()->json([
            "success" => true,
            "message" => "Product List",
            "data" => $products
        ]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'slug' => 'required'
        ]);
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'price' => $request->price,
            'slug' => $request->slug
        ]);
        return response()->json([
            "success" => true,
            "message" => "Product created successfully.",
            "data" => $product
        ]);
    } 
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($product) {
        $product = Product::where('slug',$product)->first();
        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "Product retrieved successfully.",
            "data" => $product
        ]);
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
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required',
            'slug' => 'required'
        ]);
        $product = Product::where('id',$id)->first();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->price = $request->price;
        $product->slug = $request->slug;
        $product->update();
        return response()->json([
        "success" => true,
        "message" => "Product updated successfully.",
        "data" => $product
        ]);
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Product $product)
    {
    $product->delete();
    return response()->json([
    "success" => true,
    "message" => "Product deleted successfully.",
    "data" => $product
    ]);
    }
}
