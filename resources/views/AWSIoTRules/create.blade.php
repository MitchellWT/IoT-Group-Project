<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{route('AWSIoTRules.store')}}" method="POST" class="w-full">
                        @csrf

                        <div class="py-2">
                            <label class="w-full" for="rule_name">Rule Name</label>
                            <input class="w-full" type="text" name="rule_name" id="rule_name"/>
                        </div>

                        <div>
                            <button type="submit" class="bg-black text-white rounded shadow-sm text-center w-full p-2">Create Rule Name</button>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
