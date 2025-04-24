@extends(auth()->user()->role == 'admin' ? 'layouts.app' : 'layouts.master')

@section('content')
<div class="container mx-auto py-6">
    <div class="flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="text-3xl font-bold text-red-900 mb-4 text-center">Profile Information</h2>
                <div class="space-y-4">
                    <div>
                        <strong class="block text-gray-700">Name:</strong>
                        <p class="text-gray-600">{{ auth()->user()->name }}</p>
                    </div>
                    <div>
                        <strong class="block text-gray-700">Email:</strong>
                        <p class="text-gray-600">{{ auth()->user()->email }}</p>
                    </div>
                    <div>
                        <strong class="block text-gray-700">Phone:</strong>
                        <p class="text-gray-600">{{ auth()->user()->phone ?? 'N/A' }}</p>
                    </div>
                    <div>
                        <strong class="block text-gray-700">Address:</strong>
                        <p class="text-gray-600">{{ auth()->user()->address ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
