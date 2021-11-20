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
//Khách hàng
Route::get('/them-khach-hang', function () {
    return view('quanlykhachhang.themkhachhang');
});
Route::post('/luu-khach-hang', 'KhachHangController@LuuKhachHang')->name('LuuKhachHang');
Route::get('/danh-sach-khach-hang', 'KhachHangController@DanhSachKhachHang')->name('DanhSachKhachHang');
Route::post('/xoa-khach-hang/{id}', 'KhachHangController@XoaKhachHang')->name('XoaKhachHang');
Route::get('/sua-khach-hang/{id}', 'KhachHangController@SuaKhachHang')->name('SuaKhachHang');
Route::get('/chi-tiet-khach-hang/{id}', 'KhachHangController@ChiTietKhachHang')->name('ChiTietKhachHang');
Route::post('/cap-nhat-khach-hang/{id}', 'KhachHangController@CapNhatKhachHang')->name('CapNhatKhachHang');

//Nhà cung cấp
Route::get('/them-nha-cung-cap', function () {
    return view('quanlynhacungcap.themnhacungcap');
});
Route::post('/luu-nha-cung-cap', 'NhaCungCapController@LuuNhaCungCap')->name('LuuNhaCungCap');
Route::get('/danh-sach-nha-cung-cap', 'NhaCungCapController@DanhSachNhaCungCap')->name('DanhSachNhaCungCap');
Route::post('/xoa-nha-cung-cap/{id}', 'NhaCungCapController@XoaNhaCungCap')->name('XoaNhaCungCap');
Route::get('/sua-nha-cung-cap/{id}', 'NhaCungCapController@SuaNhaCungCap')->name('SuaNhaCungCap');
Route::get('/chi-tiet-nha-cung-cap{id}', 'NhaCungCapController@ChiTietNhaCungCap')->name('ChiTietNhaCungCap');
Route::post('/cap-nhat-nha-cung-cap/{id}', 'NhaCungCapController@CapNhatNhaCungCap')->name('CapNhatNhaCungCap');

//Nhân Viên
Route::get('/them-nhan-vien', function () {
    return view('quanlynhanvien.themnhanvien');
});
Route::post('/luu-nhan-vien', 'NhanVienController@LuuNhanVien')->name('LuuNhanVien');
Route::get('/danh-sach-nhan-vien', 'NhanVienController@DanhSachNhanVien')->name('DanhSachNhanVien');
Route::post('/xoa-nhan-vien/{id}', 'NhanVienController@XoaNhanVien')->name('XoaNhanVien');
Route::get('/sua-nhan-vien/{id}', 'NhanVienController@SuaNhanVien')->name('SuaNhanVien');
Route::post('/cap-nhat-nhan-vien/{id}', 'NhanVienController@CapNhatNhanVien')->name('CapNhatNhanVien');
Route::get('/chi-tiet-nhan-vien/{id}', 'NhanVienController@ChiTietNhanVien')->name('ChiTietNhanVien');
Route::get('/diem-danh-nhan-vien', 'NhanVienController@DiemDanhNhanVien')->name('DiemDanhNhanVien');
Route::post('/luu-diem-danh/{id}', 'NhanVienController@LuuDiemDanh')->name('LuuDiemDanh');
//Tỷ giá sản phẩm
Route::get('/them-danh-muc', function () {
    return view('quanlydanhmuc.themdanhmuc');
});
Route::post('/luu-danh-muc', 'DanhMucController@LuuDanhMuc')->name('LuuDanhMuc');
Route::get('/danh-sach-danh-muc', 'DanhMucController@DanhSachDanhMuc')->name('DanhSachDanhMuc');
Route::post('/xoa-danh-muc/{id}', 'DanhMucController@XoaDanhMuc')->name('XoaDanhMuc');
Route::get('/sua-danh-muc/{id}', 'DanhMucController@SuaDanhMuc')->name('SuaDanhMuc');
Route::post('/cap-nhat-danh-muc/{id}', 'DanhMucController@CapNhatDanhMuc')->name('CapNhatDanhMuc');
Route::get('/lich-su-bien-dong-gia/{id}', 'DanhMucController@LichSuBienDongGia')->name('LichSuBienDongGia');


//Sản phẩm
Route::get('/them-san-pham', function () {
    return view('quanlysanpham.themsanpham');
});
Route::post('/luu-san-pham', 'SanPhamController@LuuSanPham')->name('LuuSanPham');
Route::get('/danh-sach-san-pham', 'SanPhamController@DanhSachSanPham')->name('DanhSachSanPham');
Route::post('/xoa-san-pham/{id}', 'SanPhamController@XoaSanPham')->name('XoaSanPham');
Route::get('/sua-san-pham/{id}', 'SanPhamController@SuaSanPham')->name('SuaSanPham');
Route::post('/cap-nhat-san-pham/{id}', 'SanPhamController@CapNhatSanPham')->name('CapNhatSanPham');

Route::get('/lap-phieu-mua-hang', function () {
    return view('quanlynhacungcap.danhsachnhacungcap');
});
//login
Route::get('/dang-nhap', 'LoginController@Login');

//Phiếu mua hàng
Route::get('/lap-phieu-mua-hang', 'PhieuMuaHangController@LapPhieuMuaHang')->name('LapPhieuMuaHang');
Route::post('/luu-phieu-mua-hang', 'PhieuMuaHangController@LuuPhieuMuaHang')->name('LuuPhieuMuaHang');
Route::get('/in-phieu-mua-hang/{id}', 'PhieuMuaHangController@InPhieuMuaHang')->name('InPhieuMuaHang');
