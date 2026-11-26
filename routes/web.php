<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Маршруты учебного проекта «Контроллеры в Laravel»
|--------------------------------------------------------------------------
|
| В файле больше нет ни одного замыкания с логикой: каждый маршрут —
| это только связка «адрес -> метод контроллера PageController».
|
*/

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/about', [PageController::class, 'about']);

Route::get('/user/{id}', [PageController::class, 'show'])
    ->whereNumber('id')
    ->name('user.show');

Route::get('/hello/{name?}', [PageController::class, 'hello'])
    ->name('hello');

Route::get('/posts/{post}/comments/{comment}', [PageController::class, 'postComment']);

Route::get('/posts/{id}', [PageController::class, 'post'])
    ->whereNumber('id')
    ->name('posts.show');
