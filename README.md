# Cashflow
Website kasir untuk mendata produk-produk toko


## Demo
Untuk melihat websitenya silahkan akses melalui link berikut:

Dengan username & pwd : admin@admin.com & password


## Tech Stack
Website dibuat dengan menggunakan:
- Laravel 11
- Bootstrap 5

## Cara Install dan Menjalankan Project

#### 1.Aktifkan server apache (XAMPP,Laragon,dsb) & Server Postgree

#### 2.Clone Repo
```bash
git clone https://github.com/Asyraf28/Cash-Flow.git
cd cashflow
```

#### 3.Install Dependencies
```bash
composer install
```

#### 4.Copy `.env` dan Generate Key
```bash
cp .env.example .env
php artisan key:generate
````

#### 5.Atur Konfigurasi `.env`
Contoh setting Mailtrap & DB :
```ini
APP_NAME=Laravel
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=cashflow_db
DB_USERNAME=root
DB_PASSWORD=
```

#### 6.Migrasi Database & Seeder
```bash
php artisan migrate --seed
````

#### 7.Migrasi Ulang Database & Seeder (opsional)
```bash
php artisan migrate:fresh --seed
````

#### 8.Jalankan Server Lokal
```bash
php artisan serve
````


