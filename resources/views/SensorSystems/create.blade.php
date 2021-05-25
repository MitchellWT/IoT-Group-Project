<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl">Green House Analytics Form</h1>

                    <form action="{{route('SensorSystems.store')}}" method="POST" class="w-full max-w-screen-xl bg-white">
                        @csrf

                        <div class="py-2">
                            <label class="w-full" for="pi_id">Pi Identifier</label>
                            <input class="w-full" type="text" name="pi_id" id="pi_id"/>
                        </div>

                        <div class="py-2">
                            <label class="w-full" for="ip_address">Ip Address</label>
                            <input class="w-full" type="text" name="ip_address" id="ip_address"/>
                        </div>

                        <div class="flex py-2">
                            <div class="w-1/2 pr-2">
                                <label class="w-full" for="irrigation">Irrigation</label>
                                <input type="hidden" name="irrigation" id="irrigation" value="0"/>
                                <input class="w-full h-1/2" type="checkbox" name="irrigation" id="irrigation" value="1"/>
                            </div>

                            <div class="w-1/2 pl-2">
                                <label class="w-full" for="shutter">Shutter</label>
                                <input class="w-full" type="number" name="shutter" id="shutter"/>
                            </div>
                        </div>

                        <div class="flex py-2">
                            <div class="w-1/2 pr-2">
                                <label class="w-full" for="latitude">Latitude</label>
                                <input class="w-full" type="number" name="latitude" id="latitude"/>
                            </div>

                            <div class="w-1/2 pl-2">
                                <label class="w-full" for="longitude">Longitude</label>
                                <input class="w-full" type="number" name="longitude" id="longitude"/>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="bg-black text-white rounded shadow-sm text-center w-full p-2">Create Sensor System</button>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
