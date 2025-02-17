@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add New User</title>

    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="max-w-7xl mx-auto p-6">
        <!-- Page Title -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Add New User</h1>

        <!-- New User Form -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <!-- Name Field -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-semibold text-gray-700">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    @error('name') 
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-semibold text-gray-700">Email</label>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" 
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
                    @error('email') 
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                    @enderror
                </div>

                <!-- Role Field -->
                <div class="mb-4">
                    <label for="role" class="block text-sm font-semibold text-gray-700">Role</label>
                    <select name="role" id="role" 
                            class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                    @error('role') 
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div> 
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition-all">
                        Add User
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>

@endsection