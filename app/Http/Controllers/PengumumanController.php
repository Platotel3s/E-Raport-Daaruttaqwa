<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\User;

class PengumumanController extends Controller
{
    public function buatPengumuman(Request $request){
        $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            'gambar'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'kelas_id'=>'required'
        ]);
        $gambarPengumumanFolder=null;
        if ($request->hasFile('gambar')) {
            $ext=$request->file('gambar')->getClientOriginalExtensions();
            $namingFile=now()->format('YmdHis').'.'.$ext;
            $gambarPengumumanFolder=$request->file('gambar')->storeAs('gambarPengumuman',$namingFile,'public');
        }
        $pengumumans=Pengumuman::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'gambar'=>$gambarPengumumanFolder,
            'kelas_id'=>$request->kelas_id,
            'user_id'=>User::id(),
        ]);
        return redirect()->route('index.pengumuman')->with('Success','Berhasil Buat Pengumuman');
    }
    public function tampilkanPengumuman(){
        $showAnnouncements=Pengumuman::all();
        return view('pengumuman.index',compact('showAnnouncements'));
    }
    public function indexPengumuman(){
        $announs=Pengumuman::all();
        return view('pengumuman.index',compact('announs'));
    }
}
