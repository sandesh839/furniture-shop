@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Edit Banner</h1>
<hr class="h-1 bg-red-500">

<form action="{{route('banner.update',$banner->id)}}" method="POST" class="mt-5" enctype="multipart/form-data">
@csrf
<select name="banner" id="" class="w-full rounded-lg my-2">
    @foreach ($banners as $banner)
    <option value="{{$banner->id}}"
        @if($banner->banner == $banner->id)
        selected
        @endif
        >{{$banner->name}}</option>
    @endforeach
</select>

<input type="text" placeholder="Enter Product Name" name="name" class="w-full rounded-lg my-2" value="{{$product->name}}">
@error('name')
<p class="text-red-500 mt-2">{{$message}}</p>
@enderror
<textarea name="description" id="" cols="30" rows="5" placeholder="Enter Product Description" class="w-full rounded-lg my-2">{{$product->description}}</textarea>
@error('description')
<p class="text-red-5000 mt-5">{{message}}</p>
@enderror

<input type="text" placeholder="Enter Product Price" name="price" class="w-full rounded-lg my-2" value="{{$product->price}}">
@error('price')
<p class="text-red-500 mt-2">{{$message}}</p>
@enderror

<input type="text" placeholder="Enter Discounted Price" name="discounted_price" class="w-full rounded-lg my-2" value="{{$product->discounted_price}}">
@error('discounted_price')
<p class="text-red-500 mt-2">{{$message}}</p>
@enderror

<input type="text" placeholder="Enter Product Stock" name="stock" class="w-full rounded-lg my-2" value="{{$product->stock}}">
@error('stock')
<p class="text-red-500 mt-2">{{$message}}</p>
@enderror

<select name="status" id="" class="w-full rounded-lg my-2">
   
    <option value="Show"@if($product->status=='Show') selected @endif>Show</option>
    <option value="Hide"@if($product->status=='Hide') selected @endif>Hide</option>
   
</select>

<input type="file" name="photopath" class="w-full rounded-lg my-2" value="{{old('photopath')}}">
@error('photopath')
<p class="text-red-500 mt-2">{{$message}}</p>
@enderror

<p>Current Picture:</p>
<img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-44">

<div class="flex justify-center">
    <button type="submit" class="bg-blue-500 text-whitte px-4 py-2 rounded-lg">Create Product</button>
    <a href="{{route('product.index')}}" class="bg-red-500 text-white px-4 py-2 rounded-lg ml-2">Cancel</a>
</div>

</form>
@endsection