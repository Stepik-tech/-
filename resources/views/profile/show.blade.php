@extends('layouts.app')

@section('content')
<div class="app-content app-content--sidebar">
        <div class="app-content-body">
            <h5 class="app-content-body-title">Мой профиль</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
        <div class="card-header">Профиль пользователя {{ $user->nickname }}</div>

        <div class="card-body">
            <div class="d-flex align-items-center">
                <img src="/dist/img/ava.jpg" class="rounded-circle" width="150" height="150" alt="Avatar">
                <div class="ml-4">
                    <p><strong>Ник:</strong> {{ $user->nickname }}</p>
                    <p><strong>Должность:</strong> 
                        @if ($user->lvl == 1)
                          <span style="color: #e8a702"> <strong> Технический администратор<strong></span>
                        @elseif ($user->lvl == 2)
                        <span style="color: #020ae8"> <strong>Главный Технический администратор<strong></span>
                        @elseif ($user->lvl == 3)
                            <span style="color: #2b6300"> <strong>Главная Администрация<strong></span>
                        @else
                            Пользователь
                        @endif
                    </p>
                    <p><strong>Дата регистрации:</strong> {{ $user->created_at->format('d.m.Y в H:i') }}</p>
                    <p><strong>Вы с нами:</strong>
                                @php
                                    $timeWithUs = $user->time_with_us;
                                @endphp
                                {{ $timeWithUs['days'] }} дн. {{ $timeWithUs['hours'] }} ч. {{ $timeWithUs['minutes'] }} мин. {{ $timeWithUs['seconds'] }} сек.
                            </p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">Изменение пароля</div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('profile.updateProfile') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="old_password" class="form-label">Текущий пароль</label>
                    <input id="old_password" type="password" class="form-control" name="old_password" required>
                    @error('old_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">Новый пароль</label>
                    <input id="new_password" type="password" class="form-control" name="new_password">
                    @error('new_password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="new_password_confirmation" class="form-label">Повторите новый пароль</label>
                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation">
                    @error('new_password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Обновить пароль</button>
            </form>
        </div>
    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
