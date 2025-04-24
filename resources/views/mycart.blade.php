{{-- @extends('layouts.master')
@section('content')
<div class="px-16">
    <div class="border-l-4 border-blue-900 pl-2">
        <h1 class="text-2xl font-bold">My Cart</h1>
        <p>Products in Cart</p>
    </div>

    <table class="w-full mt-5">
        <tr>
            <th class="border border-gray-300 p-2">Product Image</th>
            <th class="border border-gray-300 p-2">Product Name</th>
            <th class="border border-gray-300 p-2">Quantity</th>
            <th class="border border-gray-300 p-2">Price</th>
            <th class="border border-gray-300 p-2">Total</th>
            <th class="border border-gray-300 p-2">Action</th>
        </tr>

        <tr>
            @foreach($carts as $cart)
            <tr class="text-center">
                <td class="border border-gray-100 p-2">
                    <img src="{{asset('images/products/'.$cart->product->photopath)}}" alt="" class="h-16 mx-auto">
                </td>
                
                <td class="border border-gray-100 p-2">{{$cart->product->name}}</td>
                <td class="border border-gray-100 p-2">{{$cart->qty}}</td>
                <td class="border border-gray-100 p-2">
                    @if($cart->product->discounted_price == '')
                    {{$cart->product->price}}
                    @else
                    {{$cart->product->discounted_price}}
                    <span class="line-through text-xs text-red-600 block">
                        {{$cart->product->price}}
                    </span>
                    @endif



                </td>
                <td class="border border-gray-100 p-2">{{$cart->total}}</td>
                <td class="border border-gray-100 p-2">
                    <a href="{{route('checkout',$cart->id)}}"class="bg-blue-900 text-white px-2 py-1 rounded-lg">Checkout</a>
                    <a href="{{route('cart.destroy', $cart->id)}}"class="bg-red-900 text-white px-2 py-1 rounded-lg">Remove</a>
                </td>
            </tr>
        </tr>
        @endforeach

    </table>
</div>
@endsection
 --}}

 @extends('layouts.master')

@section('content')
<div class="px-16 py-8">
    {{-- Section Title --}}
    <div class="border-l-4 border-blue-900 pl-4 mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">My Cart</h1>
        <p class="text-lg text-gray-500">Review and manage your cart items below.</p>
    </div>

    {{-- Cart Table --}}
    <div class="overflow-x-auto bg-white shadow-lg rounded-lg border border-gray-300">
        <table class="w-full table-auto text-sm text-gray-700">
            <thead>
                <tr class="bg-gray-100 text-gray-600">
                    <th class="py-3 px-4 border border-gray-300">Product Image</th>
                    <th class="py-3 px-4 border border-gray-300">Product Name</th>
                    <th class="py-3 px-4 border border-gray-300">Quantity</th>
                    <th class="py-3 px-4 border border-gray-300">Price</th>
                    <th class="py-3 px-4 border border-gray-300">Total</th>
                    <th class="py-3 px-4 border border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carts as $cart)
                    <tr class="text-center hover:bg-gray-50">
                        {{-- Product Image --}}
                        <td class="py-3 px-4 border border-gray-100">
                            <img src="{{ asset('images/products/'.$cart->product->photopath) }}" 
                                 alt="{{ $cart->product->name }}" 
                                 class="h-16 w-16 object-cover mx-auto rounded-md transition-transform transform hover:scale-110">
                        </td>

                        {{-- Product Name --}}
                        <td class="py-3 px-4 border border-gray-100 font-medium text-gray-800">{{ $cart->product->name }}</td>

                        {{-- Quantity --}}
                        <td class="py-3 px-4 border border-gray-100">{{ $cart->qty }}</td>

                        {{-- Price --}}
                        <td class="py-3 px-4 border border-gray-100">
                            @if($cart->product->discounted_price)
                                <span class="text-red-600 font-semibold">Rs. {{ $cart->product->discounted_price }}</span>
                                <span class="block text-xs text-gray-400 line-through">Rs. {{ $cart->product->price }}</span>
                            @else
                                <span class="text-gray-800 font-semibold">Rs. {{ $cart->product->price }}</span>
                            @endif
                        </td>

                        {{-- Total --}}
                        <td class="py-3 px-4 border border-gray-100 font-bold text-blue-900">{{ $cart->total }}</td>

                        {{-- Action Buttons --}}
                        <td class="py-3 px-4 border border-gray-100 space-x-2">
                            <a href="{{ route('checkout', $cart->id) }}" 
                               class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 transition duration-300 transform hover:scale-105">Checkout</a>
                            <a href="{{ route('cart.destroy', $cart->id) }}" 
                               class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-500 transition duration-300 transform hover:scale-105">Remove</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Empty Cart Message --}}
    {{-- @if($carts->isEmpty())
        <div class="mt-8 text-center">
            <p class="text-lg text-gray-500">Your cart is currently empty. Start shopping now!</p>
            <a href="" 
               class="mt-4 inline-block bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300">Go to Shop</a>
        </div>
    @endif --}}
</div>

@endsection
