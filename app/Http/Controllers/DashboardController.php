<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $availableProducts = Product::where('status', 'available')
                                    ->count();

        $soldOutProducts = Product::where('status', 'sold_out')
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
            'soldOutProducts',
            'totalSales',
            'totalRevenue',
            'latestSales'
        ));
    }
}