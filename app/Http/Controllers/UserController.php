<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserModel;
use Illuminate\Support\Facades\Validator;
use DB;

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
    function pay(){
        return view('rozarPay');
    }
    function load_data(Request $request)
            {
             if($request->ajax())
             {
              if($request->id > 0)
              {
               $data = DB::table('dummy')
                  ->where('id', '<', $request->id)
                  ->orderBy('id', 'DESC')
                  ->limit(5)
                  ->get();
              }
              else
              {
               $data = DB::table('dummy')
                  ->orderBy('id', 'DESC')
                  ->limit(5)
                  ->get();
              }
              $output = '';
              $last_id = '';
              
              if(!$data->isEmpty())
              {
               foreach($data as $row)
               {
                $output .= '
                <div class="row">
                 <div class="col-md-12">
                  <h3 class="text-info"><b>'.$row->name.'</b></h3>
                  <p>'.$row->name.'</p>
                  <br />
                  <div class="col-md-6">
                   <p><b>Publish Date - '.$row->email.'</b></p>
                  </div>
                  <div class="col-md-6" align="right">
                   <p><b><i>By - '.$row->name.'</i></b></p>
                  </div>
                  <br />
                  <hr />
                 </div>         
                </div>
                ';
                $last_id = $row->id;
               }
               $output .= '
               <div id="load_more">
                <button type="button" name="load_more_button" class="btn btn-success form-control" data-id="'.$last_id.'" id="load_more_button">Load More</button>
               </div>
               ';
              }
              else
              {
               $output .= '
               <div id="load_more">
                <button type="button" name="load_more_button" class="btn btn-info form-control">No  More Data Found</button>
               </div>
               ';
              }
              echo $output;
             }
            }
        

    function viewMore()
            {
             return view('load_more');
            }

   

}
