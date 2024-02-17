<?php

namespace App\Http\Controllers\Catalog;

use Illuminate\Http\Request;
use App\Models\User as UserModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Contracts\Session\Session;


class User extends Controller {

    public function __construct() {
        $this->middleware('guest')->except(['logout', 'dashboard']);
    }

    public function register() {

        $data = [
                'title' => 'Register Page Meta',
                'description' => 'Register Page Description'
        ];


       return  view('catalog.register', $data);


    }

    public function registerPost(Request $request) {

        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        UserModel::create([
            'name' => $request->name,
            'email' => $request->email,
            'is_admin' => 5,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');

    }


    public function login() {

        $data = [
            'title' => 'Login Page Meta',
            'description' => 'Login Page Description'
        ];


        return view('catalog.login', $data);
    }


    public function authenticate(Request $request) {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.'])->onlyInput('email');

    }


    public function dashboard() {

        $data = [
            'title' => 'Dashboard Meta Title',
            'description' => 'Dashboard Description'
        ];


        return view('catalog.dashboard', $data);

        return redirect()->route('login')->withErrors(['email' => 'Please login to access the dashboard.'
            ])->onlyInput('email');


    }


    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flush();
        return redirect()->route('login')->withSuccess('You have logged out successfully!');

    }


}
