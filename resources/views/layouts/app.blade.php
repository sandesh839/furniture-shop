<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- <!-- Fonts --> --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased dark:bg-slate-6">
    @include('layouts.alert')

    <div class="flex flex-col lg:flex-row">
        <!-- Navigation Bar -->
        <nav class="w-full lg:w-56 h-auto lg:h-screen bg-gray-100 shadow-lg lg:shadow-none">
            <div class="flex justify-center lg:justify-start">
                <img src="{{ asset('images/furr.png') }}" alt="Logo" class="w-32 lg:w-42 mx-auto mt-4 rounded-full">
                {{-- lg:mx-4 --}}
            </div>
            <ul class="mt-1">
                <li>
                    <a href="{{ route('dashboard') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center @if(Route::is('dashboard')) bg-blue-900 text-white hover:bg-blue-700 @endif">
                        <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard" class="w-6 h-6 mr-3">
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('category.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/category.png') }}" alt="Category" class="w-6 h-6 mr-3">
                        <span>Category</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('product.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/product.png') }}" alt="Product" class="w-6 h-6 mr-3">
                        <span>Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('order.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/orders.png') }}" alt="Orders" class="w-6 h-6 mr-3">
                        <span>Orders</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('users.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/user.png') }}" alt="Users" class="w-6 h-6 mr-3">
                        <span>Users</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/orders.png') }}" alt="Orders" class="w-6 h-6 mr-3">
                        <span>Reports & Analytics</span>
                    </a>
                </li> --}}
                

                {{-- <li>
                    <a href="{{ route('banner.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/banner.jpeg') }}" alt="Banner" class="w-6 h-6 mr-3">
                        <span>Banners</span>
                    </a>
                </li> --}}

                <li>
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="hover:bg-gray-200 p-4 rounded-lg font-bold text-xl w-full text-left flex items-center">
                            <img src="{{ asset('images/logout.png') }}" alt="Logout" class="w-6 h-6 mr-3"><span>Logout</span></button>
                    </form>


                    {{-- <a href="{{ route('dashboard') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/logout.png') }}" alt="Logout" class="w-6 h-6 mr-3">
                        <span>Logout</span>
                    </a> --}}
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <main class="p-4 flex-1 bg-green-100">
            @yield('content')
        </main>
    </div>
</body>
</html>







{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    @include('layouts.alert')
    <div class="flex">
        <nav class="w-56 h-screen shadow-lg bg-gray-100">
            <img src="{{ asset('images/furniture.png') }}" alt="Logo" class="w-42 mx-auto mt-4 rounded-full">
            <ul class="mt-1">
                <li>
                    <a href="{{ route('dashboard') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/dashboard.png') }}" alt="Dashboard" class="w-6 h-6 mr-3">
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('category.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/category.png') }}" alt="Category" class="w-6 h-6 mr-3">
                        <span>Category</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('product.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/product.png') }}" alt="Product" class="w-6 h-6 mr-3">
                        <span>Product</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/orders.png') }}" alt="Orders" class="w-6 h-6 mr-3">
                        <span>Orders</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dashboard') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/user.png') }}" alt="Users" class="w-6 h-6 mr-3">
                        <span>Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('banner.index') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/category.png') }}" alt="Banner" class="w-6 h-6 mr-3">
                        <span>Banners</span>
                    </a>
                </li>



                <li>
                    <a href="{{ route('dashboard') }}" class="block hover:bg-gray-200 p-4 rounded-lg font-bold text-xl flex items-center">
                        <img src="{{ asset('images/logout.png') }}" alt="Logout" class="w-6 h-6 mr-3">
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="p-4 flex-1 bg-green-100">
            @yield('content')
        </div>
    </div>
</body> --}}