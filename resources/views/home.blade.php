@include('layouts.front')

<div class="flex flex-col text-gray-200 md:flex-row md:justify-between md:items-end bg-gradient-to-br from-gray-700 to-gray-600">
    <p class="p-4 font-semibold leading-none">
        Basic navbar styling
    </p>
    <div class="flex items-center">
        <div class="items-center hidden text-xs sm:flex md:text-base">
        </div>
    </div>
</div>
<div class="container">
    <div class="grid grid-cols-3">
        <div>a</div>
        <div>b</div>
        <div>c</div>
        <div>d</div>
    </div>
</div>
{{dd($productsArray)}}