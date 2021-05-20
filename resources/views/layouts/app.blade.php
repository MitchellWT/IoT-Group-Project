<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>

        <title>Green House</title>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <a href="{{route('index')}}" class="text-sm text-gray-700">Home</a>
                    <a href="{{route('admin')}}" class="ml-4 text-sm text-gray-700">Admin</a>
                    <a href="{{route('SensorSystems.index')}}" class="ml-4 text-sm text-gray-700">Sensor Systems</a>
                    <a href="{{route('AWSIoTRules.index')}}" class="ml-4 text-sm text-gray-700">AWS IoT Rules</a>
                </div>
            </header>

            <main>
                {{$slot}}
            </main>
        </div>
    </body>
</html>
