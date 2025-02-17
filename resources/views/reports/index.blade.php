@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold">Reports</h1>
    <div class="mt-4">
        <h2>Order Status Distribution</h2>
        <div id="order-status-chart"></div>
    </div>
    <div class="mt-4">
        <h2>Categories Distribution</h2>
        <div id="categories-chart"></div>
    </div>
    <div class="mt-4">
        <h2>Product Types Distribution</h2>
        <div id="product-types-chart"></div>
    </div>
</div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', { packages: ['corechart'] });
    google.charts.setOnLoadCallback(drawCharts);

    function drawCharts() {
        drawOrderStatusChart();
        drawCategoriesChart();
        drawProductTypesChart();
    }

    function drawOrderStatusChart() {
        var data = google.visualization.arrayToDataTable([
            ['Status', 'Count'],
            ['Pending', {{ $pending }}],
            ['Processing', {{ $processing }}],
            ['Shipping', {{ $shipping }}],
            ['Delivered', {{ $delivered }}],
        ]);
        var options = { title: 'Order Status Distribution' };
        var chart = new google.visualization.PieChart(document.getElementById('order-status-chart'));
        chart.draw(data, options);
    }

    function drawCategoriesChart() {
        var data = google.visualization.arrayToDataTable([
            ['Category', 'Count'],
            @foreach ($categoriesData as $name => $count)
                ['{{ $name }}', {{ $count }}],
            @endforeach
        ]);
        var options = { title: 'Categories Distribution' };
        var chart = new google.visualization.PieChart(document.getElementById('categories-chart'));
        chart.draw(data, options);
    }

    function drawProductTypesChart() {
        var data = google.visualization.arrayToDataTable([
            ['Product Type', 'Count'],
            @foreach ($productTypesData as $type => $count)
                ['{{ $type }}', {{ $count }}],
            @endforeach
        ]);
        var options = { title: 'Product Types Distribution' };
        var chart = new google.visualization.PieChart(document.getElementById('product-types-chart'));
        chart.draw(data, options);
    }
</script>
@endsection
