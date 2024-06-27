<?php

use App\Http\Controllers\IyzicoController;
use Illuminate\Support\Facades\Route;

Route::get('subcription/product/list',[IyzicoController::class, 'product_list']);
Route::get('subcription/product/create',[IyzicoController::class, 'product_create']);
Route::get('subcription/product/pricing',[IyzicoController::class, 'product_pricing']);
Route::get('subcription/product/pricing/list',[IyzicoController::class, 'product_pricing_list']);
Route::get('subcription/customer/create',[IyzicoController::class, 'customer_create']);
Route::get('subcription/customer/list',[IyzicoController::class, 'customer_list']);
Route::get('subcription/card/add',[IyzicoController::class, 'card_add']);
Route::get('subcription/callback',[IyzicoController::class, 'callback'])->name('subcription.callback');

Route::get('/', function () {
    return view('welcome');
});