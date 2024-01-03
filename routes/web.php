<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\placesController;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\ContactUsController;



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
Route::get('addCarForm',[ExampleController::class,'addCarForm']);
Route::post('storeCarData',[ExampleController::class,'storeData']);
Route::get('carDetails',[ExampleController::class,'showData']);
// task4 newsController route
Route::get('add-news',[NewsController::class,'create']);
Route::post('store-news',[NewsController::class,'store'])->name('news.store');
Route::get('news',[NewsController::class,'index'])->name('news');
// task 5 newsController route
Route::get('edit-news/{news_id}',[NewsController::class,'edit']);
Route::put('update-news/{news_id}',[NewsController::class,'update'])->name('update-news');
//task 6 carController route
Route::get('add-car',[CarsController::class,'create']);
Route::post('store-car',[CarsController::class,'store'])->name('store-car');
Route::get('cars',[CarsController::class,'index'])->middleware('adminMiddleware');
Route::get('single-car/{car_id}',[CarsController::class,'show']);
Route::get('edit-car/{car_id}',[CarsController::class,'edit']);
Route::put('update-car/{car_id}',[CarsController::class,'update'])->name('update-car');
// Route::get('delete-car/{car_id}',[CarsController::class,'destroy']);

// task 6 newsController route

Route::get('delete-news/{news_id}',[NewsController::class,'destroy']);
Route::get('show-news/{news_id}',[NewsController::class,'show']);

// session 7
// delete another way
Route::delete("delete", [CarsController::class,"destroy"])->name('delete-car');
Route::get('trashed',[CarsController::class,'trashed']);
Route::get('restore-car/{car_id}',[CarsController::class,'restore']);
Route::get('forced-deleted/{car_id}',[CarsController::class,'forcedDeleted']);
//task 7
Route::get('trashed-news',[NewsController::class,'trashedNews']);
Route::get('restore-news/{news_id}',[NewsController::class,'restoreNews']);
Route::get('forced-d-news/{news_id}',[NewsController::class,'forcedDNews']);
// session 8

Route::get('show-upload',[ExampleController::class,'showUpload']);
Route::post('upload',[ExampleController::class,'upload'])->name('upload-image');

// session 9
// Route::get('place',[ExampleController::class,'showPlace']);
Route::get('blog',[ExampleController::class,'showBlog']);

// task 9
Route::get('add-place',[placesController::class,'create']);
Route::post('store-place',[placesController::class,'store'])->name('store-place');
Route::get('place',[placesController::class,'index']);
// task 10
Route::get('places-dashboard',[placesController::class,'placesDashboard']);
Route::get("delete-place/{place_id}", [placesController::class,"destroy"]);

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// task 12


// session 13 
Route::get ('session',[ExampleController::class,'mySession']);
// session 14

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 

 Route::get('contact-us',[ContactUsController::class,'create']);
Route::post('send-mail',[ContactUsController::class,'store'])->name('send-mail');
    });