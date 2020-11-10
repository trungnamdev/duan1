-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2020 lúc 05:14 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baitap`
--

CREATE TABLE `baitap` (
  `idbaitap` int(11) NOT NULL,
  `tenbaitap` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinh` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `motabt` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idlop` int(11) NOT NULL,
  `ngaygiao` date NOT NULL,
  `ngayhethan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `baitap`
--

INSERT INTO `baitap` (`idbaitap`, `tenbaitap`, `hinh`, `motabt`, `idlop`, `ngaygiao`, `ngayhethan`) VALUES
(2, 'Biến và vòng lặp', 'vienvonglap.png', 'mo tả bài tập', 2, '2020-11-03', '2020-11-05'),
(3, 'Juqery mảng 2 chiều', 'jqmang2chieu.png', 'học sinh cần nộp file demo về mảng 2 chiều và ví dụ về nó', 2, '2020-11-04', '2020-11-06'),
(4, 'Thiết kế giao diên : Lab 2', '', 'Thiết kế giao diên : Lab 2', 3, '2020-11-01', '2020-11-11'),
(5, 'Thiết kế website theo mẫu', '', 'Thiết kế website theo mẫu', 3, '2020-11-02', '2020-11-12'),
(6, 'Thiết kế giao diện admin', '', 'Thiết kế giao diện admin', 3, '2020-11-01', '2020-11-13'),
(7, 'Thiết kế giao diện người dùng ', '', 'Thiết kế giao diện người dùng ', 3, '2020-11-02', '2020-11-18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chude`
--

CREATE TABLE `chude` (
  `id` int(11) NOT NULL,
  `tenchude` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `chude`
--

INSERT INTO `chude` (`id`, `tenchude`) VALUES
(1, 'BackEnd'),
(2, 'FontEnd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gvlop`
--

CREATE TABLE `gvlop` (
  `idgv` int(11) NOT NULL,
  `idlop` text COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'một giáo viên có thể phụ trách nhiều lớp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `gvlop`
--

INSERT INTO `gvlop` (`idgv`, `idlop`) VALUES
(3, '1,3,2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id` int(11) NOT NULL,
  `tenkhoa` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinh` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `tenkhoa`, `hinh`, `chude`) VALUES
(2, 'PHP cơ bản', 'phpcocan.png', 1),
(3, 'JQUERY', 'jquery.png', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(11) NOT NULL,
  `tenlop` varchar(150) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idkhoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `tenlop`, `idkhoa`) VALUES
(1, 'WD15306', 2),
(2, 'WD15305', 2),
(3, 'WD15304', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sv_lop`
--

CREATE TABLE `sv_lop` (
  `idsv` int(11) NOT NULL,
  `idlop` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sv_lop`
--

INSERT INTO `sv_lop` (`idsv`, `idlop`) VALUES
(1, 2),
(2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'họ tên học sinh , giáo viên',
  `hinh` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `email` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chucvu` tinyint(1) NOT NULL COMMENT '+ 0 : sinh viên \r\n+ 1 : giáo viên\r\n+ 2 :super us',
  `tendn` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `pass` text COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'pass sẽ được mã hóa ',
  `diachi` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `sex` tinyint(1) NOT NULL COMMENT '+ 0 : nữ\r\n+1 : nam'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `hoten`, `hinh`, `ngaysinh`, `email`, `chucvu`, `tendn`, `pass`, `diachi`, `sex`) VALUES
(1, 'TrungNam', 'trungam.png', '2020-11-03', 'namn71201@gmail.com', 0, 'trungnam', '$2y$10$e3Htrm.KtQmNxIh/Hbj0m.ZvZoIic2A3riEdJ4rtQtjPWbHtOVOZm', 'Bình Tân , TPHCM', 1),
(2, 'Phúc Bình', 'binh.jpg', '2020-11-04', 'phucbinh@gmail.com', 0, 'phucbinh', '$2y$10$e3Htrm.KtQmNxIh/Hbj0m.ZvZoIic2A3riEdJ4rtQtjPWbHtOVOZm', 'Hochiminh', 1),
(3, 'thaygiao', 'thaygiao.png', '2020-09-01', '123', 2, 'thay', '1', '123', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbao`
--

CREATE TABLE `thongbao` (
  `idtb` int(11) NOT NULL,
  `idngdang` int(11) NOT NULL COMMENT '+ id người đăng\r\n+ người đăng phải có chức vụ = 3',
  `tdtb` varchar(300) COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'tiêu đề thông báo',
  `noidung` text COLLATE utf8mb4_vietnamese_ci NOT NULL COMMENT 'nội dung thông báo',
  `ngaydang` date NOT NULL COMMENT 'ngày đăng tb'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `thongbao`
--

INSERT INTO `thongbao` (`idtb`, `idngdang`, `tdtb`, `noidung`, `ngaydang`) VALUES
(1, 1, 'THÔNG BÁO VỀ VIỆC HỌC PHÍ NĂM 2024', 'Với mong muốn đặt lợi ích của trẻ lên hàng đầu và cũng để xứng đáng với niềm tin của Quý phụ huynh và cũng là mối quan tâm hàng đầu của Hệ thống Đào tạo Quốc tế Việt Mỹ Úc, chúng tôi luôn không ngừng nâng cao chất lượng chăm sóc - nuôi dưỡng - giáo dục trẻ, luôn cố gắng đảm bảo môi trường an toàn, sạch, đẹp, để học sinh được phát triển một cách tốt nhất.\r\n\r\nBên cạnh đó, nhà trường chúng tôi thực hiện việc tăng lương theo quy định của Nhà nước cho đội ngũ Ban Giám hiệu, Giáo viên, Nhân viên nhằm đảm bảo đời sống cho tập thể và nâng cao chất lượng bữa ăn cho học sinh.\r\n\r\nChính vì những lý do trên, bắt đầu từ ngày 01 tháng 6 năm 2015 Hệ thống AVS sẽ điều chỉnh các khoản thu CSVC, Học phí và Tiền ăn mới như sau:', '2020-11-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `upfile`
--

CREATE TABLE `upfile` (
  `idfile` int(11) NOT NULL,
  `file` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `idbaitap` int(11) NOT NULL,
  `idsv` int(11) NOT NULL,
  `ngaynop` date NOT NULL COMMENT 'ngày giờ nộp',
  `diem` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `upfile`
--

INSERT INTO `upfile` (`idfile`, `file`, `idbaitap`, `idsv`, `ngaynop`, `diem`) VALUES
(2, 'HS1_BIENVAVONGLAP.ZIP', 2, 1, '2020-11-04', NULL),
(3, 'jq_binhphuc.zip', 3, 2, '2020-11-05', 9),
(11, '4.PNG', 2, 2, '2020-11-09', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD PRIMARY KEY (`idbaitap`),
  ADD KEY `idlop` (`idlop`);

--
-- Chỉ mục cho bảng `chude`
--
ALTER TABLE `chude`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gvlop`
--
ALTER TABLE `gvlop`
  ADD PRIMARY KEY (`idgv`);

--
-- Chỉ mục cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chude` (`chude`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idkhoa` (`idkhoa`);

--
-- Chỉ mục cho bảng `sv_lop`
--
ALTER TABLE `sv_lop`
  ADD KEY `idsv` (`idsv`),
  ADD KEY `idlop` (`idlop`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tendn` (`tendn`);

--
-- Chỉ mục cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`idtb`),
  ADD KEY `idngdang` (`idngdang`);

--
-- Chỉ mục cho bảng `upfile`
--
ALTER TABLE `upfile`
  ADD PRIMARY KEY (`idfile`),
  ADD KEY `idsv` (`idsv`),
  ADD KEY `idbaitap` (`idbaitap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baitap`
--
ALTER TABLE `baitap`
  MODIFY `idbaitap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `chude`
--
ALTER TABLE `chude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `idtb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `upfile`
--
ALTER TABLE `upfile`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `baitap`
--
ALTER TABLE `baitap`
  ADD CONSTRAINT `baitap_ibfk_1` FOREIGN KEY (`idlop`) REFERENCES `lop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `gvlop`
--
ALTER TABLE `gvlop`
  ADD CONSTRAINT `gvlop_ibfk_1` FOREIGN KEY (`idgv`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  ADD CONSTRAINT `khoahoc_ibfk_1` FOREIGN KEY (`chude`) REFERENCES `chude` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lop`
--
ALTER TABLE `lop`
  ADD CONSTRAINT `lop_ibfk_1` FOREIGN KEY (`idkhoa`) REFERENCES `khoahoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `sv_lop`
--
ALTER TABLE `sv_lop`
  ADD CONSTRAINT `sv_lop_ibfk_2` FOREIGN KEY (`idsv`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sv_lop_ibfk_3` FOREIGN KEY (`idlop`) REFERENCES `lop` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  ADD CONSTRAINT `thongbao_ibfk_1` FOREIGN KEY (`idngdang`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `upfile`
--
ALTER TABLE `upfile`
  ADD CONSTRAINT `upfile_ibfk_2` FOREIGN KEY (`idsv`) REFERENCES `taikhoan` (`id`),
  ADD CONSTRAINT `upfile_ibfk_3` FOREIGN KEY (`idbaitap`) REFERENCES `baitap` (`idbaitap`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
