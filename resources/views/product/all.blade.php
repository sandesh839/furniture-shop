{{-- resources/views/products/all.blade.php

@extends('layouts.master')

@section('content')
<div class="container mx-auto px-4">
    <div class="border-l-4 border-blue-900 pl-2 mb-6">
        <h1 class="text-3xl font-bold">All Products</h1>
        <p class="text-gray-700">Browse through all available products!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
        @foreach ($products as $product)
            <a href="{{ route('viewproduct', $product->id) }}" class="transform transition-transform duration-300 hover:scale-105">
                <div class="border rounded-lg bg-white shadow-md hover:shadow-lg overflow-hidden">
                    <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}" class="h-64 w-full object-cover">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                        <p class="text-blue-900 font-bold text-lg">
                            @if($product->discounted_price)
                                <span class="text-lg">{{ $product->discounted_price }}</span> 
                                <span class="line-through font-thin text-red-600">{{ $product->price }}</span>
                            @else
                                <span class="text-lg">{{ $product->price }}</span>
                            @endif
                        </p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection --}}
