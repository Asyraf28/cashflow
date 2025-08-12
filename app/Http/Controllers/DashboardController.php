<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $productsSold = OrderDetail::query()->sum('qty');
        $revenue = Order::query()->sum('total');
        $ordersCount = Order::query()->count();
        $productsCount = Product::query()->count();

        $recentOrders = Order::query()
        ->orderBy('created_at', 'desc')
        ->limit(5)
        ->get();

        return view('dashboard', [
            'productsSold' => $productsSold,
            'revenue' => $revenue,
            'ordersCount' => $ordersCount,
            'productsCount' => $productsCount,
            'recentOrders' => $recentOrders,
        ]);
    }
}
