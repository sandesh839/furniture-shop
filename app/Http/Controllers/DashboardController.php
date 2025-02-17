<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        // Fetch the counts for categories and products
        $categories = Category::count();
        $products = Product::count();
        // $userCount = User::count();
        $users = User::count();
        $completedOrders =Order::count();

        // Fetch order statuses and their counts
        $orderStatuses = Order::selectRaw("status, COUNT(*) as count")
                              ->groupBy('status')
                              ->pluck('count', 'status');

        // Get individual counts for each status
        $pending = $orderStatuses->get('Pending', 0);
        $processing = $orderStatuses->get('Processing', 0);
        $shipping = $orderStatuses->get('Shipping', 0);
        $delivered = $orderStatuses->get('Delivered', 0);

        // Pass the data to the view
        return view('dashboard', compact('categories', 'products','users', 'pending','completedOrders', 'processing', 'shipping', 'delivered'));
    }
}
