<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SensorSystem;
use App\Models\SensorData;

class SensorSystemController extends Controller
{
    /* Show all sensor systems.
     *
     */
    public function index()
    {
        $sensorSystems = SensorSystem::all();

        return view('SensorSystems.index', compact('sensorSystems'));
    }

    /* Show a specific sensor system.
     *
     */
    public function show(SensorSystem $sensorSystem)
    {
        return view('SensorSystems.show', compact('sensorSystem'));
    }

    public function info(Request $request)
    {
        $validatedRequest = $this->validateInfo($request);
        $sensorID = $validatedRequest['sensor_system'];
        $lowerBound = $validatedRequest['date_lower'] . ' ' . $validatedRequest['time_lower'] . ':00';
        $upperBound = $validatedRequest['date_upper'] . ' ' . $validatedRequest['time_upper'] . ':00';

        $dataArr = SensorData::where('created_at', '>=', $lowerBound)
            ->where('created_at', '<=', $upperBound)
            ->get();

        return view('info', compact('dataArr', 'sensorID'));
    }

    /* Sensor systems form for
     * creating system.
     */
    public function create()
    {
        return view('SensorSystems.create');
    }

    /* Stores a newly created sensor system.
     */
    public function store(Request $request)
    {
        $validatedRequest = $this->validateSensorSystem($request);

        SensorSystem::create($validatedRequest);

        return redirect()->route('SensorSystems.index');
    }

    /* Deletes sensor system.
     */
    public function delete(SensorSystem $sensorSystem)
    {
        SensorSystem::destroy($sensorSystem->id);

        return redirect()->route('SensorSystems.index');
    }

    public function validateSensorSystem(Request $request)
    {
        /* We are not validating request as
         * some sensor devices may not provide
         * full data.
         */
        return $request->validate([
            'pi_id' => '', //'required|string',
            'ip_address' => '', //'required|string',
            'irrigation' => '', //'required|boolean',
            'shutter' => '', //'required|numric',
            'latitude' => '', //'required|numric',
            'longitude' => '', //'required|numric',
        ]);
    }

    public function validateInfo(Request $request)
    {
        return $request->validate([
            'sensor_system' => 'required|numeric',
            'date_lower' => 'required|date',
            'date_upper' => 'required|date',
            'time_lower' => 'required',
            'time_upper' => 'required',
        ]);
    }
}
