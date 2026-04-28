# Laravel Project Management API

A robust, secure, and scalable REST API backend built with Laravel. Designed to demonstrate best practices in architecture, security.

[//]: # (and automated testing.)

![PHP Version](https://img.shields.io/badge/PHP-8.2-blue)
![Laravel](https://img.shields.io/badge/Laravel-10.x-red)

---

## 🚀 About This Project

This application serves as a backend for a Project Management tool. It demonstrates production-ready code structure, utilizing a Service Layer to separate business logic from controllers, ensuring the application is maintainable.

[//]: # (and testable.)

### Key Features

-   **Authentication & Security**: Secure token-based authentication using Laravel Sanctum.
-   **Authorization**: Strict Role-Based Access Control (RBAC) using Policies to ensure data isolation (users cannot access other users' data).
-   **Clean Architecture**: Implementation of a Service Layer pattern for better separation of concerns.
-   **Data Transformation**: API Resources to standardize JSON responses and hide sensitive internal data.
-   **Auto-Documentation**: Interactive API documentation powered by **Dedoc/Scramble**.

[//]: # (-   **Testing**: Comprehensive Feature Test suite using PHPUnit to guarantee reliability and security.)

---

## 🏗️ Architecture Highlights

This project is not just a simple CRUD app; it is built to scale:

1.  **Service Layer Pattern**: Business logic is encapsulated in `Services`, keeping `Controllers` thin and focused only on HTTP handling.
2.  **Form Request Validation**: Validation logic is decoupled from controllers using dedicated Request classes.
3.  **API Resources**: Data is transformed cleanly before being sent to the client, ensuring a consistent JSON structure.

---

## 🛠️ Tech Stack

-   **Backend**: PHP 8.2, Laravel 10
-   **Database**: MySQL
-   **Authentication**: Laravel Sanctum

[//]: # (-   **Testing**: PHPUnit)
-   **Documentation**: Dedoc/Scramble

---

## 📖 API Documentation

Available here:

[https://tmp-site-7.free.nf/docs/api](https://tmp-site-7.free.nf/docs/api)

---
