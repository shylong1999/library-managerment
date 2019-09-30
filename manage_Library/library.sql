-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 30, 2019 lúc 07:16 PM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `library`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muonsach`
--

CREATE TABLE `muonsach` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mssv` int(100) NOT NULL,
  `tensach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaymuon` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `muonsach`
--

INSERT INTO `muonsach` (`id`, `hoten`, `mssv`, `tensach`, `ngaymuon`) VALUES
(1, 'Ứng Thành Long', 17020869, 'Tín hiệu và hệ thống', '2019-09-10'),
(4, 'Nguyễn Đăng Mạnh2', 17020869, 'Giải tích 2', '2019-09-10'),
(6, 'Nguyễn Ngọc Diệp', 17021999, 'Toán rời rạc', '2019-09-10'),
(9, 'Nguyễn Trọng Vũ', 17034745, 'Giải tích 1', '2019-10-13'),
(10, 'Tạ Quang Thưởng', 17034745, 'Giải tích 1', '2019-01-19'),
(11, 'Trương Thành Tú', 17021058, 'Signal and System', '2019-10-20'),
(12, 'Mì Tôm', 2222, 'Signal and System', '2019-10-01'),
(13, 'Nguyễn Ngọc Diệp', 2222, 'Signal and System', '1923-02-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `masach` int(10) NOT NULL,
  `tensach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`masach`, `tensach`, `tacgia`, `name`, `type`, `size`) VALUES
(1, 'Signal and System', 'Lưu Mạnh Hà', 'Screenshot (5).png', 'image/png', '892561'),
(2, 'Giải tích 1', 'Lưu Mạnh Hà', 'Screenshot (10).png', 'image/png', '137590'),
(7, 'Giải tích 1', 'Long', 'Screenshot (24).png', 'image/png', '336287'),
(8, 'tin hieu', 'Long', 'Screenshot (7).png', 'image/png', '1049607'),
(9, 'Tín hiệu', 'Hà', 'Screenshot (10).png', 'image/png', '137590');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `idadmin` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`idadmin`, `user`, `pass`) VALUES
(1, 'shylong1999', 'da7f65a6214a04ad1d4de245dbcef7d7'),
(2, '17020869', '5774e1806a827a476376864fc97d1702'),
(4, 'long1999', '900150983cd24fb0d6963f7d28e17f72'),
(8, 'longabc', '900150983cd24fb0d6963f7d28e17f72'),
(9, 'long100', '900150983cd24fb0d6963f7d28e17f72');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `muonsach`
--
ALTER TABLE `muonsach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`masach`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`idadmin`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `muonsach`
--
ALTER TABLE `muonsach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `masach` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
