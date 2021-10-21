@extends('layouts.admin')

@section('content')
<div class="container flex justify-center mx-auto my-5">
    <p class="mx-5 text-6xl text-purple-600">
        Edit User
    </p>
</div>
<div class="container flex justify-center mx-auto">
    <form class="w-full max-w-lg" action="{{ route('users.update',[$user->id]) }}" method="POST">
    {{ method_field('PUT') }}
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
                     User Name
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="name" id="grid-name" type="text" placeholder="Jhon" value="{{$user->name}}" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
                     User Email
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="email" id="grid-email" type="text" placeholder="example@gmail.com" value="{{$user->email}}" required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                     User Password
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" name="password" id="grid-password" type="password" placeholder="*************"  required>
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
                <input type="submit" value="Update" class="content-center mx-auto bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{route('users.index')}}" class=" content-center mx-auto bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                    Return
                </a>
        </div>
    </form>
</div>
@endsection