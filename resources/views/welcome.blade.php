@extends('layouts.master')

@section('content')

<!-- Navigation Bar -->
{{-- <nav class="bg-gray-800 p-4">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <!-- Logo image with a white background to enhance visibility -->
        <div class="bg-white p-2 rounded-full mb-4 md:mb-0"> 
            <img src="{{ asset('images/furr.png') }}" alt="Logo" class="h-12 w-auto"> 
        </div>
        
        <!-- Search Bar -->
        <div class="md:ml-6 flex flex-col md:flex-row items-center w-full md:w-auto">
            <form action="{{ route('search') }}" method="GET" class="w-full md:w-auto">
                <input type="search" class="border border-gray-300 rounded-lg px-3 py-2 w-full md:w-64" placeholder="Search" name="search" value="{{ request()->query('search') }}">
                <button type="submit" class="bg-blue-900 text-white rounded-lg px-4 py-2 mt-2 md:mt-0">Search</button>
            </form>
        </div>

        <div class="flex space-x-6 mt-4 md:mt-0">
            <a href="{{ route('home') }}" class="text-white hover:text-yellow-400 transition duration-300">Home</a>
            <a href="{{ route('contact') }}" class="text-white hover:text-yellow-400 transition duration-300">Contact</a>
            <a href="{{ route('about') }}" class="text-white hover:text-yellow-400 transition duration-300">About Us</a>
            <a href="{{ route('shop') }}" class="text-white hover:text-yellow-400 transition duration-300">Shop Now</a>
            <a href="{{ route('login') }}" class="text-white hover:text-yellow-400 transition duration-300">Login</a>
        </div>
    </div>
</nav> --}}

<!-- Banner Section -->
<section class="banner-section my-6">
    <div class="container mx-auto relative">
        <!-- Banner Slider Container -->
        <div class="relative overflow-hidden">
            <!-- Slider Inner (to hold multiple banners) -->
            <div class="flex transition-transform duration-500 ease-in-out" id="slider">
                <!-- First Banner -->
                <div class="w-full h-48 md:h-64 flex-shrink-0">
                    <img src="{{ asset('images/banner.jpg') }}" alt="Discount Banner 1" class="w-full h-full object-cover">
                </div>
                <!-- Second Banner -->
                <div class="w-full h-48 md:h-64 flex-shrink-0">
                    <img src="{{ asset('images/banner1.jpg') }}" alt="Discount Banner 2" class="w-full h-full object-cover">
                </div>
                <!-- Add more banners here -->
            </div>

            <!-- Left/Right Navigation -->
            <div class="absolute inset-y-0 left-0 flex items-center">
                <button id="prev" class="bg-gray-800 text-white px-3 py-2 rounded-full hover:bg-gray-600">
                    <i class="ri-arrow-left-s-line"></i>
                </button>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center">
                <button id="next" class="bg-gray-800 text-white px-3 py-2 rounded-full hover:bg-gray-600">
                    <i class="ri-arrow-right-s-line"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript for slider navigation -->
<script>
    const slider = document.getElementById('slider');
const next = document.getElementById('next');
const prev = document.getElementById('prev');
let currentSlide = 0;

// Function to move the slider to the next slide
const moveToNextSlide = () => {
    currentSlide = (currentSlide < slider.children.length - 1) ? currentSlide + 1 : 0;
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
};

// Function to move the slider to the previous slide
const moveToPrevSlide = () => {
    currentSlide = (currentSlide > 0) ? currentSlide - 1 : slider.children.length - 1;
    slider.style.transform = `translateX(-${currentSlide * 100}%)`;
};

// Event listeners for next and previous buttons
next.addEventListener('click', moveToNextSlide);
prev.addEventListener('click', moveToPrevSlide);

// Auto-slide every 5 seconds
setInterval(moveToNextSlide, 5000); // 5000 milliseconds = 5 seconds

</script>

<!-- Main Content -->
<div class="container mx-auto px-4 mt-8">
    <div class="text-center mb-6">
        <h1 class="text-2xl md:text-3xl font-bold">Latest Products</h1>
        <p class="text-gray-700">Discover our latest offerings and find the perfect piece for your home!</p>
    </div>

    <!-- On Sale and Shop All Products Links -->
    <div class="flex justify-between items-center mb-6 flex-wrap">
        <a href="" class="text-lg font-semibold text-red-600 hover:text-red-800 mb-2 md:mb-0">
            <div class="flex items-center">
                <i class="ri-fire-line mr-2 text-red-500"></i> On Sale Now
            </div>
        </a>

        {{-- <a href="{{ route('shop') }}" class="text-lg font-semibold text-blue-900 hover:text-blue-700">
            Shop All Products <i class="ri-arrow-right-line ml-2"></i> --}}
        </a>
    </div>

    <!-- Horizontal Scrolling Product Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 py-6 bg-gradient-to-r from-gray-50 to-gray-100">
        @foreach ($products as $product)
            <a href="{{ route('viewproduct', $product->id) }}" class="group transform transition-transform duration-300 hover:scale-105">
                <div class="border rounded-lg bg-white shadow-md hover:shadow-lg overflow-hidden flex flex-col relative p-4">
                    
                    <!-- Product Image -->
                    <div class="relative w-full h-48 bg-gradient-to-b from-gray-200 to-gray-100 flex items-center justify-center">
                        <img src="{{ asset('images/products/' . $product->photopath) }}" alt="{{ $product->name }}" class="object-contain w-full h-full transition-transform duration-300 group-hover:scale-110" />
                        
                        <!-- Discount Badge -->
                        @if($product->discounted_price)
                            <span class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold py-1 px-2 rounded">
                                -{{ $product->discount }}%
                            </span>
                        @endif
                    </div>
    
                    <!-- Product Details -->
                    <div class="mt-4">
                        <h2 class="text-sm md:text-base font-semibold text-gray-800 truncate group-hover:text-orange-600">
                            {{ $product->name }}
                        </h2>
    
                        <!-- Price and Discount Information -->
                        <div class="mt-2 flex items-center space-x-2">
                            <span class="text-orange-600 font-bold text-base">
                                Rs.{{ $product->discounted_price ?? $product->price }}
                            </span>
                            @if($product->discounted_price)
                                <span class="text-sm text-gray-500 line-through">
                                    Rs.{{ $product->price }}
                                </span>
                            @endif
                        </div>
    
                        <!-- Buy Now Button -->
                        <div class="mt-4">
                            <button class="bg-orange-600 hover:bg-orange-700 text-white py-2 px-4 rounded text-sm font-semibold w-full">
                                Buy Now
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
    

</div>

<!-- Footer -->
{{-- <footer class="bg-gray-100 text-center p-6 mt-10">
    <div class="max-w-4xl mx-auto">
        <h3 class="text-lg font-bold text-gray-800">About Home Design Furniture</h3>
        <p class="mt-2 text-gray-600">
            At Home Design Furniture, we provide stylish and functional pieces that enhance your living spaces. Explore our curated collection for comfort and elegance.
        </p>
    </div>
</footer> --}}

@endsection
