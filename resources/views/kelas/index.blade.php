@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Anggota Kelas {{ $kelas->namaKelas }}</h2>

    @if($anggota->isEmpty())
    <p>Tidak ada siswa dalam kelas ini.</p>
    @else
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($anggota as $siswa)
                <tr class="hover:bg-gray-300">
                    <td class="px-6 py-4 whitespace-nowrap">{{ $siswa->name }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $siswa->email }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $siswa->nomorHp }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <form action="" method="GET">
                            <button class="bg-red-400 hover:bg-red-500 text-black font-bold py-2 px-4 rounded" type="submit">
                                Hapus
                            </button>
                        </form>
                        <a href="{{ route('kelas.edit',$siswa->id) }}" class="bg-yellow-400 hover:bg-yellow-500 text-black font-bold py-2 px-4 rounded">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{-- <table class="table">
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
    </table> --}}
    @endif
</div>
@endsection