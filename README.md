## Sistem Pendaftaran Kursus

🎯 Tujuan
Membangun sistem sederhana untuk pendaftaran kursus, mencakup fitur:
- Data kursus
- Pendaftaran peserta
- Tampilan daftar kursus dan peserta

⚙️ Tech Stack
Komponen:    Teknologi
Backend:     Laravel 11 (PHP 8.2)
Frontend:    TailwindCSS v3
Database:    MySQL
Web Server:  Laravel Artisan / Apache
Package Manager: Composer, npm/pnpm

🧠 User Flow
<img width="1745" height="598" alt="Blank diagram" src="https://github.com/user-attachments/assets/8550cbe8-077d-4987-b532-a9acbc38bfce" />

⚙️ Langkah Instalasi & Menjalankan Proyek
1️⃣ Clone Repository
•	git clone https://github.com/username/project-kursus.git
cd project-kursus
2️⃣ Install Dependencies
•	composer install
npm install
3️⃣ Buat Database di MySQL
•	mysql -u root -p
CREATE DATABASE kursus-online CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
4️⃣ Konfigurasi .env
•	cp .env.example .env
Edit isi DB_DATABASE=kursus_db, DB_USERNAME=root, DB_PASSWORD=
5️⃣ Generate Key & Migrasi Database
•	php artisan key:generate
php artisan migrate
6️⃣ Jalankan Tailwind
•	npm run dev
7️⃣ Jalankan Server
•	php artisan serve
Akses di http://localhost:8000
