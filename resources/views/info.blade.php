<!DOCTYPE html>
<html lang="{{str_replace('_', '-', app()->getLocale())}}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <script src="{{asset('js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.1/chart.min.js" integrity="sha512-tOcHADT+YGCQqH7YO99uJdko6L8Qk5oudLN6sCeI4BQnpENq6riR6x9Im+SGzhXpgooKBRkPsget4EOoH5jNCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                            <h1 class="text-4xl">Analytics for {{App\Models\SensorSystem::find($sensorID)->pi_id}}</h1>

                            <div class="py-4">
                                <h2 class="text-2xl">Soil Moisture (%) on Temperature (°C)</h2>
                                <canvas class="" id="soil_temperature_chart" height="100"></canvas>
                            </div>

                            <div class="py-4">
                                <h2 class="text-2xl">Soil Moisture (%) on Humidity (%)</h2>
                                <canvas class="" id="soil_humidity_chart" height="100"></canvas>
                            </div>

                            <div class="py-4">
                                <h2 class="text-2xl">Temperature (°C) on Humidity (%)</h2>
                                <canvas class="" id="temperature_humidity_chart" height="100"></canvas>
                            </div>

                            <div class="py-4">
                                <h2 class="text-2xl">Soil Moisture (%)</h2>
                                <canvas class="" id="soil_chart" height="100"></canvas>
                            </div>

                            <div class="py-4">
                                <h2 class="text-2xl">Temperature (°C)</h2>
                                <canvas class="" id="temperature_chart" height="100"></canvas>
                            </div>

                            <div class="py-4">
                                <h2 class="text-2xl">Humidity (%)</h2>
                                <canvas class="" id="humidity_chart" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var stc = document.getElementById('soil_temperature_chart').getContext('2d');
            var soil_temperature_chart = new Chart(stc, {
                type: 'scatter',
                data: {
                    datasets: [{
                        label: 'Intercept',
                            data: [
                                <?php
                                    foreach($dataArr as $data) {
                                        echo '{ x: ' . intval($data->soil_moisture) . ', y: ' .  intval($data->temperature) . ' },';
                                    }
                                ?>
                            ],
                            fill: true,
                            borderColor: [
                                '#000000'
                            ],
                            pointBackgroundColor: [
                                '#000000'
                            ],
                            borderWidth: 1,
                            tension: 0.1,
                            pointRadius: 2
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'linear',
                            position: 'bottom',
                            title: {
                                display: true,
                                text: 'Soil Moisture'
                            }
                        },
                        y: {
                            type: 'linear',
                            position: 'bottom',
                            title: {
                                display: true,
                                text: 'Temperature'
                            }
                        }
                    }
                }
            });

            var shc = document.getElementById('soil_humidity_chart').getContext('2d');
            var soil_humidity_chart = new Chart(shc, {
                type: 'scatter',
                data: {
                    datasets: [{
                        label: 'Intercept',
                            data: [
                                <?php
                                    foreach($dataArr as $data) {
                                        echo '{ x: ' . intval($data->soil_moisture) . ', y: ' .  intval($data->humidity) . ' },';
                                    }
                                ?>
                            ],
                            fill: true,
                            borderColor: [
                                '#000000'
                            ],
                            pointBackgroundColor: [
                                '#000000'
                            ],
                            borderWidth: 1,
                            tension: 0.1,
                            pointRadius: 2
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'linear',
                            position: 'bottom',
                            title: {
                                display: true,
                                text: 'Soil Moisture'
                            }
                        },
                        y: {
                            type: 'linear',
                            position: 'bottom',
                            title: {
                                display: true,
                                text: 'Humidity'
                            }
                        }
                    }
                }
            });

            var thc = document.getElementById('temperature_humidity_chart').getContext('2d');
            var temperature_humidity_chart = new Chart(thc, {
                type: 'scatter',
                data: {
                    datasets: [{
                        label: 'Intercept',
                            data: [
                                <?php
                                    foreach($dataArr as $data) {
                                        echo '{ x: ' . intval($data->temperature) . ', y: ' .  intval($data->humidity) . ' },';
                                    }
                                ?>
                            ],
                            fill: true,
                            borderColor: [
                                '#000000'
                            ],
                            pointBackgroundColor: [
                                '#000000'
                            ],
                            borderWidth: 1,
                            tension: 0.1,
                            pointRadius: 2
                    }]
                },
                options: {
                    scales: {
                        x: {
                            type: 'linear',
                            position: 'bottom',
                            title: {
                                display: true,
                                text: 'Temperature'
                            }
                        },
                        y: {
                            type: 'linear',
                            position: 'bottom',
                            title: {
                                display: true,
                                text: 'Humidity'
                            }
                        }
                    }
                }
            });

            var sc = document.getElementById('soil_chart').getContext('2d');
            var soil_chart = new Chart(sc, {
                type: 'line',
                data: {
                    labels: [
                        <?php
                            foreach($dataArr as $data) {
                                echo '\'' .  strval($data->created_at->format('h:i:s A')) . '\',';
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'Soil Moisture',
                        data: [
                            <?php
                                foreach($dataArr as $data) {
                                    echo '\'' .  strval($data->soil_moisture) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#001524'
                        ],
                        pointBackgroundColor: [
                            '#001524'
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 2
                    }]
                }
            });

            var tc = document.getElementById('temperature_chart').getContext('2d');
            var temperature_chart = new Chart(tc, {
                type: 'line',
                data: {
                    labels: [
                        <?php
                            foreach($dataArr as $data) {
                                echo '\'' .  strval($data->created_at->format('h:i:s A')) . '\',';
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'Soil Moisture',
                        data: [
                            <?php
                                foreach($dataArr as $data) {
                                    echo '\'' .  strval($data->temperature) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#001524'
                        ],
                        pointBackgroundColor: [
                            '#001524'
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 2
                    }]
                }
            });

            var hc = document.getElementById('humidity_chart').getContext('2d');
            var humidity_chart = new Chart(hc, {
                type: 'line',
                data: {
                    labels: [
                        <?php
                            foreach($dataArr as $data) {
                                echo '\'' .  strval($data->created_at->format('h:i:s A')) . '\',';
                            }
                        ?>
                    ],
                    datasets: [{
                        label: 'Soil Moisture',
                        data: [
                            <?php
                                foreach($dataArr as $data) {
                                    echo '\'' .  strval($data->humidity) . '\',';
                                }
                            ?>
                        ],
                        fill: false,
                        borderColor: [
                            '#001524'
                        ],
                        pointBackgroundColor: [
                            '#001524'
                        ],
                        borderWidth: 1,
                        tension: 0.1,
                        pointRadius: 2
                    }]
                }
            });
        </script>
    </body>
</html>
