<div class="container flex justify-center mx-auto my-6">
    <p class="mx-5 text-6xl text-purple-600">
        Users
    </p>
    <a href="{{route('users.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white py-4 px-4 font-bold rounded">
        Add Users
    </a>
</div>
<div class="container flex justify-center mx-auto">
    <div class="flex flex-col">
        <div class="w-full">
            <div class="border-b border-gray-200 shadow">
                <table>
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                ID
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Name
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Email
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Password
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Edit
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Delete
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @if($usersObject->data == [])
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                Do not exist users
                            </td>  
                        </tr> 
                        @else
                            @foreach($usersObject->data as $user)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$user->id}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$user->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">
                                            ${{$user->price}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        @if($user->status == 1)
                                            Active
                                        @else
                                            In Active
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('users.edit', [$user->id])}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form class="w-full max-w-lg" action="{{route('users.destroy', [$user->id])}}" method="POST">
                                            {{ method_field('Delete') }}
                                            @csrf
                                            <input type="submit" value="Delete" class="px-4 py-1 text-sm text-white bg-red-400 rounded" onclick = "return confirm('Do you really want to delete?')">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>