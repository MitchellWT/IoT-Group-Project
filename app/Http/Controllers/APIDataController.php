<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\APIData;
use App\Models\SensorSystem;
use Carbon\Carbon;

class APIDataController extends Controller
{
    /* The API data is from an external
     * API that gets weather data based
     * on location.
     */

    /* Stores a default API data.
     * This data can then be updated using the sensor
     * systems.
     */
    public function store(SensorSystem $sensorSystem)
    {
        $validatedRequest['sensor_system_id'] = $sensorSystem->id;
        $validatedRequest['uv'] = 0.0;
        $validatedRequest['last_updated'] = Carbon::now()->toDateTimeString();

        APIData::create($validatedRequest);

        return redirect()->route('SensorSystems.index');
    }

    /* Deletes a API data.
     */
    public function delete(SensorSystem $APIData)
    {
        APIData::destroy($APIData->id);

        return redirect()->route('SensorSystems.index');
    }

    public function validateAPIData(Request $request)
    {
        return $request->validate([
            'sensor_system_id' => 'required',
        ]);
    }
}
