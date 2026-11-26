@extends('layouts.app')

@section('title', $title)

@section('content')
    <div class="wrap hero">
        <div class="badge"><span class="dot"></span> ÐœÐ°Ñ€ÑˆÑ€ÑƒÑ‚: /{{ urldecode(ltrim(request()->path(), '/')) }}</div>
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
                Ð˜Ð¼Ñ Ð¼Ð°Ñ€ÑˆÑ€ÑƒÑ‚Ð°: <code>{{ $name }}</code> â€” ÑÑÑ‹Ð»ÐºÑƒ Ð¼Ð¾Ð¶Ð½Ð¾ Ð¿Ð¾ÑÑ‚Ñ€Ð¾Ð¸Ñ‚ÑŒ
                Ñ…ÐµÐ»Ð¿ÐµÑ€Ð¾Ð¼ <code>route('{{ $name }}')</code>.
            </p>
        @endif

        <div class="actions">
            <a class="btn btn-primary" href="/">â† Ð’ÑÐµ Ð¼Ð°Ñ€ÑˆÑ€ÑƒÑ‚Ñ‹</a>
            <a class="btn btn-ghost" href="/posts/3/comments/12">ÐœÐ°Ñ€ÑˆÑ€ÑƒÑ‚ Ñ Ð´Ð²ÑƒÐ¼Ñ Ð¿Ð°Ñ€Ð°Ð¼ÐµÑ‚Ñ€Ð°Ð¼Ð¸</a>
        </div>
    </div>
@endsection
