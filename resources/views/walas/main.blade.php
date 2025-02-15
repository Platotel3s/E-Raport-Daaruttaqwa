@extends('layouts.app')

@section('content')
    <h1>Pusat Role walas</h1>
    <p>Selamat datang Pak/Bu {{ Auth::user()->name }}</p>
@endsection