@extends('layouts.app')

@section('content')
<div class="app-content app-content--sidebar">
    <div class="app-content-body">
        <h5 class="app-content-body-title">Список администрации</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" style="width: 15%">ID<br><span class="table-description text-muted">ID Администратора</span></th>
                                        <th scope="col" style="width: 50%">NickName<br><span class="table-description text-muted">NickName Администратора</span></th>
                                        <th scope="col" style="width: 20%">Уровень<br><span class="table-description text-muted">Уровень Админ-Прав</span></th>
                                        <th scope="col" style="width: 20%">Заходил<br><span class="table-description text-muted">Последний вход в админку</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($admins as $admin)
                                    <tr>
                                        <td>{{ $admin->admid }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>
                                            @if ($admin->level == 1)
                                            <span style="color: #87ceeb"><strong>Младщий модератор ({{ $admin->level }})</strong></span>
                                            @elseif ($admin->level == 2)
                                            <span style="color: #87ceeb"><strong>Старший Модератор ({{ $admin->level }})</strong></span>
                                            @elseif ($admin->level == 3)
                                            <span style="color: #ffa500"><strong>Младший Администратор ({{ $admin->level }})</strong></span>
                                            @elseif ($admin->level == 4)
                                            <span style="color: #00f"><strong>Старший Администратор ({{ $admin->level }})</strong></span>
                                            @elseif ($admin->level == 5)
                                            <span style="color: #4f00ea"><strong>Куратор ({{ $admin->level }})</strong></span>
                                            @elseif ($admin->level == 6)
                                            <span style="color: #6db36d "><strong>Зам. Главного Администратора ({{ $admin->level }})</strong></span>
                                            @elseif ($admin->level == 7)
                                            <span style="color: #2b6300"><strong>Главный Администратор ({{ $admin->level }})</strong></span>
                                            @elseif ($admin->level == 8)
                                            <span style="color: #f00"><strong>Основатель ({{ $admin->level }})</strong></span>
                                            @else
                                            <span style="color: #f00"><strong>Некорректный уровень</strong></span>
                                            @endif
                                        </td>
                                        <td>{{ $admin->last_connect }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">Общее количество администраторов: {{ $admins->count() }}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
