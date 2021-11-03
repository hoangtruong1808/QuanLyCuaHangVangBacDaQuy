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

Route::get('/danh-sach-khach-hang', function () {
    return view('quanlykhachhang.danhsachkhachhang');
});

Route::get('/them-nha-cung-cap', function () {
    return view('quanlynhacungcap.themnhacungcap');
});

Route::get('/danh-sach-nha-cung-cap', function () {
    return view('quanlynhacungcap.danhsachnhacungcap');
});

Route::get('/them-nhan-vien', function () {
    return view('quanlynhanvien.themnhanvien');
});

Route::get('/danh-sach-nhan-vien', function () {
    return view('quanlynhanvien.danhsachnhanvien');
});

Route::get('/them-san-pham', function () {
    return view('quanlysanpham.themsanpham');
});

Route::get('/danh-sach-san-pham', function () {
    return view('quanlysanpham.danhsachsanpham');
});

Route::get('/lap-phieu-mua-hang', function () {
    return view('quanlynhacungcap.danhsachnhacungcap');
});


