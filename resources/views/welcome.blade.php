<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Raport Darta - Login & Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            500: '#4361ee',
                            600: '#3a56d4',
                        },
                        dark: {
                            800: '#1e293b',
                        }
                    }
                }
            }
        }
    </script>
    <style type="text/css">
        .active-tab {
            position: relative;
        }

        .active-tab::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #4361ee;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl bg-white rounded-xl shadow-lg overflow-hidden flex flex-col md:flex-row">
        <div class="w-full md:w-1/2 bg-gradient-to-br from-primary-500 to-primary-600 text-white p-8 md:p-12">
            <div class="mb-8">
                <h1 class="text-3xl font-bold">E-Raport Darta</h1>
                <p class="text-primary-100">Sistem Pelaporan Digital Siswa</p>
            </div>
            <div class="mb-8">
                <h2 class="text-2xl font-semibold mb-4">Selamat Datang!</h2>
                <p class="mb-4">Akses portal siswa untuk melihat rapor, nilai, dan perkembangan akademik Anda.</p>
                <p>Belum memiliki akun? Daftar sekarang untuk memulai.</p>
            </div>
            <div class="mt-auto">
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-10 h-10 rounded-full bg-primary-400 flex items-center justify-center">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <p>Pantau perkembangan belajar Anda</p>
                </div>
                <div class="flex items-center space-x-4 mb-4">
                    <div class="w-10 h-10 rounded-full bg-primary-400 flex items-center justify-center">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <p>Analisis statistik nilai</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 rounded-full bg-primary-400 flex items-center justify-center">
                        <i class="fas fa-bell"></i>
                    </div>
                    <p>Notifikasi pencapaian</p>
                </div>
            </div>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12">
            <div class="flex border-b border-gray-200 mb-8">
                <button id="login-tab" class="py-2 px-4 font-medium text-primary-500 active-tab"
                    onclick="switchTab('login')">
                    Masuk
                </button>
                <button id="register-tab" class="py-2 px-4 font-medium text-gray-500" onclick="switchTab('register')">
                    Daftar
                </button>
            </div>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div id="login-form" class="space-y-4">
                    <div>
                        <label for="login-email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input type="email" id="login-email" name="email"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="email@contoh.com">
                    </div>

                    <div>
                        <label for="login-password"
                            class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input type="password" id="login-password"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                            placeholder="••••••••" name="password">
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input id="remember-me" type="checkbox"
                                class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">Ingat saya</label>
                        </div>
                        <a href="#" class="text-sm text-primary-600 hover:text-primary-500">Lupa password?</a>
                    </div>

                    <button
                        class="w-full bg-primary-500 text-white py-2 px-4 rounded-lg hover:bg-primary-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2">
                        Masuk
                    </button>

                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Atau masuk dengan</span>
                        </div>
                    </div>

                    <button
                        class="w-full flex items-center justify-center gap-2 bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-50 transition duration-200">
                        <i class="fab fa-google text-red-500"></i>
                        Masuk dengan Google
                    </button>
                </div>
            </form>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div id="register-form" class="space-y-4 hidden">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="register-name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                Lengkap</label>
                            <input type="text" id="register-name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Nama lengkap" name="name">
                        </div>
                        <div>
                            <label for="register-email"
                                class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="register-email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="email@contoh.com" name="email">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="register-password"
                                class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                            <input type="password" id="register-password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="••••••••" name="password"> 
                        </div>

                        <div>
                            <label for="register-confirm-password"
                                class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                            <input type="password" id="register-confirm-password"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="••••••••" name="password_confirmation">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="register-phone" class="block text-sm font-medium text-gray-700 mb-1">Nomor
                                HP</label>
                            <input type="tel" id="register-phone"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="0812-3456-7890" name="nomorHp">
                        </div>

                        <div>
                            <label for="register-address"
                                class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                            <textarea id="register-address" rows="2"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500"
                                placeholder="Alamat lengkap" name="alamat"></textarea>
                        </div>

                    </div>

                    <div>
                        <label for="register-class" class="block text-sm font-medium text-gray-700 mb-1">Kelas</label>
                        <select id="register-class" name="kelas_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500">
                            <option value="">Pilih Kelas</option>
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

                    <div class="flex items-center">
                        <input id="register-terms" type="checkbox"
                            class="h-4 w-4 text-primary-600 focus:ring-primary-500 border-gray-300 rounded">
                        <label for="register-terms" class="ml-2 block text-sm text-gray-700">
                            Saya menyetujui <a href="#" class="text-primary-600 hover:text-primary-500">Syarat &
                                Ketentuan</a>
                        </label>
                    </div>

                    <button
                        class="w-full bg-primary-500 text-white py-2 px-4 rounded-lg hover:bg-primary-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2"
                        type="submit">
                        Daftar
                    </button>
            </form>
            <div class="relative my-6">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-gray-300"></div>
                </div>
                <div class="relative flex justify-center text-sm">
                    <span class="px-2 bg-white text-gray-500">Atau daftar dengan</span>
                </div>
            </div>

            <button
                class="w-full flex items-center justify-center gap-2 bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-50 transition duration-200">
                <i class="fab fa-google text-red-500"></i>
                Daftar dengan Google
            </button>
        </div>

    </div>
    </div>
    <script src="{{ asset('js/welcome.js') }}"></script>
</body>
</html>