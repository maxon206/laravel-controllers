<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Главная страница со списком маршрутов.
     * Было: Route::get('/', function () { return view('home'); });
     */
    public function home()
    {
        return view('home');
    }

    /**
     * Статическая страница «О нас».
     */
    public function about()
    {
        return view('page', [
            'title' => 'О нас',
            'text'  => 'Страница о нашем проекте',
        ]);
    }

    /**
     * Приветствие. Параметр необязательный, по умолчанию — «гость».
     * Было: Route::get('/hello/{name?}', function (string $name = 'гость') {...});
     */
    public function hello(string $name = 'гость')
    {
        return view('page', [
            'title'  => 'Приветствие',
            'text'   => 'Привет, ' . $name . '!',
            'params' => ['name' => $name, 'тип' => 'необязательный параметр'],
        ]);
    }

    /**
     * Страница пользователя. Параметр ограничен правилом whereNumber('id').
     * Было: Route::get('/user/{id}', function (string $id) {...});
     */
    public function show(string $id)
    {
        return view('page', [
            'title'  => 'Страница пользователя',
            'text'   => 'Страница пользователя №' . $id,
            'params' => ['id' => $id, 'тип' => 'обязательный параметр'],
        ]);
    }

    /**
     * Просмотр статьи по номеру.
     */
    public function post(string $id)
    {
        return view('page', [
            'title'  => 'Просмотр статьи',
            'text'   => 'Просмотр статьи №' . $id,
            'params' => ['id' => $id, 'тип' => 'обязательный параметр'],
        ]);
    }

    /**
     * Комментарий к статье — два параметра из адреса.
     * Было: Route::get('/posts/{post}/comments/{comment}', function (...) {...});
     */
    public function postComment(string $post, string $comment)
    {
        return view('page', [
            'title'  => 'Комментарий к статье',
            'text'   => "Статья №{$post}, комментарий №{$comment}",
            'params' => ['post' => $post, 'comment' => $comment],
        ]);
    }
}
