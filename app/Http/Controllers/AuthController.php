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
            'nomorHp'=>'required|string|max:13',
            'alamat'=>'required|string'
        ]);
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'nomorHp'=>$request->nomorHp,
            'alamat'=>$request->alamat,
        ]);
        Auth::login($user);
        return redirect()->route('login.page');
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
            }elseif(Auth::user()->role==='admin'){
                return redirect('/main/admin');
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
    public function updatePassword(Request $request){
        $request->validate([
            'current_password'=>'required',
            'password'=>'required|string|min:8|confirmed',
        ]);
        if (!Hash::check($request->current_password,auth()->user()->password)) {
            return back()->withErrors([
                'current_password'=>'password lama salah',
            ]);
        }
        return back()->with('success','Berhasil memperbarui password');
    }
}
