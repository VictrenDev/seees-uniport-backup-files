<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{   
    // Show registration form
    public function create() {
        return view("users.register");
    }
    // Create new user
    public function store(Request $request)
    {  
       $formFields = $request->validate([  
        'name' => ['required', 'string', 'min:3', 'max:250'],
        'email' => ['required','email', 'max:250', Rule::unique('users','email')],
        'password' => ['required', 'confirmed', 'min:6'],
       ]);
       
       // Hash Password
       $formFields['password'] = Hash::make($formFields['password']);
   
       // Create User
       $user = User::create([
            'name' => $formFields['name'],
            'email' => $formFields['email'],
            'password' => $formFields['password'],
            'role' => 'user'
        ]);
        
        auth()->login($user);
        return redirect('/')->with('message', 'Account created and logged in');
    }
    
    // Show Login Form
    public function login() {
        return view('users.login');
    }
    

    // // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }

}