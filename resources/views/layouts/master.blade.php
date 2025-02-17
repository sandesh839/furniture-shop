{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furniture Shop</title>
    <link rel="icon" href="{{asset('images/furniture.png')}}" type="image/x-icon">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex justify-between items-center px-16 py-2 bg-blue-900 text-white">
        <p>F|T|I|Y</p>
        <p>Call Us: 9867911907</p>
    </div> 
    
     <nav class="shadow bg-white px-16 py-4 flex justify-between items-center">
        <img src="{{asset('images/furniture.png')}}" class="h-16" alt="furnirure">
        <div class="flex gap-4">
            <a href="" class="hover:text-blue-900">Home</a>
            <a href="" class="hover:text-blue-900">Electronics</a>
            <a href="" class="hover:text-blue-900">Groceries</a>
            <a href="" class="hover:text-blue-900">Fashion</a>
            <a href="" class="hover:text-blue-900">Accessiors</a>
            <a href="{{route('login')}}" class="hover:text-blue-900">Login</a>
        </div>
    </nav>
     

     <nav class="shadow bg-white px-16 py-4 flex justify-between items-center">
        logo
        <a href="/" class="flex items-center">
            <img src="{{asset('images/furniture.png')}}" class="h-16" alt="Furniture Shop Logo">
        </a>
        
         Navigation Links 
        <div class="flex gap-6 items-center">
            Navigation Links
            <a href="/" class="hover:text-blue-900">Home</a>
            <a href="/living-room" class="hover:text-blue-900">Living Room</a>
            <a href="/bedroom" class="hover:text-blue-900">Bedroom</a>
            <a href="/office" class="hover:text-blue-900">Office</a>
            <a href="/outdoor" class="hover:text-blue-900">Outdoor</a>
            <a href="/sales" class="hover:text-blue-900">Sales</a>
            <a href="/new-arrivals" class="hover:text-blue-900">New Arrivals</a>
    
             Search Bar 
            <form action="/search" method="get" class="relative">
                <input type="text" name="query" placeholder="Search..." class="p-2 border rounded w-48">
                <button type="submit" class="absolute inset-y-0 right-0 px-4 py-2 bg-blue-500 text-white rounded-r">Search</button>
            </form>
    
            User Login
            <a href="{{route('login')}}" class="hover:text-blue-900">Login</a>
        </div>
    </nav>
    
</body>
</html>  --}}

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/lictlogo.png') }}" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
     boxicon 
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     Scripts 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <div class="flex items-center justify-between px-2 py-2 text-blue-900 bg-white">
        <p><i class='bx bxl-facebook-circle'></i>&nbsp;<i class='bx bxl-tiktok'></i>&nbsp;<i
                class='bx bxl-instagram'></i>&nbsp;<i class='bx bxl-youtube'></i></p>
        <p><i class='bx bxs-phone-call'></i> &nbsp;9876543432</p>
    </div>

    <nav class="mb-5 bg-white border-gray-200 dark:bg-blue-900">
        <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/furniture.png') }}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">LICT Ecommerce</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="flex flex-col p-4 mt-4 font-medium border border-gray-100 rounded-lg md:p-0 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-white rounded md:bg-transparent md:p-0 dark:text-white hover:text-blue-600 "
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Electronic</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Groceries</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Fashion</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Accessories</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block px-3 py-2 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')

    <footer class="py-8 mt-10 text-white bg-blue-900">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col space-y-6 text-left md:flex-row md:justify-between md:space-y-0">
                First Column 
                <div class="md:w-4/12">
                    <h1 class="mb-4 text-2xl font-bold text-yellow-400">LICT Ecommerce</h1>
                    <p class="text-sm">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta necessitatibus,
                        non consequatur consequuntur voluptatum quibusdam dolorum odio voluptatibus. Veritatis
                        exercitationem fuga ex necessitatibus! Harum error explicabo, minus excepturi quas quod.</p>
                </div>
                 Second Column 
                <div class="md:w-1/4">
                    <h1 class="mb-4 text-2xl font-bold">Quick Links</h1>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:underline">Home</a></li>
                        <li><a href="#" class="hover:underline">Electronic</a></li>
                        <li><a href="#" class="hover:underline">Groceries</a></li>
                        <li><a href="#" class="hover:underline">Fashion</a></li>
                        <li><a href="#" class="hover:underline">Accessories</a></li>
                    </ul>
                </div>
                 Third Column 
                <div class="md:w-4/12">
                    <h1 class="mb-4 text-2xl font-bold">Contact Us</h1>
                    <p class="text-sm">Address: Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae fugit,
                        quod sunt deleniti iusto maxime ratione voluptas. In, dolor, sapiente odio sunt unde quos
                        dolorum quae dicta fugiat nesciunt nisi?</p>
                    <p class="mt-4 text-sm">Phone: 9829096752</p>
                    <p class="text-sm">Email: info@info.com</p>
                </div>
            </div>
        </div>
    </footer>

</body>

</html> --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>LICT Ecommerce</title><link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
    <link rel="icon" href="{{asset('images/furr.png')}}" type="image/x-icon">
    {{-- Scripts  --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css"
    rel="stylesheet"
/>
</head>
<body>
    @include('layouts.alert')
<div class="flex justify-between items-center px-16 bg-gray-800 text-white">
    <p>
        <i class="ri-facebook-circle-fill"></i>
        <i class="ri-twitter-line"></i>
        <i class="ri-tiktok-line"></i></p>

    <p>Call us:9867911907</p>
</div>

<nav class="shadow bg-white px-16 py-4 flex justify-between items-center mb-10 sticky top-0 z-40">
    <img src="{{asset('images/furr.png')}}" alt="" class="h-16">
    {{-- <form action="{{route('search')}}" method="GET"> --}}
        {{-- <input type="search" class="border border-gray-300 rounded-lg px-3 py-2" placeholder="Search" name="search"> --}}
        <form action="{{route('search')}}" method="GET">
            <input type="search" class="border border-gray-300 rounded-lg px-3 py-2" placeholder="Search" name="search" value="{{request()->query('search')}}">
        <button type="submit" class="bg-blue-900 text-white rounded-lg px-4 py-2">Search</button>
    </form>
    
    <div class="flex items-center gap-4">
        <a href="{{route('home')}}" class="hover:text-blue-900">Home</a>
        {{-- @php
         $categories =App\Models\Category::orderBy('priority')->get();   
        @endphp

        @foreach($categories as $category)
        <a href="{{route('categoryproduct',$category->id)}}" class="hover:text-blue-900">{{$category->name}}</a>
        @endforeach --}}

        {{-- //login garepaxi mathi patti kale login garyo tesko nam show garna ko lagi --}}
        @auth
        <div class="group relative">
            <i class="ri-user-3-line text-xl bg-gray-200 p-2 rounded-full cursor-pointer"></i>
                <div class="absolute hidden group-hover:block top-8 -right-10 bg-white shadow w-32 rounded-md border">
                    <a href="{{route('mycart')}}" class="block py-2 hover:bg-gray-200 p-4 rounded-md">My Cart</a>
                    <a href="{{ route('myorder') }}" class="block py-2 px-4 hover:bg-gray-200">My Orders</a>
                    <a href="" class="block py-2 hover:bg-gray-200 p-4 rounded-md">My Profile</a>
                    {{-- <a href="" class="block py-2 hover:bg-gray-200 p-4 rounded-md">Logout</a> --}}
                    <form action="{{route('logout')}}" method="POST">
                        @csrf
                        <button type="submit" class="block py-2 hover:bg-gray-200 p-4 rounded-md w-full text-left">Logout</button>
                    </form>
                </div>
                    </div>
        {{-- <a href="" class="hover:text-blue-900">Hi, {{auth()->user()->name}}</a>     --}}
        @else
        <a href="{{route('login')}}" class="hover:text-blue-900">Login</a>
        @endauth
    </div>
</nav>
@yield('content')

<!-- Footer -->
<footer class="bg-gray-800 text-white py-8 mt-5">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="mb-4 md:mb-0 text-center md:text-left">
            <h3 class="text-lg font-bold">Furniture Shop</h3>
            <p class="text-sm">Your one-stop shop for all furniture needs.</p>
        </div>
        <div class="mb-4 md:mb-0 text-center md:text-left">
            <h4 class="text-md font-semibold">Contact Us</h4>
            <p class="text-sm">Email: santroz260@gmail.com</p>
            <p class="text-sm">Phone: 9867911908</p>
        </div>
        <div class="text-center md:text-left">
            <h4 class="text-md font-semibold">Follow Us</h4>
            <div class="flex justify-center md:justify-start space-x-4">
                <a href="#" class="text-blue-500"><i class="ri-facebook-circle-fill"></i></a>
                <a href="#" class="text-pink-500"><i class="ri-instagram-fill"></i></a>
                <a href="#" class="text-blue-400"><i class="ri-twitter-fill"></i></a>
                <a href="#" class="text-blue-400"><i class="ri-telegram-fill"></i></a>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <p class="text-sm">&copy; 2023 Furniture Shop. All rights reserved.</p>
    </div>
</footer>

</body>
</html>


