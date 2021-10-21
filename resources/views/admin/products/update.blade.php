@extends('layouts.admin')

@section('content')
<div class="container flex justify-center mx-auto my-5">
    <p class="mx-5 text-6xl text-purple-600">
        Edit Product
    </p>
</div>
<div class="container flex justify-center mx-auto">
    <form class="w-full max-w-lg" action="{{ route('products.update',[$product->id]) }}" method="POST">
    {{ method_field('PUT') }}
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                     Product Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" id="grid-name" type="text" placeholder="Table" value="{{$product->name}}" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Product Description
                </label>
                <textarea name="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-description" type="password" placeholder="Add description" required>{{$product->description}}</textarea> 
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-price">
                     Product Price
                </label>
                <input min="1" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="price" id="grid-name" type="number" value="{{$product->price}}" required>
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-status">
                    Status
                </label>
                <select name="status" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-status">
                    <option value="1" @if ($product->status == 1)
                        {{'selected="selected"'}}
                    @endif>Active</option>
                    <option value="0"
                    @if ($product->status == 0)
                        {{'selected="selected"'}}
                    @endif>In Active</option>
                </select>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
                <input type="submit" value="Update" class="content-center mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{route('products.index')}}" class=" content-center mx-auto bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Return
                </a>
        </div>
    </form>
</div>
@endsection