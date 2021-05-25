<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl">{{$sensorSystem->pi_id}}</h1>
                    <form action="{{route('SensorSystems.delete', $sensorSystem->id)}}" method="POST">
                        @csrf
                        @method("DELETE")

                        <button>Delete</button>
                    </form>

                    <table class="w-full text-left">
                        <th>Pi Identifier</th>
                        <th>Latitude</th>
                        <th>Longitude</th>
                        <th>IP Address</th>

                        <tr>
                            <td class="py-2">{{$sensorSystem->pi_id}}</td>
                            <td>{{$sensorSystem->latitude}}</td>
                            <td>{{$sensorSystem->longitude}}</td>
                            <td>{{$sensorSystem->ip_address}}</td>
                        </tr>
                    </table>

                    <table class="w-full text-left">
                        <th>Laravel Identifier</th>
                        <th>Irrigation</th>
                        <th>Shutter</th>

                        <tr>
                            <td class="py-2">{{$sensorSystem->id}}</td>
                            <td>{{$sensorSystem->irrigation}}</td>
                            <td>{{$sensorSystem->shutter}}</td>
                        </tr>
                    </table>

                    @if ($sensorSystem->APIData)
                        <p class="text-2xl pt-2">API Data</p>
                        <form action="{{route('APIData.delete', $sensorSystem->APIData->id)}}" method="POST">
                            @csrf
                            @method("DELETE")

                            <button>Delete</button>
                        </form>

                        <table class="w-full text-left">
                            <th>UV</th>
                            <th>Last Updated</th>

                            <tr>
                                <td class="py-2">{{$sensorSystem->APIData->uv}}</td>
                                <td>{{$sensorSystem->APIData->last_updated}}</td>
                            </tr>
                        </table>

                    @else
                        <p class="p-2">No API found!</p>

                        <form class="p-2" action="{{route('APIData.store', $sensorSystem->id)}}" method="POST">
                            @csrf

                            <button>Create</button>
                        </form>

                    @endif

                    @forelse ($sensorSystem->RecentSensorDatas(1) as $sensorData)
                        <p class="text-2xl pt-2">Most recent Sensor Data</p>

                        <table class="w-full text-left">
                            <th>Temperature</th>
                            <th>Humidity</th>
                            <th>Soil Moisture</th>
                            <th>Timestamp</th>

                            <tr>
                                <td class="py-2">{{$sensorData->temperature}}</td>
                                <td>{{$sensorData->humidity}}</td>
                                <td>{{$sensorData->soil_moisture}}</td>
                                <td>{{date("H:m A d/m/Y", strtotime($sensorData->created_at))}}</td>
                            </tr>
                        </table>

                    @empty
                        <p class="p-2">No data found!</p>

                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
