<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $connection = 'server';
    protected $fillable = ['Log', 'Info', 'Ip', 'Date'];

    // Методы для фильтрации по типам
    public function scopeAntiWarn($query)
    {
        return $query->where('Log', 'like', '%Анти-варн%');
    }

    public function scopeAntiWarnRemove($query)
    {
        return $query->where('Log', 'like', '%Использовал Анти-варн%');
    }

    public function scopeInventoryAdd($query)
    {
        return $query->where('Log', 'like', '%получил предмет в инвентарь%');
    }

    public function scopeAdmin($query)
    {
        return $query->where('Log', 'like', '%Администратор%');
    }

    public function scopeRmute($query)
    {
        return $query->where('Log', 'like', '%заблокировал репорт%');
    }

    public function scopeUnrmute($query)
    {
        return $query->where('Log', 'like', '%разблокировал репорт%');
    }

    public function scopeFlip($query)
    {
        return $query->where('Log', 'like', '%флипнул игрока%');
    }

    public function scopeUnfreeze($query)
    {
        return $query->where('Log', 'like', '%разморозил игрока%');
    }

    public function scopeFreeze($query)
    {
        return $query->where('Log', 'like', '%заморозил игрока%');
    }

    public function scopeRecon($query)
    {
        return $query->where('Log', 'like', '%начал слежку за игроком%');
    }

    public function scopePm($query)
    {
        return $query->where('Log', 'like', '%написал игроку%');
    }

    public function scopeCheck($query)
    {
        return $query->where('Log', 'like', '%просмотрел статистику%');
    }

    public function scopeTpAdminZone($query)
    {
        return $query->where('Log', 'like', '%телепортировал в админ-зону%');
    }

    public function scopeAgl($query)
    {
        return $query->where('Log', 'like', '%выдал лицензии%');
    }

    public function scopePlveh($query)
    {
        return $query->where('Log', 'like', '%выдал транспорт%');
    }

    public function scopeGetip($query)
    {
        return $query->where('Log', 'like', '%просмотрел IP%');
    }

    public function scopeGiveitem($query)
    {
        return $query->where('Log', 'like', '%выдал предмет%');
    }

    public function scopeGivedonate($query)
    {
        return $query->where('Log', 'like', '%выдал донат%');
    }

    public function scopeSkick($query)
    {
        return $query->where('Log', 'like', '%тихо кикнул%');
    }

    public function scopeWeap($query)
    {
        return $query->where('Log', 'like', '%забрал оружие%');
    }

    public function scopeRemoveitem($query)
    {
        return $query->where('Log', 'like', '%удалил предмет инвентаря%');
    }

    public function scopeSetbiz($query)
    {
        return $query->where('Log', 'like', '%передал крышу бизнеса%');
    }

    public function scopeSpawnplayer($query)
    {
        return $query->where('Log', 'like', '%заспавнил игрока%');
    }

    public function scopeAoChat($query)
    {
        return $query->where('Log', 'like', '%написал в /ao%');
    }

    public function scopeBan($query)
    {
        return $query->where('Log', 'like', '%забанил игрока%');
    }

    public function scopeGoto($query)
    {
        return $query->where('Log', 'like', '%телепортировался к игроку%');
    }

    public function scopeJail($query)
    {
        return $query->where('Log', 'like', '%деморган%');
    }

    public function scopeKick($query)
    {
        return $query->where('Log', 'like', '%кикнул игрока%');
    }

    public function scopeMute($query)
    {
        return $query->where('Log', 'like', '%замутил игрока%');
    }

    public function scopeSlap($query)
    {
        return $query->where('Log', 'like', '%дал поджопник%');
    }

    public function scopeUval($query)
    {
        return $query->where('Log', 'like', '%уволил игрока%');
    }

    public function scopeWarn($query)
    {
        return $query->where('Log', 'like', '%выдал варн%');
    }

    public function scopeBanip($query)
    {
        return $query->where('Log', 'like', '%заблокировал IP%');
    }

    public function scopeSethp($query)
    {
        return $query->where('Log', 'like', '%выдал ХП%');
    }

    public function scopeUnban($query)
    {
        return $query->where('Log', 'like', '%разблокировал игрока%');
    }

    public function scopeUnjail($query)
    {
        return $query->where('Log', 'like', '%выпустил из деморгана%');
    }

    public function scopeUnmute($query)
    {
        return $query->where('Log', 'like', '%снял мут%');
    }

    public function scopeUnwarn($query)
    {
        return $query->where('Log', 'like', '%снял варн%');
    }

    public function scopeGethere($query)
    {
        return $query->where('Log', 'like', '%телепортировал игрока %к себе%');
    }

    public function scopeGivegun($query)
    {
        return $query->where('Log', 'like', '%выдал оружие%');
    }

    public function scopeSetskin($query)
    {
        return $query->where('Log', 'like', '%выдал скин%');
    }

    public function scopeUnbanip($query)
    {
        return $query->where('Log', 'like', '%разбанил IP%');
    }

    public function scopeBanipoff($query)
    {
        return $query->where('Log', 'like', '%забанил IP (Off)%');
    }

    public function scopeGivemoney($query)
    {
        return $query->where('Log', 'like', '%выдал деньги%');
    }

    public function scopeMakeadmin($query)
    {
        return $query->where('Log', 'like', '%изменил уровень админ-прав%');
    }

    public function scopeMakeleader($query)
    {
        return $query->where('Log', 'like', '%Выдача/снятие лидерки%');
    }

    public function scopeDonateAdmin($query)
    {
        return $query->where('Log', 'like', '%передал свой донат%');
    }

    public function scopeReportAnswer($query)
    {
        return $query->where('Log', 'like', '%ответил игроку %на репорт%');
    }

    public function scopeSellbizAdmin($query)
    {
        return $query->where('Log', 'like', '%продал бизнес %в ГОС%');
    }

    public function scopeSellcarAdmin($query)
    {
        return $query->where('Log', 'like', '%продал т/с %в ГОС%');
    }

    public function scopeSetnameAdmin($query)
    {
        return $query->where('Log', 'like', '%изменил никнейм%');
    }

    public function scopeSellhouseAdmin($query)
    {
        return $query->where('Log', 'like', '%продал дом %в ГОС%');
    }

    // Метод для сортировки по дате
    public function scopeOrderByDate($query, $sort = 'desc')
    {
        return $query->orderBy('date', $sort);
    }
}
