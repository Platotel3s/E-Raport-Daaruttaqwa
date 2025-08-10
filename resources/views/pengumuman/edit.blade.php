@extends('layouts.app')
@section('content')
<form method="POST" action="{{ isset($announs) ? route('update.pengumuman', $announs->id) : route('pengumuman.store') }}" enctype="multipart/form-data">
    @csrf
    @if(isset($announs))
        @method('PUT')
    @endif
    
    <div class="space-y-12">
        <div class="border-b border-white/10 pb-12">
            <h2 class="text-base/7 font-semibold text-black">Pengumuman</h2>
            <p class="mt-1 text-sm/6 text-gray-700">Buat pengumuman untuk kelas tertentu.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-4">
                    <label for="judul" class="block text-sm/6 font-medium text-black">Judul</label>
                    <div class="mt-2">
                        <input id="judul" type="text" name="judul" value="{{ old('judul', $announs->judul ?? '') }}" placeholder="Judul pengumuman"
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6"/>
                        @error('judul')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="isi" class="block text-sm/6 font-medium text-black">Isi Pengumuman</label>
                    <div class="mt-2">
                        <textarea id="isi" name="isi" rows="5"
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-black outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">{{ old('isi', $announs->isi ?? '') }}</textarea>
                        @error('isi')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="kelas_id" class="block text-sm/6 font-medium text-black">Kelas</label>
                    <div class="mt-2 grid grid-cols-1">
                        <select id="kelas_id" name="kelas_id"
                            class="col-start-1 row-start-1 w-full appearance-none rounded-md bg-white/5 py-1.5 pr-8 pl-3 text-base text-black outline-1 -outline-offset-1 outline-white/10 *:bg-gray-800 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6">
                            <option value="">Pilih Kelas</option>
                            @foreach($fashl as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id', $announs->kelas_id ?? '') == $k->id ? 'selected' : '' }}>
                                    {{ $k->namaKelas }}
                                </option>
                            @endforeach
                        </select>
                        <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true"
                            class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-700 sm:size-4">
                            <path
                                d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                        @error('kelas_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="gambar" class="block text-sm/6 font-medium text-black">Gambar</label>
                    <div class="mt-2 flex justify-center rounded-lg border border-dashed border-white/25 px-6 py-10">
                        <div class="text-center">
                            @if(isset($announs) && $announs->gambar)
                                <img src="{{ asset('storage/' . $announs->gambar) }}" alt="Gambar Pengumuman" class="mx-auto h-24 w-auto">
                            @else
                                <svg viewBox="0 0 24 24" fill="currentColor" data-slot="icon" aria-hidden="true"
                                    class="mx-auto size-12 text-gray-600">
                                    <path
                                        d="M1.5 6a2.25 2.25 0 0 1 2.25-2.25h16.5A2.25 2.25 0 0 1 22.5 6v12a2.25 2.25 0 0 1-2.25 2.25H3.75A2.25 2.25 0 0 1 1.5 18V6ZM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0 0 21 18v-1.94l-2.69-2.689a1.5 1.5 0 0 0-2.12 0l-.88.879.97.97a.75.75 0 1 1-1.06 1.06l-5.16-5.159a1.5 1.5 0 0 0-2.12 0L3 16.061Zm10.125-7.81a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Z"
                                        clip-rule="evenodd" fill-rule="evenodd" />
                                </svg>
                            @endif
                            <div class="mt-4 flex text-sm/6 text-gray-700">
                                <label for="gambar-upload"
                                    class="relative cursor-pointer rounded-md bg-transparent font-semibold text-indigo-400 focus-within:outline-2 focus-within:outline-offset-2 focus-within:outline-indigo-500 hover:text-indigo-300">
                                    <span>Upload gambar</span>
                                    <input id="gambar-upload" name="gambar" type="file" class="sr-only" accept="image/*" />
                                </label>
                                <p class="pl-1">atau drag and drop</p>
                            </div>
                            <p class="text-xs/5 text-gray-700">PNG, JPG, GIF up to 10MB</p>
                            @error('gambar')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm/6 font-semibold text-black">Batal</button>
        <button type="submit"
            class="rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white hover:bg-indigo-600 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
            {{ isset($pengumuman) ? 'Update' : 'Simpan' }}
        </button>
    </div>
</form>
@endsection