<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SensorSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pi_id',
        'ip_address',
        'irrigation',
        'shutter',
        'latitude',
        'longitude',
    ];

    public function SensorDatas()
    {
        return $this->hasMany(SensorData::class);
    }

    public function RecentSensorDatas($num)
    {
        return $this->SensorDatas()->latest()->take($num)->get();
    }

    public function APIData()
    {
        return $this->hasOne(APIData::class);
    }
}
