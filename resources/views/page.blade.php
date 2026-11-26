@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="wrap hero">
        <div class="badge"><span class="dot"></span> Маршрут: /{{ urldecode(ltrim(request()->path(), '/')) }}</div>
        <h1>{{ $title }}</h1>
        <p class="lead">{{ $text }}</p>

        @if (!empty($params))
            <div class="params">
                @foreach ($params as $key => $value)
                    <div class="param">
                        <span>{{ $key }}</span>
                        <b>{{ $value }}</b>
                    </div>
                @endforeach
            </div>
        @endif

        @if (!empty($name))
            <p class="name">
                Имя маршрута: <code>{{ $name }}</code> — ссылку можно построить
                хелпером <code>route('{{ $name }}')</code>.
            </p>
        @endif

        <div class="actions">
            <a class="btn btn-primary" href="/">← Все маршруты</a>
            <a class="btn btn-ghost" href="/posts/3/comments/12">Маршрут с двумя параметрами</a>
        </div>
    </div>
@endsection
