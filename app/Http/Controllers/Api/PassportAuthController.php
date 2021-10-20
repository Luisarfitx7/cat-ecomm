<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use App\Models\User;

class PassportAuthController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(){
        $users = User::all();
        return response()->json([
            "success" => true,
            "message" => "User List",
            "data" => $users
        ]);
    }
    /**
     * Registration Req
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:4',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);
  
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
  
        $token = $user->createToken('Laravel8PassportAuth')->accessToken;
  
        return response()->json(['token' => $token], 200);
    }
  
    /**
     * Login Req
     */
    public function login(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];
  
        if (auth()->attempt($data)) {
            $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
 
    public function userInfo() 
    {
 
     $user = auth()->user();
      
     return response()->json(['user' => $user], 200);
 
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request){
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        $user = User::create($input);
        return response()->json([
            "success" => true,
            "message" => "User created successfully.",
            "data" => $user
        ]);
    } 
    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        $user = User::find($id);
        if (is_null($user)) {
            return $this->sendError('User not found.');
        }
        return response()->json([
            "success" => true,
            "message" => "User retrieved successfully.",
            "data" => $user
        ]);
    }
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, User $user)
    {
    $input = $request->all();
    $validator = Validator::make($input, [
    'name' => 'required',
    'email' => 'required',
    'password' => 'required'
    ]);
    if($validator->fails()){
    return $this->sendError('Validation Error.', $validator->errors());       
    }
    $user->name = $input['name'];
    $user->password = $input['password'];
    $user->email = $input['password'];
    $user->save();
    return response()->json([
    "success" => true,
    "message" => "User updated successfully.",
    "data" => $user
    ]);
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(User $user)
    {
    $user->delete();
    return response()->json([
    "success" => true,
    "message" => "User deleted successfully.",
    "data" => $user
    ]);
    }
}
