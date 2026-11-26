@extends('layouts.app')

@section('title', 'Контроллеры в Laravel')

@section('content')
    <div class="wrap hero">
        <div class="badge"><span class="dot"></span> Практическая работа · Laravel 12</div>
        <h1>Логика переехала в контроллер</h1>
        <p class="lead">
            В <code>routes/web.php</code> больше нет ни одного замыкания с логикой: каждый маршрут —
            это только связка «адрес → <code>[PageController::class, 'метод']</code>». Все ответы
            формируются методами контроллера <code>app/Http/Controllers/PageController.php</code>.
        </p>
        <div class="actions">
            <a class="btn btn-primary" href="/hello/Анна">Открыть /hello/Анна</a>
            <a class="btn btn-ghost" href="/user/7">Открыть /user/7</a>
            <a class="btn btn-ghost" href="/posts/3/comments/12">Два параметра</a>
        </div>
    </div>

    <section class="wrap">
        <h2 class="section-title">Маршруты и методы контроллера</h2>
        <p class="section-sub">В колонке обработчика — контроллер и метод вместо <code>Closure</code>.</p>
        <div class="panel">
            <table>
                <thead>
                <tr>
                    <th>Метод</th>
                    <th>Адрес</th>
                    <th>Имя</th>
                    <th>Обработчик</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>GET</td>
                    <td><a href="/">/</a></td>
                    <td><code>home</code></td>
                    <td>PageController@home</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="/about">/about</a></td>
                    <td>—</td>
                    <td>PageController@about</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="/hello/Анна">/hello/{name?}</a></td>
                    <td><code>hello</code></td>
                    <td>PageController@hello</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="/user/7">/user/{id}</a></td>
                    <td><code>user.show</code></td>
                    <td>PageController@show</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="/posts/3/comments/12">/posts/{post}/comments/{comment}</a></td>
                    <td>—</td>
                    <td>PageController@postComment</td>
                </tr>
                <tr>
                    <td>GET</td>
                    <td><a href="/posts/5">/posts/{id}</a></td>
                    <td><code>posts.show</code></td>
                    <td>PageController@post</td>
                </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section class="wrap">
        <h2 class="section-title">Маршрут стал коротким</h2>
        <p class="section-sub">Вся логика — в методе контроллера, в маршруте остаётся только связка.</p>
        <div class="snippet">// routes/web.php
Route::get('/user/{id}', [PageController::class, 'show'])
    ->whereNumber('id')
    ->name('user.show');

// app/Http/Controllers/PageController.php
public function show(string $id)
{
    return view('page', [
        'title'  => 'Страница пользователя',
        'text'   => 'Страница пользователя №' . $id,
        'params' => ['id' => $id, 'тип' => 'обязательный параметр'],
    ]);
}</div>
    </section>

    <section class="wrap">
        <h2 class="section-title">Проверка через Artisan</h2>
        <p class="section-sub">Теперь в колонке обработчика видно контроллер и метод.</p>
        <div class="snippet">php artisan route:list --except-vendor

GET|HEAD  /                                home › PageController@home
GET|HEAD  about                            PageController@about
GET|HEAD  hello/{name?}                    hello › PageController@hello
GET|HEAD  posts/{post}/comments/{comment}  PageController@postComment
GET|HEAD  posts/{id}                       posts.show › PageController@post
GET|HEAD  user/{id}                        user.show › PageController@show</div>
        <p class="note">
            Ни одна строка в <code>web.php</code> не содержит <code>function () { ... }</code> —
            все ответы формируют методы <b>PageController</b>.
        </p>
    </section>
@endsection
