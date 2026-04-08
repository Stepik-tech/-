<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orgs extends Model
{
    use HasFactory;
    protected $connection = 'server';
    protected $table = 'orgsinfo'; // Указываем имя таблицы

    // Дополнительные настройки модели, если нужны
}
