<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl">Sensor Systems</h1>

                    <table class="w-full text-left">
                        @forelse ($sensorSystems as $sensorSystem)
                            @if ($loop->first)
                                <th>Pi Identifier</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>More Info</th>
                            @endif

                            <tr>
                                <td class="py-2">{{$sensorSystem->pi_id}}</td>
                                <td>{{$sensorSystem->latitude}}</td>
                                <td>{{$sensorSystem->longitude}}</td>
                                <td><a href="{{route('SensorSystems.show', $sensorSystem->id)}}">Show</a></td>
                            </tr>

                        @empty
                            <p class="py-2">No sensor systems found!</p>

                        @endforelse

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
