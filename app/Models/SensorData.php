<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_system_id',
        'temperature',
        'humidity',
        'soil_moisture',
    ];

    public function sensor_system()
    {
        return $this->belongsTo(SensorSystem::class);
    }
}
