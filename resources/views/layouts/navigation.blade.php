<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<style>
    dialog::backdrop {
        background: rgba(0, 0, 0, 0.5);
    }
</style>

<aside class="w-64 bg-white shadow-md border-r border-gray-200">
    <div class="p-4 text-center border-b border-gray-200">
        <h2 class="text-lg font-semibold text-indigo-600">E-Raport Muhammadiyah</h2>
    </div>
    <nav class="mt-4">
        <ul class="space-y-1">
            @auth
            @if (Auth::user()->role=='siswa')
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">Mata
                    Pelajaran</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">Homework</a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">Rapot</a>
            </li>
            @elseif (Auth::user()->role=='walas')
            <li>
                <a href="{{ route('create.pengumuman') }}" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    Buat Pengumuman
                </a>
                <a href="{{ route('anggota.kelas') }}" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    Anggota Kelas
                </a>
                <a href="{{ route('index.pengumuman') }}" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                        List Pengumuman
                </a>
            </li>
            @elseif (Auth::user()->role=='admin')
                <li>
                    <a href="{{ route('list.kelas') }}" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                        Daftar kelas
                    </a>
                    <a href="{{ route('list.mapel') }}" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                        Daftar Mapel
                    </a>
                    
                </li>
            @endif
            @endauth
            <li>
                <button onclick="document.getElementById('editProfileModal').showModal()"
                    class="text-blue-500 hover:underline block px-4 py-2 hover:text-indigo-600 transition">
                    Edit Profil
                </button>
            </li>
            <li>
                <button onclick="document.getElementById('changePasswordModal').showModal()"
                    class="text-red-500 hover:underline block px-4 py-2 hover:text-indigo-600 transition">
                    Ganti Password
                </button>
            </li>
        </ul>
    </nav>
</aside>
<dialog id="editProfileModal" class="rounded-lg p-6 w-[90%] max-w-xl">
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('PUT')
        <h2 class="text-xl font-semibold mb-4">Edit Profil</h2>
        <div>
            <label for="name" class="block font-medium">Nama</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2"
                value="{{ old('name', Auth::user()->name) }}" required>
        </div>
        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2"
                value="{{ old('email', Auth::user()->email) }}" required>
        </div>
        <div>
            <label for="nomorHp" class="block font-medium">Nomor HP</label>
            <input type="text" name="nomorHp" id="nomorHp" class="w-full border rounded p-2"
                value="{{ old('nomorHp', Auth::user()->nomorHp) }}" maxlength="13" required>
        </div>
        <div>
            <label for="alamat" class="block font-medium">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full border rounded p-2"
                value="{{ old('alamat', Auth::user()->alamat) }}" required>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button type="button" onclick="document.getElementById('editProfileModal').close()"
                class="px-4 py-2 bg-gray-300 rounded">Batal</button>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Simpan</button>
        </div>
    </form>
</dialog>

<dialog id="changePasswordModal" class="rounded-lg p-6 w-[90%] max-w-xl">
    <form method="POST" action="{{ route('profile.update.password') }}" class="space-y-4">
        @csrf
        @method('PUT')
        <h2 class="text-xl font-semibold mb-4">Ganti Password</h2>
        <div>
            <label for="current_password" class="block font-medium">Password Lama</label>
            <input type="password" name="current_password" id="current_password"
                class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="password" class="block font-medium">Password Baru</label>
            <input type="password" name="password" id="password" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="password_confirmation" class="block font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                class="w-full border rounded p-2" required>
        </div>

        <div class="flex justify-end gap-2 mt-4">
            <button type="button" onclick="document.getElementById('changePasswordModal').close()"
                class="px-4 py-2 bg-gray-300 rounded">Batal</button>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Ganti</button>
        </div>
    </form>
</dialog>
