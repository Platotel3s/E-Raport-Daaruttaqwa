@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h5 class="text-2xl font-semibold text-red-500">Pengumpulan Tugas</h5>
        </div>
        <form action="{{ route('tugas.kumpul', $tugas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <textarea name="jawaban" placeholder="Jawaban teks"></textarea>
            <input type="file" name="file">
            <button type="submit">Kumpulkan</button>
        </form>

    </div>
</div>
@endsection