@extends('layouts.front')

@section('content')
          <main class="my-8">
            <div class="container px-6 mx-auto">
                <div class="flex justify-center my-6">
                    <div class="flex flex-col w-full p-8 text-gray-800 bg-white shadow-lg pin-r pin-y md:w-4/5 lg:w-4/5">
                      @if ($message = Session::get('success'))
                          <div class="p-4 mb-3 bg-green-400 rounded">
                              <p class="text-green-800">{{ $message }}</p>
                          </div>
                      @endif
                        <h3 class="text-3xl text-bold">Cart List</h3>
                      <div class="flex-1">
                        <table class="w-full text-sm lg:text-base" cellspacing="0">
                          <thead>
                            <tr class="h-12 uppercase">
                              <th class="hidden md:table-cell"></th>
                              <th class="text-left">Name</th>
                              <th class="pl-5 text-left lg:text-right lg:pl-0">
                                <span class="lg:hidden" title="Quantity">Qtd</span>
                                <span class="hidden lg:inline">Quantity</span>
                              </th>
                              <th class="hidden text-right md:table-cell"> price</th>
                              <th class="hidden text-right md:table-cell"> Remove </th>
                            </tr>
                          </thead>
                          <tbody>
                              @foreach ($cartItems as $item)
                            <tr>
                              <td class="hidden pb-4 md:table-cell">
                                <a href="#">
                                  <img src="https://source.unsplash.com/user/erondu/1600x900" class="w-20 rounded" alt="Thumbnail">
                                </a>
                              </td>
                              <td>
                                <a href="#">
                                  <p class="mb-2 md:ml-4">{{ $item->name }}</p>
                                  
                                </a>
                              </td>
                              <td class="justify-center mt-6 md:justify-end md:flex">
                                <div class="h-10 w-28">
                                  <div class="relative flex flex-row w-full h-8">
                                    
                                    <form action="{{ route('cart.update') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id}}" >
                                    <input type="number" name="quantity" value="{{ $item->quantity }}" 
                                    class="w-6 text-center bg-gray-300" />
                                    <button type="submit" class="px-2 pb-2 ml-2 text-white bg-blue-500">update</button>
                                    </form>
                                  </div>
                                </div>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <span class="text-sm font-medium lg:text-base">
                                    ${{ $item->price }}
                                </span>
                              </td>
                              <td class="hidden text-right md:table-cell">
                                <form action="{{ route('cart.remove') }}" method="POST">
                                  @csrf
                                  <input type="hidden" value="{{ $item->id }}" name="id">
                                  <button class="px-4 py-2 text-white bg-red-600">x</button>
                              </form>
                                
                              </td>
                            </tr>
                            @endforeach
                             
                          </tbody>
                        </table>
                        <div>
                         Total: ${{ Cart::getTotal() }}
                        </div>
                        <div>
                          <form action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            <button class="px-6 py-2 text-red-800 bg-red-300">Remove All Cart</button>
                          </form>
                        </div>


                      </div>
                    </div>
                  </div>
            </div>
            <div class="mt-20">
            <h1 class="flex items-center justify-center font-bold text-blue-600 text-md lg:text-3xl">
                Checkout Cat-ecomm
            </h1>
        </div>
        <div class="container p-12 mx-auto">
            <div class="flex flex-col w-full px-0 mx-auto md:flex-row">
                <div class="flex flex-col md:w-full">
                    <h2 class="mb-4 font-bold md:text-xl text-heading ">Billing information
                    </h2>
                    <form class="justify-center w-full mx-auto" method="get" action="{{ route('typ') }}">
                        <div class="">
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">First
                                        Name</label>
                                    <input name="firstName" type="text" placeholder="First Name"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                        Name</label>
                                    <input name="Last Name" type="text" placeholder="Last Name"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="Email"
                                        class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                    <input name="Last Name" type="text" placeholder="Email"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="Address"
                                        class="block mb-3 text-sm font-semibold text-gray-500">Address</label>
                                    <textarea
                                        class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        name="Address" cols="20" rows="4" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="city"
                                        class="block mb-3 text-sm font-semibold text-gray-500">City</label>
                                    <input name="city" type="text" placeholder="City"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                        Postcode</label>
                                    <input name="postcode" type="text" placeholder="Post Code"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="relative pt-3 xl:pt-6"><label for="note"
                                    class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                                    (Optional)</label><textarea name="note"
                                    class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    rows="4" placeholder="Notes for delivery"></textarea>
                            </div>
                            
                            <h2 class="mb-4 font-bold md:text-xl text-heading ">Billing information
                    </h2>
                              <div class="flex items-center mt-4">
                                  <label class="flex items-center text-sm group text-heading">
                                      <input type="checkbox"
                                          class="w-5 h-5 border border-gray-300 rounded focus:outline-none focus:ring-1" id="select">
                                      <span class="ml-2">SHIPPING IS DIFFERENT THAN BILLING ADDRESS</span></label>
                              </div>
                              <div id="shipping" class="hidden">
                              <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">First
                                        Name</label>
                                    <input name="firstName" type="text" placeholder="First Name"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="firstName" class="block mb-3 text-sm font-semibold text-gray-500">Last
                                        Name</label>
                                    <input name="Last Name" type="text" placeholder="Last Name"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="Email"
                                        class="block mb-3 text-sm font-semibold text-gray-500">Email</label>
                                    <input name="Last Name" type="text" placeholder="Email"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="w-full">
                                    <label for="Address"
                                        class="block mb-3 text-sm font-semibold text-gray-500">Shipping Address</label>
                                    <textarea
                                        class="w-full px-4 py-3 text-xs border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600"
                                        name="Address" cols="20" rows="4" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="space-x-0 lg:flex lg:space-x-4">
                                <div class="w-full lg:w-1/2">
                                    <label for="city"
                                        class="block mb-3 text-sm font-semibold text-gray-500">Shipping City</label>
                                    <input name="city" type="text" placeholder="City"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                                <div class="w-full lg:w-1/2 ">
                                    <label for="postcode" class="block mb-3 text-sm font-semibold text-gray-500">
                                      Shipping  Postcode</label>
                                    <input name="postcode" type="text" placeholder="Post Code"
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                            <div class="relative pt-3 xl:pt-6"><label for="note"
                                    class="block mb-3 text-sm font-semibold text-gray-500"> Notes
                                    (Optional)</label><textarea name="note"
                                    class="flex items-center w-full px-4 py-3 text-sm border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    rows="4" placeholder="Notes for delivery"></textarea>
                            </div>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>

                <div class="flex flex-col w-full ml-0 lg:ml-12 lg:w-2/5">
                    <div class="pt-12 md:pt-0 2xl:ps-4">
                        <h2 class="text-xl font-bold">Order Summary
                        </h2>
                        <div class="mt-8">
                            <div class="flex flex-col space-y-4">
                              @foreach ($cartItems as $item)
                                    <div class="flex space-x-4">
                                        <div>
                                            <img src="https://source.unsplash.com/user/erondu/1600x900" alt="image"
                                                class="w-60">
                                        </div>
                                        <div>
                                            <h2 class="text-xl font-bold">{{ $item->name }}</h2>
                                            <p class="text-sm">{{ $item->description }}</p>
                                            <p class="text-sm">Qty : {{ $item->quantity }}</p>
                                            <span class="text-red-600">Price</span> ${{ $item->price }}
                                        </div>
                                        <div>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </div>
                                    </div>
                                  @endforeach
                            </div>
                        </div>
                        <div
                            class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Subtotal<span class="ml-2">${{ Cart::getTotal() }}</span></div>
                        <div
                            class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Shipping Tax<span class="ml-2">$0</span></div>
                        <div
                            class="flex items-center w-full py-4 text-sm font-semibold border-b border-gray-300 lg:py-5 lg:px-3 text-heading last:border-b-0 last:text-base last:pb-0">
                            Total<span class="ml-2">${{ Cart::getTotal() }}</span></div>
                    </div>

                    <div class="pt-12 md:pt-0 2xl:ps-4 mt-10">
                        <h2 class="text-xl font-bold">Payment Information
                        </h2>
                        <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                                <div class="w-full sm:w-1/2">
                                    <img src="https://storage.googleapis.com/wfs/images/cc.png" alt="image"
                                    class="img-fluid">
                                 </div>
                                 <div class="w-full sm:w-1/2">
                                 <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" alt="image"
                                  class="img-fluid">
                            </div>
                        </div>
                        <div class="w-full mt-4">
                                    <input name="card-number" type="number" pattern="[0-9]*" max="9999999999999999" placeholder="Card Number" required
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                        <div class="space-x-0 lg:flex lg:space-x-4 mt-4">
                                <div class="w-full lg:w-1/3">
                                  <select
                                  class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                    <option selected="selected" value="">Exp. Month</option> 
                                    <option value="01">01-January</option>
                                    <option value="02">02-February</option>
                                    <option value="03">03-March</option>
                                    <option value="04">04-April</option>
                                    <option value="05">05-May</option>
                                    <option value="06">06-June</option>
                                    <option value="07">07-July</option>
                                    <option value="08">08-August</option>
                                    <option value="09">09-September</option>
                                    <option value="10">10-October</option>
                                    <option value="11">11-November</option>
                                    <option value="12">12-December</option>
                                  </select>
                                </div>
                                <div class="w-full lg:w-1/3 ">
                                    <select class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                      <option selected="selected" value="">Exp. Year</option>
                                      <option value="2021">2021</option>
                                      <option value="2022">2022</option>
                                      <option value="2023">2023</option>
                                      <option value="2024">2024</option>
                                      <option value="2025">2025</option>
                                      <option value="2026">2026</option>
                                      <option value="2027">2027</option>
                                      <option value="2028">2028</option>
                                      <option value="2029">2029</option>
                                      <option value="2030">2030</option>
                                    </select>
                                  </div>
                                <div class="w-full lg:w-1/3 ">
                                    <input name="cvvcode" type="number" placeholder="CVV CODE" pattern="[0-9]*" max="999" required
                                        class="w-full px-4 py-3 text-sm border border-gray-300 rounded lg:text-sm focus:outline-none focus:ring-1 focus:ring-blue-600">
                                </div>
                            </div>
                                        <div class="mt-4">
                                <a href="{{route('typ')}}"
                                    class="flex text-center w-full px-6 py-2 text-blue-200 bg-blue-600 hover:bg-blue-900">Pay ${{ Cart::getTotal() }}</a>
                            </div>
                  </div>
                </div>
            </div>
        </div>
        </main>
        <script src="{{asset('js/shipping.js')}}"></script>
    @endsection