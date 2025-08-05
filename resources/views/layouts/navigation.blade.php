<aside class="w-64 bg-white shadow-md border-r border-gray-200">
    <div class="p-4 text-center border-b border-gray-200">
        <h2 class="text-lg font-semibold text-indigo-600">E-Raport Muhammdiyah</h2>
    </div>
    <nav class="mt-4">
        <ul class="space-y-1">
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    Mata Pelajaran
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    Homework
                </a>
            </li>
            <li>
                <a href="#" class="block px-4 py-2 hover:bg-indigo-50 hover:text-indigo-600 transition">
                    Rapot
                </a>
            </li>
            <li>
               <button onclick="document.getElementById('editProfileModal').showModal()" class="text-blue-500 hover:underline block px-4 py-2 hover:text-indigo-600 transition">Edit Profil</button>
            </li>
            <li>
               <button onclick="document.getElementById('changePasswordModal').showModal()" class="text-red-500 hover:underline block px-4 py-2 hover:text-indigo-600 transition">Ganti Password</button>
            </li>
        </ul>
    </nav>
</aside>

<dialog id="editProfileModal" class="rounded-lg p-6 w-[90%] max-w-xl">
    <form method="PATCH" action="{{ route('profile.update') }}" class="space-y-4">
        @csrf
        @method('PATCH')
        <h2 class="text-xl font-semibold mb-4">Edit Profil</h2>
        <div>
            <label for="name" class="block">Nama</label>
            <input type="text" name="name" id="name" class="w-full border rounded p-2" value="{{ Auth::user()->name }}" required>
        </div>
        <div>
            <label for="email" class="block">Email</label>
            <input type="email" name="email" id="email" class="w-full border rounded p-2" value="{{ Auth::user()->email }}" required>
        </div>
        <div>
            <label for="nomorHp" class="block">Nomor HP</label>
            <input type="text" name="nomorHp" id="nomorHp" class="w-full border rounded p-2" value="{{ Auth::user()->nomorHp }}" required>
        </div>
        <div>
            <label for="alamat" class="block">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="w-full border rounded p-2" value="{{ Auth::user()->alamat }}" required>
        </div>
        <div class="flex justify-end gap-2 mt-4">
            <button type="button" onclick="document.getElementById('editProfileModal').close()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
        </div>
    </form>
</dialog>

<dialog id="changePasswordModal" class="rounded-lg p-6 w-[90%] max-w-xl">
    <form method="PATCH" action="{{ route('update.password') }}" class="space-y-4">
        @csrf
        @method('PATCH')
        <h2 class="text-xl font-semibold mb-4">Ganti Password</h2>
        <div>
            <label for="current_password" class="block">Password Lama</label>
            <input type="password" name="current_password" id="current_password" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="password" class="block">Password Baru</label>
            <input type="password" name="password" id="password" class="w-full border rounded p-2" required>
        </div>
        <div>
            <label for="password_confirmation" class="block">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border rounded p-2" required>
        </div>
        <div class="flex justify-end gap-2 mt-4">
            <button type="button" onclick="document.getElementById('changePasswordModal').close()" class="px-4 py-2 bg-gray-300 rounded">Batal</button>
            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Ganti</button>
        </div>
    </form>
</dialog>


