<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class AdminController extends Controller
{
    
    public function index(){
        // api is consumed 
        $products = HTTP::get($_SERVER['HTTP_HOST'] . '/api/products');
        $users = HTTP::get($_SERVER['HTTP_HOST'] . '/api/users');
        //transform api data in an object
        $productsObject = $products->object();
        $usersObject = $users->object();
        //count products and users
        if($productsObject->data != []){
            $productsCount = count($productsObject->data);
        }else{
            $productsCount = 0;
        }
        if($usersObject->data != []){
            $usersCount = count($usersObject->data);
        }else{
            $usersCount = 0;
        }
        return view('admin.dashboard',compact('productsCount', 'usersCount'));
    }
}
