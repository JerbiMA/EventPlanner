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
```bash
php artisan storage:link
```

8. Seed admin user (optional):
```bash
php artisan db:seed --class=AdminUserSeeder
```

9. Start development server:
```bash
php artisan serve
```

Visit `http://localhost:8000`

## Default Admin Credentials

If you ran the AdminUserSeeder:
- Email: admin@example.com
- Password: password

## Database Structure

### Main Tables
- **users**: User accounts with roles (admin/user)
- **categories**: Event categories
- **events**: Events with details, pricing, capacity
- **registrations**: User event registrations

## Key Features Implementation

### Event Registration System
- Prevents duplicate registrations
- Real-time capacity tracking
- Validation for event start time
- Count-based capacity management

### Image Management
- Profile pictures for users
- Event images with preview
- Stored in `storage/app/public/`

### Access Control
- Admin middleware for backend routes
- User authentication for registrations
- Guest access for browsing events

## Routes

### Public Routes
- `/` - Home page with event listing
- `/events/{event}` - Event details
- `/login` - User login
- `/register` - User registration

### Authenticated User Routes
- `/profile` - User profile management
- `/my-registrations` - User's registered events
- `/events/{event}/register` - Register for event
- `/events/{event}/unregister` - Cancel registration

### Admin Routes (requires admin role)
- `/admin/categories` - Category management
- `/admin/events` - Event management
- `/admin/registrations` - View all registrations

## Project Structure

```
app/
├── Http/Controllers/
│   ├── EventController.php (Admin)
│   ├── CategoryController.php (Admin)
│   ├── Front/
│   │   ├── HomeController.php
│   │   └── RegistrationController.php
│   └── ProfileController.php
├── Models/
│   ├── User.php
│   ├── Event.php
│   ├── Category.php
│   └── Registration.php
resources/views/
├── backoffice/ (Admin views)
│   ├── events/
│   ├── categories/
│   └── registrations/
├── front/ (Public views)
│   ├── home.blade.php
│   ├── event-details.blade.php
│   └── my-registrations.blade.php
└── profile/
    └── edit.blade.php
```

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
