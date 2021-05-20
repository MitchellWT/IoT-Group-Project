<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class APIData extends Model
{
    use HasFactory;

    protected $fillable = [
        'sensor_system_id',
        'uv',
        'last_updated',
    ];

    public function SensorSystem()
    {
        return $this->belongsTo(SensorSystem::class);
    }
}
