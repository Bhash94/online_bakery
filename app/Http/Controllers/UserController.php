<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;


class UserController extends Controller
{
    public function getRegister(){
    	return view('auth.register');
    }

    public function postRegister(Request $request){
    	$this->validate($request,[
    		'email'=>'email|required|unique:users',
    		'password'=>'required|min:4'
    	]);

    	$user = new User([
    		'email'=>$request->input('email'),
    		'password'=>bcrypt($request->input('password')) 
    	]);

    	$user->save();

    	return redirect()->route('product.index');
    }

    public function getLogin(){
    	return view('auth.login');
    }

     public function postLogin(Request $request){
    	$this->validate($request,[
    		'email'=>'email|required',
    		'password'=>'required|min:4'
    	]);

    	if(Auth::attempt(['email'=>$request->input('email'), 'password'=>$request->input('password')])) {
    		return redirect()->route('product.index');
    	}

    	return redirect()->back();
    }

    public function getLogout(){
    	Auth::logout();
    	return redirect()->route('user.login');
    }


}
