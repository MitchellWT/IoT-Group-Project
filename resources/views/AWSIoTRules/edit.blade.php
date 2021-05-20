<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Edit {{$rule['ruleName']}}</h1>

                    <form action="{{route('AWSIoTRules.update', $rule['ruleName'])}}" method="POST" class="w-full">
                        @csrf
                        @method('PUT')

                        <div class="py-2">
                            <label class="w-full" for="rule_sql">Rule SQL</label>
                            <input class="w-full" type="text" name="rule_sql" id="rule_sql" value="{{$rule['sql']}}"/>
                        </div>

                        <div>
                            <button type="submit" class="bg-black text-white rounded shadow-sm text-center w-full p-2">Update Rule</button>
                        <div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
