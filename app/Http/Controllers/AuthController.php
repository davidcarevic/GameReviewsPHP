<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegRequest $request){
        if($request->has('btnReg')){
            $email=$request->input('email');
            $pass1=$request->input('pass1');
            $pass2=$request->input('pass2');
            $name=$request->input('name');
            $lastname=$request->input('lastname');

            $user= new User();

            $user->register($email,$pass1,$name,$lastname);

            return redirect('/')->with('success','Thank you for creating your account! Please,log into your account!');




        }


    }


    public function login(Request $request){

        //dd($request);
        if($request->has('btnLogin')){
            $email=$request->input('email');
            $password=$request->input('password');

            //dd($email,$password);

            $user=new User();
            $getUser=$user->checkUser($email,$password);
            //dd($getUser);

            if($getUser){
                $request->session()->put('user',$getUser);
                return redirect('/');
            }
            else{return redirect('/')->with('error','This account does not exist!');}




        }



    }
    public function logout(Request $request){
        //
        if($request->session()->has('user')){
            $request->session()->forget('user');
            $request->session()->flush();
        }
        return redirect('/');
    }


}
