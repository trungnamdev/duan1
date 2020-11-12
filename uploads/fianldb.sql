-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2020 lúc 02:20 PM
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
(9, 'LAB1 - BIẾN TRONG PHP', 'php.png', 'biến php', 6, '2020-11-11', '2020-11-14'),
(10, 'LAB 1 - FUNC TRONG PHP', 'php.png', 'thuc tap php function', 7, '2020-11-11', '2020-11-13'),
(11, 'LAB - 1 TÌM HIỂU VỀ SELETE ', 'mysql.png', 'tìm hiểu về selete của mysql', 8, '2020-11-11', '2020-11-13'),
(12, 'LAB 1 DEMO VỀ DELETE MYSQL', 'mysql.png', 'demo về delete trong mysql', 9, '2020-11-09', '2020-11-10'),
(13, 'LAB 2 DEMO VỀ IN MYSQL', 'mysql.png', 'demo về IN trong mysql', 9, '2020-11-11', '2020-11-14'),
(14, 'LAB - 2 TÌM HIỂU VỀ NOT IN ', 'mysql.png', 'tìm hiểu về NOT IN của mysql', 8, '2020-11-11', '2020-11-13'),
(15, 'LAB 2 - MVC TRONG PHP', 'php.png', 'thuc tap php function', 6, '2020-11-08', '2020-11-10'),
(16, 'LAB 2 - MAILER TRONG PHP', 'php.png', 'thuc tap gui mail trong php', 7, '2020-11-11', '2020-11-13');

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
(2, 'FontEnd'),
(3, 'MYSQL');

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
(3, '6,7'),
(4, '8,9');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoahoc`
--

CREATE TABLE `khoahoc` (
  `id` int(11) NOT NULL,
  `tenkhoa` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `hinh` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `mota` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `chude` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `khoahoc`
--

INSERT INTO `khoahoc` (`id`, `tenkhoa`, `hinh`, `mota`, `chude`) VALUES
(2, 'PHP cơ bản', 'php.png', 'PHP được sử dụng để phát triển các ứng dụng phần mềm trên web. Loạt bài hướng dẫn này giúp bạn hiểu những khái niệm cơ bản về PHP.', 1),
(3, 'JQUERY cơ bản', 'js.png', 'Khóa học jQuery cơ bản đến nâng cao ra đời giúp các bạn có thể chỉnh sửa giao diện của một website bất kì, tăng khả năng tương tác với người dùng, tạo hiệu ứng động cho nội dung, có khả năng tự đọc hiểu các tài liệu tự lập trình jQuery trong suốt khóa học này', 2),
(4, 'MYSQL cơ bản', 'mysql.png', 'Đi song song với ngôn ngữ lập trình PHP là hệ quản trị CSDL MySQL, đây là một cặp đôi thường được dùng để xây dựng các ứng dụng website', 3);

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
(6, 'PHP-1', 2),
(7, 'PHP-2', 2),
(8, 'MYSQL-1', 4),
(9, 'MYSQL-2', 4),
(10, 'JQ-1', 3),
(11, 'JQ-2', 3);

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
(1, 6),
(1, 8),
(2, 7),
(2, 9);

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
(1, 'TrungNam', 'trungnam.jpg', '2020-11-03', 'namn71201@gmail.com', 0, 'trungnam', '$2y$10$e3Htrm.KtQmNxIh/Hbj0m.ZvZoIic2A3riEdJ4rtQtjPWbHtOVOZm', 'Bình Tân , TPHCM', 1),
(2, 'Phúc Bình', 'binh.jpg', '2020-11-04', 'phucbinh@gmail.com', 0, 'phucbinh', '$2y$10$e3Htrm.KtQmNxIh/Hbj0m.ZvZoIic2A3riEdJ4rtQtjPWbHtOVOZm', 'Hochiminh', 1),
(3, 'thaygiao', 'thaygiao.jpg', '2020-09-01', 'thaygiao@gmail.com', 2, 'thay', '$2y$10$e3Htrm.KtQmNxIh/Hbj0m.ZvZoIic2A3riEdJ4rtQtjPWbHtOVOZm', '123', 1),
(4, 'cô giáo', 'cogiao.jpg', '2020-11-01', 'cogiao@gmail.com', 2, 'cogiao', '$2y$10$e3Htrm.KtQmNxIh/Hbj0m.ZvZoIic2A3riEdJ4rtQtjPWbHtOVOZm', 'nhà cô giáo', 0),
(5, 'PHÒNG ĐÀO TẠO', 'daotao.jpg', '2020-11-11', 'phongdaotao@gmail.com', 3, 'spus', '$2y$10$e3Htrm.KtQmNxIh/Hbj0m.ZvZoIic2A3riEdJ4rtQtjPWbHtOVOZm', 'tại trường', 1);

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
(1, 5, 'THÔNG BÁO VỀ VIỆC HỌC PHÍ NĂM 2024', 'Với mong muốn đặt lợi ích của trẻ lên hàng đầu và cũng để xứng đáng với niềm tin của Quý phụ huynh và cũng là mối quan tâm hàng đầu của Hệ thống Đào tạo Quốc tế Việt Mỹ Úc, chúng tôi luôn không ngừng nâng cao chất lượng chăm sóc - nuôi dưỡng - giáo dục trẻ, luôn cố gắng đảm bảo môi trường an toàn, sạch, đẹp, để học sinh được phát triển một cách tốt nhất.\r\n\r\nBên cạnh đó, nhà trường chúng tôi thực hiện việc tăng lương theo quy định của Nhà nước cho đội ngũ Ban Giám hiệu, Giáo viên, Nhân viên nhằm đảm bảo đời sống cho tập thể và nâng cao chất lượng bữa ăn cho học sinh.\r\n\r\nChính vì những lý do trên, bắt đầu từ ngày 01 tháng 6 năm 2015 Hệ thống AVS sẽ điều chỉnh các khoản thu CSVC, Học phí và Tiền ăn mới như sau:', '2020-11-03'),
(4, 5, 'PHÒNG CTSV THÔNG BÁO CUỘC THI ĐẤU TRƯỜNG CÔNG NGHỆ VÀ GAME LUCKY DRAW', 'Mục đích cuộc thi \r\nMột thế giới bình thường mới đang được thiết lập, nơi mà con người và công nghệ cộng tác nhịp nhàng với nhau trong mọi lĩnh vực để mang lại những hiệu quả vượt trội. Trong mối quan hệ cộng tác đó, con người đều đóng vai trò trung tâm và ra quyết định dựa trên sự hỗ trợ của công nghệ. Trong thế giới mới này, những người nhanh chóng thích ứng, biết nắm bắt và sử dụng công nghệ vào mọi lĩnh vực hoạt động, sẽ có thể đạt được thành công nhanh chóng và bứt phá hơn. Tiếp sức cộng đồng công nghệ trẻ Việt Nam trong hành trình đó, tại DIỄN ĐÀN CÔNG NGHỆ FPT (FPT TECHDAY) 2020, FPT sẽ mang đến những xu hướng công nghệ mới nhất, giải mã thành công khi ứng dụng công nghệ và các cuộc thi tại Đấu trường công nghệ để giới trẻ khẳng định bản thân. Chuỗi cuộc thi này giúp người chơi đánh giá năng lực của mình trong lĩnh vực lập trình, trí tuệ nhận tạo, vận dụng các nền tảng công nghệ mới để thiết kế, xây dựng những ứng dụng giải các bài toán thực tế. Tham gia Đấu trường công nghệ, người chơi còn có cơ hội nhận các giải thưởng lớn, với trị giá 200 triệu đồng.', '2020-11-10'),
(5, 5, 'P. CTSV THÔNG BÁO V/V TỔ CHỨC THAM GIA BẢO HIỂM Y TẾ SV ĐỢT 2 – 2020\r\n', 'Nhà cung cấp: BẢO HIỂM XÃ HỘI THÀNH PHỐ HỒ CHÍ MINH\r\n\r\nĐịa chỉ: 117C Nguyễn Đình Chính, P.15, Quận Phú Nhuận, Tp.HCM\r\n\r\nThời hạn thẻ: Từ 01/01/2021 đến 31/12/2021 (12 tháng).\r\n\r\nQuyền lợi theo quy định hiện hành của Luật Bảo hiểm Y tế\r\n\r\nĐối tượng đăng ký: Là sinh viên đang theo học tại cao đẳng FPT Polytechnic HCM\r\n\r\n                                 + Sinh viên chưa có thẻ BHYT\r\n\r\n                                 + Sinh viên hết hạn thẻ BHYT vào tháng 31/12/2020\r\n\r\nThời gian đăng ký:  từ ngày 11/11/2020 đến hết ngày 03/12/2020.\r\n\r\nHình thức đăng ký: sinh viên đến đăng ký trực tiếp tại phòng CTSV tại mỗi cơ sở.', '2020-11-08');

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
(13, 'lab1_TrungNam.zip', 9, 1, '2020-11-11', NULL),
(14, 'Lab2_TrungNam.rar', 11, 1, '2020-11-11', 8),
(15, 'Lab1_PHUCBINH.rar', 10, 2, '2020-11-11', 9),
(16, 'Lab1_PHUCBINH.rar', 12, 2, '2020-11-11', NULL);

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
  MODIFY `idbaitap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `chude`
--
ALTER TABLE `chude`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `khoahoc`
--
ALTER TABLE `khoahoc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `idtb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `upfile`
--
ALTER TABLE `upfile`
  MODIFY `idfile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
