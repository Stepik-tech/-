<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Логи - {{ env('PROJECT_NAME') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/dist/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/dist/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/dist/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="/dist/img/favicon/site.webmanifest">
    <link rel="stylesheet" href="/dist/css/app.css">
    <script src="/dist/js/app.js"></script>
    <style>
        .filter-buttons * {
            margin-right: 15px;
            position: relative;
            z-index: 3;
        }
    </style>
</head>
<body>
<div id="app" class="app">
    <div class="app-nav">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand logo" href="/">
                <div class="app-nav-logo ">
                    GP <span class="text-muted">{{ env('PROJECT_NAME') }}</span>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto"></ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item d-flex align-items-center me-2">
                        <span class="badge badge-secondary">{{ env('SERV_NAME') }}</span>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <span class="badge badge-secondary"></span>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre="">
                           @if (auth()->check()) {{ auth()->user()->nickname }} @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/profile">
                                Профиль
                            </a>
                            <a class="dropdown-item" href="/logout"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Выйти
                            </a>
                            <form id="logout-form" action="/logout" method="POST"
                                  class="d-none">
                                  @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="app-sidebar bg-dark">
        <div class="d-flex flex-column flex-shrink-0">
        <div class="app-nav-menu">
                <div class="app-nav-menu__item ">
                    <a class="app-nav-menu__item-link {{ request()->is('profile*') ? 'app-nav-menu__item-link--active' : '' }}" href="/profile">
                        <i class="bi bi-person-circle"></i>
                        Профиль
                    </a>
                </div>
                <hr class="my-2">
                <div class="sidebar-heading" style="color: gray"><strong>Серверная Информация</strong></div>
                <div class="app-nav-menu__item ">
                    <a class="app-nav-menu__item-link {{ request()->is('/') ? 'app-nav-menu__item-link--active' : '' }}" href="/">
                        <i class="bi bi-house-door"></i>
                        Логи
                    </a>
                </div>
                <div class="app-nav-menu__item ">
                    <a class="app-nav-menu__item-link {{ request()->is('player/search*') ? 'app-nav-menu__item-link--active' : '' }}" href="/player/search">
                        <i class="bi bi-search"></i>
                        Поиск игрока
                    </a>
                </div>
                <div class="app-nav-menu__item ">
                    <a class="app-nav-menu__item-link {{ request()->is('orgs*') ? 'app-nav-menu__item-link--active' : '' }} " href="/orgs">
                        <i class="bi bi-building"></i>
                        Организации
                    </a>
                </div>
                @if ($user->lvl >= 2)
                        <div class="sidebar-heading" style="color: gray"><strong>Для главной администрации</strong></div>
                        <div class="app-nav-menu__item ">
                    <a class="app-nav-menu__item-link {{ request()->is('admins*') ? 'app-nav-menu__item-link--active' : '' }} " href="/admins">
                        <i class="bi bi-people-fill"></i>
                        Администрация
                    </a>
                </div>
                @if ($user->lvl >= 3)
<div class="app-nav-menu__item ">
                    <a class="app-nav-menu__item-link {{ request()->is('admin/users*') ? 'app-nav-menu__item-link--active' : '' }} " href="/admin/users">
                        <i class="bi bi-people-fill"></i>
                        Список пользователей
                    </a>
                </div>
                @endif
                        @endif
            </div>
        </div>
    </div>
    @yield('content')