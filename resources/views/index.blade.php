@extends('layouts.app')
@section('content')
    <div class="app-content app-content--sidebar">
        <div class="app-content-body">
            <h5 class="app-content-body-title">Логи</h5>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="filter js_component_filter row mb-3" method="GET" action="">
                                <div class="js_component_filter_item_type col-sm-3 mb-2">
                                    <label class="mb-1 mt-2 text-muted">Тип</label>
                                    <select name="type[]" class="js_component_select_multiple select2-hidden-accessible" multiple>
                        <option value="anti_warn" {{ in_array('anti_warn', (array)$request->input('type')) ? 'selected' : '' }}>Операции с анти-варн талонами</option>
                        <option value="anti_warn_remove" {{ in_array('anti_warn_remove', (array)$request->input('type')) ? 'selected' : '' }}>Трата анти-варн талонов</option>
						
						<option value="inventory" {{ in_array('inventory', (array)$request->input('type')) ? 'selected' : '' }}>Инвентарь</option>
						<option value="inventory_remove" {{ in_array('inventory_remove', (array)$request->input('type')) ? 'selected' : '' }}>Потеря из инвентаря</option>
						<option value="inventory_admin" {{ in_array('inventory_admin', (array)$request->input('type')) ? 'selected' : '' }}>Выдача предмета админом</option>
						        <option value="inventory_add" {{ in_array('inventory_add', (array)$request->input('type')) ? 'selected' : '' }}>Получение в инвентарь</option>
        <option value="admin" {{ in_array('admin', (array)$request->input('type')) ? 'selected' : '' }}>Действия администрации</option>
        <option value="rmute" {{ in_array('rmute', (array)$request->input('type')) ? 'selected' : '' }}>Мут репорта</option>
        <option value="unrmute" {{ in_array('unrmute', (array)$request->input('type')) ? 'selected' : '' }}>Снятие мута репорта</option>
        <option value="slapcar" {{ in_array('slapcar', (array)$request->input('type')) ? 'selected' : '' }}>Поджопник машине</option>
        <option value="flip" {{ in_array('flip', (array)$request->input('type')) ? 'selected' : '' }}>Переворот игрока</option>
        <option value="unfreeze" {{ in_array('unfreeze', (array)$request->input('type')) ? 'selected' : '' }}>Разморозил игрока</option>
        <option value="freeze" {{ in_array('freeze', (array)$request->input('type')) ? 'selected' : '' }}>Заморозил игрока</option>
        <option value="recon" {{ in_array('recon', (array)$request->input('type')) ? 'selected' : '' }}>Начал слежку за игроком</option>
        <option value="pm" {{ in_array('pm', (array)$request->input('type')) ? 'selected' : '' }}>Сообщение игроку</option>
        <option value="check" {{ in_array('check', (array)$request->input('type')) ? 'selected' : '' }}>Просмотр статистики</option>
        <option value="tp_admin_zone" {{ in_array('tp_admin_zone', (array)$request->input('type')) ? 'selected' : '' }}>Телепорт в админ.зону</option>
        <option value="agl" {{ in_array('agl', (array)$request->input('type')) ? 'selected' : '' }}>Выдача пакета лицензий</option>
        <option value="plveh" {{ in_array('plveh', (array)$request->input('type')) ? 'selected' : '' }}>Выдача транспорта</option>
        <option value="getip" {{ in_array('getip', (array)$request->input('type')) ? 'selected' : '' }}>Просмотр IP</option>
        <option value="giveitem" {{ in_array('giveitem', (array)$request->input('type')) ? 'selected' : '' }}>Выдача предмета</option>
        <option value="givedonate" {{ in_array('givedonate', (array)$request->input('type')) ? 'selected' : '' }}>Выдача доната</option>
        <option value="skick" {{ in_array('skick', (array)$request->input('type')) ? 'selected' : '' }}>Тихий кик</option>
        <option value="weap" {{ in_array('weap', (array)$request->input('type')) ? 'selected' : '' }}>Забрал оружия</option>
        <option value="removeitem" {{ in_array('removeitem', (array)$request->input('type')) ? 'selected' : '' }}>Забрал предмет</option>
        <option value="setbiz" {{ in_array('setbiz', (array)$request->input('type')) ? 'selected' : '' }}>Передача крыши бизнеса</option>
        <option value="spawnplayer" {{ in_array('spawnplayer', (array)$request->input('type')) ? 'selected' : '' }}>Спавн игроков</option>
        <option value="ao_chat" {{ in_array('ao_chat', (array)$request->input('type')) ? 'selected' : '' }}>Общий чат</option>
        <option value="ban" {{ in_array('ban', (array)$request->input('type')) ? 'selected' : '' }}>Бан</option>
        <option value="kpz" {{ in_array('kpz', (array)$request->input('type')) ? 'selected' : '' }}>КПЗ</option>
        <option value="goto" {{ in_array('goto', (array)$request->input('type')) ? 'selected' : '' }}>Телепорт к игроку</option>
        <option value="jail" {{ in_array('jail', (array)$request->input('type')) ? 'selected' : '' }}>Деморган</option>
        <option value="kick" {{ in_array('kick', (array)$request->input('type')) ? 'selected' : '' }}>Кик</option>
        <option value="mute" {{ in_array('mute', (array)$request->input('type')) ? 'selected' : '' }}>Мут</option>
        <option value="slap" {{ in_array('slap', (array)$request->input('type')) ? 'selected' : '' }}>Поджопник</option>
        <option value="uval" {{ in_array('uval', (array)$request->input('type')) ? 'selected' : '' }}>Увольнение</option>
        <option value="warn" {{ in_array('warn', (array)$request->input('type')) ? 'selected' : '' }}>Варн</option>
        <option value="banip" {{ in_array('banip', (array)$request->input('type')) ? 'selected' : '' }}>Бан по ip</option>
        <option value="sethp" {{ in_array('sethp', (array)$request->input('type')) ? 'selected' : '' }}>Выдача хп</option>
        <option value="unban" {{ in_array('unban', (array)$request->input('type')) ? 'selected' : '' }}>Разбан</option>
        <option value="unjail" {{ in_array('unjail', (array)$request->input('type')) ? 'selected' : '' }}>Выпуск из деморгана</option>
        <option value="unmute" {{ in_array('unmute', (array)$request->input('type')) ? 'selected' : '' }}>Снятие мута</option>
        <option value="unwarn" {{ in_array('unwarn', (array)$request->input('type')) ? 'selected' : '' }}>Снятие варна</option>
        <option value="gethere" {{ in_array('gethere', (array)$request->input('type')) ? 'selected' : '' }}>Телепорт к себе</option>
        <option value="givegun" {{ in_array('givegun', (array)$request->input('type')) ? 'selected' : '' }}>Выдача оружия</option>
        <option value="setskin" {{ in_array('setskin', (array)$request->input('type')) ? 'selected' : '' }}>Выдача скина</option>
        <option value="unbanip" {{ in_array('unbanip', (array)$request->input('type')) ? 'selected' : '' }}>Разбан ip адреса</option>
        <option value="banipoff" {{ in_array('banipoff', (array)$request->input('type')) ? 'selected' : '' }}>Бан ip адреса OFF</option>
        <option value="givemoney" {{ in_array('givemoney', (array)$request->input('type')) ? 'selected' : '' }}>Выдача денег</option>
        <option value="makeadmin" {{ in_array('makeadmin', (array)$request->input('type')) ? 'selected' : '' }}>Выдача/снятие админки</option>
        <option value="makeleader" {{ in_array('makeleader', (array)$request->input('type')) ? 'selected' : '' }}>Выдача/снятие лидерки</option>
		<option value="donate_admin" {{ in_array('donate_admin', (array)$request->input('type')) ? 'selected' : '' }}>Передача доната</option>
        <option value="report_answer" {{ in_array('report_answer', (array)$request->input('type')) ? 'selected' : '' }}>Ответ на репорт</option>
        <option value="sellbiz_admin" {{ in_array('sellbiz_admin', (array)$request->input('type')) ? 'selected' : '' }}>Слив бизнеса</option>
        <option value="sellcar_admin" {{ in_array('sellcar_admin', (array)$request->input('type')) ? 'selected' : '' }}>Слив транспорта</option>
        <option value="setname_admin" {{ in_array('setname_admin', (array)$request->input('type')) ? 'selected' : '' }}>Смена ника</option>
        <option value="sellhouse_admin" {{ in_array('sellhouse_admin', (array)$request->input('type')) ? 'selected' : '' }}>Слив дома</option>
                                        <!-- остальные опции-->
                                    </select>
                                </div>
                                <div class="js_component_filter_item_sort col-sm-3 mb-2">
                                    <label class="mb-1 mt-2 text-muted">Сортировка</label>
                                    <select name="sort" class="js_component_select_single select2-hidden-accessible">
                                        <option value="desc" selected>Сначала новые записи</option>
                                        <option value="asc">Сначала старые записи</option>
                                    </select>
                                </div>
                                <div 
            class="js_component_filter_item_min_period col-sm-3 mb-2"
            >
            <label class="mb-1 mt-2 text-muted">Период от</label>
            <div class="form-group">
        <input name="min_period" type="text" class="form-control js_component_datepicker" value="{{ $request->input('min_period') }}">
    </div>    </div>
                                <div class="js_component_filter_item_max_period col-sm-3 mb-2">
                                    <label class="mb-1 mt-2 text-muted">Период до</label>
                                    <div class="form-group">
                                        <input name="max_period" class="form-control js_component_datepicker" value="{{ $request->input('max_period') }}">
                                    </div>
                                </div>
                                <!-- остальные фильтры -->
                                <div class="js_component_filter_item_player col-sm-3 mb-2">
                                    <label class="mb-1 mt-2 text-muted">Никнейм игрока</label>
                                    <input name="player" type="text" class="form-control" value="{{ $request->input('player') }}">
                                </div>
                                <div class="js_component_filter_item_ip col-sm-3 mb-2">
                                    <label class="mb-1 mt-2 text-muted">IP адрес</label>
                                    <input name="ip" type="text" class="form-control" value="{{ $request->input('ip') }}">
                                </div>
                                <!-- остальные фильтры-->
                                <div class="filter-buttons col-md-12">
                                    <button type="submit" class="btn btn-primary">Применить фильтры</button>
                                    <button type="reset" class="btn btn-secondary">Сбросить фильтры</button>
                                </div>
                            </form>
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
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
@endsection