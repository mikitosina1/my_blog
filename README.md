# My Blog

A personal Laravel application used as a blog, portfolio, and a place to learn and try web application features. The app also contains independently maintained feature modules for a migraine diary, support chat, and module administration.

## Stack

- PHP `^8.4`, Laravel Framework `^13.0`
- MariaDB (DDEV config: `11.4`)
- DDEV with nginx-fpm; project PHP is configured as `8.4`
- Node.js `22`, Vite, Tailwind CSS, React, and Livewire 3
- Laravel Sanctum for API authentication and Laravel Reverb for broadcasting
- `nwidart/laravel-modules` for optional modules

Check `composer.json`, `package.json`, and `.ddev/config.yaml` for the authoritative dependency and runtime settings.

## Features

- Public home and about pages, localization, authentication, verified-user dashboard, and profile management.
- Versioned API endpoints for the current authenticated user and app bootstrap.
- Optional modules under `Modules/`:
  - **MigraineDiary** - attack tracking, dashboards, statistics, dictionaries, and PDF/Excel/email reports.
  - **SupportChat** - user/admin support rooms, messages, read/delivery state, and translations.
  - **ModuleManager** - admin controls for listing, enabling, disabling, deleting modules, and configuring module access.

Each module has its own README. The module repositories are independent of this application repository; clone the modules you need into `Modules/<ModuleName>` and follow their host-application notes. `TesstModule` is a local example module.

## API

Core application API routes are defined in `routes/api.php`:

| Method | Endpoint | Purpose | Access |
| --- | --- | --- | --- |
| `GET` | `/api/v1/me` | Return the authenticated user | `auth:sanctum` |
| `GET` | `/api/v1/app/bootstrap` | Return client bootstrap data | `web` middleware |

Module endpoints are documented in each module's README. The host application may apply additional route middleware or prefixes; use `php artisan route:list` to inspect the effective routes.

## Local setup with DDEV

Requirements: Git, Docker Desktop, DDEV, and Make (or run the equivalent commands directly).

```sh
git clone https://github.com/mikitosina1/my_blog.git
cd my_blog
```

Clone any desired module repository into its matching `Modules/` directory before installing Composer dependencies. The module repositories are not registered as Git submodules in this repository.

Then prepare and start the app:

```sh
cp .env.example .env
make start
make composer
make npm-install
make migrate
ddev exec php artisan key:generate
ddev exec npm run build
ddev launch
```

On PowerShell, copy the environment file with `Copy-Item .env.example .env`. Review `.env` and configure application, database, mail, broadcasting, and any external service credentials for your environment. DDEV provides the local database and service hostnames; use the project's DDEV configuration as the source of truth.

The Makefile also includes `npm-dev`, `npm-build`, `clear-cache`, and other convenience targets. Inspect `Makefile` for their exact commands.

## Running without DDEV

Use PHP and Composer versions compatible with `composer.json`, Node.js compatible with `package.json`, and a configured MariaDB instance. Configure `.env`, then run:

```sh
composer install
npm install
php artisan key:generate
php artisan migrate
npm run build
```

Configure a web server with the document root set to `public/`. Set up HTTPS, writable Laravel `storage/` and `bootstrap/cache/` directories, background workers/scheduler if used, and broadcasting/mail services according to the deployment environment. Do not expose debug settings or development credentials in production.

## Useful commands

```sh
ddev exec php artisan route:list
ddev exec php artisan migrate
ddev exec npm run dev
ddev exec npm run build
ddev exec ./vendor/bin/pint
```

Run project tests with `ddev exec php artisan test`.

## Repository layout

- `app/`, `routes/`, `resources/`, `database/` - host application.
- `Modules/` - separate module repositories and the local example module.
- `.ddev/` - local development environment.
- `.ai/` - local AI guidance; currently excluded from Git by `.gitignore`.
