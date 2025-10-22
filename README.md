# Sistem Pendaftaran Kursus

## 🎯 Tujuan
Membangun sistem sederhana untuk pendaftaran kursus, mencakup fitur:
- Data kursus
- Pendaftaran peserta
- Tampilan daftar kursus dan peserta

## ⚙️ Tech Stack

- **Backend:** Laravel 11 (PHP 8.2)  
- **Frontend:** TailwindCSS v3  
- **Database:** MySQL  
- **Web Server:** Laravel Artisan / Apache  
- **Package Manager:** Composer, npm/pnpm  

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
Akses di http://localhost:8000
