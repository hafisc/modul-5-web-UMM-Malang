# Modul 5 Pemrograman Web - Todo API with JWT & File Storage

Proyek ini adalah implementasi Codelab Modul 5 Pemrograman Web. Aplikasi ini merupakan API Todo List yang dibangun menggunakan Laravel 12, dilengkapi dengan autentikasi JWT (JSON Web Token) dan fitur upload gambar (File Storage).

## Fitur Utama

1.  **Authentication (JWT)**:
    -   Register: Pendaftaran user baru.
    -   Login: Masuk dan mendapatkan JWT Token.
    -   Logout: Invalidasi token.
    -   Me: Mendapatkan data user yang sedang login.
    -   Refresh Token: Memperbarui token yang expired.

2.  **Todo Management**:
    -   CRUD (Create, Read, Update, Delete) Todo.
    -   **Filtering**: Search by title/description, filter by status, priority, category.
    -   **Pagination**: Menampilkan data per halaman.
    -   **File Upload**: Upload gambar pendukung untuk setiap task Todo.

## Prasyarat

-   PHP >= 8.2
-   Composer
-   MySQL Database

## Instalasi

1.  **Clone Repositori (atau masuk ke direktori project)**
    ```bash
    cd codelab
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    ```

3.  **Setup Environment**
    -   Copy file `.env.example` menjadi `.env`.
    -   Sesuaikan konfigurasi database di file `.env`.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=nama_database_anda
    DB_USERNAME=root
    DB_PASSWORD=
    ```

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
| `POST` | `/refresh` | Refresh Token | `Authorization: Bearer <token>` | - |

### Todo Endpoints (Protected)

Semua endpoint di bawah ini memerlukan Header:
`Authorization: Bearer <token>`

| Method | Endpoint | Deskripsi | Parameter Optional / Body |
| :--- | :--- | :--- | :--- |
| `GET` | `/todos` | Get All Todos | Query Params: `search`, `status`, `category`, `priority`, `limit` |
| `POST` | `/todos` | Create Todo | `title` (required), `description`, `status`, `priority`, `category`, `due_date`, `image` (file) |
| `GET` | `/todos/{id}` | Get Todo Detail | - |
| `POST` | `/todos/{id}` | Update Todo | **Gunakan Method POST dengan `_method=PUT` di body jika upload file**. Body: `title`, `status`, `image` (file), dll. |
| `DELETE` | `/todos/{id}` | Delete Todo | - |

## Testing dengan Postman

1.  Import file `Modul5_Todo_API.postman_collection.json` ke Postman.
2.  Jalankan request **Register** untuk membuat akun.
3.  Jalankan request **Login**. Script otomatis akan menyimpan `token` ke environment variable.
4.  Gunakan request lain di folder **Todos**. Token akan otomatis terisi dari variabel `{{token}}`.

> **Catatan untuk Update dengan File Upload**:
> Karena keterbatasan HTML Forms/PHP dalam menangani `PUT` request dengan `multipart/form-data`, gunakan method `POST` dan tambahkan field `_method` dengan value `PUT` pada body request saat melakukan update data yang menyertakan file gambar.
