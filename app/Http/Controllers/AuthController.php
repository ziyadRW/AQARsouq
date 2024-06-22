<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(){
        return inertia('Auth/Login');
    }

    public function store(Request $request){
        $form = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string'
        ]);

        if(auth()->attempt($form)){
            $request->session()->regenerate();
            return redirect()->intended(route('listings.index'));
        }

        return back()->withErrors(['email'=> 'invalid credentials'])->onlyInput('email');
    }

    public function destroy(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerate();

        return redirect()->route('listings.index');
    }
/*     public function edit(){

    }

    public function update(){

    } */
}
