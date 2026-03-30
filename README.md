# College Department Management Portal

A Laravel-based web application to manage college department data and operations: students, staff, courses, events, publications, research projects, IPR records, internships, scholarships, and more.

## Functionalities

- Student management: create, read, update, delete student profiles, courses, scholarships, internships, further studies, and related images.
- Staff management: manage staff profiles, courses, lectures, events and assignments.
- Course management: assign students and staff to courses, track enrolments.
- Events: create and manage department events, event images, assignment and completion notifications.
- Publications & Research: manage publications, published books, research projects and related metadata.
- IPR (Intellectual Property Rights): record and manage IPR entries.
- News feeds: post department news with images and scheduling.
- Achievements: record student and staff achievements.
- Student internship tracking: store internship records and images.
- Student scholarship and further-studies management.
- Import/Export: import students via `StudentsImport` and export via `StudentsExport` (CSV/Excel integration available).
- Notifications: email/notification events (see `Notifications/` folder).
- Role & permission-aware authentication: integration via config and providers (see `config/permission.php`).
- File & media handling: storage links for uploaded images and documents.

## Tech stack

- Backend: PHP (Laravel)
- Frontend tooling: Laravel Mix (Webpack), NPM
- Database: MySQL (or MariaDB)
- Optional: Redis (queues/cache), Supervisor (queue workers)

## Quick Setup

Follow these steps to run the application locally.

1. Prerequisites
	- PHP 7.4 or 8.x with required extensions (pdo, mbstring, tokenizer, xml, openssl, ctype, json, bcmath)
	- Composer
	- Node.js and npm
	- MySQL/MariaDB

2. Clone the repository

	git clone <repo-url> college-department-management
	cd college-department-management

3. Environment
	- Copy the example environment file:

	  cp .env.example .env

	- Edit `.env` and set your database and mail credentials. Required variables include:

	  - `APP_NAME`, `APP_ENV`, `APP_URL`
	  - `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
	  - Mail settings: `MAIL_MAILER`, `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`, `MAIL_PASSWORD`, `MAIL_FROM_ADDRESS`, `MAIL_FROM_NAME`

4. Install PHP dependencies

	composer install --no-interaction --prefer-dist

5. Install JS dependencies and build assets

	npm install
	npm run dev

	For production assets: `npm run prod`.

6. Application key

	php artisan key:generate

7. Database setup

	Option A — Run migrations and seeders (recommended when migrations/seeds exist):

	php artisan migrate --force
	php artisan db:seed --class=DatabaseSeeder

	Option B — Import provided SQL (if you want a prepopulated DB):

	- Create a database matching `.env` settings, then import `frcrce-laravel.sql` using your DB tool or:

	  mysql -u username -p database_name < frcrce-laravel.sql

8. Storage symlink

	php artisan storage:link

9. Permissions (Linux/macOS)

	Ensure the webserver can write to the storage and cache directories:

	sudo chown -R www-data:www-data storage bootstrap/cache
	sudo chmod -R 775 storage bootstrap/cache

10. Run the app

	 php artisan serve

	 The app will be available at `http://127.0.0.1:8000` by default.

## Environment variables reference

- `APP_NAME`, `APP_ENV`, `APP_DEBUG`, `APP_URL`
- `DB_*` — database connection settings
- `MAIL_*` — mailer settings
- `QUEUE_CONNECTION`, `CACHE_DRIVER`, `SESSION_DRIVER` as needed

## Additional notes & troubleshooting

- If Composer runs out of memory on Windows, increase memory: `php -d memory_limit=-1 composer.phar install`.
- If uploads are missing, ensure `php artisan storage:link` ran and `storage/app/public` contains files.
- For DB connection errors, verify `.env` and run `php artisan config:clear` then `php artisan cache:clear`.
- If assets don't load, rebuild assets with `npm run dev` or `npm run prod`.
---