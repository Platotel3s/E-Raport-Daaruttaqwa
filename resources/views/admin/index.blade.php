@extends('layouts.app')
@section('content')
    <div class="container">
        @foreach ($fashl as $kelas)
            <td>{{ $kelas->namaKelas }}</td>
        @endforeach
    </div>
@endsection