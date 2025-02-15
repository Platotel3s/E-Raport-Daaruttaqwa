<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show(){
        $user=Auth::user();//Menggunakan data yang sedang login
        return view('profile.show',compact('user'));
    }
    public function update(Request $request){
        $user=Auth::user();
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|unique:users,email,'.$user->id,
            'nomorHp'=>'required|string|max:13',
            'alamat'=>'required|string',
        ]);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'nomorHp'=>$request->nomorHp,
            'alamat'=>$request->alamat,
        ]);
        return $this->redirectToDashboard($user->role)->with('success', 'Profil berhasil diperbarui!');
    }
    public function updatePassword(Request $request){
        $user=Auth::user();
        $request->validate([
            'current_password'=>'required|string',
            'password'=>'required|string|min:8|confirmed',
        ]);
        if(!Hash::check($request->current_password, $user->password)){
            return back()->withErrors([
                'current_password'=>'Kata sandi tidak valid',
            ]);
        }
        $user->update([
            'password'=>Hash::make($request->password),
        ]);
        return $this->redirectToDashboard($user->role)->with('success', 'Password berhasil diperbarui!');
    }
    protected function redirectToDashboard($role)
{
    switch ($role) {
        case 'siswa':
            return redirect()->route('siswa.beranda');
        case 'guru':
            return redirect()->route('guru.beranda');
        case 'walas':
            return redirect()->route('walas.beranda');
        default:
            return redirect()->route('welcome'); // Fallback jika role tidak dikenali
    }
}
}

