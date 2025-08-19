<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pengumuman;

class WalasController extends Controller
{
    public function walas(){
        $user=auth()->user();
        $kelas=Kelas::where('wali_kelas_id',$user->id)->first();
        if($kelas){
            $announs=Pengumuman::where('kelas_id',$kelas->id)->orderBy('created_at','asc')->get();
        }else{
            $announs=collect();
        }
        
        return view('walas.main',compact('announs'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function tambahSiswaKelas(Request $request) {
        $request->validate([
            'kelas_id'=>'required|exists:kelas,id',
            'siswa_id'=>'required|exists:users,id',
        ]);
        $siswa=User::findOrFail($request->siswa_id);
        $kelas=Kelas::where('id',$request->kelas_id)->where('wali_kelas_id',auth()->id())->firstOrFail();
        $siswa->kelas_id=$kelas->id;
        $siswa->save();
        return back()->with('success','Berhasil menambah siswa');
    }
}
