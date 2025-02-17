@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4 mt-10">

    {{-- Product Section --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

        {{-- Product Image --}}
        <div class="flex justify-center items-center md:col-span-1">
            <div class="relative w-full h-full bg-gray-100 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl">
                <img src="{{ asset('images/products/' . $product->photopath) }}" 
                     alt="{{ $product->name }}" 
                     class="object-cover w-full h-full transition-transform duration-300 ease-in-out">
                @if($product->discounted_price)
                    <span class="absolute top-3 left-3 bg-red-600 text-white text-sm font-semibold px-3 py-1 rounded-full shadow-lg">
                        -{{ $product->discount }}%
                    </span>
                @endif
            </div>
        </div>

        {{-- Product Info --}}
        <div class="md:col-span-1 lg:col-span-2 p-6 bg-white border border-gray-200 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl space-y-6">

            <h2 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $product->name }}</h2>
            
            {{-- Price Section --}}
            <div class="flex items-center space-x-3">
                @if($product->discounted_price)
                    <p class="text-2xl font-bold text-red-600">
                        Rs. {{ $product->discounted_price }}
                    </p>
                    <p class="text-lg text-gray-500 line-through">Rs. {{ $product->price }}</p>
                @else
                    <p class="text-2xl font-bold text-gray-800">Rs. {{ $product->price }}</p>
                @endif
            </div>

            {{-- Quantity Control --}}
            <form action="{{ route('cart.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">

                <div class="flex items-center space-x-4 mt-6">
                    <button class="bg-gray-300 px-4 py-2 rounded-lg transition hover:bg-gray-400" onclick="return dec()">-</button>
                    <input type="text" id="qty" name="qty" value="1" class="w-16 text-center border border-gray-300 rounded-lg" readonly>
                    <button class="bg-gray-300 px-4 py-2 rounded-lg transition hover:bg-gray-400" onclick="return inc()">+</button>
                </div>
                <p class="text-sm text-gray-500 mt-2">In Stock: {{ $product->stock }}</p>

                {{-- Action Buttons --}}
                <div class="flex space-x-4 mt-6">
                    <button class="bg-blue-900 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300" type="submit">Add to Cart</button>
                    {{-- <a href="#" class="bg-yellow-500 text-gray-800 px-6 py-3 rounded-lg hover:bg-yellow-600 transition">Buy Now</a> --}}
                </div>
            </form>
        </div>
    </div>

    {{-- Delivery Info Section --}}
    <div class="mt-10 grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach(['Delivery Options' => ['Delivery within 5 days', '7 days return policy', 'Cash on delivery available'],
                  'Additional Info' => ['High-quality furniture materials', '1-year warranty included'],
                  'Special Features' => ['Eco-friendly design', 'Customizable colors and sizes']] as $title => $items)
            <div class="border border-gray-200 rounded-lg shadow-lg p-6 bg-white transition-transform transform hover:scale-105 hover:shadow-2xl">
                <h3 class="text-lg font-bold text-gray-800 mb-3">{{ $title }}</h3>
                <ul class="space-y-2">
                    @foreach($items as $item)
                        <li class="text-gray-600 flex items-center space-x-2">
                            <i class="ri-checkbox-circle-fill text-blue-500"></i>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>

    {{-- About Product Section --}}
    <div class="mt-10 border border-gray-200 rounded-lg shadow-lg p-6 bg-white transition-transform transform hover:scale-105 hover:shadow-2xl">
        <h2 class="text-2xl font-bold text-gray-800 mb-3">About Product</h2>
        <p class="text-gray-600 leading-relaxed">{{ $product->description }}</p>
    </div>

    {{-- Related Products Section --}}
    <div class="mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-5">Related Products</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
            @foreach ($relatedproducts as $rproduct)
                <a href="{{ route('viewproduct', $rproduct->id) }}" 
                   class="block bg-white border border-gray-200 rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300 transform hover:-translate-y-2 hover:scale-105">
                    <img src="{{ asset('images/products/' . $rproduct->photopath) }}" 
                         alt="{{ $rproduct->name }}" 
                         class="w-full h-56 object-cover transition duration-300 transform group-hover:scale-110">
                    <div class="p-4">
                        <h3 class="text-lg font-bold text-gray-800">{{ $rproduct->name }}</h3>
                        <p class="text-blue-900 font-bold mt-2">
                            @if($rproduct->discounted_price)
                                Rs. {{ $rproduct->discounted_price }}
                                <span class="line-through text-sm text-gray-500">Rs. {{ $rproduct->price }}</span>
                            @else
                                Rs. {{ $rproduct->price }}
                            @endif
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>

{{-- Increment and Decrement Functions --}}
<script>
    function inc() {
        let qty = document.getElementById('qty');
        if (parseInt(qty.value) < {{ $product->stock }}) {
            qty.value = parseInt(qty.value) + 1;
        }
        return false;
    }

    function dec() {
        let qty = document.getElementById('qty');
        if (parseInt(qty.value) > 1) {
            qty.value = parseInt(qty.value) - 1;
        }
        return false;
    }
</script>

@endsection
