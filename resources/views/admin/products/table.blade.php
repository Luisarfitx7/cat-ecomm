
<div class="container flex justify-center mx-auto my-6">
    <p class="mx-5 text-6xl text-purple-600">
        Products
    </p>
    <a href="{{route('products.create')}}" class="bg-blue-500 hover:bg-blue-700 text-white py-4 px-4 font-bold rounded">
        Add Product
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
                                Price
                            </th>
                            <th class="px-6 py-2 text-xs text-gray-500">
                                Status
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
                        @if($productsObject->data == [])
                        <tr>
                            <td class="px-6 py-4 text-sm text-gray-500">
                                Do not exist products
                            </td>  
                        </tr> 
                        @else
                            @foreach($productsObject->data as $product)
                                <tr class="whitespace-nowrap">
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        {{$product->id}}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900">
                                            {{$product->name}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-500">
                                            ${{$product->price}}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 text-sm text-gray-500">
                                        @if($product->status == 1)
                                            Active
                                        @else
                                            In Active
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{route('products.edit', [$product->id])}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form class="w-full max-w-lg" action="{{route('products.destroy', [$product->id])}}" method="POST">
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
