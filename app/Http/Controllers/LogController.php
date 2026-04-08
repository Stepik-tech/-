<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;

class LogController extends Controller
{
    public function index(Request $request)
    {
        // Инициализация запроса к модели Log
        $logsQuery = Log::query();

        if ($request->filled('type')) {
            // Фильтрация по типу
            $types = $request->input('type');

            // Проверка типа и применение соответствующего метода scope
            if (in_array('anti_warn', $types)) {
                $logsQuery->antiWarn();
            }

            if (in_array('anti_warn_remove', $types)) {
                $logsQuery->antiWarnRemove();
            }
            if (in_array('inventory_add', $types)) {
                $logsQuery->inventoryAdd();
            }

            if (in_array('admin', $types)) {
                $logsQuery->admin();
            }

            if (in_array('rmute', $types)) {
                $logsQuery->rmute();
            }

            if (in_array('unrmute', $types)) {
                $logsQuery->unrmute();
            }

            if (in_array('slapcar', $types)) {
                $logsQuery->slapcar();
            }

            if (in_array('flip', $types)) {
                $logsQuery->flip();
            }

            if (in_array('unfreeze', $types)) {
                $logsQuery->unfreeze();
            }

            if (in_array('freeze', $types)) {
                $logsQuery->freeze();
            }

            if (in_array('recon', $types)) {
                $logsQuery->recon();
            }

            if (in_array('pm', $types)) {
                $logsQuery->pm();
            }

            if (in_array('check', $types)) {
                $logsQuery->check();
            }

            if (in_array('tp_admin_zone', $types)) {
                $logsQuery->tpAdminZone();
            }

            if (in_array('agl', $types)) {
                $logsQuery->agl();
            }

            if (in_array('plveh', $types)) {
                $logsQuery->plveh();
            }

            if (in_array('getip', $types)) {
                $logsQuery->getip();
            }

            if (in_array('giveitem', $types)) {
                $logsQuery->giveitem();
            }

            if (in_array('givedonate', $types)) {
                $logsQuery->givedonate();
            }

            if (in_array('skick', $types)) {
                $logsQuery->skick();
            }

            if (in_array('weap', $types)) {
                $logsQuery->weap();
            }

            if (in_array('removeitem', $types)) {
                $logsQuery->removeitem();
            }

            if (in_array('setbiz', $types)) {
                $logsQuery->setbiz();
            }

            if (in_array('spawnplayer', $types)) {
                $logsQuery->spawnplayer();
            }

            if (in_array('ao_chat', $types)) {
                $logsQuery->aoChat();
            }

            if (in_array('ban', $types)) {
                $logsQuery->ban();
            }

            if (in_array('kpz', $types)) {
                $logsQuery->kpz();
            }

            if (in_array('goto', $types)) {
                $logsQuery->goto();
            }

            if (in_array('jail', $types)) {
                $logsQuery->jail();
            }

            if (in_array('kick', $types)) {
                $logsQuery->kick();
            }

            if (in_array('mute', $types)) {
                $logsQuery->mute();
            }

            if (in_array('slap', $types)) {
                $logsQuery->slap();
            }

            if (in_array('uval', $types)) {
                $logsQuery->uval();
            }

            if (in_array('warn', $types)) {
                $logsQuery->warn();
            }

            if (in_array('banip', $types)) {
                $logsQuery->banip();
            }

            if (in_array('sethp', $types)) {
                $logsQuery->sethp();
            }

            if (in_array('unban', $types)) {
                $logsQuery->unban();
            }

            if (in_array('unjail', $types)) {
                $logsQuery->unjail();
            }

            if (in_array('unmute', $types)) {
                $logsQuery->unmute();
            }

            if (in_array('unwarn', $types)) {
                $logsQuery->unwarn();
            }

            if (in_array('gethere', $types)) {
                $logsQuery->gethere();
            }

            if (in_array('givegun', $types)) {
                $logsQuery->givegun();
            }

            if (in_array('setskin', $types)) {
                $logsQuery->setskin();
            }

            if (in_array('unbanip', $types)) {
                $logsQuery->unbanip();
            }

            if (in_array('banipoff', $types)) {
                $logsQuery->banipoff();
            }

            if (in_array('givemoney', $types)) {
                $logsQuery->givemoney();
            }

            if (in_array('makeadmin', $types)) {
                $logsQuery->makeadmin();
            }

            if (in_array('makeleader', $types)) {
                $logsQuery->makeleader();
            }

            if (in_array('donate_admin', $types)) {
                $logsQuery->donateAdmin();
            }

            if (in_array('report_answer', $types)) {
                $logsQuery->reportAnswer();
            }

            if (in_array('sellbiz_admin', $types)) {
                $logsQuery->sellbizAdmin();
            }

            if (in_array('sellcar_admin', $types)) {
                $logsQuery->sellcarAdmin();
            }

            if (in_array('setname_admin', $types)) {
                $logsQuery->setnameAdmin();
            }

            if (in_array('sellhouse_admin', $types)) {
                $logsQuery->sellhouseAdmin();
            }
        }

        if ($request->filled('player')) {
            // Фильтрация по игроку
            $logsQuery->where('log', 'like', '%' . $request->input('player') . '%');
        }

        if ($request->filled('ip')) {
            // Фильтрация по IP
            $logsQuery->where('ip', 'like', '%' . $request->input('ip') . '%');
        }

        if ($request->filled('min_period')) {
    $minPeriod = $request->input('min_period');
    $logsQuery->where('date', '>=', $minPeriod);
}

if ($request->filled('max_period')) {
    $maxPeriod = $request->input('max_period');
    $logsQuery->where('date', '<=', $maxPeriod);
}

        // Сортировка по дате
        $logsQuery->orderBy('date', $request->input('sort', 'desc'));

        // Получение отфильтрованных и отсортированных логов
        $logs = $logsQuery->get();
        $user = auth()->user();
        return view('index', [
            'logs' => $logs,
            'request' => $request, // Передача запроса для сохранения состояния формы
            'user' => $user,
        ]);
    }
}
