<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tugas;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function index(){
        $tugas = Tugas::where('guru_id', Auth::id())->get();
        return view('tugas.index', compact('tugas'));
    }
    public function create(){
        $kelas = Auth::user()->kelasMapel; 
        return view('tugas.create', compact('kelas'));
    }
    public function store(Request $request){
        $request->validate([
            'judul' => 'required',
            'deskripsi'=>'required',
            'deadline' => 'required|date',
            'kelas_id' => 'required'
        ]);
        Tugas::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'guru_id' => Auth::id(),
            'kelas_id' => $request->kelas_id,
            'deadline' => $request->deadline
        ]);
        return redirect()->route('tugas.index')->with('success','Tugas berhasil dibuat');
    }
    public function update(String $id,Request $request){
        $assignment=Tugas::findOrFail($id);
        $request->validate([
            'judul'=>'nullable',
            'deskripsi'=>'nullable',
            'guru_id'=>'required',
            'kelas_id'=>'required',
            'deadline'=>'required',
        ]);
        $assignment->update($request->all());
        return redirect()->route('tugas.index')->with('success','Berhasil update tugas');
    }
    public function destroy(String $id){
        $assignment=Tugas::findOrFail($id);
        $assignment->delete();
        return redirect()->route('tugas.index')->with('success','Berhasil hapus tugas');
    }
}
