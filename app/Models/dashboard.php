<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;
use MongoDB\Laravel\Auth\User as Authenticatable;


class  dashboard  extends Model
{
    use  HasFactory;

    protected $connection = 'mongodb';
    protected $table = 'skypianSensor';

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

    
    
}
