<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SenderController;
use App\Http\Controllers\RecipientController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [AdminController::class, 'Login'])->name('login');
Route::post('/', [AdminController::class, 'Login'])->name('login');
Route::get('/register', [AdminController::class, 'Register'])->name('register');
Route::post('/register', [AdminController::class, 'Register'])->name('register');
Route::get('/dashboard', [AdminController::class, 'Home'])->name('admin');

//Sender
Route::get('sender/add', [SenderController::class, 'Add'])->name('addsender');
Route::post('sender/add', [SenderController::class, 'Add'])->name('addsender');
Route::get('sender/list', [SenderController::class, 'List'])->name('listsender');
Route::get('sender/delete/{id}', [SenderController::class, 'Delete'])->name('deletesender');
Route::get('sender/edit/{id}', [SenderController::class, 'Edit'])->name('editsender');
Route::post('sender/edit/{id}', [SenderController::class, 'Edit'])->name('editsender');

//Recipienist 
Route::get('recipienst/add', [RecipientController::class, 'Add'])->name('addrecipienst');
Route::post('recipienst/add', [RecipientController::class, 'Add'])->name('addrecipienst');
Route::get('recipienst/list', [RecipientController::class, 'List'])->name('listrecipienst');
Route::get('recipienst/delete/{id}', [RecipientController::class, 'Delete'])->name('deleterecipienst');
Route::get('recipienst/edit/{id}', [RecipientController::class, 'Edit'])->name('editrecipienst');
Route::post('recipienst/edit/{id}', [RecipientController::class, 'Edit'])->name('editrecipienst');
