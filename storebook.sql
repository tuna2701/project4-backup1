-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: storebook
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `account` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email_verify` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `account`
--

LOCK TABLES `account` WRITE;
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
INSERT INTO `account` VALUES (1,'storebook@gmail.com','storebook','2021-12-31 17:00:00','2021-12-31 17:00:00',NULL),(2,'nvlam@gmail.com','nvlam123','2021-12-31 17:00:00','2021-12-31 17:00:00',NULL);
/*!40000 ALTER TABLE `account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(10) NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `translator` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit_price` float DEFAULT NULL,
  `disc_price` float DEFAULT NULL,
  `qty` int(10) DEFAULT NULL,
  `publisher` int(10) DEFAULT NULL,
  `page` int(10) DEFAULT NULL,
  `edition` int(4) DEFAULT NULL,
  `format` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `new_flag` int(1) DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,'El Deafo – Đôi tai kỳ diệu',4,'Cece Bell','Đào Thiện Phong','“Cuốn sách của Bell phải là nguồn cảm hứng cho những người “khác biệt” và nó sẽ giúp những người khác hiểu thế nào là sự khác biệt” – New York Times',209000,209000,10,1,200,2022,NULL,NULL,NULL,'Bia-El-Deafo-va-doi-tai-ky-dieu-Bia-1.jpg','2022-04-25 07:05:43','2022-06-01 06:17:30'),(2,'Mọi đứa trẻ đều có thể cư xử đúng cách',1,'Sheryl Eberly, Caroline Eberly','Phạm Minh Hiển','[ThaiHaBooks] Maria Montessori từng nói: “Tất cả những tương tác của ta với trẻ nhỏ rồi sẽ kết trái, không chỉ trong hiện tại, mà còn trong con người trưởng thành của đứa trẻ về sau”. Quả thực, việc dạy cho trẻ biết cư xử đúng cách ngay từ khi còn nhỏ sẽ góp phần tạo nên một người trưởng thành thanh lịch và tinh tế.\r\n\r\nMọi đứa trẻ đều có thể cư xử đúng cách là hành trình hướng dẫn trẻ biết cư xử đúng đắn trong từng tình huống cụ thể. Từ cách ăn mặc cơ bản, cách vệ sinh cá nhân, cách cư xử trên bàn ăn trong cuộc sống hằng ngày đến lối ứng xử phù hợp trong những dịp đặc biệt như tiệc sinh nhật, tiệc cưới. Từ việc viết thư cám ơn đến cách sử dụng các thiết bị công nghệ một cách lịch sự,… Những hướng dẫn trong cuốn sách này được tác giả mô tả tỉ mỉ và dễ hiểu, có thể thực hành được ngay trong cuộc sống hằng ngày. Và tin rằng, cuốn sách sẽ thay đổi cuộc sống của bạn và con mình theo nhiều cách rất tích cực.\r\n\r\nMục lục:\r\n\r\nLời tựa\r\n\r\nGiới thiệu\r\n\r\nKhởi đầu tốt đẹp\r\n\r\nVệ sinh cá nhân và cách ăn vận cơ bản\r\n\r\nDành riêng cho các chàng trai\r\n\r\nDành riêng cho các cô gái\r\n\r\nThời gian dành cho gia đình\r\n\r\nThiết lập mối quan hệ tốt với những đứa trẻ khác\r\n\r\nGiới thiệu\r\n\r\nNói chuyện điện thoại\r\n\r\nĐiện thoại di động\r\n\r\nBàn thêm về công nghệ kỹ thuật số\r\n\r\nFacebook, MySpace, Twitter, ôi trời ơi!\r\n\r\nAn toàn khi sử dụng mạng internet\r\n\r\nLời nói – Nết người\r\n\r\nTrao đổi/Trò chuyện trên giấy: Thư từ, thư cảm ơn và email\r\n\r\nKhi trẻ tham gia một kỳ nghỉ\r\n\r\nQuy tắc ứng xử ngoài trời\r\n\r\nỞ những nơi công cộng trong thành phố\r\n\r\nCư xử lịch thiệp tại bàn ăn – chuyện dễ như “ăn kẹo”\r\n\r\nNhững tình huống “dở khóc dở cười” với đồ ăn\r\n\r\nGửi lời mời và nhận lời mời\r\n\r\nTiệc sinh nhật, tiệc cưới, tiệc chiêu đãi và những dịp đặc biệt khác\r\n\r\nHãy là một vị khách (và một vị chủ nhà) tuyệt vời\r\n\r\nĐể trở thành một công dân gương mẫu\r\n\r\nSống xanh\r\n\r\nMột vận động viên chân chính\r\n\r\nBày tỏ lòng quan tâm tới những người có nhu cầu đặc biệt\r\n\r\nNhững món quà – cách trao và nhận\r\n\r\nLời kết\r\n\r\nLời cảm ơn\r\n\r\nĐôi lời về hai tác giả\r\n\r\nThông tin về tác giả:\r\n\r\nSHERYL EBERLY là một diễn giả, một cây viết, một nhà tư vấn lãnh đạo và huấn luyện viên. Thông qua những vai trò ấy, bà giúp mọi người phát triển các mối quan hệ cả trong công việc lẫn trong cuộc sống một cách hiệu quả dựa trên hai nguyên tắc: tôn trọng và lấy người khác làm trung tâm. Hiện bà sống cùng chồng tại Lancaster, bang Pennsylvania và Thủ đô Washington. Các con của họ là Preston, Caroline và Margaret đều đã trưởng thành.\r\n\r\nCAROLINE EBERLY, con gái của Sheryl, tốt nghiệp bằng cử nhân tiếng Anh tại Đại học Virginia. Cô hiện đang sống ở Denver, bang Colorado. Cô hiện là biên tập viên cao cấp của tờ Colorado Homes and Lifestyes đồng thời là chủ bút của tờ Mountain Living. Cô thích tham gia các hoạt động ngoài trời, tập yoga, thích ngủ nướng vào buổi sáng và ăn bánh cupcake 5.\r\n\r\nCông ty Cổ phần Sách Thái Hà trân trọng giới thiệu!',198000,198000,10,4,512,2022,'15.5x23cm',NULL,0,'Bia-Moi-dua-tre-deu-co-the-cu-xu-dung-cach-bia-1.jpg','2022-04-29 07:05:43','2022-05-03 23:44:09'),(11,'Đánh thức khả năng tập trung của trẻ',2,'Myung-kyung Lee','Dương Quỳnh Thu','Tất cả phụ huynh trên thế giới đều mong muốn con mình có năng lực, tìm được những cơ hội tốt và có được cuộc sống hạnh phúc hơn bản thân cha mẹ. Bởi vậy, các bậc phụ huynh luôn nỗ lực đầu tư từ công sức, tiền bạc và thời gian cho con trẻ. Tuy nhiên, cũng có rất nhiều bậc phụ huynh cảm thấy hoang mang không biết trẻ có đang đi theo đúng hướng mà mình mong đợi hay không. Không ít các bậc phụ huynh lo lắng khi con mình quá hiếu động, luôn chạy nhảy huyên náo và không thể tập trung hay kiên trì hoàn thành một việc gì đó nhất định.',139000,139000,10,1,276,2022,'15x23cm',NULL,NULL,'Bia_Danh-thuc-kha-nang-tap-trung-cua-tre_Bia-1.jpg','2022-04-25 07:05:43','2022-05-03 18:49:13'),(12,'Điều hành nhà hàng for Dummies',3,'Michael Garvey, Andrew G. Dismore và Heather Dismore','Khánh Trang','Nếu bạn là một chủ nhà hàng đầy tham vọng, Điều hành nhà hàng for dummies bao hàm mọi khía cạnh của quá trình bắt đầu, từ lập kế hoạch kinh doanh đến thiết kế thực đơn và phòng ăn. Hãy lựa chọn địa điểm phù hợp, tìm kiếm nguồn tài chính cho doanh nghiệp mới của bạn, xin giấy phép, đồng thời bảo vệ chính mình một cách hợp pháp. Học cách giữ chân thực khách quay lại, xử lý thành công các tình huống phục vụ khách hàng và hơn thế nữa. Cuốn sách này sẽ giúp bạn thành công lâu dài trong ngành nhà hàng.',289000,289000,10,1,612,2022,'18.7x23.5cm',NULL,NULL,'Bia_Dieu-hanh-nha-hang-for-dummies_bia-1.jpg','2022-04-25 07:05:43','2022-05-03 18:49:13'),(13,'Bộ sách Trẻ là thiên tài theo một cách riêng',4,'Thái Hà','','Những em bé thiên tài đều rất sáng tạo, mạnh mẽ và sâu sắc. Đôi khi, các em ấy có cách học rất khác. Chẳng có gì là xấu khi khác biệt cả. Chỉ cần nắm lấy sự khác biệt rồi tiến bộ từ chính sự khác biệt ấy là chúng mình đã làm cho thế giới trở nên tốt đẹp hơn biết bao!',294000,294000,10,4,36,2022,'20x20cm',NULL,0,'Bo-Tre-la-thien-tai-theo-mot-cach-rieng-600x744.jpg','2022-04-29 07:05:43','2022-05-03 23:44:09'),(15,'Việt Nam dọc miền du ký tập 1',7,'Lê Rin',NULL,'Ở độ tuổi nào cũng vậy, ta đi để biết đôi chân mình chưa già, để thấy lòng reo vang cùng những thanh âm bất tận của thiên nhiên bí ẩn nhiệm màu, để trái tim và những tế bào cảm xúc được rung động theo vũ khúc nhịp nhàng của người dân bản xứ hay hương vị hấp dẫn của những món ăn mang đậm bản sắc mỗi vùng miền, để lồng ngực rạo rực những yêu thương tự hào, những bồi hồi xốn xang, và để khi trở về, ta góp vào gia tài của ta một hành trang đáng giá – hành trang giục giã ta ngày mai lại bước tiếp lên đường…',219000,175200,10,1,165,2022,NULL,NULL,NULL,'Viet-Nam-doc-mien-du-ky-ban-mem-bia-1-1-600x793.jpg','2022-04-25 07:05:43','2022-05-28 02:08:18'),(16,'“Lời nguyền” gái miền Tây',2,'Ngô Tú Ngân',NULL,'“Lời nguyền gái miền Tây” là chuỗi những câu chuyện về thân phận người phụ nữ ở mảnh đất Đèn Dầu. Họ không được chọn nơi mình sinh ra và cũng chẳng thể quyết định bản thân sẽ sống như thế nào, nhiều lần cứ tưởng đã “khổ tận cam lai” thì ai ngờ đời người lại biến đổi biển dâu. Những phận đời ngỡ đã dừng lại sự cơ cực thì bỗng rơi vào một cái “khuôn” như một “lời nguyền” gì đó cứ thường hằng không đổi. Số phận buồn tại mảnh đất Đèn Dầu vẫn hằng ngày lặp lại dù bằng những cách khác nhau nhưng kết quả dường như chỉ có một, thậm chí ở thế hệ mới, sự đau khổ có khi còn nhiều hơn trước gấp vạn lần. Điển hình chính là cuộc đời Thắm, người phụ nữ duy nhất tìm được cái chữ, nhưng cuối cùng vẫn không thể thoát khỏi “lời nguyền” sau sự ra đi của bà ngoại.\n\nLiệu rồi Thắm có “sống” lại theo đúng sự mong đợi của bản thân và bà ngoại nó ngày trước? Hay nó cũng giống như những thân phận phụ nữ khác bị “dìm chết” không chỉ bởi sự khốn khổ cùng kiệt ở cái xứ miền Tây nghèo khó mà còn từ cách con người đối đãi với nhau?',71000,56800,10,1,512,2022,'15.5x23cm',NULL,0,'Bia-1-Loi-nguyen-gai-mien-tay.jpg','2022-04-29 07:05:43','2022-05-28 09:26:56'),(17,'Đánh thức khả năng tập trung của trẻ',3,'Myung-kyung Lee','Dương Quỳnh Thu','Tất cả phụ huynh trên thế giới đều mong muốn con mình có năng lực, tìm được những cơ hội tốt và có được cuộc sống hạnh phúc hơn bản thân cha mẹ. Bởi vậy, các bậc phụ huynh luôn nỗ lực đầu tư từ công sức, tiền bạc và thời gian cho con trẻ. Tuy nhiên, cũng có rất nhiều bậc phụ huynh cảm thấy hoang mang không biết trẻ có đang đi theo đúng hướng mà mình mong đợi hay không. Không ít các bậc phụ huynh lo lắng khi con mình quá hiếu động, luôn chạy nhảy huyên náo và không thể tập trung hay kiên trì hoàn thành một việc gì đó nhất định.',139000,139000,10,1,276,2022,'15x23cm',NULL,NULL,'Bia_Danh-thuc-kha-nang-tap-trung-cua-tre_Bia-1.jpg','2022-04-25 07:05:43','2022-05-03 18:49:13'),(18,'Điều hành nhà hàng for Dummies',3,'Michael Garvey, Andrew G. Dismore và Heather Dismore','Khánh Trang','Nếu bạn là một chủ nhà hàng đầy tham vọng, Điều hành nhà hàng for dummies bao hàm mọi khía cạnh của quá trình bắt đầu, từ lập kế hoạch kinh doanh đến thiết kế thực đơn và phòng ăn. Hãy lựa chọn địa điểm phù hợp, tìm kiếm nguồn tài chính cho doanh nghiệp mới của bạn, xin giấy phép, đồng thời bảo vệ chính mình một cách hợp pháp. Học cách giữ chân thực khách quay lại, xử lý thành công các tình huống phục vụ khách hàng và hơn thế nữa. Cuốn sách này sẽ giúp bạn thành công lâu dài trong ngành nhà hàng.',289000,289000,10,1,612,2022,'18.7x23.5cm',NULL,NULL,'Bia_Dieu-hanh-nha-hang-for-dummies_bia-1.jpg','2022-04-25 07:05:43','2022-05-03 18:49:13'),(19,'Bộ sách Trẻ là thiên tài theo một cách riêng',1,'Thái Hà','','Những em bé thiên tài đều rất sáng tạo, mạnh mẽ và sâu sắc. Đôi khi, các em ấy có cách học rất khác. Chẳng có gì là xấu khi khác biệt cả. Chỉ cần nắm lấy sự khác biệt rồi tiến bộ từ chính sự khác biệt ấy là chúng mình đã làm cho thế giới trở nên tốt đẹp hơn biết bao!',294000,294000,10,4,36,2022,'20x20cm',NULL,0,'Bo-Tre-la-thien-tai-theo-mot-cach-rieng-600x744.jpg','2022-04-29 07:05:43','2022-05-03 23:44:09'),(20,'El Deafo – Đôi tai kỳ diệu',7,'Cece Bell','Đào Thiện Phong','“Cuốn sách của Bell phải là nguồn cảm hứng cho những người “khác biệt” và nó sẽ giúp những người khác hiểu thế nào là sự khác biệt” – New York Times',209000,209000,10,1,200,2022,NULL,NULL,NULL,'Bia-El-Deafo-va-doi-tai-ky-dieu-Bia-1.jpg','2022-04-25 07:05:43','2022-06-01 07:17:30'),(21,'Mọi đứa trẻ đều có thể cư xử đúng cách',1,'Sheryl Eberly, Caroline Eberly','Phạm Minh Hiển','[ThaiHaBooks] Maria Montessori từng nói: “Tất cả những tương tác của ta với trẻ nhỏ rồi sẽ kết trái, không chỉ trong hiện tại, mà còn trong con người trưởng thành của đứa trẻ về sau”. Quả thực, việc dạy cho trẻ biết cư xử đúng cách ngay từ khi còn nhỏ sẽ góp phần tạo nên một người trưởng thành thanh lịch và tinh tế.\r\n\r\nMọi đứa trẻ đều có thể cư xử đúng cách là hành trình hướng dẫn trẻ biết cư xử đúng đắn trong từng tình huống cụ thể. Từ cách ăn mặc cơ bản, cách vệ sinh cá nhân, cách cư xử trên bàn ăn trong cuộc sống hằng ngày đến lối ứng xử phù hợp trong những dịp đặc biệt như tiệc sinh nhật, tiệc cưới. Từ việc viết thư cám ơn đến cách sử dụng các thiết bị công nghệ một cách lịch sự,… Những hướng dẫn trong cuốn sách này được tác giả mô tả tỉ mỉ và dễ hiểu, có thể thực hành được ngay trong cuộc sống hằng ngày. Và tin rằng, cuốn sách sẽ thay đổi cuộc sống của bạn và con mình theo nhiều cách rất tích cực.\r\n\r\nMục lục:\r\n\r\nLời tựa\r\n\r\nGiới thiệu\r\n\r\nKhởi đầu tốt đẹp\r\n\r\nVệ sinh cá nhân và cách ăn vận cơ bản\r\n\r\nDành riêng cho các chàng trai\r\n\r\nDành riêng cho các cô gái\r\n\r\nThời gian dành cho gia đình\r\n\r\nThiết lập mối quan hệ tốt với những đứa trẻ khác\r\n\r\nGiới thiệu\r\n\r\nNói chuyện điện thoại\r\n\r\nĐiện thoại di động\r\n\r\nBàn thêm về công nghệ kỹ thuật số\r\n\r\nFacebook, MySpace, Twitter, ôi trời ơi!\r\n\r\nAn toàn khi sử dụng mạng internet\r\n\r\nLời nói – Nết người\r\n\r\nTrao đổi/Trò chuyện trên giấy: Thư từ, thư cảm ơn và email\r\n\r\nKhi trẻ tham gia một kỳ nghỉ\r\n\r\nQuy tắc ứng xử ngoài trời\r\n\r\nỞ những nơi công cộng trong thành phố\r\n\r\nCư xử lịch thiệp tại bàn ăn – chuyện dễ như “ăn kẹo”\r\n\r\nNhững tình huống “dở khóc dở cười” với đồ ăn\r\n\r\nGửi lời mời và nhận lời mời\r\n\r\nTiệc sinh nhật, tiệc cưới, tiệc chiêu đãi và những dịp đặc biệt khác\r\n\r\nHãy là một vị khách (và một vị chủ nhà) tuyệt vời\r\n\r\nĐể trở thành một công dân gương mẫu\r\n\r\nSống xanh\r\n\r\nMột vận động viên chân chính\r\n\r\nBày tỏ lòng quan tâm tới những người có nhu cầu đặc biệt\r\n\r\nNhững món quà – cách trao và nhận\r\n\r\nLời kết\r\n\r\nLời cảm ơn\r\n\r\nĐôi lời về hai tác giả\r\n\r\nThông tin về tác giả:\r\n\r\nSHERYL EBERLY là một diễn giả, một cây viết, một nhà tư vấn lãnh đạo và huấn luyện viên. Thông qua những vai trò ấy, bà giúp mọi người phát triển các mối quan hệ cả trong công việc lẫn trong cuộc sống một cách hiệu quả dựa trên hai nguyên tắc: tôn trọng và lấy người khác làm trung tâm. Hiện bà sống cùng chồng tại Lancaster, bang Pennsylvania và Thủ đô Washington. Các con của họ là Preston, Caroline và Margaret đều đã trưởng thành.\r\n\r\nCAROLINE EBERLY, con gái của Sheryl, tốt nghiệp bằng cử nhân tiếng Anh tại Đại học Virginia. Cô hiện đang sống ở Denver, bang Colorado. Cô hiện là biên tập viên cao cấp của tờ Colorado Homes and Lifestyes đồng thời là chủ bút của tờ Mountain Living. Cô thích tham gia các hoạt động ngoài trời, tập yoga, thích ngủ nướng vào buổi sáng và ăn bánh cupcake 5.\r\n\r\nCông ty Cổ phần Sách Thái Hà trân trọng giới thiệu!',198000,198000,10,4,512,2022,'15.5x23cm',NULL,0,'Bia-Moi-dua-tre-deu-co-the-cu-xu-dung-cach-bia-1.jpg','2022-04-29 07:05:43','2022-05-03 23:44:09'),(22,'El Deafo – Đôi tai kỳ diệu',3,'Cece Bell','Đào Thiện Phong','“Cuốn sách của Bell phải là nguồn cảm hứng cho những người “khác biệt” và nó sẽ giúp những người khác hiểu thế nào là sự khác biệt” – New York Times',209000,209000,10,1,200,2022,NULL,NULL,NULL,'Bia-El-Deafo-va-doi-tai-ky-dieu-Bia-1.jpg','2022-04-25 07:05:43','2022-05-03 18:49:13'),(23,'Mọi đứa trẻ đều có thể cư xử đúng cách',1,'Sheryl Eberly, Caroline Eberly','Phạm Minh Hiển','[ThaiHaBooks] Maria Montessori từng nói: “Tất cả những tương tác của ta với trẻ nhỏ rồi sẽ kết trái, không chỉ trong hiện tại, mà còn trong con người trưởng thành của đứa trẻ về sau”. Quả thực, việc dạy cho trẻ biết cư xử đúng cách ngay từ khi còn nhỏ sẽ góp phần tạo nên một người trưởng thành thanh lịch và tinh tế.\r\n\r\nMọi đứa trẻ đều có thể cư xử đúng cách là hành trình hướng dẫn trẻ biết cư xử đúng đắn trong từng tình huống cụ thể. Từ cách ăn mặc cơ bản, cách vệ sinh cá nhân, cách cư xử trên bàn ăn trong cuộc sống hằng ngày đến lối ứng xử phù hợp trong những dịp đặc biệt như tiệc sinh nhật, tiệc cưới. Từ việc viết thư cám ơn đến cách sử dụng các thiết bị công nghệ một cách lịch sự,… Những hướng dẫn trong cuốn sách này được tác giả mô tả tỉ mỉ và dễ hiểu, có thể thực hành được ngay trong cuộc sống hằng ngày. Và tin rằng, cuốn sách sẽ thay đổi cuộc sống của bạn và con mình theo nhiều cách rất tích cực.\r\n\r\nMục lục:\r\n\r\nLời tựa\r\n\r\nGiới thiệu\r\n\r\nKhởi đầu tốt đẹp\r\n\r\nVệ sinh cá nhân và cách ăn vận cơ bản\r\n\r\nDành riêng cho các chàng trai\r\n\r\nDành riêng cho các cô gái\r\n\r\nThời gian dành cho gia đình\r\n\r\nThiết lập mối quan hệ tốt với những đứa trẻ khác\r\n\r\nGiới thiệu\r\n\r\nNói chuyện điện thoại\r\n\r\nĐiện thoại di động\r\n\r\nBàn thêm về công nghệ kỹ thuật số\r\n\r\nFacebook, MySpace, Twitter, ôi trời ơi!\r\n\r\nAn toàn khi sử dụng mạng internet\r\n\r\nLời nói – Nết người\r\n\r\nTrao đổi/Trò chuyện trên giấy: Thư từ, thư cảm ơn và email\r\n\r\nKhi trẻ tham gia một kỳ nghỉ\r\n\r\nQuy tắc ứng xử ngoài trời\r\n\r\nỞ những nơi công cộng trong thành phố\r\n\r\nCư xử lịch thiệp tại bàn ăn – chuyện dễ như “ăn kẹo”\r\n\r\nNhững tình huống “dở khóc dở cười” với đồ ăn\r\n\r\nGửi lời mời và nhận lời mời\r\n\r\nTiệc sinh nhật, tiệc cưới, tiệc chiêu đãi và những dịp đặc biệt khác\r\n\r\nHãy là một vị khách (và một vị chủ nhà) tuyệt vời\r\n\r\nĐể trở thành một công dân gương mẫu\r\n\r\nSống xanh\r\n\r\nMột vận động viên chân chính\r\n\r\nBày tỏ lòng quan tâm tới những người có nhu cầu đặc biệt\r\n\r\nNhững món quà – cách trao và nhận\r\n\r\nLời kết\r\n\r\nLời cảm ơn\r\n\r\nĐôi lời về hai tác giả\r\n\r\nThông tin về tác giả:\r\n\r\nSHERYL EBERLY là một diễn giả, một cây viết, một nhà tư vấn lãnh đạo và huấn luyện viên. Thông qua những vai trò ấy, bà giúp mọi người phát triển các mối quan hệ cả trong công việc lẫn trong cuộc sống một cách hiệu quả dựa trên hai nguyên tắc: tôn trọng và lấy người khác làm trung tâm. Hiện bà sống cùng chồng tại Lancaster, bang Pennsylvania và Thủ đô Washington. Các con của họ là Preston, Caroline và Margaret đều đã trưởng thành.\r\n\r\nCAROLINE EBERLY, con gái của Sheryl, tốt nghiệp bằng cử nhân tiếng Anh tại Đại học Virginia. Cô hiện đang sống ở Denver, bang Colorado. Cô hiện là biên tập viên cao cấp của tờ Colorado Homes and Lifestyes đồng thời là chủ bút của tờ Mountain Living. Cô thích tham gia các hoạt động ngoài trời, tập yoga, thích ngủ nướng vào buổi sáng và ăn bánh cupcake 5.\r\n\r\nCông ty Cổ phần Sách Thái Hà trân trọng giới thiệu!',198000,198000,10,4,512,2022,'15.5x23cm',NULL,0,'Bia-Moi-dua-tre-deu-co-the-cu-xu-dung-cach-bia-1.jpg','2022-04-29 07:05:43','2022-05-03 23:44:09'),(24,'Hoa giữa trời',1,'Nguyên Sinh',NULL,'Hãy cho phép những giấc mơ xanh có một không gian nhỏ để tiếp tục tồn tại trong trái tim riêng tư, trước khi những tranh đua, so sánh, những được mất của cuộc sống hiện thực chôn vùi. Vì ít lắm nơi đó ta vẫn còn sót lại một đốm lửa nhỏ đốt lên sưởi ấm hồn mình khi đông về khắp chốn.\n\n“Hoa Giữa Trời” là những giai điệu yên nhẹ được cất lên về tình bạn, tình cảm xanh ấm. Nó là tiếng nói thủ thỉ, rù rì của giấc mơ, của đốm lửa còn sót lại trong tim ta.',79000,79000,10,1,NULL,NULL,NULL,NULL,NULL,'Bia-1-Hoa-giua-troi.jpg','2022-05-28 02:32:16','2022-05-28 02:32:16'),(26,'Gửi con trai bố',1,'Hiroshi Hatano','Vũ Thu Thuỷ','Gửi con trai bố là những lời muốn nói của một người cha bị ung thư muốn gửi gắm tới con mình, nhằm định hướng cho con những vấn đề mà con có thể sẽ gặp trong tương lai, nhưng nó cũng như thay lời các bậc cha mẹ khác, gửi đến con mình những lời khuyên vô cùng hữu ích.\n\n“Khi cảm nhận được sự thực là căn bệnh ung thư đã ngấm vào cơ thể mình, tôi nhận ra rằng “thứ mà tôi muốn để lại không phải là tiền”. Nếu mình dự định tích tiền thì có thể tích bao nhiêu cũng được và điều đó con trai tôi cũng có thể làm được bằng sức của chính con.\n\nVì vậy, tôi quyết định sẽ viết thư cho con trai mình.\n\nVà, tôi cảm nhận rằng điều mà tôi muốn để lại cho con trai đó là những lời nói.\n\nNhững thứ có thể giải quyết bằng tiền thì có tiền là xong, nhưng với những thứ không giải quyết bằng tiền được, tối muốn để lại những lời nói để chỉ hướng cho con giải quyết.\n\nĐó là những lời nói có ích cho chính con trai tôi.\n\nNhững điều giống như bản đồ, giống như compa trong quá trình trưởng thành của con.”',85000,85000,10,1,252,2022,'13x19cm',NULL,NULL,'Bia_Gui-con-trai-bo_bia-1.jpg','2022-05-28 17:54:26','2022-05-28 17:54:26'),(27,'Tận hưởng thời gian',2,'Catherine Blyth','Khánh Trang','Mỗi người trong chúng ta đều là một cỗ máy thời gian. Chúng ta có khả năng ghi nhớ quá khứ, nhận thức được khoảnh khắc hiện tại – ngay bây giờ! – và hướng suy nghĩ về tương lai. Điều này giúp chúng ta nhìn nhận cuộc sống như một cuộc hành trình.\n\nHãy tận hưởng thời gian. Bạn có thấy lời gợi ý này thật ngu ngốc không? Dĩ nhiên, nó thật phi lý. Nhìn chung, chúng ta coi thời gian là một loại hàng hóa (và thật đáng buồn, loại hàng hóa này không bao giờ có đủ), hoặc là một kẻ chuyên đi bắt nạt (thời gian đang tạo áp lực), hoặc một người tình thiếu chung thủy (đúng lúc bạn cần đến nhất thì nó chạy mất hút). Chúng ta kiếm thời gian, sử dụng thời gian, tiết kiệm thời gian, nhưng có khi nào thấy mình có dư dả chút thời gian, chúng ta lại tìm cách làm sao để giết thời gian.',129000,129000,10,11,NULL,2022,NULL,NULL,NULL,'Tan-huong-thoi-gian-bia-1-600x913.jpg','2022-05-28 17:59:14','2022-05-28 17:59:14');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `desc` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES (1,'Văn học','Thể loại văn học','2022-03-31 04:16:43','0000-00-00 00:00:00'),(2,'Sách mới',NULL,'2022-03-31 04:16:43','2022-05-28 02:21:55'),(3,'Thiếu nhi','Thể loại thiếu nhi','2022-03-31 04:16:43','2022-05-28 02:21:39'),(4,'Truyện ngắn','Thể loại truyện ngắn','2022-05-03 03:05:13','2022-05-03 03:05:13'),(7,'Văn hoá - Giáo dục','Văn hoá - Giáo dục','2022-05-28 00:39:05','2022-05-28 02:15:18');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Nguyen Anh Tuan','natuan@gmail.com','Hưng Yên','01235686544','Note','2022-02-01 17:00:00','2022-05-03 20:52:15'),(2,'Nguyen Van Lam','nvlam@gmail.com','Hưng Yên','012468555',NULL,'2022-05-03 21:06:33','2022-05-03 21:06:33');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2014_10_12_200000_add_two_factor_columns_to_users_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2022_05_02_032708_create_sessions_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_detail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int(10) NOT NULL,
  `id_sp` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `thanh_tien` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` VALUES (1,1,1,1,20000,'2019-04-18 15:50:19','2019-04-18 15:50:19'),(2,1,2,1,35000,'2019-04-18 15:48:32','2019-04-18 15:48:32'),(3,1,11,2,17000,'2019-04-18 15:50:19','2019-04-18 15:50:19'),(4,2,12,1,20000,'2019-05-08 18:27:05','2019-05-08 18:27:05'),(5,2,13,1,20000,'2019-05-05 11:19:04','2019-05-05 11:19:04'),(6,5,2,1,198000,'2019-05-05 11:19:04','2019-05-05 11:19:04'),(7,5,1,1,209000,'2019-05-05 11:19:04','2019-05-05 11:19:04');
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_kh` int(10) DEFAULT NULL,
  `date_order` datetime DEFAULT NULL,
  `tong_tien` float DEFAULT NULL,
  `payment` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,'2019-05-06 00:00:00',20000,'on','Hưng Yên','Đã giao','Giao hàng trong cuối tuần','2019-05-05 11:19:04','2022-05-28 09:21:36'),(2,1,'2019-05-09 00:00:00',35000,'on','Hà Nội','Đang giao',NULL,'2019-05-08 18:27:05','2022-05-28 09:22:28'),(3,1,'2019-04-19 00:00:00',17000,'on','Hà Nội','Đã giao',NULL,'2019-04-22 01:17:54','2019-04-18 15:48:32'),(4,1,'2019-04-19 00:00:00',70000,'on','Hưng Yên','Chưa giao',NULL,'2019-04-22 01:21:23','2019-04-21 18:21:23'),(5,2,'2023-04-27 00:00:00',70000,'on','Hưng Yên','Chưa giao','Giao trong ngày','2019-04-22 01:21:23','2019-04-21 18:21:23');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (1,'Lao động','Hà Nội','nxblaodong@gmail.com','0133333333','2022-04-25 07:05:43','2022-04-25 07:05:43'),(4,'Kim đồng','Hà Nội','nxbkimdong@gmail.com','0133333333','2022-04-25 07:05:43','2022-04-25 07:05:43'),(5,'Trẻ','Hà Nội','nxbtre@gmail.com','0123456789','2022-05-03 19:53:51','2022-05-03 19:53:51'),(11,'Công thương','Hà Nội','nxbcongthuong@gmail.com','0123456789','2022-05-28 17:57:37','2022-05-28 17:57:37');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('byp4bmZRnUVGdA2Xg0tXraBGJnVHd2EKNIeeHtaE',2,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZ2poVU14b1I1cENGdW44ZmdQelVROFI4M0RyYUJhTGkxd2w4cWtEbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wcm9maWxlIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9',1652865763),('JeNySXtLX0XDSTlKCdR4QL9FAiP2dWbWk0mVvEKQ',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQk1yeUhXVU9mTndXMWdiV0gzMmp4TkNhZUpkeUZ1TzI3N0pCV3BTWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kZXRhaWwiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjQ6ImNhcnQiO2E6Mjp7aToxMTthOjU6e3M6MjoiaWQiO2k6MTE7czo0OiJuYW1lIjtzOjQ5OiLEkMOhbmggdGjhu6ljIGto4bqjIG7Eg25nIHThuq1wIHRydW5nIGPhu6dhIHRy4bq7IjtzOjU6InByaWNlIjtkOjEzOTAwMDtzOjM6InF0eSI7aToyO3M6NToiaW1hZ2UiO3M6NTA6IkJpYV9EYW5oLXRodWMta2hhLW5hbmctdGFwLXRydW5nLWN1YS10cmVfQmlhLTEuanBnIjt9aToyO2E6NTp7czoyOiJpZCI7aToyO3M6NDoibmFtZSI7czo1NzoiTeG7jWkgxJHhu6lhIHRy4bq7IMSR4buBdSBjw7MgdGjhu4MgY8awIHjhu60gxJHDum5nIGPDoWNoIjtzOjU6InByaWNlIjtkOjE5ODAwMDtzOjM6InF0eSI7aToyO3M6NToiaW1hZ2UiO3M6NTI6IkJpYS1Nb2ktZHVhLXRyZS1kZXUtY28tdGhlLWN1LXh1LWR1bmctY2FjaC1iaWEtMS5qcGciO319fQ==',1652848815),('KK1Lk9kZ0ZU7Q4QEsyQTm7LPh1FeHNvypysBb2Ck',NULL,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.61 Safari/537.36','YTo0OntzOjY6Il90b2tlbiI7czo0MDoidldVZGR1bEp6dzdHWGw3MlREQU1MeGlaRmN1R0pVSnhLa0hoMzkxbiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC90aGFuaC10b2FuIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjI6e2k6MjthOjU6e3M6MjoiaWQiO2k6MjtzOjQ6Im5hbWUiO3M6NTc6Ik3hu41pIMSR4bupYSB0cuG6uyDEkeG7gXUgY8OzIHRo4buDIGPGsCB44butIMSRw7puZyBjw6FjaCI7czo1OiJwcmljZSI7ZDoxOTgwMDA7czozOiJxdHkiO2k6MjtzOjU6ImltYWdlIjtzOjUyOiJCaWEtTW9pLWR1YS10cmUtZGV1LWNvLXRoZS1jdS14dS1kdW5nLWNhY2gtYmlhLTEuanBnIjt9aToxMTthOjU6e3M6MjoiaWQiO2k6MTE7czo0OiJuYW1lIjtzOjQ5OiLEkMOhbmggdGjhu6ljIGto4bqjIG7Eg25nIHThuq1wIHRydW5nIGPhu6dhIHRy4bq7IjtzOjU6InByaWNlIjtkOjEzOTAwMDtzOjM6InF0eSI7aToxO3M6NToiaW1hZ2UiO3M6NTA6IkJpYV9EYW5oLXRodWMta2hhLW5hbmctdGFwLXRydW5nLWN1YS10cmVfQmlhLTEuanBnIjt9fX0=',1653796109);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) unsigned DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nguyen Anh Tuan','storebook@gmail.com',NULL,'$2y$10$C11HrleVPyrwdKxg3m.3quX31CysjxnJgFV0q15KddeIT3r/2XOBy',NULL,NULL,NULL,'jbSAvlRGfAGe1NqtVX3f2jHeMpIfxuFgot4rgGDl1UsNIlvrnoaOhaxIxGvv',NULL,NULL,'2022-05-02 01:59:15','2022-05-02 07:11:12'),(2,'Nguyen Van Lam','nvlam@gmail.com',NULL,'$2y$10$thq0C7QJjQC0pwCgy/gcQuxcRlXO5o3YWYRhEdy2dqjnzciaiEHfm',NULL,NULL,NULL,NULL,NULL,NULL,'2022-05-04 00:16:22','2022-05-04 00:16:22');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-05 13:25:36
