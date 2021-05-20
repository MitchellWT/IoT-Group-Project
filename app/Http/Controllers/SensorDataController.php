<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorData;
use App\Models\SensorSystem;

class SensorDataController extends Controller
{
    /* Stores a newly recieved set of sensor
     * data. This data is received through
     * the API.
     */
    public function store(Request $request)
    {
        $validatedRequest = $this->validateSensorData($request);
        $sensorSystem = SensorSystem::firstWhere('pi_id', $validatedRequest['pi_id']);

        unset($validatedRequest['pi_id']);
        $validatedRequest['sensor_system_id'] = $sensorSystem['id'];

        SensorData::create($validatedRequest);

        return response(201);
    }

    public function validateSensorData(Request $request)
    {
        /* We are not validating request as
         * some sensor devices may not provide
         * full data.
         */
        return $request->validate([
            'pi_id' => '', //'required|string',
            'temperature' => '', //'required|numric',
            'humidity' => '', //'required|numric',
            'soil_moisture' => '', //'required|numric',
        ]);
    }
}
