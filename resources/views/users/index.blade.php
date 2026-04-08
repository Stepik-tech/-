@extends('layouts.app')

@section('content')
<div class="app-content app-content--sidebar">
        <div class="app-content-body">
            <h5 class="app-content-body-title">Пользователи</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
        <div class="card-header">Все пользователи</div>

        <div class="card-body">

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Ник</th>
                <th>Почта</th>
                <th>Должность</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $euser)
                <tr>
                    <td>{{ $euser->id }}</td>
                    <td>{{ $euser->nickname }}</td>
                    <td>{{ $euser->email }}</td>
                    <td> @if ($euser->lvl == 1)
                          <span style="color: #e8a702"> <strong> Технический администратор<strong></span>
                        @elseif ($euser->lvl == 2)
                        <span style="color: #020ae8"> <strong>Главный Технический администратор<strong></span>
                        @elseif ($euser->lvl == 3)
                            <span style="color: #2b6300"> <strong>Главная Администрация<strong></span>
                        @else
                            Пользователь
                        @endif</td>
                    <td>
                        <a href="{{ route('users.edit', $euser->id) }}" class="btn btn-primary">Редактировать</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">Всего пользователей: {{ $users->count() }}</td>
            </tr>
        </tfoot>
    </table>
</div>
@endsection
