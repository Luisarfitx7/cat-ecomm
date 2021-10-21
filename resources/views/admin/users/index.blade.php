@extends('layouts.admin')

@section('content')
    @if(session()->has('success'))
        <div class="bg-indigo-900 text-center py-4 lg:px-4">
            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
                {{ session()->get('success') }}
            </div>
        </div>
    @endif
    @if(session()->has('error'))
        <div class="bg-red-600 text-center py-4 lg:px-4">
            <div class="p-2 bg-red-500 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                <span class="flex rounded-full bg-red-400 uppercase px-2 py-1 text-xs font-bold mr-3">New</span>
                {{ session()->get('error') }}
            </div>
        </div>
    @endif
    @include('admin.users.table')
@endsection
