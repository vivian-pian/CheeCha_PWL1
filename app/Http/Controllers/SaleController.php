<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::with([
            'product',
            'user'
        ])->latest()->get();

        return view('sales.index', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();

        return view('sales.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        return view('sales.show', compact('sale'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        $products = Product::all();

        return view('sales.edit', compact(
            'sale',
            'products'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $sale->update([
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();

        return redirect()
            ->route('sales.index')
            ->with('success', 'Data sales berhasil dihapus');
    }
}

