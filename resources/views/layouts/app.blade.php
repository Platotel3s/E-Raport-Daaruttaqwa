<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('font/css/all.min.css') }}">
</head>
<body>
    <div class="main-container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex flex-column">
            <div class="container-fluid">
                @auth
                    @if (Auth::user()->role === 'siswa')
                        <a class="navbar-brand" href="{{ route('siswa.beranda') }}">My App</a>
                    @elseif (Auth::user()->role === 'walas')
                        <a class="navbar-brand" href="{{ route('walas.beranda') }}">My App</a>
                    @elseif (Auth::user()->role === 'guru')
                        <a class="navbar-brand" href="{{ route('guru.beranda') }}">My App</a>
                    @endif

                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <div class="variation-nav">
                                @auth
                                    @if (Auth::user()->role === 'siswa')
                                        <li class="nav-item">
                                            <a href="{{ route('siswa.rapot') }}" class="nav-link">
                                                <i class="fas fa-book"></i> Rapot
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('siswa.pelanggaran') }}" class="nav-link">
                                                <i class="fas fa-triangle-exclamation"></i> Pelanggaran
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('siswa.sekolah') }}" class="nav-link">
                                                <i class="fas fa-school"></i> Sekolah
                                            </a>
                                        </li>
                                    @endif
                                @endauth    
                            </div>
                            @auth
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->role }}
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a class="dropdown-item" href="#" id="openProfileModal">Profil</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="#" id="openPasswordModal">Ganti Password</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="out-link">
                                    <li class="nav-item">
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="nav-link text-danger text-center bg-warning">
                                                <i class="fas fa-sign-out-alt"></i> Keluar
                                            </button>
                                        </form>
                                    </li>
                                </div>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                @endauth

                
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div> 
    </div>
    <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="profileModalLabel">Profil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @auth
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="nomorHp" class="form-label">Nomor Telepon</label>
                                <input type="text" name="nomorHp" id="nomorHp" class="form-control" value="{{ Auth::user()->nomorHp }}">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" value="{{ Auth::user()->alamat }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    @else
                        <p>Silakan login untuk mengakses profil.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="passwordModalLabel">Ganti Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @auth
                        <form action="{{ route('profile.update.password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="current_password" class="form-label">Password Saat Ini</label>
                                <input type="password" name="current_password" id="current_password" class="form-control" required>
                                @error('current_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Password</button>
                            <button type="reset" class="btn btn-warning">Reset</button>
                        </form>
                    @else
                        <p>Silakan login untuk mengubah password.</p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>