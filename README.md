# EventPlanner

A comprehensive event management platform built with **Laravel** that allows users to browse, register for events, and manage their event registrations. The system includes both a public-facing interface and an admin dashboard for event and category management.

## Features

### Public Features
- 🎫 Browse upcoming events with search and filtering (by date, category)
- 📅 View detailed event information including capacity, pricing, and schedules
- 🔐 User authentication (register/login)
- ✅ Event registration with capacity management
- 📋 Personal dashboard to view and manage event registrations
- 👤 User profile management with image upload
- 🔍 Advanced search and pagination

### Admin Features
- 🎨 Category management (CRUD operations)
- 📌 Event management (CRUD operations)
- 🖼️ Image upload for events
- 💰 Free and paid event configuration
- 📊 Registration tracking and monitoring
- 👥 View all user registrations

## Technologies

### Backend
- **Framework**: Laravel 12.x
- **PHP**: 8.2+
- **Database**: MySQL
- **Authentication**: Laravel Breeze 2.3+
- **Storage**: Laravel File Storage System

### Frontend
- **Template Engine**: Blade
- **CSS Framework**: Tailwind CSS 3.1+
- **JavaScript**: Alpine.js 3.4+
- **Build Tool**: Vite 7.0+
- **HTTP Client**: Axios 1.11+

### Development Tools
- **Package Manager**: Composer 2.x
- **Node Package Manager**: npm
- **Code Quality**: Laravel Pint 1.24+
- **Testing**: PHPUnit 11.5+
- **Dev Environment**: Laravel Sail 1.41+ (optional)
- **Logging**: Laravel Pail 1.2+

## Requirements

- PHP >= 8.2
- Composer
- Node.js >= 16.x
- npm or yarn
- MySQL >= 5.7 or MariaDB >= 10.3
- Apache or Nginx web server

## Key Packages

### PHP Dependencies
- `laravel/framework` (^12.0) - Core framework
- `laravel/tinker` (^2.10) - REPL for Laravel
- `laravel/breeze` (^2.3) - Authentication scaffolding

### JavaScript Dependencies
- `alpinejs` (^3.4) - Lightweight JavaScript framework
- `@tailwindcss/forms` (^0.5) - Form styling
- `laravel-vite-plugin` (^2.0) - Asset bundling
- `autoprefixer` (^10.4) - CSS vendor prefixes

## Installation

### Quick Setup

1. Clone the repository:
```bash
git clone https://github.com/yourusername/EventPlanner.git
cd EventPlanner
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node dependencies:
```bash
npm install
```

4. Copy environment file and configure:
```bash
# Windows
copy .env.example .env

# Linux/Mac
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure database in `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eventplanner
DB_USERNAME=root
DB_PASSWORD=your_password
```

7. Create database:
```bash
# Login to MySQL and create database
mysql -u root -p
CREATE DATABASE eventplanner;
EXIT;
```

8. Run migrations:
```bash
php artisan migrate
```

9. Create storage symbolic link:
```bash
php artisan storage:link
```

10. Seed admin user (optional):
```bash
php artisan db:seed --class=AdminUserSeeder
```

11. Build frontend assets:
```bash
npm run build
```

12. Start development server:
```bash
php artisan serve
```

Visit `http://localhost:8000`

### Alternative: Using Composer Scripts

You can use the built-in setup script:
```bash
composer run setup
```

For development with hot reload:
```bash
composer run dev
```

## Configuration

### Environment Variables

Key environment variables to configure in `.env`:

```env
APP_NAME=EventPlanner
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=eventplanner
DB_USERNAME=root
DB_PASSWORD=

# Mail (for notifications)
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### File Permissions

Ensure proper permissions for storage and cache directories:

```bash
# Linux/Mac
chmod -R 775 storage bootstrap/cache

# Windows (run as administrator if needed)
# Usually not required on Windows development
```
