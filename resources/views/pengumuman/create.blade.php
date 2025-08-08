@extends('layouts.app')
@section('content')
    <!-- Modal atau Section -->
<div class="max-w-xl mx-auto bg-white p-6 shadow-md rounded-lg mt-10">
    <h2 class="text-xl font-bold mb-4">Buat Pengumuman</h2>
    
    <form action="{{ route('pengumuman.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="judul" class="block text-sm font-medium text-gray-700">Judul</label>
            <input type="text" name="judul" id="judul" required
                class="mt-1 block w-full border rounded p-2" placeholder="Contoh: Pengumpulan Tugas">
        </div>

        <div class="mb-4">
            <label for="isi" class="block text-sm font-medium text-gray-700">Isi Pengumuman</label>
            <textarea name="isi" id="isi" rows="5" required
                class="mt-1 block w-full border rounded p-2" placeholder="Tulis isi pengumuman di sini..."></textarea>
        </div>

        <div class="mb-4">
            <label for="kelas_id" class="block text-sm font-medium text-gray-700">Kelas Tujuan</label>
            <select name="kelas_id" id="kelas_id" required class="mt-1 block w-full border rounded p-2">
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelasList as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Simpan Pengumuman
            </button>
        </div>
    </form>
</div>

@endsection