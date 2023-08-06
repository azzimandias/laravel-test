<?php

use Illuminate\Support\Facades\Route;


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
use App\Http\Controllers\PostsController;
Route::get('/posts', [PostsController::class, 'index']);
Route::get('/posts/create', [PostsController::class, 'create']);
Route::get('/posts/update', [PostsController::class, 'update']);
Route::get('/posts/delete', [PostsController::class, 'delete']);
Route::get('/posts/first_or_ctreate', [PostsController::class, 'firstOrCreate']);
Route::get('/posts/update_or_ctreate', [PostsController::class, 'updateOrCreate']);