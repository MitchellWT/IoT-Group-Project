<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <script src="{{asset('js/app.js')}}"></script>

        <title>Green House</title>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <a href="{{route('index')}}" class="text-sm text-gray-700">Home</a>

                    @auth
                        <a href="{{route('admin')}}" class="ml-4 text-sm text-gray-700">Admin</a>
                    @else
                        <a href="{{route('login')}}" class="ml-4 text-sm text-gray-700">Log in</a>

                        @if (App\Models\User::count() == 0)
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700">Register</a>
                        @endif

                    @endauth
                </div>
            </header>

            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <h1 class="text-2xl">Green House Analytics Form</h1>

                            <p>Please fill out the bellow form to get graphic representations of system data!</p>

                            <form action="{{route('info')}}" method="GET" class="w-full">
                                @csrf

                                <div class="flex flex-col py-2">
                                    <label for="sensor_system">Sensor System</label>

                                    <select id="sensor_system" name="sensor_system" required autofocus>
                                        <option value="default">Select System</option>

                                        @foreach (App\Models\SensorSystem::all() as $sensorSystem)
                                            <option value="{{$sensorSystem->id}}">{{$sensorSystem->pi_id}}</option>
                                        @endforeach
                                    </select>

                                    @error('sensor_system')
                                        <p>{{$message}}</p>
                                    @enderror
                                </div>

                                <h2 class="text-xl pt-2">Date Range</h2>

                                <div class="flex pb-2">
                                    <div class="w-1/2 pr-2">
                                        <label class="w-full" for="date_lower">Lower Date</label>
                                        <input class="w-full" type="date" name="date_lower" id="date_lower"/>

                                        @error('date_lower')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 pl-2">
                                        <label class="w-full" for="date_upper">Upper Date</label>
                                        <input class="w-full" type="date" name="date_upper" id="date_upper"/>

                                        @error('date_upper')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <h2 class="text-xl pt-2">Time Range</h2>

                                <div class="flex pb-2">
                                    <div class="w-1/2 pr-2">
                                        <label class="w-full" for="time_lower">Lower Time</label>
                                        <input class="w-full" type="time" name="time_lower" id="time_lower"/>

                                        @error('time_lower')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>

                                    <div class="w-1/2 pl-2">
                                        <label class="w-full" for="time_upper">Upper Time</label>
                                        <input class="w-full" type="time" name="time_upper" id="time_upper"/>

                                        @error('time_upper')
                                            <p>{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="bg-black text-white rounded shadow-sm text-center w-full p-2">Get Analytics</button>
                                <div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
