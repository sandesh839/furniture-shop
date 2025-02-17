@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management</title>

    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans antialiased">

    <div class="max-w-7xl mx-auto p-6">
        <!-- Page Title -->
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">User Management</h1>

        <!-- Add User Button -->
        <div class="mb-4 flex justify-end">
            <a href="{{ route('users.create') }}" 
               class="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600 transition-all">
                Add New User
            </a>
        </div>
        

        <!-- Users Table -->
        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Role</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $user->email }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 capitalize">{{ $user->role }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800 flex items-center space-x-4">
                                <a href="{{ route('users.edit', $user->id) }}" 
                                    class="inline-block bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-300"
                                    title="Edit {{ $user->name }}">
                                    Edit
                                 </a>| 
                                 <!-- Delete Button -->
                                 <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="confirmDelete(event, this)">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="inline-block bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300"
                                        title="Delete {{ $user->name }}">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>

@endsection