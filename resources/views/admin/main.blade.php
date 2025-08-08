@extends('layouts.app')
@section('content')
        <p class="text-black text-2xl">Welcome</p>
        <span>{{ Auth::user()->name }}</span>
@endsection