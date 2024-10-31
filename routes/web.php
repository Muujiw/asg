<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Contract;
use App\Http\Controllers\ClientContractController;
use App\Http\Controllers\AdminContractController;
use App\Http\Controllers\ClientQuoteRequestController;
use App\Http\Controllers\AdminQuoteRequestController;
use App\Http\Controllers\ClientTicketController;
use App\Http\Controllers\AdminTicketController;
use App\Http\Controllers\PremiumSimulatorController;

Route::get('/simulator', [PremiumSimulatorController::class, 'index'])->name('simulator.index');
Route::post('/simulator/calculate', [PremiumSimulatorController::class, 'calculate'])->name('simulator.calculate');
Route::get('/news', [AdminNewsController::class, 'showAll'])->name('news.index');
Route::get('/news/{news}', [AdminNewsController::class, 'show'])->name('news.show');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/client/contracts', [ClientContractController::class, 'index'])->name('client.contracts.index');
    Route::get('/client/contracts/create', [ClientContractController::class, 'create'])->name('client.contracts.create');
    Route::post('/client/contracts', [ClientContractController::class, 'store'])->name('client.contracts.store');
    Route::get('/client/contracts/{contract}/edit', [ClientContractController::class, 'edit'])->name('client.contracts.edit');
    Route::put('/client/contracts/{contract}', [ClientContractController::class, 'update'])->name('client.contracts.update');
    Route::delete('/client/contracts/{contract}', [ClientContractController::class, 'destroy'])->name('client.contracts.destroy');
    Route::get('/client/contracts/request', [ClientContractController::class, 'request'])->name('client.contracts.request');
    Route::get('/client/contracts/{contract}', [ClientContractController::class, 'show'])->name('client.contracts.view');
    Route::get('/client/contact', [ClientTicketController::class, 'create'])->name('client.tickets.create');
    Route::post('/client/contact', [ClientTicketController::class, 'store'])->name('client.tickets.store');
    Route::get('/quote-request', [ClientQuoteRequestController::class, 'create'])->name('client.quote_requests.create');
    Route::post('/quote-request', [ClientQuoteRequestController::class, 'store'])->name('client.quote_requests.store');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
        Route::get('/admin/users/edit/{id}', [AdminUserController::class, 'edit'])->name('admin.users.edit');
        Route::delete('/admin/users/destroy/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
        Route::put('/admin/users/update/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');

        Route::get('/admin/news', [AdminNewsController::class, 'index'])->name('admin.news.index');       
        Route::get('/admin/news/create', [AdminNewsController::class, 'create'])->name('admin.news.create'); 
        Route::post('/admin/news', [AdminNewsController::class, 'store'])->name('admin.news.store');        
        Route::get('/admin/news/{news}/edit', [AdminNewsController::class, 'edit'])->name('admin.news.edit'); 
        Route::put('/admin/news/{news}', [AdminNewsController::class, 'update'])->name('admin.news.update');  
        Route::delete('/admin/news/{news}', [AdminNewsController::class, 'destroy'])->name('admin.news.destroy'); 

        Route::get('/admin/contracts', [AdminContractController::class, 'index'])->name('admin.contracts.index');
        Route::get('/admin/contracts/create', [AdminContractController::class, 'create'])->name('admin.contracts.create');
        Route::post('/admin/contracts', [AdminContractController::class, 'store'])->name('admin.contracts.store');
        Route::get('/admin/contracts/{contract}/edit', [AdminContractController::class, 'edit'])->name('admin.contracts.edit');
        Route::put('/admin/contracts/{contract}', [AdminContractController::class, 'update'])->name('admin.contracts.update');
        Route::delete('/admin/contracts/{contract}', [AdminContractController::class, 'destroy'])->name('admin.contracts.destroy');

        Route::get('/admin/quote-requests', [AdminQuoteRequestController::class, 'index'])->name('admin.quote_requests.index');
        Route::put('/admin/quote-requests/{quoteRequest}/process', [AdminQuoteRequestController::class, 'process'])->name('admin.quote_requests.process');
        Route::delete('/admin/quote-requests/{quoteRequest}', [AdminQuoteRequestController::class, 'destroy'])->name('admin.quote_requests.destroy');

        Route::get('/admin/tickets', [AdminTicketController::class, 'index'])->name('admin.tickets.index');
        Route::get('/admin/tickets/{ticket}/edit', [AdminTicketController::class, 'edit'])->name('admin.tickets.edit');
        Route::put('/admin/tickets/{ticket}', [AdminTicketController::class, 'update'])->name('admin.tickets.update');
        Route::delete('/admin/tickets/{ticket}', [AdminTicketController::class, 'destroy'])->name('admin.tickets.destroy');
        
    });
});

Route::get('/about', function () {
    return view('about'); // Displays about.blade.php
});

Route::get('/contact', function () {
    return view('contact'); // Displays contact.blade.php
});

Route::get('/crew', function () {
    return view('crew'); // Displays crew.blade.php
});

Route::get('/dashboard', function () {
    $contracts = Contract::where('user_id', Auth::id())->get();
    return view('client.contracts.index', compact('contracts'));
})->name('dashboard');

Route::get('/', function () {
    return view('index'); // Displays index.blade.php
});

Route::get('/products', function () {
    return view('products'); // Displays products.blade.php
});

Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
});

require __DIR__.'/auth.php';
