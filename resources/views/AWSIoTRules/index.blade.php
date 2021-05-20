<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl">AWS IoT Core Rules</h1>

                    <a href="{{route('AWSIoTRules.create')}}">Create</a>

                    <table class="w-full text-left">
                        @forelse ($ruleArr as $rule)
                            @if ($loop->first)
                                <th>Name</th>
                                <th>More Info</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            @endif

                            <tr>
                                <td class="py-2">{{isset($rule['ruleName']) ? $rule['ruleName']: $rule}}</td>
                                <td><a href="{{route('AWSIoTRules.show', isset($rule['ruleName']) ? $rule['ruleName'] : $rule)}}">Show</a></td>
                                <td><a href="{{route('AWSIoTRules.edit', isset($rule['ruleName']) ? $rule['ruleName'] : $rule)}}">Edit</a></td>
                                <td>
                                    <form action="{{route('AWSIoTRules.delete', isset($rule['ruleName']) ? $rule['ruleName'] : $rule)}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">Delete</a>
                                    </form>
                                </td>
                            </tr>

                        @empty
                            <p class="py-2">No rules found!</p>

                        @endforelse

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
