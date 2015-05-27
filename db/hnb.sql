/*
SQLyog Ultimate v9.33 GA
MySQL - 5.5.32 : Database - hnb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`hnb` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `hnb`;

/*Table structure for table `ad_advertise` */

DROP TABLE IF EXISTS `ad_advertise`;

CREATE TABLE `ad_advertise` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên banner',
  `description` text COMMENT 'Mô tả',
  `location` varchar(255) DEFAULT NULL COMMENT 'Trang hiển thị',
  `view_type` varchar(10) DEFAULT NULL COMMENT 'Kiểu hiển thị S=Slide, F=Flash, I=Ảnh',
  `amount` bigint(20) DEFAULT '0' COMMENT 'Số lượng ảnh hiển thị',
  `width` bigint(20) DEFAULT '0' COMMENT 'Chiều rộng',
  `height` bigint(20) DEFAULT '0' COMMENT 'Chiều cao',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái 0=chưa sử dụng, 1= sử dụng',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_advertise_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_advertise_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_advertise` */

/*Table structure for table `ad_advertise_image` */

DROP TABLE IF EXISTS `ad_advertise_image`;

CREATE TABLE `ad_advertise_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(255) NOT NULL COMMENT 'Đường dẫn file',
  `advertise_id` bigint(20) DEFAULT NULL COMMENT 'banner quảng cáo',
  `extension` varchar(200) DEFAULT NULL COMMENT 'phần mở rộng của file',
  `priority` bigint(20) NOT NULL COMMENT 'Độ ưu tiên hiển thị',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái 0=chưa sử dụng, 1= sử dụng',
  `link` varchar(255) DEFAULT NULL COMMENT 'Đường dẫn chi tiết (nếu có)',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `advertise_id_idx` (`advertise_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_advertise_image_advertise_id_ad_advertise_id` FOREIGN KEY (`advertise_id`) REFERENCES `ad_advertise` (`id`),
  CONSTRAINT `ad_advertise_image_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_advertise_image_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_advertise_image` */

/*Table structure for table `ad_advertise_location` */

DROP TABLE IF EXISTS `ad_advertise_location`;

CREATE TABLE `ad_advertise_location` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL COMMENT 'Ten vi tri quang cao',
  `page` varchar(200) DEFAULT NULL COMMENT 'Trang hiển thị',
  `template` varchar(200) DEFAULT NULL COMMENT 'Duong dan toi file template quang cao',
  `advertise_id` bigint(20) DEFAULT NULL COMMENT 'banner quảng cáo',
  `priority` bigint(20) NOT NULL COMMENT 'Thứ tự hiển thị',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_advertise_location` */

/*Table structure for table `ad_album` */

DROP TABLE IF EXISTS `ad_album`;

CREATE TABLE `ad_album` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên Album',
  `description` text NOT NULL COMMENT 'Giới thiệu album',
  `event_date` datetime NOT NULL COMMENT 'Ngày diễn ra sự kiện',
  `priority` bigint(20) NOT NULL COMMENT 'Độ ưu tiên hiển thị',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái hiển thị (0: Chưa kích hoạt, 1: đã kích hoạt)',
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái mặc định để hiển thị, 1: hiển thị, 0: không hiển thị.',
  `lang` varchar(10) NOT NULL COMMENT 'Đa ngôn ngữ',
  `slug` varchar(255) NOT NULL COMMENT 'chuyển đổi url',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_album_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_album_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_album` */

/*Table structure for table `ad_album_photo` */

DROP TABLE IF EXISTS `ad_album_photo`;

CREATE TABLE `ad_album_photo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên photo',
  `file_path` varchar(255) NOT NULL COMMENT 'Đường dẫn file',
  `album_id` bigint(20) DEFAULT NULL COMMENT 'banner quảng cáo',
  `extension` varchar(200) DEFAULT NULL COMMENT 'phần mở rộng của file',
  `priority` bigint(20) NOT NULL COMMENT 'Độ ưu tiên hiển thị',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái 0=chưa sử dụng, 1= sử dụng',
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Ảnh đại diện cho Album',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `album_id_idx` (`album_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_album_photo_album_id_ad_album_id` FOREIGN KEY (`album_id`) REFERENCES `ad_album` (`id`),
  CONSTRAINT `ad_album_photo_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_album_photo_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_album_photo` */

/*Table structure for table `ad_article` */

DROP TABLE IF EXISTS `ad_article`;

CREATE TABLE `ad_article` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL COMMENT 'Tiêu đề bài viết',
  `alttitle` varchar(255) DEFAULT NULL COMMENT 'Tiêu đề rút gọn',
  `header` longtext COMMENT 'Trích yếu',
  `body` longtext COMMENT 'Nội dung bài viết trên web',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'Đường dẫn ảnh đại diện',
  `attributes` bigint(20) DEFAULT NULL COMMENT 'Thuộc tính của bài viết: khuyến mại, ',
  `hit_count` bigint(20) DEFAULT NULL COMMENT 'Số lượt truy cập',
  `priority` bigint(20) NOT NULL COMMENT 'Độ ưu tiên hiển thị',
  `published_time` datetime DEFAULT NULL COMMENT 'Thời gian xuất bản',
  `expiredate_time` datetime DEFAULT NULL COMMENT 'Thời gian kết thúc bản tin',
  `meta` varchar(255) DEFAULT NULL COMMENT 'Nội dung meta',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Nội dung keywords',
  `author` varchar(255) DEFAULT NULL COMMENT 'Tác giả',
  `other_link` longtext COMMENT 'Các link liên quan',
  `is_active` bigint(20) NOT NULL DEFAULT '0' COMMENT 'Trạng thái hiển thị (-1: Bản nháp, 0- Chờ duyệt, 1- Đã duyệt, 2- Đã đăng)',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Hiển thị trên trang chủ (0- ko hiển thị, 1- hiển thị)',
  `lang` varchar(10) NOT NULL COMMENT 'Đa ngôn ngữ',
  `slug` varchar(255) NOT NULL COMMENT 'chuyển đổi url',
  `category_id` bigint(20) DEFAULT NULL COMMENT 'Id của danh mục tin tức',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id_idx` (`category_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_article_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_article_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_article` */

/*Table structure for table `ad_article_related` */

DROP TABLE IF EXISTS `ad_article_related`;

CREATE TABLE `ad_article_related` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `article_id` bigint(20) DEFAULT NULL COMMENT 'Id của bài tin tức',
  `related_article_id` bigint(20) DEFAULT NULL COMMENT 'Id của bài viết liên quan',
  PRIMARY KEY (`id`),
  CONSTRAINT `ad_article_related_id_ad_article_id` FOREIGN KEY (`id`) REFERENCES `ad_article` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_article_related` */

/*Table structure for table `ad_category` */

DROP TABLE IF EXISTS `ad_category`;

CREATE TABLE `ad_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên chuyên mục',
  `description` longtext COMMENT 'Mô tả chuyên mục',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện chuyên mục',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái hiển thị (0: ko hiển thị, 1: hiển thị)',
  `lang` varchar(10) DEFAULT NULL COMMENT 'Đa ngôn ngữ',
  `parent_id` bigint(20) DEFAULT NULL COMMENT 'Danh mục cha',
  `slug` varchar(255) NOT NULL COMMENT 'chuyển đổi url',
  `link` varchar(255) DEFAULT NULL COMMENT 'Đường dẫn của chuyên mục (nếu có)',
  `level` bigint(20) DEFAULT '0' COMMENT 'phân cấp chuyên mục',
  `priority` bigint(20) NOT NULL COMMENT 'Độ ưu tiên hiển thị',
  `is_category` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'có xem bài chi tiết hay không',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `parent_id_idx` (`parent_id`),
  KEY `category_id_idx` (`id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_category_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_category_parent_id_ad_category_id` FOREIGN KEY (`parent_id`) REFERENCES `ad_category` (`id`),
  CONSTRAINT `ad_category_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

/*Data for the table `ad_category` */

insert  into `ad_category`(`id`,`name`,`description`,`image_path`,`is_active`,`lang`,`parent_id`,`slug`,`link`,`level`,`priority`,`is_category`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'Trang chủ','',NULL,1,'vi',NULL,'trang-chu','',0,1,0,1,1,'2015-05-27 17:41:08','2015-05-27 17:42:19'),(2,'Giới thiệu','',NULL,1,'vi',NULL,'gioi-thieu','',0,2,0,1,1,'2015-05-27 17:41:35','2015-05-27 17:42:19'),(3,'Thông tin chung','',NULL,1,'vi',2,'thong-tin-chung','',1,3,0,1,1,'2015-05-27 17:42:03','2015-05-27 17:42:19'),(4,'Chức năng nhiệm vụ','',NULL,1,'vi',2,'chuc-nang-nhiem-vu','',1,4,0,1,1,'2015-05-27 17:42:18','2015-05-27 17:42:19'),(5,'Cơ cấu tổ chức','',NULL,1,'vi',2,'co-cau-to-chuc','',1,5,0,1,1,'2015-05-27 17:48:11','2015-05-27 17:48:11'),(6,'Lịch sử phát triển','',NULL,1,'vi',2,'lich-su-phat-trien','',1,6,0,1,1,'2015-05-27 17:48:37','2015-05-27 17:48:37'),(7,'Các thành tích','',NULL,1,'vi',2,'cac-thanh-tich','',1,7,0,1,1,'2015-05-27 17:48:48','2015-05-27 17:48:48'),(8,'Thông báo hướng dẫn','',NULL,1,'vi',2,'thong-bao-huong-dan','',1,8,0,1,1,'2015-05-27 17:49:08','2015-05-27 17:49:08'),(9,'Tin hoạt động','',NULL,1,'vi',NULL,'tin-hoat-dong','',0,9,1,1,1,'2015-05-27 17:49:24','2015-05-27 17:49:24'),(10,'Tin tức - Sự kiện','',NULL,1,'vi',NULL,'tin-tuc-su-kien','',0,14,1,1,1,'2015-05-27 17:49:39','2015-05-27 17:51:58'),(11,'Hoạt động nghiệp vụ','',NULL,1,'vi',NULL,'hoat-dong-nghiep-vu','',0,19,1,1,1,'2015-05-27 17:49:53','2015-05-27 17:53:03'),(12,'Văn hóa nghệ thuật','',NULL,1,'vi',NULL,'van-hoa-nghe-thuat','',0,24,1,1,1,'2015-05-27 17:50:09','2015-05-27 17:54:33'),(13,'Văn bản pháp luật','',NULL,1,'vi',NULL,'van-ban-phap-luat','',0,29,0,1,1,'2015-05-27 17:50:24','2015-05-27 17:56:01'),(14,'Hoạt động Hội','',NULL,1,'vi',9,'hoat-dong-hoi','',1,10,1,1,1,'2015-05-27 17:51:12','2015-05-27 17:51:12'),(15,'Hoạt động các  Hoạt động các chi hội','',NULL,1,'vi',9,'hoat-dong-cac-hoat-dong-cac-chi-hoi','',1,11,1,1,1,'2015-05-27 17:51:25','2015-05-27 17:51:25'),(16,'Hoạt động các câu lạc bộ','Hoạt động các câu lạc bộ',NULL,1,'vi',9,'hoat-dong-cac-cau-lac-bo','',1,12,1,1,1,'2015-05-27 17:51:41','2015-05-27 17:51:41'),(17,'Chân dung nhà báo','Chân dung nhà báo',NULL,1,'vi',9,'chan-dung-nha-bao','',1,13,1,1,1,'2015-05-27 17:51:58','2015-05-27 17:51:58'),(18,'Tin thời sự','Tin thời sự',NULL,1,'vi',10,'tin-thoi-su','',1,15,1,1,1,'2015-05-27 17:52:11','2015-05-27 17:52:11'),(19,'Tin trong tỉnh','Tin trong tỉnh',NULL,1,'vi',10,'tin-trong-tinh','',1,16,1,1,1,'2015-05-27 17:52:30','2015-05-27 17:52:30'),(20,'Tin báo chí trong nước','',NULL,1,'vi',10,'tin-bao-chi-trong-nuoc','',1,17,1,1,1,'2015-05-27 17:52:48','2015-05-27 17:52:48'),(21,'Tin báo chí nước ngoài','Tin báo chí nước ngoài',NULL,1,'vi',10,'tin-bao-chi-nuoc-ngoai','',1,18,1,1,1,'2015-05-27 17:53:03','2015-05-27 17:53:03'),(22,'Tài liệu nghiệp vụ','',NULL,1,'vi',11,'tai-lieu-nghiep-vu','',1,20,1,1,1,'2015-05-27 17:53:37','2015-05-27 17:53:37'),(23,'Kỹ năng nhà báo','Kỹ năng nhà báo',NULL,1,'vi',11,'ky-nang-nha-bao','',1,21,1,1,1,'2015-05-27 17:53:53','2015-05-27 17:53:53'),(24,'Hoạt động đào tạo','',NULL,1,'vi',11,'hoat-dong-dao-tao','',1,22,1,1,1,'2015-05-27 17:54:16','2015-05-27 17:54:16'),(25,'Trao đổi nghiệp vụ','',NULL,1,'vi',11,'trao-doi-nghiep-vu','',1,23,1,1,1,'2015-05-27 17:54:33','2015-05-27 17:54:33'),(26,'Ảnh báo chí','',NULL,1,'vi',12,'anh-bao-chi','',1,25,0,NULL,1,'2015-05-27 17:55:05','2015-05-27 17:58:28'),(27,'Video Clip','Video Clip',NULL,1,'vi',12,'video-clip','',1,26,0,1,1,'2015-05-27 17:55:31','2015-05-27 17:55:31'),(28,'Trang thơ nhà báo','Trang thơ nhà báo',NULL,1,'vi',12,'trang-tho-nha-bao','',1,27,1,1,1,'2015-05-27 17:55:45','2015-05-27 17:55:45'),(29,'Thư giãn','',NULL,1,'vi',12,'thu-gian','',1,28,1,1,1,'2015-05-27 17:56:01','2015-05-27 17:56:01'),(30,'Văn bản QLNN và BCXB','Văn bản QLNN và BCXB',NULL,1,'vi',13,'van-ban-qlnn-va-bcxb','',1,30,0,1,1,'2015-05-27 17:56:18','2015-05-27 17:56:18'),(31,'Văn bản HNB TW','Văn bản HNB TW',NULL,1,'vi',13,'van-ban-hnb-tw','',1,31,0,1,1,'2015-05-27 17:56:32','2015-05-27 17:56:32'),(32,'Văn bản HNB Tỉnh','Văn bản HNB Tỉnh',NULL,1,'vi',13,'van-ban-hnb-tinh','',1,32,0,1,1,'2015-05-27 17:57:00','2015-05-27 17:57:00');

/*Table structure for table `ad_category_permission` */

DROP TABLE IF EXISTS `ad_category_permission`;

CREATE TABLE `ad_category_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) DEFAULT NULL COMMENT 'Id của danh mục tin tức',
  `permission_id` bigint(20) DEFAULT NULL COMMENT 'Id quyền',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

/*Data for the table `ad_category_permission` */

insert  into `ad_category_permission`(`id`,`category_id`,`permission_id`) values (1,1,20),(2,2,20),(3,3,20),(4,4,20),(5,5,20),(6,6,20),(7,7,20),(8,8,20),(9,9,20),(10,10,20),(11,11,20),(12,12,20),(13,13,20),(14,14,20),(15,15,20),(16,16,20),(17,17,20),(18,18,20),(19,19,20),(20,20,20),(21,21,20),(22,22,20),(23,23,20),(24,24,20),(25,25,20),(27,27,20),(28,28,20),(29,29,20),(30,30,20),(31,31,20),(32,32,20),(33,26,20);

/*Table structure for table `ad_comment` */

DROP TABLE IF EXISTS `ad_comment`;

CREATE TABLE `ad_comment` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề',
  `full_name` varchar(255) NOT NULL COMMENT 'Ho ten nguoi gop y',
  `phone_number` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL COMMENT 'Ngày tạo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_comment` */

/*Table structure for table `ad_contact` */

DROP TABLE IF EXISTS `ad_contact`;

CREATE TABLE `ad_contact` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT 'Tiêu đề',
  `content` text,
  `lat` varchar(50) DEFAULT NULL,
  `lng` varchar(50) DEFAULT NULL,
  `zoom` varchar(5) DEFAULT NULL,
  `maptypeid` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_contact_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_contact_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_contact` */

/*Table structure for table `ad_document` */

DROP TABLE IF EXISTS `ad_document`;

CREATE TABLE `ad_document` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Ho ten nguoi gop y',
  `description` text,
  `file_path` varchar(255) NOT NULL,
  `extension` varchar(25) DEFAULT NULL,
  `document_number` varchar(150) DEFAULT NULL,
  `document_date` datetime DEFAULT NULL,
  `priority` int(4) DEFAULT NULL,
  `category_id` int(8) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id_idx` (`category_id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_document_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_document_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_document` */

/*Table structure for table `ad_document_category` */

DROP TABLE IF EXISTS `ad_document_category`;

CREATE TABLE `ad_document_category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Ho ten nguoi gop y',
  `image_path` varchar(255) DEFAULT NULL,
  `description` text,
  `priority` int(5) DEFAULT NULL,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_document_category_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_document_category_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_document_category` */

/*Table structure for table `ad_html` */

DROP TABLE IF EXISTS `ad_html`;

CREATE TABLE `ad_html` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên bài viết',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'Đường dẫn ảnh đại diện',
  `content` longtext COMMENT 'Nội dung bài viết',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái duyệt bài viết',
  `lang` varchar(10) NOT NULL COMMENT 'Đa ngôn ngữ',
  `slug` varchar(255) NOT NULL COMMENT 'chuyển đổi url',
  `prefix_path` varchar(255) NOT NULL COMMENT 'Đường dẫn trang hiển thị vd: /gioi-thieu/:slug',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_html_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_html_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_html` */

/*Table structure for table `ad_personal` */

DROP TABLE IF EXISTS `ad_personal`;

CREATE TABLE `ad_personal` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL COMMENT 'Ho ten nguoi gop y',
  `birthday` datetime DEFAULT NULL COMMENT 'Ngày sinh',
  `sex` varchar(25) DEFAULT NULL COMMENT 'Giới tính',
  `phone_number` varchar(25) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `introduction` text,
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_personal_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_personal_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_personal` */

/*Table structure for table `ad_user_signin_lock` */

DROP TABLE IF EXISTS `ad_user_signin_lock`;

CREATE TABLE `ad_user_signin_lock` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) DEFAULT NULL,
  `created_time` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_user_signin_lock` */

/*Table structure for table `ad_video` */

DROP TABLE IF EXISTS `ad_video`;

CREATE TABLE `ad_video` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT 'Tên video',
  `description` text NOT NULL COMMENT 'Giới thiệu video',
  `event_date` datetime NOT NULL COMMENT 'Ngày diễn ra sự kiện',
  `file_path` varchar(255) NOT NULL COMMENT 'Đường dẫn file',
  `extension` varchar(200) DEFAULT NULL COMMENT 'phần mở rộng của file',
  `priority` bigint(20) NOT NULL COMMENT 'Độ ưu tiên hiển thị',
  `is_active` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái hiển thị (0: Chưa kích hoạt, 1: đã kích hoạt)',
  `is_default` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Trạng thái mặc định để hiển thị, 1: hiển thị, 0: không hiển thị. 1 là duy nhất',
  `lang` varchar(10) NOT NULL COMMENT 'Đa ngôn ngữ',
  `slug` varchar(255) NOT NULL COMMENT 'chuyển đổi url',
  `image_path` varchar(255) DEFAULT NULL COMMENT 'File ảnh đại diện video',
  `created_by` bigint(20) DEFAULT NULL,
  `updated_by` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  UNIQUE KEY `slug` (`slug`),
  KEY `created_by_idx` (`created_by`),
  KEY `updated_by_idx` (`updated_by`),
  CONSTRAINT `ad_video_created_by_sf_guard_user_id` FOREIGN KEY (`created_by`) REFERENCES `sf_guard_user` (`id`),
  CONSTRAINT `ad_video_updated_by_sf_guard_user_id` FOREIGN KEY (`updated_by`) REFERENCES `sf_guard_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `ad_video` */

/*Table structure for table `sessions_admin` */

DROP TABLE IF EXISTS `sessions_admin`;

CREATE TABLE `sessions_admin` (
  `sess_id` varchar(64) NOT NULL DEFAULT '',
  `sess_data` longtext NOT NULL,
  `sess_time` bigint(20) NOT NULL,
  `sess_userid` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`sess_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sessions_admin` */

insert  into `sessions_admin`(`sess_id`,`sess_data`,`sess_time`,`sess_userid`) values ('cggrukfi7a03j1lnn3mep9cqs4','symfony/user/sfUser/lastRequest|i:1432742383;symfony/user/sfUser/authenticated|b:0;symfony/user/sfUser/credentials|a:0:{}symfony/user/sfUser/attributes|a:0:{}symfony/user/sfUser/culture|s:2:\"vi\";',1432742383,0),('d58t0n38v2sfj4nn86na7egv73','',1432745504,NULL),('dbvee9srse974mna779bj9mlj7','',1432745521,NULL),('einf9e3fkp75m6d8opik098k93','securimage_code_value|a:1:{s:7:\"default\";s:2:\"nr\";}securimage_code_ctime|a:1:{s:7:\"default\";i:1432742386;}symfony/user/sfUser/lastRequest|i:1432742386;symfony/user/sfUser/authenticated|b:0;symfony/user/sfUser/credentials|a:0:{}symfony/user/sfUser/attributes|a:0:{}symfony/user/sfUser/culture|s:2:\"vi\";',1432742386,0),('nvmdfj6uo8usls83o14uj7r8d5','symfony/user/sfUser/lastRequest|i:1432742384;symfony/user/sfUser/authenticated|b:0;symfony/user/sfUser/credentials|a:0:{}symfony/user/sfUser/attributes|a:0:{}symfony/user/sfUser/culture|s:2:\"vi\";',1432742385,0),('ohmmi74g34tcrju3bd0bbqhl71','symfony/user/sfUser/lastRequest|i:1432745522;symfony/user/sfUser/authenticated|b:1;symfony/user/sfUser/credentials|a:5:{i:0;s:5:\"admin\";i:1;s:11:\"news_editor\";i:2;s:13:\"news_approved\";i:3;s:11:\"news_public\";i:4;s:17:\"news_tintucsukien\";}symfony/user/sfUser/attributes|a:5:{s:30:\"symfony/user/sfUser/attributes\";a:2:{s:9:\"IpAddress\";s:3:\"::1\";s:9:\"UserAgent\";s:72:\"Mozilla/5.0 (Windows NT 6.1; WOW64; rv:38.0) Gecko/20100101 Firefox/38.0\";}s:12:\"admin_module\";a:4:{s:21:\"adManageCategory.page\";i:1;s:21:\"adManageCategory.sort\";a:2:{i:0;N;i:1;N;}s:22:\"sfGuardPermission.page\";i:1;s:22:\"sfGuardPermission.sort\";a:2:{i:0;N;i:1;N;}}s:25:\"symfony/user/sfUser/flash\";a:0:{}s:32:\"symfony/user/sfUser/flash/remove\";a:0:{}s:19:\"sfGuardSecurityUser\";a:1:{s:7:\"user_id\";s:1:\"1\";}}symfony/user/sfUser/culture|s:2:\"vi\";securimage_code_value|a:1:{s:7:\"default\";s:0:\"\";}securimage_code_ctime|a:1:{s:7:\"default\";s:0:\"\";}',1432745522,1);

/*Table structure for table `sf_guard_forgot_password` */

DROP TABLE IF EXISTS `sf_guard_forgot_password`;

CREATE TABLE `sf_guard_forgot_password` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `unique_key` varchar(255) DEFAULT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_forgot_password_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_forgot_password` */

/*Table structure for table `sf_guard_group` */

DROP TABLE IF EXISTS `sf_guard_group`;

CREATE TABLE `sf_guard_group` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_group` */

/*Table structure for table `sf_guard_group_permission` */

DROP TABLE IF EXISTS `sf_guard_group_permission`;

CREATE TABLE `sf_guard_group_permission` (
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_group_permission` */

/*Table structure for table `sf_guard_permission` */

DROP TABLE IF EXISTS `sf_guard_permission`;

CREATE TABLE `sf_guard_permission` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `types` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Loại quyền: 0 - Quyền hệ thống, 1 - Quyền nội dung. Nếu là quyền hệ thống thì chỉ đọc mà không được sửa',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_permission` */

insert  into `sf_guard_permission`(`id`,`name`,`description`,`types`,`created_at`,`updated_at`) values (1,'admin','Quyền quản trị hệ thống',0,'2013-08-07 09:38:38','2013-11-22 10:27:58'),(17,'news_editor','',0,'2015-05-27 17:37:08','2015-05-27 17:37:08'),(18,'news_approved','',0,'2015-05-27 17:38:26','2015-05-27 17:38:26'),(19,'news_public','',0,'2015-05-27 17:38:43','2015-05-27 17:38:43'),(20,'news_tintucsukien','',1,'2015-05-27 17:39:27','2015-05-27 17:39:27');

/*Table structure for table `sf_guard_remember_key` */

DROP TABLE IF EXISTS `sf_guard_remember_key`;

CREATE TABLE `sf_guard_remember_key` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `remember_key` varchar(32) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_idx` (`user_id`),
  CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_remember_key` */

/*Table structure for table `sf_guard_user` */

DROP TABLE IF EXISTS `sf_guard_user`;

CREATE TABLE `sf_guard_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `algorithm` varchar(255) NOT NULL DEFAULT 'sha1',
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `is_super_admin` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `pass_update_at` datetime DEFAULT NULL,
  `is_lock_signin` tinyint(1) DEFAULT NULL,
  `locked_time` bigint(20) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_user` */

insert  into `sf_guard_user`(`id`,`first_name`,`last_name`,`phone`,`email_address`,`username`,`algorithm`,`salt`,`password`,`is_active`,`is_super_admin`,`last_login`,`pass_update_at`,`is_lock_signin`,`locked_time`,`created_at`,`updated_at`) values (1,'Ngoc','Ta van','0978097098','ngoctv84@viettel.com.vn','admin','sha1','fd5d0f46cf9f4c45d58bcf1dc68d6856','c9e0546d46b8f68249ab3f5ee798a4f08af94632',1,1,'2015-05-27 18:52:01','2015-05-25 19:01:03',NULL,NULL,'2014-04-19 08:29:58','2015-05-27 18:52:01');

/*Table structure for table `sf_guard_user_group` */

DROP TABLE IF EXISTS `sf_guard_user_group`;

CREATE TABLE `sf_guard_user_group` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `group_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`),
  CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_user_group` */

/*Table structure for table `sf_guard_user_permission` */

DROP TABLE IF EXISTS `sf_guard_user_permission`;

CREATE TABLE `sf_guard_user_permission` (
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `permission_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`),
  CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sf_guard_user_permission` */

insert  into `sf_guard_user_permission`(`user_id`,`permission_id`,`created_at`,`updated_at`) values (1,1,'2014-04-19 08:30:58','2014-04-19 08:31:02'),(1,17,'2015-05-27 17:37:08','2015-05-27 17:37:08'),(1,18,'2015-05-27 17:38:26','2015-05-27 17:38:26'),(1,19,'2015-05-27 17:38:43','2015-05-27 17:38:43'),(1,20,'2015-05-27 17:39:27','2015-05-27 17:39:27');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
