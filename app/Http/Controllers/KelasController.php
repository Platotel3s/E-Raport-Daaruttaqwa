<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\User;

class KelasController extends Controller
{
    public function index(){
        $fashl=Kelas::all();
        return view('kelas.index',compact('fashl'));
    }
    public function create(){
        return view('kelas.create');
    }
    public function store(Request $request){
        $request->validate([
            'namaKelas'=>'required',
        ]);
        $fashl=Kelas::create($request->all());
        return redirect()->route('walas.beranda')->with('success','Berhasil menambah kelas');
    }
    public function show(String $id){
        $fashl=Kelas::findOrFail($id);
        return view('kelas.show',compact('fashl'));
    }
    public function update(String $id, Request $request){
        $request->validate([
            'namaKelas'=>'nullable',
        ]);
        $fashl=Kelas::findOrFail($id);
        $fashl->update($request->all());
        return view('kelas.index');
    }
    public function destroy(String $id){
        $fashl=Kelas::findOrFail($id);
        $fashl->delete();
        return view('kelas.index');
    }
    public function tambahSiswaKelas(Request $request) {
        $request->validate([
            'kelas_id'=>'required|exists:kelas,id',
            'siswa_id'=>'required|exists:users,id',
        ]);
        $siswa=User::findOrFail($request->siswa_id);
        $kelas=Kelas::where('id',$request->kelas_id)->where('wali_kelas_id',auth()->Auth::id())->firstOrFail();
        $siswa->kelas_id=$kelas->id;
        $siswa->save();
        return back()->with('success','Berhasil menambah siswa');
    }
}
