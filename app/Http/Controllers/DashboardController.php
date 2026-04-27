<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Inventory::count(); 
        $totalCustomers = Pelanggan::count();
        $totalOrders = 'tes';

        $products = Inventory::all();

        return view('dashboard', compact('totalProducts', 'totalCustomers', 'totalOrders', 'products'));
    }

    public function store(Request $request)
    {
        $validData = $request->validate([
            'nama_barang' => 'required',
            'price'       => 'required|numeric',
            'stock'        => 'required|numeric', 
            'status'      => 'required'
        ]);

        Inventory::create($validData);

        return redirect()->back()->with('success', 'Dessert berhasil ditambah!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'price'       => 'required|numeric',
            'stock'        => 'required|numeric',
            'status'      => 'required'
        ]);

        $item = Inventory::findOrFail($id);

        $item->update([
            'nama_barang' => $request->nama_barang,
            'price'       => $request->price,
            'stock'        => $request->stock,
            'status'      => $request->status,
        ]);

        return redirect()->route('dashboard')->with('success', 'Menu berhasil diupdate!');
    }

    public function destroy($id)
    {
        $item = Inventory::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Menu berhasil dihapus!');
    }

    public function edit($id)
    {
        $item = Inventory::findOrFail($id);
        return view('edit', compact('item'));
    }
}
