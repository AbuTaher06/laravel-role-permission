<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
     // Show login form
     public function showLoginForm()
     {
         return view('auth.login');
     }
 
     // Handle login
     public function login(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required'
         ]);
 
         if (Auth::attempt($request->only('email', 'password'))) {
             return redirect()->route('dashboard')->with('success', 'Welcome back!');
         }
 
         return back()->with('error', 'Invalid email or password.');
     }
 
     // Show registration form
     public function showRegisterForm()
     {
         return view('auth.register');
     }
 
     // Handle registration
     public function register(Request $request)
     {
         $request->validate([
             'name' => 'required|string|max:255',
             'email' => 'required|email|unique:users',
             'password' => 'required|min:6|confirmed'
         ]);
 
         $user = User::create([
             'name' => $request->name,
             'email' => $request->email,
             'password' => Hash::make($request->password)
         ]);
 
         Auth::login($user); // Auto-login after registration
         return redirect()->route('dashboard')->with('success', 'Registration successful!');
     }
 
     // Handle logout
     public function logout()
     {
         Auth::logout();
         return redirect()->route('login')->with('success', 'You have logged out.');
     }
}
