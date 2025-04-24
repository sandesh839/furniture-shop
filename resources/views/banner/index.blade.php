@extends('layouts.dashboard')

@section('content')
    <h2>Banners</h2>
    <a href="{{ route('banners.create') }}" class="btn btn-primary">Add Banner</a>
    
    <table class="table">
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        @foreach($banners as $banner)
            <tr>
                <td>{{ $banner->title }}</td>
                <td><img src="{{ asset('storage/'.$banner->image) }}" width="100"></td>
                <td>
                    <form action="{{ route('banners.destroy', $banner->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
