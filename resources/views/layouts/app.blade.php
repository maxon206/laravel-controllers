<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Маршрутизация в Laravel') — Laravel Routing</title>
    <style>
        :root {
            --bg: #0f172a;
            --panel: #16213b;
            --panel-2: #1c2a4a;
            --accent: #ff2d20;
            --accent-2: #ff7a70;
            --text: #e8edf7;
            --muted: #9aa8c2;
            --line: rgba(255, 255, 255, .09);
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: "Segoe UI", system-ui, -apple-system, Arial, sans-serif;
            background:
                radial-gradient(900px 500px at 15% -10%, rgba(255, 45, 32, .22), transparent 60%),
                radial-gradient(800px 500px at 95% 0%, rgba(56, 132, 255, .18), transparent 55%),
                var(--bg);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
        }
        a { color: inherit; text-decoration: none; }
        .wrap { max-width: 1120px; margin: 0 auto; padding: 0 28px; width: 100%; }
        header {
            border-bottom: 1px solid var(--line);
            background: rgba(15, 23, 42, .72);
            backdrop-filter: blur(10px);
        }
        .nav { display: flex; align-items: center; justify-content: space-between; height: 72px; }
        .brand { display: flex; align-items: center; gap: 12px; font-weight: 700; font-size: 19px; }
        .logo {
            width: 38px; height: 38px; border-radius: 10px;
            display: grid; place-items: center;
            background: linear-gradient(135deg, var(--accent), #b3120a);
            box-shadow: 0 8px 24px rgba(255, 45, 32, .35);
            font-size: 20px;
        }
        .nav-links { display: flex; gap: 22px; font-size: 14.5px; color: var(--muted); flex-wrap: wrap; }
        .nav-links a:hover, .nav-links .active { color: #fff; }
        main { flex: 1; }
        .hero { padding: 66px 0 54px; }
        .badge {
            display: inline-flex; align-items: center; gap: 8px;
            padding: 7px 14px; border-radius: 999px;
            border: 1px solid rgba(255, 122, 112, .35);
            background: rgba(255, 45, 32, .1);
            color: var(--accent-2); font-size: 13px; font-weight: 600;
            letter-spacing: .02em; margin-bottom: 22px;
            font-family: Consolas, monospace;
        }
        .dot { width: 7px; height: 7px; border-radius: 50%; background: var(--accent-2); }
        h1 { font-size: clamp(34px, 4.5vw, 52px); line-height: 1.12; letter-spacing: -.02em; }
        .lead { margin-top: 20px; max-width: 780px; font-size: 21px; color: var(--muted); }
        .params { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 30px; }
        .param {
            background: var(--panel); border: 1px solid var(--line);
            border-radius: 14px; padding: 16px 20px; min-width: 180px;
        }
        .param span { display: block; color: var(--muted); font-size: 12.5px; text-transform: uppercase; letter-spacing: .07em; margin-bottom: 4px; }
        .param b { font-size: 20px; font-family: Consolas, monospace; color: #fff; }
        .name {
            margin-top: 30px; padding: 16px 20px;
            border-left: 3px solid var(--accent);
            background: rgba(255, 45, 32, .07);
            border-radius: 0 12px 12px 0; color: var(--muted);
        }
        .name b { color: #fff; }
        code {
            font-family: "Cascadia Code", Consolas, monospace;
            font-size: .92em; color: #ffc9c4;
            background: rgba(255, 45, 32, .1); padding: 2px 7px; border-radius: 6px;
        }
        .panel {
            margin-top: 34px; background: var(--panel); border: 1px solid var(--line);
            border-radius: 18px; padding: 10px 18px 18px;
        }
        table { width: 100%; border-collapse: collapse; font-size: 15px; }
        th, td { text-align: left; padding: 13px 10px; border-bottom: 1px solid var(--line); vertical-align: top; }
        th { color: var(--accent-2); font-size: 12px; letter-spacing: .07em; text-transform: uppercase; }
        tr:last-child td { border-bottom: none; }
        td:first-child { white-space: nowrap; color: #fff; font-family: Consolas, monospace; }
        td { color: var(--muted); }
        td a { color: #ffd3cf; border-bottom: 1px dashed rgba(255, 122, 112, .5); }
        td a:hover { color: #fff; }
        .section-title { font-size: 26px; margin: 44px 0 6px; }
        .section-sub { color: var(--muted); margin-bottom: 20px; }
        .snippet {
            margin-top: 4px; background: #0b1220; border: 1px solid var(--line);
            border-radius: 12px; padding: 16px 18px;
            font-family: Consolas, monospace; font-size: 13.5px;
            color: #cfe3ff; overflow-x: auto; white-space: pre; line-height: 1.7;
        }
        .note {
            margin-top: 22px; border-left: 3px solid var(--accent);
            background: rgba(255, 45, 32, .07); border-radius: 0 12px 12px 0;
            padding: 14px 18px; color: var(--muted); font-size: 15px;
        }
        .note b { color: #fff; }
        .actions { display: flex; flex-wrap: wrap; gap: 14px; margin-top: 32px; }
        .btn {
            display: inline-flex; align-items: center; gap: 10px;
            padding: 12px 20px; border-radius: 12px; font-weight: 600; font-size: 15px;
            border: 1px solid var(--line); transition: .2s;
        }
        .btn-primary { background: var(--accent); border-color: var(--accent); box-shadow: 0 10px 26px rgba(255, 45, 32, .3); }
        .btn-ghost { background: rgba(255, 255, 255, .04); }
        .btn-ghost:hover { background: rgba(255, 255, 255, .08); }
        footer { border-top: 1px solid var(--line); padding: 24px 0 30px; color: var(--muted); font-size: 14px; }
        .footer-row { display: flex; justify-content: space-between; gap: 16px; flex-wrap: wrap; }
        @media (max-width: 860px) {
            .nav-links { gap: 14px; font-size: 13px; }
            .hero { padding-top: 46px; }
            td:first-child { white-space: normal; }
            .nav { height: auto; padding: 14px 0; align-items: flex-start; flex-direction: column; gap: 12px; }
        }
    </style>
</head>
<body>
<header>
    <div class="wrap nav">
        <a class="brand" href="/">
            <div class="logo">R</div>
            <span>Laravel Routing</span>
        </a>
        <nav class="nav-links">
            <a href="/" class="{{ request()->is('/') ? 'active' : '' }}">Главная</a>
            <a href="/about" class="{{ request()->is('about') ? 'active' : '' }}">О нас</a>
            <a href="/user/7" class="{{ request()->is('user/*') ? 'active' : '' }}">/user/7</a>
            <a href="/hello/Анна" class="{{ request()->is('hello*') ? 'active' : '' }}">/hello/Анна</a>
            <a href="/posts/3/comments/12">/posts/3/comments/12</a>
            <a href="{{ route('posts.show', ['id' => 5]) }}">/posts/5</a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<footer>
    <div class="wrap footer-row">
        <span>Практическая работа «Маршрутизация в Laravel» · Laravel {{ app()->version() }}</span>
        <span>© {{ date('Y') }} · Максим Макаров</span>
    </div>
</footer>
</body>
</html>
