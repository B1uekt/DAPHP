-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 07, 2023 lúc 11:23 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sql_daphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `IDDH` int(11) NOT NULL,
  `MaDH` varchar(100) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `MaKH` varchar(100) NOT NULL,
  `TrangThaiDH` varchar(100) NOT NULL,
  `Gia` double NOT NULL,
  `NgayDat` date NOT NULL,
  `NgayGiao` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`IDDH`, `MaDH`, `MaSP`, `MaKH`, `TrangThaiDH`, `Gia`, `NgayDat`, `NgayGiao`) VALUES
(9, '20230505171023NLX5HNSKR8', 'ABC17', 'KH1683296803-530', 'Canceled', 80000000000, '1970-01-01', NULL),
(10, '2023050710161757NPPYV6OW', 'ABC18', 'KH1683296803-530', 'Shipped', 35074000000, '2023-05-21', '2023-05-08'),
(11, '20230507103858DXSJHL4ZC3', 'ABC15', 'KH1683448386-149', 'Preparing', 70000000000, '2023-05-07', NULL),
(12, '20230507103949V84C9U12S6', 'ABC3', 'KH1683448386-149', 'Preparing', 23000000000, '2023-05-07', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang_pk`
--

CREATE TABLE `donhang_pk` (
  `IDDHPK` int(11) NOT NULL,
  `MaDHPK` varchar(20) NOT NULL,
  `MaPK` varchar(10) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `MaHDPK` varchar(20) NOT NULL,
  `Gia` double NOT NULL,
  `MaKH` varchar(100) NOT NULL,
  `NgayDat` date NOT NULL,
  `NgayGiao` date DEFAULT NULL,
  `TrangthaiDH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang_pk`
--

INSERT INTO `donhang_pk` (`IDDHPK`, `MaDHPK`, `MaPK`, `SoLuong`, `MaHDPK`, `Gia`, `MaKH`, `NgayDat`, `NgayGiao`, `TrangthaiDH`) VALUES
(10, '20230505165532AA8XX', 'PK5', 3, 'KJ03EF8WER74Y5TGTO6F', 180000, 'KH1683296803-530', '1970-01-01', NULL, 'Canceled'),
(11, '202305051701328PM6V', 'PK2', 1, 'VGCU7D3GB02I6ODJM4V6', 600000, 'KH1683296803-530', '1970-01-01', NULL, 'Shipped'),
(12, '20230505170340TCRBD', 'PK6', 1, 'PBLF5UPN4Z5KKTCNM0E8', 280000, 'KH1683296803-530', '2023-05-05', NULL, 'Preparing'),
(14, '20230507103949FMK3C', 'PK3', 1, 'EX03EXUF0HI82BDGX9DM', 600000, 'KH1683448386-149', '2023-05-07', NULL, 'Preparing'),
(13, '20230507103949JV5JJ', 'PK1', 1, 'EX03EXUF0HI82BDGX9DM', 500000, 'KH1683448386-149', '2023-05-07', NULL, 'Preparing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hinhanhlienquansp`
--

CREATE TABLE `hinhanhlienquansp` (
  `IDHA` int(11) NOT NULL,
  `MaHA` varchar(10) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `Url_image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hinhanhlienquansp`
--

INSERT INTO `hinhanhlienquansp` (`IDHA`, `MaHA`, `MaSP`, `Url_image`) VALUES
(6, 'A1', 'ABC2', 'img/car-rent-5/1.jpg'),
(7, 'A2', 'ABC2', 'img/car-rent-5/2.jpg'),
(8, 'A3', 'ABC2', 'img/car-rent-5/3.jpg'),
(3, 'B1', 'ABC1', 'img/car-rent-1/2.jpeg'),
(4, 'B2', 'ABC1', 'img/car-rent-1/3.jpeg'),
(5, 'B3', 'ABC1', 'img/car-rent-1/4.jpg'),
(1, 'B4', 'ABC1', 'img/car-rent-1/1.jpeg'),
(9, 'C1', 'ABC3', 'img/car-rent-2/1.jpg'),
(10, 'C2', 'ABC3', 'img/car-rent-2/2.jpg'),
(11, 'D1', 'ABC4', 'img/Ferrari2/1.jpg'),
(12, 'D2', 'ABC4', 'img/Ferrari2/2.jpg'),
(13, 'E1', 'ABC5', 'img/Ferrari3/1.jpg'),
(14, 'E2', 'ABC5', 'img/Ferrari3/2.jpg'),
(15, 'E3', 'ABC5', 'img/Ferrari3/3.jpg'),
(16, 'E4', 'ABC5', 'img/Ferrari3/4.jpg'),
(19, 'E5', 'ABC5', 'img/Ferrari3/5.jpg'),
(17, 'F1', 'ABC6', 'img/Ferrari4/1.jpg'),
(18, 'F2', 'ABC6', 'img/Ferrari4/2.jpg'),
(20, 'G1', 'ABC7', 'img/lam1/1.jpg'),
(21, 'G2', 'ABC7', 'img/lam1/2.jpg'),
(22, 'H1', 'ABC8', 'img/lam2/1.jpg'),
(23, 'H2', 'ABC8', 'img/lam2/2.jpg'),
(24, 'J1', 'ABC9', 'img/lam3/1.jpeg'),
(25, 'J2', 'ABC9', 'img/lam3/2.jpeg'),
(26, 'K1', 'ABC10', 'img/vin1/1.jpg'),
(27, 'K2', 'ABC10', 'img/vin1/2.jpg'),
(40, 'M1', 'ABC15', 'img/car-rent-6/1.jpg'),
(41, 'M2', 'ABC15', 'img/car-rent-6/2.jpg'),
(42, 'M3', 'ABC15', 'img/car-rent-6/3.jpg'),
(37, 'N1', 'ABC14', 'img/car-rent-4/1.jpg'),
(38, 'N2', 'ABC14', 'img/car-rent-4/2.jpg'),
(39, 'N3', 'ABC14', 'img/car-rent-4/3.jpg'),
(43, 'T1', 'ABC16', 'img/Bugatti1/1.jpg\r\n'),
(44, 'T2', 'ABC16', 'img/Bugatti1/2.jpg'),
(45, 'T3', 'ABC16', 'img/Bugatti1/3.jpg'),
(46, 'T4', 'ABC16', 'img/Bugatti1/4.jpg'),
(51, 'U1', 'ABC18', 'img/Bugatti3/1.jpg'),
(52, 'U2', 'ABC18', 'img/Bugatti3/2.jpg'),
(53, 'U3', 'ABC18', 'img/Bugatti3/3.jpg'),
(54, 'U4', 'ABC18', 'img/Bugatti3/4.jpg'),
(34, 'V1', 'ABC13', 'img/car-rent-3/1.jpg'),
(35, 'V2', 'ABC13', 'img/car-rent-3/2.jpg'),
(36, 'V3', 'ABC13', 'img/car-rent-3/3.jpg'),
(31, 'X1', 'ABC12', 'img/vin3/1.jpg'),
(32, 'X2', 'ABC12', 'img/vin3/2.jpg'),
(33, 'X3', 'ABC12', 'img/vin3/3.jpg'),
(47, 'Y1', 'ABC17', 'img/Bugatti2/1.jpg'),
(48, 'Y2', 'ABC17', 'img/Bugatti2/2.jpg'),
(49, 'Y3', 'ABC17', 'img/Bugatti2/3.jpg'),
(50, 'Y4', 'ABC17', 'img/Bugatti2/4.jpg'),
(28, 'Z1', 'ABC11', 'img/vin2/1.jpg'),
(29, 'Z2', 'ABC11', 'img/vin2/2.jpg'),
(30, 'Z3', 'ABC11', 'img/vin2/3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `IDHD` int(11) NOT NULL,
  `MaHD` varchar(20) NOT NULL,
  `TongTien` double NOT NULL,
  `MaDH` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`IDHD`, `MaHD`, `TongTien`, `MaDH`) VALUES
(8, '9RG86IV7NQF7M1ITEHMQ', 80000000000, '20230505171023NLX5HNSKR8'),
(10, 'LY1ZVCGY0CU0ITREIDN6', 70000000000, '20230507103858DXSJHL4ZC3'),
(11, 'NF1YY6OV1AHQGUUDD1OV', 23000000000, '20230507103949V84C9U12S6'),
(9, 'VGDPLH05YJGLNAQI2F95', 35074000000, '2023050710161757NPPYV6OW');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon_pk`
--

CREATE TABLE `hoadon_pk` (
  `IDHDPK` int(11) NOT NULL,
  `MaHDPK` varchar(20) NOT NULL,
  `TongTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon_pk`
--

INSERT INTO `hoadon_pk` (`IDHDPK`, `MaHDPK`, `TongTien`) VALUES
(14, 'EX03EXUF0HI82BDGX9DM', 1100000),
(11, 'KJ03EF8WER74Y5TGTO6F', 180000),
(13, 'PBLF5UPN4Z5KKTCNM0E8', 280000),
(12, 'VGCU7D3GB02I6ODJM4V6', 600000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `IDKH` int(11) NOT NULL,
  `MaKH` varchar(100) NOT NULL,
  `TenKH` varchar(256) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  `SDT` varchar(11) NOT NULL,
  `DiaChi` varchar(256) DEFAULT NULL,
  `Img_user` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`IDKH`, `MaKH`, `TenKH`, `Email`, `SDT`, `DiaChi`, `Img_user`) VALUES
(16, 'KH1683296803-530', 'Khánh Thi', 'admin12311@gmail.com', '0356200443', 'Chung cư Topaz City, phường 4, quận 8, TP HCM', NULL),
(17, 'KH1683297153-119', NULL, 'admin1@gmail.com', '0583304578', NULL, NULL),
(18, 'KH1683448231-982', NULL, 'leminhkhoi.cuchi@gmail.com', '0123456789', NULL, NULL),
(19, 'KH1683448386-149', NULL, 'lmk@gmail.com', '0325102255', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisp`
--

CREATE TABLE `loaisp` (
  `idLoai` int(11) NOT NULL,
  `MaLoai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisp`
--

INSERT INTO `loaisp` (`idLoai`, `MaLoai`) VALUES
(1, 'Xe 2 chỗ'),
(2, 'Xe 4 chỗ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phukien`
--

CREATE TABLE `phukien` (
  `IDPK` int(11) NOT NULL,
  `MaPK` varchar(10) NOT NULL,
  `TenPK` varchar(256) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` double NOT NULL,
  `Url_image` varchar(256) NOT NULL,
  `MaTH` varchar(10) NOT NULL,
  `MoTa` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `phukien`
--

INSERT INTO `phukien` (`IDPK`, `MaPK`, `TenPK`, `SoLuong`, `Gia`, `Url_image`, `MaTH`, `MoTa`) VALUES
(1, 'PK1', 'Gương phụ', 27, 500000, 'img/pk/phukien2.jpg', 'NN', 'Lorem'),
(2, 'PK2', 'Sạc điện thoại ô tô', 36, 600000, 'img/pk/phukien3.jpg', 'NN', 'Lorem'),
(3, 'PK3', 'Kẹp điện thoại trên ô tô', 38, 600000, 'img/pk/phukien4.jpg', 'NN', 'Lorem'),
(4, 'PK4', 'Bọc ghế thể thao', 37, 600000, 'img/pk/phukien1.jpg', 'NN', 'Lorem'),
(5, 'PK5', 'Bọc vô lăng', 18, 180000, 'img/pk/phukien5.jpg', 'NN', 'Lorem'),
(6, 'PK6', 'Camera hành trình', 28, 280000, 'img/pk/phukien6.png', 'NN', 'Lorem');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `IDSP` int(11) NOT NULL,
  `MaSP` varchar(10) NOT NULL,
  `TenSP` varchar(256) NOT NULL,
  `MoTa` varchar(1024) NOT NULL,
  `Url_image` varchar(256) NOT NULL,
  `MaTH` varchar(10) NOT NULL,
  `GiaBan` float NOT NULL,
  `NamSX` int(11) DEFAULT NULL,
  `MaLoai` varchar(20) NOT NULL,
  `SoLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`IDSP`, `MaSP`, `TenSP`, `MoTa`, `Url_image`, `MaTH`, `GiaBan`, `NamSX`, `MaLoai`, `SoLuong`) VALUES
(1, 'ABC1', 'Mercedes Benz R3', 'Mercedes Benz R3 là một mẫu ô tô thể thao đa dụng (SUV) được giới thiệu vào năm 2022. Với kích thước lớn, nó có thể chở đến 7 người và trang bị động cơ mạnh mẽ, hệ thống lái tự động và các tính năng an toàn hiện đại như hỗ trợ đỗ xe và cảnh báo va chạm. Ngoài ra, Mercedes Benz R3 còn được thiết kế với nhiều tiện nghi như màn hình giải trí lớn, hệ thống âm thanh cao cấp và nội thất sang trọng. Đây là một lựa chọn tuyệt vời cho những người yêu thích sự thoải mái và tiện nghi trong một chiếc xe đa dụng.', 'img/car-rent-1.png', 'Mer', 32750000000, 2015, 'Xe 2 chỗ', 1),
(10, 'ABC10', 'VinFast LUX A2.0 Orange', 'VinFast LUX A2.0 là mẫu xe sedan sang trọng và đẳng cấp nhất của VinFast. Xe được thiết kế theo phong cách hiện đại và tinh tế với nhiều đường nét mạnh mẽ, tạo nên sự khác biệt và sang trọng. Với động cơ tăng áp 2.0L, LUX A2.0 đạt công suất tối đa 228 mã lực và mô-men xoắn cực đại 350 Nm, giúp xe có khả năng tăng tốc mạnh mẽ và vận hành êm ái. Ngoài ra, LUX A2.0 còn được trang bị hệ thống treo được điều chỉnh linh hoạt, hệ thống phanh an toàn ABS, EBD, BA, ESP, hệ thống túi khí và hệ thống giải trí thông minh. Nội thất của xe cũng được thiết kế rộng rãi và sang trọng, với nhiều tính năng tiện nghi như hệ thống âm thanh cao cấp, màn hình cảm ứng 12,3 inch, hệ thống giải trí kết nối thông minh và hệ thống điều khiển bằng giọng nói. Là một trong những mẫu xe đẳng cấp nhất của VinFast, LUX A2.0 chắc chắn sẽ làm hài lòng các khách hàng khó tính nhất với những tính năng và trang bị cao cấp.', 'img/Vinfast1.png', 'Vin', 700000000, 2010, 'xe 4 chỗ', 4),
(11, 'ABC11', 'VinFast VF6', 'VinFast VF6 là mẫu xe bán chạy nhất của VinFast tại thị trường Việt Nam. Được phát triển trên nền tảng của chiếc Opel Karl Rocks, VinFast VF6 được trang bị động cơ 1.4L, công suất tối đa 99 mã lực và mô-men xoắn cực đại 130 Nm. Xe có thiết kế đơn giản, hiện đại với nhiều tính năng tiện nghi như hệ thống điều hòa tự động, hệ thống giải trí thông minh, hệ thống an toàn ABS, EBD, BA, ESP, 6 túi khí và hệ thống cảnh báo điểm mù. Ngoài ra, VinFast VF6 còn có trang bị khá đầy đủ với cửa sổ trời, đèn pha tự động, màn hình cảm ứng 7 inch, kết nối Bluetooth và hỗ trợ thẻ nhớ SD. Với giá thành hợp lý, tiết kiệm nhiên liệu và đầy đủ tính năng, VinFast VF6 là một sự lựa chọn tuyệt vời cho người tiêu dùng Việt Nam.', 'img/Vinfast2.png', 'Vin', 1000000000, 2015, 'Xe 4 chỗ', 3),
(12, 'ABC12', 'VinFast LUX A2.0 White', 'VinFast LUX A2.0 là mẫu xe sedan sang trọng và đẳng cấp nhất của VinFast. Xe được thiết kế theo phong cách hiện đại và tinh tế với nhiều đường nét mạnh mẽ, tạo nên sự khác biệt và sang trọng. Với động cơ tăng áp 2.0L, LUX A2.0 đạt công suất tối đa 228 mã lực và mô-men xoắn cực đại 350 Nm, giúp xe có khả năng tăng tốc mạnh mẽ và vận hành êm ái. Ngoài ra, LUX A2.0 còn được trang bị hệ thống treo được điều chỉnh linh hoạt, hệ thống phanh an toàn ABS, EBD, BA, ESP, hệ thống túi khí và hệ thống giải trí thông minh. Nội thất của xe cũng được thiết kế rộng rãi và sang trọng, với nhiều tính năng tiện nghi như hệ thống âm thanh cao cấp, màn hình cảm ứng 12,3 inch, hệ thống giải trí kết nối thông minh và hệ thống điều khiển bằng giọng nói. Là một trong những mẫu xe đẳng cấp nhất của VinFast, LUX A2.0 chắc chắn sẽ làm hài lòng các khách hàng khó tính nhất với những tính năng và trang bị cao cấp.', 'img/Vinfast3.png', 'Vin', 700000000, 2013, 'Xe 4 chỗ', 3),
(13, 'ABC13', 'Audi R8', 'Audi R8 là một trong những mẫu siêu xe thể thao tốt nhất trên thị trường hiện nay. Xe được trang bị động cơ V10 5.2L mạnh mẽ, cho công suất tối đa lên đến 602 mã lực và mô-men xoắn 560 Nm. Khả năng tăng tốc từ 0-100 km/h chỉ trong 3,2 giây và tốc độ tối đa đạt đến 330 km/h. Ngoài ra, Audi R8 5.2 còn được trang bị hệ thống lái tiên tiến, phanh carbon-keramic và hệ thống treo điều chỉnh linh hoạt. Nội thất của xe được thiết kế sang trọng với nhiều tính năng tiên tiến như hệ thống thông tin giải trí cao cấp và hệ thống âm thanh nổi bật. Đây là một trong những chiếc siêu xe tuyệt vời nhất trên thị trường, phù hợp cho những người yêu thích tốc độ và chất lượng.', 'img/car-rent-3.png', 'Au', 40000000000, 2018, 'Xe 2 chỗ', 0),
(14, 'ABC14', 'Audi Q3', 'Audi Q3 là một mẫu xe crossover SUV hiện đại và sang trọng của hãng ô tô Đức, Audi. Xe có kích thước khoảng 4,4 mét dài và 1,8 mét rộng, cung cấp không gian rộng rãi cho tất cả các hành khách. Với thiết kế thể thao, đẳng cấp, Audi Q3 có một mặt nạ lưới tản nhiệt lớn và cặp đèn pha LED sắc nét, tạo nên vẻ ngoài khỏe khoắn và cứng cáp.\r\n\r\nNội thất của Audi Q3 được trang bị với những vật liệu cao cấp, tạo nên một không gian nội thất sang trọng và đẳng cấp. Ghế ngồi của xe có thể điều chỉnh và tháo rời để tạo thêm không gian lưu trữ cho hành lý. Hệ thống thông tin giải trí trên xe bao gồm một màn hình cảm ứng lớn, hỗ trợ đầy đủ các tính năng như định vị, đài radio và kết nối Bluetooth. Ngoài ra, Audi Q3 còn được trang bị hệ thống âm thanh cao cấp, mang đến trải nghiệm giải trí vô cùng tuyệt vời.', 'img/car-rent-4.png', 'Au', 50000000000, 2020, 'Xe 2 chỗ', 0),
(15, 'ABC15', 'Audi R8 5.2', 'Audi R8 5.2 là một trong những mẫu siêu xe thể thao tốt nhất trên thị trường hiện nay. Xe được trang bị động cơ V10 5.2L mạnh mẽ, cho công suất tối đa lên đến 602 mã lực và mô-men xoắn 560 Nm. Khả năng tăng tốc từ 0-100 km/h chỉ trong 3,2 giây và tốc độ tối đa đạt đến 330 km/h. Ngoài ra, Audi R8 5.2 còn được trang bị hệ thống lái tiên tiến, phanh carbon-keramic và hệ thống treo điều chỉnh linh hoạt. Nội thất của xe được thiết kế sang trọng với nhiều tính năng tiên tiến như hệ thống thông tin giải trí cao cấp và hệ thống âm thanh nổi bật. Đây là một trong những chiếc siêu xe tuyệt vời nhất trên thị trường, phù hợp cho những người yêu thích tốc độ và chất lượng.', 'img/car-rent-6.png', 'Au', 70000000000, 2019, 'Xe 2 chỗ', 0),
(16, 'ABC16', 'Bugatti Chiron Tourbillon', 'Bugatti Chiron Tourbillon là một phiên bản đặc biệt của siêu xe Bugatti Chiron. Được phát triển bởi đồng hồero Jacob & Co, phiên bản này kết hợp giữa sự tinh tế và công nghệ đỉnh cao. Đồng hồ được trang bị bộ máy tourbillon tay quay cực kỳ phức tạp, với thời gian chạy liên tục lên đến 60 giờ. Bên cạnh đó, Chiron Tourbillon còn được trang bị những chi tiết được làm bằng chất liệu cao cấp như titan, carbon, và gốm. Thiết kế của chiếc đồng hồ cũng được lấy cảm hứng từ siêu xe Bugatti Chiron, với những đường nét tinh tế và khả năng đo thời gian chính xác đến mili giây. Với mức giá lên tới hàng triệu USD, Bugatti Chiron Tourbillon là một sản phẩm siêu sang trọng và đẳng cấp, được giới nhà giàu và đam mê đồng hồ săn đón.', 'img/Bugatti1.png\r\n', 'Bu', 1873000000, 2021, 'Xe 2 chỗ', 1),
(17, 'ABC17', 'Bugatti Divo', 'Bugatti Divo là một siêu xe độc đáo của hãng Bugatti. Với mục đích tăng cường khả năng điều khiển và hiệu suất trên đường đua, Divo được thiết kế để có khả năng giữ được tốc độ cao trong các cua, cùng với tính năng giảm khối lượng và tăng độ bám đường. Động cơ W16 8.0L của Divo có công suất lên đến 1500 mã lực và mô-men xoắn cực đại 1600 Nm, giúp xe có khả năng tăng tốc nhanh chóng và vận hành mượt mà. Divo cũng được trang bị những công nghệ mới nhất trong lĩnh vực xe hơi, bao gồm hệ thống lái điện tử, hệ thống treo được điều chỉnh tự động, hệ thống phanh carbon-ceramic và hệ thống giải trí thông minh. Với giá bán lên tới hàng triệu USD, Bugatti Divo là một trong những siêu xe đắt giá nhất và đẳng cấp nhất thế giới, được sản xuất giới hạn chỉ 40 chiếc.', 'img/Bugatti2.png', 'Bu', 80000000000, 2020, 'Xe 2 chỗ', 1),
(18, 'ABC18', 'Bugatti Veyron', 'Bugatti Veyron là một trong những siêu xe nổi tiếng và đặc biệt của hãng xe hơi Pháp Bugatti. Veyron được sản xuất từ năm 2005 đến năm 2015, với mục đích giới thiệu công nghệ động cơ mới và tốc độ cao nhất có thể đạt được cho một chiếc xe. Với động cơ W16 8.0L, Veyron có công suất tối đa lên tới 1000 mã lực, tốc độ tối đa là 431 km/h và có khả năng tăng tốc từ 0-100 km/h chỉ trong 2,5 giây. Thiết kế của Veyron được lấy cảm hứng từ siêu xe EB110 của Bugatti trong những năm 1990, với đường nét mạnh mẽ và sắc sảo. Bugatti Veyron là một trong những siêu xe có giá trị cao nhất và đẳng cấp nhất trên thế giới, được sản xuất giới hạn chỉ 450 chiếc.', 'img/Bugatti3.png', 'Bu', 35074000000, 2021, 'Xe 2 chỗ', 0),
(2, 'ABC2', 'Mercedes-Benz C63', 'Mercedes-Benz C63 là một trong những mẫu xe thể thao đặc biệt của hãng xe hơi Đức Mercedes-Benz. Với động cơ V8 4.0L tăng áp, C63 có công suất tối đa lên đến 503 mã lực và mô-men xoắn cực đại 700 Nm, cho phép xe tăng tốc từ 0-100 km/h chỉ trong 4 giây. C63 cũng được trang bị hệ thống treo thể thao và hệ thống phanh carbon-ceramic, giúp cải thiện hiệu suất và khả năng vận hành của xe. Thiết kế của C63 cũng rất đẳng cấp với đường nét thể thao, cabin sang trọng và nhiều tính năng tiện ích. Mercedes-Benz C63 là một trong những mẫu xe thể thao cao cấp và được yêu thích nhất trên thị trường, phù hợp cho những người đam mê tốc độ và động cơ mạnh mẽ.', 'img/car-rent-5.png', 'Mer', 12000000000, 2021, 'Xe 4 chỗ', 3),
(3, 'ABC3', 'BMW X6', 'BMW X6 là một mẫu xe thể thao đa dụng (SUV) hiện đại và sang trọng của hãng BMW. Xe được trang bị động cơ mạnh mẽ với nhiều phiên bản khác nhau, đáp ứng nhu cầu vận hành của khách hàng. Thiết kế của BMW X6 cũng rất đặc biệt với kiểu dáng lạ mắt, hầm hố và năng động. Nội thất của xe được trang bị những tính năng tiên tiến như hệ thống giải trí cao cấp, hệ thống âm thanh nổi bật, cửa sổ trời, và rất nhiều tiện nghi khác. Hơn nữa, BMW X6 còn có khả năng vận hành tuyệt vời, với hệ thống lái chính xác và khả năng định vị địa hình thông minh. Đây là một chiếc xe đa dụng phù hợp cho những người yêu thích sự tiện nghi và đẳng cấp.', 'img/car-rent-2.png', 'BM', 23000000000, 2022, 'Xe 4 chỗ', 0),
(4, 'ABC4', 'Ferrari LaFerrari Spider', 'Ferrari LaFerrari Spider là một trong những siêu xe mạnh mẽ và đắt giá nhất của hãng xe Ý Ferrari. Được giới thiệu vào năm 2016, LaFerrari Spider sử dụng động cơ hybrid V12 6.3L kết hợp với một động cơ điện, mang lại tổng công suất lên đến 950 mã lực và mô-men xoắn cực đại 900 Nm. Xe có thể tăng tốc từ 0-100 km/h chỉ trong 2,9 giây và đạt tốc độ tối đa lên tới 350 km/h. Thiết kế của LaFerrari Spider rất bắt mắt với đường nét tinh tế và phong cách sang trọng. Xe được sản xuất giới hạn chỉ 209 chiếc trên toàn thế giới, đảm bảo tính độc đáo và giá trị của nó. Ferrari LaFerrari Spider là một trong những siêu xe đẳng cấp và hiếm có nhất trên thị trường, được săn đón bởi những người yêu thích tốc độ và sự độc đáo.', 'img/Ferrari2.png', 'Fer', 8200000000, 2018, 'Xe 2 chỗ', 2),
(5, 'ABC5', 'Ferrari 488 GTB', 'Ferrari 488 GTB là một trong những mẫu xe thể thao hiệu suất cao của hãng xe Ý Ferrari. Xe được trang bị động cơ V8 3.9L tăng áp kép, cho phép tăng tốc từ 0-100 km/h chỉ trong 3 giây và đạt tốc độ tối đa lên đến 330 km/h. Thiết kế của 488 GTB rất đặc trưng với đường nét tinh tế và cân đối, cabin sang trọng và nhiều tính năng tiện ích. Đây là một trong những mẫu xe thể thao được ưa chuộng nhất trên thị trường, phù hợp cho những người đam mê tốc độ và sự độc đáo.\r\n\r\nFerrari 488 Spider cũng là một mẫu xe thể thao hiệu suất cao của Ferrari, với thiết kế mui trần đặc trưng và công nghệ tăng áp kép, giúp xe đạt công suất lên đến 661 mã lực và mô-men xoắn cực đại 760 Nm. Xe có khả năng tăng tốc từ 0-100 km/h chỉ trong 3 giây và đạt tốc độ tối đa lên đến 325 km/h. Thiết kế của 488 Spider cũng rất đẳng cấp với đường nét thể thao và cân đối, cabin sang trọng và nhiều tính năng tiện ích. Ferrari 488 Spider là một trong những mẫu xe mui trần thể thao đẳng cấp và được yêu thích nhất trên thị trường.', 'img/Ferrari3.png', 'Fer', 9600000000, 2019, 'Xe 2 chỗ', 2),
(6, 'ABC6', 'Ferrari 488 Spider', 'Ferrari 488 Spider là một trong những mẫu xe thể thao hiệu suất cao của Ferrari, với thiết kế mui trần đặc trưng và công nghệ tăng áp kép, giúp xe đạt công suất lên đến 661 mã lực và mô-men xoắn cực đại 760 Nm. Xe có khả năng tăng tốc từ 0-100 km/h chỉ trong 3 giây và đạt tốc độ tối đa lên đến 325 km/h. Thiết kế của 488 Spider cũng rất đẳng cấp với đường nét thể thao và cân đối, cabin sang trọng và nhiều tính năng tiện ích. Ferrari 488 Spider là một trong những mẫu xe mui trần thể thao đẳng cấp và được yêu thích nhất trên thị trường.', 'img/Ferrari4.png', 'Fer', 19250000000, 2010, 'Xe 2 chỗ', 2),
(7, 'ABC7', 'Lamborghini Aventador', 'Lamborghini Aventador là một trong những mẫu siêu xe thể thao hiệu suất cao của hãng xe Ý Lamborghini, được trang bị động cơ V12, với công suất tối đa lên đến 770 mã lực và mô-men xoắn cực đại 720 Nm. Xe có khả năng tăng tốc từ 0-100 km/h chỉ trong 2,9 giây và đạt tốc độ tối đa lên đến 350 km/h. Thiết kế của Aventador đầy ấn tượng với đường nét sắc cạnh và cơ bắp, cabin tối giản nhưng sang trọng và tiện nghi. Được trang bị những công nghệ tiên tiến nhất, Aventador là biểu tượng của sự sang trọng, quyền lực và đẳng cấp của một siêu xe thể thao.', 'img/Lamborghini1.png', 'Lam', 27000000000, 2018, 'Xe 2 chỗ', 1),
(8, 'ABC8', 'Lamborghini Huracan', 'Lamborghini Huracan là một trong những mẫu siêu xe thể thao hiệu suất cao của hãng xe Ý Lamborghini, được trang bị động cơ V10, với công suất lên đến 640 mã lực và mô-men xoắn cực đại 600 Nm. Xe có khả năng tăng tốc từ 0-100 km/h chỉ trong 2,9 giây và đạt tốc độ tối đa lên đến 325 km/h. Thiết kế của Huracan rất đặc trưng với đường nét sắc cạnh, thân xe được làm bằng sợi carbon giúp giảm trọng lượng và tăng độ cứng vững, cabin sang trọng với nhiều tính năng tiện ích. Với tốc độ và sức mạnh đáng kinh ngạc, Huracan là biểu tượng của sự đam mê, tốc độ và phong cách cuồng nhiệt trong thế giới siêu xe.', 'img/Lamborghini2.png', 'Lam', 16000000000, 2010, 'Xe 2 chỗ', 1),
(9, 'ABC9', 'Lamborghini Murcielago', 'Lamborghini Murcielago là một trong những siêu xe thể thao hiệu suất cao nổi tiếng của hãng xe Ý Lamborghini, được trang bị động cơ V12, với công suất tối đa lên đến 661 mã lực và mô-men xoắn cực đại 660 Nm. Xe có khả năng tăng tốc từ 0-100 km/h chỉ trong 3,4 giây và đạt tốc độ tối đa lên đến 330 km/h. Thiết kế của Murcielago đầy ấn tượng với đường nét sắc cạnh và cơ bắp, cabin được thiết kế tối giản nhưng vẫn đầy sang trọng và tiện nghi. Với tốc độ và sức mạnh vượt trội, Murcielago là biểu tượng của sự đam mê, quyền lực và thể thao trong thế giới siêu xe.\r\n\r\n\r\n\r\n\r\n\r\n', 'img/Lamborghini3.png', 'Lam', 23000000000, 2021, 'Xe 2 chỗ', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `IDTK` int(11) NOT NULL,
  `MatKhau` varchar(60) NOT NULL,
  `SDT` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`IDTK`, `MatKhau`, `SDT`, `Email`, `Status`) VALUES
(24, '$2y$10$Xv.lqbDbBtCjmOlmbQdRWex3MR03HNpSPU9Eq.xCO6toBqSAoVePq', '0123456789', 'leminhkhoi.cuchi@gmail.com', 'None'),
(25, '$2y$10$FEQ6b0aRwL1QrV93t6Vhmu0H.dSWMzkV/t6Rs0GFIrVooJUA..Wvq', '0325102255', 'lmk@gmail.com', 'None'),
(22, '$2y$10$veYTJy4h0I049fBYHXtG4uYAmJP5ng6aUgrlINDctRj87FMc5MCBC', '0356200443', 'admin12311@gmail.com', 'None'),
(23, '$2y$10$pxHMjowgvjKPa2U2PKTfdOyY3Gv9aDoBEFaXQid48U8mjORWU7MtS', '0583304578', 'admin1@gmail.com', 'Block'),
(21, '$2y$10$jgygQI.zQUXZtx0WQMxw2.pOWthhDcJb62hrgNdOslpCtfdUYDuRa', '0939514756', 'admin123@gmail.com', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `IDTH` int(11) NOT NULL,
  `MaTH` varchar(10) NOT NULL,
  `TenTH` varchar(100) NOT NULL,
  `XuatXu` varchar(30) NOT NULL,
  `SoLuong` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieu`
--

INSERT INTO `thuonghieu` (`IDTH`, `MaTH`, `TenTH`, `XuatXu`, `SoLuong`) VALUES
(6, 'Au', 'Audi', 'Đức', 10),
(2, 'BM', 'BMW', 'Đức', 10),
(7, 'Bu', 'Bugatti', 'Pháp', 10),
(3, 'Fer', 'Ferrari', 'Ý', 10),
(4, 'Lam', 'Lamborghini', 'Ý', 10),
(1, 'Mer', 'Mercedes', 'Đức', 10),
(8, 'NN', 'NoName', 'Việt Nam', 20),
(5, 'Vin', 'VinFast', 'Việt Nam', 10);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDH`),
  ADD UNIQUE KEY `IDDH` (`IDDH`),
  ADD KEY `link3` (`MaKH`),
  ADD KEY `link4` (`MaSP`);

--
-- Chỉ mục cho bảng `donhang_pk`
--
ALTER TABLE `donhang_pk`
  ADD PRIMARY KEY (`MaDHPK`),
  ADD UNIQUE KEY `IDDHPK` (`IDDHPK`),
  ADD KEY `linkk` (`MaPK`),
  ADD KEY `linkkkkk` (`MaKH`),
  ADD KEY `linkkkkkkkk` (`MaHDPK`);

--
-- Chỉ mục cho bảng `hinhanhlienquansp`
--
ALTER TABLE `hinhanhlienquansp`
  ADD PRIMARY KEY (`MaHA`),
  ADD UNIQUE KEY `IDHA` (`IDHA`),
  ADD KEY `link5` (`MaSP`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD UNIQUE KEY `IDHD` (`IDHD`),
  ADD KEY `link2` (`MaDH`);

--
-- Chỉ mục cho bảng `hoadon_pk`
--
ALTER TABLE `hoadon_pk`
  ADD PRIMARY KEY (`MaHDPK`),
  ADD UNIQUE KEY `IDHDPK` (`IDHDPK`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`MaKH`,`SDT`),
  ADD UNIQUE KEY `IDKH` (`IDKH`),
  ADD KEY `SDT` (`SDT`);

--
-- Chỉ mục cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  ADD PRIMARY KEY (`MaLoai`),
  ADD UNIQUE KEY `idLoai` (`idLoai`);

--
-- Chỉ mục cho bảng `phukien`
--
ALTER TABLE `phukien`
  ADD PRIMARY KEY (`MaPK`),
  ADD UNIQUE KEY `IDPK` (`IDPK`),
  ADD KEY `linkh` (`MaTH`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSP`),
  ADD UNIQUE KEY `IDSP` (`IDSP`),
  ADD KEY `fk` (`MaLoai`),
  ADD KEY `link` (`MaTH`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`SDT`),
  ADD UNIQUE KEY `IDTK` (`IDTK`);

--
-- Chỉ mục cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  ADD PRIMARY KEY (`MaTH`),
  ADD UNIQUE KEY `IDTH` (`IDTH`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `IDDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `donhang_pk`
--
ALTER TABLE `donhang_pk`
  MODIFY `IDDHPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `hinhanhlienquansp`
--
ALTER TABLE `hinhanhlienquansp`
  MODIFY `IDHA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `IDHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `hoadon_pk`
--
ALTER TABLE `hoadon_pk`
  MODIFY `IDHDPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `IDKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `loaisp`
--
ALTER TABLE `loaisp`
  MODIFY `idLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `phukien`
--
ALTER TABLE `phukien`
  MODIFY `IDPK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `IDSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `IDTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `thuonghieu`
--
ALTER TABLE `thuonghieu`
  MODIFY `IDTH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `link3` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `link4` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `donhang_pk`
--
ALTER TABLE `donhang_pk`
  ADD CONSTRAINT `linkk` FOREIGN KEY (`MaPK`) REFERENCES `phukien` (`MaPK`),
  ADD CONSTRAINT `linkkkkk` FOREIGN KEY (`MaKH`) REFERENCES `khachhang` (`MaKH`),
  ADD CONSTRAINT `linkkkkkkkk` FOREIGN KEY (`MaHDPK`) REFERENCES `hoadon_pk` (`MaHDPK`);

--
-- Các ràng buộc cho bảng `hinhanhlienquansp`
--
ALTER TABLE `hinhanhlienquansp`
  ADD CONSTRAINT `link5` FOREIGN KEY (`MaSP`) REFERENCES `sanpham` (`MaSP`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `link2` FOREIGN KEY (`MaDH`) REFERENCES `donhang` (`MaDH`);

--
-- Các ràng buộc cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD CONSTRAINT `khachhang_ibfk_1` FOREIGN KEY (`SDT`) REFERENCES `taikhoan` (`SDT`);

--
-- Các ràng buộc cho bảng `phukien`
--
ALTER TABLE `phukien`
  ADD CONSTRAINT `linkh` FOREIGN KEY (`MaTH`) REFERENCES `thuonghieu` (`MaTH`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk` FOREIGN KEY (`MaLoai`) REFERENCES `loaisp` (`MaLoai`),
  ADD CONSTRAINT `link` FOREIGN KEY (`MaTH`) REFERENCES `thuonghieu` (`MaTH`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
