<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('tentang', function () {
    return view('tentang');
});

Route::get('/sapa/{nama}', function ($nama) {
    return "Hello, $nama! Selamat Datang di Toko Online.";
});

Route::get('/kategori/{nama?}', function ($nama='Semua') {
    return "Menampilkan kategori: $nama.";
});

Route::get('/produk/{id}', function ($id) {
    return "Detail produk #$id";
})->name('produk.detail');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    // Semua route di dalam group ini HARUS LOGIN

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
        ->name('home');
    // ↑ ->name('home') = Memberi nama route
    // Kegunaan: route('home') akan menghasilkan URL /home

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // /admin/dashboard
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');
        // ↑ Nama lengkap route: admin.dashboard
        // ↑ URL: /admin/dashboard

        // CRUD Produk: /admin/products, /admin/products/create, dll
        Route::resource('/products', AdminProductController::class);
        // ↑ resource() membuat 7 route sekaligus:
        // - GET    /admin/products          → index   (admin.products.index)
        // - GET    /admin/products/create   → create  (admin.products.create)
        // - POST   /admin/products          → store   (admin.products.store)
        // - GET    /admin/products/{id}     → show    (admin.products.show)
        // - GET    /admin/products/{id}/edit→ edit    (admin.products.edit)
        // - PUT    /admin/products/{id}     → update  (admin.products.update)
        // - DELETE /admin/products/{id}     → destroy (admin.products.destroy)
});

Route::controller(GoogleController::class)->group(function () {
    // ================================================
    // ROUTE 1: REDIRECT KE GOOGLE
    // ================================================
    // URL: /auth/google
    // Dipanggil saat user klik tombol "Login dengan Google"
    // ================================================
    Route::get('/auth/google', 'redirect')
        ->name('auth.google');

    // ================================================
    // ROUTE 2: CALLBACK DARI GOOGLE
    // ================================================
    // URL: /auth/google/callback
    // Dipanggil oleh Google setelah user klik "Allow"
    // URL ini HARUS sama dengan yang didaftarkan di Google Console!
    // ================================================
    Route::get('/auth/google/callback', 'callback')
        ->name('auth.google.callback');
});