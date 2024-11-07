<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sql extends Model
{
    use HasFactory;
    protected $table = 'sensors';
    protected $primaryKey = "id";
    protected $fillable = [
        '_id',
        'id_user',
        'date',
        'time',
        'ph',
        'tds',
        'water_temp',
        'air_temp',
        'humidity',
        'heat_index'  
    ];
    protected $hidden = [
        'remember_token',
    ];
}
