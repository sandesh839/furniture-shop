@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Products</h1>
<hr class="h-1 bg-red-500">

<div class="text-right my-5">
    <a href="{{route('banner.create')}}" class="bg-blue-900 text-white px-5 py-3 rounded-lg">Add Banners</a>
</div>

<table class="w-full mt-5">
<tr>
    <th class="border p-2 bg-gray-200">S.N</th>
    <th class="border p-2 bg-gray-200">Banner</th>
    <th class="border p-2 bg-gray-200">Banner Name</th>
    <th class="border p-2 bg-gray-200">Description</th>
    <th class="border p-2 bg-gray-200">Price</th>
    <th class="border p-2 bg-gray-200">Discounted_price</th>
    <th class="border p-2 bg-gray-200">Stock</th>
    <th class="border p-2 bg-gray-200">Status</th>
    <th class="border p-2 bg-gray-200">Category</th>
    <th class="border p-2 bg-gray-200">Action</th>
</tr>

@foreach($banners as $banner)

<tr>
    <td class="border p-2">{{$loop->iteration}}</td>
    <td class="border p-2">
        <img src="{{asset('images/products/'.$product->photopath)}}" alt="" class="w-16 h-16">
    </td>
    <td class="border p-2">{{$product->name}}</td>
    <td class="border p-2">{{$product->description}}</td>
    <td class="border p-2">{{$product->price}}</td>
    <td class="border p-2">{{$product->discounted_price}}</td>
    <td class="border p-2">{{$product->stock}}</td>
    <td class="border p-2">{{$product->status}}</td>
    <td class="border p-2">{{$product->category->name}}</td>
    <td class="border p-2">
        <a href="{{route('product.edit',$product->id)}}" class="bg-blue-600 text-white px-1 py-1 rounded">Edit</a>
        <a href="" class="bg-red-600 text-white px-1 py-1 rounded" onclick="return confirm('Are you sure to Delete?')">Delete</a>
    </td>

</tr>
@endforeach
</table>
@endsection