<?php

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/add', [DashboardController::class, 'store'])->name('inventory.store');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('inventory.update');
    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('inventory.destroy');
    Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('inventory.edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // --- MANAJEMEN PELANGGAN (Sudah diganti dari users) ---
    
    Route::get('/pelanggan', function () {
        $pelanggan = Pelanggan::all(); 
        return view('pelanggan.index', compact('pelanggan')); 
    })->name('pelanggan.index');

    Route::post('/pelanggan', function (Request $request) {
        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'nomor_telepon_pelanggan' => $request->nomor_telepon_pelanggan,
            'alamat_pengguna' => $request->alamat_pengguna,
        ]);
        return redirect()->back();
    })->name('pelanggan.store');

    Route::get('/pelanggan/{id}/edit', function ($id) {
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->firstOrFail();
        return view('pelanggan.edit', compact('pelanggan'));
    })->name('pelanggan.edit');

    Route::put('/pelanggan/{id}', function (Request $request, $id) {
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->firstOrFail();
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'email_pelanggan' => $request->email_pelanggan,
            'nomor_telepon_pelanggan' => $request->nomor_telepon_pelanggan,
            'alamat_pengguna' => $request->alamat_pengguna,
        ]);
        return redirect()->route('pelanggan.index');
    })->name('pelanggan.update');

    Route::delete('/pelanggan/{id}', function ($id) {
        $pelanggan = Pelanggan::where('id_pelanggan', $id)->firstOrFail();
        $pelanggan->delete();
        return redirect()->route('pelanggan.index');
    })->name('pelanggan.destroy');

});

require __DIR__.'/auth.php';