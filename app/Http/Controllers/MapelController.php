<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index(){
        $mapels=Mapel::all();
        return view('mapel.index',compact('mapels'));
    }
    public function create(){
        return view('mapel.create');
    }
    public function store(Request $request){
        $request->validate([
            'namaMapel'=>'required',
        ]);
        $mapels=Mapel::create($request->all);
        return back()->with('success','Berhasil menambah mapel');
    }
    public function show(String $id){
        $mapels=Mapel::findOrFail($id);
        return view('mapel.show',compact('mapels'));
    }
    public function update(String $id,Request $request){
        $request->validate([
            'namaMapel'=>'required'
        ]);
        $mapels=Mapel::findOrFail($id);
        $mapels->update($request->all());
        return back()->with('success','Berhasil update');
    }
    public function destroy(String $id){
        $mapels=Mapel::findOrFail($id);
        $mapels->delete();
        return back()->with('success','Berhasil hapus');
    }
}
