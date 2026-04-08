@extends('layouts.app')

@section('content')
<div class="app-content app-content--sidebar">
        <div class="app-content-body">
            <h5 class="app-content-body-title">Логи</h5>
            <div class="row">
                <div class="col-md-12">
            <div class="card">
                <div class="card-header">Поиск игрока</div>

                <div class="card-body">
                    <form id="searchForm" action="{{ route('player.searchAndShow') }}" method="GET">

                        <div class="form-group row">
                            <label for="query" class="col-md-4 col-form-label text-md-right">Никнейм</label>

                            <div class="col-md-6">
                                <input id="query" type="text" class="form-control" name="query" value="{{ old('query', $query ?? '') }}" required autofocus>
                            </div>
                        </div>
<br>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Найти игрока
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            @if (isset($player))
            <div class="card mt-4">
                <div class="card-header">Информация об игроке</div>

                <div class="card-body">
                    <ul class="list-group">
                    <li class="list-group-item">ID: <strong>{{ $player->ID }}</strong></li>
                        <li class="list-group-item">Никнейм: <form id="playerForm" action="/" method="POST">
    @csrf
    <input type="hidden" name="sort" value="desc">
    <input type="hidden" name="player" value="{{ $player->NickName }}">
    <button type="submit" style="border: none; background: none; padding: 0;">
        <a href="#"><strong>{{ $player->NickName }}</strong></a>
    </button>
</form></li>
                        <li class="list-group-item">Регистрационный IP: <a href="/?sort=desc&ip={{ $player->RegIP }}"><strong>{{ $player->RegIP }}</strong></a></li>
                        <li class="list-group-item">Последний IP: <a href="/?sort=desc&ip={{ $player->OldIP }}"><strong>{{ $player->OldIP }}</strong></a></li>
                        <li class="list-group-item">Последний вход: <strong>{{ $player->LastLogin }}</strong></li>
                        <li class="list-group-item">Уровень администратора: <strong>{{ $player->Admin }}</strong></li>
                        <li class="list-group-item">Уровень: <strong>{{ $player->Level }}</strong></li>
                        <li class="list-group-item">Виртуальные деньги: <strong>{{ $player->VirMoney }}</strong></li>
                        <li class="list-group-item">Деньги: <strong>{{ $player->Money }}</strong></li>
                        <li class="list-group-item">Деньги в банке: <strong>{{ $player->Bank }}</strong></li>
                        <li class="list-group-item">Лидер: <strong>{{ $player->Leader }}</strong></li>
                        <li class="list-group-item">Ранг: <strong>{{ $player->Rank }}</strong></li>
                        <li class="list-group-item">Онлайн статус: <strong>{{ $player->Online_status }}</strong></li>
                        <li class="list-group-item">VIP статус: <strong>
                            @switch($player->VIP)
                                @case(0)
                                    None
                                    @break
                                @case(1)
                                    VIP 1 уровня
                                    @break
                                @case(2)
                                    VIP 2 уровня
                                    @break
                                @case(3)
                                    VIP 3 уровня
                                    @break
                                @case(5)
                                    Titan VIP
                                    @break
                                @case(6)
                                    PREMIUM VIP
                                    @break
                                @case(8)
                                    SUPREME VIP
                                    @break
                                @case(9)
                                    SOLUTION VIP
                                    @break
                                @default
                                    Удаленная
                            @endswitch
                        </strong></li>
                        <li class="list-group-item">VIP время: <strong>
                            @php
                                $t = time();
                                if ($player->VipTime <= 0) {
                                    $vtime = '';
                                } elseif (($player->VipTime - $t) / 60 / 60 / 24 > 1) {
                                    $vt = ($player->VipTime - $t) / 60 / 60 / 24;
                                    $text1 = 'дней'; 
                                    $vtime = round($vt);
                                } else {
                                    $vt = ($player->VipTime - $t) / 60 / 60;
                                    $text1 = 'час(ов)'; 
                                    $vtime = round($vt);
                                }
                            @endphp
                            {{ $vtime }} {{ $text1 ?? '' }}
                        </strong></li>
                        <li class="list-group-item">Деморган: <strong>
                            @php
                                if ($player->Demorgan <= 0) {
                                    $jailtime = '';
                                } elseif (($player->Demorgan - $t) / 60 / 60 / 24 > 1) {
                                    $jt = ($player->Demorgan - $t) / 60 / 60 / 24;
                                    $text2 = 'дней'; 
                                    $jailtime = round($jt);
                                } else {
                                    $jt = ($player->Demorgan - $t) / 60 / 60;
                                    $text2 = 'час(ов)'; 
                                    $jailtime = round($jt);
                                }
                            @endphp
                            {{ $jailtime }} {{ $text2 ?? '' }}
                        </strong></li>
                        <li class="list-group-item">Отыгранные часы: <strong>{{ $player->PlayerTimess }}</strong></li>
                        <li class="list-group-item">Рефералы: <strong>{{ $player->Referal }}</strong></li>
                        <li class="list-group-item">Донат: <strong>{{ $player->Roubles }}</strong></li>
                    </ul>
                </div>
            </div>

            @if (isset($banInfo))
            <div class="card mt-4">
                <div class="card-header">Информация о бане</div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Причина бана: <strong>{{ $banInfo->BanReason }}</strong></li>
                        <li class="list-group-item">Администратор: <strong>{{ $banInfo->BanAdmin }}</strong></li>
                        <li class="list-group-item">Дата бана: <strong>{{ $banInfo->BanDate }}</strong></li>
                    </ul>
                </div>
            </div>
            @endif
            @if (isset($vehicles) && $vehicles->count() > 0)
            <div class="card mt-4">
                <div class="card-header">Транспорт игрока</div>
                @foreach ($vehicles as $vehicle)
                <div class="col-md-2 mb-6">
                            <div class="card">
                                <img src="/dist/img/cars/{{ $vehicle->Model }}.jpg" class="card-img-top" alt="{{ $vehicle->Model }}">
                                <div class="card-body">
                                    <h5 class="card-title">Car ID: {{ $vehicle->ID }}</h5>
                                    <p class="card-text">Модель: {{ $vehicle->Model }}</p>
                                    <p class="card-text">Номер: {{ $vehicle->Number }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach  
            </div>
            @endif
            @if (isset($logs) && $logs->count() > 0)
            <div class="card mt-4">
                <div class="card-header">Логи игрока</div>

                <div class="card-body">
                <div class="table-responsive">
                                <table class="table">
                                <thead>
 <tr>
 <th scope="col" style="width: 15%">
 Дата<br><span class="table-description text-muted">Дата и время</span></th>
 <th scope="col" style="width: 50%;">
 Действие<br><span class="table-description text-muted">Описание действия</span></th>
 <th scope="col" style="width: 20%">
 Данные (I, II)<br><span class="table-description text-muted">Деньги/Банк/Донат</span></th>
 <th scope="col" style="width: 15%">
 IP адрес<br><span class="table-description text-muted">Последний/Регистрационный</span></th></tr></thead>
 <tbody>
    @foreach ($logs as $log)
        <tr>
            <td>{{ $log->Date }}</td>
            <td>{!! $log->Log !!}</td>
            <td>{!! $log->Info !!}</td>
            <td>{!! $log->Ip !!}</td>
        </tr>
    @endforeach
</tbody>
                                </table>
                            </div>
                </div>
            </div>
            @endif
            @endif
        </div>
    </div>
</div>
@endsection
