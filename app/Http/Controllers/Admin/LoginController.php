<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class LoginController extends Controller
{
    public function show_login_view(){
        
        return view('admin.auth.login');
    }

    public function login(Request $request){
        $validated = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        if(Auth::guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){

            return redirect()->route('admin')->with('success','you are log in success');
        }else{
            return back()->withInput($request->only('email'))
            ->withErrors(['email' => 'These credentials do not match our records.']);

        }

    }
    public function logout(){
        auth()->logout();
        return redirect()->route('admin.showlogin');
    }
}
