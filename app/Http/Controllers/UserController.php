<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //user register
    public function userRegister(UserRequest $request){
        $validator = $request->validated();
        $validator['password']= Hash::make($validator['password']);
        $user = User::create($validator);
        $token = $user->createToken('inventory')->plainTextToken;
        return response()->json([
            "error"=>false,
            "message"=>"Token get successful",
            "user"=>$user,
            "token"=>$token
        ]);
    }
    //end

    //user login
    public function userLogin(UserLoginRequest $request){
        $validator = $request->validated();
        $user = User::where('email', $validator['email'])->first();
        if ($user) {
            if (Hash::check($validator['password'], $user->password)) {
                $token = $user->createToken('inventory')->plainTextToken;
                return response()->json([
                    "error"=>false,
                    "message"=>"Token get successful",
                    "token"=>$token
                ]);        
            } else {            
                return response()->json([
                    "error"=>false,
                    "message"=>"Password incorrect!"
                ]);
            }
        } 
        return response()->json([
            "error"=>false,
            "message"=>"User does not exists"
            ]);
    }
    //end

    //user logout
    public function userLogout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            "error"=>false,
            "message"=>"Token is deleted",
       ]);
    }
    //end
}
