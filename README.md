# 🚀 Modul 5 Pemrograman Web - REST API with Laravel

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Postman](https://img.shields.io/badge/Postman-API-FF6C37?style=for-the-badge&logo=postman&logoColor=white)

### 💎 *Building Professional REST APIs Like a Pro* 💎

[📖 Documentation](#-documentation) • [🎯 Features](#-features) • [⚡ Quick Start](#-quick-start) • [🧪 Testing](#-testing)

---

</div>

## 📂 Project Structure

```
📦 Modul 5 Pemrograman Web
 ┣ 📂 codelab/          🧪 Todo List API (Learning Phase)
 ┣ 📂 tugas/            💼 Beauty Clinic API (Main Assignment)
 ┗ 📄 modul 5 web.pdf   📚 Module Documentation
```

---

## 🎯 What's Inside?

### 🧪 **CODELAB** - Todo List API
> *Your warm-up project to master Laravel APIs* ✨

#### 🔥 Features:
- ✅ **CRUD Operations** - Create, Read, Update, Delete todos
- 🔍 **Smart Search** - Find todos by title/description
- 🏷️ **Category Filter** - Filter by personal, work, study, others
- 📊 **Status Tracking** - pending, in_progress, done
- ⚡ **Quick Pagination** - Efficient data loading
- 🗑️ **Soft Delete** - Never lose data permanently

#### 🛠️ Tech Stack:
```
📱 Endpoints: 5 RESTful APIs
🗄️ Database: todos table (9 columns)
🔐 Validation: Complete input sanitization
📮 Postman: Ready-to-use collection
```

---

### 💼 **TUGAS** - Beauty Clinic API
> *The main event - Your professional portfolio piece* 🌟

#### ✨ Features:
- 💅 **Treatment Management** - Manage beauty services
- 🔎 **Advanced Search** - Search across name & description
- 🎨 **Category System** - facial, body_treatment, hair_care, nail_care, makeup
- 💰 **Price Range Filter** - Find treatments by budget
- ⭐ **Popularity Ratings** - 1-5 star system
- 📈 **Dynamic Sorting** - Sort by any field
- 📄 **Smart Pagination** - Customizable page limits
- 🎯 **Status Control** - Active/Inactive management

#### 🚀 Tech Stack:
```
🌐 Endpoints: 5 Professional REST APIs
💾 Database: treatments table (10 columns)
✅ Validation: Enterprise-level rules
🔄 Soft Deletes: Data recovery ready
📊 Filtering: Multi-parameter support
📮 Postman: Complete testing suite
```

---

## 🎨 Database Schemas

### 📋 Todos Table (Codelab)

| Column | Type | Description |
|--------|------|-------------|
| 🆔 id | bigint | Primary key |
| 📝 title | varchar(150) | Todo title |
| 📄 description | text | Todo details |
| 🏷️ status | enum | pending/in_progress/done |
| 📅 due_date | date | Deadline |
| ⚡ priority | tinyint | 1-3 (high to low) |
| 🎯 category | enum | personal/work/study/others |
| 🕐 timestamps | - | Auto tracking |
| 🗑️ deleted_at | timestamp | Soft delete |

### 💎 Treatments Table (Tugas)

| Column | Type | Description |
|--------|------|-------------|
| 🆔 id | bigint | Primary key |
| 💅 name | varchar(150) | Treatment name |
| 📄 description | text | Treatment details |
| 🎨 category | enum | facial/body_treatment/hair_care/nail_care/makeup |
| 💰 price | decimal(10,2) | Price in IDR |
| ⏱️ duration | integer | Duration in minutes |
| 🎯 status | enum | active/inactive |
| ⭐ popularity | tinyint | Rating 1-5 |
| 🕐 timestamps | - | Auto tracking |
| 🗑️ deleted_at | timestamp | Soft delete |

---

## ⚡ Quick Start

### 1️⃣ Clone & Setup

```bash
# Navigate to project
cd "e:\Joki Tugas & Website\Modul 5 Pemrograman Web"

# Choose your project
cd codelab    # For Todo API
# OR
cd tugas      # For Beauty Clinic API
```

### 2️⃣ Install Dependencies

```bash
# Install PHP packages
composer install

# Install Node packages
npm install
```

### 3️⃣ Configure Environment

```bash
# Copy environment file
cp .env.example .env

# Generate app key
php artisan key:generate

# Configure your database in .env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4️⃣ Run Migrations

```bash
# Create database tables
php artisan migrate

# Fresh start (optional)
php artisan migrate:fresh
```

### 5️⃣ Start Server

```bash
# Fire up the server! 🔥
php artisan serve

# Server running at http://127.0.0.1:8000
```

---

## 🧪 Testing with Postman

### 📥 Import Collections

1. Open Postman
2. Click **Import** button
3. Select collection file:
   - 📋 Codelab: `Modul5_Todo_API.postman_collection.json`
   - 💅 Tugas: `Modul5_BeautyClinic_API.postman_collection.json`
4. Start testing! 🚀

### 🎯 Available Endpoints

#### **Codelab Endpoints** 📋

```http
GET    /api/todos              # List all with filters
GET    /api/todos/{id}         # Get single todo
POST   /api/todos              # Create new todo
PUT    /api/todos/{id}         # Update todo
DELETE /api/todos/{id}         # Delete todo
```

#### **Tugas Endpoints** 💅

```http
GET    /api/treatments         # List all with advanced filters
GET    /api/treatments/{id}    # Get single treatment
POST   /api/treatments         # Create new treatment
PUT    /api/treatments/{id}    # Update treatment
DELETE /api/treatments/{id}    # Delete treatment
```

---

## 🔥 Advanced Filtering Examples

### 📋 Codelab - Todo Filters

```http
# Search todos
GET /api/todos?search=meeting

# Filter by status
GET /api/todos?status=pending

# Filter by category
GET /api/todos?category=work

# Pagination
GET /api/todos?limit=5&page=2

# Combine filters
GET /api/todos?search=project&status=in_progress&category=work&limit=10
```

### 💅 Tugas - Treatment Filters

```http
# Search treatments
GET /api/treatments?search=facial

# Filter by category
GET /api/treatments?category=facial

# Price range filter
GET /api/treatments?min_price=100000&max_price=500000

# Sort by price
GET /api/treatments?orderBy=price&sortBy=asc

# Combine everything!
GET /api/treatments?search=premium&category=facial&min_price=200000&status=active&orderBy=popularity&sortBy=desc&limit=10
```

---

## 💡 Sample Data

### 📋 Create Todo (Codelab)

```json
{
  "title": "Finish Laravel Module 5",
  "description": "Complete all REST API assignments",
  "status": "in_progress",
  "due_date": "2025-11-30",
  "priority": 1,
  "category": "study"
}
```

### 💅 Create Treatment (Tugas)

```json
{
  "name": "Facial Premium Anti-Aging",
  "description": "Perawatan wajah premium dengan teknologi terkini",
  "category": "facial",
  "price": 350000,
  "duration": 90,
  "status": "active",
  "popularity": 5
}
```

---

## 🎓 Learning Outcomes

By completing this module, you've mastered:

- ✅ **RESTful API Design** - Industry-standard practices
- ✅ **Laravel Eloquent ORM** - Database magic
- ✅ **Request Validation** - Data integrity
- ✅ **Route Model Binding** - Clean code
- ✅ **Soft Deletes** - Data recovery
- ✅ **Advanced Filtering** - Query optimization
- ✅ **Pagination** - Efficient data loading
- ✅ **API Testing** - Postman mastery

---

## 📊 Grading Criteria

| Component | Weight | Status |
|-----------|--------|--------|
| 🧪 Codelab | 15% | ✅ Complete |
| 💾 Database Implementation | 10% | ✅ Complete |
| 🌐 API Endpoints | 25% | ✅ Complete |
| 📮 Postman Collection | 15% | ✅ Complete |
| 🎯 Understanding & Demo | 35% | ⏳ Your Turn! |

**Total Completed**: 65% ✅  
**Remaining**: 35% (Demo & Q&A)

---

## 🛠️ Tech Stack

<div align="center">

| Technology | Version | Purpose |
|------------|---------|---------|
| ![Laravel](https://img.shields.io/badge/-Laravel-FF2D20?style=flat-square&logo=laravel&logoColor=white) | 11.x | Backend Framework |
| ![PHP](https://img.shields.io/badge/-PHP-777BB4?style=flat-square&logo=php&logoColor=white) | 8.2+ | Programming Language |
| ![MySQL](https://img.shields.io/badge/-MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white) | 8.0 | Database |
| ![Composer](https://img.shields.io/badge/-Composer-885630?style=flat-square&logo=composer&logoColor=white) | 2.x | Dependency Manager |
| ![Postman](https://img.shields.io/badge/-Postman-FF6C37?style=flat-square&logo=postman&logoColor=white) | Latest | API Testing |

</div>

---

## 🤝 Contributing

Improvements and feedback are always welcome! Feel free to:

1. 🍴 Fork the project
2. 🌟 Create a feature branch
3. 💪 Commit your changes
4. 🚀 Push to the branch
5. 🎉 Open a Pull Request

---

## 📝 License

This project is created for educational purposes as part of **Modul 5 Pemrograman Web** course.

---

<div align="center">

### 🌟 Made with ❤️ and ☕ for Learning

**Happy Coding! 🚀**

![Coding](https://img.shields.io/badge/Status-Learning-success?style=for-the-badge)
![Laravel](https://img.shields.io/badge/Framework-Laravel-red?style=for-the-badge)
![API](https://img.shields.io/badge/Type-REST%20API-blue?style=for-the-badge)

---

*Let's build amazing things together!* ✨

</div>
