# Sistem Pendaftaran Kursus

## 🎯 Tujuan

Membangun sistem sederhana untuk pendaftaran kursus, mencakup fitur:
- User terdapat 2 role, student dan owner
- User dapat melakukan
    - Melihat katalog kelas
    - Melihat detail kelas
    - Mendaftar kelas
- User dapat Register, Login/Logout (register secara default terdaftar sebagai student)

## ⚙️ Tech Stack

- **Backend:** Laravel 11 (PHP 8.2)  
- **Frontend:** TailwindCSS v3  
- **Database:** MySQL  
- **Web Server:** Laravel Artisan / Apache  
- **Package Manager:** Composer, npm

## Struktur Databse

<img width="775" height="450" alt="image" src="https://github.com/user-attachments/assets/5ee67c7d-3124-41b0-b82c-55550072cb93" />


## ⏲️ Estimasi waktu mengerjakan

-  Perancangan sistem: 60 menit
-  Siapkan environment & buat project Laravel (setup composer, .env, DB, Install Breeze, Tailwind): 30 menit
-  Membuat model dan migration: 65 menit
-  Membuat controller dan routing: 180 menit
-  Buat Blade views: 60 menit
-  *Total Estimasi Waktu: 6,5 Jam*

## 🧠 User Flow

<img width="1745" height="598" alt="Blank diagram (1)" src="https://github.com/user-attachments/assets/ce5f8312-eb91-4a5f-9fc6-37d6324d5b3c" />

## ⚙️ Langkah Instalasi & Menjalankan Proyek

### 1️⃣ Clone Repository
```bash
git clone https://github.com/username/project-kursus.git
```
### 2️⃣ Install Dependencies
```bash
composer install
```
```bash
npm install
```
### 3️⃣ Buat Database di MySQL
```bash
mysql -u root -p

CREATE DATABASE kursus-online CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```
### 4️⃣ Konfigurasi .env
```bash
cp .env.example .env
```
Edit isi menjadi
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kursus-online
DB_USERNAME=root
DB_PASSWORD=
```
### 5️⃣ Generate Key & Migrasi Database
```bash
php artisan key:generate
```
Jalankan perintah migrasi disertai seeder
```bash
php artisan migrate --seed
```
### 6️⃣ Jalankan Tailwind
```bash
npm run dev
```
### 7️⃣ Jalankan Server
```bash
php artisan serve
```
Akses di http://127.0.0.1:8000
### 8️ Login dengan akun Owner atau Student
- Owner
```bash
email: owner@example.com
password: 123123
```
- Student
```bash
email: student@example.com
password: 123123
```


