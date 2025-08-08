<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;
use App\Models\Kelas;


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
            $ext=$request->file('gambar')->getClientOriginalExtension();
            $namingFile=now()->format('YmdHis').'.'.$ext;
            $gambarPengumumanFolder=$request->file('gambar')->storeAs('gambarPengumuman',$namingFile,'public');
        }
        $pengumumans=Pengumuman::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'gambar'=>$gambarPengumumanFolder,
            'kelas_id'=>$request->kelas_id,
            'user_id'=>auth()->id(),
        ]);
        return redirect()->route('walas.beranda')->with('success','Berhasil Buat Pengumuman');
    }
    public function tampilkanPengumuman(){
        $user=auth()->user();
        if ($user->role==='siswa') {
            $showAnnouncements=Pengumuman::where('kelas_id',$user->kelas_id)->get();
        }else{
            $showAnnouncements=Pengumuman::all();
        }
        return view('pengumuman.index',compact('showAnnouncements'));
    }
    public function indexPengumuman(){
        $announs=Pengumuman::all();
        return view('pengumuman.index',compact('announs'));
    }
    public function halPengumuman(){
        $fashl=Kelas::all();
        return view('pengumuman.create',compact('fashl'));
    }
    public function updatePengumuman(String $id,Request $request){
        $request->validate([
            'judul'=>'required',
            'isi'=>'required',
            'gambar'=>'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'kelas_id'=>'nullable',
        ]);
        $gambarPengumumanFolder=null;
        if ($request->hasFile('gambar')) {
            $ext=$request->file('gambar')->getClientOriginalExtension();
            $namingFile=now()->format('YmdHis').'.'.$ext;
            $gambarPengumumanFolder=$request->file('gambar')->storeAs('gambarPengumuman',$namingFile,'public');
        }
        $announs=Pengumuman::findOrFail($id);
        $announs->update([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'gambar'=>$gambarPengumumanFolder,
            'kelas_id'=>$request->kelas_id,
        ]);
        return redirect()->route('walas.beranda');
    }
}
