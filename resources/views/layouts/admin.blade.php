<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- stylesheet -->
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>Cat-ecomm</title>
</head>
<body>
    <header>
    <div class="flex flex-wrap py-2">
  <div class="w-full px-4">
    <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 bg-indigo-500 rounded">
      <div class="container px-4 mx-auto flex flex-wrap items-center justify-between">
        <div class="w-full relative flex justify-between lg:w-auto px-4 lg:static lg:block lg:justify-start">
          <a class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white" href="/admin">
            Admin Dashboard
          </a>
          <button id="button" class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none" type="button">
            <span class="block relative w-6 h-px rounded-sm bg-white"></span>
            <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
            <span class="block relative w-6 h-px rounded-sm bg-white mt-1"></span>
          </button>
        </div>
        <div class="flex lg:flex-grow items-center" id="menu">
          <ul class="flex flex-col lg:flex-row list-none ml-auto">
            <li class="nav-item">
              <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="{{route('users.index')}}">
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="px-3 py-2 flex items-center text-xs uppercase font-bold leading-snug text-white hover:opacity-75" href="{{route('products.index')}}">
                Products
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>

    </header>
    <main class="my-8">
            @yield('content')
    </main>
</body>
</html>
<script src="{{asset('js/menu.js')}}"></script>