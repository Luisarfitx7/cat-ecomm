<div class="container mx-auto">
    <div class="grid sm:grid-cols-1 lg:grid-cols-3">
        @if($productsObject->data)
            @foreach($productsObject->data as $product)
                @if($product->status == 1)
                    <div class="text-center mx-6 my-12 ">
                        <img class="mx-auto content-center" src="https://mdn.mozillademos.org/files/6851/mdn_logo.png" alt="MDN logo" />
                        <p class="2">
                            {{$product->name}}
                        </p>
                        <p class="2">
                            {{$product->price}}
                        </p>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            ADD TO CART
                        </button>
                        <button class="bg-transparent hover:bg-blue-500 text-blue-600 font-semibold hover:text-white py-2 px-4 border border-blue-300 hover:border-transparent rounded">
                            LEARN MORE
                        </button>
                    </div>
                @endif
            @endforeach
        @endif
    </div>
</div>