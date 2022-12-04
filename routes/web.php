<?php

use App\Http\Controllers\UserProfileController;
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
    return view('timetable');
});

Route::get('/user/{id}/{name}', function ($id, $name) {
    return 'ID: ' . $id . 'Name: ' . $name;
});

//Route::get(
//    '/user/profile',
//    [UserProfileController::class, 'index']
//)->name('profile');


Route::get('/user/{id}/{name}', [App\Http\Controllers\UserProfileController::class, 'index'])->name('profile');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


$groupData = [
    'namespace' => 'App\Http\Controllers',
    'prefix' => '/user/{id}/{name}/timetable',
];

Route::group($groupData, function () {
    $methods = ['index', 'edit', 'update', 'create', 'store',];
    Route::resource('addblock', 'UserProfileController')
        ->only($methods)
        ->names('users');
});
