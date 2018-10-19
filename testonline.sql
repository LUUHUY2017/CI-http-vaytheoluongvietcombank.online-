-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 19, 2018 lúc 02:48 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `testonline`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `ID` int(2) NOT NULL,
  `Name` text NOT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Parent_id` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`ID`, `Name`, `Slug`, `Parent_id`) VALUES
(6, 'Trang chủ', '', NULL),
(7, 'vay thế chấp', 'vay-the-chap', NULL),
(8, 'Vay theo hình thức khác', 'vay-theo-hinh-thuc-khac', NULL),
(9, 'vay tín chấp', 'vay-tin-chap', NULL),
(10, 'Thẻ tín dụng', 'the-tin-dung', NULL),
(11, 'Liên hệ', 'lien-he', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `config`
--

CREATE TABLE `config` (
  `ID` int(1) NOT NULL,
  `Name` text,
  `Title` text,
  `Logo` text,
  `Description` text,
  `Key_word` text,
  `Phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `config`
--

INSERT INTO `config` (`ID`, `Name`, `Title`, `Logo`, `Description`, `Key_word`, `Phone`) VALUES
(6, 'Nghĩa', 'Thực hiện bài test Online', 'anhbia11.png', 'Copyright © 2015. Dịch vụ nâng cấp website bởi BICTweb.vn', 'Website cho vay đa dạng', '0978197273');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `ID` int(3) NOT NULL,
  `Title` text NOT NULL,
  `Description` text NOT NULL,
  `Content` text NOT NULL,
  `Thumbnail` text NOT NULL,
  `Slug` varchar(255) NOT NULL,
  `Create_at` date NOT NULL,
  `Cat_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`ID`, `Title`, `Description`, `Content`, `Thumbnail`, `Slug`, `Create_at`, `Cat_id`) VALUES
(3, 'VAY MUA XE TRẢ GÓP', 'Để sở hữu một chiếc xe máy hay ô tô không còn xa vời như bạn nghĩ. Đến với ngân hàng chúng tôi ,vi vu sau tay lái nhanh hơn những gì bạn tưởng tượng. Thủ tục vay mua xe ô tô hay xe máy mới và Ôtô cũ cực kỳ đơn giản với lãi suất ưu đãi và nhiều chính sách khuyến mãi hấp dẫn khác.', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Để sở hữu một chiếc xe m&aacute;y hay &ocirc; t&ocirc; kh&ocirc;ng c&ograve;n xa vời như bạn nghĩ. Đến với ng&acirc;n h&agrave;ng ch&uacute;ng t&ocirc;i ,vi vu sau tay l&aacute;i nhanh hơn những g&igrave; bạn tưởng tượng. Thủ tục vay mua xe &ocirc; t&ocirc; hay xe m&aacute;y mới v&agrave; &Ocirc;t&ocirc; cũ cực kỳ đơn giản với l&atilde;i suất ưu đ&atilde;i v&agrave; nhiều ch&iacute;nh s&aacute;ch khuyến m&atilde;i hấp dẫn kh&aacute;c.</p>\r\n\r\n<p>&nbsp;</p>\r\n', '55-11.png', 'vay-mua-xe-tra-gop', '2018-10-18', 7),
(4, 'VAY TÍN CHẤP NGÂN HÀNG BIDV', ' VAY TÍN CHẤP THEO LƯƠNG Vay tín chấp theo lương là hình thức vay vốn mà không cần tài sản thế chấp dành cho người đi làm hưởng lương tại bất kỳ các doanh nghiệp tư nhân, doanh nghiệp nhà nước hay các cơ quan nhà nước. Hình thức trả lương có thể là chuyển khoản […]', ' VAY TÍN CHẤP THEO LƯƠNG Vay tín chấp theo lương là hình thức vay vốn mà không cần tài sản thế chấp dành cho người đi làm hưởng lương tại bất kỳ các doanh nghiệp tư nhân, doanh nghiệp nhà nước hay các cơ quan nhà nước. Hình thức trả lương có thể là chuyển khoản […]', 'BIDV1.png', 'vay-tin-chap-ngan-hang-bidv', '2018-10-03', 9),
(5, 'THẺ TÍN DỤNG NGÂN HÀNG VIETCOMBANK', 'MỞ THẺ TÍN DỤNG NGÂN HÀNG Thẻ tín dụng đã trở nên rất phổ biến ở nước ngoài và đang dần được sử dụng rộng rãi tại Việt Nam. Số người sử dụng thẻ tín dụng tại Việt Nam ngày càng tăng, tính đến nay con số này đã lên đến gần 100 triệu thẻ. Tính […]', 'Thẻ tín dụng đã trở nên rất phổ biến ở nước ngoài và đang dần được sử dụng rộng rãi tại Việt Nam. Số người sử dụng thẻ tín dụng tại Việt Nam ngày càng tăng, tính đến nay con số này đã lên đến gần 100 triệu thẻ. Tính tiện lợi và sự tiện ích mà thẻ tín dụng mang lại đã giúp cho người tiêu dùng ngày càng tin tưởng và sử dụng thẻ nhiều hơn.', '21.png', 'the-tin-dung-ngan-hang-vietcombank', '2018-10-11', 10),
(6, 'VAY THEO ĐĂNG KÍ KINH DOANH', 'VAY VỐN DÀNH CHO HỘ ĐĂNG KÝ KINH DOANH   Vay theo hộ kinh doanh là hình thức vay để bổ sung nguồn vốn kinh doanh cho cá nhân, hộ gia đình . Vay tiêu dùng tín chấp Khách hàng tự doanh – Số tiền cho vay cao, lên đến 200 triệu VND. Thời gian vay […]', 'VAY VỐN DÀNH CHO HỘ ĐĂNG KÝ KINH DOANH   Vay theo hộ kinh doanh là hình thức vay để bổ sung nguồn vốn kinh doanh cho cá nhân, hộ gia đình . Vay tiêu dùng tín chấp Khách hàng tự doanh – Số tiền cho vay cao, lên đến 200 triệu VND. Thời gian vay […]', 'nhadat.jpg', 'vay-theo-dang-ki-kinh-doanh', '2018-10-11', 8),
(7, 'VAY TÍN CHẤP NGÂN HÀNG AGRIBANK', 'VAY TÍN CHẤP NGÂN HÀNG AGRIBANK Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam ( Agribank ) là Ngân hàng lớn nhất Việt Nam cả về vốn, tài sản, đội ngũ cán bộ nhân viên, mạng lưới hoạt động và số lượng khách hàng. Tiện ích Loại tiền vay: VND Thời gian cho […]', 'Ngân hàng Nông nghiệp và Phát triển Nông thôn Việt Nam ( Agribank ) là Ngân hàng lớn nhất Việt Nam cả về vốn, tài sản, đội ngũ cán bộ nhân viên, mạng lưới hoạt động và số lượng khách hàng.', '78901.png', 'vay-tin-chap-ngan-hang-agribank', '2018-10-11', 9),
(8, 'VAY VỐN NGÂN HÀNG TIÊN PHONG', 'VAY VỐN NGÂN HÀNG TIÊN PHONG   Sản phẩm thỏa mãn ngay các nhu cầu chi tiêu cá nhân đột xuất của bạn, dễ dàng trả khoản vay theo hình thức trả góp hàng tháng nhưng không cần thế chấp tài sản đảm bảo. Ưu điểm: Đáp ứng nhanh chóng các nhu cầu chi tiêu […]', 'VAY VỐN NGÂN HÀNG TIÊN PHONG   Sản phẩm thỏa mãn ngay các nhu cầu chi tiêu cá nhân đột xuất của bạn, dễ dàng trả khoản vay theo hình thức trả góp hàng tháng nhưng không cần thế chấp tài sản đảm bảo. Ưu điểm: Đáp ứng nhanh chóng các nhu cầu chi tiêu […]', '5661.png', 'vay-von-ngan-hang-tien-phong', '2018-10-11', 9),
(9, 'VAY THẾ CHẤP MUA NHÀ', 'VAY THẾ CHẤP MUA NHÀ Vay mua nhà là chương trình giúp bạn sở hữu ngồi nhà mơ ước ngay hôm nay thay vì chờ đợi 25 năm nữa. Vì giờ đây bạn sẽ được hỗ trợ 80% giá trị bất động sản với thời gian trả góp lên đến 25 năm. Hãy tận hưởng ngay khoảnh khắc hạnh phúc này, […]', '<blockquote>\r\n<p><strong>Vay mua nh&agrave;</strong>&nbsp;l&agrave; chương tr&igrave;nh gi&uacute;p bạn&nbsp;<strong>sở hữu</strong>&nbsp;ngồi nh&agrave; mơ ước<strong>&nbsp;ngay h&ocirc;m nay&nbsp;</strong>thay v&igrave; chờ đợi 25 năm nữa.<br />\r\nV&igrave; giờ đ&acirc;y bạn sẽ được hỗ trợ&nbsp;<strong>80% gi&aacute; trị</strong>&nbsp;bất động sản với thời gian trả g&oacute;p l&ecirc;n đến 25 năm. H&atilde;y tận hưởng ngay khoảnh khắc hạnh ph&uacute;c n&agrave;y, thay v&igrave; chỉ mơ ước.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<img alt=\"\" src=\"/ckfinder/userfiles/images/8(1).png\" style=\"height:212px; width:648px\" /></p>\r\n\r\n<p><strong>Ưu điểm của&nbsp;vay thế chấp&nbsp;mua nh&agrave; mới:</strong></p>\r\n\r\n<ul>\r\n	<li>Thời gian cho vay d&agrave;i hạn, trả nợ linh hoạt, ph&ugrave; hợp với mức thu nhập của kh&aacute;ch h&agrave;ng.</li>\r\n	<li>L&atilde;i suất ưu đ&atilde;i v&agrave; cạnh tranh với nhiều chương tr&igrave;nh hấp dẫn quanh năm.</li>\r\n	<li>Thủ tục đơn giản, hồ sơ kh&aacute;ch h&agrave;ng xử l&yacute; nhanh ch&oacute;ng.</li>\r\n</ul>\r\n\r\n<p>Hơn nữa với dịch vụ &ldquo;Ch&igrave;a kh&oacute;a trao tay&rdquo; . Kh&aacute;ch h&agrave;ng sẽ được hỗ trợ Dịch vụ Trung gian thanh to&aacute;n tiền mua b&aacute;n, chuyển nhượng bất động sản với thủ tục ph&aacute;p l&yacute;, an to&agrave;n v&agrave; đ&uacute;ng thời hạn.</p>\r\n\r\n<p><strong>Đặc điểm của&nbsp;vay thế chấp mua nh&agrave;</strong></p>\r\n\r\n<ul>\r\n	<li>Số tiền vay l&ecirc;n đến 80% nhu cầu vốn.</li>\r\n	<li>Thời hạn vay tối thiểu 1 năm, tối đa l&ecirc;n đến 25 năm</li>\r\n	<li>L&atilde;i suất chỉ từ 7,5 %/năm t&iacute;nh theo dư nợ giảm dần</li>\r\n	<li>Phương thức trả nợ linh hoạt: theo th&aacute;ng hoăc qu&yacute; t&ugrave;y thuộc v&agrave;o mức thu nhập của kh&aacute;ch h&agrave;ng.</li>\r\n</ul>\r\n</blockquote>\r\n', '8.png', 'vay-the-chap-mua-nha', '2018-10-18', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
--

CREATE TABLE `slider` (
  `ID` int(2) NOT NULL,
  `Url` text NOT NULL,
  `Image` text NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`ID`, `Url`, `Image`, `Status`) VALUES
(8, 'sap-phai-di-lam-roi', 'slide011.jpg', 1),
(9, 'ahihi-duoc-roi', 'slide012.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Avatar` text NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Avatar`, `Role`) VALUES
(13, 'admin', 'admin', '27872ad2b45f11.jpg', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Cat_id` (`Cat_id`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `config`
--
ALTER TABLE `config`
  MODIFY `ID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `slider`
--
ALTER TABLE `slider`
  MODIFY `ID` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`Cat_id`) REFERENCES `categories` (`ID`) ON DELETE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
