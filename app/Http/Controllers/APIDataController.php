<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\APIData;
use App\Models\SensorSystem;

class APIDataController extends Controller
{
    /* The API data is from an external
     * API that gets weather data based
     * on location.
     */

    /* API data can not be created
     * in app. They are created and stored when
     * they are registered on AWS IoT Core.
     */

    /* Stores a newly created API data.
     * This data is received through the API.
     */
    public function store(Request $request)
    {
        $validatedRequest = $this->validateAPIData($request);
        $sensorSystem = SensorSystem::firstWhere('pi_id', $validatedRequest['pi_id']);

        unset($validatedRequest['pi_id']);
        $validatedRequest['sensor_system_id'] = $sensorSystem['id'];

        APIData::create($validatedRequest);

        return response(201);
    }

    /* API data can not be edited
     * in app. Instead they are updated
     * using the API, which is triggered
     * based on MQTT messages.
     */

    /* Updates a API data with the
     * newly provided info. This data is
     * recieved through the API.
     */
    public function update(Request $request)
    {
        $validatedRequest = $this->validateAPIData($request);
        $sensorSystem = SensorSystem::firstWhere('pi_id', $validatedRequest['pi_id']);

        unset($validatedRequest['pi_id']);

        $APIData = APIData::firstWhere('sensor_system_id', $sensorSystem['id']);

        $APIData->update($validatedRequest);

        return response(201);
    }

    public function validateAPIData(Request $request)
    {
        return $request->validate([
            'pi_id' => 'required',
            'uv' => 'required|numeric',
            'last_updated' => 'required',
        ]);
    }
}
