# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Development Commands

### Core Laravel Commands
- `php artisan serve` - Start development server
- `composer install` - Install PHP dependencies
- `npm install` - Install JavaScript dependencies
- `npm run dev` - Start Vite development server for frontend assets
- `npm run build` - Build frontend assets for production

### Testing
- `vendor/bin/phpunit` or `php artisan test` - Run PHPUnit tests
- Tests are located in `tests/Feature/` and `tests/Unit/`

### Code Quality
- `vendor/bin/pint` - Run Laravel Pint for code formatting (if available)
- Check composer.json for any additional linting commands

### Database
- `php artisan migrate` - Run database migrations
- `php artisan migrate:fresh --seed` - Fresh migration with seeders
- `php artisan db:seed` - Run database seeders

### API Documentation
- Swagger documentation available at `/api/documentation`
- Documentation files are in `app/Docs/` directory
- Generated docs stored in `storage/api-docs/api-docs.json`

## Architecture Overview

### Core System
This is a **Laravel 10** API for a water utility management system (APR - Agua Potable Rural) with Sanctum authentication. The system manages water consumption, billing, payments, and user administration for rural water cooperatives.

### Key Business Domains

**Users & Administration** (`app/Http/Controllers/Usuarios/`)
- User management with roles and categories
- Admin and client user data separation
- User suspension system
- Route management for field operations

**Water Management** (`app/Http/Controllers/Agua/`)
- Meter reading and consumption tracking
- Tariff and billing calculation
- Payment processing with DTE (electronic invoicing)
- Production tracking

**Financial** (`app/Http/Controllers/Finanzas/`)
- Cash register management
- Income/expense tracking
- Bank and provider management
- Accounting chart management

**Other Modules**
- Communications (announcements, notifications)
- Claims/complaints system
- Document management (liquidations, tickets)
- Inventory management
- System utilities and logging

### Authentication & API Structure
- **Sanctum-based authentication** - all protected routes under `auth:sanctum` middleware
- **API-only** - no web interface, pure JSON API
- **Resource controllers** - following Laravel RESTful conventions
- **Soft deletes** - most entities support restore functionality

### Database Architecture
- Complex relational structure with 80+ migration files
- Foreign key relationships extensively used
- Separation of concerns: users, admin_datos, cliente_datos tables
- Geographic hierarchy: regions → comunas

### Services Layer
- `ConsumoService` - consumption calculation logic
- `PagoService` - payment processing logic
- Services handle complex business logic outside controllers

### Swagger Documentation
- All endpoints documented with OpenAPI annotations
- Documentation classes in `app/Docs/` follow naming pattern `{Entity}Docs.php`
- L5-Swagger package generates documentation at `/api/documentation`

### Localization
- Spanish language support (`resources/lang/es/`)
- Laravel-lang package for common translations

### Key Patterns
- **Soft deletes with restore endpoints** - pattern: `/{resource}/{id}/restaurar`
- **Eliminated items endpoints** - pattern: `/{resource}-eliminados`
- **Nested resources** - e.g., consumption by user and meter
- **Grouped endpoints** - e.g., `/tarifas/agrupadas`

### Models Organization
- Base models in `app/Models/`
- Water-related models in `app/Models/Agua/`
- Clear namespace separation by domain

### Request Validation
- Form request classes in `app/Http/Requests/`
- Following Laravel naming conventions: `Store{Entity}Request`, `Update{Entity}Request`