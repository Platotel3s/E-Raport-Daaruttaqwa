

@extends('layouts.app')
@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                <h5 class="text-2xl font-semibold text-red-500">Wali kelas {{ Auth::user()->kelasDiwalikan->namaKelas }}</h5>
            </div>
            <div class="p-6"></div>
        </div>
    </div>
@endsection