<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // api is consumed 
        $users = HTTP::get($_SERVER['HTTP_HOST'] . '/api/users');
        //transform api data in an object
        $usersObject = $users->object();
        //verify api response
        if($usersObject == []){
            return redirect()->route('users.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return view('admin.users.index', compact('usersObject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
            'email' => 'required',
            'password' => 'required'
        ]);
        $response = Http::post($_SERVER['HTTP_HOST'] . '/api/users', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        //transform api data in an object
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('users.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = Http::get($_SERVER['HTTP_HOST'] . '/api/users/' . $id);
        //transform api data in an object
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('users.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        $user = $responseObject->data;
        return view('admin.users.update', compact('user'));
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
            'email' => 'required',
            'password' => 'required'
        ]);
        $response = Http::put($_SERVER['HTTP_HOST'] . '/api/users/' . $id, [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('users.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::delete($_SERVER['HTTP_HOST'] . '/api/users/' . $id);
        $responseObject = $response->object();
        //verify api response
        if($responseObject == []){
            return redirect()->route('users.index')
            ->with('error', 'Something not ideal might be happening.');
        }
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully.');
    }
}
