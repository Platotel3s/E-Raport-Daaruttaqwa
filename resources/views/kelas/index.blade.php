@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Anggota Kelas {{ $kelas->namaKelas }}</h2>

    @if($anggota->isEmpty())
        <p>Tidak ada siswa dalam kelas ini.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Nomor HP</th>
                </tr>
            </thead>
            <tbody>
                @foreach($anggota as $siswa)
                    <tr>
                        <td>{{ $siswa->name }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td>{{ $siswa->nomorHp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
