-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 07, 2017 at 09:37 AM
-- Server version: 10.2.3-MariaDB-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vacation`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `phone`, `address`, `location_id`, `created_at`, `updated_at`) VALUES
(1, 'New World', '84812345678', 'Lê Lợi', 1, NULL, NULL),
(2, 'Ngọc Lan', '(08-4) 1234 5678', '42 Nguyễn Chí Thanh, Trung tâm thành phố Đà Lạt', 1, '2017-06-06 09:01:07', '2017-06-06 09:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `slug`, `introduce`, `region_id`, `created_at`, `updated_at`) VALUES
(1, 'Đà Lạt', 'da-lat', 'Đà Lạt mộng mơ nơi mimosa và ngàn hoa khoe sắc, từ đồi Robin ngắm Hồ Tuyền Lâm, núi Voi, viếng Thiền Viện Trúc Lâm, thăm Dinh Bảo Đại, tản bộ dưới những tán thông, ngắm biệt thự cổ, nhấm nháp ly café ấm áp trong thời tiết se lạnh. Những chuyến xe ngựa thổ mộ chạy quanh Hồ Xuân Hương cũng là nét duyên của Đà Lạt mờ sương.', 3, NULL, '2017-06-06 09:08:32'),
(2, 'Hồ Chí Minh', 'ho-chi-minh', 'Du lịch đến với thành phố Hồ Chí Minh bạn có thể gặp những tòa nhà cao tầng nằm san sát, những khu vui chơi giải trí, trung tâm mua sắm sầm uất, nhưng cũng không thiếu những biệt thự cổ kính, những ngôi chợ truyền thống. Sài Gòn rộng lớn và không thiếu những “đặc sản” du lịch như du ngoạn ven sông Sài Gòn bằng tàu, thăm phố Tây Phạm Ngũ Lão, mua sắm ở chợ Bến Thành hay về với biển Cần Giờ.', 3, NULL, '2017-06-07 09:25:54'),
(3, 'Nha Trang', 'nha-trang', 'Biển Nha Trang tuyệt vời với Vinpearl Nha Trang 5* sang trọng, hòn Mun Hòn Tằm nước trong veo và san hô lộng lẫy, cùng với vịnh Ninh Vân, vịnh Vân Phong hoang sơ và thuần khiết. Viện Hải dương học Nha Trang có trên 20.000 mẫu sinh vật dưới nước, tháp Bà Ponagar hoàn mỹ của người Chăm, cảng Vũng Rô, làng Đại Lãnh và chợ Đầm nhộn nhịp.', 2, NULL, '2017-06-07 09:26:37'),
(4, 'Hà Nội', 'ha-noi', 'Hà Nội là thủ đô ngàn năm văn hiến, còn lưu dấu nhiều di tích Hồ Gươm, Cầu Thê Húc, Chùa Quán Sứ, Hồ Tây, 36 phố phường. Hà Nội có bốn mùa, luôn mang đến nhiều hoài niệm khó phai, mỗi mùa một vẻ, xuân lễ hội, hạ tươi thắm, thu quyến rũ và đông ấn tượng. Món ngon có Phở, Chả cá Lã Vọng, bánh tôm Hồ Tây.', 1, NULL, '2017-06-07 09:27:22'),
(5, 'Hàn Quốc', 'han-quoc', 'Hàn Quốc xứ kimchi là nơi du lịch với cảnh đẹp và văn hóa tuyệt vời. Seoul sở hữu cung điện Hoàng gia lộng lẫy, chợ Dong Dae Moon, Nam Dae Moon nhộn nhịp, dễ dàng mua nhân sâm, mỹ phẩm và thời trang. Đảo Naomi là bối cảnh phim Hàn Quốc \"Bản tình ca mùa đông” và đảo ngọc tình yêu Jeju ngọt ngào cho các đôi uyên ương.', 4, NULL, '2017-06-07 09:11:21'),
(6, 'Pháp', 'phap', 'Pháp luôn được xem là đất nước lãng mạn nhất thế giới, một quốc gia giàu truyền thống văn hóa, lịch sử. Không chỉ thu hút với nhiều công trình kiến trúc đặc sắc như tháp Eiffel, Nhà thờ Đức Bà Paris cổ kính, cung điện Versailles,… Pháp còn quyến rũ bởi phong cảnh thiên nhiên thơ mộng với những cánh đồng oải hương tuyệt đẹp hay dòng sông Seine yên bình, lãng mạn. Bên cạnh đó, nền ẩm thực Pháp, được xếp vào hàng bậc nhất thế giới, cũng tạo nên sức hút khó cưỡng cho du khách đến đây.', 5, NULL, '2017-06-07 09:28:33'),
(7, 'Nước Úc', 'nuoc-uc', 'Du lịch Châu Úc: là một châu lục bao phủ Australia (Úc) lục địa và là châu có diện tích nhỏ nhất trong 5 châu lục nhưng nó lại được nhớ nhất bởi vì đây cũng chính là hòn đảo lớn nhất thế giới. Vietravel đã có nhiều kinh nghiệm trong việc tổ chức các tour du lịch châu Úc, với các điểm du lịch tham quan và trải nghiệm thật độc đáo.', 6, NULL, '2017-06-07 09:29:09'),
(8, 'Cananda', 'canada', 'Canada đất nước lá phong với bao cảnh đẹp hấp dẫn. Vancouver vào xuân hoa anh đào nở đẹp nhất, rợp trời ngỗng tuyết bay về. Quebec ngọt ngào với siro cây phong danh tiếng, Ontario rực rỡ sắc hoa, Công viên quốc gia Jasper thác nước ầm ầm, nước hồ trong như gương, tất cả làm nên vẻ đẹp hoang sơ hùng vĩ. Canada tuyệt đẹp đáng du lịch.', 7, NULL, '2017-06-07 09:30:02'),
(9, 'Vũng Tàu', 'vung-tau', 'Những cung đường biển đẹp như mơ, ngọn Hải đăng cổ nổi tiếng, tượng Chúa giang tay bình yên, những góc phố thơ mộng, cùng những món ăn hấp dẫn là những gì du khách không thể bỏ qua khi đến với Vũng Tàu. Vũng Tàu trở thành đô thị loại I năm 2013, là một thành phố đáng tới, đáng sống và hạnh phúc.', 3, '2017-06-05 08:30:53', '2017-06-07 09:30:45'),
(10, 'Huế', 'hue', 'Huế thương sơn thủy hữu tình, nơi tọa lạc Đại Nội, Ngọ Môn, Điện Thái Hòa, Tử Cấm Thành, Lăng Tự Đức, Thế Miếu, Hiển Lâm Các, Cửu Đỉnh xưa của 13 vị vua triều Nguyễn. Chùa Thiên Mụ lưu giữ cổ vật lịch sử, nghệ thuật quý giá. Chiều buông, ta ngồi thuyền rồng xuôi dòng sông Hương thưởng thức ca hò Huế, thả hoa đăng cầu phúc lộc.', 2, '2017-06-05 08:31:52', '2017-06-07 09:31:36'),
(11, 'Quảng Ninh', 'quang-ninh', 'Nói đến vùng đất Quảng Ninh, du khách sẽ không thể quên Di sản thiên nhiên hạ Long, nơi 2 lần được UNESCO Công nhận là Di sản thiên nghiên thế giới và là tâm điểm trong cuộc bình chọn Hạ Long là Kỳ quan thiên nhiên thế giới cùng với các danh thắng khác của Thế giới. Hạ Long trong truyền thuyến là Nơi rồng giáng, là điềm may cho vùng đất xinh đẹp này. Từ trên cao hạ long như chuỗi ngọc xanh, với những hình thù kỳ lạ như Đỉnh hương, Gà chọi, Chó đá... Hệ thống hang động hấp dẫn nhất là Thiên Cung, hang Đầu Gỗ, động Sửng Sốt, hang Trinh Nữ, động Tam Cung... Bên cạnh đó Quảng Ninh còn có Bãi Cháy Là một bãi tắm rộng và đẹp nằm sát bờ vịnh Hạ Long, có bãi cát dài hơn 500m, rộng 100m. Theo truyền thuyết xưa, Bãi Cháy chính là nơi đoàn thuyền lương của của quân Nguyên Mông do Trương Văn Hổ cầm đầu vào xâm lược Việt Nam đã bị Trần Khánh Dư cùng quân dân nhà Trần thiêu cháy và bị dạt vào bờ. Quảng Ninh còn có Núi Yên Tử là ngọn núi cao trong dãy núi Đông Triều vùng đông bắc Việt Nam. Núi thuộc xã Thượng Yên Công, thành phố Uông Bí, tỉnh Quảng Ninh. Vốn là là một thắng cảnh thiên nhiên, ngọn Yên Tử còn lưu giữ nhiều di tích lịch sử với mệnh danh \"đất tổ Phật giáo Việt Nam\" và nhiều di tích, danh thắng nổi tiếng, hấp dẫn khác như đảo Tuần Châu, Cô Tô...', 1, '2017-06-05 08:32:19', '2017-06-07 09:32:19'),
(12, 'Quy Nhơn', 'quy-nhon', 'Quy Nhơn có lịch sử dài 400 năm, chịu ảnh hưởng Chămpa thế kỷ 11, triều đại Tây Sơn và cảng Thị Nại thế kỷ 18. Thiên nhiên hoang sơ tĩnh lặng, núi đồi, đầm lầy nước mặn, đường bờ biển dài 42km với các bán đảo xinh đẹp. Quy Nhơn là đô thị loại I, đang phát triển thành trung tâm du lịch của miền Trung.', 2, '2017-06-05 08:32:50', '2017-06-07 09:33:32'),
(13, 'Thái Lan', 'thai-lan', 'Du lịch Thái Lan: Thiên đường du lịch Thái Lan nơi con người thân thiện và vui vẻ, đất nước nhiệt đới độc đáo, nền văn hóa và lịch sử lâu đời. Thái Lan tỏa sáng với những ngôi đền rực rỡ nguy nga, những bãi biển vàng và những nụ cười Thái Lan tươi thắm. Du lịch Thái Lan có mọi thứ: cảnh đẹp chùa tháp, bãi biển, thành phố, và ẩm thực tuyệt vời.', 4, '2017-06-05 08:33:29', '2017-06-07 09:16:58'),
(14, 'Trung Quốc', 'trung-quoc', 'Trung Quốc đất nước thiên nhiên cẩm tú tráng lệ, có nền văn hóa 3.500 năm rực rỡ, khác biệt với sắc đỏ của Tử Cấm Thành, Vạn Lý Trường Thành, không gian hiện đại xen kẽ những lâu đài và tòa thành cổ, Trung Quốc là một vùng đất mê hoặc bất cứ khách du lịch nào. Vietravel là nhà tổ chức tour du lịch Trung Quốc hàng đầu và có nhiều kinh nghiệm tại thị trường du lịch Trung Quốc.', 4, '2017-06-05 08:34:01', '2017-06-07 09:34:12'),
(15, 'Hongkong', 'hongkong', 'Hongkong được chia thành 4 khu Đảo Hong Kong, Kowloon (Cửu Long), Lantau (Lạn Đầu), và New Terriorities (Tân Giới), mỗi khu vực có những điểm du lịch nổi tiếng như núi Thái Bình và các trung tâm mua sắm, Đại lộ các Ngôi sao, Wong Tai Sin Temple (Chùa Hoàng Đại Tiên), các khu chợ địa phương. Disney Wonderland và Tượng Phật lớn.', 4, '2017-06-05 08:34:23', '2017-06-07 09:35:06'),
(16, 'Singapore', 'singapore', 'Singapore đảo quốc với nhiều điểm đến hấp dẫn như Công viên Merlion, Vương quốc côn trùng, Cảng cầu Clarke, Nhà hát Esplanade trên Vịnh.. Các lễ hội vô cùng hấp dẫn như Taipusam lễ hội Hindu diễn ra vào khoảng tháng 2 hàng năm, lễ hội ẩm thực Singapore tháng 6 mùa sales đại khuyến mại. Tháng 7 và 8 là mùa du lịch giá rẻ.', 4, '2017-06-06 09:05:54', '2017-06-06 09:05:54'),
(17, 'Nhật Bản', 'nhat-ban', 'Nhật Bản, xứ sở hoa anh đào, vẫn luôn là nơi thu hút rất nhiều khách du lịch trên thế giới. Đến Nhật Bản, bạn có thể ghé thăm những thành phố hiện đại, sầm uất như Tokyo, Yokohama hay tham quan những vùng đất đậm nét truyền thống, cổ kính như Kyoto, Nagoya; hoặc đắm mình giữa cảnh sắc thiên nhiên xinh đẹp của núi Phú Sĩ và các suối nước nóng ở Noboribetsu… Bên cạnh đó, bạn còn được thưởng thức những món ăn ngon, độc đáo của đất nước này và tham gia các lễ hội văn hóa đậm đà bản sắc dân tộc nơi đây.', 4, '2017-06-06 09:07:18', '2017-06-06 09:07:18'),
(18, 'Phú Quốc', 'phu-quoc', 'Phú Quốc là điểm nghỉ dưỡng, tham quan, và khám phá sinh thái tuyệt vời. Mũi Ông Đội, Đá Chào là thế giới san hô và cá biển sặc sỡ. Bãi Sao cát trắng mịn, dáng cong, nước xanh ngọc bích. Đặc sản danh tiếng cả nước là tiêu sọ, nước mắm, rượu sim, ngọc trai. Phú Quốc thực sự là một viên ngọc quý trên bản đồ Việt Nam.', 3, '2017-06-07 09:00:59', '2017-06-07 09:00:59'),
(19, 'Côn Đảo', 'con-dao', 'Tìm hiểu về biển đảo Việt Nam, hãy đến với Côn Đảo. Chương trình du lịch sinh thái nghỉ dưỡng tại Côn Đảo với bãi biển hoang sơ, hải sản tươi ngon, dân bản địa chân thành, hòn đảo không mất cắp và hơn cả, một địa danh lịch sử oai hùng.', 3, '2017-06-07 09:06:20', '2017-06-07 09:06:20');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_19_050903_create_tours_table', 1),
(4, '2017_04_19_052444_create_admin_table', 1),
(5, '2017_05_03_032245_create_vehicles_table', 1),
(6, '2017_05_04_083221_create_hotels_table', 1),
(7, '2017_05_04_083306_create_locations_table', 1),
(8, '2017_05_04_091001_add_foreign_to_tours2', 1),
(9, '2017_05_09_124844_add_column_to_hotels', 1),
(10, '2017_05_18_110627_create_orders_table', 1),
(11, '2017_05_19_145113_add_column_to_locations', 1),
(12, '2017_05_19_145244_add_column_to_orders', 1),
(13, '2017_05_27_141034_create_regions_table', 1),
(14, '2017_05_27_142936_add_foreign_to_locations', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cart` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `cart`, `name`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:3:{s:3:\"qty\";i:1;s:5:\"price\";i:2000000;s:4:\"item\";O:8:\"App\\Tour\":25:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:16:{s:2:\"id\";i:2;s:4:\"name\";s:35:\"Đà Lạt -Thành phố mộng mơ\";s:4:\"slug\";s:24:\"da-lat-thanh-pho-mong-mo\";s:8:\"hotel_id\";i:1;s:18:\"depart_location_id\";i:2;s:16:\"dest_location_id\";i:1;s:4:\"type\";i:0;s:10:\"vehicle_id\";i:1;s:6:\"number\";i:30;s:11:\"depart_date\";s:10:\"2017-06-03\";s:11:\"return_date\";s:10:\"2017-06-06\";s:3:\"day\";i:4;s:5:\"price\";i:2000000;s:8:\"schedule\";s:23:\"<h4>Ng&agrave;y 1:</h4>\";s:10:\"created_at\";s:19:\"2017-05-31 14:54:39\";s:10:\"updated_at\";s:19:\"2017-05-31 14:54:39\";}s:11:\"\0*\0original\";a:16:{s:2:\"id\";i:2;s:4:\"name\";s:35:\"Đà Lạt -Thành phố mộng mơ\";s:4:\"slug\";s:24:\"da-lat-thanh-pho-mong-mo\";s:8:\"hotel_id\";i:1;s:18:\"depart_location_id\";i:2;s:16:\"dest_location_id\";i:1;s:4:\"type\";i:0;s:10:\"vehicle_id\";i:1;s:6:\"number\";i:30;s:11:\"depart_date\";s:10:\"2017-06-03\";s:11:\"return_date\";s:10:\"2017-06-06\";s:3:\"day\";i:4;s:5:\"price\";i:2000000;s:8:\"schedule\";s:23:\"<h4>Ng&agrave;y 1:</h4>\";s:10:\"created_at\";s:19:\"2017-05-31 14:54:39\";s:10:\"updated_at\";s:19:\"2017-05-31 14:54:39\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:1;s:10:\"totalPrice\";i:2000000;}', 'Test', 'user@example.com', '08012345678', 'Chưa Xử Lý', '2017-06-02 05:57:38', '2017-06-06 09:13:37'),
(2, 2, 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:3;a:3:{s:3:\"qty\";s:1:\"5\";s:5:\"price\";i:17500000;s:4:\"item\";O:8:\"App\\Tour\":25:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";N;s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:16:{s:2:\"id\";i:3;s:4:\"name\";s:38:\"Nha Trang - Vùng biển tươi đẹp\";s:4:\"slug\";s:28:\"nha-trang-vung-bien-tuoi-dep\";s:8:\"hotel_id\";i:1;s:18:\"depart_location_id\";i:2;s:16:\"dest_location_id\";i:3;s:4:\"type\";i:0;s:10:\"vehicle_id\";i:1;s:6:\"number\";i:30;s:11:\"depart_date\";s:10:\"2017-06-06\";s:11:\"return_date\";s:10:\"2017-06-10\";s:3:\"day\";i:5;s:5:\"price\";i:3500000;s:8:\"schedule\";s:17:\"<h4>Ngày 1:</h4>\";s:10:\"created_at\";s:19:\"2017-06-03 06:48:26\";s:10:\"updated_at\";s:19:\"2017-06-03 06:48:26\";}s:11:\"\0*\0original\";a:16:{s:2:\"id\";i:3;s:4:\"name\";s:38:\"Nha Trang - Vùng biển tươi đẹp\";s:4:\"slug\";s:28:\"nha-trang-vung-bien-tuoi-dep\";s:8:\"hotel_id\";i:1;s:18:\"depart_location_id\";i:2;s:16:\"dest_location_id\";i:3;s:4:\"type\";i:0;s:10:\"vehicle_id\";i:1;s:6:\"number\";i:30;s:11:\"depart_date\";s:10:\"2017-06-06\";s:11:\"return_date\";s:10:\"2017-06-10\";s:3:\"day\";i:5;s:5:\"price\";i:3500000;s:8:\"schedule\";s:17:\"<h4>Ngày 1:</h4>\";s:10:\"created_at\";s:19:\"2017-06-03 06:48:26\";s:10:\"updated_at\";s:19:\"2017-06-03 06:48:26\";}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:9:\"\0*\0events\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}s:8:\"totalQty\";i:5;s:10:\"totalPrice\";i:17500000;}', 'Master Admin', 'HCM', '090812345678', 'Hủy', '2017-06-05 08:27:02', '2017-06-05 08:28:16');

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
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `name`, `slug`, `introduce`, `created_at`, `updated_at`) VALUES
(1, 'Miền Bắc', 'mienbac', 'Tour Du Lịch Miền Bắc - Vacation World tổ chức các tour du lịch đi các tỉnh miền bắc với giá cực tốt, chất lượng dịch vụ đảm bảo, điểm tham quan hấp dẫn.', NULL, '2017-06-02 08:02:43'),
(2, 'Miền Trung', 'mientrung', 'Tour Du Lịch Miền Trung - Vacation World tổ chức các tour du lịch đi các tỉnh miền trung với giá cực tốt, chất lượng dịch vụ đảm bảo, điểm tham quan hấp dẫn.', NULL, NULL),
(3, 'Miền Nam', 'miennam', 'Tour Du Lịch Miền Nam - Vacation World tổ chức các tour du lịch đi các tỉnh miền nam với giá cực tốt, chất lượng dịch vụ đảm bảo, điểm tham quan hấp dẫn.', NULL, NULL),
(4, 'Châu Á', 'chaua', 'Tour du lịch Châu Á là thế mạnh của Vacation World, du khách sẽ được khám phá những kỳ quan danh lam thắng cảnh tuyệt đẹp, đậm nét đặc sắc văn hóa vùng miền. Hành trình đa sắc màu ở Cambodia, Lào, Thái, Malaysia-Singapore, Trung Quốc, Nhật Bản, Hàn Quốc...', NULL, NULL),
(5, 'Châu Âu', 'chauau', 'Vacation World - Top 10 công ty du lịch Hàng Đầu Việt Nam chuyên tổ chức các tour du lịch Châu Âu, thường xuyên mở bán những đường tour mới nhất, đưa bạn tới những điểm đến độc đáo của Châu Âu. Đồng hành cùng Vacation World, du khách sẽ được tận hưởng những giá trị tốt nhất trên mỗi đường tour.', NULL, NULL),
(6, 'Châu Úc', 'chauuc', 'Vacation World - Top 10 công ty du lịch Hàng Đầu Việt Nam chuyên tổ chức các tour du lịch Châu Úc, thường xuyên mở bán những đường tour mới nhất, đưa bạn tới những điểm đến độc đáo của Châu Úc. Đồng hành cùng Lửa Việt, du khách sẽ được tận hưởng những giá trị tốt nhất trên mỗi đường tour.', NULL, NULL),
(7, 'Châu Mỹ', 'mienbac', 'Vacation World - Top 10 công ty du lịch Hàng Đầu Việt Nam chuyên tổ chức các tour du lịch Châu Mỹ cao cấp dịch vụ Cao Cấp Chất Lượng. Du lịch Châu Mỹ khám phá những vùng đất mới vừa huyền bí vừa tráng lệ.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE `tours` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotel_id` int(10) UNSIGNED NOT NULL,
  `depart_location_id` int(10) UNSIGNED NOT NULL,
  `dest_location_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `depart_date` date NOT NULL,
  `return_date` date NOT NULL,
  `day` tinyint(3) UNSIGNED NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `schedule` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `name`, `slug`, `hotel_id`, `depart_location_id`, `dest_location_id`, `type`, `vehicle_id`, `number`, `depart_date`, `return_date`, `day`, `price`, `schedule`, `created_at`, `updated_at`) VALUES
(1, 'Nha Trang - Hòn Nội (Đảo Yến) - White Sand Dốc Lết - Vinpearl Land (Xe. Khách Sạn 2*. Trải nghiệm Bãi tắm Đôi. Festival Biển Nha Trang. Chương trình Mới)', 'nha-trang-hon-noi-dao-yen-white-sand-doc-let-vinpearl-land-xe-khach-san-2-trai-nghiem-bai-tam-doi-festival-bien-nha-trang-chuong-trinh-moi', 1, 2, 3, 0, 2, 20, '2017-06-10', '2017-06-13', 4, 3290000, '<h4>Ngày 1 : TP.HCM - NHA TRANG Số bữa ăn : 03 bữa (sáng, trưa, chiều)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160216_hinh%20Nha%20Trang.jpg\"><br><br>\r\nQuý khách tập trung tại Vietravel (190 Pasteur, Q3, Tp.HCM), đoàn khởi hành đi Nha Trang. Trên đường đi Quý khách ăn sáng. Sau đó, đoàn ghé tham quan Bãi biển Cà Ná - Một trong những bãi biển đẹp nhất miền Trung. Ăn trưa. Từ Cam Ranh, xe đưa Quý khách đi theo con đường mới đến Nha Trang, ngắm cảnh hoàng hôn trên Vịnh Nha Trang. Đoàn đến Nha Trang ăn tối, nhận phòng. Sau đó, tự do nghỉ ngơi thư giãn. Nghỉ đêm tại Nha Trang.</p>\r\n\r\n<h4><br>\r\nNgày 2 : NHA TRANG - WHITE SAND DỐC LẾT Số bữa ăn : 02 bữa (sáng, trưa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170509045514_691395.jpg\"><br><br>\r\nSau khi dùng buffet sáng tại khách sạn, xe Vietravel đưa Quý khách tham quan Khu du lịch White Sand Dốc Lết - Được thiết kế bằng bãi cỏ xanh ngát và hàng dừa đặc trưng của vùng biển, nơi mà ánh nắng mặt trời, cát trắng và phong cảnh đã hòa quyện vào nhau để làm nên một khung cảnh thơ mộng cho khu du lịch cao cấp này. Quý khách tự do tắm biển, tham gia các trò chơi trên biển: Môtô nước, dù lượn, trượt nước, ván buồm... hay thưởng thức hải sản (chi phí tự túc). Dùng bữa trưa. Sau đó đoàn khởi hành về khách sạn nghỉ ngơi. Buổi chiều, Quý khách lựa chọn một trong hai chương trình sau : <br>\r\n       1. Tham quan các biểu tượng tôn giáo của TP.Nha Trang như Long Sơn Tự  là ngôi chùa cổ kính có quy mô lớn nhất trong số hơn 20 ngôi chùa ở Nha Trang. Chùa nằm ngay trong nội thành Nha Trang, dưới chân Đồi Trại Thủy. Đây cũng là một trong những thắng cảnh nổi tiếng của Nha Trang. Sau đó Quý khách tự do tham quan và thư giãn tại Trung tâm suối khoáng nóng cao cấp I-Resort ( Chi phí tự túc) -Với không gian yên tĩnh, cây cối xanh tươi, khung cảnh thiên nhiên đậm chất Việt, Quý khách sẽ có những giây phút thật thoải mái và thư giãn. Đặc biệt từ mùa hè 2016 Quý khách tham quan I-resort còn có cơ hội vui chơi giải trí tại Công Viên Suối Khoáng Nóng I-Resort -  Là công viên nước khoáng đầu tiên và duy nhất tại Việt Nam, có hệ thống thác nước khoáng to lớn hùng vĩ cùng nhiều trò chơi nước độc đáo, nằm trải dài bên bờ sông Cái thơ mộng. Công viên nước khoáng I Resort Nha Trang hứa hẹn mang tới cho bạn cảm giác sảng khoái cùng sự hài lòng tuyệt đối. (Chi phí vui chơi tại công viên tự túc).<br>\r\n       2. Quý khách tự do dạo phố biển (hoặc đăng ký chương trình tham quan Thế Giới Giải Trí Vinpearl Land (chi phí tự túc), tham gia các trò chơi: quay nhào lộn, đu quay ngựa gỗ, tàu lượn, đua xe, khám phá vũ trụ hoặc tắm biển, tắm hồ bơi lớn nhất Đông Nam Á…và thưởng thức Chương trình biểu diễn Nhạc Nước hiện đại. Quý khách tự túc phương tiện về khách sạn hoặc đi dạo phố biển về đêm.<br>\r\nBuổi tối Quý khách có thể khám phá nét đẹp ẩm thực của Nha Trang qua các món ăn dân dã nổi tiếng như nem nướng Ninh Hòa, Bún sứa, phố hải sản Pogana…(tự túc ăn tối). Nghỉ đêm tại Nha Trang.</p>\r\n\r\n<h4><br>\r\nNgày 3 : NHA TRANG – HÒN NỘI Số bữa ăn : 03 bữa (sáng, trưa, chiều)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170509045501_897203.jpg\"><br><br>\r\nĂn sáng sớm tại khách sạn.  Xe đưa đoàn ra Cảng đi tàu khởi hành đến Đảo Yến. Quý khách sẽ dùng thêm bữa ăn nhẹ trên tàu. Tham quan Hang Yến, xem san hô và sinh vật biển tại Đảo Yến – Hòn Nội bằng tàu Đáy kính, tham quan các di tích thắng cảnh trên Đảo, chinh phục đỉnh núi Du Hạ cao 90m, tắm biển trên Bãi tắm đôi của Đảo Hòn Nội, dùng cơm trưa tại Nhà Hàng trên Đảo với các món hải sản. Tiếp tục xem phim tìm hiểu lịch sử hình thành và phát triển ngành nghề Yến Sào, thăm Đền thờ Tổ Nghể Yến Sào Khánh Hòa. Tàu trở về đất liền. Tiếp tục xe đưa đoàn tham quan và mua đặc sản tại chợ Đầm. Buổi chiều, ăn tối tại Nha Trang. Sau đó Quý khách tự do dạo phố biển hoặc thưởng thức cocktail tại Sailing Club (chi phí tự túc) - bar trên biển sôi động với những màn DJ độc đáo, múa lửa ấn tượng. Hoặc thưởng thức chương trình Nha Trang Dream Show (chi phí tự túc) – show diễn nghệ thuật với qui mô lớn, ấn tượng, là sự kết tinh của tinh hoa văn hóa dân tộc trên mọi miền đất nước và hơi thở đương đại. Nghỉ đêm tại Nha Trang.</p>\r\n\r\n<h4><br>\r\nNgày 4 : NHA TRANG – TPHCM Số bữa ăn : 02 bữa (sáng, trưa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160511_nha-trang.jpg\"><br>\r\nSau khi dùng buffet sáng Quý khách trả phòng khách sạn. Khởi hành về Tp.HCM. Trên đường về dừng tham quan mua đặc sản Phan Rang như: nho, tỏi... Ăn trưa. Chiều về đến Tp.HCM, đưa khách về điểm đón ban đầu. Chia tay Quý khách và kết thúc chương trình du lịch.</p>', NULL, '2017-06-07 08:30:11'),
(2, 'Đà Lạt -Thành phố ngàn hoa', 'da-lat-thanh-pho-ngan-hoa', 1, 2, 1, 0, 1, 30, '2017-06-08', '2017-06-10', 3, 2000000, '<h4>Ngày 1 : TP. HCM - ĐÀ LẠT Số bữa ăn: 3 bữa (sáng, trưa, chiều)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170309091601_872506.jpg\"><br><br>\r\nQuý khách tập trung tại Vietravel (190 Pasteur, Quận 3, Tp.HCM). Đoàn khởi hành đi Đà Lạt. Trên đường đi Quý khách dừng chân ăn sáng. Trên đường đi Quý khách tham quan Khu du lịch Memento Country House. Tại đây, Quý khách sẽ được hòa mình vào bầu không khí trong lành và tĩnh lặng của miền quê Trung bộ với bãi cỏ rộng xanh biếc, tiếng chim hót líu lo, với những những mái nhà tranh vách đất đơn sơ mộc mạc. Những dịch vụ thư giãn mang tính đồng nội: câu cá, dịch vụ spa với nguyên liệu từ thiên nhiên, thư giãn trên bãi cỏ rộng hay ngủ võng trong tiếng kẽo kẹt của rặng tre xanh (chi phí tự túc). Quý khách còn có dịp thưởng thức bữa trưa với những món ăn mang hương vị miền quê Việt Nam tại Khu du lịch Memento. Đến Đà Lạt, Đoàn ăn tối và nhận phòng nghỉ ngơi. Buổi tối, Quý khách tự do thưởng thức cà phê trong không khí se lạnh của phố núi Đà Lạt. Nghỉ đêm tại Đà Lạt.</p>\r\n\r\n<h4><br>\r\nNgày 2 : ĐÀ LẠT - THÀNH PHỐ NGÀN HOA Số bữa ăn: 3 bữa (sáng, trưa chiều)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170309091526_618324.png\"><br><br>\r\nBuổi sáng, dùng điểm tâm tại Khách sạn. Xe đưa Quý khách tham quan, chinh phục Núi Langbiang - Nóc nhà Tây Nguyên, ngắm toàn cảnh núi đồi, hồ Dankia, suối Vàng với những dòng sông uốn lượn từ trên cao (Quý khách có thể đi lên núi bằng xe Jeep - Chi phí tự túc). Đoàn tiếp tục tham quan Thung Lũng Vàng - Nơi đây không những hội tụ những nét đặc trưng của Đồi Cù xưa mà còn có những cảnh quan thơ mộng và hấp dẫn với vườn cây, bãi đá, vườn bonsai hay các thác nước nhân tạo… Ăn trưa tại Nhà Hàng.<br><br>\r\nBuổi chiều, Xe đưa Quý khách đến Biệt Điện Bảo Đại (Dinh III) - Nơi từng sinh sống và làm việc của gia đình vị Hoàng đế cuối cùng của triều đại phong kiến Việt Nam. Tiếp tục, Xe đưa đoàn tham quan Đường Hầm Đất Sét nghệ thuật dài nhất với những tác phẩm điêu khắc bằng đất nung hoành tráng, ấn tượng được sách Kỷ Lục Việt Nam công nhận. Đường hầm này như tái hiện lại lịch sử, văn hóa của Đà Lạt từ thưở ban đầu cho đến hiện tại qua các tượng điêu khắc đất sét lớn nhỏ khác nhau. Khi đến đây, Du khách không khỏi ngỡ ngàng khi được ngắm nhìn một quần thể các công trình kiến trúc quen thuộc như Trường cao đẳng Sư phạm, ga xe lửa Đà Lạt, các nhà thờ, chùa chiền, biệt thự cổ.v.v..trong những mô hình bằng đất sét với màu đất đỏ Bazan đặc trưng qua bàn tay nhào nặng điêu luyện  của con người … Đoàn ăn tối tại Nhà Hàng. Ghé Chợ Đà Lạt tham quan và mua đặc sản. Nghỉ đêm tại Đà Lạt.</p>\r\n\r\n<h4><br>\r\nNgày 3 : ĐÀ LẠT - TP. HCM Số bữa ăn: 2 bữa (sáng, trưa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170105103910_250651.JPG\"><br><br>\r\nBuổi sáng, dùng điểm tâm tại Khách sạn. Quý khách làm thủ tục trả phòng, khởi hành về Tp. HCM. Trên đường về xe đưa Quý khách đến tham quan Thiền Viện Trúc Lâm - Ngắm toàn cảnh Hồ Tuyền Lâm với thiên nhiên, núi đồi, rừng thông Đà Lạt … Đoàn tiếp tục đi tham quan Thác Datanla - Tại đây Quý khách có thể chinh phục thử thách với dịch vụ máng trượt ống để tham quan thác (chi phí tự túc). Ăn trưa tại Nhà Hàng. Chiều về đến Tp. HCM, Xe đưa Quý khách về điểm đón ban đầu. Chia tay Quý khách và kết thúc chương trình du lịch.<br>\r\n </p>', '2017-05-31 07:54:39', '2017-06-07 08:18:39'),
(3, 'Hà Nội - Lào Cai - Sapa - Nóc Nhà Đông Dương Fansipan - 1 đêm k/s 4 sao', 'ha-noi-lao-cai-sapa-noc-nha-dong-duong-fansipan-1-dem-ks-4-sao', 1, 2, 4, 0, 1, 30, '2017-06-07', '2017-06-10', 4, 6590000, '<h4>Ngày 1 : TP. HỒ CHÍ MINH - NỘI BÀI (HÀ NỘI) - LÀO CAI - SAPA (Ăn trưa, ăn tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160406_B%E1%BA%A3n%20T%E1%BA%A3%20Van%20-%20Lao%20ch%E1%BA%A3i.jpg\"><br><br>\r\nQuý khách tập trung tại sân bay Tân Sơn Nhất, cột số 4 ga đi trong nước. Hướng dẫn viên làm thủ tục cho đoàn đáp chuyến bay đi Hà Nội. Xe Vietravel đón đoàn tại sân bay Nội Bài, khởi hành đi Sa Pa theo cung đường cao tốc hiện đại và dài nhất Việt Nam nối Hà Nội và Lào Cai qua các tỉnh Vĩnh Phúc, Phú Thọ,Yên Bái. Đến Sapa, nhận phòng nghỉ ngơi. Buổi chiều quý khách thăm Bản Tả Van - Lao chải  đường vào Tả Van quanh co một bên là thung lũng Mường Hoa với những thửa ruộng bậc thang màu mỡ được tổ điểm bởi màu xanh của ngô và lúa. Đến bản Tả Van vào thăm những nếp nhà của người Mông, Dao, Giáy, du khách sẽ không khỏi ngỡ ngàng trước vẻ đẹp bình dị, mộc mạc. Buổi tối Quý khách dạo phố, ngắm nhà thờ Đá Sapa, tự do thưởng thức đặc sản vùng cao như: thịt lợn cấp nách nướng, trứng nướng, rượu táo mèo, giao lưu với người dân tộc vùng cao. Nghỉ đêm tại Sapa.</p>\r\n\r\n<h4><br>\r\nNgày 2 : SA PA – FANSIPAN HÙNG VĨ - LÀO CAI (Ăn sáng, trưa, tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160406_%C4%91%E1%BB%89nh%20n%C3%BAi%20Fansipan.jpg\"><br><br>\r\nQuý khách tham quan Thác Bạc, Đèo Ô Quy Hồ - ranh giới giữa 2 tỉnh Lào Cai và Lai Châu uốn lượn quanh dãy Hoàng Liên còn gọi là khu vực Cổng Trời. Tại đây du khách chiêm ngưỡng toàn cảnh bức tranh thiên nhiên của núi rừng Tây Bắc vô cùng hùng vĩ và ấn tượng từ trên cao. Xe đưa tham quan chinh phục đỉnh núi Fansipan hùng vĩ (chi phí tự túc)– được mệnh danh \"Nóc nhà Đông Dương\" với độ cao 3.143m. Đến đây, đoàn sẽ được đi bằng cáp treo đang sở hữu 2 kỷ lục Guiness, đó là hệ thống cáp treo ba dây dài nhất thế giới (6.325m) và có độ chênh giữa ga đi và ga đến lớn nhất thế giới (1.410m). Ngoài ra, tại ga đi Quý khách còn được tham quan, lễ phật tại Chùa Trình hay cầu phúc lộc, bình an cho gia đình tại Chùa Hạ ở ga đến. Bên cạnh đó, trong hành trình chinh phục đỉnh núi Fansipan, Quý khách còn được ngắm nhìn hệ sinh thái, cảnh sắc núi rừng Sapa bạt ngàn phía dưới cũng là một trải nghiệm tuyệt vời và khó quên… Buổi chiều, khởi hành về Lào Cai, nhận phòng khách sạn. Tự do khám phá thành phố về đêm. Nghỉ đêm tại Lào Cai.</p>\r\n\r\n<h4><br>\r\nNgày 3 : LÀO CAI - HÀ NỘI (Ăn sáng, trưa, tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160413_ho-hoan-kiem.jpg\"><br><br>\r\nTrả phòng khách sạn, Quý khách tham quan cửa khẩu biên giới Việt - Trung “Lào Cai- Hà Khẩu”, mua sắm tại chợ Cốc Lếu. Theo cung đường cao tốc trở về Hà Nội, nhận phòng nghỉ ngơi. Xe đưa Quý khách dạo quanh Hồ Hoàn Kiếm ngắm Tháp Rùa, Đền Ngọc Sơn, Cầu Thê Húc. Buổi tối, Quý khách tự do khám phá phố cổ về đêm. Nghỉ đêm tại Hà Nội.</p>\r\n\r\n<h4><br>\r\nNgày 4 : HÀ NỘI - TP.HCM (Ăn sáng, trưa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160413_caybenLangBac.jpg\"><br><br>\r\nXe đưa Quý khách tham quan và tìm hiểu cuộc đời và sự nghiệp của vị cha già dân tộc tại Lăng Hồ Chủ Tịch (không viếng vào thứ 2, thứ 6 hàng tuần), Nhà Sàn Bác Hồ, Bảo Tàng Hồ Chí Minh, Chùa Một Cột. Tham quan Văn Miếu - Nơi thờ Khổng Tử và các bậc hiền triết của Nho Giáo, Quốc Tử Giám - Trường đại học đầu tiên của Việt Nam. Xe đưa Quý khách ra sân bay Nội Bài đáp chuyến bay về Tp.HCM. Chia tay Quý khách và kết thúc chương trình du lịch tại sân bay Tân Sơn Nhất.</p>', '2017-06-02 23:48:26', '2017-06-07 08:37:24'),
(4, 'Đà Nẵng - Bà Nà - Sơn Trà - Hội An - Lăng Cô - Huế - Đà Nẵng (Siêu tiết kiệm)', 'da-nang-ba-na-son-tra-hoi-an-lang-co-hue-da-nang-sieu-tiet-kiem', 1, 2, 10, 0, 1, 30, '2017-06-12', '2017-06-14', 3, 4590000, '<h4>Ngày 1 : TP.HỒ CHÍ MINH - ĐÀ NẴNG – HỘI AN (Ăn trưa, tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170316040556_128553%281%29.jpg\"><br>\r\nQuý khách tập trung tại Sân bay Tân Sơn Nhất, quầy Vietravel, cột số 4, ga đi Trong Nước. Hướng dẫn viên làm thủ tục cho Quý khách đáp chuyến bay đi Đà Nẵng. Tại sân bay Đà Nẵng, xe và hướng dẫn viên Vietravel đón Quý khách đi dạo một vòng Bán đảo Sơn Trà, ngắm cảnh cảng Tiên Sa, viếng chùa Linh Ứng Bãi Bụt - ngôi chùa lớn nhất ở thành phố Đà Nẵng - Nơi đây có tượng Phật Quan Thế Âm cao nhất Việt Nam (67m). Đứng nơi đây, Quý khách sẽ được chiêm ngưỡng toàn cảnh thành phố, núi rừng và biển đảo Sơn Trà một cách hoàn hảo nhất. Ăn trưa. Chiều xe đưa Quý khách đi xe đưa Quý khách đi tắm biển Mỹ Khê Đà Nẵng - một trong những bãi biển quyến rũ nhất hành. Sau đó đoàn tham quan Phố Cổ Hội An: Chùa Cầu, Nhà Cổ Phùng Hưng, Hội Quán Phước Kiến, Cơ sở Thủ Công Mỹ Nghệ… tự do dạo phố đèn lồng nhiều màu sắc và mua những món quà lưu niệm của địa phương, thử tài trong các trò chơi dân gian như đập niêu, hát bài chòi,..Ăn chiều, đoàn về lại khách sạn tự do nghỉ ngơi. Nghỉ đêm Đà Nẵng</p>\r\n\r\n<h4><br>\r\nNgày 2 : ĐÀ NẴNG – LĂNG CÔ - HUẾ (Ăn sáng, trưa, tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_160927035443_548414.jpg\"><br><br>\r\nĂn sáng buffet tại khách sạn. Xe đưa đoàn đi xuyên Hầm Hải Vân - Hầm đường bộ dài nhất Đông Nam Á khởi hành đi Huế, trên đường đi đoàn dừng tham quan Vịnh Lăng Cô - Một trong những vịnh biển đẹp nhất thế giới. Đến Huế đoàn tham quan Lăng Khải Định – sự giao hòa kiến truc Đông Tây. Ăn trưa. Chiều đoàn tham quan Đại Nội - Hoàng cung xưa của 13 vị vua triều Nguyễn, tham quan Ngọ Môn, Điện Thái Hòa, Tử Cấm Thành, Thế Miếu, Hiển Lâm Các, Cửu Đình,… tiếp tục viếng Chùa Thiên Mụ - Ngôi chùa được xem là biểu tượng xứ Huế và là nơi lưu giữ nhiều cổ vật quý giá không chỉ về mặt lịch sử mà còn cả về nghệ thuật. Sau đó xe đưa Quý khách đi xuyên Hầm Hải Vân về lại Đà Nẵng. Ăn chiều. Buổi tối, quý khách tự do nghỉ ngơi tại khách sạn hoặc thưởng ngoạn cảnh đẹp của Đà Nẵng về đêm, ngắm nhìn những cây cầu biểu tượng cho sự phát triển không ngừng của thành phố Đà Nẵng như: Cầu Rồng, Cầu Quay Sông Hàn, cầu Trần Thị Lý, Trung Tâm Thương Mại, Khu phố ẩm thực, Café - Bar – Disco…. Nghỉ đêm Đà Nẵng </p>\r\n\r\n<h4><br>\r\nNgày 3 : ĐÀ NẴNG – KDL BÀ NÀ - TP. HỒ CHÍ MINH (Ăn sáng)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170316040935_917112%281%29.png\"><br><br>\r\nĂn sáng buffet tại khách sạn. Xe đưa Quý khách đi tham quan Khu du lịch Bà Nà - Suối Mơ, đến nơi Quý khách đi tuyến cáp treo một dây dài nhất thế giới lên Đỉnh núi Bà Nà (chi phí cáp treo tự túc), tận hưởng không khí se lạnh của “Đà Lạt tại miền Trung”, đoàn tự do đi bộ hoặc di chuyển bằng tàu hỏa leo núi tham quan: Chùa Linh Ứng, Hầm Rượu Debay, vườn hoa Le Jardin D’Amour… Tiếp đến, Quý khách đến Khu Tâm linh mới của Bà Nà viếng Đền Lĩnh Chúa Linh Từ - Đền nằm trên đĩnh Núi Chúa, nơi thờ Bà Mẫu Thượng Ngàn,… tham quan Lầu chuông, Tháp Linh Phong Tự. Sau đó đến khu vui chơi Fantasy Park: với các trò chơi phiêu lưu mới lạ, trải nghiệm cảm giác mạnh như: Vòng Quay Tình Yêu, Phi Công Skiver, Đường Đua Lửa, Ngôi Nhà Ma và Khu trưng bày hơn 40 tượng sáp - Là những nhân vật ca sĩ, diễn viên, nhà khoa học, lãnh tụ nỗi tiếng trên thế giới…Ăn trưa tại Bà Nà tự túc. Tự do tham quan vui chơi đến giờ về xuống Cáp. Xe Vietravel tiễn Quý khách ra sân bay Đà Nẵng đón chuyến bay trở về Tp.HCM. Chia tay Quý khách và kết thúc chương trình du lịch tại sân bay Tân Sơn Nhất.</p>', '2017-06-07 08:49:30', '2017-06-07 08:49:30'),
(5, 'Hà Nội - Ninh Bình - Cố Đô Hoa Lư - Vườn Chim Thung Nham - Yên Tử - Hạ Long - Tặng vé xem Show Tứ Phủ', 'ha-noi-ninh-binh-co-do-hoa-lu-vuon-chim-thung-nham-yen-tu-ha-long-tang-ve-xem-show-tu-phu', 1, 2, 11, 0, 1, 25, '2017-06-14', '2017-06-17', 4, 6590000, '<h4>Ngày 1 : TP.HCM - (NỘI BÀI) HÀ NỘI – CỐ ĐÔ HOA LƯ – THUNG NHAM Số bữa ăn: 2 bữa (trưa, chiều)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170307112537_611672.jpg\"><br><br>\r\nQuý khách tập trung tại Sân bay Tân Sơn Nhất, quầy Vietravel, cột số 04. Ga đi Trong Nước. Hướng dẫn viên làm thủ tục cho Quý khách đáp chuyến bay đi Hà Nội. Xe Vietravel đón Quý khách tại sân bay Nội Bài, khởi hành đi Ninh Bình. Đến Ninh Bình, ăn trưa. Quý Khách tham quan Cố đô Hoa Lư là quần thể di tích quốc gia đặc biệt quan trọng của Việt Nam, là một trong 4 vùng lõi của quần thể di sản thế giới Tràng An đã được UNESCO công nhận. Quý khách tiếp tục tham quan Vườn chim Thung Nham - một khung cảnh thiên nhiên thơ mộng, hữu tình với rừng cây, hồ nước, vườn cây ăn trái và hệ thống hang động tuyệt đẹp. Đoàn tham quan Hang Bụt - hang đá tự nhiên có chiều dài 500m, nơi rộng nhất là 70m và nơi cao nhất là 30m, trong hang có hệ thống nhũ đá lung linh kỳ ảo, đặc biệt trong hang có hình ông bụt như đang hiện hữu ngồi bên cạnh dòng sông ngầm để ban tặng những điều may mắn và tốt lành cho du khách; Động Tiên Cá - là một trong những động xuyên thủy đẹp nhất lại khu du lịch sinh thái vườn chim Thung Nham, động có chiều dài khoảng 1000m, trong động có hệ thống nhũ đá lung linh huyền ảo gắn liền với câu chuyện cổ tích về nàng tiên cá; tiếp tục đến tham quan Vườn cây ăn quả, thưởng thức những trái khế, táo ngọt ngay tại vườn và đặc biệt tham quan cây Duối ngàn năm - mọc hoàn toàn trên tảng đá lớn và gắn liền với một cây chuyện về vua Đinh Tiên Hoàng. Đến bến thuyền, đoàn tham quan và chụp ảnh cùng Cây đa di chuyển, Quý khách lên thuyền tham quan Thung Chim - là nơi cư trú và sinh sống của đa dạng các loài chim như cò, vạc, diệc, le le, mòng két, chích chòe lửa, sáo đá,… đặc biệt có 2 loài chim quý hiếm được ghi trong sách đỏ là hằng hạc và phượng hoàng, một trong những linh vật trong bộ tứ Long Ly Quy Phượng Đặc biệt vào buổi chiều khi chim về tổ tạo nên khung cảnh ấn tượng khó quên. Nhận phòng khách sạn. Nghỉ đêm tại Ninh Bình.</p>\r\n\r\n<h4><br>\r\nNgày 2 : NINH BÌNH – HẠ LONG Số bữa ăn: 3 bữa ( sáng, trưa, chiều )</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20151002_1%20%286%29.JPG\"><br>\r\nXe đưa Qúy khách khởi hành đi Hạ Long Quý khách ra bến tàu, xuống tàu du ngoạn trên Vịnh Hạ Long - Thắng cảnh thiên nhiên tuyệt đẹp và vô cùng sống động, được UNESCO công nhận là di sản thiên nhiên Thế giới năm 1994. Đoàn tham quan và khám phá sự lộng lẫy, nguy nga của Động Thiên Cung. Từ trên tàu ngắm nhìn các hòn đảo lớn nhỏ trong Vịnh Hạ Long: Hòn Gà Chọi, Hòn Lư Hương. Buổi tối, tự do tham quan Khu Du Lịch Đảo Tuần Châu (chi phí tự túc), xem biểu diễn cá heo - hải cẩu - sư tử biển, xiếc thú, biểu diễn vũ điệu nhạc nước và ánh sáng laser, game trong nhà, xe điện dụng, xe ngựa hào hoa, chiếu phim 5D, triễn lãm hoa đăng, biễu diễn ca múa nhạc. Hay khám phá Sun World Ha Long Park (chi phí tự túc) trên Núi Ba Đèo bằng cáp treo Nữ Hoàng từ bờ biển Bãi Cháy, cáp treo đạt 2 kỷ lục thế giới (cabin có sức chứa lớn nhất thế giới, đạt 230 người/cabin và cáp treo có trụ cáp cao nhất thế giới so với mặt đất, trụ cáp T1 cao 188,88m.), trải nghiệm vòng quay mặt trời, tham quan vườn Nhật, khu trưng bày tượng sáp, khu vui chơi trẻ em…  Nghỉ đêm tại Hạ Long</p>\r\n\r\n<h4><br>\r\nNgày 3 : HẠ LONG – HÀ NỘI – TỨ PHỦ SHOW Số bữa ăn: 3 bữa ( sáng, trưa, chiều )</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170307113106_441663.jpg\"><br>\r\nXe đưa Quý khách khởi hành về Hà Nội, trên đường tham quan Núi Yên Tử (chi phí cáp treo tự túc)- Thắng cảnh thiên nhiên còn lưu giữ nhiều di tích lịch sử với mệnh danh “đất tổ Phật giáo Việt Nam”. Sau đó đoàn đi cáp treo viếng Chùa Hoa Yên - Ngôi chùa to và đẹp, nằm trên lưng chừng núi ở độ cao 516m, thăm Tháp Tổ. Tiếp tục khởi hành về Hà Nội, buổi chiều quý khách xem chương trình “Tứ Phủ” - vở diễn là một chuyến du hành vào cõi tâm linh ấn tượng với sự kết hợp những nét đẹp đầy tinh tế. Chương trình gồm 3 chương: Chầu Đệ Nhị - Ông Hoàng Mười - Cô Bé Thượng Ngàn, Quý khách sẽ được phiêu trong những màn trình diễn lên đồng đầy ấn tượng kết hợp với sự sắp đặt, âm thanh, ánh sáng sẽ cho du khách cảm nhận đầy đủ về một không gian tâm linh sống động, nội dung chương trình được lấy cảm hứng từ văn hóa Đạo Mẫu của Việt Nam….Nghỉ đêm tại Hà Nội <br>\r\n </p>\r\n\r\n<h4><br>\r\nNgày 4 : HÀ NỘI - TP.HCM Số bữa ăn: 2 bữa (sáng, trưa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170307113128_592228.JPG\"><br>\r\nXe đưa Quý khách dạo quanh Hồ Hoàn Kiếm ngắm Tháp Rùa, Đền Ngọc Sơn, Cầu Thê Húc. Đoàn tiếp tục tham quan và tìm hiểu cuộc đời và sự nghiệp của vị cha già dân tộc tại Lăng Hồ Chủ Tịch: Nhà Sàn Bác Hồ, Bảo Tàng Hồ Chí Minh, Chùa Một Cột. Sau đó xe đưa quý khách tham quan mua sắm tại Vincom Mega Mall Royal City (chi phí tự túc) - Được thiết kế theo phong cách Hoàng gia Châu Âu, là quần thể trung tâm thương mại và vui chơi giải trí đầu tiên tại Việt Nam phát triển theo mô hình Mega Mall chuẩn quốc tế. Không chỉ là nơi thỏa mãn nhu cầu mua sắm lớn nhất cả nước với 600 gian hàng mà còn là khu vui chơi giải trí độc đáo, với nhiều trò chơi hấp dẫn như công viên nước trong nhà, sân trượt băng tự nhiên trong nhà lớn nhất Việt Nam…. Xe đưa Quý khách ra sân bay Nội Bài đáp chuyến bay về Tp.HCM. Chia tay Quý khách và kết thúc chương trình du lịch tại sân bay Tân Sơn Nhất.</p>', '2017-06-07 08:55:13', '2017-06-07 08:55:13'),
(6, 'Khách sạn Imperial Vũng Tàu - Deluxe (giá bán/phòng)', 'khach-san-imperial-vung-tau-deluxe-gia-banphong', 1, 2, 9, 0, 2, 30, '2017-06-08', '2017-06-09', 2, 1990000, '<h4>Ngày 1 : DỊCH VỤ PHÒNG KHÁCH SẠN IMPERIAL 5* 2N1Đ – VŨNG TÀU</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170603034802_671113.jpg\"><br>\r\nGIÁ BAO GỒM:<br>\r\n2 ngày 1 đêm ở phòng Deluxe tại Khách sạn Imperial 5 - Số 159-163, Thùy Vân, TP. Vũng Tàu, tỉnh Bà Rịa-Vũng Tàu<br>\r\nPhòng tiêu chuẩn cho 02 người lớn<br>\r\nBữa sáng trong khách sạn<br>\r\nWifi <br>\r\nHồ bơi<br>\r\n <br>\r\nGIÁ KHÔNG BAO GỒM:<br>\r\nĐồ uống minibar, điện thoại, giặt ủi.<br>\r\nCác bữa ăn ngoài bữa sáng trong phần bao gồm<br>\r\nTrẻ em và người lớn đi kèm.<br>\r\nChi phí đi lại.<br>\r\nPhí nhận phòng sớm và trả phòng muộn theo qui định của khách sạn.<br>\r\nChi phí cá nhân và các chi phí phát sinh khác.<br>\r\n <br>\r\nĐIỀU KIỆN:<br>\r\nThanh toán 100% không hoàn, không hủy, không đổi.<br>\r\nGiờ nhận phòng: Sau 14:00<br>\r\nGiờ trả phòng: Trước 12:00<br>\r\nMột phòng chứa tối đa 03 người lớn + 01 trẻ em hoặc 02 người lớn + 02 trẻ em<br>\r\n <br>\r\nPHỤ THU (vui lòng thanh toán tại khách sạn khi nhận phòng)    <br>\r\nTrẻ em: (6 đến dưới 11 tuổi) 50% phí ăn sáng người lớn - Bao gồm ăn sáng, không có giường phụ    <br>\r\nPhụ thu giường phụ: 1.100.000VNĐ/đêm -  Bao gồm ăn sáng + giường phụ </p>', '2017-06-07 08:59:21', '2017-06-07 08:59:21'),
(7, 'Phú Quốc - Khách sạn tương đương 2 sao - Bãi Sao - Thiền Viện Trúc Lâm Hộ Quốc', 'phu-quoc-khach-san-tuong-duong-2-sao-bai-sao-thien-vien-truc-lam-ho-quoc', 1, 2, 18, 0, 1, 30, '2017-06-15', '2017-06-17', 3, 3590000, '<h4>Ngày 1 : TP. HỒ CHÍ MINH - PHÚ QUỐC (Số bữa ăn: 1 bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170210042817_335600.jpg\"><br><br>\r\nQuý khách tập trung tại Sân bay Tân Sơn Nhất, cột số 04 ga đi Trong Nước. Hướng dẫn viên làm thủ tục cho Quý khách đáp chuyến bay đi Phú Quốc. Xe đón đoàn tại sân bay đưa Quý khách khởi hành viếng Chùa Sư Muôn (Hùng Long Tự) - Để cầu nguyện sự an lành và hạnh phúc đến với gia đình. Sau đó đoàn khởi hành đi xuyên rừng nguyên sinh khám phá Suối Tranh - Bắt đầu từ dãy Hàm Ninh xanh thẳm, từ trong khe núi nhiều dòng suối nhỏ len lỏi chảy qua rừng cây, khe đá để cùng hoà mình vào dòng chính tạo nên dòng Suối Tranh hiền hoà. Tiếp tục, đoàn tham quan Làng Chài Hàm Ninh, Vườn Tiêu, Nhà Thùng làm nước mắm, Cơ Sở nuôi cấy Ngọc Trai. Quý khách ghé thăm Dinh Cậu - Biểu tượng văn hoá và tín ngưỡng của đảo Phú Quốc, là nơi cầu may mắn, cầu an lành và là nơi ngư dân địa phương gởi gắm niềm tin cho một chuyến ra khơi đánh bắt đầy ắp cá khi trở về. Sau đó nhận phòng khách sạn, Quý khách tự do nghỉ ngơi và tắm biển. Buổi tối, Quý khách tự do dạo phố biển hoặc thưởng thức hải sản tại chợ Đêm Phú Quốc (chi phí tự túc). Nghỉ đêm tại Phú Quốc.</p>\r\n\r\n<h4><br>\r\nNgày 2 : THIỀN VIỆN HỘ QUỐC - BÃI SAO (Số bữa ăn: 2 bữa (bữa chiều tự túc))</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170210042928_066722.png\"><br>\r\nXe đưa Quý khách đi tham quan Nam Đảo, Quý khách đến viếng Thiền Viện Trúc Lâm Hộ Quốc - ngôi chùa đẹp và lớn nhất đảo ngọc, với nhiều công trình như: Đại hùng bảo điện, lầu chuông, lầu trống, nhà Tổ với vật liệu bằng gỗ lim đưa về từ Nam Phi và đá nguyên thủy có giá trị sử dụng từ 700 - 1.000 năm… Với khung cảnh hoang sơ, yên tĩnh, tạo nên một khung cảnh thiên nhiên đặc sắc đầy vẻ tôn nghiêm và thanh tịnh. Tiếp đến đoàn vào Bãi Sao - một bãi biển dịu êm, bãi cát dài tĩnh lặng và nguyên sơ nơi đảo xanh. Tại đây Quý khách sẽ thật sự cảm thấy yên bình, thư thái và dường như cuộc sống chậm lại khi hòa mình cùng thiên nhiên. Ăn trưa, về lại Resort tự do nghỉ ngơi.<br><br>\r\nBuổi chiều, Quý khách tự do tham quan Khu vui chơi giải trí Vinpearl Land (chi phí tự túc) rộng lớn với đầy đủ những trò chơi dành cho mọi lứa tuổi và sở thích. Nơi đây hội đủ tất cả các trò chơi trong nhà, ngoài trời như: đĩa bay, đu quay con ong, cốc xoay, đĩa quay siêu tốc, cối xay gió,… Khu công viên nước với các trò chơi hấp dẫn như: boomerang khổng lồ, đường trượt siêu lòng chảo, dòng sông lười, lâu đài, bể tạo sóng… Tiếp tục Quý khách có thể khám phá Khu Thủy Cung với hàng trăm loài cá và sinh vật biển kỳ thú như: cá Hải tượng, cá Sấu hỏa tiễn với chiếc mõm dài và hung dữ hay những loài quý hiếm như cá Nemo, cá Napoleon, cá Mập trắng, cua King Crab…. Hơn nữa, ở đây  còn có Rạp chiếu phim 5D, Sân khấu nhạc nước. Hay trải nghiệm tại Vườn Thú Hoang Dã đầu tiên tại Việt Nam (chi phí tự túc) - Quý khách có thể tham quan khám phá Vinpearl Safari Phú Quốc với quy mô 180ha, hơn 130 loài động vật quý hiếm và các chương trình Biểu diễn động vật, Chụp ảnh với động vật, Khám phá và trải nghiệm Vườn thú mở trong rừng tự nhiên, gần gũi và thân thiện với con người. Quý khách tự túc ăn tối. Nghỉ đêm tại khách sạn.</p>\r\n\r\n<h4><br>\r\nNgày 3 : PHÚ QUỐC - TP. HỒ CHÍ MINH (Số bữa ăn: 1 bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160816_flight-tracker.jpg\"><br>\r\nSau khi ăn sáng. Tự do tắm biển nghỉ ngơi tại resort. Đến giờ trả phòng khách sạn.  Sau đó, xe đưa Quý khách ra sân bay Phú Quốc đáp chuyến bay trở về Tp.HCM. Chia tay Quý khách và kết thúc chương trình du lịch tại sân bay Tân Sơn Nhất.</p>', '2017-06-07 09:04:28', '2017-06-07 09:04:28'),
(8, 'Côn Đảo - Thiên Đường Của Biển (Siêu tiết kiệm)', 'con-dao-thien-duong-cua-bien-sieu-tiet-kiem', 1, 2, 19, 0, 1, 30, '2017-06-17', '2017-06-19', 3, 6790000, '<h4>Ngày 1 : TP. HỒ CHÍ MINH - CÔN ĐẢO (Ăn trưa, tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_140908_Mi%E1%BA%BFu-B%C3%A0-Phi-Y%E1%BA%BFn-C%C3%B4n-%C4%90%E1%BA%A3o%281%29.jpg\"><br><br>\r\nQuý khách tập trung tại sân bay Tân Sơn Nhất, quầy Vietravel, cột số 10, ga đi Trong Nước. Hướng dẫn viên làm thủ tục cho Quý khách đáp chuyến bay đi Côn Đảo. Xe đón đoàn tại sân bay Cỏ Ống đưa về khách sạn gửi hành lý. Quý khách tham quan Trại tù Phú Hải, Chuồng cọp Pháp - Mỹ, viếng Nghĩa trang Hàng Dương - Thắp hương tại đài tưởng niệm chung cho gần 2000 ngôi mộ của các chiến sỹ yêu nước, Miếu Bà Phi Yến - Thứ phi vua Nguyễn Ánh, sau đó ghé thăm Chùa Vân Sơn - Ngôi chùa đầu tiên và duy nhất trên Côn Đảo. Trở về resort tự do tắm biển nghỉ ngơi. Nghỉ đêm tại Côn Đảo.</p>\r\n\r\n<h4><br>\r\nNgày 2 : KHÁM PHÁ CÔN ĐẢO - “THIÊN ĐƯỜNG CỦA BIỂN” (Ăn ba bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_140908_Mui%20ca%20map%20-%20Con%20Dao%281%29.jpg\"><br>\r\nXe đưa Quý khách tham quan Biển Đầm Trầu - Một trong những bãi biển hoang sơ và đẹp nhất tại Côn Đảo với cát mịn, biển trong xanh. Từ đường chính, Quý khách đi bộ theo đường mòn vào bãi tắm khoảng 1,5 km. Trên đường đi, Quý khách dừng chân thắp nhang viếng Miếu Cậu - Nơi thờ Hoàng tử Cải con vua Nguyễn Ánh và thứ phi Phi Yến. Đến bãi tắm, Quý khách tự do nghỉ ngơi, thư giãn, tắm biển. Buổi chiều, Quý khách tham quan Cảng Bến Đầm là cảng lớn nhất tại Côn Đảo. Trên đường đi, Quý khách sẽ được giới thiệu về các địa danh: Mũi Cá Mập - Có hình tượng giống Hàm Cá Mập, Đỉnh Tình Yêu - Là chóp núi có hình tượng của đôi trai gái đang tâm tình mà thiên nhiên đã ban tặng cho Côn Đảo. Tiếp tục, Quý khách tham quan Bãi Nhát - Một bãi tắm bị tác động của thủy triều, khi nước xuống sẽ lộ thiên một bãi tắm với cát trắng mịn. Buổi tối, Quý khách tự do nghỉ ngơi, tản bộ ngắm Cầu tàu 914 và khám phá Côn Đảo về đêm. Nghỉ đêm tại Côn Đảo.</p>\r\n\r\n<h4><br>\r\nNgày 3 : CÔN ĐẢO - TP. HỒ CHÍ MINH (Ăn sáng)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_140908_Bien%20Dam%20Trau%20-%20Con%20Dao%281%29.jpg\"><br>\r\nĂn sáng, Quý khách tự do nghỉ ngơi thư giãn và tắm biển. Xe đưa Quý khách đi Chợ Côn Đảo. Trả phòng khách sạn. Xe đưa Quý khách ra sân bay Cỏ Ống đón chuyến bay trở về Tp.HCM. Về đến Tp.HCM, chia tay Quý khách và kết thúc chương trình du lịch tại sân bay Tân Sơn Nhất.</p>', '2017-06-07 09:09:42', '2017-06-07 09:09:42'),
(9, 'Seoul - Everland - Nami (Giá sốc)', 'seoul-everland-nami-gia-soc', 1, 2, 5, 1, 1, 40, '2017-06-20', '2017-06-23', 4, 12990000, '<h4>Ngày 1 : TP. HỐ CHÍ MINH - SEOUL - EVERLAND (Ăn trưa, tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170424032911_073145.jpg\"><br><br>\r\n   Đêm trước ngày 01, Xe và hướng dẫn viên của Vietravel đón Quý khách tại sân bay Tân Sơn Nhất đáp chuyến bay đến Seoul – Thủ đô của Hàn Quốc. (Quý khách nghỉ đêm trên máy bay)<br>\r\n <br>\r\n   Đến Hàn Quốc. Sau đó khởi hành tham quan thành phố Seoul bao gồm: Cung điện Hoàng Gia Gyeongbok - Đây là nơi ở chính của Hoàng gia trong suốt vương triều Chosun (1392-1910). Cung điện này có 7225 phòng với thiết triều nguy nga, những sảnh đường tao nhã. Điện Gyeongbok được coi là công trình nghệ thuật nổi tiếng có phong cách và kiến trúc độc đáo và đẹp nhất Seoul. Tham quan Bảo tàng văn hoá truyền thống quốc gia - là bảo tàng hàng đầu trưng bày văn hóa dân gian Hàn Quốc, thu hút 3 triệu lượt khách tham quan hằng năm. Bảo tàng có hơn 98,000 hiện vật thể hiện đầy đủ và chi tiết những sự kiện, lễ hội chính của đất nước, đặc biệt là những giá trị văn hóa phi vật thể truyền thống cũng như cuộc sống sinh hoạt thường nhật của người dân Hàn Quốc. Dừng chân chụp hình bên ngoài “Nhà Xanh” (hay còn gọi là Cheongwadae) - là nơi ở và làm việc của Tổng thống Hàn Quốc. Ăn trưa tại nhà hàng địa phương. Buổi chiều, Quý khách tự do tham quan và vui chơi tại Công Viên Everland với 5 khu chủ đề bao gồm “Chợ toàn cầu”, “Khu phiêu lưu mạo hiểm phong cách Mỹ”, “Vùng đất huyền thoại”, “Khu phiêu lưu mạo hiểm phong cách châu Âu” và “Vườn bách thú” sẽ đưa du khách khám phá lịch sử, văn hóa và lễ hội khắp năm châu. Từ sáng tới tối, có rất nhiều chương trình biểu diễn tại các sân khấu trong khắp công viên. Nếu bạn tới vào cuối tuần, sẽ gặp những buổi diễu hành mang dánh dấp Carnavan vô cùng sôi động. Một địa điểm khiến Everland nổi tiếng trên toàn thế giới là Vườn hoa 4 mùa được bài trí theo phong cách Pháp. Quanh năm vườn hoa rực rỡ với hàng ngàn loài hoa khác nhau. Ăn tối tại nhà hàng địa phương. Trở về khách sạn và tự do nghỉ ngơi.</p>\r\n\r\n<h4><br>\r\nNgày 2 : SEOUL - ĐẢO NAMI (Ăn ba bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170424033025_693107.jpg\"><br>\r\nĂn sáng tại khách sạn. Xe đưa Quý khách đi tham quan Đảo Nami - nằm cách thủ đô Seoul 63 km, Đảo Nami xinh đẹp và bình yên bởi hệ thực vật với  hơn 200 loại cây khác nhau. Nổi tiếng nhất là những tán lá phong cùng hàng ngân hạnh thẳng tắp đã từng xuất hiện trong bộ phim “Bản tình ca mùa đông”. Sau buổi ăn trưa, Quý khách tự do mua sắm tại cửa hàng nhân sâm, cửa hàng mỹ phẩm, dạo khu phố thời trang Shinchon, tham quan Tháp N hay còn gọi là Namsan N Tower - từ lâu đã trở thành địa điểm nổi tiếng với các cặp tình nhân. Họ thường đến đây mua ổ khóa đôi và gắn chúng vào nhau để cầu mong cho tình yêu sẽ mãi mãi bền chặt (không bao gồm vé lên tháp). Xe đưa Quý khách ăn tối tại nhà hàng địa phương và về khách sạn nghỉ ngơi. </p>\r\n\r\n<h4><br>\r\nNgày 3 : SEOUL (Ăn ba bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170424033722_871342.jpg\"><br>\r\nĂn sáng tại khách sạn. Xe đưa Quý khách tham quan quảng trường Gwanghwamun – được xem là quảng trường đẹp nhất của thủ đô Seoul và dòng suối nhân tạo Cheonggyecheon giữa lòng Seoul. Mua sắm tại cửa hàng Tinh dầu Thông Đỏ, cửa hàng InSeoul Herb, Cửa hàng miễn thuế, Ghé thăm Khu chợ Dongdaemun nổi tiếng với những gian hàng thời trang. Quý khách sẽ được trải nghiệm về văn hoá ẩm thực và truyền thống bằng lớp học làm Kim Chi - món ăn đặc trưng và tiêu biểu của “Xứ sở Kim Chi” và được mặc những bộ đồ Hanbok truyền thống Hàn Quốc. Thưởng thức Chương trình biểu diễn nghệ thuật đặc sắc Nanta show. Sau đó Quý khách đi dùng bữa tối. Nhận phòng khách sạn nghỉ ngơi. Tự do khám phá Seoul về đêm.</p>\r\n\r\n<h4><br>\r\nNgày 4 : SEOUL - TP. HỒ CHÍ MINH (Ăn sáng)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_170424033811_518421.jpg\"><br>\r\nĂn sáng tại khách sạn và trả phòng.Tự do đến giờ khởi hành ra sân bay đáp chuyến bay về Việt Nam, trên đường mua sắm tại khu Chengha. Về đến sân bay Tân Sơn Nhất, Hướng dẫn viên Vietravel chia tay Quý khách và hẹn gặp tại các chương trình sau. Kết thúc chuyến tham quan.</p>', '2017-06-07 09:15:16', '2017-06-07 09:15:16'),
(10, 'Bangkok-Pattaya - Khách sạn 4* & 3* Tặng vé xem Nanta show', 'bangkok-pattaya-khach-san-4-3-tang-ve-xem-nanta-show', 1, 2, 13, 1, 1, 35, '2017-06-15', '2017-06-19', 5, 9490000, '<h4>Ngày 1 : TP. HỒ CHÍ MINH - BANGKOK: (Ăn trưa, ăn tối)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_140909_nanta%20show-re.jpg\"><br>\r\nHướng dẫn viên của Vietravel đón Quý khách tại sân bay đáp chuyến bay đi Bangkok. Ăn nhẹ trên máy bay. Tại sân bay Suvarnabhumi (đối với bay hàng không Viet Jet Air, Jet Star, Vietnam Airlines, Thai Airways), sân bay Don Muang (đối với bay hàng không Nok Air, Air Asia), xe và hướng dẫn viên địa phương đón và đưa Quý khách về nhận phòng tại khách sạn 4 sao. Sau khi dùng bữa tối, Quý khách sẽ thưởng thức chương trình biểu diễn nghệ thuật Nanta Show – Trong vỡ diễn, các diễn viên trẻ sử dụng các dụng cụ nấu bếp kết hợp với cốt truyện sinh động để giới thiệu sự khéo léo của các nghệ sĩ, cũng như các món ăn tiêu biểu của Hàn Quốc. Sau buổi diễn, Quý khách trở về khách sạn nghỉ ngơi.<br><br>\r\nChương trình Nanta show được trình diễn vào các tối thứ 3 – chủ nhật. Riêng tối thứ hai đầu tháng sẽ không trình diễn, chương trình sẽ được thay thế bằng một điểm tham quan khác.</p>\r\n\r\n<h4><br>\r\nNgày 2 : BANGKOK - PATTAYA: (Ăn ba bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_161109030134_504308.jpg\"><br>\r\nĂn sáng tại khách sạn. Quý khách tham quan Cung Điện Ananta Samakhom - cung điện bằng cẩm thạch được vua Rama V xây dựng theo kiến trúc Italy thời Phục Hưng để làm nơi đón tiếp các quan khách nước ngoài và tổ chức các hội nghị của hội đồng cố vấn Hoàng gia về các vấn đề phát triển đất nước. Bên trong là những tuyệt tác về chạm khắc gỗ, tạo tác vàng bạc đá quý, tranh thêu vô cùng tỉ mỉ, công phu từ những đôi tay lành nghề của các nghệ nhân tạo nên những tác phẩm tuyệt vời cho Hoàng Gia Thái Lan sẽ làm Quý khách trầm trồ thán phục. Sau bữa trưa, Quý khách khởi hành đến Pattaya - thành phố du lịch nổi tiếng của Thái Lan, trên đường Quý khách dừng chân tham quan Trung tâm Yến Huyết để tìm hiểu về quá trình sản xuất ra tổ yến, cũng như các chủng loại yến có mặt tại Thái Lan. Tham quan Bảo Tàng Tranh 3D - Hàng trăm không gian 3D kỳ ảo từ thời nguyên thủy tới hiện đại cuốn hút du khách, được xem là bảo tàng 3D đầu tiên và lớn nhất ở Thái Lan với diện tích hơn 5.800 m2 cùng hơn 200 hình họa, với nhiều chủ đề, nội dung. Ăn tối, Quý khách về nhận phòng và nghỉ ngơi tại khách sạn 3 sao.<br><br>\r\nLưu ý: Tham quan cung điện, du khách nữ phải mặc váy dài quá đầu gối, nếu mặc quần hoặc váy ngắn, du khách nữ phải mua xà rông (bán tại đây với giá khoảng 50 baht/cái) - váy truyền thống của các cô gái Thái để thể hiện lòng tôn kính với hoàng tộc. Tất cả điện thoại, máy quay phim, chụp hình đều phải gửi lại tại khu vực giữ đồ trước khi vào trong tham quan cung điện.</p>\r\n\r\n<h4><br>\r\nNgày 3 : PATTAYA: (Ăn ba bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_20160811_Nong%20Nooch%203.jpg\"><br>\r\nĂn sáng tại khách sạn. Quý khách lên tàu cao tốc tham quan Đảo San Hô - Hòn đảo lớn nhất Pattaya với diện tích khoảng 4 km2 gồm các bãi biển sạch và đẹp, tại đây Quý khách có thể tự do tắm biển hoặc tham gia các hoạt động như lặn biển, lướt ván buồm, trượt ván, nhảy dù, bơi lội, snorkeling (chi phí tự túc). Ăn  trưa, Đoàn tiếp tục tham quan Trung tâm vàng bạc đá quý Hoàng Gia và Làng văn hóa Dân Tộc Nong Nooch với các chương trình biểu diễn văn hoá, đấu võ Thái và các trò biểu diễn đặc sắc của các chú voi. Sau bữa tối, Quý khách thưởng thức chương trình ca múa nhạc chương trình Tiffany’s độc đáo do các diễn viên nam đã giải phẫu thành nữ biểu diễn. Quý khách trở về khách sạn nghỉ ngơi.</p>\r\n\r\n<h4><br>\r\nNgày 4 : PATTAYA - BANGKOK: (Ăn ba bữa)</h4>\r\n\r\n<p><img alt=\"\" src=\"/upload/images/tfd_141217_Golden%20Pagoda%201.jpg\"><br>\r\nĂn sáng tại khách sạn. Đoàn khởi hành về Bangkok, trên đường đi Quý khách tham quan Trại Rắn xem màn trình diễn với các loài rắn độc và cách lấy nọc rắn, tiếp tục tham quan Trung Tâm Thuộc Da. Sau đó, quý khách tham quan Safari World - Vườn thú thiên nhiên nổi tiếng của Thái Lan, tại đây Quý khách sẽ được xe đưa đi tham quan vườn thú tự nhiên Safari với nhiều loài thú quý hiếm. Quý khách dùng bữa trưa tại Safari World. Buổi chiều, Quý khách thưởng thức các chương trình biểu diễn của cá heo, điệp viên 007.... Buổi tối Quý khách sẽ thưởng thức Buffet tại Baiyoke Sky (tòa nhà 84 tầng), và ngắm toàn cảnh Bangkok về đêm.<br><br>\r\nNgày 5 : BANGKOK - TP.HỒ CHÍ MINH: (Ăn sáng)<br><br>\r\nSau khi ăn sáng tại khách sạn, Quý khách khởi hành đi tham quan Chùa Phật Vàng với tượng Phật ngồi bằng vàng lớn nhất thế giới cao 5 mét và nặng 5,5 tấn, được tin là đã 700 đến 800 tuổi. Quý khách tham quan cửa hàng Chocolate, Quý khách có thể lựa chọn những thanh Chocolate ngọt ngào về làm quà cho người thân hay bạn bè và tự do mua sắm tại các siêu thị lớn ở Bangkok cho đến giờ ra phi trường đáp chuyến bay về nước (tuy nhiên các điểm shopping chỉ áp dụng cho các chuyến bay về từ 15h25). Về đến sân bay Tân Sơn Nhất, kết thúc chuyến tham quan. Trưởng đoàn chia tay và tạm biệt Quý khách.</p>', '2017-06-07 09:22:52', '2017-06-07 09:22:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_code` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `email`, `password`, `address`, `phone`, `p_code`, `gender`, `birthday`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Master', 'User', 'user@example.com', '$2y$10$tLoDwAMvH/DP6OrgpT3InumWcGi7Xb0RNgwCN7PV5WoMVjxLKaSje', 'HCM', '0901234567', '1234567890', 0, '1994-08-12', 'Admin', 'Hxj0VYp1l9c2YkV3NYTPmcQLWP4GzWtFYrSPg1ExEFlZ1gjKefcd6p9WHrMl', NULL, '2017-06-07 05:18:08'),
(2, 'Master', 'Admin', 'admin@example.com', '$2y$10$ZFTUNRAhL/R1zqLrpZLakeiA37k6oT8yWa8EpikWFeoeBHidZOQES', 'HCM', '090812345678', '123456789', 0, '1994-08-12', 'admin', 'XnAK788UvFNQpggqkilR6wWXyMJcRiqivFnF17gwBIGAyKTdkOLkzu3mQeec', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduce` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `introduce`, `created_at`, `updated_at`) VALUES
(1, 'VietJet Air', 'Hãng hàng không VietJet Air', NULL, NULL),
(2, 'Xe khách Phương Trang', 'Mang một phong cách nổi bật và hiện đại, màu cam của xe Phương Trang (còn gọi là Futa Phương Trang) đã ghi lại dấu ấn tốt đẹp trong lòng hành khách trong suốt 11 năm hình thành và phát triển. Xe giường nằm cao cấp Phương Trang hoạt động từ Huế và Đà Nẵng đổ vào đến hầu hết các tỉnh miền Tây nhằm phục vụ tối đa nhu cầu đi lại của hành khách. Sự phục vụ lịch thiệp và chu đáo của đội ngũ nhân viên đã giúp xe khách Phương Trang trở thành một địa chỉ tin cậy nhất của đông đảo khách hàng trong và ngoài nước. Phương Trang – Chất lượng là danh dự', '2017-06-06 08:53:03', '2017-06-06 08:54:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_location_id_foreign` (`location_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_slug_unique` (`slug`),
  ADD KEY `locations_region_id_foreign` (`region_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tours_slug_unique` (`slug`),
  ADD KEY `tours_hotel_id_foreign` (`hotel_id`),
  ADD KEY `tours_depart_location_id_foreign` (`depart_location_id`),
  ADD KEY `tours_dest_location_id_foreign` (`dest_location_id`),
  ADD KEY `tours_vehicle_id_foreign` (`vehicle_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_p_code_unique` (`p_code`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `locations`
--
ALTER TABLE `locations`
  ADD CONSTRAINT `locations_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_depart_location_id_foreign` FOREIGN KEY (`depart_location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `tours_dest_location_id_foreign` FOREIGN KEY (`dest_location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `tours_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`),
  ADD CONSTRAINT `tours_vehicle_id_foreign` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
