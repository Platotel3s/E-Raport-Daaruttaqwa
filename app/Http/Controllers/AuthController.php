<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm(){
        return view('auth.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email',
            'password'=>'required|string|min:8|confirmed',
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect('/home');
    }
    public function showLoginForm(){
        return view('auth.login');
    }
    public function login(Request $request){
        $credentials=$request->validate([
            'email'=>'required|email',
            'password'=>'required|string',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(Auth::user()->role === 'siswa'){
                return redirect('/siswa/main');
            }elseif(Auth::user()->role === 'guru'){
                return redirect('/guru/main');
            }elseif(Auth::user()->role === 'walas'){
                return redirect('/walas/main');
            }
        }
        return back()->withErrors([
            'email'=>'email belum terdaftar',
        ]);
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
