-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 04, 2024 lúc 06:05 AM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fashion`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chatlieu`
--

CREATE TABLE `chatlieu` (
  `id` int(11) NOT NULL,
  `MaChatLieu` varchar(5) NOT NULL,
  `TenChatLieu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chatlieu`
--

INSERT INTO `chatlieu` (`id`, `MaChatLieu`, `TenChatLieu`) VALUES
(4, 'BB001', 'Bamboo'),
(1, 'CT001', 'Cotton'),
(2, 'CTT01', '100% Cotton'),
(3, 'NYL01', '100% Nylon');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` varchar(5) NOT NULL,
  `TenSanPham` text NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `DonGia` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`MaDonHang`, `MaSanPham`, `TenSanPham`, `SoLuong`, `DonGia`) VALUES
(8, 'SP112', 'SSS', 2, 50000),
(9, 'SP112', 'SSS', 2, 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgiasanpham`
--

CREATE TABLE `danhgiasanpham` (
  `MaSanPham` varchar(5) NOT NULL,
  `MaKhachHang` varchar(5) NOT NULL,
  `DanhGia` varchar(500) NOT NULL,
  `XepHang` int(11) NOT NULL,
  `NgayDanhGia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `id` int(11) NOT NULL,
  `MaKhachHang` varchar(5) NOT NULL,
  `NgayDatHang` text NOT NULL,
  `DiaChiShip` varchar(500) NOT NULL,
  `TongTien` float NOT NULL,
  `NgayXacNhan` text DEFAULT NULL,
  `NgayXoa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`id`, `MaKhachHang`, `NgayDatHang`, `DiaChiShip`, `TongTien`, `NgayXacNhan`, `NgayXoa`) VALUES
(3, 'KH03', '20/05/2024', 'Quan 12', 50, NULL, '21/05/2024'),
(4, 'KH03', '20/05/2024', 'Quan 12', 50, NULL, '21/05/2024'),
(5, 'KH03', '20/05/2024', 'Quan 12', 50, NULL, '21/05/2024'),
(6, 'KH03', '20/05/2024', 'Quan 12', 50, '21/05/2024', '21/05/2024'),
(7, 'KH03', '20/05/2024', 'Quan 12', 50, '21/05/2024', NULL),
(8, 'KH03', '20/05/2024', 'Quan 12', 50, '21/05/2024', NULL),
(9, 'KH03', '20/05/2024', 'Quan 12', 50, '21/05/2024', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hethongcuahang`
--

CREATE TABLE `hethongcuahang` (
  `MaCuaHang` varchar(5) NOT NULL,
  `TenCuaHang` varchar(100) NOT NULL,
  `SoNha` varchar(100) NOT NULL,
  `PhuongXa` varchar(100) NOT NULL,
  `QuanHuyen` varchar(100) NOT NULL,
  `TinhThanhPho` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hethongcuahang`
--

INSERT INTO `hethongcuahang` (`MaCuaHang`, `TenCuaHang`, `SoNha`, `PhuongXa`, `QuanHuyen`, `TinhThanhPho`) VALUES
('CH001', 'TP HCM - Cộng Hòa 454', '452-454 Đường Cộng Hòa', 'Phường 13', 'Quận Tân Bình', 'TP Hồ Chí Minh'),
('CH002', 'Cửa hàng 03 Nguyễn Trãi', '3 Nguyễn Trãi', 'Phường Bến Thành', 'Quận 1', 'TP Hồ Chí Minh'),
('CH003', 'Cửa hàng Ông Ích Khiêm', '109-111 Ông Ích Khiêm', 'Phường 10', 'Quận 11', 'TP Hồ Chí Minh'),
('CH004', 'Cửa hàng Lũy Bán Bích', '787B Lũy Bán Bích', 'Phường Phú Thọ Hoà', 'Quận Tân Phú', 'TP Hồ Chí Minh'),
('CH005', 'Cửa hàng Phú Mỹ Hưng - Nguyễn Đức Cảnh', '115 Nguyễn Đức Cảnh', 'Phường Tân Phong', 'Quận 7', 'TP Hồ Chí Minh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `enable` bigint(20) NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image`
--

INSERT INTO `image` (`id`, `title`, `url`, `enable`, `type`, `product_id`) VALUES
(2, '', 'upload/banner06.jpg', 1, 'slider', NULL),
(4, '', 'upload/banner01-copy.jpg', 1, 'slider', NULL),
(5, '', 'upload/logo.png', 1, 'logo', NULL),
(6, 'Tìm cửa hàng', 'upload/footerbanner1.jpg', 1, 'service', NULL),
(7, 'FANPAGE CỦA CHÚNG TÔI', 'upload/footerbanner2.png', 1, 'service', NULL),
(8, 'MAY ĐO ĐỒNG PHỤC', 'upload/footerbanner3.png', 1, 'service', NULL),
(15, 'Video', 'upload/lc-2023-1.webm', 1, 'video', NULL),
(16, 'ANPHUOC', 'upload/danhmuc-anphuoc.jpg', 1, 'brand', NULL),
(17, 'PIERRE CARDIN', 'upload/danhmuc-anamai.jpg', 1, 'brand', NULL),
(18, 'AN PHUOC LADIES', 'upload/danhmuc-anphuocladies.jpg', 1, 'brand', NULL),
(19, 'ANAMAI', 'upload/danhmuc-bonjour.jpg', 1, 'brand', NULL),
(20, 'BONJOUR', 'upload/danhmuc-pierrecardin.jpg', 1, 'brand', NULL),
(21, '', 'upload/sp007.jpg', 1, 'new', NULL),
(22, '', 'upload/danhmuc-pierrecardin.jpg', 0, 'product', 1),
(23, '', 'upload/2.png', 0, 'product', 1),
(24, '', 'upload/11.png', 0, 'product', 1),
(25, '', 'upload/10.png', 0, 'product', 2),
(26, '', 'upload/5.png', 0, 'product', 2),
(27, '', 'upload/7.png', 0, 'product', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `MaKhachHang` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `TenKhachHang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `MaKhachHang`, `password`, `TenKhachHang`, `email`, `NgaySinh`, `DiaChi`) VALUES
(1, 'KH01', 'e807f1fcf82d132f9bb018ca6738a19f', 'Bui Quoc Bao', 'buiquocb3101@gmail.com', '0000-00-00', ''),
(2, 'KH02', 'e807f1fcf82d132f9bb018ca6738a19f', 'Phan Chí Tài', 'phanchitai3947@gmail.com', '0000-00-00', '171 Đông Hưng Thuận 2, Quận 12'),
(3, 'KH03', 'e807f1fcf82d132f9bb018ca6738a19f', 'TaiChiPhan', 'phantai@gmail.com', '0000-00-00', 'Quan 12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang_sodienthoai`
--

CREATE TABLE `khachhang_sodienthoai` (
  `id` int(11) NOT NULL,
  `MaKhachHang` varchar(5) NOT NULL,
  `SoDienThoai` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang_sodienthoai`
--

INSERT INTO `khachhang_sodienthoai` (`id`, `MaKhachHang`, `SoDienThoai`) VALUES
(1, 'KH01', '0987654321'),
(2, 'KH02', '0825690847'),
(3, 'KH03', '0999999999');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kieudang`
--

CREATE TABLE `kieudang` (
  `id` int(11) NOT NULL,
  `MaKieuDang` varchar(5) NOT NULL,
  `TenKieuDang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `kieudang`
--

INSERT INTO `kieudang` (`id`, `MaKieuDang`, `TenKieuDang`) VALUES
(1, 'BDY01', 'Body'),
(2, 'CLASC', 'Classic'),
(3, 'CSAL1', 'Casual'),
(4, 'MORD1', 'Mordern'),
(5, 'SLF01', 'SlimFit(Size 38-43)'),
(6, 'SX001', 'Sexy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `id` int(11) NOT NULL,
  `MaLoai` varchar(5) NOT NULL,
  `TenLoai` varchar(100) NOT NULL,
  `MoTa` varchar(500) NOT NULL,
  `DanhMucSanPham` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`id`, `MaLoai`, `TenLoai`, `MoTa`, `DanhMucSanPham`) VALUES
(1, 'A0001', 'Áo', 'Loại sản phẩm áo', NULL),
(3, 'AJ001', 'Áo khoác Jacket', 'Loại sản phẩm khoác áo Jacket', NULL),
(2, 'AK001', 'Áo khoác', 'Loại sản phẩm khoác áo', 'A0001'),
(15, 'AKV01', 'Áo khoác vest', 'Áo khoác vest', 'AJ001'),
(16, 'AL001', 'Áo len ', 'Áo len', 'AJ001'),
(4, 'ASM01', 'Áo Sơ Mi', 'Loại sản phẩm áo sơ mi', NULL),
(5, 'ASMD1', 'Áo Sơ Mi Dài Tay', 'Loại sản phẩm áo sơ mi tay dài', 'A0001'),
(6, 'ASMN1', 'Áo sơ mi Ngắn tay', 'Loại sản phẩm áo sơ mi ngắn tay', 'A0001'),
(21, 'BL001', 'Balo - cặp - túi - vali', 'bctv', 'PK001'),
(22, 'CV001', 'Cà vạt', 'cv', 'PK001'),
(18, 'GD001', 'Giày dép', 'Giày dép', 'PK001'),
(14, 'J0001', 'Jacket', 'Jacket', 'AJ001'),
(23, 'Kkkk', 'Khác', 'khác', 'PK001'),
(17, 'PK001', 'Phụ kiện', 'Phụ kiện', NULL),
(7, 'QC001', 'Quần', 'Các loại quần', NULL),
(12, 'QG001', 'Quần Golf', 'Quần Golf', 'QC001'),
(11, 'QJ001', 'Quần Jeans', 'Quần Jeans', 'QC001'),
(10, 'QK001', 'Quần kaki', 'Quần kaki', 'QC001'),
(13, 'QS001', 'Quần Short', 'Quần Short', 'QC001'),
(8, 'QT001', 'Quần tây', 'Quần tây', 'QC001'),
(20, 'TL001', 'Thắt lưng', 'Thắt lưng', 'PK001'),
(19, 'VD001', 'Ví da', 'ví da', 'PK001'),
(9, 'VT001', 'Veston nam', 'Veston nam', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `id` int(11) NOT NULL,
  `MaMauSac` varchar(5) NOT NULL,
  `TenMauSac` varchar(10) NOT NULL,
  `HEXMauSac` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`id`, `MaMauSac`, `TenMauSac`, `HEXMauSac`) VALUES
(1, 'MS001', 'Đen', '#000000'),
(2, 'MS002', 'Trắng', '#FFFFFF'),
(3, 'MS003', 'Nâu', '#8B4513'),
(4, 'MS004', 'Xanh Dương', '#0000FF');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(11) NOT NULL,
  `MaSanPham` varchar(5) NOT NULL,
  `TenSanPham` varchar(100) NOT NULL,
  `uri` text NOT NULL,
  `HinhAnh` varchar(300) DEFAULT NULL,
  `MoTaNgan` varchar(100) DEFAULT NULL,
  `MotaDai` varchar(500) DEFAULT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaGoc` float DEFAULT NULL,
  `GiaBan` float DEFAULT NULL,
  `NgungHoatDong` tinyint(1) DEFAULT NULL,
  `MoiRa` tinyint(1) DEFAULT NULL,
  `DacSac` tinyint(1) DEFAULT NULL,
  `LoaiSanPham` varchar(5) DEFAULT NULL,
  `MauSac` varchar(5) DEFAULT NULL,
  `Size` text NOT NULL,
  `ChatLieu` varchar(5) DEFAULT NULL,
  `KieuDang` varchar(5) DEFAULT NULL,
  `enable` bigint(20) NOT NULL,
  `popular` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `MaSanPham`, `TenSanPham`, `uri`, `HinhAnh`, `MoTaNgan`, `MotaDai`, `SoLuong`, `GiaGoc`, `GiaBan`, `NgungHoatDong`, `MoiRa`, `DacSac`, `LoaiSanPham`, `MauSac`, `Size`, `ChatLieu`, `KieuDang`, `enable`, `popular`) VALUES
(1, 'SP001', 'Áo sơ mi Nam ngắn tay An Phước ', '', 'upload/1.png', NULL, NULL, 100, 898000, 718000, NULL, NULL, NULL, 'ASMN1', 'MS001', 'SS010', 'BB001', 'BDY01', 1, 1),
(2, 'SP002', 'Áo sơ mi Nam dài tay An Phước ', '', 'upload/2.png', NULL, NULL, 100, NULL, 995000, NULL, NULL, NULL, 'ASMD1', 'MS001', 'SS010', 'BB001', 'BDY01', 1, 1),
(3, 'SP003', 'Áo thun Nam ngắn tay An Phước', '', 'upload/7.png', NULL, NULL, 100, NULL, 1193000, NULL, NULL, NULL, 'ASM01', 'MS002', 'SS060', 'CTT01', 'CLASC', 1, 1),
(4, 'SP004', 'Áo thun Nam ngắn tay, ôm sát', '', 'upload/9.png', NULL, NULL, 40, 958000, 850000, NULL, NULL, NULL, 'ASM01', 'MS004', 'SS060', 'CT001', 'CLASC', 1, 1),
(5, 'SP005', 'ASMNDT005', '', 'upload/5.png', NULL, NULL, 45, NULL, 1000000, NULL, NULL, NULL, 'ASMD1', 'MS004', 'SS061', 'BB001', 'CSAL1', 1, 1),
(6, 'SP006', 'ASMNNT006', '', 'upload/10.png', NULL, NULL, 20, 900000, 1110000, NULL, NULL, NULL, 'ASMN1', 'MS003', 'SS010', 'CT001', 'CLASC', 1, 1),
(7, 'SP007', 'ASMNDT007', '', 'upload/sp001.jpg', NULL, NULL, 60, 780000, 690000, NULL, NULL, NULL, 'ASMD1', 'MS002', 'SS010', 'BB001', 'BDY01', 1, 1),
(8, 'SP008', 'ASMNDT008', '', 'upload/sanphamnoibat1.jpg', NULL, NULL, 50, 870000, 718000, NULL, NULL, NULL, 'ASMD1', 'MS003', 'SS010', 'CT001', 'CLASC', 1, 1),
(9, 'SP009', 'ASMNDT009', '', 'upload/sanphamnoibat3.jpg', NULL, NULL, 50, 1000000, 915000, NULL, NULL, NULL, 'ASMD1', 'MS004', 'SS010', 'BB001', 'CSAL1', 1, 1),
(10, 'SP010', 'ASMNDT010', '', 'upload/sanphamnoibat4.jpg', NULL, NULL, 50, 900000, 790000, NULL, NULL, NULL, 'ASMD1', 'MS004', 'SS060', 'CT001', 'CLASC', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id` int(11) NOT NULL,
  `MaSize` varchar(5) NOT NULL,
  `TenSize` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id`, `MaSize`, `TenSize`) VALUES
(3, 'SS010', 'M'),
(1, 'SS060', 'L'),
(4, 'SS061', 'XL'),
(5, 'SS062', 'XXL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int(11) NOT NULL,
  `MaTinTuc` varchar(5) NOT NULL,
  `TenTinTuc` varchar(100) NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `NgayDang` int(11) NOT NULL,
  `HinhAnhDaiDien` varchar(300) NOT NULL,
  `enable` bigint(20) NOT NULL,
  `popular` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `MaTinTuc`, `TenTinTuc`, `NoiDung`, `NgayDang`, `HinhAnhDaiDien`, `enable`, `popular`) VALUES
(1, 'TT001', 'TTTTT', 'yâhaa', 1716566822, 'upload/banner01-copy.jpg', 1, 1),
(2, 'TT002', 'Tin thời vụ', 'Xin chào các bạn', 1716738724, 'upload/sanphamnoibat4.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chatlieu`
--
ALTER TABLE `chatlieu`
  ADD PRIMARY KEY (`MaChatLieu`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`MaDonHang`,`MaSanPham`);

--
-- Chỉ mục cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD PRIMARY KEY (`MaSanPham`,`MaKhachHang`),
  ADD KEY `DANHGIASANPHAM_fk1` (`MaKhachHang`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hethongcuahang`
--
ALTER TABLE `hethongcuahang`
  ADD PRIMARY KEY (`MaCuaHang`);

--
-- Chỉ mục cho bảng `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKhachHang`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `khachhang_sodienthoai`
--
ALTER TABLE `khachhang_sodienthoai`
  ADD PRIMARY KEY (`MaKhachHang`,`SoDienThoai`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `kieudang`
--
ALTER TABLE `kieudang`
  ADD PRIMARY KEY (`MaKieuDang`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoai`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `DanhMucSanPham` (`DanhMucSanPham`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`MaMauSac`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `SANPHAM_fk10` (`LoaiSanPham`),
  ADD KEY `SANPHAM_fk11` (`MauSac`),
  ADD KEY `SANPHAM_fk15` (`ChatLieu`),
  ADD KEY `SANPHAM_fk16` (`KieuDang`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`MaSize`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`MaTinTuc`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chatlieu`
--
ALTER TABLE `chatlieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khachhang_sodienthoai`
--
ALTER TABLE `khachhang_sodienthoai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `kieudang`
--
ALTER TABLE `kieudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `CHITIETDONHANG_fk0` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`);

--
-- Các ràng buộc cho bảng `danhgiasanpham`
--
ALTER TABLE `danhgiasanpham`
  ADD CONSTRAINT `DANHGIASANPHAM_fk0` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `DANHGIASANPHAM_fk1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `DONHANG_fk1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `khachhang_sodienthoai`
--
ALTER TABLE `khachhang_sodienthoai`
  ADD CONSTRAINT `KHACHHANG_SODIENTHOAI_fk0` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Các ràng buộc cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD CONSTRAINT `loaisanpham_ibfk_1` FOREIGN KEY (`DanhMucSanPham`) REFERENCES `loaisanpham` (`MaLoai`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `SANPHAM_fk10` FOREIGN KEY (`LoaiSanPham`) REFERENCES `loaisanpham` (`MaLoai`),
  ADD CONSTRAINT `SANPHAM_fk11` FOREIGN KEY (`MauSac`) REFERENCES `mausac` (`MaMauSac`),
  ADD CONSTRAINT `SANPHAM_fk15` FOREIGN KEY (`ChatLieu`) REFERENCES `chatlieu` (`MaChatLieu`),
  ADD CONSTRAINT `SANPHAM_fk16` FOREIGN KEY (`KieuDang`) REFERENCES `kieudang` (`MaKieuDang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
