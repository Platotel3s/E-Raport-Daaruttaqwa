<h1 align="center">📘 E-Raport Daaruttaqwa</h1><p align="center"> <strong>E-raport Daaruttaqwa</strong> adalah aplikasi rapor berbasis web dan mobile yang dirancang untuk memudahkan para asatidz (guru) dalam mengelola nilai santri, serta membantu wali santri memantau perkembangan akademik anaknya selama belajar di Pondok Pesantren Daaruttaqwa. Aplikasi ini menggantikan sistem rapor konvensional yang manual dengan sistem digital yang terintegrasi. 🚀 </p>
🌟 Fitur Utama

Aplikasi ini memiliki empat role dengan akses dan fitur yang berbeda:
1. 👨‍🎓 Santri dan Wali Santri

    📊 Melihat mata pelajaran dan nilai harian santri.

    ⚠️ Melihat pelanggaran disiplin santri.

    📥 Mengunduh rapor, ijazah, syahadah, dan sertifikat prestasi.

    📅 Melihat absensi kehadiran santri.

2. 👩‍🏫 Guru Mapel

    ✅ Mengisi absensi santri.

    📝 Mengisi nilai harian, UTS, dan UAS.

    📚 Membuat dan mengirim soal latihan.

    📤 Mengirim laporan pencapaian pembelajaran ke kepala sekolah dan KMMI.

3. 🧑‍🏫 Wali Kelas

    📋 Menerima laporan nilai dan pelanggaran dari guru mapel.

    📄 Mengunggah dokumen seperti rapor, ijazah, dan sertifikat prestasi.

    📩 Mengirim rapor dan nilai ke kepala sekolah untuk ditandatangani.

4. 👨‍💼 Kepala Sekolah dan KMMI

    🗂️ Mengelola data santri, guru, dan kelas.

    📑 Mendistribusikan dokumen seperti rapor dan ijazah.

    📈 Memantau perkembangan akademik santri secara general.

🛠️ Teknologi yang Digunakan
Backend

    🐘 Laravel: Framework PHP untuk pengembangan backend.

    🗃️ Mariadb: Database untuk menyimpan data santri, nilai, absensi, dan lainnya.

    🔗 API: Untuk integrasi antara frontend dan backend.

Frontend

    🎨 Bootstrap: Framework CSS untuk tampilan yang responsif.

    🖥️ JavaScript: Untuk interaktivitas di frontend.

    📊 Chart.js: Library untuk visualisasi data (grafik nilai, dll.).

Lainnya

    🐙 Git: Untuk version control.

    🐳 Docker: Untuk containerization dan deployment.

    📤 Postman: Untuk testing API.

🚀 Cara Penggunaan
1. Instalasi

    Clone repository ini:
    bash
    Copy

    git clone https://github.com/Platotel3s/E-Raport-Daaruttaqwa.git

    Install dependencies:
    bash
    Copy

    composer install
    npm install

    Buat file .env dan sesuaikan konfigurasi database:
    env
    Copy

    DB_DATABASE=nama_database
    DB_USERNAME=username
    DB_PASSWORD=password

    Jalankan migrasi dan seeder:
    bash
    Copy

    php artisan migrate --seed

    Jalankan aplikasi:
    bash
    Copy

    php artisan serve

2. Login

    🌐 Buka aplikasi di browser.

    🔑 Login menggunakan akun yang telah terdaftar (santri, wali santri, guru, atau kepala sekolah).

3. Penggunaan Berdasarkan Role

    👨‍🎓 Santri/Wali Santri: Akses menu nilai, absensi, dan dokumen.

    👩‍🏫 Guru Mapel: Isi nilai, absensi, dan buat soal latihan.

    🧑‍🏫 Wali Kelas: Kelola laporan nilai dan dokumen.

    👨‍💼 Kepala Sekolah: Pantau perkembangan akademik dan kelola data.

🌟 Manfaat dan Kelebihan
Manfaat

    Bagi Asatidz (Guru):

        🖋️ Memudahkan pengisian nilai dan absensi.

        ⏳ Mengurangi beban administratif.

    Bagi Wali Santri:

        👀 Memantau perkembangan akademik anak secara real-time.

        📂 Mengakses dokumen seperti rapor dan ijazah dengan mudah.

    Bagi Pondok Pesantren:

        📈 Meningkatkan efisiensi manajemen akademik.

        🔍 Meningkatkan transparansi informasi.

Kelebihan

    🌐 Multi-Platform: Bisa diakses melalui web dan mobile.

    👥 Multi-Role: Mendukung empat role dengan fitur yang berbeda.

    🔗 Terintegrasi: Semua data tersimpan dalam satu sistem.

    🖼️ User-Friendly: Antarmuka yang mudah digunakan.

🤝 Kontribusi

Jika Anda ingin berkontribusi pada proyek ini, silakan ikuti langkah-langkah berikut:

    Fork repository ini.

    Buat branch baru:
    bash
    Copy

    git checkout -b fitur-baru

    Commit perubahan Anda:
    bash
    Copy

    git commit -m "Menambahkan fitur baru"

    Push ke branch:
    bash
    Copy

    git push origin fitur-baru

    Buat pull request.

📜 Lisensi

Proyek ini dilisensikan di bawah MIT License.
👨‍💻 Tim Pengembang

    Syaiful Yudha Platoteles - 🚀 Project Lead, Fullstack Developer, UI/UX Designer

Dengan E-raport Daaruttaqwa, kami berharap dapat memberikan solusi digital yang memudahkan manajemen akademik di Pondok Pesantren Daaruttaqwa. Terima kasih telah menggunakan aplikasi ini! 😊
