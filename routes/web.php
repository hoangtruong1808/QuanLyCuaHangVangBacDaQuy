<?php

use Illuminate\Support\Facades\Route;
use Svg\Tag\Group;
use App\Events\MessagePosted;


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

// Frontend
Route::get('/', function () {
    return view('home.dashboard');
});

Route::get('/home', function () {
    return view('home.dashboard');
});

Route::get('/them-khach-hang', function () {
    return view('quanlykhachhang.themkhachhang');
});

Route::get('/xoa-khach-hang', function () {
    return view('quanlykhachhang.xoakhachhang');
});


