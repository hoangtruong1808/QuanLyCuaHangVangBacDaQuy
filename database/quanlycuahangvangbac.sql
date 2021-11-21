-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 21, 2021 lúc 09:33 AM
-- Phiên bản máy phục vụ: 10.4.16-MariaDB
-- Phiên bản PHP: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlycuahangvangbac`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietphieumuahang`
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
-- Đang đổ dữ liệu cho bảng `tbl_chitietphieumuahang`
--

INSERT INTO `tbl_chitietphieumuahang` (`ID`, `PhieuMuaHangID`, `SanPhamID`, `SoLuong`, `DonGia`, `PhanTram`, `ThanhTien`) VALUES
(41, 36, 7, 1, 1111, 1, 111111),
(42, 36, 9, 1, 1111, 1, 11111);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmucsanpham`
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
-- Đang đổ dữ liệu cho bảng `tbl_danhmucsanpham`
--

INSERT INTO `tbl_danhmucsanpham` (`ID`, `Ten`, `Loai`, `MaVach`, `GiaNhap`, `GiaBan`, `TinhTrang`) VALUES
(7, 'Vàng PNJ', 'Vàng', 'V-PNJ', 5510000, 5210000, '1'),
(9, 'Phú Qúy SJC', 'Vàng', 'V-SJC', 6021100, 6087100, '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_diemdanh`
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
-- Đang đổ dữ liệu cho bảng `tbl_diemdanh`
--

INSERT INTO `tbl_diemdanh` (`ID`, `NhanvienID`, `CaSang`, `CaChieu`, `CaToi`, `Ngay`, `Thang`) VALUES
(18, 2, 1, 1, 0, '2021-11-16', 11),
(19, 9, 0, 1, 0, '2021-11-16', 11),
(20, 10, 1, 1, 1, '2021-11-16', 11),
(21, 2, 1, 0, 1, '2021-11-17', 11),
(22, 9, 0, 1, 0, '2021-11-17', 11),
(23, 10, 1, 0, 0, '2021-11-17', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
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
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`ID`, `HoTen`, `CMND`, `NgaySinh`, `GioiTinh`, `DiaChi`, `DienThoai`, `AnhDaiDien`, `GhiChu`) VALUES
(13, 'Nguyễn Văn A', '1234567', '2021-11-06', 'Nam', 'Hà Nội', '123456', '11022_978151248868739_7317126062981206639_n - Copy.jpg', NULL),
(14, 'Nguyễn Văn B', '123131', '2021-11-11', 'Nữ', 'Chung cư Prosper Plaza, 22/14 Phan Văn Hớn, Phường Tân Thới Nhất, Quận 12', '0388783394', '44639219_2068145903236393_4957032652092735488_n - Copy.jpg', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_luong`
--

CREATE TABLE `tbl_luong` (
  `ID` int(11) NOT NULL,
  `NhanvienID` int(11) NOT NULL,
  `SoCa` int(11) NOT NULL,
  `Thang` int(11) NOT NULL,
  `TongLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_luong`
--

INSERT INTO `tbl_luong` (`ID`, `NhanvienID`, `SoCa`, `Thang`, `TongLuong`) VALUES
(6, 2, 4, 11, 480000),
(7, 9, 2, 11, 240000),
(8, 10, 4, 11, 640000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhacungcap`
--

CREATE TABLE `tbl_nhacungcap` (
  `ID` int(11) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `DienThoai` varchar(50) NOT NULL,
  `Gmail` varchar(255) NOT NULL,
  `GhiChu` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhacungcap`
--

INSERT INTO `tbl_nhacungcap` (`ID`, `Ten`, `AnhDaiDien`, `DienThoai`, `Gmail`, `GhiChu`) VALUES
(5, 'Tập đoàn Vàng bạc đá quý DOJI', 'doji.jpg', '123456', 'doji@gmail.com', NULL),
(6, 'Công ty cổ phần Vàng bạc đá quý Phú Nhuận (PNJ)', 'pnj.png', '123456', 'PNJ@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
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
-- Đang đổ dữ liệu cho bảng `tbl_nhanvien`
--

INSERT INTO `tbl_nhanvien` (`ID`, `HoTen`, `TaiKhoan`, `MatKhau`, `CMND`, `ChucVu`, `DiaChi`, `DienThoai`, `AnhDaiDien`, `GhiChu`, `TrangThai`) VALUES
(2, 'Nguyễn Hoàng Trường', 'hoangtruong1808', '$2y$10$dLdlGUb1l1cb1.FwDVdQee0psqR0dMvfQ/lOviIC5y9dWuYdKCe1.', '123131', 'Nhân viên', '25B Tô Vĩnh Diện, TP.Pleiku, Gia Lai', '0388783394', '11022_978151248868739_7317126062981206639_n - Copy.jpg', NULL, 1),
(9, 'Lâm Trường', 'lamtruong', '$2y$10$eJPchXfH.qEuGobHmYsKBu6TrEPivdpTlz.MuBKqi6Br.7oN0h8H.', '123456', 'Nhân viên', 'TP.HCM', '123456', '2016 - Tet.jpg', NULL, 1),
(10, 'Đặng Tiến Hoàng', 'dangtienhoang', '$2y$10$m8CzbwBzWXJL8tm3GwjWv.xgdYQm0M0E7YthPojJraXkikMxU/9Q2', '123456', 'Quản lý', 'Bình Phước', '123456', '2020-Tet.2.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_phieumuahang`
--

CREATE TABLE `tbl_phieumuahang` (
  `ID` int(11) NOT NULL,
  `KhachHangID` int(11) NOT NULL,
  `NhanVienID` int(11) NOT NULL,
  `NgayLapPhieu` date NOT NULL DEFAULT current_timestamp(),
  `TongGiaTri` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_phieumuahang`
--

INSERT INTO `tbl_phieumuahang` (`ID`, `KhachHangID`, `NhanVienID`, `NgayLapPhieu`, `TongGiaTri`) VALUES
(36, 13, 9, '2021-11-17', 122222);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `ID` int(11) NOT NULL,
  `KhoiLuong` float NOT NULL,
  `Loai` varchar(255) NOT NULL,
  `TieuChuan` varchar(255) DEFAULT NULL,
  `GiaNhap` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `TinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_tygiasanpham`
--

CREATE TABLE `tbl_tygiasanpham` (
  `ID` int(11) NOT NULL,
  `DanhmucID` int(11) NOT NULL,
  `GiaNhap` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `NgayCapNhat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_tygiasanpham`
--

INSERT INTO `tbl_tygiasanpham` (`ID`, `DanhmucID`, `GiaNhap`, `GiaBan`, `NgayCapNhat`) VALUES
(11, 7, 5280000, 5350000, '2021-11-13 15:44:09'),
(12, 7, 5300000, 5400000, '2021-11-13 15:44:29'),
(14, 9, 6020000, 6085000, '2021-11-13 15:48:27'),
(15, 7, 5400000, 5500000, '2021-11-16 08:27:03'),
(16, 9, 6021000, 6087000, '2021-11-16 08:27:15'),
(17, 7, 5510000, 5210000, '2021-11-17 10:16:46'),
(18, 9, 6021100, 6087100, '2021-11-17 10:16:58');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chitietphieumuahang`
--
ALTER TABLE `tbl_chitietphieumuahang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PhieuMuaHangID` (`PhieuMuaHangID`),
  ADD KEY `SanPhamID` (`SanPhamID`);

--
-- Chỉ mục cho bảng `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_diemdanh`
--
ALTER TABLE `tbl_diemdanh`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NhanvienID` (`NhanvienID`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_luong`
--
ALTER TABLE `tbl_luong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NhanvienID` (`NhanvienID`);

--
-- Chỉ mục cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_phieumuahang`
--
ALTER TABLE `tbl_phieumuahang`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KhachHangID` (`KhachHangID`),
  ADD KEY `NhanVienID` (`NhanVienID`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tbl_tygiasanpham`
--
ALTER TABLE `tbl_tygiasanpham`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DanhmucID` (`DanhmucID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_chitietphieumuahang`
--
ALTER TABLE `tbl_chitietphieumuahang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmucsanpham`
--
ALTER TABLE `tbl_danhmucsanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_diemdanh`
--
ALTER TABLE `tbl_diemdanh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_luong`
--
ALTER TABLE `tbl_luong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_nhacungcap`
--
ALTER TABLE `tbl_nhacungcap`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_phieumuahang`
--
ALTER TABLE `tbl_phieumuahang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_tygiasanpham`
--
ALTER TABLE `tbl_tygiasanpham`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_chitietphieumuahang`
--
ALTER TABLE `tbl_chitietphieumuahang`
  ADD CONSTRAINT `tbl_chitietphieumuahang_ibfk_1` FOREIGN KEY (`PhieuMuaHangID`) REFERENCES `tbl_phieumuahang` (`ID`),
  ADD CONSTRAINT `tbl_chitietphieumuahang_ibfk_2` FOREIGN KEY (`SanPhamID`) REFERENCES `tbl_danhmucsanpham` (`ID`);

--
-- Các ràng buộc cho bảng `tbl_diemdanh`
--
ALTER TABLE `tbl_diemdanh`
  ADD CONSTRAINT `tbl_diemdanh_ibfk_1` FOREIGN KEY (`NhanvienID`) REFERENCES `tbl_nhanvien` (`ID`);

--
-- Các ràng buộc cho bảng `tbl_luong`
--
ALTER TABLE `tbl_luong`
  ADD CONSTRAINT `tbl_luong_ibfk_1` FOREIGN KEY (`NhanvienID`) REFERENCES `tbl_nhanvien` (`ID`);

--
-- Các ràng buộc cho bảng `tbl_phieumuahang`
--
ALTER TABLE `tbl_phieumuahang`
  ADD CONSTRAINT `tbl_phieumuahang_ibfk_1` FOREIGN KEY (`KhachHangID`) REFERENCES `tbl_khachhang` (`ID`),
  ADD CONSTRAINT `tbl_phieumuahang_ibfk_2` FOREIGN KEY (`NhanVienID`) REFERENCES `tbl_nhanvien` (`ID`);

--
-- Các ràng buộc cho bảng `tbl_tygiasanpham`
--
ALTER TABLE `tbl_tygiasanpham`
  ADD CONSTRAINT `tbl_tygiasanpham_ibfk_1` FOREIGN KEY (`DanhmucID`) REFERENCES `tbl_danhmucsanpham` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
