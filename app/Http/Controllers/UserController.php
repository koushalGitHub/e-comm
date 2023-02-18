<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    function login(Request $req)
    {
        $user =  UserModel::where(['email' => $req->email])->first();
        if($user &&  Hash::check($req->password,$user->password))
        {
            $req->session()->put('user', $user);
            return redirect('/home');
        }else{
            return view('login')->with('error_message', 'Email and password does not match');
        }
    }


    function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,NULL,id',
            'password' => 'required',
        ]);
    
        if(!$validator->fails()){
        $user = new UserModel;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return view('login')->with('_message', 'Registration successful!');
        }else{
    //         $errors = $validator->errors();
    // dd($errors);
            return view('register')->with('_message', 'This email address is already in use');
        }
        
    }
}
