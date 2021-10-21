<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use App\Models\Product;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        // api/product is consumed 
        $products = HTTP::get($_SERVER['HTTP_HOST'] . '/api/products');
        //transform api data in an object
        $productsObject = $products->object();
        return view('includes.products', compact('productsObject'));
    }

    /**
     * Show the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function product($product){
        $response = Http::get($_SERVER['HTTP_HOST'] . '/api/products/' . $product);
        //transform api data in an object
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('home')
            ->with('error', 'Something not ideal might be happening.');
        }
        $product = $responseObject->data;
        return view('includes.product', compact('product'));
    }

    public function typ(){
        return view('includes.typ');
    }
}
