<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\ResourceController;

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

//Show home page
Route::get('/', [HomeController::class, 'show'])->name('home');

//Show about page
Route::view('/about', 'about')->name('about');

//Show partnership page
Route::view('/partnership', 'partnership')->name('partnership');

//Show post
Route::get('/post/{article}', [PostController::class,'post']);

//Get events resources
Route::get('/events', [EventController::class, 'show'])->name('events');

//Show executives
Route::view('/executives', 'executives')->name('executives');

//Show faqs
Route::view('/faqs', 'faqs')->name('faqs');

//Show developers
Route::view('/developers', 'developers')->name('developers');

//Show alumni
Route::view('/alumni', 'alumni')->name('alumni');

//Show staff
Route::view('/staff', 'staff')->name('staff');

//Get library resources
Route::get('/library', [ResourceController::class,'show'])->name('library');

//Get research resources
Route::get('/research', [ResearchController::class,'show'])->name('research');

//Show privacypolicy
Route::view('/privacypolicy', 'privacypolicy')->name('privacypolicy');

//Show cookies
Route::view('/cookies', 'cookies')->name('cookies');

//Show registration form
Route::get('/register', [UserController::class,'create'])->name('register');

// Create a new user
Route::post('/user', [UserController::class,'store'])->name('user');

//Show login form
Route::get('/login', [UserController::class, 'login'])->name('login');

//Authenticate user
Route::post('/user/authenticate', [UserController::class, 'authenticate'])->name('authenticate');

//Log user out
Route::post('/logout', [UserController::class,'logout'])->name('logout');

Route::middleware(['admin'])->group(function () {
    //Go to content dashboard page
    Route::get('/content', [AdminController::class,'content'])->name('content');
    
    // Got to content edit page
    Route::get('/content/edit/{article}', [AdminController::class,'edit'])->name('edit');

    Route::get('/statistics', [AdminController::class, 'stats'])->name('dashboard');
    
    Route::get('/pages', [AdminController::class, 'pages'])->name('pages');
    
    //Create temporal article image
    Route::post('/content/image', [ArticleController::class,'upload'])->name('upload');

    //Create article
    Route::post('/content/write', [ArticleController::class,'write'])->name('write')->middleware('writer');
    
    // Edit article
    Route::post('/content/edit', [ArticleController::class,'update'])->name('update')->middleware('writer');

    // Delete article
    Route::get('/content/delete/{article}', [ArticleController::class,'delete'])->name('delete')->middleware('writer');

    // Publish article
    Route::get('/content/publish/{article}', [ArticleController::class,'publish'])->name('delete')->middleware('writer');
});

// Display temporal images
Route::get('/temp_images/{filename}', function($filename){
    $path = 'temp_images/'.$filename;
    if (Storage::disk('local')->exists($path)) {
        $file = Storage::get($path);
        $type = Storage::mimeType($path);
        return response($file)->header('Content-Type', $type); 
    } else {
        abort(404);
    }
})->name('temp-images.show');