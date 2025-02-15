@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pusat Role {{ Auth::user()->role }}</h1>
        <p>Selamat datang ananda {{ Auth::user()->name }}</p>
    </div>
@endsection