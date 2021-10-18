<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    public function index(){
        $products = HTTP::get('https://jsonplaceholder.typicode.com/users');
        //$productsArray = $products->json();
        $productsArray = $products->object();
        return view('home', compact('productsArray'));
    }
}
