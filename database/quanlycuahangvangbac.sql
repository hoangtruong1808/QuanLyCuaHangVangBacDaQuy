-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2021 at 09:56 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quanlycuahangvangbacdaquy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietphieubanhang`
--

CREATE TABLE `tbl_chitietphieubanhang` (
  `ID` int(11) NOT NULL,
  `MaSanPham` varchar(11) NOT NULL,
  `PhieuBanHangID` int(11) DEFAULT NULL,
  `SanPhamID` int(11) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `DonGia` int(11) DEFAULT NULL,
  `ThanhTien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chitietphieubanhang`
--

INSERT INTO `tbl_chitietphieubanhang` (`ID`, `MaSanPham`, `PhieuBanHangID`, `SanPhamID`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
(1, '0', 1, 9, 1, 4, 5),
(2, '0', 1, 9, 6, 2, 4),
(3, '0', 2, 9, 1, 1, 1),
(4, '0', 2, 9, 2, 2, 2),
(5, '0', 3, 9, 1, 1, 1),
(6, '0', 3, 9, 2, 2, 2),
(7, '0', 4, 9, 1, 1, 1),
(8, '0', 4, 9, 2, 2, 2),
(9, '0', 5, 9, 1, 1, 1),
(10, '0', 5, 9, 2, 2, 2),
(11, '0', 6, 9, 3, 4, 5),
(12, '0', 6, 9, 1, 2, 4),
(13, '0', 7, 9, 1, 2, 3),
(14, '0', 8, 9, 1, 2, 3),
(15, '0', 9, 7, 1, 2, 3),
(16, '0', 9, 9, 4, 5, 6),
(17, '0', 10, 9, 4, 4, 1),
(18, '0', 10, 9, 5, 5, 1),
(19, 'V-SJC1', 12, 9, 3, 5000, 10000),
(20, 'V-PNJ2', 12, 9, 5, 1111, 111111),
(21, 'V-PNJ1', 13, 7, 1, 2, 3),
(22, 'V-SJC1', 13, 9, 4, 5, 6),
(23, 'V-PNJ2', 14, 9, 4, 5, 6),
(24, 'V-PNJ2', 14, 9, 1, 2, 3),
(25, 'V-PNJ2', 15, 9, 4, 5, 6),
(26, 'V-PNJ2', 15, 9, 1, 2, 3),
(27, 'V-SJC2', 16, 9, 1000, 10000, 133),
(28, 'V-SJC2', 16, 9, 1313, 131, 133131),
(29, 'V-PNJ3', 17, 9, 100, 19099, 10000),
(30, 'V-SJC3', 17, 9, 10000, 31, 313131),
(31, 'V-PNJ4', 19, 7, 2, 3, 4),
(32, 'V-PNJ4', 19, 7, 4, 5, 6),
(33, 'V-SJC4', 20, 9, 2, 2, 1000),
(34, 'V-SJC4', 21, 9, 2, 2, 1000),
(35, 'V-SJC4', 22, 9, 2, 2, 1000),
(36, 'V-SJC6', 23, 9, 2, 2, 10000000),
(37, 'V-SJC6', 24, 9, 2, 2, 10000000),
(38, 'V-SJC5', 25, 9, 4, 100000000, 10000000),
(39, 'V-PNJ5', 26, 7, 1, 1, 1),
(40, 'V-PNJ5', 26, 9, 3, 4, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietphieumuahang`
--

CREATE TABLE `tbl_chitietphieumuahang` (
  `ID` int(11) NOT NULL,
  `PhieuMuaHangID` int(11) NOT NULL,
  `SanPhamID` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `PhanTram` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chitietphieumuahang`
--

INSERT INTO `tbl_chitietphieumuahang` (`ID`, `PhieuMuaHangID`, `SanPhamID`, `SoLuong`, `DonGia`, `PhanTram`, `ThanhTien`) VALUES
(41, 36, 7, 1, 1111, 1, 111111),
(42, 36, 9, 1, 1111, 1, 11111),
(43, 37, 7, 3, 5, 134, 1),
(44, 37, 9, 4, 5, 14, 412412),
(45, 38, 7, 2, 3, 4, 5),
(46, 38, 9, 1, 5, 6, 7),
(47, 39, 9, 3, 4, 5, 6),
(48, 39, 9, 5, 1, 5, 6),
(49, 40, 7, 1, 2, 3, 4),
(50, 41, 7, 1, 2, 3, 4),
(51, 41, 9, 5, 6, 7, 8),
(52, 42, 7, 1, 2, 3, 4),
(53, 42, 9, 5, 6, 7, 8),
(54, 43, 7, 2, 2, 2, 5000),
(55, 44, 7, 1, 1, 1, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chitietphieunhaphang`
--

CREATE TABLE `tbl_chitietphieunhaphang` (
  `ID` int(11) NOT NULL,
  `PhieuNhapHangID` int(11) NOT NULL,
  `SanPhamID` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` int(11) NOT NULL,
  `ThanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_chitietphieunhaphang`
--

INSERT INTO `tbl_chitietphieunhaphang` (`ID`, `PhieuNhapHangID`, `SanPhamID`, `SoLuong`, `DonGia`, `ThanhTien`) VALUES
(1, 2, 7, 1, 2, 3),
(2, 2, 9, 4, 5, 6),
(3, 3, 7, 1, 2, 3),
(4, 3, 9, 4, 5, 6),
(5, 4, 7, 1, 2, 3),
(6, 4, 9, 4, 5, 6),
(7, 5, 7, 1, 2, 3),
(8, 5, 9, 3, 4, 5),
(9, 6, 7, 1, 2, 3),
(10, 6, 9, 4, 5, 6),
(11, 7, 7, 1, 2, 3),
(12, 7, 9, 4, 5, 6),
(13, 8, 7, 1, 2, 3),
(14, 8, 9, 4, 5, 6),
(15, 9, 7, 1, 2, 3),
(16, 9, 9, 4, 5, 6),
(17, 10, 7, 1, 2, 3),
(18, 10, 9, 4, 5, 6),
(19, 11, 7, 2, 5000, 10000),
(20, 12, 7, 2, 5000, 10000),
(21, 12, 9, 2, 5000, 10000),
(22, 13, 7, 2, 5000, 10000),
(23, 13, 9, 2, 5000, 10000),
(24, 14, 9, 4, 1, 5),
(25, 14, 9, 4, 5, 1),
(26, 15, 7, 1, 1, 1),
(27, 16, 7, 1, 1, 2000000),
(28, 16, 9, 1, 1, 5000000),
(29, 17, 7, 1, 1, 3),
(30, 17, 9, 3, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmucsanpham`
--

CREATE TABLE `tbl_danhmucsanpham` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `Loai` varchar(255) NOT NULL,
  `MaVach` varchar(10) NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `TinhTrang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_danhmucsanpham`
--

INSERT INTO `tbl_danhmucsanpham` (`ID`, `Ten`, `Loai`, `MaVach`, `GiaNhap`, `GiaBan`, `TinhTrang`) VALUES
(7, 'Vàng PNJ', 'Vàng', 'V-PNJ', 5510000, 5210000, '1'),
(9, 'Phú Qúy SJC', 'Vàng', 'V-SJC', 6021100, 6087100, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_diemdanh`
--

CREATE TABLE `tbl_diemdanh` (
  `ID` int(11) NOT NULL,
  `NhanvienID` int(11) NOT NULL,
  `CaSang` int(11) DEFAULT NULL,
  `CaChieu` int(11) DEFAULT NULL,
  `CaToi` int(11) DEFAULT NULL,
  `Ngay` date NOT NULL,
  `Thang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_diemdanh`
--

INSERT INTO `tbl_diemdanh` (`ID`, `NhanvienID`, `CaSang`, `CaChieu`, `CaToi`, `Ngay`, `Thang`) VALUES
(18, 2, 1, 1, 0, '2021-11-16', 11),
(19, 9, 0, 1, 0, '2021-11-16', 11),
(20, 10, 1, 1, 1, '2021-11-16', 11),
(21, 2, 1, 0, 1, '2021-11-17', 11),
(22, 9, 0, 1, 0, '2021-11-17', 11),
(23, 10, 1, 0, 0, '2021-11-17', 11),
(24, 2, 1, 1, 0, '2021-11-22', 11),
(25, 9, 0, 1, 1, '2021-11-22', 11),
(26, 10, 1, 1, 1, '2021-11-22', 11),
(27, 2, 1, 1, 0, '2021-11-24', 11),
(28, 9, 0, 1, 1, '2021-11-24', 11),
(29, 10, 1, 1, 1, '2021-11-24', 11),
(30, 2, 0, 0, 0, '2021-11-29', 11),
(31, 9, 0, 0, 0, '2021-11-29', 11),
(32, 10, 0, 0, 0, '2021-11-29', 11),
(33, 2, 1, 1, 1, '2021-11-30', 11),
(34, 9, 0, 1, 1, '2021-11-30', 11),
(35, 10, 1, 1, 1, '2021-11-30', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `ID` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `CMND` varchar(20) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` varchar(10) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `DienThoai` varchar(20) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`ID`, `HoTen`, `CMND`, `NgaySinh`, `GioiTinh`, `DiaChi`, `DienThoai`, `AnhDaiDien`, `GhiChu`) VALUES
(13, 'Nguyễn Văn A', '1234567', '2021-11-06', 'Nam', 'Hà Nội', '123456', '11022_978151248868739_7317126062981206639_n - Copy.jpg', NULL),
(14, 'Nguyễn Văn B', '123131', '2021-11-11', 'Nữ', 'Chung cư Prosper Plaza, 22/14 Phan Văn Hớn, Phường Tân Thới Nhất, Quận 12', '0388783394', '44639219_2068145903236393_4957032652092735488_n - Copy.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_luong`
--

CREATE TABLE `tbl_luong` (
  `ID` int(11) NOT NULL,
  `NhanvienID` int(11) NOT NULL,
  `SoCa` int(11) NOT NULL,
  `Thang` int(11) NOT NULL,
  `TongLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_luong`
--

INSERT INTO `tbl_luong` (`ID`, `NhanvienID`, `SoCa`, `Thang`, `TongLuong`) VALUES
(6, 2, 11, 11, 1320000),
(7, 9, 8, 11, 960000),
(8, 10, 13, 11, 2080000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `DienThoai` varchar(50) NOT NULL,
  `Gmail` varchar(255) NOT NULL,
  `GhiChu` text DEFAULT NULL,
  `TrangThai` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nhacungcap`
--

INSERT INTO `tbl_nhacungcap` (`ID`, `Ten`, `AnhDaiDien`, `DienThoai`, `Gmail`, `GhiChu`, `TrangThai`) VALUES
(5, 'Tập đoàn Vàng bạc đá quý DOJI', 'doji.jpg', '123456', 'doji@gmail.com', NULL, 1),
(7, 'Tập đoàn vàng bạc đá quý PNJ', 'Acer_Wallpaper_01_5000x2814.jpg', '12345', 'pnj@gmail.com', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `ID` int(11) NOT NULL,
  `HoTen` varchar(255) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `CMND` varchar(255) NOT NULL,
  `ChucVu` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `DienThoai` varchar(255) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `GhiChu` text DEFAULT NULL,
  `TrangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_nhanvien`
--

INSERT INTO `tbl_nhanvien` (`ID`, `HoTen`, `TaiKhoan`, `MatKhau`, `CMND`, `ChucVu`, `DiaChi`, `DienThoai`, `AnhDaiDien`, `GhiChu`, `TrangThai`) VALUES
(2, 'Nguyễn Hoàng Trường', 'hoangtruong1808', '$2y$10$dLdlGUb1l1cb1.FwDVdQee0psqR0dMvfQ/lOviIC5y9dWuYdKCe1.', '123131', 'Nhân viên', '25B Tô Vĩnh Diện, TP.Pleiku, Gia Lai', '0388783394', '11022_978151248868739_7317126062981206639_n - Copy.jpg', NULL, 1),
(9, 'Lâm Trường', 'lamtruong', '$2y$10$eJPchXfH.qEuGobHmYsKBu6TrEPivdpTlz.MuBKqi6Br.7oN0h8H.', '123456', 'Nhân viên', 'TP.HCM', '123456', '2016 - Tet.jpg', NULL, 1),
(10, 'Nguyễn Tiến Hoàng', 'nguyentienhoang', '$2y$10$m8CzbwBzWXJL8tm3GwjWv.xgdYQm0M0E7YthPojJraXkikMxU/9Q2', '123456', 'Quản lý', 'Bình Phước', '123456', '2020-Tet.2.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phieubamhang`
--

CREATE TABLE `tbl_phieubamhang` (
  `ID` int(11) NOT NULL,
  `KhachHangID` int(11) NOT NULL,
  `NhanVienID` int(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL DEFAULT current_timestamp(),
  `TongGiaTri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phieubamhang`
--

INSERT INTO `tbl_phieubamhang` (`ID`, `KhachHangID`, `NhanVienID`, `NgayLapPhieu`, `TongGiaTri`) VALUES
(1, 14, 9, '2021-11-23', 9),
(2, 13, 9, '2021-11-23', 3),
(3, 13, 9, '2021-11-23', 3),
(4, 13, 9, '2021-11-23', 3),
(5, 13, 9, '2021-11-23', 3),
(6, 13, 10, '2021-11-23', 9),
(7, 13, 9, '2021-11-23', 3),
(8, 13, 9, '2021-11-23', 3),
(9, 13, 9, '2021-11-23', 9),
(10, 14, 9, '2021-11-24', 2),
(11, 13, 10, '2021-11-24', 121111),
(12, 13, 10, '2021-11-24', 121111),
(13, 13, 10, '2021-11-24', 9),
(14, 13, 9, '2021-11-29', 9),
(15, 13, 9, '2021-11-29', 9),
(16, 14, 9, '2021-11-29', 133264),
(17, 14, 9, '2021-11-29', 323131),
(18, 13, 9, '2021-11-29', 10),
(19, 13, 9, '2021-11-29', 10),
(20, 14, 9, '2021-11-29', 1000),
(21, 14, 9, '2021-11-29', 1000),
(22, 14, 9, '2021-11-29', 1000),
(23, 14, 2, '2021-11-29', 10000000),
(24, 14, 2, '2021-11-29', 10000000),
(25, 14, 9, '2021-11-30', 10000000),
(26, 13, 9, '2021-12-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phieumuahang`
--

CREATE TABLE `tbl_phieumuahang` (
  `ID` int(11) NOT NULL,
  `KhachHangID` int(11) NOT NULL,
  `NhanVienID` int(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL DEFAULT current_timestamp(),
  `TongGiaTri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phieumuahang`
--

INSERT INTO `tbl_phieumuahang` (`ID`, `KhachHangID`, `NhanVienID`, `NgayLapPhieu`, `TongGiaTri`) VALUES
(36, 13, 9, '2021-11-17', 122222),
(37, 13, 9, '2021-11-22', 412413),
(38, 14, 10, '2021-11-23', 12),
(39, 13, 10, '2021-11-23', 12),
(40, 13, 9, '2021-11-24', 12),
(41, 13, 9, '2021-11-24', 12),
(42, 13, 9, '2021-11-24', 12),
(43, 13, 9, '2021-11-29', 5000),
(44, 13, 2, '2021-11-29', 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_phieunhaphang`
--

CREATE TABLE `tbl_phieunhaphang` (
  `ID` int(11) NOT NULL,
  `NhaCungCapID` int(11) NOT NULL,
  `NhanVienID` int(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL DEFAULT current_timestamp(),
  `TongGiaTri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_phieunhaphang`
--

INSERT INTO `tbl_phieunhaphang` (`ID`, `NhaCungCapID`, `NhanVienID`, `NgayLapPhieu`, `TongGiaTri`) VALUES
(1, 13, 10, '2021-11-23', 9),
(2, 13, 10, '2021-11-23', 9),
(3, 6, 2, '2021-11-23', 9),
(4, 6, 2, '2021-11-23', 9),
(5, 5, 9, '2021-11-23', 8),
(6, 5, 9, '2021-11-23', 9),
(7, 5, 9, '2021-11-23', 9),
(8, 6, 9, '2021-11-23', 9),
(9, 5, 9, '2021-11-23', 9),
(10, 5, 9, '2021-11-23', 9),
(11, 5, 9, '2021-11-24', 20000),
(12, 5, 9, '2021-11-24', 20000),
(13, 5, 9, '2021-11-24', 20000),
(14, 5, 9, '2021-11-29', 6),
(15, 5, 9, '2021-11-29', 1),
(16, 5, 2, '2021-11-29', 7000000),
(17, 5, 9, '2021-11-30', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `ID` int(11) NOT NULL,
  `MaVach` varchar(10) NOT NULL,
  `SoLuong` float NOT NULL,
  `Loai` int(11) NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `GiaTri` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL,
  `PhieuNhapHangID` int(11) DEFAULT NULL,
  `PhieuMuaHangID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`ID`, `MaVach`, `SoLuong`, `Loai`, `GiaNhap`, `GiaBan`, `GiaTri`, `TinhTrang`, `PhieuNhapHangID`, `PhieuMuaHangID`) VALUES
(1, 'V-PNJ1', 0, 7, 10000, 5210000, 0, 1, 12, NULL),
(2, 'V-SJC1', 0, 9, 10000, 6087100, 0, 0, 12, NULL),
(3, 'V-PNJ2', 0, 7, 10000, 5210000, 0, 0, 13, NULL),
(4, 'V-SJC2', 0, 9, 10000, 6087100, 0, 0, 13, NULL),
(5, 'V-PNJ3', 1, 7, 4, 5210000, 3, 0, NULL, 41),
(6, 'V-SJC3', 5, 9, 8, 6087100, 7, 0, NULL, 41),
(7, 'V-PNJ4', 1, 7, 4, 5210000, 3, 0, NULL, 42),
(8, 'V-SJC4', 5, 9, 8, 6087100, 7, 0, NULL, 42),
(9, 'V-SJC5', 4, 9, 5, 6087100, 100, 0, 14, NULL),
(10, 'V-SJC6', 4, 9, 1, 6087100, 100, 0, 14, NULL),
(11, 'V-PNJ5', 2, 7, 5000, 104200, 2, 0, NULL, 43),
(12, 'V-PNJ6', 1, 7, 1, 5210000, 100, 1, 15, NULL),
(13, 'V-PNJ7', 1, 7, 1000000, 52100, 1, 1, NULL, 44),
(14, 'V-PNJ8', 1, 7, 2000000, 5210000, 100, 1, 16, NULL),
(15, 'V-SJC7', 1, 9, 5000000, 6087100, 100, 1, 16, NULL),
(16, 'V-PNJ9', 1, 7, 3, 5210000, 100, 1, 17, NULL),
(17, 'V-SJC8', 3, 9, 1, 6087100, 100, 1, 17, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tonquy`
--

CREATE TABLE `tbl_tonquy` (
  `ID` int(11) NOT NULL,
  `Ngay` date NOT NULL DEFAULT current_timestamp(),
  `Thang` varchar(11) NOT NULL,
  `Thu` int(11) NOT NULL,
  `Chi` int(11) NOT NULL,
  `TonDauNgay` int(11) NOT NULL,
  `TonCuoiNgay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_tonquy`
--

INSERT INTO `tbl_tonquy` (`ID`, `Ngay`, `Thang`, `Thu`, `Chi`, `TonDauNgay`, `TonCuoiNgay`) VALUES
(1, '2021-11-28', '11-2021', 0, 0, 1000, 5000),
(4, '2021-11-29', '11-2021', 20000000, 8000000, 5000, 12005000),
(6, '2021-11-30', '11-2021', 0, 4, 12005000, 12004996),
(7, '2021-12-01', '12-2021', 6, 0, 12004996, 12005002);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tygiasanpham`
--

CREATE TABLE `tbl_tygiasanpham` (
  `ID` int(11) NOT NULL,
  `DanhmucID` int(11) NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `NgayCapNhat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_chitietphieubanhang`
--
ALTER TABLE `tbl_chitietphieubanhang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_chitietphieumuahang`
--
ALTER TABLE `tbl_chitietphieumuahang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PhieuMuaHangID` (`PhieuMuaHangID`),
  ADD KEY `SanPhamID` (`SanPhamID`);

--
-- Indexes for table `tbl_chitietphieunhaphang`
--
ALTER TABLE `tbl_chitietphieunhaphang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_diemdanh`
--
ALTER TABLE `tbl_diemdanh`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NhanvienID` (`NhanvienID`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_luong`
--
ALTER TABLE `tbl_luong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NhanvienID` (`NhanvienID`);

--
-- Indexes for table `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_phieubamhang`
--
ALTER TABLE `tbl_phieubamhang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_phieumuahang`
--
ALTER TABLE `tbl_phieumuahang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KhachHangID` (`KhachHangID`),
  ADD KEY `NhanVienID` (`NhanVienID`);

--
-- Indexes for table `tbl_phieunhaphang`
--
ALTER TABLE `tbl_phieunhaphang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Loai` (`Loai`);

--
-- Indexes for table `tbl_tonquy`
--
ALTER TABLE `tbl_tonquy`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_tygiasanpham`
--
ALTER TABLE `tbl_tygiasanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DanhmucID` (`DanhmucID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_chitietphieubanhang`
--
ALTER TABLE `tbl_chitietphieubanhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_chitietphieumuahang`
--
ALTER TABLE `tbl_chitietphieumuahang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_chitietphieunhaphang`
--
ALTER TABLE `tbl_chitietphieunhaphang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_diemdanh`
--
ALTER TABLE `tbl_diemdanh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_luong`
--
ALTER TABLE `tbl_luong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_phieubamhang`
--
ALTER TABLE `tbl_phieubamhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_phieumuahang`
--
ALTER TABLE `tbl_phieumuahang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_phieunhaphang`
--
ALTER TABLE `tbl_phieunhaphang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_tonquy`
--
ALTER TABLE `tbl_tonquy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_tygiasanpham`
--
ALTER TABLE `tbl_tygiasanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_chitietphieumuahang`
--
ALTER TABLE `tbl_chitietphieumuahang`
  ADD CONSTRAINT `tbl_chitietphieumuahang_ibfk_1` FOREIGN KEY (`PhieuMuaHangID`) REFERENCES `tbl_phieumuahang` (`ID`),
  ADD CONSTRAINT `tbl_chitietphieumuahang_ibfk_2` FOREIGN KEY (`SanPhamID`) REFERENCES `tbl_danhmucsanpham` (`ID`);

--
-- Constraints for table `tbl_diemdanh`
--
ALTER TABLE `tbl_diemdanh`
  ADD CONSTRAINT `tbl_diemdanh_ibfk_1` FOREIGN KEY (`NhanvienID`) REFERENCES `tbl_nhanvien` (`ID`);

--
-- Constraints for table `tbl_luong`
--
ALTER TABLE `tbl_luong`
  ADD CONSTRAINT `tbl_luong_ibfk_1` FOREIGN KEY (`NhanvienID`) REFERENCES `tbl_nhanvien` (`ID`);

--
-- Constraints for table `tbl_phieumuahang`
--
ALTER TABLE `tbl_phieumuahang`
  ADD CONSTRAINT `tbl_phieumuahang_ibfk_1` FOREIGN KEY (`KhachHangID`) REFERENCES `tbl_khachhang` (`ID`),
  ADD CONSTRAINT `tbl_phieumuahang_ibfk_2` FOREIGN KEY (`NhanVienID`) REFERENCES `tbl_nhanvien` (`ID`);

--
-- Constraints for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD CONSTRAINT `tbl_sanpham_ibfk_1` FOREIGN KEY (`Loai`) REFERENCES `tbl_danhmucsanpham` (`ID`);

--
-- Constraints for table `tbl_tygiasanpham`
--
ALTER TABLE `tbl_tygiasanpham`
  ADD CONSTRAINT `tbl_tygiasanpham_ibfk_1` FOREIGN KEY (`DanhmucID`) REFERENCES `tbl_danhmucsanpham` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
