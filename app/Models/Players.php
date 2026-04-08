<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Players extends Model
{
    protected $connection = 'server';
    protected $table = 'accounts';

    protected $fillable = [
        'NickName', 'RegIP', 'RegData', 'OldIP', 'LastLogin', 'Admin', 'Level', 
        'VirMoney', 'Money', 'Bank', 'Leader', 'Rank', 'Online_status', 
        'VIP', 'VipTime', 'Demorgan', 'PlayerTimess', 'Referal', 'Roubles', 'PlayerID'
    ];

    protected $dates = ['created_at', 'updated_at', 'RegData', 'LastLogin'];

    public function getDaysWithUsAttribute()
    {
        return $this->created_at->diffForHumans(now(), true);
    }
}

// app/Models/Banname.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banname extends Model
{
    protected $connection = 'server';

    protected $table = 'bannames';

    protected $fillable = ['Name', 'BanReason', 'BanSeconds', 'BanAdmin'];
}

// app/Models/Banname.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $connection = 'server';
    
    protected $table = 'ownable';

    protected $fillable = ['Owner'];
}
