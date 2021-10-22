@extends('layouts.front')

@section('content')

<div class="container flex justify-center mx-auto my-6">
    <div class=" max-w-x bg-gray-300 hover:bg-gray-200">
        <div class="flex space-x-4">
            <div>
                <img src="https://source.unsplash.com/user/erondu/1600x900" alt="image"
            class="h-64">
        </div>
        <div class="sm:text-2xl md:text-6xl">
            <h2 class=" font-bold">Product: {{ $product->name }}</h2>
            
            <span class="text-gray-900 ">Price</span> ${{ $product->price }}
            <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->description }}"  name="description">
                            <input type="hidden" value="1" name="quantity">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded sm:text-2xl">Add To Cart</button>
                        </form>
        </div>
    </div>
    <div class=" max-w-x bg-gray-300 hover:bg-gray-200">
    <p class="sm:text-xl">Description: {{ $product->description }}</p>
    </div>
</div>
@endsection
