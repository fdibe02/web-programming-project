<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Session;
use App\Models\User;

class AuthController extends BaseController
{
    public function showAuthPage(){

        if(Session::get('user_id')){
            return redirect('home');
        }

        $error = Session::get('error');
        Session::forget('error');

        return view('auth')->with('error', $error);
    }

    public function register(Request $request){
        if(empty($request->name) || empty($request->surname) || empty($request->email) || empty($request->password)){
            Session::put('error', 'empty_fields');
            return redirect('auth');
        }

        if(!filter_var($request->email, FILTER_VALIDATE_EMAIL) || strlen($request->password) < 8){
            Session::put('error', 'invalid_format');
            return redirect('auth');
        }

        if(strcmp($request->password, $request->conf_password)){
            Session::put('error', 'passwds_dnt_match');
            return redirect('auth');
        }

        if(User::where('email', $request->email)->first()){
            Session::put('error', 'email_exists');
            return redirect('auth')->withInput();
        }

        $user = new User();
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_BCRYPT);
        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->save();

        Session::put('user_id', $user->id);

        return redirect('home');
    }


     public function login(Request $request){

        if(empty($request->email) || empty($request->password)){
            Session::put('error', 'empty_fields');
            return redirect('auth');
        }

        $user = User::where('email', $request->email)->first();

        if(!$user || !password_verify($request->password, $user->password)){

            Session::put('error', 'wrong');
            return redirect('auth')->withInput();
        }

        Session::put('user_id', $user->id);

        return redirect('home');

        }

        public function logout(){

            Session::flush();
            return redirect('auth');
        }

        



    }
