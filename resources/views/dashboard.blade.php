@extends('layouts.app')
@section('content')
<h1 class="text-4xl font-extrabold text-blue-900">Dashboard</h1>
<hr class="h-1 bg-gray-500">

<div class="mt-5 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <!-- Categories Card -->
    <div class="bg-yellow-50 p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
        <h2 class="text-2xl font-semibold text-yellow-800">Categories</h2>
        <p class="text-gray-600 mt-2">Total categories: <span class="font-bold text-yellow-600">{{$categories}}</span></p>
    </div>

    <!-- Products Card -->
    <div class="bg-green-50 p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
        <h2 class="text-2xl font-semibold text-green-800">Products</h2>
        <p class="text-gray-600 mt-2">Total Products: <span class="font-bold text-green-600">{{$products}}</span></p>
    </div>

    <!-- Users Card -->
    <div class="bg-blue-50 p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
        <h2 class="text-2xl font-semibold text-blue-800">Users</h2>
        <p class="text-gray-600 mt-2">Total Users: <span class="font-bold text-blue-600">{{$users}}</span></p>
    </div>

    <!-- Pending Orders Card -->
    <div class="bg-red-50 p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
        <h2 class="text-2xl font-semibold text-red-800">Pending Orders</h2>
        <p class="text-gray-600 mt-2">Pending Orders: <span class="font-bold text-red-600">{{$pending}}</span></p>
    </div>

    <!-- Processing Orders Card -->
    <div class="bg-orange-50 p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
        <h2 class="text-2xl font-semibold text-orange-800">Processing Orders</h2>
        <p class="text-gray-600 mt-2">Processing Orders: <span class="font-bold text-orange-600">{{$processing}}</span></p>
    </div>

    <!-- Completed Orders Card -->
    <div class="bg-teal-50 p-6 shadow-lg rounded-lg border border-gray-200 transition-transform transform hover:scale-105">
        <h2 class="text-2xl font-semibold text-teal-800">Completed Orders</h2>
        <p class="text-gray-600 mt-2">Completed Orders: <span class="font-bold text-teal-600">{{$completedOrders}}</span></p>
    </div>
</div>

<!-- Google Pie Chart -->
<div class="mt-8">
    <h2 class="text-3xl font-bold text-gray-800 text-center">Order Status Distribution</h2>
    <div id="orderStatusPieChart" class="mt-5 mx-auto" style="width: 100%; max-width: 600px; height: 400px;"></div>
</div>

<!-- Google Charts Script -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        // Create the data table
        var data = google.visualization.arrayToDataTable([
            ['Status', 'Count'],
            ['Pending', {{$pending}}],
            ['Processing', {{$processing}}],
            ['Shipping', {{$shipping}}],
            ['Delivered', {{$delivered}}],
        ]);

        // Chart options
        var options = {
            title: 'Order Status Distribution',
            pieHole: 0.4, // Optional: Makes it a donut chart
            width: 600,
            height: 400,
            colors: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0']
        };

        // Instantiate and draw the chart
        var chart = new google.visualization.PieChart(document.getElementById('orderStatusPieChart'));
        chart.draw(data, options);
    }
</script>
@endsection
