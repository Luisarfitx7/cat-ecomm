@extends('layouts.front')

@section('content')
<div class="container flex justify-center mx-auto my-6">
<div class="w-full max-w-xs">
  <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}">
      @csrf
    <div class="mb-4">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
       Email
      </label>
      <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="example@gmail.com" required autocomplete="email" autofocus>
    @error('email')
        <span class="text-red-500" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
    <div class="mb-6">
      <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
        Password
      </label>
      <input id="password" type="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline @error('password') is-invalid @enderror" name="password" placeholder="******************" required autocomplete="current-password">

        @error('password')
            <span class="text-red-500" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror    
    </div>
    <div class="flex items-center justify-between">
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
        {{ __('Login') }}
    </button>

    @if (Route::has('password.request'))
        <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
    </div>
  </form>
  <p class="text-center text-gray-500 text-xs">
    &copy;2021 Lum Labs. All rights reserved.
  </p>
</div>
</div>
@endsection
