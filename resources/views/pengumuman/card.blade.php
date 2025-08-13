<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
@foreach ($showAnnouncements as $pengumuman)
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $pengumuman->judul }}
        </h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ $pengumuman->isi }}
        </p>
        @if($pengumuman->gambar)
            <img src="{{ asset('storage/' . $pengumuman->gambar) }}" alt="gambar" class="mt-2 rounded-lg">
        @endif
    </div>
@endforeach
