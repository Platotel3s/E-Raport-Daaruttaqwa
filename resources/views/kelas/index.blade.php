@extends('layouts.app')
@section('content')
    <table>
        <thead>
            <tr>Nama Kelas</tr>
        </thead>
        <tbody>
            @foreach ($fashl as $kelas)
                <tr>
                    <td>{{ $kelas->namaKelas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection