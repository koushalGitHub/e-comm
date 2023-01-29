<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;

class UserController extends Controller
{
    function login(Request $req)
    {
        $user =  UserModel::where(['email' => $req->email])->first();
        if($user || Hash::check($req->password,$user->password))
        {
            $req->session()->put('user', $user);
            return redirect('/home');
        }else{
            return "Username  or password is not match";
        }
    }
}
