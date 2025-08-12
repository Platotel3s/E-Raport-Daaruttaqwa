@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h5 class="text-2xl font-semibold text-red-500">Pembuatan Tugas</h5>
        </div>
        <form action="{{ route('tugas.store') }}" method="POST">
            @csrf
            <input type="text" name="judul" placeholder="Judul Tugas" required>
            <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
            <select name="kelas_id">
                @foreach($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
                @endforeach
            </select>
            <input type="datetime-local" name="deadline" required>
            <button type="submit">Simpan</button>
        </form>
    </div>
</div>



@endsection