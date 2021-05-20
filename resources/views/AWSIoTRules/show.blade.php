<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl">{{$rule['ruleName']}}</h1>

                    <table class="w-full text-left">
                        <th>Name</th>
                        <th>SQL</th>
                        <th>Description</th>
                        <th>Action</th>

                        <tr>
                            <td class="py-2">{{$rule['ruleName']}}</td>
                            <td>{{$rule['sql']}}</td>
                            <td>{{$rule['description']}}</td>
                            <td>{{key($rule['actions'][0])}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
