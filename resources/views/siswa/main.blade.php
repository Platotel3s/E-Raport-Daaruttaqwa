@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <h5 class="text-2xl font-semibold text-red-500">Pengumuman Kelas {{ Auth::user()->kelas->namaKelas }}</h5>
        </div>
        <div class="p-6">
            <div class="grid gap-4 sm:grid-cols-2">
                @foreach ($showAnnouncements as $index => $pengumuman)
                <div
                    class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md p-6 flex flex-col">
                    @if($pengumuman->gambar)
                    <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="gambar"
                        class="mb-3 rounded-lg object-cover w-full">
                    @endif
                    <p class="text-sm text-gray-500 mb-1">
                        {{ $pengumuman->created_at }}
                    </p>
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                        {{ $pengumuman->judul }}
                    </h5>
                    <div id="content-{{ $index }}"
                        class="text-gray-700 dark:text-gray-400 overflow-hidden max-h-24 transition-all duration-500">
                        {{ $pengumuman->isi }}
                    </div>
                    @if(strlen($pengumuman->isi) > 100)
                    <button onclick="toggleContent({{ $index }})" class="mt-2 text-blue-500 hover:underline self-start">
                        Lihat Selengkapnya
                    </button>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function toggleContent(id) {
        const content = document.getElementById(`content-${id}`);
        const btn = event.target;

        if (content.classList.contains('max-h-24')) {
            content.classList.remove('max-h-24');
            content.classList.add('max-h-[1000px]');
            btn.textContent = 'Tutup';
        } else {
            content.classList.add('max-h-24');
            content.classList.remove('max-h-[1000px]');
            btn.textContent = 'Lihat Selengkapnya';
        }
    }
</script>
@endsection