-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 17, 2022 lúc 04:35 PM
-- Phiên bản máy phục vụ: 10.4.20-MariaDB
-- Phiên bản PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webfilm`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuDoAnTheoNam` (`yearValue` INT)  BEGIN
	SELECT
		do_an.ten,
		loai_do_an.ten AS 'loai do an',
		sum( so_luong ) AS 'So_Luong',
		sum( tong_tien ) AS 'Tong_tien' 
	FROM
		hoa_don_chi_tiet
		INNER JOIN hoa_don ON hoa_don_chi_tiet.hoa_don_id = hoa_don.id
		INNER JOIN do_an_chi_tiet ON hoa_don_chi_tiet.do_an_chi_tiet_id = do_an_chi_tiet.id
		INNER JOIN do_an ON do_an_chi_tiet.do_an_id = do_an.id
		INNER JOIN loai_do_an ON do_an.loai_do_an_id = loai_do_an.id 
	WHERE
		YEAR ( hoa_don.ngay_ban ) = yearValue 
	GROUP BY
		do_an.ten,
		loai_do_an.ten;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuDoAnTheoNgay` (`dateValue` DATE)  BEGIN
	SELECT
		do_an.ten,
		loai_do_an.ten AS 'loai do an',
		sum( so_luong ) AS 'So_Luong',
		sum( tong_tien ) AS 'Tong_tien' 
	FROM
		hoa_don_chi_tiet
		INNER JOIN hoa_don ON hoa_don_chi_tiet.hoa_don_id = hoa_don.id
		INNER JOIN do_an_chi_tiet ON hoa_don_chi_tiet.do_an_chi_tiet_id = do_an_chi_tiet.id
		INNER JOIN do_an ON do_an_chi_tiet.do_an_id = do_an.id
		INNER JOIN loai_do_an ON do_an.loai_do_an_id = loai_do_an.id 
	WHERE
		hoa_don.ngay_ban = dateValue 
	GROUP BY
		do_an.ten,
		loai_do_an.ten;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuDoAnTheoThang` (`monthValue` INT, `yearValue` INT)  BEGIN
	SELECT
		do_an.ten,
		loai_do_an.ten AS 'loai do an',
		sum( so_luong ) AS 'So_Luong',
		sum( tong_tien ) AS 'Tong_tien' 
	FROM
		hoa_don_chi_tiet
		INNER JOIN hoa_don ON hoa_don_chi_tiet.hoa_don_id = hoa_don.id
		INNER JOIN do_an_chi_tiet ON hoa_don_chi_tiet.do_an_chi_tiet_id = do_an_chi_tiet.id
		INNER JOIN do_an ON do_an_chi_tiet.do_an_id = do_an.id
		INNER JOIN loai_do_an ON do_an.loai_do_an_id = loai_do_an.id 
	WHERE
		MONTH ( hoa_don.ngay_ban ) = monthValue 
		AND YEAR ( hoa_don.ngay_ban ) = yearValue 
	GROUP BY
		do_an.ten,
		loai_do_an.ten;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuPhimTheoNam` (`yearValue` INT)  BEGIN
	SELECT
		p.ten ten_phim,
		p.ngay_cong_chieu ngay_cong_chieu,
		COUNT( * ) so_luong_ve_ban,
		COALESCE ( SUM( vb.tong_tien ), 0 ) doanh_thu 
	FROM
		phim p
		JOIN suat_chieu sc ON p.id = sc.phim_id
		JOIN ve_ban vb ON vb.suat_chieu_id = sc.id 
	WHERE
		YEAR ( vb.ngay_ban ) = yearValue 
	GROUP BY
		p.ten,
		p.ngay_cong_chieu;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuPhimTheoNgay` (`dateValue` DATE)  BEGIN
	SELECT
		p.ten ten_phim,
		p.ngay_cong_chieu ngay_cong_chieu,
		COUNT( * ) so_luong_ve_ban,
		COALESCE ( SUM( vb.tong_tien ), 0 ) doanh_thu 
	FROM
		phim p
		JOIN suat_chieu sc ON p.id = sc.phim_id
		JOIN ve_ban vb ON vb.suat_chieu_id = sc.id 
	WHERE
		vb.ngay_ban = dateValue 
	GROUP BY
		p.ten,
		p.ngay_cong_chieu;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuPhimTheoThang` (`monthValue` INT, `yearValue` INT)  BEGIN
	SELECT
		p.ten ten_phim,
		p.ngay_cong_chieu ngay_cong_chieu,
		COUNT( * ) so_luong_ve_ban,
		COALESCE ( SUM( vb.tong_tien ), 0 ) doanh_thu 
	FROM
		phim p
		JOIN suat_chieu sc ON p.id = sc.phim_id
		JOIN ve_ban vb ON vb.suat_chieu_id = sc.id 
	WHERE
		MONTH ( vb.ngay_ban ) = monthValue 
		AND YEAR ( sc.ngay_chieu ) = yearValue 
	GROUP BY
		p.ten,
		p.ngay_cong_chieu;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuVeBanTheoNam` (`yearValue` INT)  BEGIN
	select 
		CONCAT(month(ve_ban.ngay_ban), '-', year(ve_ban.ngay_ban)) as thang_nam,
		count(if(dinh_dang_phim_id = '2D',1,null)) as 2d,
		count(if(dinh_dang_phim_id = '3D',1,null)) as 3d,
		count(if(dinh_dang_phim_id = '4D',1,null)) as 4d,
		count(if(dinh_dang_phim_id = 'IMAX',1,null)) as imax,
		count(if(ve_ban.ve_dat_id is not null,1,null)) as 'online',
		count(if(ve_ban.ve_dat_id is null,1,null)) as 'offline',
		count(*) as 'tong ve',
		coalesce(sum(ve_ban.tong_tien),0) doanh_thu
	from suat_chieu 
		inner join ve_ban on ve_ban.suat_chieu_id = suat_chieu.id
        where year(ve_ban.ngay_ban) = yearValue
        group by thang_nam;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuVeBanTheoNgay` (`dateValue` DATE)  BEGIN
	select 
		ve_ban.ngay_ban,
		count(if(dinh_dang_phim_id = '2D',1,null)) as 2d,
		count(if(dinh_dang_phim_id = '3D',1,null)) as 3d,
		count(if(dinh_dang_phim_id = '4D',1,null)) as 4d,
		count(if(dinh_dang_phim_id = 'IMAX',1,null)) as imax,
		count(if(ve_ban.ve_dat_id is not null,1,null)) as 'online',
		count(if(ve_ban.ve_dat_id is null,1,null)) as 'offline',
		count(*) as 'tong ve',
		coalesce(sum(ve_ban.tong_tien),0) doanh_thu
	from suat_chieu 
		inner join ve_ban on ve_ban.suat_chieu_id = suat_chieu.id
        where ve_ban.ngay_ban = dateValue
        group by ve_ban.ngay_ban;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_DoanhThuVeBanTheoThang` (`monthValue` INT, `yearValue` INT)  BEGIN
	select 
		ve_ban.ngay_ban,
		count(if(dinh_dang_phim_id = '2D',1,null)) as '2d',
		count(if(dinh_dang_phim_id = '3D',1,null)) as '3d',
		count(if(dinh_dang_phim_id = '4D',1,null)) as '4d',
		count(if(dinh_dang_phim_id = 'IMAX',1,null)) as 'imax',
		count(if(ve_ban.ve_dat_id is not null,1,null)) as 'online',
		count(if(ve_ban.ve_dat_id is null,1,null)) as 'offline',
		count(*) as 'tong ve',
		coalesce(sum(ve_ban.tong_tien),0) doanh_thu
	from suat_chieu 
		inner join ve_ban on ve_ban.suat_chieu_id = suat_chieu.id
        where month(ve_ban.ngay_ban) = monthValue and year(ve_ban.ngay_ban) = yearValue
        group by ve_ban.ngay_ban;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TongDoanhThuTheoNam` (`yearValue` INT)  BEGIN
	SELECT
		thong_ke.thang_ban thang_ban,
		COALESCE ( SUM( thong_ke.tien_do_an ), 0 ) do_an,
		COALESCE ( SUM( thong_ke.tien_ve_ban ), 0 ) ve_ban,
		(
			COALESCE ( SUM( thong_ke.tien_ve_ban ), 0 ) + COALESCE ( SUM( thong_ke.tien_do_an ), 0 ) 
		) tong_doanh_thu 
	FROM
		(
		SELECT
			0 tien_ve_ban,
			COALESCE ( SUM( hdct.tong_tien ), 0 ) tien_do_an,
			COALESCE ( SUM( hdct.tong_tien ), 0 ) tong_doanh_thu,
			MONTH ( hd.ngay_ban ) thang_ban 
		FROM
			hoa_don hd
			JOIN hoa_don_chi_tiet hdct ON hdct.hoa_don_id = hd.id 
		WHERE
			YEAR ( hd.ngay_ban ) = yearValue 
		GROUP BY
			hd.ngay_ban UNION
		SELECT COALESCE
			( SUM( vb.tong_tien ), 0 ) tien_ve_ban,
			0 tien_do_an,
			COALESCE ( SUM( vb.tong_tien ), 0 ) tong_doanh_thu,
			MONTH ( vb.ngay_ban ) thang_ban 
		FROM
			ve_ban vb 
		WHERE
			YEAR ( vb.ngay_ban ) = yearValue 
		GROUP BY
			vb.ngay_ban 
		) AS thong_ke 
	GROUP BY
		thong_ke.thang_ban
		ORDER BY thong_ke.thang_ban;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TongDoanhThuTheoNgay` (`dateValue` DATE)  BEGIN
	SELECT
		thong_ke.ngay_ban ngay_ban,
		COALESCE ( SUM( thong_ke.tien_do_an ), 0 ) do_an,
		COALESCE ( SUM( thong_ke.tien_ve_ban ), 0 ) ve_ban,
		(
			COALESCE ( SUM( thong_ke.tien_ve_ban ), 0 ) + COALESCE ( SUM( thong_ke.tien_do_an ), 0 ) 
		) tong_doanh_thu 
	FROM
		(
		SELECT
			0 tien_ve_ban,
			COALESCE ( SUM( hdct.tong_tien ), 0 ) tien_do_an,
			COALESCE ( SUM( hdct.tong_tien ), 0 ) tong_doanh_thu,
			hd.ngay_ban ngay_ban 
		FROM
			hoa_don hd
			JOIN hoa_don_chi_tiet hdct ON hdct.hoa_don_id = hd.id 
		WHERE
			( hd.ngay_ban = dateValue ) 
		GROUP BY
			hd.ngay_ban UNION
		SELECT COALESCE
			( SUM( vb.tong_tien ), 0 ) tien_ve_ban,
			0 tien_do_an,
			COALESCE ( SUM( vb.tong_tien ), 0 ) tong_doanh_thu,
			vb.ngay_ban ngay_ban 
		FROM
			ve_ban vb 
		WHERE
			( vb.ngay_ban = dateValue )
		GROUP BY
			vb.ngay_ban 
		) AS thong_ke 
	GROUP BY
		thong_ke.ngay_ban;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_TongDoanhThuTheoThang` (`monthValue` INT, `yearValue` INT)  BEGIN
	SELECT
		thong_ke.ngay_ban ngay_ban,
		COALESCE ( SUM( thong_ke.tien_do_an ), 0 ) do_an,
		COALESCE ( SUM( thong_ke.tien_ve_ban ), 0 ) ve_ban,
		(
			COALESCE ( SUM( thong_ke.tien_ve_ban ), 0 ) + COALESCE ( SUM( thong_ke.tien_do_an ), 0 ) 
		) tong_doanh_thu 
	FROM
		(
		SELECT
			0 tien_ve_ban,
			COALESCE ( SUM( hdct.tong_tien ), 0 ) tien_do_an,
			COALESCE ( SUM( hdct.tong_tien ), 0 ) tong_doanh_thu,
			hd.ngay_ban ngay_ban 
		FROM
			hoa_don hd
			JOIN hoa_don_chi_tiet hdct ON hdct.hoa_don_id = hd.id 
		WHERE
			YEAR ( hd.ngay_ban ) = yearValue 
			AND MONTH ( hd.ngay_ban ) = monthValue 
		GROUP BY
			hd.ngay_ban UNION
		SELECT COALESCE
			( SUM( vb.tong_tien ), 0 ) tien_ve_ban,
			0 tien_do_an,
			COALESCE ( SUM( vb.tong_tien ), 0 ) tong_doanh_thu,
			vb.ngay_ban ngay_ban 
		FROM
			ve_ban vb 
		WHERE
			YEAR ( vb.ngay_ban ) = yearValue 
			AND MONTH ( vb.ngay_ban ) = monthValue 
		GROUP BY
			vb.ngay_ban 
		) AS thong_ke 
	GROUP BY
		thong_ke.ngay_ban
		ORDER BY thong_ke.ngay_ban;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dinh_dang_phim`
--

CREATE TABLE `dinh_dang_phim` (
  `id` varchar(5) NOT NULL,
  `ten` varchar(20) NOT NULL,
  `phu_thu` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `dinh_dang_phim`
--

INSERT INTO `dinh_dang_phim` (`id`, `ten`, `phu_thu`) VALUES
('2D', 'Định dạng 2D', 0),
('3D', 'Định dạng 3D', 20000),
('4D', 'Định dạng 4D', 35000),
('6D', 'Định dang 6D', 22200),
('IMAX', 'Định dạng IMAX', 50000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `do_an`
--

CREATE TABLE `do_an` (
  `id` varchar(15) NOT NULL,
  `ten` varchar(45) NOT NULL,
  `dang_ban` bit(1) NOT NULL,
  `da_xoa` bit(1) DEFAULT b'0',
  `loai_do_an_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `do_an`
--

INSERT INTO `do_an` (`id`, `ten`, `dang_ban`, `da_xoa`, `loai_do_an_id`) VALUES
('BK001', 'Bánh snack cua', b'1', b'0', 'BK'),
('BK002', 'Kẹo cay Fisherman\'s Friend', b'1', b'0', 'BK'),
('BK006', 'Haf nam', b'1', b'0', 'BK'),
('DA001', 'Bắp rangnh', b'1', b'0', 'DA'),
('DA002', 'Gà rán', b'1', b'0', 'DA'),
('DA003', 'Hamburger bò', b'1', b'0', 'DA'),
('DA004', 'Hot dog', b'1', b'0', 'DA'),
('NU001', 'Cocacola', b'1', b'0', 'NU'),
('NU002', 'Pepsi', b'1', b'0', 'NU'),
('NU003', 'Nước ép cam', b'1', b'0', 'NU'),
('NU004', 'Sting dâu', b'1', b'0', 'NU');

--
-- Bẫy `do_an`
--
DELIMITER $$
CREATE TRIGGER `do_an_BEFORE_INSERT` BEFORE INSERT ON `do_an` FOR EACH ROW BEGIN
	-- do dai cua chuoi so
    SET @numLenght := 3;
    
    -- lay id lon nhat trong bang
    SET @prevId := (SELECT id FROM do_an WHERE loai_do_an_id LIKE CONCAT(new.loai_do_an_id, '%')  ORDER BY id DESC LIMIT 1);
	
    -- neu bang chua co du lieu, thi lay la 000000000
    if @prevId IS NULL then
		SET @prevId := LPAD(0, @numLenght, '0');
	END IF;
    
    -- lay phan so tu chuoi id
    SET @num := RIGHT(@prevId, @numLenght);
    
    -- tang phan so len 1 don vi
	SET @num := CAST(@num AS UNSIGNED) + 1;

	-- them so 0 vao truoc num cho du n ky tu
    SET @num := LPAD(@num, @numLenght, '0');
    
    -- cap nhat lai id moi
	SET new.id := CONCAT(new.loai_do_an_id, @num);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `do_an_chi_tiet`
--

CREATE TABLE `do_an_chi_tiet` (
  `id` int(10) UNSIGNED NOT NULL,
  `don_gia` int(10) UNSIGNED NOT NULL,
  `dang_ban` bit(1) DEFAULT b'1',
  `do_an_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ghe_ngoi`
--

CREATE TABLE `ghe_ngoi` (
  `id` int(10) UNSIGNED NOT NULL,
  `vi_tri_day` varchar(1) NOT NULL,
  `vi_tri_cot` int(10) UNSIGNED NOT NULL,
  `phong_chieu_id` int(10) UNSIGNED NOT NULL,
  `loai_ghe_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ghe_ngoi`
--

INSERT INTO `ghe_ngoi` (`id`, `vi_tri_day`, `vi_tri_cot`, `phong_chieu_id`, `loai_ghe_id`) VALUES
(1, 'A', 1, 1, 'GT'),
(2, 'A', 2, 1, 'GT'),
(3, 'A', 3, 1, 'GT'),
(4, 'A', 4, 1, 'GT'),
(5, 'A', 5, 1, 'GT'),
(6, 'A', 6, 1, 'GT'),
(7, 'A', 7, 1, 'GT'),
(8, 'A', 8, 1, 'GT'),
(9, 'A', 9, 1, 'GT'),
(10, 'A', 10, 1, 'GT'),
(11, 'A', 11, 1, 'GT'),
(12, 'A', 12, 1, 'GT'),
(13, 'A', 13, 1, 'GT'),
(14, 'A', 14, 1, 'GT'),
(15, 'A', 15, 1, 'GT'),
(16, 'A', 16, 1, 'GT'),
(17, 'A', 17, 1, 'GT'),
(18, 'A', 18, 1, 'GT'),
(19, 'B', 1, 1, 'GT'),
(20, 'B', 2, 1, 'GT'),
(21, 'B', 3, 1, 'GT'),
(22, 'B', 4, 1, 'GT'),
(23, 'B', 5, 1, 'GT'),
(24, 'B', 6, 1, 'GT'),
(25, 'B', 7, 1, 'GT'),
(26, 'B', 8, 1, 'GT'),
(27, 'B', 9, 1, 'GT'),
(28, 'B', 10, 1, 'GT'),
(29, 'B', 11, 1, 'GT'),
(30, 'B', 12, 1, 'GT'),
(31, 'B', 13, 1, 'GT'),
(32, 'B', 14, 1, 'GT'),
(33, 'B', 15, 1, 'GT'),
(34, 'B', 16, 1, 'GT'),
(35, 'B', 17, 1, 'GT'),
(36, 'B', 18, 1, 'GT'),
(37, 'C', 1, 1, 'GT'),
(38, 'C', 2, 1, 'GT'),
(39, 'C', 3, 1, 'GT'),
(40, 'C', 4, 1, 'GT'),
(41, 'C', 5, 1, 'GT'),
(42, 'C', 6, 1, 'GT'),
(43, 'C', 7, 1, 'GT'),
(44, 'C', 8, 1, 'GT'),
(45, 'C', 9, 1, 'GT'),
(46, 'C', 10, 1, 'GT'),
(47, 'C', 11, 1, 'GT'),
(48, 'C', 12, 1, 'GT'),
(49, 'C', 13, 1, 'GT'),
(50, 'C', 14, 1, 'GT'),
(51, 'C', 15, 1, 'GT'),
(52, 'C', 16, 1, 'GT'),
(53, 'C', 17, 1, 'GT'),
(54, 'C', 18, 1, 'GT'),
(55, 'D', 1, 1, 'GT'),
(56, 'D', 2, 1, 'GT'),
(57, 'D', 3, 1, 'GT'),
(58, 'D', 4, 1, 'GT'),
(59, 'D', 5, 1, 'GT'),
(60, 'D', 6, 1, 'GT'),
(61, 'D', 7, 1, 'GT'),
(62, 'D', 8, 1, 'GT'),
(63, 'D', 9, 1, 'GT'),
(64, 'D', 10, 1, 'GT'),
(65, 'D', 11, 1, 'GT'),
(66, 'D', 12, 1, 'GT'),
(67, 'D', 13, 1, 'GT'),
(68, 'D', 14, 1, 'GT'),
(69, 'D', 15, 1, 'GT'),
(70, 'D', 16, 1, 'GT'),
(71, 'D', 17, 1, 'GT'),
(72, 'D', 18, 1, 'GT'),
(73, 'E', 1, 1, 'GT'),
(74, 'E', 2, 1, 'GT'),
(75, 'E', 3, 1, 'GT'),
(76, 'E', 4, 1, 'GV'),
(77, 'E', 5, 1, 'GV'),
(78, 'E', 6, 1, 'GV'),
(79, 'E', 7, 1, 'GV'),
(80, 'E', 8, 1, 'GV'),
(81, 'E', 9, 1, 'GV'),
(82, 'E', 10, 1, 'GV'),
(83, 'E', 11, 1, 'GV'),
(84, 'E', 12, 1, 'GV'),
(85, 'E', 13, 1, 'GV'),
(86, 'E', 14, 1, 'GV'),
(87, 'E', 15, 1, 'GV'),
(88, 'E', 16, 1, 'GT'),
(89, 'E', 17, 1, 'GT'),
(90, 'E', 18, 1, 'GT'),
(91, 'F', 1, 1, 'GT'),
(92, 'F', 2, 1, 'GT'),
(93, 'F', 3, 1, 'GT'),
(94, 'F', 4, 1, 'GV'),
(95, 'F', 5, 1, 'GV'),
(96, 'F', 6, 1, 'GV'),
(97, 'F', 7, 1, 'GV'),
(98, 'F', 8, 1, 'GV'),
(99, 'F', 9, 1, 'GV'),
(100, 'F', 10, 1, 'GV'),
(101, 'F', 11, 1, 'GV'),
(102, 'F', 12, 1, 'GV'),
(103, 'F', 13, 1, 'GV'),
(104, 'F', 14, 1, 'GV'),
(105, 'F', 15, 1, 'GV'),
(106, 'F', 16, 1, 'GT'),
(107, 'F', 17, 1, 'GT'),
(108, 'F', 18, 1, 'GT'),
(109, 'G', 1, 1, 'GT'),
(110, 'G', 2, 1, 'GT'),
(111, 'G', 3, 1, 'GT'),
(112, 'G', 4, 1, 'GV'),
(113, 'G', 5, 1, 'GV'),
(114, 'G', 6, 1, 'GV'),
(115, 'G', 7, 1, 'GV'),
(116, 'G', 8, 1, 'GV'),
(117, 'G', 9, 1, 'GV'),
(118, 'G', 10, 1, 'GV'),
(119, 'G', 11, 1, 'GV'),
(120, 'G', 12, 1, 'GV'),
(121, 'G', 13, 1, 'GV'),
(122, 'G', 14, 1, 'GV'),
(123, 'G', 15, 1, 'GV'),
(124, 'G', 16, 1, 'GT'),
(125, 'G', 17, 1, 'GT'),
(126, 'G', 18, 1, 'GT'),
(127, 'H', 1, 1, 'GT'),
(128, 'H', 2, 1, 'GT'),
(129, 'H', 3, 1, 'GT'),
(130, 'H', 4, 1, 'GV'),
(131, 'H', 5, 1, 'GV'),
(132, 'H', 6, 1, 'GV'),
(133, 'H', 7, 1, 'GV'),
(134, 'H', 8, 1, 'GV'),
(135, 'H', 9, 1, 'GV'),
(136, 'H', 10, 1, 'GV'),
(137, 'H', 11, 1, 'GV'),
(138, 'H', 12, 1, 'GV'),
(139, 'H', 13, 1, 'GV'),
(140, 'H', 14, 1, 'GV'),
(141, 'H', 15, 1, 'GV'),
(142, 'H', 16, 1, 'GT'),
(143, 'H', 17, 1, 'GT'),
(144, 'H', 18, 1, 'GT'),
(145, 'I', 1, 1, 'GT'),
(146, 'I', 2, 1, 'GT'),
(147, 'I', 3, 1, 'GT'),
(148, 'I', 4, 1, 'GV'),
(149, 'I', 5, 1, 'GV'),
(150, 'I', 6, 1, 'GV'),
(151, 'I', 7, 1, 'GV'),
(152, 'I', 8, 1, 'GV'),
(153, 'I', 9, 1, 'GV'),
(154, 'I', 10, 1, 'GV'),
(155, 'I', 11, 1, 'GV'),
(156, 'I', 12, 1, 'GV'),
(157, 'I', 13, 1, 'GV'),
(158, 'I', 14, 1, 'GV'),
(159, 'I', 15, 1, 'GV'),
(160, 'I', 16, 1, 'GT'),
(161, 'I', 17, 1, 'GT'),
(162, 'I', 18, 1, 'GT'),
(163, 'J', 1, 1, 'GT'),
(164, 'J', 2, 1, 'GT'),
(165, 'J', 3, 1, 'GT'),
(166, 'J', 4, 1, 'GV'),
(167, 'J', 5, 1, 'GV'),
(168, 'J', 6, 1, 'GV'),
(169, 'J', 7, 1, 'GV'),
(170, 'J', 8, 1, 'GV'),
(171, 'J', 9, 1, 'GV'),
(172, 'J', 10, 1, 'GV'),
(173, 'J', 11, 1, 'GV'),
(174, 'J', 12, 1, 'GV'),
(175, 'J', 13, 1, 'GV'),
(176, 'J', 14, 1, 'GV'),
(177, 'J', 15, 1, 'GV'),
(178, 'J', 16, 1, 'GT'),
(179, 'J', 17, 1, 'GT'),
(180, 'J', 18, 1, 'GT'),
(181, 'K', 1, 1, 'GT'),
(182, 'K', 2, 1, 'GT'),
(183, 'K', 3, 1, 'GT'),
(184, 'K', 4, 1, 'GT'),
(185, 'K', 5, 1, 'GT'),
(186, 'K', 6, 1, 'GT'),
(187, 'K', 7, 1, 'GT'),
(188, 'K', 8, 1, 'GT'),
(189, 'K', 9, 1, 'GT'),
(190, 'K', 10, 1, 'GT'),
(191, 'K', 11, 1, 'GT'),
(192, 'K', 12, 1, 'GT'),
(193, 'K', 13, 1, 'GT'),
(194, 'K', 14, 1, 'GT'),
(195, 'K', 15, 1, 'GT'),
(196, 'K', 16, 1, 'GT'),
(197, 'K', 17, 1, 'GT'),
(198, 'K', 18, 1, 'GT'),
(199, 'L', 1, 1, 'GT'),
(200, 'L', 2, 1, 'GT'),
(201, 'L', 3, 1, 'GT'),
(202, 'L', 4, 1, 'GT'),
(203, 'L', 5, 1, 'GT'),
(204, 'L', 6, 1, 'GT'),
(205, 'L', 7, 1, 'GT'),
(206, 'L', 8, 1, 'GT'),
(207, 'L', 9, 1, 'GT'),
(208, 'L', 10, 1, 'GT'),
(209, 'L', 11, 1, 'GT'),
(210, 'L', 12, 1, 'GT'),
(211, 'L', 13, 1, 'GT'),
(212, 'L', 14, 1, 'GT'),
(213, 'L', 15, 1, 'GT'),
(214, 'L', 16, 1, 'GT'),
(215, 'L', 17, 1, 'GT'),
(216, 'L', 18, 1, 'GT'),
(217, 'A', 1, 2, 'GT'),
(218, 'A', 2, 2, 'GT'),
(219, 'A', 3, 2, 'GT'),
(220, 'A', 4, 2, 'GT'),
(221, 'A', 5, 2, 'GT'),
(222, 'A', 6, 2, 'GT'),
(223, 'A', 7, 2, 'GT'),
(224, 'A', 8, 2, 'GT'),
(225, 'A', 9, 2, 'GT'),
(226, 'A', 10, 2, 'GT'),
(227, 'A', 11, 2, 'GT'),
(228, 'A', 12, 2, 'GT'),
(229, 'A', 13, 2, 'GT'),
(230, 'A', 14, 2, 'GT'),
(231, 'A', 15, 2, 'GT'),
(232, 'A', 16, 2, 'GT'),
(233, 'B', 1, 2, 'GT'),
(234, 'B', 2, 2, 'GT'),
(235, 'B', 3, 2, 'GT'),
(236, 'B', 4, 2, 'GT'),
(237, 'B', 5, 2, 'GT'),
(238, 'B', 6, 2, 'GT'),
(239, 'B', 7, 2, 'GT'),
(240, 'B', 8, 2, 'GT'),
(241, 'B', 9, 2, 'GT'),
(242, 'B', 10, 2, 'GT'),
(243, 'B', 11, 2, 'GT'),
(244, 'B', 12, 2, 'GT'),
(245, 'B', 13, 2, 'GT'),
(246, 'B', 14, 2, 'GT'),
(247, 'B', 15, 2, 'GT'),
(248, 'B', 16, 2, 'GT'),
(249, 'C', 1, 2, 'GT'),
(250, 'C', 2, 2, 'GT'),
(251, 'C', 3, 2, 'GT'),
(252, 'C', 4, 2, 'GT'),
(253, 'C', 5, 2, 'GT'),
(254, 'C', 6, 2, 'GT'),
(255, 'C', 7, 2, 'GT'),
(256, 'C', 8, 2, 'GT'),
(257, 'C', 9, 2, 'GT'),
(258, 'C', 10, 2, 'GT'),
(259, 'C', 11, 2, 'GT'),
(260, 'C', 12, 2, 'GT'),
(261, 'C', 13, 2, 'GT'),
(262, 'C', 14, 2, 'GT'),
(263, 'C', 15, 2, 'GT'),
(264, 'C', 16, 2, 'GT'),
(265, 'D', 1, 2, 'GT'),
(266, 'D', 2, 2, 'GT'),
(267, 'D', 3, 2, 'GT'),
(268, 'D', 4, 2, 'GT'),
(269, 'D', 5, 2, 'GT'),
(270, 'D', 6, 2, 'GT'),
(271, 'D', 7, 2, 'GT'),
(272, 'D', 8, 2, 'GT'),
(273, 'D', 9, 2, 'GT'),
(274, 'D', 10, 2, 'GT'),
(275, 'D', 11, 2, 'GT'),
(276, 'D', 12, 2, 'GT'),
(277, 'D', 13, 2, 'GT'),
(278, 'D', 14, 2, 'GT'),
(279, 'D', 15, 2, 'GT'),
(280, 'D', 16, 2, 'GT'),
(281, 'E', 1, 2, 'GT'),
(282, 'E', 2, 2, 'GT'),
(283, 'E', 3, 2, 'GT'),
(284, 'E', 4, 2, 'GV'),
(285, 'E', 5, 2, 'GV'),
(286, 'E', 6, 2, 'GV'),
(287, 'E', 7, 2, 'GV'),
(288, 'E', 8, 2, 'GV'),
(289, 'E', 9, 2, 'GV'),
(290, 'E', 10, 2, 'GV'),
(291, 'E', 11, 2, 'GV'),
(292, 'E', 12, 2, 'GV'),
(293, 'E', 13, 2, 'GV'),
(294, 'E', 14, 2, 'GT'),
(295, 'E', 15, 2, 'GT'),
(296, 'E', 16, 2, 'GT'),
(297, 'F', 1, 2, 'GT'),
(298, 'F', 2, 2, 'GT'),
(299, 'F', 3, 2, 'GT'),
(300, 'F', 4, 2, 'GV'),
(301, 'F', 5, 2, 'GV'),
(302, 'F', 6, 2, 'GV'),
(303, 'F', 7, 2, 'GV'),
(304, 'F', 8, 2, 'GV'),
(305, 'F', 9, 2, 'GV'),
(306, 'F', 10, 2, 'GV'),
(307, 'F', 11, 2, 'GV'),
(308, 'F', 12, 2, 'GV'),
(309, 'F', 13, 2, 'GV'),
(310, 'F', 14, 2, 'GT'),
(311, 'F', 15, 2, 'GT'),
(312, 'F', 16, 2, 'GT'),
(313, 'G', 1, 2, 'GT'),
(314, 'G', 2, 2, 'GT'),
(315, 'G', 3, 2, 'GT'),
(316, 'G', 4, 2, 'GV'),
(317, 'G', 5, 2, 'GV'),
(318, 'G', 6, 2, 'GV'),
(319, 'G', 7, 2, 'GV'),
(320, 'G', 8, 2, 'GV'),
(321, 'G', 9, 2, 'GV'),
(322, 'G', 10, 2, 'GV'),
(323, 'G', 11, 2, 'GV'),
(324, 'G', 12, 2, 'GV'),
(325, 'G', 13, 2, 'GV'),
(326, 'G', 14, 2, 'GT'),
(327, 'G', 15, 2, 'GT'),
(328, 'G', 16, 2, 'GT'),
(329, 'H', 1, 2, 'GT'),
(330, 'H', 2, 2, 'GT'),
(331, 'H', 3, 2, 'GT'),
(332, 'H', 4, 2, 'GV'),
(333, 'H', 5, 2, 'GV'),
(334, 'H', 6, 2, 'GV'),
(335, 'H', 7, 2, 'GV'),
(336, 'H', 8, 2, 'GV'),
(337, 'H', 9, 2, 'GV'),
(338, 'H', 10, 2, 'GV'),
(339, 'H', 11, 2, 'GV'),
(340, 'H', 12, 2, 'GV'),
(341, 'H', 13, 2, 'GV'),
(342, 'H', 14, 2, 'GT'),
(343, 'H', 15, 2, 'GT'),
(344, 'H', 16, 2, 'GT'),
(345, 'I', 1, 2, 'GT'),
(346, 'I', 2, 2, 'GT'),
(347, 'I', 3, 2, 'GT'),
(348, 'I', 4, 2, 'GT'),
(349, 'I', 5, 2, 'GT'),
(350, 'I', 6, 2, 'GT'),
(351, 'I', 7, 2, 'GT'),
(352, 'I', 8, 2, 'GT'),
(353, 'I', 9, 2, 'GT'),
(354, 'I', 10, 2, 'GT'),
(355, 'I', 11, 2, 'GT'),
(356, 'I', 12, 2, 'GT'),
(357, 'I', 13, 2, 'GT'),
(358, 'I', 14, 2, 'GT'),
(359, 'I', 15, 2, 'GT'),
(360, 'I', 16, 2, 'GT'),
(361, 'J', 1, 2, 'GT'),
(362, 'J', 2, 2, 'GT'),
(363, 'J', 3, 2, 'GT'),
(364, 'J', 4, 2, 'GT'),
(365, 'J', 5, 2, 'GT'),
(366, 'J', 6, 2, 'GT'),
(367, 'J', 7, 2, 'GT'),
(368, 'J', 8, 2, 'GT'),
(369, 'J', 9, 2, 'GT'),
(370, 'J', 10, 2, 'GT'),
(371, 'J', 11, 2, 'GT'),
(372, 'J', 12, 2, 'GT'),
(373, 'J', 13, 2, 'GT'),
(374, 'J', 14, 2, 'GT'),
(375, 'J', 15, 2, 'GT'),
(376, 'J', 16, 2, 'GT'),
(377, 'A', 1, 3, 'GT'),
(378, 'A', 2, 3, 'GT'),
(379, 'A', 3, 3, 'GT'),
(380, 'A', 4, 3, 'GT'),
(381, 'A', 5, 3, 'GT'),
(382, 'A', 6, 3, 'GT'),
(383, 'A', 7, 3, 'GT'),
(384, 'A', 8, 3, 'GT'),
(385, 'A', 9, 3, 'GT'),
(386, 'A', 10, 3, 'GT'),
(387, 'A', 11, 3, 'GT'),
(388, 'A', 12, 3, 'GT'),
(389, 'A', 13, 3, 'GT'),
(390, 'A', 14, 3, 'GT'),
(391, 'B', 1, 3, 'GT'),
(392, 'B', 2, 3, 'GT'),
(393, 'B', 3, 3, 'GT'),
(394, 'B', 4, 3, 'GT'),
(395, 'B', 5, 3, 'GT'),
(396, 'B', 6, 3, 'GT'),
(397, 'B', 7, 3, 'GT'),
(398, 'B', 8, 3, 'GT'),
(399, 'B', 9, 3, 'GT'),
(400, 'B', 10, 3, 'GT'),
(401, 'B', 11, 3, 'GT'),
(402, 'B', 12, 3, 'GT'),
(403, 'B', 13, 3, 'GT'),
(404, 'B', 14, 3, 'GT'),
(405, 'C', 1, 3, 'GT'),
(406, 'C', 2, 3, 'GT'),
(407, 'C', 3, 3, 'GT'),
(408, 'C', 4, 3, 'GT'),
(409, 'C', 5, 3, 'GT'),
(410, 'C', 6, 3, 'GT'),
(411, 'C', 7, 3, 'GT'),
(412, 'C', 8, 3, 'GT'),
(413, 'C', 9, 3, 'GT'),
(414, 'C', 10, 3, 'GT'),
(415, 'C', 11, 3, 'GT'),
(416, 'C', 12, 3, 'GT'),
(417, 'C', 13, 3, 'GT'),
(418, 'C', 14, 3, 'GT'),
(419, 'D', 1, 3, 'GT'),
(420, 'D', 2, 3, 'GT'),
(421, 'D', 3, 3, 'GT'),
(422, 'D', 4, 3, 'GT'),
(423, 'D', 5, 3, 'GT'),
(424, 'D', 6, 3, 'GT'),
(425, 'D', 7, 3, 'GT'),
(426, 'D', 8, 3, 'GT'),
(427, 'D', 9, 3, 'GT'),
(428, 'D', 10, 3, 'GT'),
(429, 'D', 11, 3, 'GT'),
(430, 'D', 12, 3, 'GT'),
(431, 'D', 13, 3, 'GT'),
(432, 'D', 14, 3, 'GT'),
(433, 'E', 1, 3, 'GT'),
(434, 'E', 2, 3, 'GT'),
(435, 'E', 3, 3, 'GT'),
(436, 'E', 4, 3, 'GV'),
(437, 'E', 5, 3, 'GV'),
(438, 'E', 6, 3, 'GV'),
(439, 'E', 7, 3, 'GV'),
(440, 'E', 8, 3, 'GV'),
(441, 'E', 9, 3, 'GV'),
(442, 'E', 10, 3, 'GV'),
(443, 'E', 11, 3, 'GV'),
(444, 'E', 12, 3, 'GT'),
(445, 'E', 13, 3, 'GT'),
(446, 'E', 14, 3, 'GT'),
(447, 'F', 1, 3, 'GT'),
(448, 'F', 2, 3, 'GT'),
(449, 'F', 3, 3, 'GT'),
(450, 'F', 4, 3, 'GV'),
(451, 'F', 5, 3, 'GV'),
(452, 'F', 6, 3, 'GV'),
(453, 'F', 7, 3, 'GV'),
(454, 'F', 8, 3, 'GV'),
(455, 'F', 9, 3, 'GV'),
(456, 'F', 10, 3, 'GV'),
(457, 'F', 11, 3, 'GV'),
(458, 'F', 12, 3, 'GT'),
(459, 'F', 13, 3, 'GT'),
(460, 'F', 14, 3, 'GT'),
(461, 'G', 1, 3, 'GT'),
(462, 'G', 2, 3, 'GT'),
(463, 'G', 3, 3, 'GT'),
(464, 'G', 4, 3, 'GV'),
(465, 'G', 5, 3, 'GV'),
(466, 'G', 6, 3, 'GV'),
(467, 'G', 7, 3, 'GV'),
(468, 'G', 8, 3, 'GV'),
(469, 'G', 9, 3, 'GV'),
(470, 'G', 10, 3, 'GV'),
(471, 'G', 11, 3, 'GV'),
(472, 'G', 12, 3, 'GT'),
(473, 'G', 13, 3, 'GT'),
(474, 'G', 14, 3, 'GT'),
(475, 'H', 1, 3, 'GT'),
(476, 'H', 2, 3, 'GT'),
(477, 'H', 3, 3, 'GT'),
(478, 'H', 4, 3, 'GV'),
(479, 'H', 5, 3, 'GV'),
(480, 'H', 6, 3, 'GV'),
(481, 'H', 7, 3, 'GV'),
(482, 'H', 8, 3, 'GV'),
(483, 'H', 9, 3, 'GV'),
(484, 'H', 10, 3, 'GV'),
(485, 'H', 11, 3, 'GV'),
(486, 'H', 12, 3, 'GT'),
(487, 'H', 13, 3, 'GT'),
(488, 'H', 14, 3, 'GT'),
(489, 'I', 1, 3, 'GT'),
(490, 'I', 2, 3, 'GT'),
(491, 'I', 3, 3, 'GT'),
(492, 'I', 4, 3, 'GT'),
(493, 'I', 5, 3, 'GT'),
(494, 'I', 6, 3, 'GT'),
(495, 'I', 7, 3, 'GT'),
(496, 'I', 8, 3, 'GT'),
(497, 'I', 9, 3, 'GT'),
(498, 'I', 10, 3, 'GT'),
(499, 'I', 11, 3, 'GT'),
(500, 'I', 12, 3, 'GT'),
(501, 'I', 13, 3, 'GT'),
(502, 'I', 14, 3, 'GT'),
(503, 'J', 1, 3, 'GT'),
(504, 'J', 2, 3, 'GT'),
(505, 'J', 3, 3, 'GT'),
(506, 'J', 4, 3, 'GT'),
(507, 'J', 5, 3, 'GT'),
(508, 'J', 6, 3, 'GT'),
(509, 'J', 7, 3, 'GT'),
(510, 'J', 8, 3, 'GT'),
(511, 'J', 9, 3, 'GT'),
(512, 'J', 10, 3, 'GT'),
(513, 'J', 11, 3, 'GT'),
(514, 'J', 12, 3, 'GT'),
(515, 'J', 13, 3, 'GT'),
(516, 'J', 14, 3, 'GT'),
(517, 'A', 1, 4, 'GT'),
(518, 'A', 2, 4, 'GT'),
(519, 'A', 3, 4, 'GT'),
(520, 'A', 4, 4, 'GT'),
(521, 'A', 5, 4, 'GT'),
(522, 'A', 6, 4, 'GT'),
(523, 'A', 7, 4, 'GT'),
(524, 'A', 8, 4, 'GT'),
(525, 'A', 9, 4, 'GT'),
(526, 'A', 10, 4, 'GT'),
(527, 'A', 11, 4, 'GT'),
(528, 'A', 12, 4, 'GT'),
(529, 'A', 13, 4, 'GT'),
(530, 'A', 14, 4, 'GT'),
(531, 'A', 15, 4, 'GT'),
(532, 'A', 16, 4, 'GT'),
(533, 'B', 1, 4, 'GT'),
(534, 'B', 2, 4, 'GT'),
(535, 'B', 3, 4, 'GT'),
(536, 'B', 4, 4, 'GT'),
(537, 'B', 5, 4, 'GT'),
(538, 'B', 6, 4, 'GT'),
(539, 'B', 7, 4, 'GT'),
(540, 'B', 8, 4, 'GT'),
(541, 'B', 9, 4, 'GT'),
(542, 'B', 10, 4, 'GT'),
(543, 'B', 11, 4, 'GT'),
(544, 'B', 12, 4, 'GT'),
(545, 'B', 13, 4, 'GT'),
(546, 'B', 14, 4, 'GT'),
(547, 'B', 15, 4, 'GT'),
(548, 'B', 16, 4, 'GT'),
(549, 'C', 1, 4, 'GT'),
(550, 'C', 2, 4, 'GT'),
(551, 'C', 3, 4, 'GT'),
(552, 'C', 4, 4, 'GT'),
(553, 'C', 5, 4, 'GT'),
(554, 'C', 6, 4, 'GT'),
(555, 'C', 7, 4, 'GT'),
(556, 'C', 8, 4, 'GT'),
(557, 'C', 9, 4, 'GT'),
(558, 'C', 10, 4, 'GT'),
(559, 'C', 11, 4, 'GT'),
(560, 'C', 12, 4, 'GT'),
(561, 'C', 13, 4, 'GT'),
(562, 'C', 14, 4, 'GT'),
(563, 'C', 15, 4, 'GT'),
(564, 'C', 16, 4, 'GT'),
(565, 'D', 1, 4, 'GT'),
(566, 'D', 2, 4, 'GT'),
(567, 'D', 3, 4, 'GT'),
(568, 'D', 4, 4, 'GT'),
(569, 'D', 5, 4, 'GT'),
(570, 'D', 6, 4, 'GT'),
(571, 'D', 7, 4, 'GT'),
(572, 'D', 8, 4, 'GT'),
(573, 'D', 9, 4, 'GT'),
(574, 'D', 10, 4, 'GT'),
(575, 'D', 11, 4, 'GT'),
(576, 'D', 12, 4, 'GT'),
(577, 'D', 13, 4, 'GT'),
(578, 'D', 14, 4, 'GT'),
(579, 'D', 15, 4, 'GT'),
(580, 'D', 16, 4, 'GT'),
(581, 'E', 1, 4, 'GT'),
(582, 'E', 2, 4, 'GT'),
(583, 'E', 3, 4, 'GT'),
(584, 'E', 4, 4, 'GV'),
(585, 'E', 5, 4, 'GV'),
(586, 'E', 6, 4, 'GV'),
(587, 'E', 7, 4, 'GV'),
(588, 'E', 8, 4, 'GV'),
(589, 'E', 9, 4, 'GV'),
(590, 'E', 10, 4, 'GV'),
(591, 'E', 11, 4, 'GV'),
(592, 'E', 12, 4, 'GV'),
(593, 'E', 13, 4, 'GV'),
(594, 'E', 14, 4, 'GT'),
(595, 'E', 15, 4, 'GT'),
(596, 'E', 16, 4, 'GT'),
(597, 'F', 1, 4, 'GT'),
(598, 'F', 2, 4, 'GT'),
(599, 'F', 3, 4, 'GT'),
(600, 'F', 4, 4, 'GV'),
(601, 'F', 5, 4, 'GV'),
(602, 'F', 6, 4, 'GV'),
(603, 'F', 7, 4, 'GV'),
(604, 'F', 8, 4, 'GV'),
(605, 'F', 9, 4, 'GV'),
(606, 'F', 10, 4, 'GV'),
(607, 'F', 11, 4, 'GV'),
(608, 'F', 12, 4, 'GV'),
(609, 'F', 13, 4, 'GV'),
(610, 'F', 14, 4, 'GT'),
(611, 'F', 15, 4, 'GT'),
(612, 'F', 16, 4, 'GT'),
(613, 'G', 1, 4, 'GT'),
(614, 'G', 2, 4, 'GT'),
(615, 'G', 3, 4, 'GT'),
(616, 'G', 4, 4, 'GV'),
(617, 'G', 5, 4, 'GV'),
(618, 'G', 6, 4, 'GV'),
(619, 'G', 7, 4, 'GV'),
(620, 'G', 8, 4, 'GV'),
(621, 'G', 9, 4, 'GV'),
(622, 'G', 10, 4, 'GV'),
(623, 'G', 11, 4, 'GV'),
(624, 'G', 12, 4, 'GV'),
(625, 'G', 13, 4, 'GV'),
(626, 'G', 14, 4, 'GT'),
(627, 'G', 15, 4, 'GT'),
(628, 'G', 16, 4, 'GT'),
(629, 'H', 1, 4, 'GT'),
(630, 'H', 2, 4, 'GT'),
(631, 'H', 3, 4, 'GT'),
(632, 'H', 4, 4, 'GV'),
(633, 'H', 5, 4, 'GV'),
(634, 'H', 6, 4, 'GV'),
(635, 'H', 7, 4, 'GV'),
(636, 'H', 8, 4, 'GV'),
(637, 'H', 9, 4, 'GV'),
(638, 'H', 10, 4, 'GV'),
(639, 'H', 11, 4, 'GV'),
(640, 'H', 12, 4, 'GV'),
(641, 'H', 13, 4, 'GV'),
(642, 'H', 14, 4, 'GT'),
(643, 'H', 15, 4, 'GT'),
(644, 'H', 16, 4, 'GT'),
(645, 'I', 1, 4, 'GT'),
(646, 'I', 2, 4, 'GT'),
(647, 'I', 3, 4, 'GT'),
(648, 'I', 4, 4, 'GV'),
(649, 'I', 5, 4, 'GV'),
(650, 'I', 6, 4, 'GV'),
(651, 'I', 7, 4, 'GV'),
(652, 'I', 8, 4, 'GV'),
(653, 'I', 9, 4, 'GV'),
(654, 'I', 10, 4, 'GV'),
(655, 'I', 11, 4, 'GV'),
(656, 'I', 12, 4, 'GV'),
(657, 'I', 13, 4, 'GV'),
(658, 'I', 14, 4, 'GT'),
(659, 'I', 15, 4, 'GT'),
(660, 'I', 16, 4, 'GT'),
(661, 'J', 1, 4, 'GT'),
(662, 'J', 2, 4, 'GT'),
(663, 'J', 3, 4, 'GT'),
(664, 'J', 4, 4, 'GV'),
(665, 'J', 5, 4, 'GV'),
(666, 'J', 6, 4, 'GV'),
(667, 'J', 7, 4, 'GV'),
(668, 'J', 8, 4, 'GV'),
(669, 'J', 9, 4, 'GV'),
(670, 'J', 10, 4, 'GV'),
(671, 'J', 11, 4, 'GV'),
(672, 'J', 12, 4, 'GV'),
(673, 'J', 13, 4, 'GV'),
(674, 'J', 14, 4, 'GT'),
(675, 'J', 15, 4, 'GT'),
(676, 'J', 16, 4, 'GT'),
(677, 'K', 1, 4, 'GT'),
(678, 'K', 2, 4, 'GT'),
(679, 'K', 3, 4, 'GT'),
(680, 'K', 4, 4, 'GT'),
(681, 'K', 5, 4, 'GT'),
(682, 'K', 6, 4, 'GT'),
(683, 'K', 7, 4, 'GT'),
(684, 'K', 8, 4, 'GT'),
(685, 'K', 9, 4, 'GT'),
(686, 'K', 10, 4, 'GT'),
(687, 'K', 11, 4, 'GT'),
(688, 'K', 12, 4, 'GT'),
(689, 'K', 13, 4, 'GT'),
(690, 'K', 14, 4, 'GT'),
(691, 'K', 15, 4, 'GT'),
(692, 'K', 16, 4, 'GT'),
(693, 'L', 1, 4, 'GT'),
(694, 'L', 2, 4, 'GT'),
(695, 'L', 3, 4, 'GT'),
(696, 'L', 4, 4, 'GT'),
(697, 'L', 5, 4, 'GT'),
(698, 'L', 6, 4, 'GT'),
(699, 'L', 7, 4, 'GT'),
(700, 'L', 8, 4, 'GT'),
(701, 'L', 9, 4, 'GT'),
(702, 'L', 10, 4, 'GT'),
(703, 'L', 11, 4, 'GT'),
(704, 'L', 12, 4, 'GT'),
(705, 'L', 13, 4, 'GT'),
(706, 'L', 14, 4, 'GT'),
(707, 'L', 15, 4, 'GT'),
(708, 'L', 16, 4, 'GT');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `id` varchar(15) NOT NULL,
  `ngay_ban` date NOT NULL,
  `nhan_vien_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bẫy `hoa_don`
--
DELIMITER $$
CREATE TRIGGER `hoa_don_BEFORE_INSERT` BEFORE INSERT ON `hoa_don` FOR EACH ROW BEGIN
	-- do dai cua chuoi so
    SET @numLenght := 8;

	-- lay id moi duoc them vao
    SET @str := 'HD';
    
    -- lay id lon nhat trong bang
    SET @prevId := (SELECT id FROM hoa_don ORDER BY id DESC LIMIT 1);
	
    -- neu bang chua co du lieu, thi lay la 000000000
    if @prevId IS NULL then
		SET @prevId := LPAD(0, @numLenght, '0');
	END IF;
    
    -- lay phan so tu chuoi id
    SET @num := RIGHT(@prevId, @numLenght);
    
    -- tang phan so len 1 don vi
	SET @num := CAST(@num AS UNSIGNED) + 1;

	-- them so 0 vao truoc num cho du n ky tu
    SET @num := LPAD(@num, @numLenght, '0');
    
    -- cap nhat lai id moi
	SET new.id := CONCAT(@str, @num);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_chi_tiet`
--

CREATE TABLE `hoa_don_chi_tiet` (
  `id` int(10) UNSIGNED NOT NULL,
  `so_luong` int(10) UNSIGNED NOT NULL,
  `tong_tien` int(10) UNSIGNED NOT NULL,
  `do_an_chi_tiet_id` int(10) UNSIGNED NOT NULL,
  `hoa_don_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` varchar(15) NOT NULL,
  `ho_ten` varchar(45) NOT NULL,
  `so_cmnd` varchar(20) NOT NULL,
  `mat_khau` varchar(45) NOT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dia_chi` varchar(100) DEFAULT NULL,
  `ngay_dang_ky` date NOT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `gioi_tinh` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ho_ten`, `so_cmnd`, `mat_khau`, `so_dien_thoai`, `email`, `dia_chi`, `ngay_dang_ky`, `ngay_sinh`, `gioi_tinh`) VALUES
('KH00001', 'Trần Vĩ Khang', '647563756453', '827CCB0EEA8A706C4C34A16891F84E7B', '0796903256', 'khang@gmail.com', 'CMT8', '2018-11-08', '2018-11-16', b'1'),
('KH00002', 'Võ Thành Tài', '287516287850', '827CCB0EEA8A706C4C34A16891F84E7B', '0932938178', 'thanhtai@gmail.com', 'Quận Tân Phú', '2018-12-09', '1997-12-10', b'1'),
('KH00003', 'Trần Thịnh', '098765432311', '05a70454516ecd9194c293b0e415777f', '0964997201', 'thinh@gmail.com', NULL, '2022-05-28', '2022-06-02', b'1'),
('KH00004', 'Thanh Nhàn', '098765432313', '202cb962ac59075b964b07152d234b70', '0964996201', 'hihi@gmail.com', NULL, '2022-06-01', '2022-06-03', b'1'),
('KH00005', 'Trần Thịnh', '1234567888', '3198dae15bb55b9ac6f45d47da599da7', '0964997201', 'hihitran@gmail.com', NULL, '2022-06-03', '2022-06-23', b'1'),
('KH00006', 'Trần Thịnh', '1234567887', '202cb962ac59075b964b07152d234b70', '0964997202', 'cuong@gmail.com', NULL, '2022-06-17', '2022-06-02', b'1');

--
-- Bẫy `khach_hang`
--
DELIMITER $$
CREATE TRIGGER `khach_hang_BEFORE_INSERT` BEFORE INSERT ON `khach_hang` FOR EACH ROW BEGIN
	-- do dai cua chuoi so
    SET @numLenght := 5;

	-- cai dat tien to
    SET @str := 'KH';
    
    -- lay id lon nhat trong bang
    SET @prevId := (SELECT id FROM khach_hang ORDER BY id DESC LIMIT 1);
	
    -- neu bang chua co du lieu, thi lay la 000000000
    if @prevId IS NULL then
		SET @prevId := LPAD(0, @numLenght, '0');
	END IF;
    
    -- lay phan so tu chuoi id
    SET @num := RIGHT(@prevId, @numLenght);
    
    -- tang phan so len 1 don vi
	SET @num := CAST(@num AS UNSIGNED) + 1;

	-- them so 0 vao truoc num cho du n ky tu
    SET @num := LPAD(@num, @numLenght, '0');
    
    -- cap nhat lai id moi
	SET new.id := CONCAT(@str, @num);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_do_an`
--

CREATE TABLE `loai_do_an` (
  `id` varchar(5) NOT NULL,
  `ten_loai_do_an` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_do_an`
--

INSERT INTO `loai_do_an` (`id`, `ten_loai_do_an`) VALUES
('BK', 'Bánh kẹo'),
('DA', 'Đồ ăn nhanh'),
('NU', 'Nước uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_ghe`
--

CREATE TABLE `loai_ghe` (
  `id` varchar(2) NOT NULL,
  `ten_ghe` varchar(20) NOT NULL,
  `phu_thu` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_ghe`
--

INSERT INTO `loai_ghe` (`id`, `ten_ghe`, `phu_thu`) VALUES
('GT', 'Ghế thường', 90000),
('GV', 'Ghế đặc biệt', 135000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_phim`
--

CREATE TABLE `loai_phim` (
  `id` int(10) UNSIGNED NOT NULL,
  `ten_loai` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_phim`
--

INSERT INTO `loai_phim` (`id`, `ten_loai`) VALUES
(27, 'Phim hành động mới 2.0'),
(28, 'Phim hài hước'),
(29, 'Phim tâm lý'),
(30, 'Phim cổ trang'),
(31, 'Phim kinh dị'),
(32, 'Phim hoạt hình'),
(33, 'Phim chiến tranh'),
(37, 'Kiếm hịp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `id` varchar(15) NOT NULL,
  `ho_ten` varchar(45) NOT NULL,
  `ten_tk` varchar(220) DEFAULT NULL,
  `mat_khau` varchar(45) NOT NULL,
  `so_cmnd` varchar(20) DEFAULT NULL,
  `so_dien_thoai` varchar(15) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `dia_chi` varchar(100) DEFAULT NULL,
  `ngay_vao_lam` date NOT NULL,
  `vai_tro_id` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`id`, `ho_ten`, `ten_tk`, `mat_khau`, `so_cmnd`, `so_dien_thoai`, `email`, `dia_chi`, `ngay_vao_lam`, `vai_tro_id`) VALUES
('NV00003', 'Trần Văn Thịnh', 'thinhfboi', 'thinh123', '1392412394', '14234123', 'thinh@gmail.com', 'Hà Nam', '2022-01-15', 'NV'),
('NV00004', 'Nguyễn Duy Hiển', 'duyhien', 'hien123', '1234123412', '0987654321', 'hien@gmail.com', 'Bắc Ninh', '2021-01-10', 'NV');

--
-- Bẫy `nguoi_dung`
--
DELIMITER $$
CREATE TRIGGER `nguoi_dung_BEFORE_INSERT` BEFORE INSERT ON `nguoi_dung` FOR EACH ROW BEGIN
	-- do dai cua chuoi so
    SET @numLenght := 5;
    
    -- lay id lon nhat trong bang
    SET @prevId := (SELECT id FROM nguoi_dung WHERE vai_tro_id LIKE CONCAT(new.vai_tro_id, '%')  ORDER BY id DESC LIMIT 1);
	
    -- neu bang chua co du lieu, thi lay la 000000000
    if @prevId IS NULL then
		SET @prevId := LPAD(0, @numLenght, '0');
	END IF;
    
    -- lay phan so tu chuoi id
    SET @num := RIGHT(@prevId, @numLenght);
    
    -- tang phan so len 1 don vi
	SET @num := CAST(@num AS UNSIGNED) + 1;

	-- them so 0 vao truoc num cho du n ky tu
    SET @num := LPAD(@num, @numLenght, '0');
    
    -- cap nhat lai id moi
	SET new.id := CONCAT(new.vai_tro_id, @num);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phim`
--

CREATE TABLE `phim` (
  `id` varchar(15) NOT NULL,
  `ten` varchar(100) NOT NULL,
  `thoi_luong` int(10) UNSIGNED NOT NULL,
  `gioi_han_tuoi` int(10) UNSIGNED NOT NULL,
  `ngay_cong_chieu` date NOT NULL,
  `ngon_ngu` varchar(20) NOT NULL,
  `dien_vien` varchar(150) DEFAULT NULL,
  `quoc_gia` varchar(45) NOT NULL,
  `nha_san_xuat` varchar(45) NOT NULL,
  `tom_tat` varchar(1000) DEFAULT NULL,
  `trang_thai` varchar(20) NOT NULL,
  `da_xoa` bit(1) DEFAULT b'0',
  `hinh_anh` varchar(200) DEFAULT NULL,
  `loai_phim_id` int(10) UNSIGNED NOT NULL,
  `trailer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phim`
--

INSERT INTO `phim` (`id`, `ten`, `thoi_luong`, `gioi_han_tuoi`, `ngay_cong_chieu`, `ngon_ngu`, `dien_vien`, `quoc_gia`, `nha_san_xuat`, `tom_tat`, `trang_thai`, `da_xoa`, `hinh_anh`, `loai_phim_id`, `trailer`) VALUES
('PH00001', 'Em va Thịnh', 140, 18, '2022-06-01', 'Tiếng Việt', 'Avin Lu, Trần Lực', 'Việt Nam', 'Phan Gia Nhật Linh', 'Tác phẩm xoay quanh cuộc đời Trịnh Công Sơn từ thời trẻ đến lúc trung niên trong khoảng những năm 1960-1990, điểm nhấn là câu chuyện giữa cố nhạc sĩ và cô gái Dao Ánh. Các ca khúc nhạc Trịnh cũng là một phần quan trọng của phim.', 'Đang chiếu', b'0', 'em-va-trinh.png', 28, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202206/10848_301_100002.mp4'),
('PH00002', 'DORAEMON: NOBITA VÀ CUỘC CHIẾN VŨ TRỤ TÍ HON 2021', 120, 10, '0000-00-00', 'Tiếng Nhật ', 'Doreamon, Nobita', 'Nhật Bản', 'Animation Japan', '', 'Đang chiếu', b'0', 'doreamon-cuoc-chien-vu-tru-ti-hon.jpg', 32, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202205/10882_301_100001.mp4'),
('PH00003', 'THẾ GIỚI KHỦNG LONG: LÃNH ĐỊA', 147, 19, '2022-06-10', 'Tiếng Anh', 'Colin Trevorrow', 'Anh', 'Action/Adventure/SF USA', 'Bốn năm sau kết thúc Jurassic World: Fallen Kingdom, những con khủng long đã thoát khỏi nơi giam cầm và tiến vào thế giới loài người. Giờ đây, chúng xuất hiện ở khắp mọi nơi. Sinh vật to lớn ấy không còn chỉ ở trên đảo như trước nữa mà gần ngay trước mắt, thậm chí còn có thể chạm tới. Owen Grady may mắn gặp lại cô khủng long mà anh và khán giả vô cùng yêu mến - Blue. Tuy nhiên, Blue không đi một mình mà còn đem theo một chú khủng long con khác. Điều này khiến Owen càng quyết tâm bảo vệ mẹ con cô được sinh sống an toàn. Thế nhưng, hai giống loài quá khác biệt. Liệu có thể tồn tại một kỷ nguyên mà khủng long và con người sống chung một cách hòa bình?', 'Đang chiếu', b'0', 'the-gioi-khung-long.jpg', 27, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202202/10835_301_100002.mp4'),
('PH00004', 'PHÙ THỦY TỐI THƯỢNG TRONG ĐA VŨ TRỤ HỖN LOẠN', 126, 22, '2022-05-04', 'Tiếng Anh', 'Benedict Cumberbatch', 'Mỹ', 'Kevin Feige', 'Sau khi dùng phép thuật khiến mọi người quên danh tính của Spider-Man, thế giới trở bỗng nhiên trở nên hoang tàn. Lo lắng sẽ có hiểm họa xảy ra Doctor Strange tìm đến Scarlet Witch (Wanda) để nhờ cô trợ giúp, có vẻ như điều gì đó đang tác động lớn đến sư ổn định của không thời gian, liệu đây có phải là cái giá phải trả của Strange khi dùng đến phép cấm mà Wong đã cảnh báo?', 'Đang chiếu', b'0', 'da-vu-tru-hon-loan.jpg', 27, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202204/10769_301_100002.mp4'),
('PH00005', '70K HARRY POTTER VÀ TÙ NHÂN AZKABAN', 141, 18, '2022-05-31', 'Tiếng Anh', 'Daniel Radcliffe', 'Anh', 'Chris Columbus', 'Harry Potter và Tên tù nhân ngục Azkaban là bộ phim tưởng tượng-phiêu lưu năm 2004, dựa trên tiểu thuyết cùng tên của J. K. Rowling. Do nhà làm phim Alfonso Cuarón người Mexico, phim là bộ phim thứ ba của loạt phim nổi tiếng Harry Potter.', 'Đang chiếu', b'0', 'harry-porer-va-tu-nhan-azkaban.png', 33, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202205/10893_301_100002.mp4'),
('PH00006', 'DAENG: HẬU DUỆ TÌNH NGƯỜI DUYÊN MA', 96, 18, '2022-05-20', 'Tiếng Việt', 'Nguyễn Duy Hiển', 'Thái Lan', 'Comedy Thailand ', 'HẬU DUỆ CỦA “TÌNH NGƯỜI DUYÊN MA” ĐỔ BỘ MÀN ẢNH VIỆT THÁNG 5 NÀY!!! DAENG - BỘ PHIM ĐỨNG ĐẦU DOANH THU PHÒNG VÉ 2 TUẦN LIÊN TIẾP TẠI THÁI LAN!!! Sau 9 năm kể từ sau Bom Tấn Pee Mak - Tình Người Duyên Ma, câu chuyện về đứa bé “có cái tên thật đẹp” mà bố Mak thích nay đã nối nghiệp mẹ trong dự án điện ảnh DAENG - HẬU DUỆ “TÌNH NGƯỜI DUYÊN MA” sẽ đổ bộ màn ảnh Việt vào 20.05.2022 hứa hẹn bao hài hước nhưng không kém phần kinh dị xoay quanh tình bạn với hội bạn siêu lầy đúng chất “Tình Người Duyên Ma”!! Nhanh chóng soán ngôi Pee Nak 3 - Ngôi Đền Kỳ Quái 3 ngay trong ngày đầu công chiếu và trở thành bộ phim dẫn đầu doanh thu phòng vé 2 tuần liên tiếp tại Thái Lan, DAENG - HẬU DUỆ “TÌNH NGƯỜI DUYÊN MA” hiện tại đang trong Top 3 phòng vé tại thị trường điện ảnh Thái Lan.', 'Đang chiếu', b'0', 'tinh-nguoi-duyen-ma.jpg', 31, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202205/10888_301_100001.mp4'),
('PH00007', 'NGƯỜI MÔI GIỚI', 130, 18, '2022-06-24', 'Tiếng Hàn', 'Song Kang-ho', 'Hàn Quốc', ' Kore-eda Hirokazu', 'Sang-hyun (Song Kang Ho) là chủ một cửa tiệm giặt ủi ngập đầu trong nợ nần. Dong-soo (Gang Dong Won) – từng là trẻ mồ côi và hiện đang làm việc cho một cơ sở vận hành “chiếc hộp em bé”. Vào một đêm mưa gió, Sang-hyun và Dong-soo lén lút mang đi một đứa bé vừa bị bỏ rơi trong hộp. Trớ trêu thay, bà mẹ trẻ So-young (Lee Ji Eun) đột nhiên đổi ý và quay trở lại tìm con mình. Dù bán tín bán nghi, So-young quyết định tham gia vào chuyến đi kỳ lạ tìm kiếm gia đình mới cho chính con mình. Trong lúc đó, nữ cảnh sát Soo-jin (Doona Bae) cùng cấp dưới của mình, cảnh sát Lee (Lee Joo Young) đã luôn theo sát và chứng kiến toàn bộ quá trình. Họ lặng lẽ theo dõi bộ ba để thu thập những bằng chứng mang tính quyết định. Cuộc hành trình bám theo những người môi giới của các thanh tra sẽ diễn biến theo một chiều hướng mà chính họ cũng không thể lường trước được. Tất cả mọi chuyện đều bắt đầu từ “chiếc hộp em bé”.', 'Sắp chiếu', b'0', 'nguoi-mo-gioi.png', 29, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202205/10895_301_100001.mp4'),
('PH00008', 'MAIKA - CÔ BÉ ĐẾN TỪ HÀNH TINH KHÁC', 108, 18, '2022-05-27', 'Tiếng Việt', 'Chu Diệp Anh, Lại Trường Phú, Tin Tin, Huy Me, Ngọc Tưởng, Tiểu Bảo Quốc.', 'Việt Nam', 'Hàm Trần', 'Hùng là cậu bé 8 tuổi mồ côi mẹ, sống với cha nhưng tình cảm cha con không khăng khít. Sau khi người bạn thân nhất của Hùng phải chuyển nhà, bố con cậu cũng bị chủ nhà ép chuyển đi. Cậu bé thường tìm kiếm niềm an ủi bằng cách ngắm bầu trời đêm. Một đêm có mưa sao băng, cậu thấy một ngôi sao rơi xuống vùng đất gần đó. Khi Hùng đi tìm, cậu không thấy ngôi sao nào mà thấy một cô bé. Hai đứa trẻ kết thân và giúp đỡ nhau.', 'Đang chiếu', b'0', 'maika-co-be-den-tu-hanh-tinh-khac.jpg', 29, ''),
('PH00009', 'LIGHTYEAR: CẢNH SÁT VŨ TRỤ', 112, 11, '2022-06-10', 'Tiếng Anh', 'Angus MacLane', 'Anh', 'Jason Headley', 'Bộ phim sẽ tập trung khai thác về những ngày đầu trước khi trở thành một phi hành gia vũ trụ tài năng của nhân vật Buzz Lightyear - người sau này truyền cảm hứng cho nhân vật đồ chơi cùng tên xuất hiện xuyên suốt trong loạt phim hoạt hình Toy Story nổi tiếng của Pixar.', 'Đang chiếu', b'0', 'canh-sat-vu-tru.png', 32, 'https://media.lottecinemavn.com/Media/MovieFile/MovieMedia/202206/10783_301_100002.mp4');

--
-- Bẫy `phim`
--
DELIMITER $$
CREATE TRIGGER `phim_BEFORE_INSERT` BEFORE INSERT ON `phim` FOR EACH ROW BEGIN
	-- do dai cua chuoi so
    SET @numLenght := 5;

	-- cai dat tien to
    SET @str := 'PH';
    
    -- lay id lon nhat trong bang
    SET @prevId := (SELECT id FROM phim ORDER BY id DESC LIMIT 1);
	
    -- neu bang chua co du lieu, thi lay la 000000000
    if @prevId IS NULL then
		SET @prevId := LPAD(0, @numLenght, '0');
	END IF;
    
    -- lay phan so tu chuoi id
    SET @num := RIGHT(@prevId, @numLenght);
    
    -- tang phan so len 1 don vi
	SET @num := CAST(@num AS UNSIGNED) + 1;

	-- them so 0 vao truoc num cho du n ky tu
    SET @num := LPAD(@num, @numLenght, '0');
    
    -- cap nhat lai id moi
	SET new.id := CONCAT(@str, @num);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phong_chieu`
--

CREATE TABLE `phong_chieu` (
  `id` int(10) UNSIGNED NOT NULL,
  `so_luong_day` int(10) UNSIGNED NOT NULL,
  `so_luong_cot` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `phong_chieu`
--

INSERT INTO `phong_chieu` (`id`, `so_luong_day`, `so_luong_cot`) VALUES
(1, 12, 18),
(2, 10, 16),
(3, 10, 14),
(4, 12, 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suat_chieu`
--

CREATE TABLE `suat_chieu` (
  `id` varchar(15) NOT NULL,
  `gio_bat_dau` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gio_ket_thuc` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ngay_chieu` date NOT NULL,
  `phim_id` varchar(15) NOT NULL,
  `phong_chieu_id` int(10) UNSIGNED NOT NULL,
  `dinh_dang_phim_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `suat_chieu`
--

INSERT INTO `suat_chieu` (`id`, `gio_bat_dau`, `gio_ket_thuc`, `ngay_chieu`, `phim_id`, `phong_chieu_id`, `dinh_dang_phim_id`) VALUES
('SC00000001', '2022-06-18 08:50:00', '2022-06-17 10:12:00', '2022-06-18', 'PH00009', 3, '4D'),
('SC00000002', '2022-06-18 08:40:00', '2022-06-18 10:40:00', '2022-06-18', 'PH00001', 2, '3D');

--
-- Bẫy `suat_chieu`
--
DELIMITER $$
CREATE TRIGGER `suat_chieu_BEFORE_INSERT` BEFORE INSERT ON `suat_chieu` FOR EACH ROW BEGIN
	-- do dai cua chuoi so
    SET @numLenght := 8;

	-- cai dat tien to
    SET @str := 'SC';
    
    -- lay id lon nhat trong bang
    SET @prevId := (SELECT id FROM suat_chieu ORDER BY id DESC LIMIT 1);
	
    -- neu bang chua co du lieu, thi lay la 000000000
    if @prevId IS NULL then
		SET @prevId := LPAD(0, @numLenght, '0');
	END IF;
    
    -- lay phan so tu chuoi id
    SET @num := RIGHT(@prevId, @numLenght);
    
    -- tang phan so len 1 don vi
	SET @num := CAST(@num AS UNSIGNED) + 1;

	-- them so 0 vao truoc num cho du n ky tu
    SET @num := LPAD(@num, @numLenght, '0');
    
    -- cap nhat lai id moi
	SET new.id := CONCAT(@str, @num);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vai_tro`
--

CREATE TABLE `vai_tro` (
  `id` varchar(2) NOT NULL,
  `ten` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `vai_tro`
--

INSERT INTO `vai_tro` (`id`, `ten`) VALUES
('NV', 'Nhân viên bán hàng'),
('QL', 'Nhân viên quản lý'),
('TR', 'Quản lý rạp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ve_ban`
--

CREATE TABLE `ve_ban` (
  `id` varchar(15) NOT NULL,
  `ngay_ban` date NOT NULL,
  `tong_tien` int(10) UNSIGNED NOT NULL,
  `suat_chieu_id` varchar(15) NOT NULL,
  `ghe_id` int(10) UNSIGNED NOT NULL,
  `khach_hang_id` varchar(15) DEFAULT NULL,
  `da_huy` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `ve_ban`
--

INSERT INTO `ve_ban` (`id`, `ngay_ban`, `tong_tien`, `suat_chieu_id`, `ghe_id`, `khach_hang_id`, `da_huy`) VALUES
('VB0000000001', '2022-06-17', 90000, 'SC00000001', 379, 'KH00004', 0),
('VB0000000002', '2022-06-17', 90000, 'SC00000001', 380, 'KH00004', 0),
('VB0000000003', '2022-06-17', 90000, 'SC00000001', 381, 'KH00004', 0),
('VB0000000004', '2022-06-17', 90000, 'SC00000001', 382, 'KH00004', 0),
('VB0000000005', '2022-06-17', 135000, 'SC00000002', 304, 'KH00004', 0),
('VB0000000006', '2022-06-17', 135000, 'SC00000002', 320, 'KH00004', 0),
('VB0000000007', '2022-06-17', 135000, 'SC00000002', 336, 'KH00004', 0),
('VB0000000008', '2022-06-17', 90000, 'SC00000002', 352, 'KH00004', 1);

--
-- Bẫy `ve_ban`
--
DELIMITER $$
CREATE TRIGGER `ve_ban_BEFORE_INSERT` BEFORE INSERT ON `ve_ban` FOR EACH ROW BEGIN
	-- do dai cua chuoi so
    SET @numLenght := 10;

	-- cai dat tien to
    SET @str := 'VB';
    
    -- lay id lon nhat trong bang
    SET @prevId := (SELECT id FROM ve_ban ORDER BY id DESC LIMIT 1);
	
    -- neu bang chua co du lieu, thi lay la 000000000
    if @prevId IS NULL then
		SET @prevId := LPAD(0, @numLenght, '0');
	END IF;
    
    -- lay phan so tu chuoi id
    SET @num := RIGHT(@prevId, @numLenght);
    
    -- tang phan so len 1 don vi
	SET @num := CAST(@num AS UNSIGNED) + 1;

	-- them so 0 vao truoc num cho du n ky tu
    SET @num := LPAD(@num, @numLenght, '0');
    
    -- cap nhat lai id moi
	SET new.id := CONCAT(@str, @num);
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dinh_dang_phim`
--
ALTER TABLE `dinh_dang_phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `do_an`
--
ALTER TABLE `do_an`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DOAN_LOAIDOAN_idx` (`loai_do_an_id`);

--
-- Chỉ mục cho bảng `do_an_chi_tiet`
--
ALTER TABLE `do_an_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_DOANCHITIET_DOAN_idx` (`do_an_id`);

--
-- Chỉ mục cho bảng `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_GHE_PHONGCHIEU_idx` (`phong_chieu_id`),
  ADD KEY `FK_GHE_LOAIGHE_idx` (`loai_ghe_id`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_HOADON_NGUOIDUNG_idx` (`nhan_vien_id`);

--
-- Chỉ mục cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_HOADONCHITIET_HOADON_idx` (`hoa_don_id`),
  ADD KEY `FK_HOADONCHITIET_DOAN_idx` (`do_an_chi_tiet_id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `so_cmnd_UNIQUE` (`so_cmnd`);

--
-- Chỉ mục cho bảng `loai_do_an`
--
ALTER TABLE `loai_do_an`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_ghe`
--
ALTER TABLE `loai_ghe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `so_cmnd_UNIQUE` (`so_cmnd`),
  ADD KEY `FK_NGUOIDUNG_VAITRO_idx` (`vai_tro_id`);

--
-- Chỉ mục cho bảng `phim`
--
ALTER TABLE `phim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PHIM_LOAIPHIM_idx` (`loai_phim_id`);

--
-- Chỉ mục cho bảng `phong_chieu`
--
ALTER TABLE `phong_chieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_SUATCHIEU_PHONGCHIEU_idx` (`phong_chieu_id`),
  ADD KEY `FK_SUATCHIEU_DINHDANGPHIM_idx` (`dinh_dang_phim_id`),
  ADD KEY `FK_SUATCHIEU_PHIM_idx` (`phim_id`);

--
-- Chỉ mục cho bảng `vai_tro`
--
ALTER TABLE `vai_tro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ve_ban`
--
ALTER TABLE `ve_ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_VEBAN_GHE_idx` (`ghe_id`),
  ADD KEY `FK_VEBAN_SUATCHIEU_idx` (`suat_chieu_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `do_an_chi_tiet`
--
ALTER TABLE `do_an_chi_tiet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=709;

--
-- AUTO_INCREMENT cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `loai_phim`
--
ALTER TABLE `loai_phim`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `phong_chieu`
--
ALTER TABLE `phong_chieu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `do_an`
--
ALTER TABLE `do_an`
  ADD CONSTRAINT `FK_DOAN_LOAIDOAN` FOREIGN KEY (`loai_do_an_id`) REFERENCES `loai_do_an` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `do_an_chi_tiet`
--
ALTER TABLE `do_an_chi_tiet`
  ADD CONSTRAINT `FK_DOANCHITIET_DOAN` FOREIGN KEY (`do_an_id`) REFERENCES `do_an` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ghe_ngoi`
--
ALTER TABLE `ghe_ngoi`
  ADD CONSTRAINT `FK_GHE_LOAIGHE` FOREIGN KEY (`loai_ghe_id`) REFERENCES `loai_ghe` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_GHE_PHONGCHIEU` FOREIGN KEY (`phong_chieu_id`) REFERENCES `phong_chieu` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `FK_HOADON_NGUOIDUNG` FOREIGN KEY (`nhan_vien_id`) REFERENCES `nguoi_dung` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa_don_chi_tiet`
--
ALTER TABLE `hoa_don_chi_tiet`
  ADD CONSTRAINT `FK_HOADONCHITIET_DOANCHITIET` FOREIGN KEY (`do_an_chi_tiet_id`) REFERENCES `do_an_chi_tiet` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_HOADONCHITIET_HOADON` FOREIGN KEY (`hoa_don_id`) REFERENCES `hoa_don` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD CONSTRAINT `FK_NGUOIDUNG_VAITRO` FOREIGN KEY (`vai_tro_id`) REFERENCES `vai_tro` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `phim`
--
ALTER TABLE `phim`
  ADD CONSTRAINT `FK_PHIM_LOAIPHIM` FOREIGN KEY (`loai_phim_id`) REFERENCES `loai_phim` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `suat_chieu`
--
ALTER TABLE `suat_chieu`
  ADD CONSTRAINT `FK_SUATCHIEU_DINHDANGPHIM` FOREIGN KEY (`dinh_dang_phim_id`) REFERENCES `dinh_dang_phim` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SUATCHIEU_PHIM` FOREIGN KEY (`phim_id`) REFERENCES `phim` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_SUATCHIEU_PHONGCHIEU` FOREIGN KEY (`phong_chieu_id`) REFERENCES `phong_chieu` (`id`) ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `ve_ban`
--
ALTER TABLE `ve_ban`
  ADD CONSTRAINT `FK_VEBAN_GHENGOI` FOREIGN KEY (`ghe_id`) REFERENCES `ghe_ngoi` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
