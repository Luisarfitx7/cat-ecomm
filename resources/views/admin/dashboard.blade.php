@extends('layouts.admin')

@section('content')
    <div class="container flex justify-center mx-auto my-6">
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-yellow-200 hover:bg-yellow-300">
            <a href="{{route('products.index')}}">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Total Products = {{$productsCount}}</div>
                    <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#send</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#buy</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#money</span>
                </div>
            </a>
        </div>
    </div>
    <div class="container flex justify-center mx-auto my-6 ">
        <a href="{{route('products.index')}}">
            <div class="max-w-sm rounded overflow-hidden shadow-lg bg-indigo-200 hover:bg-indigo-300">
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2">Total Users = {{$usersCount}}</div>
                    <p class="text-gray-700 text-base">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus quia, nulla! Maiores et perferendis eaque, exercitationem praesentium nihil.
                    </p>
                </div>
                <div class="px-6 pt-4 pb-2">
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#send</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#buy</span>
                    <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#money</span>
                </div>
            </div>
        </a>
    </div>
@endsection
