<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('About', function () {
    return '<h1>hello from About Page</h1>';
});
Route::get('Contact_us', function () {
    return '<h1>hello from Contact us Page</h1>';
});

Route::prefix('Support')->group(function () {
    Route::get('/', function () {
        return '<h1> Support page</h1>
        <ul>
        <li>Chat</li>
        <li>Call</li>
        <li>Ticket</li>
        
        </ul>
        ';
    });
    Route::get('Chat', function () {
        return '<h1>chat page</h1>';
    });
    Route::get('Call', function () {
        return '<h1>call page</h1>';
    });
    Route::get('Ticket', function () {
        return '<h1>ticket page</h1>';
    });
});
Route::prefix('Training')->group(function () {
    Route::get('/', function () {
        return '<h1> Training page </h1>
         <ul>
         <li>HR</li>
         <li>ICT</li>
         <li>Marketing</li>
         <li>Logistics</li>
         </ul>
        
        ';
    });
    Route::get('HR', function () {
        return '<h1>HR page</h1>';
    });
    Route::get('ICT', function () {
        return '<h1>ICT page</h1>';
    });
    Route::get('Marketing', function () {
        return '<h1>Marketing page</h1>';
    });
    Route::get('Logistics', function () {
        return '<h1>Logistics page</h1>';
    });
});
// task 3
Route::get('addCarForm',[CarController::class,'addCarForm']);
Route::post('storeCarData',[CarController::class,'storeData']);
Route::get('carDetails',[CarController::class,'showData']);
// task4
Route::get('add-news',[NewsController::class,'create']);
Route::post('store-news',[NewsController::class,'store'])->name('news.store');
Route::get('news',[NewsController::class,'index'])->name('news');
// task 5
Route::get('edit-news/{news_id}',[NewsController::class,'edit']);
Route::put('update-news/{news_id}',[NewsController::class,'update'])->name('update-news');

