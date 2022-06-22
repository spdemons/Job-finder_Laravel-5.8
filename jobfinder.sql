-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 04:06 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobfinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_username`, `admin_password`, `admin_phone`, `admin_role`, `created_at`, `updated_at`) VALUES
(1, 'ADMINISTRATOR', 'admin', '70873e8580c9900986939611618d7b1e', '0123456798', 'ADMINISTRATOR', NULL, NULL),
(2, 'Lương Huy Hoàng', 'huyhoang01', '827ccb0eea8a706c4c34a16891f84e7b', '0982719293', 'SUPERVISOR', NULL, NULL),
(17, 'Quách Văn Tới', 'vantoi01', '58b1216b06850385d9a4eadbedc806c4', '0982719293', 'SUPERVISOR', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apply_detail`
--

CREATE TABLE `apply_detail` (
  `job_id` int(11) UNSIGNED NOT NULL,
  `employee_id` int(11) UNSIGNED NOT NULL,
  `employee_cv` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_detail`
--

INSERT INTO `apply_detail` (`job_id`, `employee_id`, `employee_cv`, `apply_status`, `created_at`, `updated_at`) VALUES
(8, 1, '1655031955.pdf', 1, '2022-06-12 11:05:55', NULL),
(8, 2, '1655044678.pdf', 2, '2022-06-12 14:37:58', NULL),
(6, 1, '1655084973.pdf', 1, '2022-06-13 01:49:33', NULL),
(9, 2, '1655226894.pdf', 1, '2022-06-14 17:14:54', NULL),
(7, 2, '1655295378.docx', 0, '2022-06-15 12:16:18', NULL),
(10, 1, '1655300035.pdf', 1, '2022-06-15 13:33:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(1, 'An toàn lao động', 'Bao gồm các công việc liên quan đến an toàn lao động như: Cán bộ an toàn (HSE)...', 1, NULL, NULL),
(2, 'Báo chí /Truyền hình', 'Các công việc liên quan đến nghiệp vụ báo chí như: biên tập viên, phát thanh viên,...', 1, NULL, NULL),
(4, 'Bán hàng/Kinh doanh', 'Các công việc liên quan đến bán hàng như: telesale...', 1, NULL, NULL),
(5, 'Bảo hiểm', 'Các công việc liên quan đến bảo hiểm như: tư vấn tài chính, tư vấn bảo hiểm...', 1, NULL, NULL),
(6, 'Bất động sản', 'Các ngành nghề liên quan đến bất động sản như: tư vấn tài chính, môi giới nhà đất....', 1, NULL, NULL),
(7, 'Bưu chính viễn thông', 'Các ngành nghề liên quan đến bưu chính viên thông như: nhân viên kỹ thuật mạng, nhân viên trực tổng đài, kỹ sư an ninh mạng....', 1, NULL, NULL),
(8, 'IT-Phần mềm', 'Các công việc liên quan đến phần mềm máy tính, cơ sở dữ liệu, phá triển phần mềm, ứng dụng, website,...', 1, NULL, NULL),
(9, 'IT-Phần cứng/Mạng', 'Bao gồm các công việc liên quan đến phần cứng máy tính như: lắp đặt, bảo trì hệ thống máy tính và mạng....', 1, NULL, NULL),
(10, 'Thiết kế đồ hoạ', 'Bao gồm các công việc liên quan đến thiết kế các sản phẩn banner, poster, các sản phẩm 2D ,3D....', 1, NULL, NULL),
(11, 'Y tế/Chăm sóc sức khoẻ/Dược', 'Các ngành nghề liên quan đến chuyên ngành y tế như bác sĩ, điều dưỡng, dược sĩ.....', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_id` int(10) UNSIGNED NOT NULL,
  `employee_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_dob` date DEFAULT NULL,
  `employee_gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_id`, `employee_email`, `employee_password`, `employee_name`, `employee_phone`, `employee_dob`, `employee_gender`, `employee_status`, `created_at`, `updated_at`) VALUES
(1, 'luonghuyhoang98@gmail.com', '3c00c1ae15cf17acd5f8413ddcb8b912', 'Lương Huy Hoàng', '0982719293', '1998-11-16', 'Nam', 1, NULL, NULL),
(2, 'quachvantoi2k@gmail.com', '3c00c1ae15cf17acd5f8413ddcb8b912', 'Quách Văn Tới', '0982719293', NULL, 'Nam', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employer_id` int(10) UNSIGNED NOT NULL,
  `employer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `employer_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `employer_name`, `employer_username`, `employer_password`, `employer_address`, `employer_phone`, `employer_desc`, `employer_status`, `created_at`, `updated_at`) VALUES
(1, 'Jobfinder', 'test', '25f9e794323b453885f5181f1b624d0b', '1235asdasd', '0123456798', 'Chúng tôi đang thử nghiệm', 1, NULL, NULL),
(3, 'Công ty Cổ phần Đất Xanh Miền Trung', 'datxanhmientrung', '0bcd2bceec4e17e28a651d42b4677f32', '52-54 Võ Văn Kiệt, An Hải Bắc, Sơn Trà, Đà Nẵng', '0236626622', 'Đất Xanh Miền Trung đã khẳng định được vị thế của mình trở thành nhà phát triển bất động sản hạng sang theo tiêu chuẩn quốc tế. Bằng tư duy mới về kiến trúc nhà ở và tiềm lực tài chính minh bạch, chúng tôi không ngừng nỗ lực xây dựng một định nghĩa mới cho dòng sản phẩm nhà ở tại Việt Nam cũng như trên toàn Đông Nam Á.', 1, NULL, NULL),
(4, 'FPT Software Đà Nẵng', 'fptdanang', 'd96ec39d987dbbea01c152b0a91167c2', 'FPT Complex, Khu đô thị FPT City, Ngũ Hành Sơn, Đà Nẵng', '0351195877', 'Từ một văn phòng sản xuất phần mềm với quy mô 50 người, đến hết 2017, công ty đã phát triển lên quy mô hơn 2.700 người, mang lại việc làm cho hàng nghìn tri thức trẻ xuất thân miền Trung. Hàng năm, công ty đưa hàng trăm lượt nhân viên sang làm việc tại các nước Nhật Bản, Mỹ, Singapore… Trong 3 năm gần đây, FPT Software Đà Nẵng là công ty có tốc độ tăng trưởng trung bình hơn 70%/năm. Đây là tốc độ tăng trưởng cao nhất Tập đoàn, sự tăng trưởng làm nên cơ hội lớn cho mọi cá nhân đang tham gia vào sự phát triển này', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `employer_id` int(10) UNSIGNED NOT NULL,
  `job_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_quantity` int(11) NOT NULL,
  `job_salary` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_requirement` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_status` int(11) NOT NULL,
  `province_id` int(11) UNSIGNED NOT NULL,
  `job_createday` timestamp NOT NULL DEFAULT current_timestamp(),
  `job_closeday` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `category_id`, `employer_id`, `job_name`, `job_quantity`, `job_salary`, `job_desc`, `job_requirement`, `job_status`, `province_id`, `job_createday`, `job_closeday`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Lập trình viên PHP Laravel', 5, '12,000,000', '- Làm việc về website PHP / Laravel\r\n- Tham gia nghiên cứu, xây dựng phát triển website, phần mềm của công ty\r\n- Xây dựng, chỉnh sửa các website trên nền tảng Laravel / PHP...\r\n- Xử lý lỗi và tối ưu hóa vận hành cho các tính năng hiện có.\r\n- Công việc cụ thể trao đổi khi phỏng vấn', '- Thành thạo Php, MySQL, Laravel\r\n- Thành tạo HTML / CSS, Javascript\r\n- Biết Photoshop\r\n- Thái độ làm việc chuyên nghiệp và có trách nhiệm.\r\n- Tiếng anh giao tiếp tốt', 0, 1, '2022-06-08 16:23:09', '2022-12-22', NULL, NULL),
(3, 6, 3, 'Nhân viên kinh doanh', 3, '8,000,000', '- Khai thác, tìm kiếm khách hàng và giới thiệu, chốt hợp đồng các Dự án của Công ty.\r\n- Chăm sóc khách hàng, hỗ trợ giải đáp những thắc mắc của khách hàng hiện tại và khách hàng tiềm năng.\r\n- Thực hiện giao dịch, giấy tờ thủ tục và hỗ trợ khách hàng tiến hành giao dịch.\r\n- Quản lý tệp data khách hàng, hỗ trợ khách hàng sau bán hàng.\r\n- Nghiêm túc tuân thủ và xây dựng văn hóa công ty.\r\n- Tiếp thu, nâng cao kiến thức về sản phẩm và thị trường để tư vấn chốt hợp đồng khách hàng', '- Tuổi từ 20 → 35\r\n- Yêu cầu kinh nghiệm: đã có kinh nghiệm trong lĩnh vực kinh doanh bất động sản\r\n- Ưu tiên ứng viên có kinh nghiệm từ 1 năm hoặc ứng viên có kinh nghiệm < 1 năm nhưng có kỹ năng mềm tốt\r\n- Có sẵn data khách hàng là một lợi thế\r\n- Thành thạo internet và các ứng dụng khác, nhanh nhẹn cập nhật thông tin mới\r\n- Đam mê Bất Động Sản, có hoài bão lớn, tự tin nhiệt huyết trong công việc.\r\n- Kỹ năng giao tiếp tốt\r\n- Có thể đi công tác tỉnh (Để đưa khách hàng đi xem dự án thực tế)', 1, 15, '2022-06-09 04:32:20', '2022-07-16', NULL, NULL),
(4, 6, 3, 'Nhân viên kinh doanh', 4, '10,000,000', '+ Tìm kiếm khách hàng (Công ty hổ trợ việc tìm kiếm).\r\n+ Hướng dẫn, tư vấn cho khách hàng hiểu rõ về sản phẩm và thị trường bất động sản.\r\n+ Chăm sóc khách hàng trước và sau mở bán.', '+ Nam -Nữ tuổi từ 18-35 tuổi.\r\n+ Không cần kinh nghiệm (được đào tạo từ cơ bản tới chuyên sâu kiến thức về bất động sản)\r\n+ Có tinh thần và trách nhiệm trong công việc.\r\n+ Có đam mê kiếm tiền lớn và yêu thích con đường bất động sản.', 1, 58, '2022-06-09 04:41:15', '2022-08-21', NULL, NULL),
(6, 1, 3, 'Chuyên viên an toàn HSE', 2, '12,000,000', '- Giám sát/ kiểm tra sự tuân thủ các nội quy, quy định của Công nhân viên Công ty về ATLĐ, 5S và phòng cháy chữa cháy (PCCC). Lập biên bản và đề xuất xử lý kỷ luật các trường hợp vi phạm.\r\n\r\n- Báo cáo về vấn đề môi trường ; điện, nước, xử lý chất thải, rác thải, hóa chất\r\n\r\n- Đánh giá rủi ro, nhận diện các mối nguy hiểm, điều kiện không an toàn, các công việc không an toàn và đề xuất biện pháp khắc phục – phòng ngừa\r\n\r\n- Huấn luyện ATLĐ- PCCC, Sơ cấp cứu ban đầu.\r\n\r\n- Xây dựng kế hoạch HSE (Kiểm tra, đánh giá, đạo tạo, tái đào tạo, chi phí…) tập huấn về ATLĐ cho toàn bộ công nhân viên tại Công ty.', '- Kinh nghiệm soạn thảo văn bản / Kỹ năng vi tính văn phòng tốt/ kỹ năng đàm phán/ giao tiếp/ xử lý vấn đề, Kỹ năng giao tiếp tiếng anh cơ bản/ đọc hiểu cơ bản\r\n\r\n- Trình độ Cao đẳng chuyên ngành quản trị nhân lực, quản trị kinh doanh, kế toán và các ngành khác có liên quan\r\n\r\n- Am hiểu và vận dụng tốt các chính sách, quy chế, quy định về tiền lương, Bảo hiểm xã hội (BHXH), Bảo hiểm y tế (BHYT), Bảo hiểm thất nghiệp (BHTN) và Thuế thu nhập cá nhân (TNCN)…', 1, 15, '2022-06-09 04:51:47', '2022-06-30', NULL, NULL),
(7, 10, 3, 'Nhân viên Thiết kế đồ hoạ 2D', 2, '8,000,000', '• Phối hợp bộ phận Marketing & Kinh doanh thiết kế các ấn phẩm phục vụ cho hoạt động truyền thông thương hiệu và bán hàng\r\n• Thiết kế các ấn phẩm dựa trên bộ nhận diện thương hiệu của Công ty\r\n• Phối hợp thiết kế giao diện hệ thống website Công ty và các ấn phẩm trên mạng xã hội\r\n• Hỗ trợ các phòng ban khác trong việc chụp ảnh, quay video/ dựng video sản phẩm\r\n• Tìm kiếm và nghiên cứu phong cách thiết kế hình ảnh phù hợp với các sản phẩm của công ty\r\n• Quản lý chất lượng in ấn\r\n• Lập báo cáo và cập nhật tiến độ công việc với Quản lý, đưa ra các kế hoạch nâng cao hiệu suất công việc.\r\n• Các công việc chuyên môn khác theo sự phân công của cấp trên', '• Tốt nghiệp Cao Đẳng/Đại Học chuyên ngành Đồ Họa, Marketing…\r\n• Ít nhất 1 năm kinh nghiệm thiết kế đồ họa tại các Doanh Nghiệp, Agency,..\r\n• Có kiến thức chuyên sâu và sử dụng thành thạo các công nghệ, phần mềm để sản xuất nội dung theo phong cách hiện đại (Photoshop, Adobe Illustrator, InDesign,…)\r\n• Có khả năng phát triển ý tưởng, concept sáng tạo phù hợp với yêu cầu của sản phẩm và dự án\r\n• Có khả năng quay/dựng, chụp ảnh cơ bản là một lợi thế\r\n• Có kĩ năng giao tiếp & khả năng tìm kiếm thông tin tốt\r\n• Có khả năng làm việc độc lập, làm việc nhóm, đảm bảo deadline.', 1, 15, '2022-06-10 08:28:31', '2022-06-30', NULL, NULL),
(8, 8, 3, 'Nhân viên thiết kế Website', 3, '12,000,000', '- Lên ý tưởng và thiết kế Website xây dựng theo bộ nhận diện thương hiệu\r\n\r\n- Thiết kế UX/UI cho App, Website, System và các sản phẩm khác theo tiêu chí hướng tới người dùng\r\n\r\n- Thiết kế GIF, Motion Picture, hiệu ứng, Key Visual,…hoặc UX/UI\r\n\r\n- Phối hợp chặt chẽ với các bộ phận liên quan (BA, Marketing, Development, QA,...)\r\n\r\n- Nghiên cứu và cập nhật các xu hướng thiết kế UX/UI hiện nay để áp dụng vào sản phẩm\r\n\r\n- Lên ý tưởng và thiết kế các ấn phẩm đáp ứng cho các chiến dịch: brochure, standee, catalogue, banner website,...\r\n\r\n- Chỉnh sửa hình ảnh, ấn phẩm truyền thông, nhận dạng thương hiệu\r\n\r\n- Hỗ trợ dựng hình khi có yêu cầu', '- Đảm bảo các dự án được hoàn thành với chất lượng và đúng tiến độ Dealine\r\n\r\n- Kinh nghiệm: 2 năm\r\n\r\n- Có kinh nghiệm trong chuyên ngành về Thiết kế đồ hoạ, Thiết kế đa truyền thông\r\n\r\n- Có kỹ năng tốt với (Adobe Photoshop, Illustrator, InDesign, vv)\r\n\r\n- Tư duy thẩm mỹ tốt: màu sắc, bố cục, typography\r\n\r\n- Nhanh nhẹn, chủ động trong công việc, có tinh thần học hỏi và làm việc nhóm tốt\r\n\r\n- Có khả năng trình bày ý tưởng tốt\r\n\r\n- Có khả năng vẽ 2D, 3D là một lợi thế\r\n\r\n- Tư duy hình ảnh tốt\r\n\r\n- Tư duy chuyển động tốt\r\n\r\n- Khả năng sang tạo cao\r\n\r\n- Cập nhật công nghệ hình ảnh thường xuyên\r\n\r\n- Tư duy mở\r\n\r\n- Có kỹ năng làm việc độc lập và đội nhóm', 1, 1, '2022-06-10 08:32:54', '2022-06-26', NULL, NULL),
(9, 8, 4, 'PHP Developer (PHP, Laravel, Aws)', 3, '18,000,000', 'Thiết kế, phát triển và vận hành hệ thống back-end của các package.\r\nTừ thiết kế cơ bản đến phát triển và vận hành các chương trình khác nhau như hệ thống chiến dịch sử dụng API, CMS, hệ thống ứng dụng (application system), nội dung trò chơi (game content),…', '【KỸ NĂNG CẦN THIẾT】\r\n\r\nCó kinh nghiệm phát triển PHP  từ 3 năm trở lên.\r\nCó kinh nghiệm phát triển Laravel  từ 1 năm trở lên.\r\nCó kinh nghiệm phát triển CMS bằng Laravel.\r\nCó kinh nghiệm thực tiễn trong phát triển Team từ 1 năm trở lên.\r\nCó kiến thức liên quan đến Vulnerability.\r\n【KỸ NĂNG MONG MUỐN】\r\n\r\nCó kinh nghiệm phát triển package.\r\nCó kiến thức về RDBMS performance\r\nCó kiến thức thực tiễn về cloud server như AWS, GCP, Azure,…\r\nCó kiến thức về Around Security\r\nCó kinh nghiệm thực tiễn về lập test code\r\nCó kiến thức về triển khai Front-end\r\nThích va chạm - thử thách với những công nghệ mới.\r\nCó năng lực sáng tạo và khả năng giao tiếp tốt.\r\nNỗ nực hết mình trong mọi hoàn cảnh và đưa ra những ý kiến đóng góp để phát triển công việc.\r\nKhả năng nói-đọc-viết tiếng Anh/tiếng Nhật\r\n※Ưu tiên CV tiếng Anh hoặc tiếng Nhật', 1, 24, '2022-06-14 17:12:11', '2022-08-15', NULL, NULL),
(10, 2, 3, 'Chuyên Viên Truyền Thông Marketing - Lương 14 Triệu Đến 17 Triệu / Tháng', 1, '20,000,000', '1. Truyền thông nội bộ\r\n- Xây dựng kế hoạch truyền thông nội bộ định kỳ theo tháng/quý/năm.\r\n- Định hướng các thông tin tuyên truyền trong nội bộ.\r\n- Xây dựng, quản lý công cụ truyền thông nội bộ: Website, cổng thông tin nội bộ\r\n- Phối hợp cùng các phòng ban, công trường, bộ phận liên quan để chuyển tải văn hóa Công ty thông qua các hoạt động nội bộ.\r\n- Chủ động sáng tạo ý tưởng cho các chương trình nội bộ: thiết kế, thông điệp truyền thông, slogan…\r\n- Đề xuất ý tưởng cho các sự kiện nội bộ trong cái dịp: 8/3, 20/10, ngày thành lập công ty,…\r\n2. Truyền thông đối ngoại\r\n- Xây dựng và quản lý các công cụ truyền thông liên quan đến công tác đối ngoại: Website, tài liệu truyền thông, hồ sơ năng lực\r\n- Đề xuất các thông điệp truyền thông cho từng chương trình/sự kiện.\r\n- Đề xuất các chương trình hợp tác/tài trợ trong các sự kiện bên ngoài, hoạt động xã hội, cộng đồng.', 'Tốt nghiệp ĐH, chuyên ngành truyền thông, báo chí, ngôn ngữ, tiếp thị, quảng cáo hoặc các ngành khác có liên quan.\r\nTiếng Anh khá.\r\nCó 2 năm kinh nghiệm ở vị trí tương đương\r\nTin học văn phòng tốt, sử dụng tốt các phần mềm xử lý hình ảnh, video và các phần mềm hỗ trợ công việc khác.\r\nCó khả năng sử dụng, viết, biên tập thuần thục; biết chụp ảnh, quay phim, thiết kế là lợi thế.\r\nKỹ năng giao tiếp.\r\nTư duy tích cực, sáng tạo.\r\nNăng động, nhanh nhẹn, sáng tạo.', 1, 1, '2022-06-15 13:30:20', '2022-06-25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2022_05_12_015349_create_admin_table', 1),
(13, '2022_06_07_004557_create_employer_table', 1),
(14, '2022_06_08_024257_create_category_table', 2),
(15, '2022_06_08_083945_create_province_table', 3),
(16, '2022_06_08_085124_create_job_table', 4),
(17, '2022_06_11_094151_create_employee_table', 5),
(18, '2022_06_12_142301_create_apply_detail_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `province_id` int(10) UNSIGNED NOT NULL,
  `province_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`province_id`, `province_name`, `created_at`, `updated_at`) VALUES
(1, 'An Giang', NULL, NULL),
(2, 'Bà Rịa – Vũng Tàu', NULL, NULL),
(3, 'Bắc Giang', NULL, NULL),
(4, 'Bắc Kạn', NULL, NULL),
(5, 'Bạc Liêu', NULL, NULL),
(6, 'Bắc Ninh', NULL, NULL),
(7, 'Bến Tre', NULL, NULL),
(8, 'Bình Định', NULL, NULL),
(9, 'Bình Dương', NULL, NULL),
(10, 'Bình Phước', NULL, NULL),
(11, 'Bình Thuận', NULL, NULL),
(12, 'Cà Mau', NULL, NULL),
(13, 'Cần Thơ', NULL, NULL),
(14, 'Cao Bằng', NULL, NULL),
(15, 'Đà Nẵng', NULL, NULL),
(16, 'Đắk Lắk', NULL, NULL),
(17, 'Đắk Nông', NULL, NULL),
(18, 'Điện Biên', NULL, NULL),
(19, 'Đồng Nai', NULL, NULL),
(20, 'Đồng Tháp', NULL, NULL),
(21, 'Gia Lai', NULL, NULL),
(22, 'Hà Giang', NULL, NULL),
(23, 'Hà Nam', NULL, NULL),
(24, 'Hà Nội', NULL, NULL),
(25, 'Hà Tĩnh', NULL, NULL),
(26, 'Hải Dương', NULL, NULL),
(27, 'Hải Phòng', NULL, NULL),
(28, 'Hậu Giang', NULL, NULL),
(29, 'Hòa Bình', NULL, NULL),
(30, 'Hưng Yên', NULL, NULL),
(31, 'Khánh Hòa', NULL, NULL),
(32, 'Kiên Giang', NULL, NULL),
(33, 'Kon Tum', NULL, NULL),
(34, 'Lai Châu', NULL, NULL),
(35, 'Lâm Đồng', NULL, NULL),
(36, 'Lạng Sơn', NULL, NULL),
(37, 'Lào Cai', NULL, NULL),
(38, 'Long An', NULL, NULL),
(39, 'Nam Định', NULL, NULL),
(40, 'Nghệ An', NULL, '0000-00-00 00:00:00'),
(41, 'Ninh Bình', NULL, NULL),
(42, 'Ninh Thuận', NULL, NULL),
(43, 'Phú Thọ', NULL, NULL),
(44, 'Phú Yên', NULL, NULL),
(45, 'Quảng Bình', NULL, NULL),
(46, 'Quảng Nam', NULL, NULL),
(47, 'Quảng Ngãi', NULL, NULL),
(48, 'Quảng Ninh', NULL, NULL),
(49, 'Quảng Trị', NULL, NULL),
(50, 'Sóc Trăng', NULL, NULL),
(51, 'Sơn La', NULL, NULL),
(52, 'Tây Ninh', NULL, NULL),
(53, 'Thái Bình', NULL, NULL),
(54, 'Thái Nguyên', NULL, NULL),
(55, 'Thanh Hóa', NULL, NULL),
(56, 'Thừa Thiên Huế', NULL, NULL),
(57, 'Tiền Giang', NULL, NULL),
(58, 'TP Hồ Chí Minh', NULL, NULL),
(59, 'Trà Vinh', NULL, NULL),
(60, 'Tuyên Quang', NULL, NULL),
(61, 'Vĩnh Long', NULL, NULL),
(62, 'Vĩnh Phúc', NULL, NULL),
(63, 'Yên Bái', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `admin_admin_username_unique` (`admin_username`);

--
-- Indexes for table `apply_detail`
--
ALTER TABLE `apply_detail`
  ADD KEY `fk_ap_employee` (`employee_id`),
  ADD KEY `fk_ap_job` (`job_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `employee_employee_email_unique` (`employee_email`);

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`employer_id`),
  ADD UNIQUE KEY `employer_employer_username_unique` (`employer_username`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `fk_job_category` (`category_id`),
  ADD KEY `fk_job_employer` (`employer_id`),
  ADD KEY `fk_job_province` (`province_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `employee_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employer`
--
ALTER TABLE `employer`
  MODIFY `employer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `job_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `province_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_detail`
--
ALTER TABLE `apply_detail`
  ADD CONSTRAINT `fk_ap_employee` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`),
  ADD CONSTRAINT `fk_ap_job` FOREIGN KEY (`job_id`) REFERENCES `job` (`job_id`);

--
-- Constraints for table `job`
--
ALTER TABLE `job`
  ADD CONSTRAINT `fk_job_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_job_employer` FOREIGN KEY (`employer_id`) REFERENCES `employer` (`employer_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_job_province` FOREIGN KEY (`province_id`) REFERENCES `province` (`province_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
