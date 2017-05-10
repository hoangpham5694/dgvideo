<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
	public function getLogin(){
    /*	if(!Auth::guard('teachers')->check() && !Auth::guard('students')->check() && !Auth::guard('users')->check() ){
    		return view('login.login');
    	}else{
    	//	return redirect('adminsites');
    		echo "you are login as ";
            if(Auth::guard('teachers')->check()) echo "teacher";
            if(Auth::guard('students')->check()) echo "student";
            if(Auth::guard('users')->check()) echo "user";
    	}
        */
    	return view('login.login');
    }
   	public function postLogin(LoginRequest $request)
   	{
   		$login = ['username' => $request->txtUsername,
    	 'password' => $request->txtPassword,
         ];
  		if (Auth::attempt($login)) {
            // Authentication passed...
          //  dd(Auth::user()->role);
            if(Auth::user()->level == 1 ){
                return redirect('adminsites');
            }
            if(Auth::user()->level == 2){
                return redirect('managersites');
            }
           // return redirect('adminsites');
        } else {
        	return redirect()->back();
        }


   	}
}
