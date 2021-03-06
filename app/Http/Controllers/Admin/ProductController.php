<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Str as Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // api is consumed 
        $products = HTTP::get($_SERVER['HTTP_HOST'] . '/api/products');
        //transform api data in an object
        $productsObject = $products->object();
        //verify api response
        if($productsObject == []){
            return redirect()->route('products.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return view('admin.products.index', compact('productsObject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required'
        ]);
        
        $slug = Str::slug($request->name);
        $price= floatval($request->price);
        $response = Http::post($_SERVER['HTTP_HOST'] . '/api/products', [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $price,
            'status' => $request->status,
            'slug' => $slug
        ]);
        //transform api data in an object
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('products.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $response = Http::get($_SERVER['HTTP_HOST'] . '/api/products/' . $product);
        //transform api data in an object
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('products.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        $product = $responseObject->data;
        return view('admin.products.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
            'price' => 'required'
        ]);
        $slug = Str::slug($request->name);
        $price= floatval($request->price);
        $response = Http::put($_SERVER['HTTP_HOST'] . '/api/products/' . $id, [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $price,
            'status' => $request->status,
            'slug' => $slug
        ]);
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('products.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($_SERVER['HTTP_HOST'] . '/api/products/' . $id);
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('products.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }

}
