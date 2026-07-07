<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with([
            'product',
            'user'
        ])->latest()->get();

        return view('sales.index', compact('sales'));
    }
    public function create()
    {
        $products = Product::all();

        return view('sales.create', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        Sale::create([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
            'customer_name' => $request->customer_name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'total' => $product->price * $request->quantity,
        ]);

        return redirect()
            ->route('sales.index')
            ->with('success', 'Data sales berhasil ditambahkan');
    }
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }
    public function edit(Sale $sale)
    {
        $products = Product::all();

        return view('sales.edit', compact(
            'sale',
            'products'
        ));
    }
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $sale->update([
            'user_id'=> auth()->id(),
            'product_id' => $product->id,
            'customer_name' => $request->customer_name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'total' => $product->price * $request->quantity,
        ]);

        return redirect()
            ->route('sales.index')
            ->with('success', 'Data sales berhasil diupdate');
    }
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()
            ->route('sales.index')
            ->with('success', 'Data sales berhasil dihapus');
    }
}

