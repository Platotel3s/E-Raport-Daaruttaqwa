<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumuman;

class SiswaController extends Controller
{
    public function siswa(){
        return view('siswa.main');
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
    public function pengumumanSiswa(){
        $siswa=auth()->user();
        $kelasId=$siswa->kelas_id;
        $showAnnouncements=Pengumuman::where('kelas_id',$kelasId)->orderBy('created_at','desc')->get();
        return view('siswa.main',compact('showAnnouncements'));
    }
}
