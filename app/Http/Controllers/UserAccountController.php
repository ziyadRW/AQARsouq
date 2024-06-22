<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserAccountController extends Controller
{
    public function create(){
        return inertia('UserAccount/Create');
    }

    public function store(Request $request){
        $form = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => ['required','confirmed','min:8','max:30',
                'regex:/[a-z]/', // must contain at least one lowercase letter
                'regex:/[A-Z]/', // must contain at least one uppercase letter
                'regex:/[0-9]/', // must contain at least one digit
                'regex:/[@$!%*#?&]/' // must contain a special character
            ],
        ], ['password.regex' => 'The password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character.']
        );

/*      $form['password']= Hash::make($form['password']); this one allow you to choose the hashing algorithrm you want */
        $form['password']= bcrypt($form['password']);
        // or third way for hashing is to implement an Attribute function in the User Model
        
        $user= User::create($form);

        auth()->login($user);
        
        return redirect()->intended(route('listings.index'))->with('success', 'account created and logged in !');
    }
}
