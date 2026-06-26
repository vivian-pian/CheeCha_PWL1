<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $availableProducts = Product::where('status', 'ready')
                                    ->count();

        $POProducts = Product::where('status', 'pre-order')
                                  ->count();

        $totalSales = Sale::count();

        $totalRevenue = Sale::sum('total');

        $latestSales = Sale::with([
                            'product',
                            'user'
                        ])
                        ->latest()
                        ->take(5)
                        ->get();

        return view('dashboard', compact(
            'totalProducts',
            'availableProducts',
            'POProducts',
            'totalSales',
            'totalRevenue',
            'latestSales'
        ));
    }
}