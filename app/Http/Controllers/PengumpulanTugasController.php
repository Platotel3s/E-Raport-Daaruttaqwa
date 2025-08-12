<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;
use App\Models\PengumpulanTugas;
use Illuminate\Http\Request;

class PengumpulanTugasController extends Controller
{
    public function store(Request $request, $tugas_id){
        $tugas=Tugas::findOrFail($tugas_id);
        if(now()->greaterThan($tugas->deadline)){
            return back()->withErrors('Pengumpulan sudah lewat deadline');
        }
        $data=[
            'tugas_id'=>$tugas_id,
            'siswa_id'=>Auth::id(),
            'jawaban'=>$request->jawaban,
            'waktu_kumpul'=>now()
        ];
        if($request->hasFile('file')) {
            $data['file']=$request->file('file')->store('tugas','public');
        }
        PengumpulanTugas::updateOrCreate(
            ['tugas_id'=>$tugas_id, 'siswa_id'=>Auth::id()],
            $data
        );
        return back()->with('success','Tugas berhasil dikumpulkan');
    }
    public function halKumpul($id){
        $tugas=PengumpulanTugas::findOrFail($id);
        return view('tugas.submit',compact('tugas'));
    }
}
