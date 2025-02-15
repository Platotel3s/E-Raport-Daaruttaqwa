@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-content-evenly">
        <div class="profil-form">
            <h3 class="text-center">Profil</h3>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" placeholder="Joseph Stalin">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="user@example.com">
                </div>
                <div class="mb-3">
                    <label for="nomorHp" class="form-label">Nomor Telepon</label>
                    <input type="text" id="nomorHp" name="nomorHp" class="form-control" value="{{ $user->nomorHp }}" placeholder="ex. 081234567890">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="form-control" value="{{ $user->alamat }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-warning">Batalkan</button>
            </form>
        </div>
        <hr>
        <div class="password-form">
            <h3 class="cursor-pointer text-center">Perbarui kata sandi</h3>
            @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            <form action="{{ route('profile.update.password') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="current_password">Kata sandi saat ini</label>
                    <input type="text" name="current_password" id="current_password" class="form-control" required>
                    @error('current_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="password">Password baru</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation">Konfirmasi kata sandi baru</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Perbarui Kata sandi</button>
                <button type="reset" class="btn btn-warning">Batalkan</button>
            </form>
        </div>
    </div>
@endsection