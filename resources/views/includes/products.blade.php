@extends('layouts.front')

@section('content')
<div class="relative">
    <div class=" w-screen h-60  bg-gradient-to-br from-purple-400 to-purple-300 text-white flex items-center justify-center text-5xl">All Products</div>
</div>
<div class="container mx-auto">
    <div class="grid sm:grid-cols-1 lg:grid-cols-3">
        @if(isset($productsObject->data))
            @foreach($productsObject->data as $product)
                @if($product->status == 1)
                    <div class="text-center mx-6 my-12 ">
                        <img class="mx-auto content-center" src="https://source.unsplash.com/user/erondu/1600x900" alt="MDN logo" />
                        <p class="text-2xl">
                            {{$product->name}}
                        </p>
                        <p class="text-2xl">
                            ${{$product->price}}
                        </p>
                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->name }}" name="name">
                            <input type="hidden" value="{{ $product->price }}" name="price">
                            <input type="hidden" value="{{ $product->description }}"  name="description">
                            <input type="hidden" value="1" name="quantity">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add To Cart</button>
                        </form>
                        <div class="mt-4">
                            <a href="{{route('product.show', [$product->slug])}}"
                            class=" bg-transparent hover:bg-blue-500 text-blue-600 font-semibold hover:text-white py-2 px-4 border border-blue-300 hover:border-transparent rounded">
                                LEARN MORE
                            </a>
                        </div>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>
@endsection