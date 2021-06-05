<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('url/{code}', [App\Http\Controllers\Admin\UrlController::class, 'show'] );
Route::post('url', [App\Http\Controllers\Admin\UrlController::class, 'store'] );

Route::get('test', function () {
    list($ms, $s) = explode(' ', microtime());
        $s = $s - 1608000000;
        $ms = round($ms * 1000);
        $ms = ($ms < 100) ? $ms * 10 : $ms;
        dd($ms);
});
