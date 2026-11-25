# Restaurant Management (Laravel)

A restaurant website with an admin panel, built with Laravel and Jetstream. Customers browse the menu, add dishes to a cart, order and book a table, and the admin manages the menu, chefs, orders, reservations and users.

## Features

**Customer site**
- Home page with the food menu and the chefs
- Sign up and log in with Laravel Jetstream
- Add dishes to a cart with a quantity, view the cart and remove items
- Confirm an order with your name, phone and address
- Book a table

**Admin panel**
- Admins are sent to the admin panel after login (`usertype = 1`), customers to the site
- **Food menu:** add dishes with a photo, edit and delete them
- **Chefs:** add chefs with a photo and speciality, edit and delete them
- **Orders:** list all orders and search them by dish or customer name
- **Reservations:** list table bookings
- **Users:** list and delete users
- Built on the Corona dark Bootstrap admin template

## Built with

- PHP 7.3+/8, Laravel 8
- Laravel Jetstream with Livewire
- Bootstrap (Corona admin template), Laravel Mix
- MySQL

## Run it locally

You need PHP 7.3 or 8.x, Composer, Node.js and MySQL.

```bash
git clone https://github.com/hamzakhalem/restaurrant-mng.git
cd restaurrant-mng
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
```

Set `DB_DATABASE`, `DB_USERNAME` and `DB_PASSWORD` in `.env`, then:

```bash
php artisan migrate
php artisan serve
```

Open http://127.0.0.1:8000 and create an account. To make it an admin, set `usertype` to `1` for that user in the `users` table.

On Windows, clone with `git clone -c core.longpaths=true ...`, because the admin template has very long file paths.

## Project structure

```
app/Http/Controllers/HomeController.php    Site, cart, orders, login redirect
app/Http/Controllers/AdminController.php   Menu, chefs, orders, reservations, users
app/Models/                                Food, FoodChef, Cart, Order, Reservation
resources/views/admin/                     Admin panel pages
resources/views/                           Site pages (home, food menu, chefs, cart, reservations)
```
