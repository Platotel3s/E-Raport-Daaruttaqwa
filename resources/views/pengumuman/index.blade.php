@extends('layouts.app')
@section('content')
<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    No
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Judul Pengumuman
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Isi Pengumuman
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Gambar
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Tanggal pembuatan
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Aksi
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($announs as $pengumuman)
            <tr class="bg-gray-50">
                <td class="px-6 py-4 whitespace-wrap text-sm font-medium text-gray-900">
                    {{ $pengumuman->id }}
                </td>
                <td class="px-6 py-4 whitespace-wrap text-sm font-medium text-gray-900">
                    {{ $pengumuman->judul }}
                </td>
                <td class="px-6 py-4 whitespace-wrap text-sm font-medium text-gray-900">
                    {{ $pengumuman->isi }}
                </td>
                <td class="px-6 py-4 whitespace-wrap text-sm font-medium text-gray-900">
                    @if($pengumuman->gambar)
                        <img src="{{ asset('storage/'.$pengumuman->gambar) }}" alt="gambar" style="width: 900px">
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $pengumuman->kelas->namaKelas }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $pengumuman->created_at }}
                </td>
                <td class="px-6 py-4 whitespace-    wrap text-sm font-medium text-gray-900">
                    <form action="{{ route('hapus.pengumuman',$pengumuman->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white p-2  rounded-md hover:bg-red-600">
                            hapus
                        </button>
                        <a href="{{ route('edit.pengumuman',$pengumuman->id) }}" class="bg-yellow-500 hover:bg-yellow-600 rounded p-2 text-black">
                            Edit
                        </a>
                    </form>
                </td>
            </tr>
            
            @endforeach
        </tbody>
    </table>
</div>
@endsection