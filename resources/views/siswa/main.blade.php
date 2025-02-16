@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Home</h5>
                    </div>
                    <div class="card-body">
                        <h1>Pusat Role {{ Auth::user()->role }}</h1>
                        <p>Selamat datang ananda {{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection