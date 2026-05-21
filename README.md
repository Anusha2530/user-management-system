# User Management System

## Project Description
This project is a Backend Development and Database Integration application developed using PHP and MySQL. It provides secure authentication, CRUD operations, role-based login, and profile management with profile picture upload functionality.

---

## Features

### Authentication System
- User Registration
- User Login & Logout
- Session Management
- Password Hashing using `password_hash()`
- Role-Based Login (Admin/User)

### CRUD Operations
- Add Users
- View Users
- Edit Users
- Delete Users with Confirmation Popup

### Profile Management
- Edit Profile
- Upload Profile Picture
- Dynamic Profile Display

### Security Features
- Prepared Statements using `mysqli_prepare`
- SQL Injection Prevention
- Server-side Input Validation
- Encrypted Password Storage

---

## Technologies Used
- PHP
- MySQL
- HTML
- CSS
- XAMPP
- phpMyAdmin

---

## Database Details

### Database Name
```sql
user_system
```

### Tables
1. users
2. roles

---

## ER Diagram
The project contains:
- users table
- roles table
- One-to-Many relationship between roles and users
---

## Project URL
```text
http://localhost/user-system/register.php
```

---

## Folder Structure

```text
user-system/
│
├── uploads/
│
├── db.php
├── index.php
├── register.php
├── login.php
├── logout.php
├── dashboard.php
├── add_user.php
├── edit_user.php
├── delete_user.php
├── profile.php
└── README.md
```

---

## How to Run the Project

1. Install XAMPP
2. Start Apache and MySQL
3. Place project folder inside:
```text
C:\xampp\htdocs\
```

4. Open phpMyAdmin
5. Create database:
```sql
user_system
```

6. Create required tables
7. Open browser and run:
```text
http://localhost/user-system/register.php
```

---

## Roles

### Admin
- Access Dashboard
- Manage Users
- Perform CRUD Operations

### User
- Login
- Manage Own Profile

---

## Security Implemented
- Password Hashing
- Session Authentication
- Prepared Statements
- Input Validation
- File Type & Size Validation for Image Upload

---

## Output
A complete User Management System with:
- Authentication
- CRUD Operations
- Role-Based Access
- Profile Management
- Secure Backend Functionality

---

## Author
Anusha
