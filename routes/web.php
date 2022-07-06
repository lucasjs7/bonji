<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProductController,
    CategoryController,
    MediaController
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function(){

    Route::resource('products/categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('products.media', MediaController::class)->parameters([
        'media' => 'media'
    ]);

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/', function(){
        return redirect()->route('admin.dashboard');
    });

});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});
