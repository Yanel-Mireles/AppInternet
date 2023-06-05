<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('registro');
    }

    public function store(Request $request){
        // Dump and die imprime lo que se tiene del proyecto y lo depura
        // dd($request->get('name'));

        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users|email|',
            'password'=>'required|confirmed|min:6',
            'password_confirmation'=>'',
        ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        auth()->attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);

        return redirect()->route('post.index');
    }
}
