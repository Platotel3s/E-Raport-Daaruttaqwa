@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Pusat Role walas</h1>
                    </div>
                    <div class="card-body">
                        <p>Selamat datang Pak/Bu {{ Auth::user()->name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection