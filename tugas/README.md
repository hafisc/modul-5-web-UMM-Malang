# Modul 5 Pemrograman Web - Beauty Clinic API (Tugas)

Proyek ini adalah implementasi Tugas Modul 5 Pemrograman Web. Aplikasi ini merupakan API untuk **Beauty Clinic** yang dibangun menggunakan Laravel 12, dilengkapi dengan autentikasi JWT (JSON Web Token), pemisahan route public/private, dan fitur upload gambar (File Storage).

## Fitur Utama

1.  **Authentication (JWT)**:
    -   Register: Pendaftaran user/admin baru.
    -   Login: Masuk dan mendapatkan JWT Token.
    -   Logout: Invalidasi token.
    -   Me: Mendapatkan data user yang sedang login.

2.  **Treatment Management**:
    -   **Public Access**: Melihat daftar treatment dan detail treatment (tidak perlu login).
    -   **Protected Access**: Menambah, Mengupdate, dan Menghapus treatment (harus login).
    -   **File Upload**: Upload gambar untuk treatment dengan validasi maksimal 5MB.
    -   **Filtering**: Search by name/description, filter by category/status/price range.

## Prasyarat

-   PHP >= 8.2
-   Composer
-   MySQL Database

## Instalasi

1.  **Masuk ke direktori tugas**
    ```bash
    cd tugas
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    ```

3.  **Setup Environment**
    -   Copy file `.env.example` menjadi `.env`.
    -   Sesuaikan konfigurasi database di file `.env`.

4.  **Generate Application Key**
    ```bash
    php artisan key:generate
    ```

5.  **Generate JWT Secret**
    ```bash
    php artisan jwt:secret
    ```

6.  **Run Migrations**
    ```bash
    php artisan migrate
    ```

7.  **Link Storage (untuk file upload)**
    ```bash
    php artisan storage:link
    ```

8.  **Jalankan Server**
    ```bash
    php artisan serve
    ```

## Dokumentasi API

Base URL: `http://localhost:8000/api`

### Auth Endpoints

| Method | Endpoint | Deskripsi | Header Required | Body Required |
| :--- | :--- | :--- | :--- | :--- |
| `POST` | `/register` | Pendaftaran User | `Accept: application/json` | `name`, `email`, `password`, `password_confirmation` |
| `POST` | `/login` | Login User | `Accept: application/json` | `email`, `password` |
| `POST` | `/me` | Get Current User | `Authorization: Bearer <token>` | - |
| `POST` | `/logout` | Logout | `Authorization: Bearer <token>` | - |

### Public Routes (Tidak Perlu Login)

| Method | Endpoint | Deskripsi | Parameter Optional |
| :--- | :--- | :--- | :--- |
| `GET` | `/treatments` | Get All Treatments | Query Params: `search`, `category`, `status`, `min_price`, `max_price`, `limit`, `page` |
| `GET` | `/treatments/{id}` | Get Treatment Detail | - |

### Protected Routes (Perlu Login)

Semua endpoint di bawah ini memerlukan Header:
`Authorization: Bearer <token>`

| Method | Endpoint | Deskripsi | Body Required |
| :--- | :--- | :--- | :--- |
| `POST` | `/treatments` | Create Treatment | `name`, `category`, `price`, `duration`, `status`, `image` (File < 5MB) |
| `POST` | `/treatments/{id}` | Update Treatment | **Gunakan Method POST dengan `_method=PUT`**. Body: `name`, `price`, `image` (File), dll. |
| `DELETE` | `/treatments/{id}` | Delete Treatment | - |

## Testing dengan Postman

1.  Import file `Modul5_BeautyClinic_API.postman_collection.json` ke Postman.
2.  **Auth**:
    -   Jalankan request **Register** untuk membuat akun admin.
    -   Jalankan request **Login**. Script otomatis akan menyimpan `token` ke environment variable.
3.  **Public**:
    -   Coba akses "Get All Treatments" tanpa login.
4.  **Protected**:
    -   Coba akses "Create Treatment" (tanpa token akan 401 Unauthorized).
    -   Gunakan token (otomatis terisi dari step login) untuk akses Create/Update/Delete.
    -   Untuk upload gambar, gunakan tab **Body -> form-data** di Postman.
