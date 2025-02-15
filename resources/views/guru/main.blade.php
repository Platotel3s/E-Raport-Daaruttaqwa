@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Pusat role guru</h1>
        <p>Selamat datang Pak/Bu {{ Auth::user()->name }}</p>
    </div>
@endsection