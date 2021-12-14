-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2021 at 11:31 AM
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
(1, 'SJC1', 1, 1, 1, 1000000, 1000000),
(2, 'SJC2', 1, 2, 1, 1000000, 1000000),
(3, 'SJC3', 2, 3, 1000, 5000, 1000000),
(4, 'SJC3', 2, 3, 1000, 5000, 1000000);

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
(1, 1, 2, 3, 5000000, 80, 13000000),
(2, 1, 2, 3, 5000000, 80, 13000000);

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
(1, 2, 1, 3, 5000000, 15000000),
(2, 2, 2, 3, 200000, 6000000),
(3, 4, 2, 1, 5000000, 5000000),
(4, 4, 2, 1, 5000000, 5000000),
(5, 4, 2, 1, 5000000, 5000000),
(6, 4, 4, 1, 5000000, 5000000);

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
(1, 'PNJ', 'Vàng', 'PNJ', 5171000, 5251000, '1'),
(2, 'SJC', 'Vàng', 'SJC', 6100000, 6170000, '1'),
(3, 'Vàng SBJ', 'Vàng', 'VSBJ', 5000000, 5005000, '1'),
(4, 'Bạc Doji', 'Bạc', 'BDOJI', 3000000, 3000000, '1');

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
(1, 2, 1, 1, 0, '2021-12-14', 12),
(2, 3, 1, 1, 1, '2021-12-14', 12),
(3, 4, 0, 1, 1, '2021-12-14', 12);

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
(1, 'Nguyễn Văn A', '123456789', '1999-12-02', 'Nam', 'Thành phố Hồ Chí Minh', '123456789', 'Acer_Wallpaper_01_5000x2814.jpg', NULL),
(2, 'Nguyễn Tuấn', '123456789', '1999-12-02', 'Nữ', 'Thành phố Hồ Chí Minh', '12345', 'Acer_Wallpaper_01_5000x2814.jpg', NULL),
(3, 'Trần Thành', '1234567', '1999-12-02', 'Nữ', 'Thành phố Hồ Chí Minh', '12345', 'Acer_Wallpaper_01_5000x2814.jpg', NULL),
(4, 'Lê Hoàng', '12345678', '1999-12-02', 'Nam', 'Thành phố Hồ Chí Minh', '12345', 'Acer_Wallpaper_01_5000x2814.jpg', NULL),
(5, 'Trần Thư', '1234567899', '2021-12-16', 'Nữ', 'Thành phố Hồ Chí Minh', '12345', 'Acer_Wallpaper_01_5000x2814.jpg', NULL);

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
(1, 2, 2, 12, 320000),
(2, 3, 3, 12, 360000),
(3, 4, 2, 12, 320000);

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
(1, 'Tập đoàn Vàng bạc đá quý DOJI', 'Acer_Wallpaper_01_5000x2814.jpg', '12345', 'doji@gmail.com', NULL, 1),
(2, 'Công ty cổ phần Vàng bạc đá quý Phú Nhuận (PNJ)', 'Acer_Wallpaper_01_5000x2814.jpg', '12345', 'pnj@gmail.com', NULL, 1),
(3, 'Công ty TNHH MTV Vàng bạc đá quý Sài Gòn (SJC)', 'Acer_Wallpaper_01_5000x2814.jpg', '12345', 'sjc@gmail.com', NULL, 1),
(4, 'Công ty Vàng bạc đá quý Sacombank (SBJ)', 'Acer_Wallpaper_01_5000x2814.jpg', '12345', 'cbj@gmail.com', NULL, 1),
(5, 'Công ty Vàng bạc Đá quý Bảo Tín Minh Châu', 'Acer_Wallpaper_01_5000x2814.jpg', '1235', 'minhchau@gmail.com', NULL, 1);

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
(1, 'admin', 'admin', 'admin', 'admin', 'Admin', 'admin', 'admin', 'admin', 'admin', 0),
(2, 'Nguyễn Hoàng Trường', 'hoangtruong', '123', '12345678', 'Quản lý', 'Thành phố Hồ Chí Minh', '12345', 'Acer_Wallpaper_01_5000x2814.jpg', NULL, 1),
(3, 'Lâm Trường', 'lamtruong', '123', '12345678', 'Nhân viên', 'Thành phố Hồ Chí Minh', '12345', 'Acer_Wallpaper_01_5000x2814.jpg', NULL, 1),
(4, 'Nguyễn Tiến Hoàng', 'tienhoang', '123', '12345678', 'Quản lý', 'Thành phố Hồ Chí Minh', '12345', 'Acer_Wallpaper_01_5000x2814.jpg', NULL, 1);

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
(1, 2, 3, '2021-12-14', 2000000),
(2, 2, 3, '2021-12-14', 2000000);

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
(1, 2, 3, '2021-12-14', 26000000);

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
(1, 1, 3, '2021-12-14', 40000000),
(2, 2, 2, '2021-12-14', 21000000),
(3, 1, 3, '2021-12-14', 0),
(4, 2, 2, '2021-12-14', 20000000);

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
(1, 'PNJ1', 3, 1, 15000000, 5251000, 100, 1, 2, NULL),
(2, 'SJC1', 3, 2, 6000000, 6170000, 100, 0, 2, NULL),
(3, 'SJC2', 3, 2, 13000000, 4936000, 80, 0, NULL, 1),
(4, 'SJC3', 3, 2, 13000000, 4936000, 80, 0, NULL, 1),
(5, 'SJC4', 1, 2, 5000000, 6170000, 100, 1, 4, NULL),
(6, 'SJC5', 1, 2, 5000000, 6170000, 100, 1, 4, NULL),
(7, 'SJC6', 1, 2, 5000000, 6170000, 100, 1, 4, NULL),
(8, 'BDOJI1', 1, 4, 5000000, 3000000, 100, 1, 4, NULL);

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
(1, '2021-12-12', '12-2021', 2000000, 47000000, 220000000, 176000000),
(2, '2021-12-13', '12-2021', 2000000, 0, 176000000, 178000000),
(3, '2021-12-14', '12-2021', 1000000, 20000000, 178000000, 159000000);

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
-- Dumping data for table `tbl_tygiasanpham`
--

INSERT INTO `tbl_tygiasanpham` (`ID`, `DanhmucID`, `GiaNhap`, `GiaBan`, `NgayCapNhat`) VALUES
(1, 1, 5170000, 5250000, '2021-12-14 17:10:38'),
(2, 2, 6100000, 6170000, '2021-12-14 17:11:17'),
(3, 3, 5000000, 5005000, '2021-12-14 17:12:04'),
(4, 1, 5171000, 5251000, '2021-12-14 17:13:29'),
(5, 4, 3000000, 3000000, '2021-12-14 17:14:54');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_chitietphieumuahang`
--
ALTER TABLE `tbl_chitietphieumuahang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_chitietphieunhaphang`
--
ALTER TABLE `tbl_chitietphieunhaphang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_diemdanh`
--
ALTER TABLE `tbl_diemdanh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_luong`
--
ALTER TABLE `tbl_luong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_phieubamhang`
--
ALTER TABLE `tbl_phieubamhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_phieumuahang`
--
ALTER TABLE `tbl_phieumuahang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_phieunhaphang`
--
ALTER TABLE `tbl_phieunhaphang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_tonquy`
--
ALTER TABLE `tbl_tonquy`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tygiasanpham`
--
ALTER TABLE `tbl_tygiasanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
