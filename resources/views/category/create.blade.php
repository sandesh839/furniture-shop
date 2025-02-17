@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Create Category</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('category.store')}}" method="POST" class="mt-5">
    @csrf
    {{-- //hamlai token dinxa --}}
    <input type="text" class="w-full rounded-lg my-2" placeholder="Enter Priority" name="priority" value="{{old('priority')}}">
    @error('priority')
    <p class="text-red-500 mt-2">{{$message}}</p>
    @enderror
        
    <input type="text" class="w-full rounded-lg my-2" placeholder="Enter Category Name" name="name" value="{{old('name')}}">
    @error('name')
    <p class="text-red-500 mt-2">{{$message}}</p>
    @enderror
        

    <div class="flex mt-4 justify-center gap-4">
        <input type="submit" value="Add Category" class="bg-blue-600 text-white px-5 py-3 rounded-lg cursor-pointer">
        <a href="{{route('category.index')}}" class="bg-red-600 text-white px-10 py-3 rounded-lg">Exit</a>
    </div>
</form>
@endsection