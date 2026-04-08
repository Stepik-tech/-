@extends('layouts.app')

@section('content')
<div class="app-content app-content--sidebar">
        <div class="app-content-body">
            <h5 class="app-content-body-title">Редактирование Пользователя</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
        <div class="card-header">Редактирование</div>

        <div class="card-body">

        <form action="{{ route('users.update', $euser->id) }}" method="POST">
        @csrf
        @method('POST')

        <div class="form-group">
            <label for="nickname">Ник</label>
            <input type="text" name="nickname" id="nickname" class="form-control" value="{{ $euser->nickname }}" required>
        </div>

        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $euser->email }}" required>
        </div>

        <div class="form-group">
            <label for="lvl">Должность</label>
            <select name="lvl" id="lvl" class="form-control" required>
                <option value="0" {{ $euser->lvl == 0 ? 'selected' : '' }}>Пользователь</option>
                <option value="1" {{ $euser->lvl == 1 ? 'selected' : '' }}>Технический администратор</option>
                <option value="2" {{ $euser->lvl == 2 ? 'selected' : '' }}>Главный тех администратор</option>
                <option value="3" {{ $euser->lvl == 3 ? 'selected' : '' }}>Главная Администрация</option>
            </select>
        </div>

        <div class="form-group form-check">
            <input type="checkbox" name="change_password" id="change_password" class="form-check-input">
            <label for="change_password" class="form-check-label">Изменить пароль</label>
        </div>

        <div id="password_fields" style="display: none;">
            <div class="form-group">
                <label for="password">Новый пароль</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Повторите новый пароль</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    </form>
</div>
</div>
<script>
    document.getElementById('change_password').addEventListener('change', function() {
        var passwordFields = document.getElementById('password_fields');
        if (this.checked) {
            passwordFields.style.display = 'block';
        } else {
            passwordFields.style.display = 'none';
        }
    });
</script>
@endsection
