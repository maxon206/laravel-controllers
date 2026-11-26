# Laravel Controllers — практическая работа

Учебный проект по теме **«Контроллеры в Laravel»**.

Логика из маршрутов прошлого урока перенесена в контроллер `PageController`:
в `routes/web.php` не осталось ни одного замыкания с кодом — только связки
«адрес → `[PageController::class, 'метод']`».

- **Репозиторий:** https://github.com/maxon206/laravel-controllers
- **Отчёт:** [REPORT.docx](REPORT.docx)

## Что сделано

| Пункт задания | Где посмотреть |
|---|---|
| Контроллер создан `make:controller` | `app/Http/Controllers/PageController.php` |
| Логика 6 маршрутов перенесена в методы | `PageController@home`, `@about`, `@hello`, `@show`, `@post`, `@postComment` |
| Маршруты — пары «класс + метод» | `routes/web.php` |
| В web.php нет замыканий | `routes/web.php` |
| Проверка в браузере | скриншоты в `REPORT.docx` |
| `route:list` показывает `PageController@метод` | скриншот в `REPORT.docx` |

## Стек

- PHP 8.3
- Laravel 12.74
- Composer 2.11
- SQLite (база по умолчанию)
- Blade, CSS (без сборки фронтенда)

## Запуск

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
```

Сайт откроется по адресу **http://127.0.0.1:8000**.

## Маршруты

```php
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about']);
Route::get('/user/{id}', [PageController::class, 'show'])->whereNumber('id')->name('user.show');
Route::get('/hello/{name?}', [PageController::class, 'hello'])->name('hello');
Route::get('/posts/{post}/comments/{comment}', [PageController::class, 'postComment']);
Route::get('/posts/{id}', [PageController::class, 'post'])->whereNumber('id')->name('posts.show');
```

Проверка списка маршрутов:

```bash
php artisan route:list --except-vendor
```

## Скриншоты

Все скриншоты находятся в папке [`docs/screenshots`](docs/screenshots) и вставлены
в отчёт `REPORT.docx`.

## Автор

Максим Макаров, 2026.
