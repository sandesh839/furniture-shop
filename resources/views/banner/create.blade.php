@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Create Banner</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('banner.store')}}" method="POST" class="mt-5" enctype="multipart/form-data">
@csrf
<select name="banner" id="" class="w-full rounded-lg my-2">
    @foreach ($banners as $banner)
    <option value="{{$banner->id}}">{{$banner->name}}</option>
    @endforeach
</select>

<input type="text" placeholder="Enter Banner Id" name="id" class="w-full rounded-lg my-2" value="{{old('id')}}">
@error('id')
<p class="text-red-500 mt-2">{{$message}}</p>
@enderror
<textarea name="description" id="" cols="30" rows="5" placeholder="Enter Priority" class="w-full rounded-lg my-2">{{old('priority')}}</textarea>
@error('priority')
<p class="text-red-5000 mt-5">{{message}}</p>
@enderror

<input type="file" name="photopath" class="w-full rounded-lg my-2" value="{{old('photopath')}}">
@error('photopath')
<p class="text-red-500 mt-2">{{$message}}</p>
@enderror

<select name="status" id="" class="w-full rounded-lg my-2">
   
    <option value="Show">Show</option>
    <option value="Hide">Hide</option>
   
</select>

<div class="flex justify-center">
    <button type="submit" class="bg-blue-500 text-whitte px-4 py-2 rounded-lg">Create Banner</button>
    <a href="{{route('banner.index')}}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
</div>

</form>
@endsection