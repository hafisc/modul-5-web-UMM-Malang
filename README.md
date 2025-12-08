# 🚀 Modul 5 Pemrograman Web - REST API with Laravel (Auth & Storage)

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![JWT](https://img.shields.io/badge/JWT-Auth-000000?style=for-the-badge&logo=json-web-tokens&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-API-FF6C37?style=for-the-badge&logo=postman&logoColor=white)

### 💎 *Building Professional REST APIs with Auth & File Uploads* 💎

[📖 Documentation](#-documentation) • [🎯 Features](#-features) • [⚡ Quick Start](#-quick-start) • [🧪 Testing](#-testing)

---

</div>

## 📂 Project Structure

```
📦 Modul 5 Pemrograman Web
 ┣ 📂 codelab/          🧪 Todo List API (JWT Auth + File Upload)
 ┣ 📂 tugas/            💼 Beauty Clinic API (JWT Auth + File Upload + Access Control)
 ┗ 📄 modul 5 web.pdf   📚 Module Documentation
```

---

## 🎯 What's New?

Update terbaru modul 5 ini menambahkan fitur **Autentikasi (JWT)** dan **File Storage**.

### 🧪 **CODELAB** - Todo List API
> *Todo List dengan Login & Upload Gambar* ✨

#### 🔥 Features:
- 🔒 **JWT Authentication** - Login, Register, Me, Logout
- 📸 **Image Upload** - Attach image to tasks
- ✅ **CRUD with Auth** - Protected endpoints
- 🔍 **Filtering & Search** - Existing functionalities maintained

### 💼 **TUGAS** - Beauty Clinic API
> *Professional Clinic System with Role-based Access* 🌟

#### ✨ Features:
- 🔐 **Secure Access** - Public vs Private Routes
  - **Public**: Get All Treatments, Get Detail
  - **Protected**: Create, Update, Delete (Need Token)
- 📸 **File Storage** - Upload Treatment Images (Max 5MB)
- 💅 **Treatment Management** - Complete CRUD
- 📊 **Advanced Filtering** - Category, Price, Popularity, etc.

---

## ⚡ Quick Start

### 1️⃣ Clone & Setup

```bash
# Masuk ke folder codelab atau tugas
cd codelab
# ATAU
cd tugas
```

### 2️⃣ Install Dependencies

```bash
composer install
```

### 3️⃣ Configure Environment

```bash
cp .env.example .env
php artisan key:generate
php artisan jwt:secret  # Generate JWT Secret Key

# Configure database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 4️⃣ Run Migrations

```bash
php artisan migrate
```

### 5️⃣ Link Storage

Penting agar file gambar yang diupload bisa diakses publik:

```bash
php artisan storage:link
```

### 6️⃣ Start Server

```bash
php artisan serve
```

---

## 🧪 Testing with Postman

Import file collection yang sudah diperbarui:
1. `codelab/Modul5_Todo_API.postman_collection.json`
2. `tugas/Modul5_BeautyClinic_API.postman_collection.json`

### 🔑 Authentication Flow

1. **Register User**: `POST /api/register`
2. **Login**: `POST /api/login` -> **Token disave otomatis** via script.
3. **Access Protected Route**: `GET /api/me` atau CRUD lainnya.

### 📸 File Upload Guide (Postman)

Untuk upload file (Create/Update):
1. Pilih Method: **POST**
2. Body -> **form-data**
3. Key: `image`, Type: **File**
4. Isi field lain (title, name, price, dll) sesuai kebutuhan.
5. **Khusus Update**: Tambahkan key `_method` dengan value `PUT` di body.

---

## 📝 API Endpoints Summary

### 🧪 Codelab Endpoints
| Method | Endpoint | Auth | Desc |
| :--- | :--- | :--- | :--- |
| `POST` | `/api/register` | ❌ | Register User |
| `POST` | `/api/login` | ❌ | Login & Get Token |
| `POST` | `/api/me` | ✅ | Get User Info |
| `GET` | `/api/todos` | ✅ | List Todos |
| `POST` | `/api/todos` | ✅ | Create Todo + Image |

### 💼 Tugas Endpoints
| Method | Endpoint | Auth | Desc |
| :--- | :--- | :--- | :--- |
| `GET` | `/api/treatments` | ❌ | Public List |
| `GET` | `/api/treatments/{id}` | ❌ | Public Detail |
| `POST` | `/api/treatments` | ✅ | Create + Image |
| `PUT` | `/api/treatments/{id}` | ✅ | Update + Image |
| `DELETE` | `/api/treatments/{id}` | ✅ | Delete |

---

<div align="center">

**Happy Coding! 🚀**

![Coding](https://img.shields.io/badge/Status-Complete-success?style=for-the-badge)
![Laravel](https://img.shields.io/badge/Framework-Laravel-red?style=for-the-badge)
![JWT](https://img.shields.io/badge/Auth-JWT-black?style=for-the-badge)

</div>
