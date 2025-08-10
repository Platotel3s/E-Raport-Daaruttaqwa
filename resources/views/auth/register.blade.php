<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Buat akun</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Nama</label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Nama lengkap">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input placeholder="email@example.com" id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input placeholder="kata sandi harus kuat" id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Konfirmasi
                                    password</label>
                                <div class="col-md-6">
                                    <input placeholder="konfirmasi kata sandi" id="password-confirm" type="password"
                                        class="form-control" name="password_confirmation" required
                                        autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nomorHp" class="col-md-4 col-form-label text-md-right">Nomor Hp</label>
                                <div class="col-md-6">
                                    <input type="text" name="nomorHp" id="nomorHp" required class="form-control"
                                        placeholder="contoh : 081234567890">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                <div class="col-md-6">
                                    <input type="text" name="alamat" id="alamat" required class="form-control"
                                        placeholder="alamat domisili / rumah">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kelas" class="col-md-4 col-form-label text-md-right">Kelas</label>
                                <div class="col-md-6">
                                    <select name="kelas_id" class="bg-white border border-gray-300 rounded-md p-2">
                                        <option value="">-- Pilih Kelas --</option>
                                        <option value="1">1A</option>
                                        <option value="2">1B</option>
                                        <option value="3">1C</option>
                                        <option value="4">2A</option>
                                        <option value="5">2B</option>
                                        <option value="6">3A</option>
                                        <option value="7">3B</option>
                                        <option value="8">3C</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Daftar
                                    </button>
                                    <button type="reset" class="btn btn-warning">
                                        Hapus
                                    </button>
                                </div>
                            </div>

                            <a href="{{ route('login.page') }}" class="text-decoration-none text-center">Halaman
                                login</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>