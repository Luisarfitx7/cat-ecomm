<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class FrontController extends Controller
{
    public function index(){
        // api/product is consumed 
        $products = HTTP::get($_SERVER['HTTP_HOST'] . '/api/products');
        //transform api data in an object
        $productsObject = $products->object();
        return view('home', compact('productsObject'));
    }
}
