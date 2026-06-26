<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('user')
            ->latest()
            ->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required'
        ]);

        Product::create([
            'user_id' => auth()->id(),
            'product_name' => $request->product_name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'status' => 'required'
        ]);

        $product->update([
            'user_id'=> auth()->id(),
            'product_name' => $request->product_name,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product berhasil dihapus');
    }
}

