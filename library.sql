-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 03, 2019 lúc 04:08 PM
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
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(21, 'Nguyễn Đăng Mạnh', 17020878, 'Giải tích số', '2019-11-20'),
(22, 'Đỗ Xuân Dũng', 17020641, 'Web services : concepts, architectures and applications', '2019-11-19'),
(23, 'Nguyễn Ngọc Diệp', 17021999, 'Kiến trúc máy tính', '2019-11-20'),
(24, 'Phát', 17021076, 'Phương pháp số thực hành 1', '2019-11-21'),
(25, 'Nguyễn Đăng Mạnh', 17020878, 'Giải tích số', '2019-11-21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `request`
--

CREATE TABLE `request` (
  `requestID` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `logs` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `request`
--

INSERT INTO `request` (`requestID`, `username`, `message`, `logs`) VALUES
(10, 'conmeo', 'sách tín hiệu', '2019-11-20 02:00:55'),
(12, 'tu@gmail.com', 'Chào Admin, có thể cho em mượn quyển sách Giải tích số vào lúc 14h chiều ngày 21/11/2019 được không ạ?', '2019-11-21 00:44:55'),
(13, 'nguyndip', 'Chào Admin, em muốn mượn quyển Giải tích số vào lúc 14h ngày 21/11/2019', '2019-11-21 00:48:14'),
(14, 'nguyndip', 'mượn sách giải tích', '2019-11-21 13:54:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sach`
--

CREATE TABLE `sach` (
  `id` int(11) NOT NULL,
  `tensach` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sach`
--

INSERT INTO `sach` (`id`, `tensach`, `tacgia`, `description`, `name`, `type`, `size`) VALUES
(17, 'Data mining : concepts and techniques', 'Han Jiawei, Kamber Micheline, Pei Jian', 'Introduction Getting to know your data Data processing Data warehousing and online analytical processing Data cube technology Mining frequent patterns, associations, and correlations : basic concepts and methods Advanced pattern mining Classification : basic concepts Classification : advanced methods Cluster analysis : basic concepts and methods Advanced cluster analysis Outlier detection Data mining trends and research frontiers.', '511MLXf56iL._SX398_BO1,204,203,200_.jpg', 'image/jpeg', '55369'),
(18, 'Web services : concepts, architectures and applications', 'Gustavo Alonso, Fabio Casati', '	Like many other incipient technologies, Web services are still surrounded by a substantial level of noise. This noise results from the always dangerous combination of wishful thinking on the part of research and industry and of a lack of clear understanding of how Web services came to be. On the one hand, multiple contradictory interpretations are created by the many attempts to realign existing technology and strategies with Web services. On the other hand, the emphasis on what could be done with Web services in the future often makes us lose track of what can be really done with Web services today and in the short term. These factors make it extremely difficult to get a coherent picture of what Web services are, what they contribute, and where they will be applied. Alonso and his co-authors deliberately take a step back', 'Cover.jpg', 'image/jpeg', '168825'),
(19, 'Programming languages: C language', '	Kernighan  Brian W,  Ritchie Dennis M', '	C (Computer program language) ; Ngôn ngữ lập trình C ; Giao diện hệ thống ; Các kiểu dữ liệu ; Toán tử ; Hàm', '41gHB8KelXL.jpg', 'image/jpeg', '32113'),
(20, 'Phương pháp số thực hành Tập 2', 'Trần Văn Trản', '	Tập 2 gồm 5 chương, dành riêng cho nội dung giải số phương trình vi phân đạo hàm riêng. Vì vậy có thể nói, đối tượng sử dụng tập 2 chủ yếu là các chuyên gia quan tâm đến việc giải các bài toán thực tiễn phức tạp được mô tả bằng hệ phương trình vi phân đạo hàm riêng và các điều kiện biên và điều kiện bạn đầu. Một số lượng không nhỏ các phụ lục được biên soạn nhằm minh họa cho các ứng dụng giải quyết những vấn đề của cơ học.', 'tải xuống.jfif', 'image/jpeg', '4970'),
(23, 'Phương pháp số thực hành 1', 'Trần Văn Trản', '	Tập 1 gồm 3 phần: Phần I. Các khái niệm cơ bản và một số công cụ tính toán đa dụng Phần II. Phương pháp số trong đại số Phần III. Giải số phương trình vi phân thường', 'tải xuống (1).jfif', 'image/jpeg', '4378'),
(24, 'Giải tích số', 'Phạm Kỳ Anh', 'Sách, Toán & Thống kê, Toán học', 'tải xuống (2).jfif', 'image/jpeg', '4939'),
(25, 'Kiến trúc máy tính', 'Nguyễn Đình Việt', 'Chương 1: Mở đầu Chương 2: Tổ chức hệ thống máy tính Chương 3: Mức logic số Chương 4: Mức vi chương trình Chương 5: Mức máy thông thường Chương 6: Mức máy hệ điều hành Chương 7: Giới thiệu mức ngôn ngữ Assembly Chương 8: Các thiết bị ngoại vi Chương 9: Máy vi tính IBM PC.', '21342019103421_Kien truc may tinh Nguyen Dinh Viet.JPG', 'image/jpeg', '266889'),
(26, 'Mạng máy tính', 'Hồ Đắc Phương', '	Máy vi tính, Thiết bị mạng, Tin học, Công nghệ thông tin, Mạng máy tính', 'mangmaytinh.jpg', 'image/jpeg', '284145'),
(28, 'Giáo trình nhập môn mạng máy tính', 'Hồ Đắc Phương', 'Sách giới thiệu về các kiến thức cơ bản trong mạng', 'Untitled.png', 'image/png', '304357'),
(29, 'Thu thập và phân tích yêu cầu', 'Đặng Đức Hạnh', 'Sách hay', 'Screenshot (2).png', 'image/png', '136165');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `studentID` int(8) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `pathOfAvatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`id`, `studentID`, `name`, `username`, `class`, `address`, `email`, `phoneNumber`, `dateOfBirth`, `pathOfAvatar`) VALUES
(1, 17020869, 'Ứng Thành Long', 'shylong1999', 'K62CE', 'Hà Nam', 'unglong5@gmail.com', 969985570, '1999-05-17', '13244091_609135845919223_6599606666482628172_o.jpg'),
(2, 17021999, 'Nguyễn Ngọc Diệp', 'nguyndip', 'K62CF', 'Hà Nội', 'nguyndip@gmail.com', 967067199, '1999-02-06', '13339716_611557169010424_615506207666940457_n.jpg'),
(4, 17020878, 'Nguyễn Đăng Mạnh', 'manhancut', '', '', '', 969854714, '0000-00-00', ''),
(9, 17020641, 'Đỗ Xuân Dũng', 'dung', '', '', '', 975255650, '0000-00-00', ''),
(15, 17020865, 'Trương Thành Tú', 'tu@gmail.com', '', '', '', 969985578, '0000-00-00', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `idadmin` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`idadmin`, `user`, `pass`, `level`) VALUES
(1, 'shylong1999', 'da7f65a6214a04ad1d4de245dbcef7d7', 1),
(14, 'nguyndip', '202cb962ac59075b964b07152d234b70', 0),
(16, 'manhancut', '202cb962ac59075b964b07152d234b70', 0),
(22, 'dung', '5d1017d8a3351aa0b1ca2052f922dfde', 0),
(28, 'tu@gmail.com', '202cb962ac59075b964b07152d234b70', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `muonsach`
--
ALTER TABLE `muonsach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestID`);

--
-- Chỉ mục cho bảng `sach`
--
ALTER TABLE `sach`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID` (`studentID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`idadmin`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `muonsach`
--
ALTER TABLE `muonsach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `request`
--
ALTER TABLE `request`
  MODIFY `requestID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sach`
--
ALTER TABLE `sach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
