<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view("login");
    }

    public function store(Request $request){

        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required|min:6'
        ]);

        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            //Usar la directiva with para llenar los valores de la sesion
            return back()->with('mensaje','Credenciales incorrectas');
        } else{ //Credenciales correctas
            return redirect()->route('post.index');
        }
    }
}
