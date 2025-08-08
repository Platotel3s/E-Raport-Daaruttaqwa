@extends('layouts.app')

@section('content')
   <div class="container">
        <form action="{{ route('walas.tambahSiswaKeKelas') }}" method="POST">
            @csrf
            <label for="kelas">Pilih Kelas:</label>
            <select name="kelas_id">
                 @foreach ($kelasYangSayaWaliin as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->namaKelas }}</option>
            @endforeach
        </select>

        <label for="siswa">Pilih Siswa:</label>
        <select name="siswa_id">
            @foreach ($siswaTanpaKelas as $siswa)
                <option value="{{ $siswa->id }}">{{ $siswa->name }}</option>
            @endforeach
        </select>

        <button type="submit">Tambah ke Kelas</button>
</form>
   </div>
@endsection
