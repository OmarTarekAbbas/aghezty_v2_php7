/*
Navicat MySQL Data Transfer

Source Server         : localhost_php7
Source Server Version : 50505
Source Host           : localhost:3308
Source Database       : aghezty

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-01-01 15:43:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `advertisements`
-- ----------------------------
DROP TABLE IF EXISTS `advertisements`;
CREATE TABLE `advertisements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ads_url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of advertisements
-- ----------------------------
INSERT INTO `advertisements` VALUES ('1', '/uploads/ads/2019-09-26/1569509243712.png', 'https://googel.com', '2019-09-23 15:35:05', '2019-09-25 11:55:44');
INSERT INTO `advertisements` VALUES ('3', '/uploads/ads/2019-09-26/1569509253628.png', 'https://googel.com', '2019-09-25 11:56:02', '2019-09-25 11:56:02');

-- ----------------------------
-- Table structure for `brands`
-- ----------------------------
DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of brands
-- ----------------------------
INSERT INTO `brands` VALUES ('1', 'Samsung', '/uploads/brand/2019-09-10/1568111002525.png', '2019-09-10 08:34:57', '2019-09-10 11:23:22');
INSERT INTO `brands` VALUES ('2', 'LG', '/uploads/brand/2019-09-10/1568111011566.png', '2019-09-10 08:35:19', '2019-09-10 11:23:31');
INSERT INTO `brands` VALUES ('3', 'Toshiba', '/uploads/brand/2019-09-10/1568111119116.png', '2019-09-10 08:35:48', '2019-09-10 11:25:19');
INSERT INTO `brands` VALUES ('4', 'Areston', '/uploads/brand/2019-10-01/156991887110.png', '2019-10-01 09:34:31', '2019-10-01 09:34:31');
INSERT INTO `brands` VALUES ('5', 'test', '/uploads/brand/2019-10-02/1570034174525.jpg', '2019-10-02 17:36:14', '2019-10-02 17:36:14');

-- ----------------------------
-- Table structure for `carts`
-- ----------------------------
DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_client_id_foreign` (`client_id`),
  KEY `carts_product_id_foreign` (`product_id`),
  CONSTRAINT `carts_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of carts
-- ----------------------------
INSERT INTO `carts` VALUES ('3', '1', '13500.00', '13500.00', '30', '5', '2019-12-22 11:41:37', '2019-12-22 11:41:37');
INSERT INTO `carts` VALUES ('4', '1', '1000.00', '1000.00', '30', '30', '2019-12-22 11:47:08', '2019-12-22 11:47:08');

-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coding` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('7', 'heavy machine', '/uploads/category/2019-09-10/1568111432674.png', '123345', '2019-09-09 12:11:13', '2019-09-15 13:43:16', null);
INSERT INTO `categories` VALUES ('8', 'fridge', '/uploads/category/2019-09-10/1568111480352.png', '1464', '2019-09-09 12:12:23', '2019-09-10 11:31:20', '7');
INSERT INTO `categories` VALUES ('9', 'Deep Freezer', '/uploads/category/2019-09-10/1568111489985.png', '1234', '2019-09-09 12:13:46', '2019-09-15 13:44:11', '7');
INSERT INTO `categories` VALUES ('10', 'Washing machines', '/uploads/category/2019-09-10/1568111496352.png', '7994', '2019-09-09 12:14:24', '2019-09-15 13:44:22', '7');
INSERT INTO `categories` VALUES ('11', 'Monitors and Receivers', '/uploads/category/2019-09-10/1568111438627.png', '7893', '2019-09-09 12:15:16', '2019-09-15 13:43:37', null);
INSERT INTO `categories` VALUES ('12', 'screens', '/uploads/category/2019-09-10/1568111509961.png', '4567', '2019-09-09 12:15:53', '2019-09-15 13:44:38', '11');
INSERT INTO `categories` VALUES ('13', 'Receivers', '/uploads/category/2019-09-10/1568111515573.png', '4567112', '2019-09-09 12:16:55', '2019-09-15 13:44:49', '11');
INSERT INTO `categories` VALUES ('14', 'Telephones and accessories', '/uploads/category/2019-09-10/156811146686.png', '1236', '2019-09-09 12:17:46', '2019-09-15 13:43:48', null);
INSERT INTO `categories` VALUES ('15', 'phones', '/uploads/category/2019-09-10/1568111526339.png', '1478', '2019-09-09 12:18:21', '2019-09-12 10:27:11', '14');
INSERT INTO `categories` VALUES ('16', 'telphone', '/uploads/category/2019-09-10/1568111536770.png', '4560', '2019-09-09 12:19:55', '2019-09-12 10:27:27', '14');
INSERT INTO `categories` VALUES ('20', 'DISH WASHERS', '/uploads/category/2019-10-01/1569918842131.png', '1004', '2019-10-01 09:34:02', '2019-10-01 09:34:02', '7');

-- ----------------------------
-- Table structure for `cities`
-- ----------------------------
DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_amount` decimal(10,2) DEFAULT NULL,
  `governorate_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cities_city_en_unique` (`city_en`),
  UNIQUE KEY `cities_city_ar_unique` (`city_ar`),
  KEY `cities_governorate_id_foreign` (`governorate_id`),
  CONSTRAINT `cities_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=252 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cities
-- ----------------------------
INSERT INTO `cities` VALUES ('1', 'Cairo', 'القاهره', '50.00', '1', null, null);
INSERT INTO `cities` VALUES ('2', 'Giza', 'الجيزة', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('3', 'Sixth of October', 'السادس من أكتوبر', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('4', 'Cheikh Zayed', 'الشيخ زايد\r\n', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('5', 'Hawamdiyah', 'الحوامدية', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('6', 'Al Badrasheen', 'البدرشين', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('7', 'Saf', 'الصف', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('8', 'Atfih', 'أطفيح', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('9', 'Al Ayat', 'العياط', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('10', 'Al-Bawaiti', 'الباويطي', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('11', 'ManshiyetAl Qanater', 'منشأة القناطر', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('12', 'Oaseem', 'أوسيم', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('13', 'Kerdasa', 'كرداسة', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('14', 'Abu Nomros', 'أبو النمرس', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('15', 'Kafr Ghati', 'كفر غطاطي', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('16', 'Manshiyet Al Bakari', 'منشأة البكاري', '50.00', '2', null, null);
INSERT INTO `cities` VALUES ('17', 'Alexandria', 'الأسكندرية', '50.00', '3', null, null);
INSERT INTO `cities` VALUES ('18', 'Burj Al Arab', 'برج العرب', '50.00', '3', null, null);
INSERT INTO `cities` VALUES ('19', 'New Burj Al Arab', 'برج العرب الجديدة', '50.00', '3', null, null);
INSERT INTO `cities` VALUES ('20', 'Banha', 'بنها', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('21', 'Qalyub', 'قليوب', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('22', 'Shubra Al Khaimah', 'شبرا الخيمة', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('23', 'Al Qanater Charity', 'القناطر الخيرية', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('24', 'Khanka', 'الخانكة', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('25', 'Kafr Shukr', 'كفر شكر', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('26', 'Tukh', 'طوخ', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('27', 'Qaha', 'قها', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('28', 'Obour', 'العبور', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('29', 'Khosous', 'الخصوص', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('30', 'Shibin Al Qanater', 'شبين القناطر', '50.00', '12', null, null);
INSERT INTO `cities` VALUES ('31', 'Damanhour', 'دمنهور', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('32', 'Kafr El Dawar', 'كفر الدوار', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('33', 'Rashid', 'رشيد', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('34', 'Edco', 'إدكو', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('35', 'Abu al-Matamir', 'أبو المطامير', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('36', 'Abu Homs', 'أبو حمص', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('37', 'Delengat', 'الدلنجات', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('38', 'Mahmoudiyah', 'المحمودية', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('39', 'Rahmaniyah', 'الرحمانية', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('40', 'Itai Baroud', 'إيتاي البارود', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('41', 'Housh Eissa', 'حوش عيسى', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('42', 'Shubrakhit', 'شبراخيت', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('43', 'Kom Hamada', 'كوم حمادة', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('44', 'Badr', 'بدر', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('45', 'Wadi Natrun', 'وادي النطرون', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('46', 'New Nubaria', 'النوبارية الجديدة', '50.00', '6', null, null);
INSERT INTO `cities` VALUES ('47', 'Marsa Matrouh', 'مرسى مطروح', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('48', 'El Hamam', 'الحمام', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('49', 'Alamein', 'العلمين', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('50', 'Dabaa', 'الضبعة', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('51', 'Al-Nagila', 'النجيلة', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('52', 'Sidi Brani', 'سيدي براني', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('53', 'Salloum', 'السلوم', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('54', 'Siwa', 'سيوة', '50.00', '23', null, null);
INSERT INTO `cities` VALUES ('55', 'Damietta', 'دمياط', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('56', 'New Damietta', 'دمياط الجديدة', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('57', 'Ras El Bar', 'رأس البر', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('58', 'Faraskour', 'فارسكور', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('59', 'Zarqa', 'الزرقا', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('60', 'alsaru', 'السرو', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('61', 'alruwda', 'الروضة', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('62', 'Kafr El-Batikh', 'كفر البطيخ', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('63', 'Azbet Al Burg', 'عزبة البرج', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('64', 'Meet Abou Ghalib', 'ميت أبو غالب', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('65', 'Kafr Saad', 'كفر سعد', '50.00', '19', null, null);
INSERT INTO `cities` VALUES ('66', 'Mansoura', 'المنصورة', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('67', 'Talkha', 'طلخا', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('68', 'Mitt Ghamr', 'ميت غمر', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('69', 'Dekernes', 'دكرنس', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('70', 'Aga', 'أجا', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('71', 'Menia El Nasr', 'منية النصر', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('72', 'Sinbillawin', 'السنبلاوين', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('73', 'El Kurdi', 'الكردي', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('74', 'Bani Ubaid', 'بني عبيد', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('75', 'Al Manzala', 'المنزلة', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('76', 'tami al\'amdid', 'تمي الأمديد', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('77', 'aljamalia', 'الجمالية', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('78', 'Sherbin', 'شربين', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('79', 'Mataria', 'المطرية', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('80', 'Belqas', 'بلقاس', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('81', 'Meet Salsil', 'ميت سلسيل', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('82', 'Gamasa', 'جمصة', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('83', 'Mahalat Damana', 'محلة دمنة', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('84', 'Nabroh', 'نبروه', '50.00', '4', null, null);
INSERT INTO `cities` VALUES ('85', 'Kafr El Sheikh', 'كفر الشيخ', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('86', 'Desouq', 'دسوق', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('87', 'Fooh', 'فوه', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('88', 'Metobas', 'مطوبس', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('89', 'Burg Al Burullus', 'برج البرلس', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('90', 'Baltim', 'بلطيم', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('91', 'Masief Baltim', 'مصيف بلطيم', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('92', 'Hamol', 'الحامول', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('93', 'Bella', 'بيلا', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('94', 'Riyadh', 'الرياض', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('95', 'Sidi Salm', 'سيدي سالم', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('96', 'Qellen', 'قلين', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('97', 'Sidi Ghazi', 'سيدي غازي', '50.00', '22', null, null);
INSERT INTO `cities` VALUES ('98', 'Tanta', 'طنطا', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('99', 'Al Mahalla Al Kobra', 'المحلة الكبرى', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('100', 'Kafr El Zayat', 'كفر الزيات', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('101', 'Zefta', 'زفتى', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('102', 'El Santa', 'السنطة', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('103', 'Qutour', 'قطور', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('104', 'Basion', 'بسيون', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('105', 'Samannoud', 'سمنود', '50.00', '8', null, null);
INSERT INTO `cities` VALUES ('106', 'Shbeen El Koom', 'شبين الكوم', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('107', 'Sadat City', 'مدينة السادات', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('108', 'Menouf', 'منوف', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('109', 'Sars El-Layan', 'سرس الليان', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('110', 'Ashmon', 'أشمون', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('111', 'Al Bagor', 'الباجور', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('112', 'Quesna', 'قويسنا', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('113', 'Berkat El Saba', 'بركة السبع', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('114', 'Tala', 'تلا', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('115', 'Al Shohada', 'الشهداء', '50.00', '10', null, null);
INSERT INTO `cities` VALUES ('116', 'Zagazig', 'الزقازيق', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('117', 'Al Ashr Men Ramadan', 'العاشر من رمضان', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('118', 'Minya Al Qamh', 'منيا القمح', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('119', 'Belbeis', 'بلبيس', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('120', 'Mashtoul El Souq', 'مشتول السوق', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('121', 'Qenaiat', 'القنايات', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('122', 'Abu Hammad', 'أبو حماد', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('123', 'El Qurain', 'القرين', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('124', 'Hehia', 'ههيا', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('125', 'Abu Kabir', 'أبو كبير', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('126', 'Faccus', 'فاقوس', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('127', 'El Salihia El Gedida', 'الصالحية الجديدة', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('128', 'Al Ibrahimiyah', 'الإبراهيمية', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('129', 'Deirb Negm', 'ديرب نجم', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('130', 'Kafr Saqr', 'كفر صقر', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('131', 'Awlad Saqr', 'أولاد صقر', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('132', 'Husseiniya', 'الحسينية', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('133', 'san alhajar alqablia', 'صان الحجر القبلية', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('134', 'Manshayat Abu Omar', 'منشأة أبو عمر', '50.00', '20', null, null);
INSERT INTO `cities` VALUES ('135', 'PorSaid', 'بورسعيد', '50.00', '18', null, null);
INSERT INTO `cities` VALUES ('136', 'PorFouad', 'بورفؤاد', '50.00', '18', null, null);
INSERT INTO `cities` VALUES ('137', 'Ismailia', 'الإسماعيلية', '50.00', '9', null, null);
INSERT INTO `cities` VALUES ('138', 'Fayed', 'فايد', '50.00', '9', null, null);
INSERT INTO `cities` VALUES ('139', 'Qantara Sharq', 'القنطرة شرق', '50.00', '9', null, null);
INSERT INTO `cities` VALUES ('140', 'Qantara Gharb', 'القنطرة غرب', '50.00', '9', null, null);
INSERT INTO `cities` VALUES ('141', 'El Tal El Kabier', 'التل الكبير', '50.00', '9', null, null);
INSERT INTO `cities` VALUES ('142', 'Abu Sawir', 'أبو صوير', '50.00', '9', null, null);
INSERT INTO `cities` VALUES ('143', 'Kasasien El Gedida', 'القصاصين الجديدة', '50.00', '9', null, null);
INSERT INTO `cities` VALUES ('144', 'Suez', 'السويس', '50.00', '14', null, null);
INSERT INTO `cities` VALUES ('145', 'Arish', 'العريش', '50.00', '26', null, null);
INSERT INTO `cities` VALUES ('146', 'Sheikh Zowaid', 'الشيخ زويد', '50.00', '26', null, null);
INSERT INTO `cities` VALUES ('147', 'Nakhl', 'نخل', '50.00', '26', null, null);
INSERT INTO `cities` VALUES ('148', 'Rafah', 'رفح', '50.00', '26', null, null);
INSERT INTO `cities` VALUES ('149', 'Bir al-Abed', 'بئر العبد', '50.00', '26', null, null);
INSERT INTO `cities` VALUES ('150', 'Al Hasana', 'الحسنة', '50.00', '26', null, null);
INSERT INTO `cities` VALUES ('151', 'Al Toor', 'الطور', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('152', 'Sharm El-Shaikh', 'شرم الشيخ', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('153', 'Dahab', 'دهب', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('154', 'Nuweiba', 'نويبع', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('155', 'Taba', 'طابا', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('156', 'Saint Catherine', 'سانت كاترين', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('157', 'Abu Redis', 'أبو رديس', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('158', 'Abu Zenaima', 'أبو زنيمة', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('159', 'Ras Sidr', 'رأس سدر', '50.00', '21', null, null);
INSERT INTO `cities` VALUES ('160', 'Bani Sweif', 'بني سويف', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('161', 'Beni Suef El Gedida', 'بني سويف الجديدة', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('162', 'Al Wasta', 'الواسطى', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('163', 'Naser', 'ناصر', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('164', 'Ehnasia', 'إهناسيا', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('165', 'beba', 'ببا', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('166', 'Fashn', 'الفشن', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('167', 'Somasta', 'سمسطا', '50.00', '17', null, null);
INSERT INTO `cities` VALUES ('168', 'Fayoum', 'الفيوم', '50.00', '7', null, null);
INSERT INTO `cities` VALUES ('169', 'Fayoum El Gedida', 'الفيوم الجديدة', '50.00', '7', null, null);
INSERT INTO `cities` VALUES ('170', 'Tamiya', 'طامية', '50.00', '7', null, null);
INSERT INTO `cities` VALUES ('171', 'Snores', 'سنورس', '50.00', '7', null, null);
INSERT INTO `cities` VALUES ('172', 'Etsa', 'إطسا', '50.00', '7', null, null);
INSERT INTO `cities` VALUES ('173', 'Epschway', 'إبشواي', '50.00', '7', null, null);
INSERT INTO `cities` VALUES ('174', 'Yusuf El Sediaq', 'يوسف الصديق', '50.00', '7', null, null);
INSERT INTO `cities` VALUES ('175', 'Minya', 'المنيا', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('176', 'Minya El Gedida', 'المنيا الجديدة', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('177', 'El Adwa', 'العدوة', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('178', 'Magagha', 'مغاغة', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('179', 'Bani Mazar', 'بني مزار', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('180', 'Mattay', 'مطاي', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('181', 'Samalut', 'سمالوط', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('182', 'Madinat El Fekria', 'المدينة الفكرية', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('183', 'Meloy', 'ملوي', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('184', 'Deir Mawas', 'دير مواس', '50.00', '11', null, null);
INSERT INTO `cities` VALUES ('185', 'Assiut', 'أسيوط', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('186', 'Assiut El Gedida', 'أسيوط الجديدة', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('187', 'Dayrout', 'ديروط', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('188', 'Manfalut', 'منفلوط', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('189', 'Qusiya', 'القوصية', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('190', 'Abnoub', 'أبنوب', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('191', 'Abu Tig', 'أبو تيج', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('192', 'El Ghanaim', 'الغنايم', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('193', 'Sahel Selim', 'ساحل سليم', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('194', 'El Badari', 'البداري', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('195', 'Sidfa', 'صدفا', '50.00', '16', null, null);
INSERT INTO `cities` VALUES ('196', 'El Kharga', 'الخارجة', '50.00', '13', null, null);
INSERT INTO `cities` VALUES ('197', 'Paris', 'باريس', '50.00', '13', null, null);
INSERT INTO `cities` VALUES ('198', 'Mout', 'موط', '50.00', '13', null, null);
INSERT INTO `cities` VALUES ('199', 'Farafra', 'الفرافرة', '50.00', '13', null, null);
INSERT INTO `cities` VALUES ('200', 'Balat', 'بلاط', '50.00', '13', null, null);
INSERT INTO `cities` VALUES ('201', 'Hurghada', 'الغردقة', '50.00', '5', null, null);
INSERT INTO `cities` VALUES ('202', 'Ras Ghareb', 'رأس غارب', '50.00', '5', null, null);
INSERT INTO `cities` VALUES ('203', 'Safaga', 'سفاجا', '60.00', '5', null, '2019-09-23 15:05:52');
INSERT INTO `cities` VALUES ('204', 'El Qusiar', 'القصير', '50.00', '5', null, null);
INSERT INTO `cities` VALUES ('205', 'Marsa Alam', 'مرسى علم', '50.00', '5', null, null);
INSERT INTO `cities` VALUES ('206', 'Shalatin', 'الشلاتين', '50.00', '5', null, null);
INSERT INTO `cities` VALUES ('207', 'Halaib', 'حلايب', '50.00', '5', null, null);
INSERT INTO `cities` VALUES ('221', 'Qena', 'قنا', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('222', 'New Qena', 'قنا الجديدة', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('223', 'Abu Tesht', 'أبو تشت', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('224', 'Nag Hammadi', 'نجع حمادي', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('225', 'Deshna', 'دشنا', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('226', 'Alwaqf', 'الوقف', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('227', 'Qaft', 'قفط', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('228', 'Naqada', 'نقادة', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('229', 'Farshout', 'فرشوط', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('230', 'Quos', 'قوص', '50.00', '25', null, null);
INSERT INTO `cities` VALUES ('231', 'Luxor', 'الأقصر', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('232', 'New Luxor', 'الأقصر الجديدة', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('233', 'Esna', 'إسنا', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('234', 'New Tiba', 'طيبة الجديدة', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('235', 'Al ziynia', 'الزينية', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('236', 'Al Bayadieh', 'البياضية', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('237', 'Al Qarna', 'القرنة', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('238', 'Armant', 'أرمنت', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('239', 'Al Tud', 'الطود', '50.00', '24', null, null);
INSERT INTO `cities` VALUES ('240', 'Aswan', 'أسوان', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('241', 'Aswan El Gedida', 'أسوان الجديدة', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('242', 'Drau', 'دراو', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('243', 'Kom Ombo', 'كوم أمبو', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('244', 'Nasr Al Nuba', 'نصر النوبة', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('245', 'Kalabsha', 'كلابشة', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('246', 'Edfu', 'إدفو', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('247', 'Al-Radisiyah', 'الرديسية', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('248', 'Al Basilia', 'البصيلية', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('249', 'Al Sibaeia', 'السباعية', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('250', 'Abo Simbl Al Siyahia', 'ابوسمبل السياحية', '50.00', '15', null, null);
INSERT INTO `cities` VALUES ('251', 'city', 'مدينة', '100.00', '29', '2019-10-02 15:57:43', '2019-10-02 15:57:43');

-- ----------------------------
-- Table structure for `clients`
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_telphone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_email_unique` (`email`),
  UNIQUE KEY `clients_phone_unique` (`phone`),
  UNIQUE KEY `clients_home_telphone_unique` (`home_telphone`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('17', 'emad2', 'ahmed333555777@gmail.com', '$2y$10$Zm/d4Kx0gKGQEmHOulj..OrgCu15FOL24EbtFKBn6oBhGrUsGzfyS', '/uploads/clients/2019-11-13/1573634983367.png', '01000146016', null, '6AOV7EA8xzBZZghwlWcZgcYPmYjTdSM1Ni08sl9ZvkAGA0p0y3Bb9KfdcWaU', '2019-10-01 14:50:23', '2019-11-13 10:49:23');
INSERT INTO `clients` VALUES ('27', 'mohamed', 'mohamed@yahoo.com', '$2y$10$9znZA1qBl7VKLK1TakeZjeJ77OVylsKzJt9Bnd.wZaKl3tZ14sl56', null, '01228023501', null, null, '2019-11-12 15:30:00', '2019-11-12 15:30:00');
INSERT INTO `clients` VALUES ('28', 'mohamed22', 'mohamed22@yahoo.com', '$2y$10$h4IHYYfplffQk9qnOgepJu1NJt1ivXsbcE4D8ZRP3b97IzfX82ZQK', null, null, null, null, '2019-11-12 15:32:23', '2019-11-12 15:32:23');
INSERT INTO `clients` VALUES ('29', 'ali', 'ali@yahoo.com', '$2y$10$bB1dsfzLgCjCOjFt8RRcWeLB2BlNd8LvTCF5gBAz90LrteVQfFiUC', '/uploads/clients/2019-11-14/1573752050746.png', '01000146012', null, 'TbELdMWLafvp5MoxXijfVKGd93wgrf8rPo0JfJe0nK780braVljdaVVZgquQ', '2019-11-14 17:10:46', '2019-11-14 17:20:50');
INSERT INTO `clients` VALUES ('30', 'baher', 'baher692@gmail.com', '$2y$10$O6wuGtkAlwo9O7akBKg5euWpoHd9Mc8uZwosHjA.A8HQNmbBusrUW', null, '01012345678', null, null, '2019-12-22 09:29:25', '2019-12-22 09:29:25');
INSERT INTO `clients` VALUES ('31', 'ahmed', 'ahmed@ahmed.com', '$2y$10$D5qoilb3PNuFb7eHB3CNlee1B2J0OVmA8dJG0TVkAPuIHUtYbnOgi', null, '123456789', null, null, '2019-12-22 14:29:23', '2019-12-22 14:29:23');

-- ----------------------------
-- Table structure for `client_addresses`
-- ----------------------------
DROP TABLE IF EXISTS `client_addresses`;
CREATE TABLE `client_addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_addresses_city_id_foreign` (`city_id`),
  KEY `client_addresses_client_id_foreign` (`client_id`),
  CONSTRAINT `client_addresses_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `client_addresses_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of client_addresses
-- ----------------------------
INSERT INTO `client_addresses` VALUES ('37', '22 ahmed street', '', '19', '17', '2019-10-01 14:50:23', '2019-10-01 14:50:23');
INSERT INTO `client_addresses` VALUES ('44', '16 strret mahmoud samye', '', '5', '27', '2019-11-12 15:30:01', '2019-11-12 15:30:01');
INSERT INTO `client_addresses` VALUES ('47', 'الاقصر', '', '233', '17', '2019-11-14 17:31:26', '2019-11-14 17:31:26');
INSERT INTO `client_addresses` VALUES ('48', 'nasr', '', '18', '30', '2019-12-22 09:29:25', '2019-12-22 09:29:25');
INSERT INTO `client_addresses` VALUES ('49', 'dfdsf', '', '168', '31', '2019-12-22 14:29:23', '2019-12-22 14:29:23');

-- ----------------------------
-- Table structure for `client_rates`
-- ----------------------------
DROP TABLE IF EXISTS `client_rates`;
CREATE TABLE `client_rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `rate` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_rates_client_id_foreign` (`client_id`),
  KEY `client_rates_product_id_foreign` (`product_id`),
  CONSTRAINT `client_rates_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  CONSTRAINT `client_rates_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of client_rates
-- ----------------------------
INSERT INTO `client_rates` VALUES ('3', '2', 'منتج كويس', '1', '17', '31', '2019-10-14 13:06:26', '2019-10-14 13:08:05');
INSERT INTO `client_rates` VALUES ('6', '5', 'thanks for help', '1', '17', '2', '2019-11-13 12:12:55', '2019-11-13 13:01:14');

-- ----------------------------
-- Table structure for `contacts`
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `product_id` int(10) unsigned DEFAULT NULL,
  `city_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` char(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contacts_city_id_foreign` (`city_id`),
  KEY `contacts_product_id_foreign` (`product_id`),
  CONSTRAINT `contacts_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `contacts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('6', 'mh124404@gmail.com', '01128023501', 'شكرا لحضرتكم', null, null, null, null, '2019-09-25 19:02:17', '2019-09-25 19:02:17');
INSERT INTO `contacts` VALUES ('7', 'err@yy.cc', '132123132', 'dfgdf', null, null, null, null, '2019-09-26 10:47:58', '2019-09-26 10:47:58');
INSERT INTO `contacts` VALUES ('8', 'emad@ivas.com.eg', '01223872695', 'شكرا لكم', null, null, null, null, '2019-10-02 11:38:40', '2019-10-02 11:38:40');
INSERT INTO `contacts` VALUES ('9', 'emad@ivas.com.eg', '0122387265', 'test', null, null, null, null, '2019-10-02 17:55:01', '2019-10-02 17:55:01');
INSERT INTO `contacts` VALUES ('10', 'emad@ivas.com.eg', '01223872695', 'شركة رائعة جدااا', null, null, null, null, '2019-10-07 10:39:56', '2019-10-07 10:39:56');
INSERT INTO `contacts` VALUES ('11', 'ahmed333555777@gmail.com', '01223872695', null, '6', '190', 'عماد', 'ar', '2019-10-09 12:56:44', '2019-10-09 12:56:44');
INSERT INTO `contacts` VALUES ('12', 'emad@ivas.com.eg', '01223872695', 'a good product', null, null, null, null, '2019-10-14 12:00:33', '2019-10-14 12:00:33');
INSERT INTO `contacts` VALUES ('18', 'mohamed@yy.bb', '0112503264', 'Hello', null, null, null, null, '2019-11-13 08:46:36', '2019-11-13 08:46:36');
INSERT INTO `contacts` VALUES ('19', 'mohamed@yahoo.om', '0123565', null, '2', '5', 'mohamed', 'en', '2019-11-14 13:27:21', '2019-11-14 13:27:21');
INSERT INTO `contacts` VALUES ('20', 'mohamed@yahoo.om', '0123565', null, '2', '5', 'mohamed', 'en', '2019-11-14 13:56:58', '2019-11-14 13:56:58');
INSERT INTO `contacts` VALUES ('21', 'ahmed333555777@gmail.com', '01223872695', null, '2', '5', 'emad', 'en', '2019-11-14 13:57:59', '2019-11-14 13:57:59');

-- ----------------------------
-- Table structure for `countries`
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
INSERT INTO `countries` VALUES ('1', 'Egypt', '2019-02-11 13:12:04', '2019-02-11 13:12:04');
INSERT INTO `countries` VALUES ('2', 'KSA', '2019-02-11 13:12:10', '2019-02-11 13:12:10');

-- ----------------------------
-- Table structure for `coupons`
-- ----------------------------
DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `coupon` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `expire_date` date NOT NULL,
  `client_id` int(10) unsigned DEFAULT NULL,
  `used` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-unused , 1-reseve_to_specfic_client , 2-used',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coupons_client_id_foreign` (`client_id`),
  CONSTRAINT `coupons_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of coupons
-- ----------------------------
INSERT INTO `coupons` VALUES ('21', '020Y09kFrv', '100', '2019-10-08', '17', '2', '2019-10-07 10:45:35', '2019-10-07 10:48:54');
INSERT INTO `coupons` VALUES ('22', 'JjCCiE9CO4', '100', '2019-10-08', '17', '2', '2019-10-07 10:45:35', '2019-10-07 10:48:54');
INSERT INTO `coupons` VALUES ('25', 'rZ8ff4aogf', '100', '2019-10-08', '17', '2', '2019-10-07 10:45:35', '2019-11-14 16:23:33');
INSERT INTO `coupons` VALUES ('26', 'aBWYPMKixm', '100', '2019-11-15', null, '0', '2019-11-14 13:59:58', '2019-11-14 13:59:58');
INSERT INTO `coupons` VALUES ('27', 'tiiahlGyqz', '100', '2019-11-15', null, '0', '2019-11-14 13:59:58', '2019-11-14 13:59:58');
INSERT INTO `coupons` VALUES ('28', '8mfO08xB5G', '100', '2019-11-15', null, '0', '2019-11-14 13:59:58', '2019-11-14 13:59:58');
INSERT INTO `coupons` VALUES ('29', 'dk4hhFxxaR', '100', '2019-11-15', null, '0', '2019-11-14 13:59:58', '2019-11-14 13:59:58');
INSERT INTO `coupons` VALUES ('30', '4FvBGmrxSY', '100', '2019-11-15', null, '0', '2019-11-14 13:59:58', '2019-11-14 13:59:58');

-- ----------------------------
-- Table structure for `delete_all_flags`
-- ----------------------------
DROP TABLE IF EXISTS `delete_all_flags`;
CREATE TABLE `delete_all_flags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `delete_all_flags_route_id_foreign` (`route_id`),
  CONSTRAINT `delete_all_flags_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of delete_all_flags
-- ----------------------------

-- ----------------------------
-- Table structure for `governorates`
-- ----------------------------
DROP TABLE IF EXISTS `governorates`;
CREATE TABLE `governorates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `governorates_title_en_unique` (`title_en`),
  UNIQUE KEY `governorates_title_ar_unique` (`title_ar`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of governorates
-- ----------------------------
INSERT INTO `governorates` VALUES ('1', 'Cairo', 'القاهرة', null, null);
INSERT INTO `governorates` VALUES ('2', 'Giza', 'الجيزة', null, null);
INSERT INTO `governorates` VALUES ('3', 'Alexandria', 'الأسكندرية', null, null);
INSERT INTO `governorates` VALUES ('4', 'Dakahlia', 'الدقهلية', null, null);
INSERT INTO `governorates` VALUES ('5', 'Red Sea', 'البحر الأحمر', null, null);
INSERT INTO `governorates` VALUES ('6', 'Beheira', 'البحيرة', null, null);
INSERT INTO `governorates` VALUES ('7', 'Fayoum', 'الفيوم', null, null);
INSERT INTO `governorates` VALUES ('8', 'Gharbiya', 'الغربية', null, null);
INSERT INTO `governorates` VALUES ('9', 'Ismailia', 'الإسماعلية', null, null);
INSERT INTO `governorates` VALUES ('10', 'Monofia', 'المنوفية', null, null);
INSERT INTO `governorates` VALUES ('11', 'Minya', 'المنيا', null, null);
INSERT INTO `governorates` VALUES ('12', 'Qaliubiya', 'القليوبية', null, null);
INSERT INTO `governorates` VALUES ('13', 'New Valley', 'الوادي الجديد', null, null);
INSERT INTO `governorates` VALUES ('14', 'Suez', 'السويس', null, null);
INSERT INTO `governorates` VALUES ('15', 'Aswan', 'اسوان', null, null);
INSERT INTO `governorates` VALUES ('16', 'Assiut', 'اسيوط', null, null);
INSERT INTO `governorates` VALUES ('17', 'Beni Suef', 'بني سويف', null, null);
INSERT INTO `governorates` VALUES ('18', 'Port Said', 'بورسعيد', null, null);
INSERT INTO `governorates` VALUES ('19', 'Damietta', 'دمياط', null, null);
INSERT INTO `governorates` VALUES ('20', 'Sharkia', 'الشرقية', null, null);
INSERT INTO `governorates` VALUES ('21', 'South Sinai', 'جنوب سيناء', null, null);
INSERT INTO `governorates` VALUES ('22', 'Kafr Al sheikh', 'كفر الشيخ', null, null);
INSERT INTO `governorates` VALUES ('23', 'Matrouh', 'مطروح', null, null);
INSERT INTO `governorates` VALUES ('24', 'Luxor', 'الأقصر', null, null);
INSERT INTO `governorates` VALUES ('25', 'Qena', 'قنا', null, null);
INSERT INTO `governorates` VALUES ('26', 'North Sinai', 'شمال سيناء', null, null);
INSERT INTO `governorates` VALUES ('28', 'Sohag', 'سوهاج', '2019-09-23 14:16:32', '2019-09-23 14:16:32');
INSERT INTO `governorates` VALUES ('29', 'governate', 'محافظة', '2019-10-02 15:57:13', '2019-10-02 15:57:13');

-- ----------------------------
-- Table structure for `languages`
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rtl` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('3', 'English', '2019-09-09 11:24:31', '2019-09-09 12:10:10', 'en', '0');
INSERT INTO `languages` VALUES ('4', 'Arabic', '2019-09-09 11:24:45', '2019-09-15 13:29:32', 'ar', '1');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('60', '2017_08_01_141233_create_permission_tables', '1');
INSERT INTO `migrations` VALUES ('61', '2019_09_15_152252_create_brands_table', '1');
INSERT INTO `migrations` VALUES ('62', '2019_09_15_152252_create_carts_table', '1');
INSERT INTO `migrations` VALUES ('63', '2019_09_15_152252_create_categories_table', '1');
INSERT INTO `migrations` VALUES ('64', '2019_09_15_152252_create_cities_table', '1');
INSERT INTO `migrations` VALUES ('65', '2019_09_15_152252_create_client_addresses_table', '1');
INSERT INTO `migrations` VALUES ('66', '2019_09_15_152252_create_client_rates_table', '1');
INSERT INTO `migrations` VALUES ('67', '2019_09_15_152252_create_clients_table', '1');
INSERT INTO `migrations` VALUES ('68', '2019_09_15_152252_create_contacts_table', '1');
INSERT INTO `migrations` VALUES ('69', '2019_09_15_152252_create_countries_table', '1');
INSERT INTO `migrations` VALUES ('70', '2019_09_15_152252_create_delete_all_flags_table', '1');
INSERT INTO `migrations` VALUES ('71', '2019_09_15_152252_create_governorates_table', '1');
INSERT INTO `migrations` VALUES ('72', '2019_09_15_152252_create_languages_table', '1');
INSERT INTO `migrations` VALUES ('73', '2019_09_15_152252_create_operators_table', '1');
INSERT INTO `migrations` VALUES ('74', '2019_09_15_152252_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('75', '2019_09_15_152252_create_permissions_table', '1');
INSERT INTO `migrations` VALUES ('76', '2019_09_15_152252_create_posts_table', '1');
INSERT INTO `migrations` VALUES ('77', '2019_09_15_152252_create_product_images_table', '1');
INSERT INTO `migrations` VALUES ('78', '2019_09_15_152252_create_products_table', '1');
INSERT INTO `migrations` VALUES ('79', '2019_09_15_152252_create_relations_table', '1');
INSERT INTO `migrations` VALUES ('80', '2019_09_15_152252_create_role_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('81', '2019_09_15_152252_create_role_route_table', '1');
INSERT INTO `migrations` VALUES ('82', '2019_09_15_152252_create_roles_table', '1');
INSERT INTO `migrations` VALUES ('83', '2019_09_15_152252_create_routes_table', '1');
INSERT INTO `migrations` VALUES ('84', '2019_09_15_152252_create_scaffoldinterfaces_table', '1');
INSERT INTO `migrations` VALUES ('85', '2019_09_15_152252_create_settings_table', '1');
INSERT INTO `migrations` VALUES ('86', '2019_09_15_152252_create_static_bodies_table', '1');
INSERT INTO `migrations` VALUES ('87', '2019_09_15_152252_create_static_translations_table', '1');
INSERT INTO `migrations` VALUES ('88', '2019_09_15_152252_create_tans_bodies_table', '1');
INSERT INTO `migrations` VALUES ('89', '2019_09_15_152252_create_translatables_table', '1');
INSERT INTO `migrations` VALUES ('90', '2019_09_15_152252_create_types_table', '1');
INSERT INTO `migrations` VALUES ('91', '2019_09_15_152252_create_user_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('92', '2019_09_15_152252_create_user_has_roles_table', '1');
INSERT INTO `migrations` VALUES ('93', '2019_09_15_152252_create_users_table', '1');
INSERT INTO `migrations` VALUES ('94', '2019_09_15_152253_add_foreign_keys_to_carts_table', '1');
INSERT INTO `migrations` VALUES ('95', '2019_09_15_152253_add_foreign_keys_to_categories_table', '1');
INSERT INTO `migrations` VALUES ('96', '2019_09_15_152253_add_foreign_keys_to_cities_table', '1');
INSERT INTO `migrations` VALUES ('97', '2019_09_15_152253_add_foreign_keys_to_client_addresses_table', '1');
INSERT INTO `migrations` VALUES ('98', '2019_09_15_152253_add_foreign_keys_to_client_rates_table', '1');
INSERT INTO `migrations` VALUES ('99', '2019_09_15_152253_add_foreign_keys_to_delete_all_flags_table', '1');
INSERT INTO `migrations` VALUES ('100', '2019_09_15_152253_add_foreign_keys_to_operators_table', '1');
INSERT INTO `migrations` VALUES ('101', '2019_09_15_152253_add_foreign_keys_to_posts_table', '1');
INSERT INTO `migrations` VALUES ('102', '2019_09_15_152253_add_foreign_keys_to_product_images_table', '1');
INSERT INTO `migrations` VALUES ('103', '2019_09_15_152253_add_foreign_keys_to_products_table', '1');
INSERT INTO `migrations` VALUES ('104', '2019_09_15_152253_add_foreign_keys_to_relations_table', '1');
INSERT INTO `migrations` VALUES ('105', '2019_09_15_152253_add_foreign_keys_to_role_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('106', '2019_09_15_152253_add_foreign_keys_to_role_route_table', '1');
INSERT INTO `migrations` VALUES ('107', '2019_09_15_152253_add_foreign_keys_to_settings_table', '1');
INSERT INTO `migrations` VALUES ('108', '2019_09_15_152253_add_foreign_keys_to_static_bodies_table', '1');
INSERT INTO `migrations` VALUES ('109', '2019_09_15_152253_add_foreign_keys_to_tans_bodies_table', '1');
INSERT INTO `migrations` VALUES ('110', '2019_09_15_152253_add_foreign_keys_to_user_has_permissions_table', '1');
INSERT INTO `migrations` VALUES ('111', '2019_09_15_152253_add_foreign_keys_to_user_has_roles_table', '1');
INSERT INTO `migrations` VALUES ('112', '2019_09_17_101419_create_orders_table', '1');
INSERT INTO `migrations` VALUES ('113', '2019_09_17_101534_create_order_details_table', '1');
INSERT INTO `migrations` VALUES ('114', '2019_09_19_100701_create_notifications_table', '1');
INSERT INTO `migrations` VALUES ('115', '2019_09_23_142137_create_advertisements_table', '1');
INSERT INTO `migrations` VALUES ('116', '2019_09_23_143202_create_coupons_table', '1');
INSERT INTO `migrations` VALUES ('117', '2019_09_25_112823_add_colum_to_orders_table', '1');
INSERT INTO `migrations` VALUES ('118', '2019_09_25_113616_add_colum_to_products_table', '1');
INSERT INTO `migrations` VALUES ('119', '2019_10_02_171221_change_code_in_categories', '2');
INSERT INTO `migrations` VALUES ('120', '2019_10_02_220044_change_ads_url_in_advertisements', '2');
INSERT INTO `migrations` VALUES ('121', '2019_10_07_082555_add_colum_to_contact', '3');
INSERT INTO `migrations` VALUES ('122', '2016_06_01_000001_create_oauth_auth_codes_table', '4');
INSERT INTO `migrations` VALUES ('123', '2016_06_01_000002_create_oauth_access_tokens_table', '4');
INSERT INTO `migrations` VALUES ('124', '2016_06_01_000003_create_oauth_refresh_tokens_table', '4');
INSERT INTO `migrations` VALUES ('125', '2016_06_01_000004_create_oauth_clients_table', '4');
INSERT INTO `migrations` VALUES ('126', '2016_06_01_000005_create_oauth_personal_access_clients_table', '4');

-- ----------------------------
-- Table structure for `notifications`
-- ----------------------------
DROP TABLE IF EXISTS `notifications`;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `notifier_id` int(11) NOT NULL,
  `notified_id` int(11) NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 =not seen , 1 = seen ',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of notifications
-- ----------------------------
INSERT INTO `notifications` VALUES ('65', '17', '1', ' Make New order  #85 ', 'http://localhost:8080/aghezty_php7/order/85', '0', '2019-11-18 08:12:53', '2019-11-18 08:12:53');
INSERT INTO `notifications` VALUES ('66', '17', '1', ' Make New order  #86 ', 'http://localhost:8080/aghezty_php7/order/86', '0', '2019-11-18 08:21:57', '2019-11-18 08:21:57');
INSERT INTO `notifications` VALUES ('67', '30', '1', ' Make New order  #87 ', 'http://10.2.10.132:8080/aghezty_php7/order/87', '0', '2019-12-22 09:29:48', '2019-12-22 09:29:48');

-- ----------------------------
-- Table structure for `oauth_access_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_access_tokens
-- ----------------------------
INSERT INTO `oauth_access_tokens` VALUES ('04f206d7ed2f4ca5a4a5fcc72c121639cb6ab340ed9b6f7abb02169016ab1a712a6fbd50a779eba0', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:57:09', '2019-11-12 15:57:09', '2020-11-12 15:57:09');
INSERT INTO `oauth_access_tokens` VALUES ('11024c7588d490bf0f05b5906d34759ef631480775ef7fd125f56ffb683f09fdb464be99ab324b01', '17', '1', 'MyApp', '[]', '0', '2019-11-18 07:52:33', '2019-11-18 07:52:33', '2020-11-18 07:52:33');
INSERT INTO `oauth_access_tokens` VALUES ('2f1ea47d6caac147f95e6aeafcdba03f7f556da75c0993ad010156804cea3a400b24cdc97d1740fa', '17', '1', 'MyApp', '[]', '0', '2019-11-17 14:43:07', '2019-11-17 14:43:07', '2020-11-17 14:43:07');
INSERT INTO `oauth_access_tokens` VALUES ('3c72a5256055c8f1166a0cd0511137683bb359ee58ae23822e608d59193be553823af2898b2ca61a', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:57:02', '2019-11-12 15:57:02', '2020-11-12 15:57:02');
INSERT INTO `oauth_access_tokens` VALUES ('4d8997be3577fa724bd83788bced6c171cd4b8cd4ae8db8235f4ec4bee7dea71b3803a4e6be8ca8b', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:57:06', '2019-11-12 15:57:06', '2020-11-12 15:57:06');
INSERT INTO `oauth_access_tokens` VALUES ('569915d5ff0567879c64c1a6806d5efc770e6959c83dd704d3c940c8ac77986219616e872bb9904e', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:30:01', '2019-11-12 15:30:01', '2020-11-12 15:30:01');
INSERT INTO `oauth_access_tokens` VALUES ('59d426bb53e8f1ffd56a915551b7b7beffa0cf658909e8b958bcca0c589c92928e2b2ee6fa197ab9', '28', '1', 'MyApp', '[]', '0', '2019-11-12 15:32:23', '2019-11-12 15:32:23', '2020-11-12 15:32:23');
INSERT INTO `oauth_access_tokens` VALUES ('5add3358012d74389d6c2242bc80c5fdeea6ad625a42a5bcf27f53b9e34834939d001e625533c457', '17', '1', 'MyApp', '[]', '0', '2019-11-14 13:25:15', '2019-11-14 13:25:15', '2020-11-14 13:25:15');
INSERT INTO `oauth_access_tokens` VALUES ('5e1b622559c0bfa7f2244d5a92c602205a1656b135450f24438647c920214ddea618247bf400afb4', '29', '1', 'MyApp', '[]', '0', '2019-11-14 17:29:04', '2019-11-14 17:29:04', '2020-11-14 17:29:04');
INSERT INTO `oauth_access_tokens` VALUES ('5f14a9e864256692979abc7c7c6c223cf565b793c74f77636687f8db94f8a649fad44480abc1b387', '29', '1', 'MyApp', '[]', '0', '2019-11-14 17:10:46', '2019-11-14 17:10:46', '2020-11-14 17:10:46');
INSERT INTO `oauth_access_tokens` VALUES ('6055048879b3944be5baa686d7452cf5d9d48426beb0c5629f3ef4b8e1265cc50928b47136d5d978', '27', '1', 'MyApp', '[]', '0', '2019-11-12 16:02:13', '2019-11-12 16:02:13', '2020-11-12 16:02:13');
INSERT INTO `oauth_access_tokens` VALUES ('6bbf054645611f8e894eb2eb6a36ac4362d875789441aeba3ddfceb973a04676af33aafac983699d', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:57:05', '2019-11-12 15:57:05', '2020-11-12 15:57:05');
INSERT INTO `oauth_access_tokens` VALUES ('6e6c76ea6f522a76783aeba1be0b7e8efb18e3aa93e3f807eef941f59cbd997cb01e6a112c780f2a', '17', '1', 'MyApp', '[]', '0', '2019-11-14 17:21:33', '2019-11-14 17:21:33', '2020-11-14 17:21:33');
INSERT INTO `oauth_access_tokens` VALUES ('7f375698150393f07a09e6c1e2f30fb54f8f27976ac96b3dfc996f680f6357a0fb1cde604821ea28', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:56:49', '2019-11-12 15:56:49', '2020-11-12 15:56:49');
INSERT INTO `oauth_access_tokens` VALUES ('87f968c253f23dea5411300e36068ddc80df46b1b763e6edd1bf35a0a1277042c20a0990b5d31985', '29', '1', 'MyApp', '[]', '0', '2019-11-14 17:11:17', '2019-11-14 17:11:17', '2020-11-14 17:11:17');
INSERT INTO `oauth_access_tokens` VALUES ('94f68f5b59909531d63ba13c4a331385d499e6589f16cdf14a30e4d3e0039bbae733bafec6e9d30c', '17', '1', 'MyApp', '[]', '0', '2019-11-18 07:49:24', '2019-11-18 07:49:24', '2020-11-18 07:49:24');
INSERT INTO `oauth_access_tokens` VALUES ('98f1d97da470e71adb10ff48d7f018660a58df71d1acf524e2a036ba5ce584761de30eaa87fba8ab', '17', '1', 'MyApp', '[]', '0', '2019-11-13 08:47:46', '2019-11-13 08:47:46', '2020-11-13 08:47:46');
INSERT INTO `oauth_access_tokens` VALUES ('9e05bb8de9e1210c79ff8e7b67162c75d46a11a4881a4d32fcef9d4a09e6035e3bc663a1d726a620', '17', '1', 'MyApp', '[]', '0', '2019-11-14 17:29:49', '2019-11-14 17:29:49', '2020-11-14 17:29:49');
INSERT INTO `oauth_access_tokens` VALUES ('b254952e440945e60607e24d07770ba38829a28e4014affdc882534a3d1eead07d994ebf212de442', '26', '1', 'MyApp', '[]', '0', '2019-11-12 14:26:02', '2019-11-12 14:26:02', '2020-11-12 14:26:02');
INSERT INTO `oauth_access_tokens` VALUES ('b4cabed24daa943811fa588d78817823220f793ea67b611cb11100dd8c9071c56652939f9fd8630b', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:57:11', '2019-11-12 15:57:11', '2020-11-12 15:57:11');
INSERT INTO `oauth_access_tokens` VALUES ('b7b78ab26f07dc2af2b364faba867b1d586bb03809181b9b5a6e3fe0e2f719f0c1a1d3f500a392a0', '17', '1', 'MyApp', '[]', '0', '2019-11-14 17:59:53', '2019-11-14 17:59:53', '2020-11-14 17:59:53');
INSERT INTO `oauth_access_tokens` VALUES ('ccf3e9d681186056a0d7bd04136e69f023a6483707e37302fbf0288c022bce2eb448e4f5edc51ecc', '17', '1', 'MyApp', '[]', '0', '2019-11-17 14:08:51', '2019-11-17 14:08:51', '2020-11-17 14:08:51');
INSERT INTO `oauth_access_tokens` VALUES ('dad48594b1ffa2e2c8a0c4b5f42a847ca1c62515f0054ecfecfaa53f142454cdbc9d9436df929f34', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:56:46', '2019-11-12 15:56:46', '2020-11-12 15:56:46');
INSERT INTO `oauth_access_tokens` VALUES ('dbae50e6cae2908786b4a27e48506a27202c46b9c6cb2be1ffb2b5628cdd812b7d4335a90958a0fd', '27', '1', 'MyApp', '[]', '0', '2019-11-12 16:00:00', '2019-11-12 16:00:00', '2020-11-12 16:00:00');
INSERT INTO `oauth_access_tokens` VALUES ('e8dae832e9afe0b8a0e692fbb81addaeccd3607b57a9c659e8f69c0b3b7104c66043986313624de3', '27', '1', 'MyApp', '[]', '0', '2019-11-12 15:57:07', '2019-11-12 15:57:07', '2020-11-12 15:57:07');

-- ----------------------------
-- Table structure for `oauth_auth_codes`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_auth_codes
-- ----------------------------

-- ----------------------------
-- Table structure for `oauth_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE `oauth_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_clients
-- ----------------------------
INSERT INTO `oauth_clients` VALUES ('1', null, 'Laravel Personal Access Client', 'WpCe4pK6q9zVDvGwSypjeFcWyNzQejUmDdPF9I9f', 'http://localhost', '1', '0', '0', '2019-11-12 14:24:27', '2019-11-12 14:24:27');
INSERT INTO `oauth_clients` VALUES ('2', null, 'Laravel Password Grant Client', 'GfctALo5m8VQyiWcXtMkelPtmLluUzs1qQzuJUfd', 'http://localhost', '0', '1', '0', '2019-11-12 14:24:27', '2019-11-12 14:24:27');

-- ----------------------------
-- Table structure for `oauth_personal_access_clients`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_personal_access_clients
-- ----------------------------
INSERT INTO `oauth_personal_access_clients` VALUES ('1', '1', '2019-11-12 14:24:27', '2019-11-12 14:24:27');

-- ----------------------------
-- Table structure for `oauth_refresh_tokens`
-- ----------------------------
DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of oauth_refresh_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for `operators`
-- ----------------------------
DROP TABLE IF EXISTS `operators`;
CREATE TABLE `operators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rbt_sms_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rbt_ussd_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `operators_country_id_foreign` (`country_id`),
  CONSTRAINT `operators_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of operators
-- ----------------------------
INSERT INTO `operators` VALUES ('1', 'etisalat', '123', '1234', '1552552540477.png', '1', '2019-02-11 13:12:35', '2019-03-14 08:35:40');
INSERT INTO `operators` VALUES ('4', 'Vodafone', '123', '', '1552552433218.png', '1', '2019-02-11 15:23:49', '2019-03-14 08:33:53');
INSERT INTO `operators` VALUES ('5', 'Orange', '123456789', '123', '1552552570122.png', '1', '2019-03-14 08:36:10', '2019-03-14 08:36:10');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `shipping_amount` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=pending , 2=under shipping  , 3 = finished',
  `client_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `lang` char(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` tinyint(4) NOT NULL COMMENT '1-cash , 2-visa , 3-visa in cash',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_client_id_foreign` (`client_id`),
  KEY `orders_address_id_foreign` (`address_id`),
  CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `client_addresses` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('85', '50.00', '1946.00', '1', '17', '37', 'en', '1', '2019-11-18 08:12:48', '2019-11-18 08:12:48');
INSERT INTO `orders` VALUES ('86', '50.00', '4850.00', '1', '17', '37', 'en', '2', '2019-11-18 08:21:52', '2019-11-18 08:21:52');
INSERT INTO `orders` VALUES ('87', '50.00', '1140.00', '1', '30', '48', 'en', '1', '2019-12-22 09:29:42', '2019-12-22 09:29:42');

-- ----------------------------
-- Table structure for `order_details`
-- ----------------------------
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE `order_details` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_order_id_foreign` (`order_id`),
  KEY `order_details_product_id_foreign` (`product_id`),
  CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of order_details
-- ----------------------------
INSERT INTO `order_details` VALUES ('62', '2', '948.00', '1896.00', '85', '2', '2019-11-18 08:12:48', '2019-11-18 08:12:48');
INSERT INTO `order_details` VALUES ('63', '3', '1600.00', '4800.00', '86', '31', '2019-11-18 08:21:52', '2019-11-18 08:21:52');
INSERT INTO `order_details` VALUES ('64', '1', '90.00', '90.00', '87', '39', '2019-12-22 09:29:42', '2019-12-22 09:29:42');
INSERT INTO `order_details` VALUES ('65', '1', '1000.00', '1000.00', '87', '30', '2019-12-22 09:29:42', '2019-12-22 09:29:42');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `permissions`
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `published_date` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `operator_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_product_id_foreign` (`product_id`),
  KEY `posts_operator_id_foreign` (`operator_id`),
  KEY `posts_user_id_foreign` (`user_id`),
  CONSTRAINT `posts_operator_id_foreign` FOREIGN KEY (`operator_id`) REFERENCES `operators` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for `products`
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `price_after_discount` decimal(10,2) DEFAULT NULL,
  `special` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `category_id` int(10) unsigned NOT NULL,
  `brand_id` int(10) unsigned NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('2', 'Deep Freezer-Samsung-LLK 7S112 X EX', '/uploads/product/main_image/2019-09-26/1569499015783.png', '1200.00', '21', '948.00', '1', '1', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n	<tbody>\r\n		<tr height=\"35\" style=\"height:26.25pt\">\r\n			<td class=\"xl64\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">مسطح اريستون30سم - يحتوى على2عيون الكهربية -6 مستويات مختلفة للحرارة- اللون : استانلس ستيل</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'LLK 7S112 X EX', '9', '1', '0', '2019-09-10 06:39:19', '2019-11-13 13:08:07');
INSERT INTO `products` VALUES ('3', 'Deep Freezer-Samsung-LIC 3C26 F UK', '/uploads/product/main_image/2019-09-26/1569499088582.png', '14000.00', '12', '12320.00', '1', '1', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n<tbody>\r\n<tr height=\"35\" style=\"height:26.25pt\">\r\n<td class=\"xl66\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">مسطح اريستون90سم -4شعلات غاز-عين هالوجين بيضاوية -3شبكات من الاينمل-استانلس ستيل</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'LIC 3C26 F UK', '9', '1', '0', '2019-09-10 06:40:51', '2019-09-29 13:45:27');
INSERT INTO `products` VALUES ('4', 'fridge-LG-PHN 942 T/IX/A', '/uploads/product/main_image/2019-09-26/1569499107609.png', '1450.00', '0', '1450.00', '1', '1', '<p><span background-color:=\"\" open=\"\" style=\"color: rgb(57, 57, 57); font-family: \">The classic Cascade 220 Wool is the perfect combination of affordability, quality and versatility that can be used for a wide range of projects. Each hank of this worsted weight 100% pure wool comes with a generous 220 yards. With a nearly unlimited color palette to chose from, you are sure to find the perfect colo</span></p>', 'PHN 942 T/IX/A', '8', '2', '0', '2019-09-10 06:44:51', '2019-09-29 13:45:46');
INSERT INTO `products` VALUES ('5', 'fridge-Samsung-PK 951 T GH', '/uploads/product/main_image/2019-09-26/156949950167.png', '15000.00', '10', '13500.00', '1', '1', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n<tbody>\r\n<tr height=\"35\" style=\"height:26.25pt\">\r\n<td class=\"xl66\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">شفاط اريستون 60 سم- قوة الشفط : 385 م3/الساعة- 3سرعات للشفط -2فلاتر من الالمونيوم</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'PK 951 T GH', '8', '1', '15658', '2019-09-26 11:05:01', '2019-09-29 13:46:15');
INSERT INTO `products` VALUES ('6', 'fridge-Samsung-SL 16.1 (WH)', '/uploads/product/main_image/2019-09-26/1569499587140.png', '2000.00', '10', '1800.00', '1', '1', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n	<tbody>\r\n		<tr height=\"35\" style=\"height:26.25pt\">\r\n			<td class=\"xl66\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">شفاط اريستون 60سم بدون مدخنه - قوة الشفط : 460 م3/ الساعه-3سرعات-2لمبه هالوجين-2فلتر-سيلفر</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', 'SL 16.1 (WH)', '8', '1', '0', '2019-09-26 11:06:27', '2019-10-07 12:41:34');
INSERT INTO `products` VALUES ('7', 'Deep Freezer-LG-UA8 F1C X', '/uploads/product/main_image/2019-09-26/1569499956367.png', '15000.00', '25', '11250.00', '1', '1', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n<tbody>\r\n<tr height=\"35\" style=\"height:26.25pt\">\r\n<td class=\"xl66\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">ديب فريزر اريستون 7&nbsp; درج- تحكم الكتروني - نو فروست-اللون :سيلفر</td>\r\n</tr>\r\n</tbody>\r\n</table>', 'UA8 F1C X', '9', '2', '54', '2019-09-26 11:12:36', '2019-09-29 13:47:21');
INSERT INTO `products` VALUES ('8', 'Washing machines-Toshiba-LFC 2B19 X + MQ 100', '/uploads/product/main_image/2019-09-26/1569500172641.png', '1500.00', '5', '1425.00', '1', '1', '<p>Washing&nbsp;Washing&nbsp;Washing&nbsp;Washing&nbsp;Washing&nbsp;</p>', 'LFC 2B19 X + MQ 100', '10', '3', '5', '2019-09-26 11:16:12', '2019-09-29 13:48:18');
INSERT INTO `products` VALUES ('9', 'Washing machines-Samsung-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '/uploads/product/main_image/2019-09-26/156950038228.png', '1000.00', null, null, '1', '1', '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>', 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '10', '1', '5454', '2019-09-26 11:19:42', '2019-09-29 13:48:40');
INSERT INTO `products` VALUES ('10', 'screens-Toshiba-LFC 2B19 X + MQ 100', '/uploads/product/main_image/2019-09-26/1569500487194.png', '500.00', '1', '495.00', '1', '1', '<p>Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;</p>', 'LFC 2B19 X + MQ 100', '12', '3', '44', '2019-09-26 11:21:27', '2019-10-09 15:35:14');
INSERT INTO `products` VALUES ('11', 'screens-Samsung-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '/uploads/product/main_image/2019-09-26/1569500527306.png', '1000.00', '2', '980.00', '1', '1', '<p>Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;</p>', 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '12', '1', '545', '2019-09-26 11:22:07', '2019-10-02 12:42:10');
INSERT INTO `products` VALUES ('12', 'Receivers-LG-MD 554 IX A', '/uploads/product/main_image/2019-09-26/156950060117.png', '5000.00', '50', '2500.00', '1', '1', '<p>Settings Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;</p>', 'MD 554 IX A', '13', '2', '5445', '2019-09-26 11:23:21', '2019-09-29 13:49:27');
INSERT INTO `products` VALUES ('13', 'Receivers-Samsung-RPG 822 SS EX', '/uploads/product/main_image/2019-09-26/1569500643943.png', '2500.00', '35', '1625.00', '1', '1', '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>', 'RPG 822 SS EX', '13', '1', '16', '2019-09-26 11:24:03', '2019-10-02 17:53:01');
INSERT INTO `products` VALUES ('14', 'phones-Samsung-WMG 9437BS EX', '/uploads/product/main_image/2019-09-26/1569500946418.png', '20000.00', '18', '16400.00', '1', '1', '<p>IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;</p>', 'WMG 9437BS EX', '15', '1', '542', '2019-09-26 11:29:06', '2019-10-07 10:38:47');
INSERT INTO `products` VALUES ('15', 'phones-LG-LFP 4O23 WLT X', '/uploads/product/main_image/2019-09-26/1569501007131.png', '10000.00', '50', '5000.00', '1', '1', '<p>Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;</p>', 'LFP 4O23 WLT X', '15', '2', '4537', '2019-09-26 11:30:07', '2019-10-01 23:04:19');
INSERT INTO `products` VALUES ('16', 'telphone-Toshiba-PHN 961 TS/IX/A+FKYG X+SL 19.1P IX', '/uploads/product/main_image/2019-09-26/1569501083177.png', '1200.00', '12', '1056.00', '1', '1', '<p>Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;</p>', 'PHN 961 TS/IX/A+FKYG X+SL 19.1P IX', '16', '3', '145', '2019-09-26 11:31:23', '2019-09-29 13:50:30');
INSERT INTO `products` VALUES ('17', 'telphone-Samsung-UA8 F1C X', '/uploads/product/main_image/2019-09-26/1569501115996.png', '2500.00', '25', '1875.00', '1', '1', '<p>Samsung&nbsp;Samsung&nbsp;Samsung&nbsp;Samsung&nbsp;</p>', 'UA8 F1C X', '16', '1', '2109', '2019-09-26 11:31:55', '2019-10-02 11:51:27');
INSERT INTO `products` VALUES ('18', 'DISH WASHERS-Areston-LLK 7S112 X EX', '/uploads/product/main_image/2019-10-01/1569918967251.png', '1000.00', '10', '900.00', '1', '1', '<p>The Reston belt N-15 dish washer.</p>', 'LLK 7S112 X EX', '20', '4', '99', '2019-10-01 09:36:07', '2019-10-07 10:00:55');
INSERT INTO `products` VALUES ('20', 'DISH WASHERS-Areston-LIC 3B+26', '/uploads/product/main_image/2019-10-01/1569933217730.png', '11299.00', null, null, '0', '1', '<p>The Reston dishwasher plated that 14 individuals are 6 programs.</p>', 'LIC 3B+26', '20', '4', '99', '2019-10-01 13:33:37', '2019-10-01 15:11:14');
INSERT INTO `products` VALUES ('21', 'DISH WASHERS-Areston-XP-N160II', '/uploads/product/main_image/2019-10-01/1569933565183.png', '10000.00', '10', '9000.00', '1', '1', '<section style=\"box-sizing: border-box; margin-bottom: 30px; color: rgb(85, 85, 85); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<div class=\"osh-tabs -center\" style=\"box-sizing: border-box; text-align: center;\">\r\n<div class=\"tab-content -active\" id=\"product-details\" style=\"box-sizing: border-box; max-width: 710px; margin: 40px auto;\">\r\n<div class=\"list -features\" style=\"box-sizing: border-box; text-align: left; margin-bottom: 40px;\">\r\n<div class=\"title\" style=\"box-sizing: border-box; font-size: 16px; line-height: 20px; font-weight: 700; color: rgb(170, 170, 170); margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; text-transform: uppercase;\">KEY FEATURES</div>\r\n\r\n<ul style=\"box-sizing: border-box; margin: 0px; list-style: none; padding-right: 0px; padding-left: 0px;\">\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-left: 8px;\">&nbsp;160mm/s</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-left: 8px;\">USB</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-left: 8px;\">184 &times; 143 &times; 133 mm (L &times; W &times; H)</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-left: 8px;\">1.3Kg</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-left: 8px;\">The possibility of hanging the printer on the wall</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-left: 8px;\">Great design that saves you the empty space available</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-left: 8px;\">Printed paper width: 80 mm</li>\r\n</ul>\r\n\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px;\">\r\n</ol>\r\n\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px;\">\r\n</ol>\r\n\r\n<ol style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 8.5px;\">\r\n</ol>\r\n</div>\r\n\r\n<div class=\"osh-table -no-border\" style=\"box-sizing: border-box; border: none; display: table; width: 710px; color: rgb(96, 96, 96); text-align: left; table-layout: fixed; margin-top: 40px;\">\r\n<div class=\"caption\" style=\"box-sizing: border-box; display: table-caption; font-size: 16px; line-height: 20px; padding: 0px 0px 10px; font-weight: 700; color: rgb(170, 170, 170); text-transform: uppercase;\">GENERAL</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 20px 10px 0px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">SKU (config)</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">XP666EL10ZLR7NAFAMZ</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 20px 10px 0px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Model</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">XP-N160II</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 20px 10px 0px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Color</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">اسود</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 20px 10px 0px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Product Warranty</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">1 Year</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 20px 10px 0px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Production Country</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">China</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"osh-table -no-border\" style=\"box-sizing: border-box; border: none; display: table; width: 710px; color: rgb(96, 96, 96); text-align: left; table-layout: fixed; margin-top: 40px;\">\r\n<div class=\"caption\" style=\"box-sizing: border-box; display: table-caption; font-size: 16px; line-height: 20px; padding: 0px 0px 10px; font-weight: 700; color: rgb(170, 170, 170); text-transform: uppercase;\">DIMENSIONS</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 20px 10px 0px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Product Dimensions</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">184 &times; 143 &times; 133 مم</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', 'XP-N160II', '20', '4', '95', '2019-10-01 13:39:25', '2019-10-07 10:22:14');
INSERT INTO `products` VALUES ('25', 'DISH WASHERS-Areston-', '/uploads/product/2019-10-07/1570440696550.png', '1000.00', null, null, '0', '1', '<p>ttt</p>', null, '20', '4', '200', '2019-10-07 10:31:36', '2019-10-07 10:31:36');
INSERT INTO `products` VALUES ('26', 'DISH WASHERS-Samsung-abcsdsdsd', '/uploads/product/2019-10-07/1.png', '1000.00', null, '1000.00', '1', '1', 'product description 1', 'abcsdsdsd', '20', '1', '50', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `products` VALUES ('27', 'DISH WASHERS-Samsung-xyzsdd', '/uploads/product/2019-10-07/4.png', '2000.00', '20', '1600.00', '0', '1', 'product description 2', 'xyzsdd', '20', '1', '100', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `products` VALUES ('28', 'DISH WASHERS-Samsung-ddddd', '/uploads/product/2019-10-07/1570450155913.png', '1000.00', null, null, '0', '1', '<p>sdddd</p>', 'ddddd', '20', '1', '50', '2019-10-07 13:09:15', '2019-10-07 13:09:15');
INSERT INTO `products` VALUES ('29', 'DISH WASHERS-Samsung-fgfgf', '/uploads/product/2019-10-09/1570621090843.jpg', '0.00', null, '0.00', '0', '1', '<p>ddd</p>', 'fgfgf', '20', '1', '1000', '2019-10-09 12:38:10', '2019-10-28 17:49:37');
INSERT INTO `products` VALUES ('30', 'fridge-Samsung-abcsdsdsd', '/uploads/product/2019-10-09/1.png', '1000.00', null, '1000.00', '1', '1', 'product description 1', 'abcsdsdsd', '8', '1', '50', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `products` VALUES ('31', 'fridge-Samsung-xyzsdd', '/uploads/product/2019-10-09/4.png', '2000.00', '20', '1600.00', '0', '1', '<p>product description 2</p>', 'xyzsdd', '12', '2', '99', '2019-10-09 15:29:42', '2019-10-27 18:30:04');
INSERT INTO `products` VALUES ('32', 'DISH WASHERS-Samsung-t', '/uploads/product/2019-10-14/1571041607562.jpg', '100.00', '10', '90.00', '0', '1', '<p>ttrt</p>', 't', '20', '1', '100', '2019-10-14 09:26:47', '2019-10-14 09:26:47');
INSERT INTO `products` VALUES ('33', 'DISH WASHERS-Samsung-prodcut11111111111', '/uploads/product/2019-10-14/1571044741463.jpg', '1000.00', '20', '800.00', '1', '1', '<p>prodcut11111111111</p>', 'prodcut11111111111', '20', '1', '200', '2019-10-14 10:19:01', '2019-10-14 10:19:01');
INSERT INTO `products` VALUES ('34', 'DISH WASHERS-Samsung-sdd', '/uploads/product/2019-10-14/1571044017898.jpg', '1000.00', '10', '900.00', '0', '1', '<p>sddsd</p>', 'sdd', '20', '1', '100', '2019-10-14 10:06:57', '2019-10-14 10:06:57');
INSERT INTO `products` VALUES ('35', 'DISH WASHERS-Samsung-model en', '/uploads/product/2019-10-14/1571044947846.jpg', '1000.00', '10', '900.00', '0', '1', '<p>des&nbsp;en</p>', 'model en', '16', '5', '100', '2019-10-14 10:22:27', '2019-10-27 18:33:09');
INSERT INTO `products` VALUES ('36', 'telphone-Areston-abcsdsdsd', '/uploads/product/2019-10-14/1.png', '1000.00', null, '1000.00', '1', '1', '<p>product description 1</p>', 'abcsdsdsd', '16', '4', '50', '2019-10-14 11:53:24', '2019-10-27 19:06:36');
INSERT INTO `products` VALUES ('37', 'telphone-Areston-xyzsdd', '/uploads/product/2019-10-14/4.png', '2000.00', '20', '1600.00', '0', '1', '<p>product description 2</p>', 'xyzsdd', '10', '2', '100', '2019-10-14 11:53:24', '2019-10-27 18:29:34');
INSERT INTO `products` VALUES ('38', 'screens-test-dfdf', '/uploads/product/2019-10-27/1572200895509.png', '100.00', '10', '90.00', '0', '1', '<p>dfdfdfd</p>', 'dfdf', '12', '5', '100', '2019-10-27 18:28:15', '2019-10-27 18:56:54');
INSERT INTO `products` VALUES ('39', 'telphone-Areston-ddd', '/uploads/product/2019-10-28/1572284473795.jpg', '1000.00', '10', '90.00', '0', '1', '<p>sdddd</p>', 'ddd', '8', '2', '100', '2019-10-27 18:58:12', '2019-10-28 17:41:13');

-- ----------------------------
-- Table structure for `product_images`
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_images_product_id_foreign` (`product_id`),
  CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('25', '/uploads/product/images/2019-09-26/1569499088596.png', '3', '2019-09-26 10:58:08', '2019-09-26 10:58:08');
INSERT INTO `product_images` VALUES ('26', '/uploads/product/images/2019-09-26/1569499088390.png', '3', '2019-09-26 10:58:08', '2019-09-26 10:58:08');
INSERT INTO `product_images` VALUES ('27', '/uploads/product/images/2019-09-26/1569499088500.png', '3', '2019-09-26 10:58:08', '2019-09-26 10:58:08');
INSERT INTO `product_images` VALUES ('28', '/uploads/product/images/2019-09-26/1569499107102.png', '4', '2019-09-26 10:58:27', '2019-09-26 10:58:27');
INSERT INTO `product_images` VALUES ('29', '/uploads/product/images/2019-09-26/1569499107909.png', '4', '2019-09-26 10:58:27', '2019-09-26 10:58:27');
INSERT INTO `product_images` VALUES ('30', '/uploads/product/images/2019-09-26/1569499107245.png', '4', '2019-09-26 10:58:27', '2019-09-26 10:58:27');
INSERT INTO `product_images` VALUES ('31', '/uploads/product/images/2019-09-26/1569499501497.png', '5', '2019-09-26 11:05:02', '2019-09-26 11:05:02');
INSERT INTO `product_images` VALUES ('32', '/uploads/product/images/2019-09-26/1569499501135.png', '5', '2019-09-26 11:05:02', '2019-09-26 11:05:02');
INSERT INTO `product_images` VALUES ('33', '/uploads/product/images/2019-09-26/1569499501118.png', '5', '2019-09-26 11:05:02', '2019-09-26 11:05:02');
INSERT INTO `product_images` VALUES ('34', '/uploads/product/images/2019-09-26/1569499587261.png', '6', '2019-09-26 11:06:27', '2019-09-26 11:06:27');
INSERT INTO `product_images` VALUES ('35', '/uploads/product/images/2019-09-26/1569499587575.png', '6', '2019-09-26 11:06:27', '2019-09-26 11:06:27');
INSERT INTO `product_images` VALUES ('36', '/uploads/product/images/2019-09-26/1569499587511.png', '6', '2019-09-26 11:06:27', '2019-09-26 11:06:27');
INSERT INTO `product_images` VALUES ('37', '/uploads/product/images/2019-09-26/1569500172225.png', '8', '2019-09-26 11:16:13', '2019-09-26 11:16:13');
INSERT INTO `product_images` VALUES ('38', '/uploads/product/images/2019-09-26/1569500172226.png', '8', '2019-09-26 11:16:13', '2019-09-26 11:16:13');
INSERT INTO `product_images` VALUES ('39', '/uploads/product/images/2019-09-26/1569500172305.png', '8', '2019-09-26 11:16:13', '2019-09-26 11:16:13');
INSERT INTO `product_images` VALUES ('40', '/uploads/product/images/2019-09-26/1569500382419.png', '9', '2019-09-26 11:19:42', '2019-09-26 11:19:42');
INSERT INTO `product_images` VALUES ('41', '/uploads/product/images/2019-09-26/1569500382160.png', '9', '2019-09-26 11:19:42', '2019-09-26 11:19:42');
INSERT INTO `product_images` VALUES ('42', '/uploads/product/images/2019-09-26/1569500382715.png', '9', '2019-09-26 11:19:42', '2019-09-26 11:19:42');
INSERT INTO `product_images` VALUES ('43', '/uploads/product/images/2019-09-26/1569500487967.png', '10', '2019-09-26 11:21:28', '2019-09-26 11:21:28');
INSERT INTO `product_images` VALUES ('44', '/uploads/product/images/2019-09-26/1569500487577.png', '10', '2019-09-26 11:21:28', '2019-09-26 11:21:28');
INSERT INTO `product_images` VALUES ('45', '/uploads/product/images/2019-09-26/1569500487812.png', '10', '2019-09-26 11:21:28', '2019-09-26 11:21:28');
INSERT INTO `product_images` VALUES ('46', '/uploads/product/images/2019-09-26/1569500527723.png', '11', '2019-09-26 11:22:08', '2019-09-26 11:22:08');
INSERT INTO `product_images` VALUES ('47', '/uploads/product/images/2019-09-26/1569500527533.png', '11', '2019-09-26 11:22:08', '2019-09-26 11:22:08');
INSERT INTO `product_images` VALUES ('48', '/uploads/product/images/2019-09-26/1569500527939.png', '11', '2019-09-26 11:22:08', '2019-09-26 11:22:08');
INSERT INTO `product_images` VALUES ('49', '/uploads/product/images/2019-09-26/1569500601557.png', '12', '2019-09-26 11:23:22', '2019-09-26 11:23:22');
INSERT INTO `product_images` VALUES ('50', '/uploads/product/images/2019-09-26/156950060190.png', '12', '2019-09-26 11:23:22', '2019-09-26 11:23:22');
INSERT INTO `product_images` VALUES ('51', '/uploads/product/images/2019-09-26/1569500601209.png', '12', '2019-09-26 11:23:22', '2019-09-26 11:23:22');
INSERT INTO `product_images` VALUES ('52', '/uploads/product/images/2019-09-26/156950064354.png', '13', '2019-09-26 11:24:03', '2019-09-26 11:24:03');
INSERT INTO `product_images` VALUES ('53', '/uploads/product/images/2019-09-26/1569500643596.png', '13', '2019-09-26 11:24:03', '2019-09-26 11:24:03');
INSERT INTO `product_images` VALUES ('54', '/uploads/product/images/2019-09-26/1569500643245.png', '13', '2019-09-26 11:24:03', '2019-09-26 11:24:03');
INSERT INTO `product_images` VALUES ('55', '/uploads/product/images/2019-09-26/1569500946665.png', '14', '2019-09-26 11:29:07', '2019-09-26 11:29:07');
INSERT INTO `product_images` VALUES ('56', '/uploads/product/images/2019-09-26/1569500946612.png', '14', '2019-09-26 11:29:07', '2019-09-26 11:29:07');
INSERT INTO `product_images` VALUES ('57', '/uploads/product/images/2019-09-26/1569500946365.png', '14', '2019-09-26 11:29:07', '2019-09-26 11:29:07');
INSERT INTO `product_images` VALUES ('58', '/uploads/product/images/2019-09-26/1569501007144.png', '15', '2019-09-26 11:30:07', '2019-09-26 11:30:07');
INSERT INTO `product_images` VALUES ('59', '/uploads/product/images/2019-09-26/1569501007114.png', '15', '2019-09-26 11:30:08', '2019-09-26 11:30:08');
INSERT INTO `product_images` VALUES ('60', '/uploads/product/images/2019-09-26/1569501007826.png', '15', '2019-09-26 11:30:08', '2019-09-26 11:30:08');
INSERT INTO `product_images` VALUES ('61', '/uploads/product/images/2019-09-26/1569501083379.png', '16', '2019-09-26 11:31:23', '2019-09-26 11:31:23');
INSERT INTO `product_images` VALUES ('62', '/uploads/product/images/2019-09-26/1569501083873.png', '16', '2019-09-26 11:31:23', '2019-09-26 11:31:23');
INSERT INTO `product_images` VALUES ('63', '/uploads/product/images/2019-09-26/156950108344.png', '16', '2019-09-26 11:31:23', '2019-09-26 11:31:23');
INSERT INTO `product_images` VALUES ('64', '/uploads/product/images/2019-09-26/1569501115321.png', '17', '2019-09-26 11:31:56', '2019-09-26 11:31:56');
INSERT INTO `product_images` VALUES ('65', '/uploads/product/images/2019-09-26/1569501115525.png', '17', '2019-09-26 11:31:56', '2019-09-26 11:31:56');
INSERT INTO `product_images` VALUES ('66', '/uploads/product/images/2019-09-26/1569501115865.png', '17', '2019-09-26 11:31:56', '2019-09-26 11:31:56');
INSERT INTO `product_images` VALUES ('67', '/uploads/product/images/2019-10-01/1569933565721.png', '21', '2019-10-01 13:39:26', '2019-10-01 13:39:26');
INSERT INTO `product_images` VALUES ('76', '/uploads/product/2019-10-07/1570438589459.png', '18', '2019-10-07 09:56:29', '2019-10-07 09:56:29');
INSERT INTO `product_images` VALUES ('77', '/uploads/product/2019-10-07/157043858967.png', '18', '2019-10-07 09:56:29', '2019-10-07 09:56:29');
INSERT INTO `product_images` VALUES ('78', '/uploads/product/2019-10-07/2.png', '26', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `product_images` VALUES ('79', '/uploads/product/2019-10-07/3.png', '26', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `product_images` VALUES ('80', '/uploads/product/2019-10-07/5.png', '27', '2019-10-07 12:57:27', '2019-10-07 12:57:27');
INSERT INTO `product_images` VALUES ('81', '/uploads/product/2019-10-09/2.png', '30', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `product_images` VALUES ('82', '/uploads/product/2019-10-09/3.png', '30', '2019-10-09 15:29:42', '2019-10-09 15:29:42');
INSERT INTO `product_images` VALUES ('83', '/uploads/product/2019-10-09/5.png', '31', '2019-10-09 15:29:42', '2019-10-09 15:29:42');
INSERT INTO `product_images` VALUES ('84', '/uploads/product/2019-10-14/1571044741939.png', '33', '2019-10-14 10:19:02', '2019-10-14 10:19:02');
INSERT INTO `product_images` VALUES ('85', '/uploads/product/2019-10-14/1571044741993.jpeg', '33', '2019-10-14 10:19:02', '2019-10-14 10:19:02');
INSERT INTO `product_images` VALUES ('86', '/uploads/product/2019-10-14/2.png', '36', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `product_images` VALUES ('87', '/uploads/product/2019-10-14/3.png', '36', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `product_images` VALUES ('88', '/uploads/product/2019-10-14/5.png', '37', '2019-10-14 11:53:25', '2019-10-14 11:53:25');
INSERT INTO `product_images` VALUES ('94', '/uploads/product/2019-10-28/1572284408357.png', '39', '2019-10-28 17:40:09', '2019-10-28 17:40:09');
INSERT INTO `product_images` VALUES ('95', '/uploads/product/2019-10-28/157228440829.png', '39', '2019-10-28 17:40:09', '2019-10-28 17:40:09');
INSERT INTO `product_images` VALUES ('96', '/uploads/product/2019-10-28/1572284473963.png', '39', '2019-10-28 17:41:13', '2019-10-28 17:41:13');
INSERT INTO `product_images` VALUES ('97', '/uploads/product/2019-10-28/1572284977533.png', '29', '2019-10-28 17:49:37', '2019-10-28 17:49:37');

-- ----------------------------
-- Table structure for `relations`
-- ----------------------------
DROP TABLE IF EXISTS `relations`;
CREATE TABLE `relations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `scaffoldinterface_id` int(10) unsigned NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `having` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `relations_scaffoldinterface_id_foreign` (`scaffoldinterface_id`),
  CONSTRAINT `relations_scaffoldinterface_id_foreign` FOREIGN KEY (`scaffoldinterface_id`) REFERENCES `scaffoldinterfaces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of relations
-- ----------------------------

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'super_admin', '3', '2017-11-09 06:13:14', '2017-11-09 06:13:14');
INSERT INTO `roles` VALUES ('6', 'admin', '2', '2018-01-08 14:40:19', '2018-01-08 14:40:19');

-- ----------------------------
-- Table structure for `role_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `role_route`
-- ----------------------------
DROP TABLE IF EXISTS `role_route`;
CREATE TABLE `role_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `route_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_2` (`role_id`),
  KEY `route_id_2` (`route_id`),
  CONSTRAINT `role_route_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_route_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of role_route
-- ----------------------------

-- ----------------------------
-- Table structure for `routes`
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `method` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `function_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=243 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES ('2', 'get', 'setting/new', 'SettingController', '0000-00-00 00:00:00', '2018-02-05 13:39:21', 'create');
INSERT INTO `routes` VALUES ('3', 'post', 'setting', 'SettingController', '0000-00-00 00:00:00', '2018-02-05 13:39:21', 'store');
INSERT INTO `routes` VALUES ('4', 'get', 'dashboard', 'DashboardController', '0000-00-00 00:00:00', '2018-07-24 14:47:45', 'index');
INSERT INTO `routes` VALUES ('5', 'get', '/', 'DashboardController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'index');
INSERT INTO `routes` VALUES ('6', 'get', 'user_profile', 'UserController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'profile');
INSERT INTO `routes` VALUES ('7', 'post', 'user_profile/updatepassword', 'UserController', '0000-00-00 00:00:00', '2017-11-14 12:29:01', 'UpdatePassword');
INSERT INTO `routes` VALUES ('8', 'post', 'user_profile/updateprofilepic', 'UserController', '0000-00-00 00:00:00', '2017-11-14 12:29:08', 'UpdateProfilePicture');
INSERT INTO `routes` VALUES ('9', 'post', 'user_profile/updateuserdata', 'UserController', '0000-00-00 00:00:00', '2017-11-14 12:29:19', 'UpdateNameAndEmail');
INSERT INTO `routes` VALUES ('10', 'get', 'setting/{id}/delete', 'SettingController', '0000-00-00 00:00:00', '2018-02-05 13:39:22', 'destroy');
INSERT INTO `routes` VALUES ('11', 'get', 'setting/{id}/edit', 'SettingController', '0000-00-00 00:00:00', '2018-02-05 13:39:21', 'edit');
INSERT INTO `routes` VALUES ('12', 'post', 'setting/{id}', 'SettingController', '0000-00-00 00:00:00', '2018-02-05 13:56:27', 'update');
INSERT INTO `routes` VALUES ('14', 'get', 'static_translation', 'StaticTranslationController', '0000-00-00 00:00:00', '2017-11-14 12:29:57', 'index');
INSERT INTO `routes` VALUES ('21', 'get', 'file_manager', 'DashboardController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'file_manager');
INSERT INTO `routes` VALUES ('22', 'get', 'upload_items', 'DashboardController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'multi_upload');
INSERT INTO `routes` VALUES ('23', 'post', 'save_items', 'DashboardController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'save_uploaded');
INSERT INTO `routes` VALUES ('24', 'get', 'upload_resize', 'DashboardController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'upload_resize');
INSERT INTO `routes` VALUES ('25', 'post', 'save_image', 'DashboardController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'save_image');
INSERT INTO `routes` VALUES ('26', 'post', 'static_translation/{id}/update', 'StaticTranslationController', '0000-00-00 00:00:00', '2017-11-12 12:19:46', 'update');
INSERT INTO `routes` VALUES ('27', 'get', 'static_translation/{id}/delete', 'StaticTranslationController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'destroy');
INSERT INTO `routes` VALUES ('28', 'get', 'language/{id}/delete', 'LanguageController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'destroy');
INSERT INTO `routes` VALUES ('29', 'post', 'language/{id}/update', 'LanguageController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'update');
INSERT INTO `routes` VALUES ('30', 'get', 'roles', 'RoleController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'index');
INSERT INTO `routes` VALUES ('31', 'get', 'roles/new', 'RoleController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'create');
INSERT INTO `routes` VALUES ('32', 'post', 'roles', 'RoleController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'store');
INSERT INTO `routes` VALUES ('33', 'get', 'roles/{id}/delete', 'RoleController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'destroy');
INSERT INTO `routes` VALUES ('34', 'get', 'roles/{id}/edit', 'RoleController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'edit');
INSERT INTO `routes` VALUES ('35', 'post', 'roles/{id}/update', 'RoleController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'update');
INSERT INTO `routes` VALUES ('36', 'get', 'language', 'LanguageController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'index');
INSERT INTO `routes` VALUES ('37', 'get', 'language/create', 'LanguageController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'create');
INSERT INTO `routes` VALUES ('38', 'post', 'language', 'LanguageController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'store');
INSERT INTO `routes` VALUES ('39', 'get', 'language/{id}/edit', 'LanguageController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'edit');
INSERT INTO `routes` VALUES ('40', 'get', 'all_routes', 'RouteController', '0000-00-00 00:00:00', '2019-09-10 09:21:52', 'index');
INSERT INTO `routes` VALUES ('41', 'post', 'routes', 'RouteController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'store');
INSERT INTO `routes` VALUES ('42', 'get', 'routes/{id}/edit', 'RouteController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'edit');
INSERT INTO `routes` VALUES ('43', 'post', 'routes/{id}/update', 'RouteController', '0000-00-00 00:00:00', '2018-01-28 09:25:29', 'update');
INSERT INTO `routes` VALUES ('44', 'get', 'routes/{id}/delete', 'RouteController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'destroy');
INSERT INTO `routes` VALUES ('45', 'get', 'routes/create', 'RouteController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'create');
INSERT INTO `routes` VALUES ('57', 'get', 'routes/index_v2', 'RouteController', '2017-11-12 13:45:15', '2017-11-12 14:04:53', 'index_v2');
INSERT INTO `routes` VALUES ('58', 'get', 'roles/{id}/view_access', 'RoleController', '2017-11-14 10:56:14', '2017-11-15 08:14:14', 'view_access');
INSERT INTO `routes` VALUES ('59', 'get', 'types/index', 'TypeController', '2018-01-28 08:25:37', '2018-01-28 08:25:37', 'index');
INSERT INTO `routes` VALUES ('60', 'get', 'types/create', 'TypeController', '2018-01-28 08:25:37', '2018-01-28 08:25:37', 'create');
INSERT INTO `routes` VALUES ('61', 'post', 'types', 'TypeController', '2018-01-28 08:25:38', '2018-01-28 08:25:38', 'store');
INSERT INTO `routes` VALUES ('62', 'get', 'types/{id}/edit', 'TypeController', '2018-01-28 08:25:38', '2018-01-28 08:25:38', 'edit');
INSERT INTO `routes` VALUES ('63', 'patch', 'types/{id}', 'TypeController', '2018-01-28 08:25:38', '2018-01-28 08:25:38', 'update');
INSERT INTO `routes` VALUES ('64', 'get', 'types/{id}/delete', 'TypeController', '2018-01-28 08:25:38', '2018-01-28 08:25:38', 'destroy');
INSERT INTO `routes` VALUES ('65', 'post', 'sortabledatatable', 'SettingController', '2018-01-28 09:22:00', '2018-01-28 09:22:00', 'updateOrder');
INSERT INTO `routes` VALUES ('66', 'get', 'buildroutes', 'RouteController', '2018-01-28 09:23:55', '2018-01-28 09:23:55', 'buildroutes');
INSERT INTO `routes` VALUES ('69', 'get', 'delete_all', 'DashboardController', '2018-02-04 12:01:23', '2018-02-04 12:01:23', 'delete_all_index');
INSERT INTO `routes` VALUES ('70', 'post', 'delete_all', 'DashboardController', '2018-02-04 12:01:23', '2018-02-04 12:01:23', 'delete_all_store');
INSERT INTO `routes` VALUES ('71', 'get', 'upload_resize_v2', 'DashboardController', '2018-02-04 13:02:56', '2018-02-04 13:02:56', 'upload_resize_v2');
INSERT INTO `routes` VALUES ('72', 'post', 'sortabledatatable', 'UserController', '2018-02-05 13:39:22', '2018-02-05 13:39:22', 'updateOrder');
INSERT INTO `routes` VALUES ('79', 'get', 'setting', 'SettingController', '2018-02-05 14:10:10', '2018-02-05 14:10:10', 'index');
INSERT INTO `routes` VALUES ('80', 'get', 'users', 'UserController', '2018-05-31 10:42:21', '2018-05-31 10:42:21', 'index');
INSERT INTO `routes` VALUES ('81', 'get', 'users/new', 'UserController', '2018-05-31 10:42:21', '2018-05-31 10:42:21', 'create');
INSERT INTO `routes` VALUES ('82', 'post', 'users', 'UserController', '2018-05-31 10:42:21', '2018-05-31 10:42:21', 'store');
INSERT INTO `routes` VALUES ('83', 'get', 'users/{id}/edit', 'UserController', '2018-05-31 10:42:21', '2018-05-31 10:42:21', 'edit');
INSERT INTO `routes` VALUES ('84', 'post', 'users/{id}/update', 'UserController', '2018-05-31 10:42:21', '2018-05-31 10:42:21', 'update');
INSERT INTO `routes` VALUES ('106', 'get', 'country', 'CountryController', '2019-02-10 08:09:36', '2019-02-10 08:09:36', 'index');
INSERT INTO `routes` VALUES ('107', 'get', 'country/create', 'CountryController', '2019-02-10 08:09:36', '2019-02-10 08:09:36', 'create');
INSERT INTO `routes` VALUES ('108', 'post', 'country', 'CountryController', '2019-02-10 08:09:36', '2019-02-10 08:09:36', 'store');
INSERT INTO `routes` VALUES ('109', 'get', 'country/{id}', 'CountryController', '2019-02-10 08:09:36', '2019-02-10 08:09:36', 'show');
INSERT INTO `routes` VALUES ('110', 'get', 'country/{id}/edit', 'CountryController', '2019-02-10 08:09:37', '2019-02-10 08:09:37', 'edit');
INSERT INTO `routes` VALUES ('111', 'patch', 'country/{id}', 'CountryController', '2019-02-10 08:09:37', '2019-02-10 08:10:42', 'update');
INSERT INTO `routes` VALUES ('112', 'get', 'country/{id}/delete', 'CountryController', '2019-02-10 08:09:37', '2019-02-10 08:09:37', 'delete');
INSERT INTO `routes` VALUES ('113', 'get', 'operator', 'OperatorController', '2019-02-10 08:10:27', '2019-02-10 08:10:27', 'index');
INSERT INTO `routes` VALUES ('114', 'get', 'operator/create', 'OperatorController', '2019-02-10 08:10:27', '2019-02-10 08:10:27', 'create');
INSERT INTO `routes` VALUES ('115', 'post', 'operator', 'OperatorController', '2019-02-10 08:10:27', '2019-02-10 08:10:27', 'store');
INSERT INTO `routes` VALUES ('116', 'get', 'operator/{id}', 'OperatorController', '2019-02-10 08:10:27', '2019-02-10 08:10:27', 'show');
INSERT INTO `routes` VALUES ('117', 'get', 'operator/{id}/edit', 'OperatorController', '2019-02-10 08:10:27', '2019-02-10 08:10:27', 'edit');
INSERT INTO `routes` VALUES ('118', 'patch', 'operator/{id}', 'OperatorController', '2019-02-10 08:10:27', '2019-02-10 08:10:27', 'update');
INSERT INTO `routes` VALUES ('119', 'get', 'operator/{id}/delete', 'OperatorController', '2019-02-10 08:10:27', '2019-02-10 08:10:27', 'destroy');
INSERT INTO `routes` VALUES ('120', 'get', 'category', 'CategoryController', '2019-02-14 13:01:13', '2019-02-14 13:01:13', 'index');
INSERT INTO `routes` VALUES ('121', 'get', 'category/create', 'CategoryController', '2019-02-14 13:01:13', '2019-02-14 13:01:13', 'create');
INSERT INTO `routes` VALUES ('122', 'post', 'category', 'CategoryController', '2019-02-14 13:01:13', '2019-02-14 13:01:13', 'store');
INSERT INTO `routes` VALUES ('123', 'get', 'category/{id}', 'CategoryController', '2019-02-14 13:01:13', '2019-02-14 13:01:13', 'show');
INSERT INTO `routes` VALUES ('124', 'get', 'category/{id}/edit', 'CategoryController', '2019-02-14 13:01:13', '2019-02-14 13:01:13', 'edit');
INSERT INTO `routes` VALUES ('125', 'patch', 'category/{id}', 'CategoryController', '2019-02-14 13:01:13', '2019-02-14 13:01:13', 'update');
INSERT INTO `routes` VALUES ('126', 'get', 'category/{id}/delete', 'CategoryController', '2019-02-14 13:01:13', '2019-02-14 13:01:13', 'destroy');
INSERT INTO `routes` VALUES ('127', 'get', 'content_type', 'ContentTypeController', '2019-02-14 13:02:21', '2019-02-14 13:02:21', 'index');
INSERT INTO `routes` VALUES ('128', 'get', 'content_type/create', 'ContentTypeController', '2019-02-14 13:02:21', '2019-02-14 13:02:21', 'create');
INSERT INTO `routes` VALUES ('129', 'post', 'content_type', 'ContentTypeController', '2019-02-14 13:02:21', '2019-02-14 13:02:21', 'store');
INSERT INTO `routes` VALUES ('130', 'get', 'content_type/{id}', 'ContentTypeController', '2019-02-14 13:02:21', '2019-02-14 13:02:21', 'show');
INSERT INTO `routes` VALUES ('131', 'get', 'content_type/{id}/edit', 'ContentTypeController', '2019-02-14 13:02:22', '2019-02-14 13:02:22', 'edit');
INSERT INTO `routes` VALUES ('132', 'patch', 'content_type/{id}', 'ContentTypeController', '2019-02-14 13:02:22', '2019-02-14 13:02:22', 'update');
INSERT INTO `routes` VALUES ('133', 'get', 'content_type/{id}/delete', 'ContentTypeController', '2019-02-14 13:02:22', '2019-02-14 13:02:22', 'destroy');
INSERT INTO `routes` VALUES ('134', 'get', 'content', 'ContentController', '2019-02-14 13:03:26', '2019-02-14 13:03:26', 'index');
INSERT INTO `routes` VALUES ('135', 'get', 'content/create', 'ContentController', '2019-02-14 13:03:26', '2019-02-14 13:03:26', 'create');
INSERT INTO `routes` VALUES ('136', 'post', 'content', 'ContentController', '2019-02-14 13:03:26', '2019-02-14 13:03:26', 'store');
INSERT INTO `routes` VALUES ('137', 'get', 'content/{id}', 'ContentController', '2019-02-14 13:03:26', '2019-02-14 13:03:26', 'show');
INSERT INTO `routes` VALUES ('138', 'get', 'content/{id}/edit', 'ContentController', '2019-02-14 13:03:26', '2019-02-14 13:03:26', 'edit');
INSERT INTO `routes` VALUES ('139', 'patch', 'content/{id}', 'ContentController', '2019-02-14 13:03:26', '2019-02-14 13:03:26', 'update');
INSERT INTO `routes` VALUES ('140', 'get', 'content/{id}/delete', 'ContentController', '2019-02-14 13:03:26', '2019-02-14 13:03:26', 'destroy');
INSERT INTO `routes` VALUES ('141', 'get', 'post', 'PostController', '2019-02-14 13:04:09', '2019-02-14 13:04:09', 'index');
INSERT INTO `routes` VALUES ('142', 'get', 'post/create', 'PostController', '2019-02-14 13:04:09', '2019-02-14 13:04:09', 'create');
INSERT INTO `routes` VALUES ('143', 'post', 'post', 'PostController', '2019-02-14 13:04:09', '2019-02-14 13:04:09', 'store');
INSERT INTO `routes` VALUES ('144', 'get', 'post/{id}', 'PostController', '2019-02-14 13:04:09', '2019-02-14 13:04:09', 'show');
INSERT INTO `routes` VALUES ('145', 'get', 'post/{id}/edit', 'PostController', '2019-02-14 13:04:09', '2019-02-14 13:04:09', 'edit');
INSERT INTO `routes` VALUES ('146', 'patch', 'post/{id}', 'PostController', '2019-02-14 13:04:09', '2019-02-14 13:04:09', 'update');
INSERT INTO `routes` VALUES ('147', 'get', 'post/{id}/delete', 'PostController', '2019-02-14 13:04:09', '2019-02-14 13:04:09', 'destroy');
INSERT INTO `routes` VALUES ('148', 'get', 'sub_category', 'SubCategoryController', '2019-03-06 09:00:28', '2019-03-06 09:00:28', 'index');
INSERT INTO `routes` VALUES ('149', 'get', 'sub_category/create', 'SubCategoryController', '2019-03-06 09:00:28', '2019-03-06 09:00:28', 'create');
INSERT INTO `routes` VALUES ('150', 'post', 'sub_category', 'SubCategoryController', '2019-03-06 09:00:28', '2019-03-06 09:00:28', 'store');
INSERT INTO `routes` VALUES ('151', 'get', 'sub_category/{id}', 'SubCategoryController', '2019-03-06 09:00:28', '2019-03-06 09:00:28', 'show');
INSERT INTO `routes` VALUES ('152', 'get', 'sub_category/{id}/edit', 'SubCategoryController', '2019-03-06 09:00:28', '2019-03-06 09:00:28', 'edit');
INSERT INTO `routes` VALUES ('153', 'patch', 'sub_category/{id}', 'SubCategoryController', '2019-03-06 09:00:28', '2019-03-06 09:00:28', 'update');
INSERT INTO `routes` VALUES ('154', 'get', 'sub_category/{id}/delete', 'SubCategoryController', '2019-03-06 09:00:28', '2019-03-06 09:00:28', 'destroy');
INSERT INTO `routes` VALUES ('155', 'get', 'rbt', 'RbtController', '2019-03-14 08:51:14', '2019-03-14 08:51:14', 'index');
INSERT INTO `routes` VALUES ('156', 'get', 'rbt/create', 'RbtController', '2019-03-14 08:51:14', '2019-03-14 08:51:14', 'create');
INSERT INTO `routes` VALUES ('157', 'post', 'rbt', 'RbtController', '2019-03-14 08:51:15', '2019-03-14 08:51:15', 'store');
INSERT INTO `routes` VALUES ('158', 'get', 'rbt/{id}', 'RbtController', '2019-03-14 08:51:15', '2019-03-14 08:51:15', 'show');
INSERT INTO `routes` VALUES ('159', 'get', 'rbt/{id}/edit', 'RbtController', '2019-03-14 08:51:15', '2019-03-14 08:51:15', 'edit');
INSERT INTO `routes` VALUES ('160', 'patch', 'rbt/{id}', 'RbtController', '2019-03-14 08:51:15', '2019-03-14 08:51:15', 'update');
INSERT INTO `routes` VALUES ('161', 'get', 'rbt/{id}/delete', 'RbtController', '2019-03-14 08:51:15', '2019-03-14 08:51:15', 'destroy');
INSERT INTO `routes` VALUES ('181', 'get', 'brand', 'BrandController', '2019-09-10 08:20:04', '2019-09-10 08:20:04', 'index');
INSERT INTO `routes` VALUES ('182', 'get', 'brand/create', 'BrandController', '2019-09-10 08:20:04', '2019-09-10 08:20:04', 'create');
INSERT INTO `routes` VALUES ('183', 'post', 'brand', 'BrandController', '2019-09-10 08:20:04', '2019-09-10 08:20:04', 'store');
INSERT INTO `routes` VALUES ('184', 'get', 'brand/{id}', 'BrandController', '2019-09-10 08:20:04', '2019-09-10 08:20:04', 'show');
INSERT INTO `routes` VALUES ('185', 'get', 'brand/{id}/edit', 'BrandController', '2019-09-10 08:20:04', '2019-09-10 08:20:04', 'edit');
INSERT INTO `routes` VALUES ('186', 'patch', 'brand/{id}', 'BrandController', '2019-09-10 08:20:04', '2019-09-10 08:20:04', 'update');
INSERT INTO `routes` VALUES ('187', 'get', 'brand/{id}/delete', 'BrandController', '2019-09-10 08:20:04', '2019-09-10 08:20:04', 'destroy');
INSERT INTO `routes` VALUES ('188', 'get', 'client', 'ClientController', '2019-09-10 08:20:58', '2019-09-10 08:20:58', 'index');
INSERT INTO `routes` VALUES ('189', 'get', 'address', 'ClientAddressController', '2019-09-10 08:21:09', '2019-09-10 08:21:09', 'index');
INSERT INTO `routes` VALUES ('190', 'get', 'rate', 'ClientRateController', '2019-09-10 08:22:07', '2019-09-10 08:22:07', 'index');
INSERT INTO `routes` VALUES ('191', 'get', 'rate/publish/{id}', 'ClientRateController', '2019-09-10 08:22:07', '2019-09-10 08:22:07', 'update_rate');
INSERT INTO `routes` VALUES ('192', 'get', 'product', 'ProductController', '2019-09-10 08:22:48', '2019-09-10 08:22:48', 'index');
INSERT INTO `routes` VALUES ('193', 'get', 'product/create', 'ProductController', '2019-09-10 08:22:48', '2019-09-10 08:22:48', 'create');
INSERT INTO `routes` VALUES ('194', 'post', 'product', 'ProductController', '2019-09-10 08:22:48', '2019-09-10 08:22:48', 'store');
INSERT INTO `routes` VALUES ('195', 'get', 'product/{id}', 'ProductController', '2019-09-10 08:22:48', '2019-09-10 08:22:48', 'show');
INSERT INTO `routes` VALUES ('196', 'get', 'product/{id}/edit', 'ProductController', '2019-09-10 08:22:48', '2019-09-10 08:22:48', 'edit');
INSERT INTO `routes` VALUES ('197', 'patch', 'product/{id}', 'ProductController', '2019-09-10 08:22:48', '2019-09-10 08:22:48', 'update');
INSERT INTO `routes` VALUES ('198', 'get', 'product/{id}/delete', 'ProductController', '2019-09-10 08:22:49', '2019-09-10 08:22:49', 'destroy');
INSERT INTO `routes` VALUES ('199', 'get', 'delete_image/{id}', 'ProductController', '2019-09-10 08:22:49', '2019-09-10 08:22:49', 'delete_image');
INSERT INTO `routes` VALUES ('200', 'get', 'contact', 'ContactController', '2019-09-10 14:24:01', '2019-09-10 14:24:01', 'index');
INSERT INTO `routes` VALUES ('201', 'get', 'contact/{id}/delete', 'ContactController', '2019-09-10 14:24:01', '2019-09-10 14:24:01', 'destroy');
INSERT INTO `routes` VALUES ('202', 'get', 'order', 'OrderController', '2019-09-17 15:20:39', '2019-09-17 15:20:39', 'index');
INSERT INTO `routes` VALUES ('203', 'get', 'order/{id}', 'OrderController', '2019-09-17 15:20:39', '2019-09-17 15:20:39', 'show');
INSERT INTO `routes` VALUES ('204', 'get', 'order/{id}/delete', 'OrderController', '2019-09-17 15:20:39', '2019-09-17 15:20:39', 'delete');
INSERT INTO `routes` VALUES ('205', 'get', 'delete_order', 'OrderController', '2019-09-19 10:22:38', '2019-09-19 10:28:43', 'delete_product');
INSERT INTO `routes` VALUES ('206', 'get', 'governorate', 'GovernorateController', '2019-09-23 14:13:06', '2019-09-23 14:13:06', 'index');
INSERT INTO `routes` VALUES ('207', 'get', 'governorate/create', 'GovernorateController', '2019-09-23 14:13:07', '2019-09-23 14:13:07', 'create');
INSERT INTO `routes` VALUES ('208', 'post', 'governorate', 'GovernorateController', '2019-09-23 14:13:07', '2019-09-23 14:13:07', 'store');
INSERT INTO `routes` VALUES ('209', 'get', 'governorate/{id}', 'GovernorateController', '2019-09-23 14:13:07', '2019-09-23 14:13:07', 'show');
INSERT INTO `routes` VALUES ('210', 'get', 'governorate/{id}/edit', 'GovernorateController', '2019-09-23 14:13:07', '2019-09-23 14:13:07', 'edit');
INSERT INTO `routes` VALUES ('211', 'patch', 'governorate/{id}', 'GovernorateController', '2019-09-23 14:13:07', '2019-09-23 14:13:07', 'update');
INSERT INTO `routes` VALUES ('212', 'get', 'governorate/{id}/delete', 'GovernorateController', '2019-09-23 14:13:07', '2019-09-23 14:13:07', 'delete');
INSERT INTO `routes` VALUES ('213', 'get', 'city', 'CityController', '2019-09-23 14:46:04', '2019-09-23 14:46:04', 'index');
INSERT INTO `routes` VALUES ('214', 'get', 'city/create', 'CityController', '2019-09-23 14:46:04', '2019-09-23 14:46:04', 'create');
INSERT INTO `routes` VALUES ('215', 'post', 'city', 'CityController', '2019-09-23 14:46:05', '2019-09-23 14:46:05', 'store');
INSERT INTO `routes` VALUES ('216', 'get', 'city/{id}', 'CityController', '2019-09-23 14:46:05', '2019-09-23 14:46:05', 'show');
INSERT INTO `routes` VALUES ('217', 'get', 'city/{id}/edit', 'CityController', '2019-09-23 14:46:05', '2019-09-23 14:46:05', 'edit');
INSERT INTO `routes` VALUES ('218', 'patch', 'city/{id}', 'CityController', '2019-09-23 14:46:05', '2019-09-23 14:46:05', 'update');
INSERT INTO `routes` VALUES ('219', 'get', 'city/{id}/delete', 'CityController', '2019-09-23 14:46:05', '2019-09-23 14:46:05', 'delete');
INSERT INTO `routes` VALUES ('220', 'get', 'advertisement', 'AdvertisementController', '2019-09-23 15:32:26', '2019-09-23 15:32:26', 'index');
INSERT INTO `routes` VALUES ('221', 'get', 'advertisement/create', 'AdvertisementController', '2019-09-23 15:32:27', '2019-09-23 15:32:27', 'create');
INSERT INTO `routes` VALUES ('222', 'post', 'advertisement', 'AdvertisementController', '2019-09-23 15:32:27', '2019-09-23 15:32:27', 'store');
INSERT INTO `routes` VALUES ('223', 'get', 'advertisement/{id}', 'AdvertisementController', '2019-09-23 15:32:27', '2019-09-23 15:32:27', 'show');
INSERT INTO `routes` VALUES ('224', 'get', 'advertisement/{id}/edit', 'AdvertisementController', '2019-09-23 15:32:27', '2019-09-23 15:32:27', 'edit');
INSERT INTO `routes` VALUES ('225', 'patch', 'advertisement/{id}', 'AdvertisementController', '2019-09-23 15:32:27', '2019-09-23 15:32:27', 'update');
INSERT INTO `routes` VALUES ('226', 'get', 'advertisement/{id}/delete', 'AdvertisementController', '2019-09-23 15:32:27', '2019-09-23 15:32:27', 'delete');
INSERT INTO `routes` VALUES ('227', 'get', 'coupon', 'CouponController', '2019-09-23 15:45:14', '2019-09-23 15:45:14', 'index');
INSERT INTO `routes` VALUES ('228', 'get', 'coupon/create', 'CouponController', '2019-09-23 15:45:14', '2019-09-23 15:45:14', 'create');
INSERT INTO `routes` VALUES ('229', 'get', 'coupon/{id}', 'CouponController', '2019-09-23 15:45:14', '2019-09-23 15:45:14', 'show');
INSERT INTO `routes` VALUES ('230', 'get', 'coupon/{id}/edit', 'CouponController', '2019-09-23 15:45:14', '2019-09-23 15:45:14', 'edit');
INSERT INTO `routes` VALUES ('231', 'post', 'coupon/{id}', 'CouponController', '2019-09-23 15:45:14', '2019-09-23 15:45:14', 'update');
INSERT INTO `routes` VALUES ('232', 'get', 'coupon/{id}/delete', 'CouponController', '2019-09-23 15:45:14', '2019-09-23 15:45:14', 'destroy');
INSERT INTO `routes` VALUES ('233', 'post', 'coupon', 'CouponController', '2019-09-23 15:45:48', '2019-09-23 15:45:48', 'store');
INSERT INTO `routes` VALUES ('234', 'post', 'orders/update_status', 'OrderController', '2019-09-24 17:52:26', '2019-09-24 17:52:26', 'update_status');
INSERT INTO `routes` VALUES ('235', 'get', 'client/{id}/delete', 'ClientController', '2019-09-25 18:39:04', '2019-09-25 18:39:04', 'destroy');
INSERT INTO `routes` VALUES ('236', 'get', 'setting/address', 'SettingController', '2019-10-03 12:20:00', '2019-10-03 12:20:00', 'add_address');
INSERT INTO `routes` VALUES ('237', 'get', 'products/get_excel', 'ProductController', '2019-10-03 18:43:40', '2019-10-03 18:43:40', 'get_excel');
INSERT INTO `routes` VALUES ('238', 'post', 'products/store_excel', 'ProductController', '2019-10-03 18:43:40', '2019-10-03 19:22:36', 'store_excel');
INSERT INTO `routes` VALUES ('239', 'get', 'product/downloadSampleNew', 'ProductController', '2019-10-03 19:20:30', '2019-10-03 19:20:30', 'getDownload');
INSERT INTO `routes` VALUES ('240', 'get', 'unavailable', 'ContactController', '2019-10-07 15:30:23', '2019-10-07 15:30:23', 'request_index');
INSERT INTO `routes` VALUES ('241', 'post', 'unavailable/{id}', 'ContactController', '2019-10-07 15:30:23', '2019-10-07 16:21:10', 'message_to_user');
INSERT INTO `routes` VALUES ('242', 'get', 'users/{id}/delete', 'UserController', '2019-10-14 19:26:51', '2019-10-14 19:26:51', 'destroy');

-- ----------------------------
-- Table structure for `scaffoldinterfaces`
-- ----------------------------
DROP TABLE IF EXISTS `scaffoldinterfaces`;
CREATE TABLE `scaffoldinterfaces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `package` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `controller` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tablename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of scaffoldinterfaces
-- ----------------------------

-- ----------------------------
-- Table structure for `settings`
-- ----------------------------
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `settings_type_id_foreign` (`type_id`),
  CONSTRAINT `settings_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of settings
-- ----------------------------
INSERT INTO `settings` VALUES ('25', 'uploadAllow', 'video', '2018-02-04 12:04:09', '2019-02-11 15:09:42', '6', '0');
INSERT INTO `settings` VALUES ('27', 'enable_testing', '0', '2019-02-11 15:14:30', '2019-02-11 15:15:45', '7', '0');
INSERT INTO `settings` VALUES ('28', 'content_type_flag', '0', '2019-03-07 10:50:04', '2019-03-14 08:54:06', '7', '0');
INSERT INTO `settings` VALUES ('31', 'page_limit', '5', '2019-09-11 14:50:08', '2019-09-11 14:50:08', '2', null);
INSERT INTO `settings` VALUES ('32', 'title', 'Aghezty', '2019-09-16 09:03:51', '2019-09-16 09:03:51', '2', null);
INSERT INTO `settings` VALUES ('33', 'facebook', 'http://www.facebook.com', '2019-09-16 09:13:33', '2019-09-16 09:13:33', '2', null);
INSERT INTO `settings` VALUES ('35', 'whatsapp', '<p>whatsapp://send?phone=+0201019500621</p>', '2019-09-16 09:17:19', '2019-09-16 09:17:19', '1', null);
INSERT INTO `settings` VALUES ('36', 'sms', '123', '2019-09-16 09:17:53', '2019-09-16 09:17:53', '2', null);
INSERT INTO `settings` VALUES ('37', 'mail', 'mailto:info@aghzty.com', '2019-09-16 09:18:19', '2019-09-16 09:18:19', '2', null);
INSERT INTO `settings` VALUES ('39', 'service_center', '<table class=\"service_center_tabel table table-striped\">\r\n<thead class=\"thead-dark\">\r\n<tr class=\"text-center\" style=\"font-size: 13px;\">\r\n<th colspan=\"4\">أرقام جميع مراكز خدمة مابعد البيع لجميع الشركات</th>\r\n</tr>\r\n</thead>\r\n<tbody class=\"text-center\">\r\n<tr>\r\n<th>#</th>\r\n<th>مركز الخدمة</th>\r\n<th>الرقم</th>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">1</th>\r\n<td>مركز خدمة مجموعه العربى ( توشيبا - شارب - بنكيو - تورنادو - لاجيرمانيا - TCL )</td>\r\n<td><a href=\"tel:19319\">19319</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">2</th>\r\n<td>مركز خدمة زانوسى & أوليمبك</td>\r\n<td><a href=\"tel:19999\">19999</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">3</th>\r\n<td>مركز خدمة وايت ويل & هيتاشى</td>\r\n<td><a href=\"tel:19118\">19118</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">4</th>\r\n<td>مركز خدمة يونيون تك</td>\r\n<td><a href=\"tel:19012\">19012</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">5</th>\r\n<td>مركز خدمة بى تك ( أريستون – اندست -دايو – براون - ميلا - ماجيك - بيبى ليس)</td>\r\n<td><a href=\"tel:19966\">19966</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">6</th>\r\n<td>مركز خدمة بيكو</td>\r\n<td><a href=\"tel:16165\">16165</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">7</th>\r\n<td>مركز خدمة كريازى</td>\r\n<td>\r\n<a href=\"tel:19091\">19091</a><br>\r\n<a href=\"tel:19092\">19092</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">8</th>\r\n<td>مركز خدمة سامسونج</td>\r\n<td><a href=\"tel:16580\">16580</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">9</th>\r\n<td>مركز خدمة منصور</td>\r\n<td><a href=\"tel:16690\">16690</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">10</th>\r\n<td>مركز خدمة راية</td>\r\n<td><a href=\"tel:19900\">19900</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">11</th>\r\n<td>مركز خدمة يونيون</td>\r\n<td><a href=\"tel:16580\">16580</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">12</th>\r\n<td>مركز خدمة ال جى</td>\r\n<td><a href=\"tel:19960\">19960</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">13</th>\r\n<td>مركز خدمة جلاكسى</td>\r\n<td><a href=\"tel:16690\">16690</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">14</th>\r\n<td>مركز خدمة رويال جاز & أتلانتيك</td>\r\n<td>\r\n<a href=\"tel:19856\">19856</a><br>\r\n<a href=\"tel:16575\">16575</a><br>\r\n<a href=\"tel:16399\">16399</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">15</th>\r\n<td>مركز خدمة جليم جاز</td>\r\n<td>\r\n<a href=\"tel:0123292652\">0123292652</a><br>\r\n<a href=\"tel:0233383689\">0233383689</a><br>\r\n<a href=\"tel:0403329159\">0403329159</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">16</th>\r\n<td>مركز خدمة وايت ويستنج هاوس</td>\r\n<td>\r\n<a href=\"tel:16575\">16575</a><br>\r\n<a href=\"tel:01222251957\">01222251957</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">17</th>\r\n<td>مركز خدمة بروفان & ساشو</td>\r\n<td><a href=\"tel:0403329159\">0403329159</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">18</th>\r\n<td>مركز خدمة كينوود & بلاك آنديكر</td>\r\n<td><a href=\"tel:0403329159\">0403329159</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">19</th>\r\n<td>مركز خدمة العبد (وايت بوينت & وايرليبول)</td>\r\n<td>\r\n<a href=\"tel:19595\">19595</a><br>\r\n<a href=\"tel:0403411607\">0403411607</a><br>\r\n<a href=\"tel:0403401365\">0403401365</a><br>\r\n<a href=\"tel:3417728\">3417728</a><br>\r\n<a href=\"tel:3411607\">3411607</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">20</th>\r\n<td>مركز خدمة يونيفرسال</td>\r\n<td>\r\n<a href=\"tel:19933\">19933</a><br>\r\n<a href=\"tel:01065547766\">01065547766</a><br>\r\n<a href=\"tel:0403300466\">0403300466</a><br>\r\n<a href=\"tel:3417728\">3417728</a><br>\r\n<a href=\"tel:3411607\">3411607</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">21</th>\r\n<td>مركز خدمة تانك</td>\r\n<td><a href=\"tel:0403329159\">0403329159</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">22</th>\r\n<td>مركز خدمة تانك</td>\r\n<td><a href=\"tel:0403329159\">0403329159</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">23</th>\r\n<td>مركز خدمة اكسبريس & أوسكار</td>\r\n<td><a href=\"tel:0403329159\">0403329159</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">24</th>\r\n<td>مركز خدمة هاير</td>\r\n<td><a href=\"tel:19427\">19427</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">25</th>\r\n<td>مركز خدمة أجواتك</td>\r\n<td><a href=\"tel:01007785345\">01007785345</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">26</th>\r\n<td>مركز خدمة كينوود</td>\r\n<td><a href=\"tel:16913\">16913</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">27</th>\r\n<td>مركز خدمة تكنوجاز</td>\r\n<td>\r\n<a href=\"tel:01065500478\">01065500478</a><br>\r\n<a href=\"tel:5440863\">5440863</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">28</th>\r\n<td>مركز خدمة فريش</td>\r\n<td>\r\n<a href=\"tel:19059\">19059</a><br>\r\n<a href=\"tel:0403350766\">0403350766</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">29</th>\r\n<td>مركز خدمة اليكتروستار</td>\r\n<td><a href=\"tel:0403350766\">0403350766</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">30</th>\r\n<td>مركز خدمة سميج</td>\r\n<td>\r\n<a href=\"tel:01229202140\">01229202140</a><br>\r\n<a href=\"tel:01229202150\">01229202150</a><br>\r\n<a href=\"tel:0233846446\">0233846446</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">31</th>\r\n<td>مركز خدمة هوفر</td>\r\n<td><a href=\"tel:19319\">19319</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">32</th>\r\n<td>مركز خدمة هاى سينس</td>\r\n<td>\r\n<a href=\"tel:19480\">19480</a><br>\r\n<a href=\"tel:0233386304\">0233386304</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">33</th>\r\n<td>مركز خدمة أريون</td>\r\n<td><a href=\"tel:19727\">19727</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">34</th>\r\n<td>مركز خدمة ألاسكا</td>\r\n<td><a href=\"tel:01227335091\">01227335091</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">35</th>\r\n<td>مركز خدمة تربو أير</td>\r\n<td>\r\n<a href=\"tel:01007336491\">01007336491</a><br>\r\n<a href=\"tel:01223939613\">01223939613</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">36</th>\r\n<td>مركز خدمة أريون</td>\r\n<td>\r\n<a href=\"tel:19727\">19727</a><br>\r\n<a href=\"tel:0223935045\">0223935045</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">37</th>\r\n<td>مركز خدمة جنرال لايف</td>\r\n<td><a href=\"tel:01009100321\">01009100321</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">38</th>\r\n<td>مركز خدمة باناسونيك</td>\r\n<td><a href=\"tel:01285603357\">01285603357</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">39</th>\r\n<td>مركز خدمة سيمنز</td>\r\n<td><a href=\"tel:1657\">1657</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">40</th>\r\n<td>مركز خدمة بروفان</td>\r\n<td>\r\n<a href=\"tel:01289548244\">01289548244</a><br>\r\n<a href=\"tel:01211332304\">01211332304</a><br>\r\n<a href=\"tel:0403329159\">0403329159</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">41</th>\r\n<td>مركز خدمة لوفرا</td>\r\n<td><a href=\"tel:01222251957\">01222251957</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">42</th>\r\n<td>مركز خدمة أتلانتيك</td>\r\n<td><a href=\"tel:16399\">16399</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">43</th>\r\n<td>مركز خدمة جنرال تك</td>\r\n<td>\r\n<a href=\"tel:01068829726\">01068829726</a><br>\r\n<a href=\"tel:01097770933\">01097770933</a><br>\r\n<a href=\"tel:0482590591\">0482590591</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">44</th>\r\n<td>مركز خدمة ألبا <br>34شارع أبو بكر الصديق مصر الجديدة</td>\r\n<td>\r\n<a href=\"tel:01223428976\">01223428976</a><br>\r\n<a href=\"tel:0226342450\">0226342450</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">45</th>\r\n<td>مركز خدمة بلاك آند وايت<br>38 شارع ثروت مع بطرس طنطا</td>\r\n<td>\r\n<a href=\"tel:0403324929\">0403324929</a><br>\r\n<a href=\"tel:0403203068\">0403203068</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">46</th>\r\n<td>مركز خدمة بلاك آند وايت<br>25 شارع الزهرية أول شارع الأزهر بالعتبة القاهرة</td>\r\n<td>\r\n<a href=\"tel:01111591541\">01111591541</a><br>\r\n<a href=\"tel:01001591541\">01001591541</a>\r\n</td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">47</th>\r\n<td>مركز خدمة بلاك آند وايت<br>5 شارع طلعت حرب محطة الرمل الأسكندرية</td>\r\n<td><a href=\"tel:034830522\">034830522</a></td>\r\n</tr>\r\n\r\n<tr>\r\n<th scope=\"row\">48</th>\r\n<td>مركز خدمة جاك <br>43 شارع الناصر خلف مستشفى الدلتا طنطا</td>\r\n<td>\r\n<a href=\"tel:01271111655\">01271111655</a><br>\r\n<a href=\"tel:0403329159\">0403329159</a>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2019-09-24 10:41:24', '2019-09-24 10:41:24', '2', null);
INSERT INTO `settings` VALUES ('40', 'phone', '+20 2 33047920', '2019-09-26 08:55:14', '2019-09-26 08:55:14', '2', null);
INSERT INTO `settings` VALUES ('41', 'super_mail', 'eng.emadmohamedphp@gmail.com', '2019-09-26 08:56:13', '2019-10-02 09:36:28', '2', null);
INSERT INTO `settings` VALUES ('42', 'open_coupon', '1', '2019-09-26 08:56:54', '2019-10-02 12:37:45', '7', null);
INSERT INTO `settings` VALUES ('43', 'ads', '1', '2019-09-26 08:57:11', '2019-10-02 12:01:11', '7', null);
INSERT INTO `settings` VALUES ('44', 'location', '30.008611784423707,31.028496623039246', '2019-10-07 09:18:14', '2019-10-14 11:51:06', '8', null);
INSERT INTO `settings` VALUES ('46', 'android_link', 'https://google.com', '2019-10-09 12:24:36', '2019-10-09 12:24:36', '2', null);
INSERT INTO `settings` VALUES ('47', 'ios_link', 'https://google.com', '2019-10-14 11:29:13', '2019-10-14 11:29:13', '2', null);

-- ----------------------------
-- Table structure for `static_bodies`
-- ----------------------------
DROP TABLE IF EXISTS `static_bodies`;
CREATE TABLE `static_bodies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `static_translation_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `static_bodies_language_id_foreign` (`language_id`),
  KEY `static_bodies_static_translation_id_foreign` (`static_translation_id`),
  CONSTRAINT `static_bodies_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `static_bodies_static_translation_id_foreign` FOREIGN KEY (`static_translation_id`) REFERENCES `static_translations` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of static_bodies
-- ----------------------------
INSERT INTO `static_bodies` VALUES ('1', '3', '1', '<p>11 Abou Al Karamat, Al Huwaiteyah, Agouza, Giza Governorate, Egypt</p>', null, null);
INSERT INTO `static_bodies` VALUES ('2', '4', '1', '<p>11 أبو الكرامات، الحويتية، حي العجوزة، الجيزة</p>', null, null);

-- ----------------------------
-- Table structure for `static_translations`
-- ----------------------------
DROP TABLE IF EXISTS `static_translations`;
CREATE TABLE `static_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key_word` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of static_translations
-- ----------------------------
INSERT INTO `static_translations` VALUES ('1', 'address', '2019-09-15 14:00:59', '2019-09-15 14:00:59');

-- ----------------------------
-- Table structure for `tans_bodies`
-- ----------------------------
DROP TABLE IF EXISTS `tans_bodies`;
CREATE TABLE `tans_bodies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `translatable_id` int(10) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tans_bodies_language_id_foreign` (`language_id`),
  KEY `tans_bodies_translatable_id_foreign` (`translatable_id`),
  CONSTRAINT `tans_bodies_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tans_bodies_translatable_id_foreign` FOREIGN KEY (`translatable_id`) REFERENCES `translatables` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of tans_bodies
-- ----------------------------
INSERT INTO `tans_bodies` VALUES ('1', '4', '1', 'الاجهزة الثقيلة', '2019-09-12 08:25:51', '2019-09-12 08:25:51');
INSERT INTO `tans_bodies` VALUES ('2', '4', '2', 'الشاشات والرسيفر', '2019-09-12 08:25:59', '2019-09-12 08:25:59');
INSERT INTO `tans_bodies` VALUES ('3', '4', '3', 'تليفونات واكسورات', '2019-09-12 08:26:06', '2019-09-12 08:26:06');
INSERT INTO `tans_bodies` VALUES ('4', '4', '4', 'ثلاجه', '2019-09-12 08:26:17', '2019-09-12 08:26:17');
INSERT INTO `tans_bodies` VALUES ('5', '4', '5', 'ديب فريزر', '2019-09-12 08:26:24', '2019-09-12 08:26:24');
INSERT INTO `tans_bodies` VALUES ('6', '4', '6', 'غسالات', '2019-09-12 08:26:33', '2019-09-12 08:26:33');
INSERT INTO `tans_bodies` VALUES ('7', '4', '7', 'شاشات', '2019-09-12 08:26:44', '2019-09-12 08:26:44');
INSERT INTO `tans_bodies` VALUES ('8', '4', '8', 'الرسيفر', '2019-09-12 08:26:51', '2019-09-12 08:26:51');
INSERT INTO `tans_bodies` VALUES ('9', '4', '9', 'محمول', '2019-09-12 08:27:11', '2019-09-12 08:27:11');
INSERT INTO `tans_bodies` VALUES ('10', '4', '10', 'ارضى', '2019-09-12 08:27:27', '2019-09-12 08:27:27');
INSERT INTO `tans_bodies` VALUES ('11', '4', '11', 'سامسونج', '2019-09-12 08:27:40', '2019-09-12 08:27:40');
INSERT INTO `tans_bodies` VALUES ('12', '4', '12', 'ال جى', '2019-09-12 08:27:52', '2019-09-15 11:45:32');
INSERT INTO `tans_bodies` VALUES ('13', '4', '13', 'توشيبا', '2019-09-12 08:27:59', '2019-09-15 11:45:18');
INSERT INTO `tans_bodies` VALUES ('14', '4', '14', 'ديب فريزر-سامسونج-LLK 7S112 X EX', '2019-09-12 08:28:32', '2019-09-29 13:45:00');
INSERT INTO `tans_bodies` VALUES ('15', '4', '15', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n	<tbody>\r\n		<tr height=\"35\" style=\"height:26.25pt\">\r\n			<td class=\"xl64\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">مسطح اريستون30سم - يحتوى على2عيون الكهربية -6 مستويات مختلفة للحرارة- اللون : استانلس ستيل</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2019-09-12 08:28:32', '2019-10-02 18:00:26');
INSERT INTO `tans_bodies` VALUES ('16', '4', '16', 'LLK 7S112 X EX', '2019-09-12 08:28:32', '2019-09-29 13:45:00');
INSERT INTO `tans_bodies` VALUES ('17', '4', '17', 'ديب فريزر-سامسونج-LIC 3C26 F UK', '2019-09-12 08:28:49', '2019-09-29 13:45:27');
INSERT INTO `tans_bodies` VALUES ('18', '4', '18', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n<tbody>\r\n<tr height=\"35\" style=\"height:26.25pt\">\r\n<td class=\"xl66\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">مسطح اريستون90سم -4شعلات غاز-عين هالوجين بيضاوية -3شبكات من الاينمل-استانلس ستيل</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2019-09-12 08:28:49', '2019-09-29 13:45:27');
INSERT INTO `tans_bodies` VALUES ('19', '4', '19', 'LIC 3C26 F UK', '2019-09-12 08:28:49', '2019-09-29 13:45:27');
INSERT INTO `tans_bodies` VALUES ('20', '4', '20', 'ثلاجه-ال جى-PHN 942 T/IX/A', '2019-09-12 08:29:07', '2019-09-29 13:45:46');
INSERT INTO `tans_bodies` VALUES ('21', '4', '21', '<p><span style=\"color: rgb(0, 0, 0); font-family: Arial, Tahoma, Helvetica, sans-serif; font-size: 14px; text-align: right;\">يعد Cascade 220 Wool الكلاسيكي مزيجًا مثاليًا من القدرة على تحمل التكاليف والجودة والتنوع الذي يمكن استخدامه في مجموعة واسعة من المشاريع. كل قطعة من هذا الصوف الخالص 100٪ تحتوي على 220 ياردة. بفضل لوحة الألوان غير المحدودة تقريبًا للاختيار من بينها ، فمن المؤكد أنك ستجد اللون (الألوان) المثالي لمشروعك القادم! ملاحظة: هذه الخيوط رائعة لمشاريع التلبيد أيضًا!</span></p>', '2019-09-12 08:29:07', '2019-09-12 08:29:07');
INSERT INTO `tans_bodies` VALUES ('22', '4', '22', 'PHN 942 T/IX/A', '2019-09-12 08:29:08', '2019-09-29 13:45:46');
INSERT INTO `tans_bodies` VALUES ('23', '4', '23', 'تليفون', '2019-09-26 11:02:49', '2019-09-26 11:02:49');
INSERT INTO `tans_bodies` VALUES ('24', '4', '24', 'ثلاجه-سامسونج-PK 951 T GH', '2019-09-26 11:05:02', '2019-09-29 13:46:15');
INSERT INTO `tans_bodies` VALUES ('25', '4', '25', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n<tbody>\r\n<tr height=\"35\" style=\"height:26.25pt\">\r\n<td class=\"xl66\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">شفاط اريستون 60 سم- قوة الشفط : 385 م3/الساعة- 3سرعات للشفط -2فلاتر من الالمونيوم</td>\r\n</tr>\r\n</tbody>\r\n</table>', '2019-09-26 11:05:02', '2019-09-29 13:46:15');
INSERT INTO `tans_bodies` VALUES ('26', '4', '26', 'PK 951 T GH', '2019-09-26 11:05:02', '2019-09-29 13:46:15');
INSERT INTO `tans_bodies` VALUES ('27', '4', '27', 'ثلاجه-سامسونج-SL 16.1 (WH)', '2019-09-26 11:06:27', '2019-09-29 13:46:44');
INSERT INTO `tans_bodies` VALUES ('28', '4', '28', '<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" style=\"border-collapse:\r\ncollapse;width:919pt\" width=\"1225\">\r\n	<tbody>\r\n		<tr height=\"35\" style=\"height:26.25pt\">\r\n			<td class=\"xl66\" dir=\"RTL\" height=\"35\" style=\"height:26.25pt;width:919pt\" width=\"1225\">شفاط اريستون 60سم بدون مدخنه - قوة الشفط : 460 م3/ الساعه-3سرعات-2لمبه هالوجين-2فلتر-سيلفر</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '2019-09-26 11:06:27', '2019-10-07 12:41:35');
INSERT INTO `tans_bodies` VALUES ('29', '4', '29', 'SL 16.1 (WH)', '2019-09-26 11:06:27', '2019-09-29 13:46:44');
INSERT INTO `tans_bodies` VALUES ('30', '4', '30', 'ديب فريزر-ال جى-UA8 F1C X', '2019-09-26 11:12:36', '2019-09-29 13:47:21');
INSERT INTO `tans_bodies` VALUES ('32', '4', '33', 'غسالات-توشيبا-LFC 2B19 X + MQ 100', '2019-09-26 11:16:12', '2019-09-29 13:48:18');
INSERT INTO `tans_bodies` VALUES ('33', '4', '34', '<p>Washing&nbsp;Washing&nbsp;Washing&nbsp;Washing&nbsp;</p>', '2019-09-26 11:16:12', '2019-09-26 11:16:12');
INSERT INTO `tans_bodies` VALUES ('34', '4', '35', 'LFC 2B19 X + MQ 100', '2019-09-26 11:16:13', '2019-09-29 13:48:18');
INSERT INTO `tans_bodies` VALUES ('35', '4', '36', 'غسالات-سامسونج-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '2019-09-26 11:19:42', '2019-09-29 13:48:40');
INSERT INTO `tans_bodies` VALUES ('36', '4', '37', '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>', '2019-09-26 11:19:42', '2019-09-26 11:19:42');
INSERT INTO `tans_bodies` VALUES ('37', '4', '38', 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '2019-09-26 11:19:42', '2019-09-29 13:48:41');
INSERT INTO `tans_bodies` VALUES ('38', '4', '39', 'شاشات-توشيبا-LFC 2B19 X + MQ 100', '2019-09-26 11:21:28', '2019-09-29 13:48:54');
INSERT INTO `tans_bodies` VALUES ('39', '4', '40', '<p>Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;</p>', '2019-09-26 11:21:28', '2019-09-26 11:21:28');
INSERT INTO `tans_bodies` VALUES ('40', '4', '41', 'LFC 2B19 X + MQ 100', '2019-09-26 11:21:28', '2019-09-29 13:48:54');
INSERT INTO `tans_bodies` VALUES ('41', '4', '42', 'شاشات-سامسونج-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '2019-09-26 11:22:07', '2019-09-29 13:49:09');
INSERT INTO `tans_bodies` VALUES ('42', '4', '43', '<p>Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;</p>', '2019-09-26 11:22:07', '2019-09-26 11:22:07');
INSERT INTO `tans_bodies` VALUES ('43', '4', '44', 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X', '2019-09-26 11:22:08', '2019-09-29 13:49:09');
INSERT INTO `tans_bodies` VALUES ('44', '4', '45', 'الرسيفر-ال جى-MD 554 IX A', '2019-09-26 11:23:21', '2019-09-29 13:49:27');
INSERT INTO `tans_bodies` VALUES ('45', '4', '46', '<p>Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;</p>', '2019-09-26 11:23:22', '2019-09-26 11:23:22');
INSERT INTO `tans_bodies` VALUES ('46', '4', '47', 'MD 554 IX A', '2019-09-26 11:23:22', '2019-09-29 13:49:27');
INSERT INTO `tans_bodies` VALUES ('47', '4', '48', 'الرسيفر-سامسونج-RPG 822 SS EX', '2019-09-26 11:24:03', '2019-09-29 13:49:42');
INSERT INTO `tans_bodies` VALUES ('48', '4', '49', '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>', '2019-09-26 11:24:03', '2019-09-26 11:24:03');
INSERT INTO `tans_bodies` VALUES ('49', '4', '50', 'RPG 822 SS EX', '2019-09-26 11:24:03', '2019-09-29 13:49:42');
INSERT INTO `tans_bodies` VALUES ('50', '4', '51', 'محمول-سامسونج-WMG 9437BS EX', '2019-09-26 11:29:07', '2019-09-29 13:49:57');
INSERT INTO `tans_bodies` VALUES ('51', '4', '52', '<p>IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;</p>', '2019-09-26 11:29:07', '2019-09-26 11:29:07');
INSERT INTO `tans_bodies` VALUES ('52', '4', '53', 'WMG 9437BS EX', '2019-09-26 11:29:07', '2019-09-29 13:49:57');
INSERT INTO `tans_bodies` VALUES ('53', '4', '54', 'محمول-ال جى-LFP 4O23 WLT X', '2019-09-26 11:30:07', '2019-09-29 13:50:12');
INSERT INTO `tans_bodies` VALUES ('54', '4', '55', '<p>Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;</p>', '2019-09-26 11:30:07', '2019-09-26 11:30:07');
INSERT INTO `tans_bodies` VALUES ('55', '4', '56', 'LFP 4O23 WLT X', '2019-09-26 11:30:07', '2019-09-29 13:50:12');
INSERT INTO `tans_bodies` VALUES ('56', '4', '57', 'ارضى-توشيبا-PHN 961 TS/IX/A+FKYG X+SL 19.1P IX', '2019-09-26 11:31:23', '2019-09-29 13:50:30');
INSERT INTO `tans_bodies` VALUES ('57', '4', '58', '<p>Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;</p>', '2019-09-26 11:31:23', '2019-09-26 11:31:23');
INSERT INTO `tans_bodies` VALUES ('58', '4', '59', 'PHN 961 TS/IX/A+FKYG X+SL 19.1P IX', '2019-09-26 11:31:23', '2019-09-29 13:50:30');
INSERT INTO `tans_bodies` VALUES ('59', '4', '60', 'ارضى-سامسونج-UA8 F1C X', '2019-09-26 11:31:55', '2019-09-29 13:47:59');
INSERT INTO `tans_bodies` VALUES ('60', '4', '61', '<p>Samsung&nbsp;Samsung&nbsp;Samsung&nbsp;</p>', '2019-09-26 11:31:56', '2019-09-26 11:31:56');
INSERT INTO `tans_bodies` VALUES ('61', '4', '62', 'UA8 F1C X', '2019-09-26 11:31:56', '2019-09-29 13:47:59');
INSERT INTO `tans_bodies` VALUES ('64', '4', '65', 'غسالات اطباق', '2019-10-01 09:34:02', '2019-10-01 09:34:02');
INSERT INTO `tans_bodies` VALUES ('65', '4', '66', 'اريستون', '2019-10-01 09:34:32', '2019-10-01 09:34:32');
INSERT INTO `tans_bodies` VALUES ('66', '4', '67', 'غسالات اطباق-اريستون-LLK 7S112 X EX', '2019-10-01 09:36:07', '2019-10-01 09:36:07');
INSERT INTO `tans_bodies` VALUES ('67', '4', '68', '<p>غسالة اطباق اريستون بيلت ان - 15 فرد - 7 برنامج - اللون : سيلفر</p>', '2019-10-01 09:36:07', '2019-10-01 09:36:07');
INSERT INTO `tans_bodies` VALUES ('68', '4', '69', 'LLK 7S112 X EX', '2019-10-01 09:36:07', '2019-10-01 09:36:07');
INSERT INTO `tans_bodies` VALUES ('72', '4', '73', 'غسالات اطباق-اريستون-LIC 3B+26', '2019-10-01 13:33:37', '2019-10-01 13:33:37');
INSERT INTO `tans_bodies` VALUES ('73', '4', '74', '<p>غسالة اطباق اريستون بلت ان 14 فرد 6 برنامج</p>', '2019-10-01 13:33:37', '2019-10-01 13:33:37');
INSERT INTO `tans_bodies` VALUES ('74', '4', '75', 'LIC 3B+26', '2019-10-01 13:33:37', '2019-10-01 13:33:37');
INSERT INTO `tans_bodies` VALUES ('75', '4', '76', 'غسالات اطباق-اريستون-XP-N160II', '2019-10-01 13:39:25', '2019-10-01 13:39:25');
INSERT INTO `tans_bodies` VALUES ('76', '4', '77', '<section style=\"box-sizing: border-box; margin-bottom: 30px; color: rgb(85, 85, 85); font-family: Tahoma, Helvetica, Arial, sans-serif; font-size: 12px;\">\r\n<div class=\"osh-tabs -center\" style=\"box-sizing: border-box; text-align: center;\">\r\n<div class=\"tab-content -active\" id=\"product-details\" style=\"box-sizing: border-box; max-width: 710px; margin: 40px auto;\">\r\n<div class=\"list -features\" style=\"box-sizing: border-box; text-align: right; margin-bottom: 40px;\">\r\n<div class=\"title\" style=\"box-sizing: border-box; font-size: 16px; line-height: 20px; font-weight: 700; color: rgb(170, 170, 170); margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 10px; text-transform: uppercase;\">المواصفات الأساسية</div>\r\n\r\n<ul style=\"box-sizing: border-box; margin: 0px; list-style: none; padding-right: 0px; padding-left: 0px;\">\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-right: 8px;\">160MM / ثانية</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-right: 8px;\">منفذ شبكة USB</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-right: 8px;\">184 &times; 143 &times; 133 مم &rlm;(&rlm;L &times; W &times; H&rlm;)&rlm;</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-right: 8px;\">1.3KG</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-right: 8px;\">امكانية تعليق الطابعة على الحائط&nbsp;</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-right: 8px;\">ذات تصميم رائع يحفظ لك المساحة الفارغة المتاحة&nbsp;</li>\r\n	<li style=\"box-sizing: border-box; line-height: 16px; color: rgb(96, 96, 96); display: block; position: relative; margin-top: 3px; padding-right: 8px;\">عرض الورق المطبوع&rlm;:&rlm; 80 مم</li>\r\n</ul>\r\n</div>\r\n\r\n<div class=\"osh-table -no-border\" style=\"box-sizing: border-box; border: none; display: table; width: 710px; color: rgb(96, 96, 96); text-align: right; table-layout: fixed; margin-top: 40px;\">\r\n<div class=\"caption\" style=\"box-sizing: border-box; display: table-caption; font-size: 16px; line-height: 20px; padding: 0px 0px 10px; font-weight: 700; color: rgb(170, 170, 170); text-transform: uppercase;\">عام</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px 10px 20px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">SKU &lrm;(&lrm;config&lrm;)&lrm;</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">XP666EL10ZLR7NAFAMZ</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px 10px 20px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">الموديل</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">XP&lrm;-N160II</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px 10px 20px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">اللون</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">اسود</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px 10px 20px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Product Warranty</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">1 Year</div>\r\n</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px 10px 20px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Production Country</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">China</div>\r\n</div>\r\n</div>\r\n\r\n<div class=\"osh-table -no-border\" style=\"box-sizing: border-box; border: none; display: table; width: 710px; color: rgb(96, 96, 96); text-align: right; table-layout: fixed; margin-top: 40px;\">\r\n<div class=\"caption\" style=\"box-sizing: border-box; display: table-caption; font-size: 16px; line-height: 20px; padding: 0px 0px 10px; font-weight: 700; color: rgb(170, 170, 170); text-transform: uppercase;\">الأبعاد</div>\r\n\r\n<div class=\"osh-row \" style=\"box-sizing: border-box; clear: both; display: table-row;\">\r\n<div class=\"osh-col -head\" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px 10px 20px; border-top: 1px solid rgb(221, 221, 221); font-weight: 700; color: rgb(0, 0, 0); width: 177px;\">Product Dimensions</div>\r\n\r\n<div class=\"osh-col \" style=\"box-sizing: border-box; display: table-cell; padding: 10px 0px; border-top: 1px solid rgb(221, 221, 221);\">184 &times; 143 &times; 133 مم</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', '2019-10-01 13:39:25', '2019-10-01 13:41:05');
INSERT INTO `tans_bodies` VALUES ('77', '4', '78', 'XP-N160II', '2019-10-01 13:39:25', '2019-10-01 13:39:25');
INSERT INTO `tans_bodies` VALUES ('78', '4', '79', 'اختيار', '2019-10-02 17:36:14', '2019-10-02 17:36:14');
INSERT INTO `tans_bodies` VALUES ('87', '4', '89', 'غسالات اطباق-اريستون-', '2019-10-07 10:31:36', '2019-10-07 10:31:36');
INSERT INTO `tans_bodies` VALUES ('88', '4', '90', '<p>gtryty</p>', '2019-10-07 10:31:36', '2019-10-07 10:31:36');
INSERT INTO `tans_bodies` VALUES ('90', '4', '93', 'غسالات اطباق-سامسونج-abcsdsdsd', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `tans_bodies` VALUES ('91', '4', '94', 'وصف المنتج 1 ', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `tans_bodies` VALUES ('92', '4', '95', 'abcsdsdsd', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `tans_bodies` VALUES ('93', '4', '96', 'غسالات اطباق-سامسونج-xyzsdd', '2019-10-07 12:57:27', '2019-10-07 12:57:27');
INSERT INTO `tans_bodies` VALUES ('94', '4', '97', 'وصف المنتج 2 ', '2019-10-07 12:57:27', '2019-10-07 12:57:27');
INSERT INTO `tans_bodies` VALUES ('95', '4', '98', 'xyzsdd', '2019-10-07 12:57:27', '2019-10-07 12:57:27');
INSERT INTO `tans_bodies` VALUES ('96', '4', '99', 'غسالات اطباق-سامسونج-ddddddddddddddd', '2019-10-07 13:09:15', '2019-10-07 13:09:15');
INSERT INTO `tans_bodies` VALUES ('97', '4', '100', '<p>ddddddddddddddd</p>', '2019-10-07 13:09:15', '2019-10-07 13:09:15');
INSERT INTO `tans_bodies` VALUES ('98', '4', '101', 'ddddddddddddddd', '2019-10-07 13:09:16', '2019-10-07 13:09:16');
INSERT INTO `tans_bodies` VALUES ('99', '4', '102', 'غسالات اطباق-سامسونج-fgfgfgggggg', '2019-10-09 12:38:10', '2019-10-09 12:38:10');
INSERT INTO `tans_bodies` VALUES ('100', '4', '103', '<p>ddd</p>', '2019-10-09 12:38:10', '2019-10-09 12:38:10');
INSERT INTO `tans_bodies` VALUES ('101', '4', '104', 'fgfgfgggggg', '2019-10-09 12:38:10', '2019-10-09 12:38:10');
INSERT INTO `tans_bodies` VALUES ('102', '4', '105', 'ثلاجه-سامسونج-abcsdsdsd', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `tans_bodies` VALUES ('103', '4', '106', 'وصف المنتج 1 ', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `tans_bodies` VALUES ('104', '4', '107', 'abcsdsdsd', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `tans_bodies` VALUES ('105', '4', '108', 'ثلاجه-سامسونج-xyzsdd', '2019-10-09 15:29:42', '2019-10-09 15:29:42');
INSERT INTO `tans_bodies` VALUES ('106', '4', '109', '<p>وصف المنتج 2</p>', '2019-10-09 15:29:42', '2019-10-27 18:30:05');
INSERT INTO `tans_bodies` VALUES ('107', '4', '110', 'xyzsdd', '2019-10-09 15:29:42', '2019-10-09 15:29:42');
INSERT INTO `tans_bodies` VALUES ('121', '4', '126', 'غسالات اطباق-سامسونج-ttttttttttttt', '2019-10-14 09:26:47', '2019-10-14 09:26:47');
INSERT INTO `tans_bodies` VALUES ('122', '4', '127', '<p>ttttttt</p>', '2019-10-14 09:26:47', '2019-10-14 09:26:47');
INSERT INTO `tans_bodies` VALUES ('123', '4', '128', 'ttttttttttttt', '2019-10-14 09:26:47', '2019-10-14 09:26:47');
INSERT INTO `tans_bodies` VALUES ('124', '4', '129', 'غسالات اطباق-سامسونج-prodcut11111111111', '2019-10-14 10:19:01', '2019-10-14 10:19:01');
INSERT INTO `tans_bodies` VALUES ('125', '4', '130', '<p>prodcut11111111111</p>', '2019-10-14 10:19:01', '2019-10-14 10:19:01');
INSERT INTO `tans_bodies` VALUES ('126', '4', '131', 'prodcut11111111111', '2019-10-14 10:19:01', '2019-10-14 10:19:01');
INSERT INTO `tans_bodies` VALUES ('127', '4', '132', 'غسالات اطباق-سامسونج-dsd', '2019-10-14 10:06:57', '2019-10-14 10:06:57');
INSERT INTO `tans_bodies` VALUES ('128', '4', '133', '<p>dsd</p>', '2019-10-14 10:06:57', '2019-10-14 10:06:57');
INSERT INTO `tans_bodies` VALUES ('129', '4', '134', 'dsd', '2019-10-14 10:06:57', '2019-10-14 10:06:57');
INSERT INTO `tans_bodies` VALUES ('130', '4', '135', 'غسالات اطباق-سامسونج-model ar', '2019-10-14 10:22:27', '2019-10-27 18:33:09');
INSERT INTO `tans_bodies` VALUES ('131', '4', '136', '<p>des ar</p>', '2019-10-14 10:22:27', '2019-10-27 18:33:09');
INSERT INTO `tans_bodies` VALUES ('132', '4', '137', 'model ar', '2019-10-14 10:22:28', '2019-10-27 18:33:09');
INSERT INTO `tans_bodies` VALUES ('133', '4', '138', 'ارضى-اريستون-abcsdsdsd', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `tans_bodies` VALUES ('134', '4', '139', '<p>وصف المنتج 1</p>', '2019-10-14 11:53:24', '2019-10-27 19:06:37');
INSERT INTO `tans_bodies` VALUES ('135', '4', '140', 'abcsdsdsd', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `tans_bodies` VALUES ('136', '4', '141', 'ارضى-اريستون-xyzsdd', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `tans_bodies` VALUES ('137', '4', '142', '<p>وصف المنتج 2</p>', '2019-10-14 11:53:25', '2019-10-27 18:29:34');
INSERT INTO `tans_bodies` VALUES ('138', '4', '143', 'xyzsdd', '2019-10-14 11:53:25', '2019-10-14 11:53:25');
INSERT INTO `tans_bodies` VALUES ('139', '4', '144', 'شاشات-اختيار-fdfdf', '2019-10-27 18:28:15', '2019-10-27 18:56:39');
INSERT INTO `tans_bodies` VALUES ('140', '4', '145', '<p>dfdf</p>', '2019-10-27 18:28:15', '2019-10-27 18:28:15');
INSERT INTO `tans_bodies` VALUES ('141', '4', '146', 'fdfdf', '2019-10-27 18:28:15', '2019-10-27 18:28:15');
INSERT INTO `tans_bodies` VALUES ('143', '4', '148', 'ارضى-اريستون-dd', '2019-10-27 18:58:12', '2019-10-27 18:58:12');
INSERT INTO `tans_bodies` VALUES ('144', '4', '149', '<p>ddddddddddddddd</p>', '2019-10-27 18:58:12', '2019-10-27 18:58:12');
INSERT INTO `tans_bodies` VALUES ('145', '4', '150', 'dd', '2019-10-27 18:58:13', '2019-10-27 18:58:13');

-- ----------------------------
-- Table structure for `translatables`
-- ----------------------------
DROP TABLE IF EXISTS `translatables`;
CREATE TABLE `translatables` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `record_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=151 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of translatables
-- ----------------------------
INSERT INTO `translatables` VALUES ('1', 'categories', '7', 'title', '2019-09-12 08:25:51', '2019-09-12 08:25:51');
INSERT INTO `translatables` VALUES ('2', 'categories', '11', 'title', '2019-09-12 08:25:59', '2019-09-12 08:25:59');
INSERT INTO `translatables` VALUES ('3', 'categories', '14', 'title', '2019-09-12 08:26:06', '2019-09-12 08:26:06');
INSERT INTO `translatables` VALUES ('4', 'categories', '8', 'title', '2019-09-12 08:26:17', '2019-09-12 08:26:17');
INSERT INTO `translatables` VALUES ('5', 'categories', '9', 'title', '2019-09-12 08:26:24', '2019-09-12 08:26:24');
INSERT INTO `translatables` VALUES ('6', 'categories', '10', 'title', '2019-09-12 08:26:33', '2019-09-12 08:26:33');
INSERT INTO `translatables` VALUES ('7', 'categories', '12', 'title', '2019-09-12 08:26:44', '2019-09-12 08:26:44');
INSERT INTO `translatables` VALUES ('8', 'categories', '13', 'title', '2019-09-12 08:26:51', '2019-09-12 08:26:51');
INSERT INTO `translatables` VALUES ('9', 'categories', '15', 'title', '2019-09-12 08:27:11', '2019-09-12 08:27:11');
INSERT INTO `translatables` VALUES ('10', 'categories', '16', 'title', '2019-09-12 08:27:27', '2019-09-12 08:27:27');
INSERT INTO `translatables` VALUES ('11', 'brands', '1', 'title', '2019-09-12 08:27:40', '2019-09-12 08:27:40');
INSERT INTO `translatables` VALUES ('12', 'brands', '2', 'title', '2019-09-12 08:27:52', '2019-09-12 08:27:52');
INSERT INTO `translatables` VALUES ('13', 'brands', '3', 'title', '2019-09-12 08:27:59', '2019-09-12 08:27:59');
INSERT INTO `translatables` VALUES ('14', 'products', '2', 'title', '2019-09-12 08:28:32', '2019-09-12 08:28:32');
INSERT INTO `translatables` VALUES ('15', 'products', '2', 'description', '2019-09-12 08:28:32', '2019-09-12 08:28:32');
INSERT INTO `translatables` VALUES ('16', 'products', '2', 'short_description', '2019-09-12 08:28:32', '2019-09-12 08:28:32');
INSERT INTO `translatables` VALUES ('17', 'products', '3', 'title', '2019-09-12 08:28:49', '2019-09-12 08:28:49');
INSERT INTO `translatables` VALUES ('18', 'products', '3', 'description', '2019-09-12 08:28:49', '2019-09-12 08:28:49');
INSERT INTO `translatables` VALUES ('19', 'products', '3', 'short_description', '2019-09-12 08:28:49', '2019-09-12 08:28:49');
INSERT INTO `translatables` VALUES ('20', 'products', '4', 'title', '2019-09-12 08:29:07', '2019-09-12 08:29:07');
INSERT INTO `translatables` VALUES ('21', 'products', '4', 'description', '2019-09-12 08:29:07', '2019-09-12 08:29:07');
INSERT INTO `translatables` VALUES ('22', 'products', '4', 'short_description', '2019-09-12 08:29:07', '2019-09-12 08:29:07');
INSERT INTO `translatables` VALUES ('23', 'categories', '17', 'title', '2019-09-26 11:02:48', '2019-09-26 11:02:48');
INSERT INTO `translatables` VALUES ('24', 'products', '5', 'title', '2019-09-26 11:05:01', '2019-09-26 11:05:01');
INSERT INTO `translatables` VALUES ('25', 'products', '5', 'description', '2019-09-26 11:05:02', '2019-09-26 11:05:02');
INSERT INTO `translatables` VALUES ('26', 'products', '5', 'short_description', '2019-09-26 11:05:02', '2019-09-26 11:05:02');
INSERT INTO `translatables` VALUES ('27', 'products', '6', 'title', '2019-09-26 11:06:27', '2019-09-26 11:06:27');
INSERT INTO `translatables` VALUES ('28', 'products', '6', 'description', '2019-09-26 11:06:27', '2019-09-26 11:06:27');
INSERT INTO `translatables` VALUES ('29', 'products', '6', 'short_description', '2019-09-26 11:06:27', '2019-09-26 11:06:27');
INSERT INTO `translatables` VALUES ('30', 'products', '7', 'title', '2019-09-26 11:12:36', '2019-09-26 11:12:36');
INSERT INTO `translatables` VALUES ('31', 'products', '7', 'description', '2019-09-26 11:12:36', '2019-09-26 11:12:36');
INSERT INTO `translatables` VALUES ('33', 'products', '8', 'title', '2019-09-26 11:16:12', '2019-09-26 11:16:12');
INSERT INTO `translatables` VALUES ('34', 'products', '8', 'description', '2019-09-26 11:16:12', '2019-09-26 11:16:12');
INSERT INTO `translatables` VALUES ('35', 'products', '8', 'short_description', '2019-09-26 11:16:12', '2019-09-26 11:16:12');
INSERT INTO `translatables` VALUES ('36', 'products', '9', 'title', '2019-09-26 11:19:42', '2019-09-26 11:19:42');
INSERT INTO `translatables` VALUES ('37', 'products', '9', 'description', '2019-09-26 11:19:42', '2019-09-26 11:19:42');
INSERT INTO `translatables` VALUES ('38', 'products', '9', 'short_description', '2019-09-26 11:19:42', '2019-09-26 11:19:42');
INSERT INTO `translatables` VALUES ('39', 'products', '10', 'title', '2019-09-26 11:21:28', '2019-09-26 11:21:28');
INSERT INTO `translatables` VALUES ('40', 'products', '10', 'description', '2019-09-26 11:21:28', '2019-09-26 11:21:28');
INSERT INTO `translatables` VALUES ('41', 'products', '10', 'short_description', '2019-09-26 11:21:28', '2019-09-26 11:21:28');
INSERT INTO `translatables` VALUES ('42', 'products', '11', 'title', '2019-09-26 11:22:07', '2019-09-26 11:22:07');
INSERT INTO `translatables` VALUES ('43', 'products', '11', 'description', '2019-09-26 11:22:07', '2019-09-26 11:22:07');
INSERT INTO `translatables` VALUES ('44', 'products', '11', 'short_description', '2019-09-26 11:22:08', '2019-09-26 11:22:08');
INSERT INTO `translatables` VALUES ('45', 'products', '12', 'title', '2019-09-26 11:23:21', '2019-09-26 11:23:21');
INSERT INTO `translatables` VALUES ('46', 'products', '12', 'description', '2019-09-26 11:23:22', '2019-09-26 11:23:22');
INSERT INTO `translatables` VALUES ('47', 'products', '12', 'short_description', '2019-09-26 11:23:22', '2019-09-26 11:23:22');
INSERT INTO `translatables` VALUES ('48', 'products', '13', 'title', '2019-09-26 11:24:03', '2019-09-26 11:24:03');
INSERT INTO `translatables` VALUES ('49', 'products', '13', 'description', '2019-09-26 11:24:03', '2019-09-26 11:24:03');
INSERT INTO `translatables` VALUES ('50', 'products', '13', 'short_description', '2019-09-26 11:24:03', '2019-09-26 11:24:03');
INSERT INTO `translatables` VALUES ('51', 'products', '14', 'title', '2019-09-26 11:29:06', '2019-09-26 11:29:06');
INSERT INTO `translatables` VALUES ('52', 'products', '14', 'description', '2019-09-26 11:29:07', '2019-09-26 11:29:07');
INSERT INTO `translatables` VALUES ('53', 'products', '14', 'short_description', '2019-09-26 11:29:07', '2019-09-26 11:29:07');
INSERT INTO `translatables` VALUES ('54', 'products', '15', 'title', '2019-09-26 11:30:07', '2019-09-26 11:30:07');
INSERT INTO `translatables` VALUES ('55', 'products', '15', 'description', '2019-09-26 11:30:07', '2019-09-26 11:30:07');
INSERT INTO `translatables` VALUES ('56', 'products', '15', 'short_description', '2019-09-26 11:30:07', '2019-09-26 11:30:07');
INSERT INTO `translatables` VALUES ('57', 'products', '16', 'title', '2019-09-26 11:31:23', '2019-09-26 11:31:23');
INSERT INTO `translatables` VALUES ('58', 'products', '16', 'description', '2019-09-26 11:31:23', '2019-09-26 11:31:23');
INSERT INTO `translatables` VALUES ('59', 'products', '16', 'short_description', '2019-09-26 11:31:23', '2019-09-26 11:31:23');
INSERT INTO `translatables` VALUES ('60', 'products', '17', 'title', '2019-09-26 11:31:55', '2019-09-26 11:31:55');
INSERT INTO `translatables` VALUES ('61', 'products', '17', 'description', '2019-09-26 11:31:55', '2019-09-26 11:31:55');
INSERT INTO `translatables` VALUES ('62', 'products', '17', 'short_description', '2019-09-26 11:31:56', '2019-09-26 11:31:56');
INSERT INTO `translatables` VALUES ('65', 'categories', '20', 'title', '2019-10-01 09:34:02', '2019-10-01 09:34:02');
INSERT INTO `translatables` VALUES ('66', 'brands', '4', 'title', '2019-10-01 09:34:32', '2019-10-01 09:34:32');
INSERT INTO `translatables` VALUES ('67', 'products', '18', 'title', '2019-10-01 09:36:07', '2019-10-01 09:36:07');
INSERT INTO `translatables` VALUES ('68', 'products', '18', 'description', '2019-10-01 09:36:07', '2019-10-01 09:36:07');
INSERT INTO `translatables` VALUES ('69', 'products', '18', 'short_description', '2019-10-01 09:36:07', '2019-10-01 09:36:07');
INSERT INTO `translatables` VALUES ('73', 'products', '20', 'title', '2019-10-01 13:33:37', '2019-10-01 13:33:37');
INSERT INTO `translatables` VALUES ('74', 'products', '20', 'description', '2019-10-01 13:33:37', '2019-10-01 13:33:37');
INSERT INTO `translatables` VALUES ('75', 'products', '20', 'short_description', '2019-10-01 13:33:37', '2019-10-01 13:33:37');
INSERT INTO `translatables` VALUES ('76', 'products', '21', 'title', '2019-10-01 13:39:25', '2019-10-01 13:39:25');
INSERT INTO `translatables` VALUES ('77', 'products', '21', 'description', '2019-10-01 13:39:25', '2019-10-01 13:39:25');
INSERT INTO `translatables` VALUES ('78', 'products', '21', 'short_description', '2019-10-01 13:39:25', '2019-10-01 13:39:25');
INSERT INTO `translatables` VALUES ('79', 'brands', '5', 'title', '2019-10-02 17:36:14', '2019-10-02 17:36:14');
INSERT INTO `translatables` VALUES ('89', 'products', '25', 'title', '2019-10-07 10:31:36', '2019-10-07 10:31:36');
INSERT INTO `translatables` VALUES ('90', 'products', '25', 'description', '2019-10-07 10:31:36', '2019-10-07 10:31:36');
INSERT INTO `translatables` VALUES ('91', 'products', '25', 'short_description', '2019-10-07 10:31:36', '2019-10-07 10:31:36');
INSERT INTO `translatables` VALUES ('93', 'products', '26', 'title', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `translatables` VALUES ('94', 'products', '26', 'description', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `translatables` VALUES ('95', 'products', '26', 'short_description', '2019-10-07 12:57:26', '2019-10-07 12:57:26');
INSERT INTO `translatables` VALUES ('96', 'products', '27', 'title', '2019-10-07 12:57:27', '2019-10-07 12:57:27');
INSERT INTO `translatables` VALUES ('97', 'products', '27', 'description', '2019-10-07 12:57:27', '2019-10-07 12:57:27');
INSERT INTO `translatables` VALUES ('98', 'products', '27', 'short_description', '2019-10-07 12:57:27', '2019-10-07 12:57:27');
INSERT INTO `translatables` VALUES ('99', 'products', '28', 'title', '2019-10-07 13:09:15', '2019-10-07 13:09:15');
INSERT INTO `translatables` VALUES ('100', 'products', '28', 'description', '2019-10-07 13:09:15', '2019-10-07 13:09:15');
INSERT INTO `translatables` VALUES ('101', 'products', '28', 'short_description', '2019-10-07 13:09:16', '2019-10-07 13:09:16');
INSERT INTO `translatables` VALUES ('102', 'products', '29', 'title', '2019-10-09 12:38:10', '2019-10-09 12:38:10');
INSERT INTO `translatables` VALUES ('103', 'products', '29', 'description', '2019-10-09 12:38:10', '2019-10-09 12:38:10');
INSERT INTO `translatables` VALUES ('104', 'products', '29', 'short_description', '2019-10-09 12:38:10', '2019-10-09 12:38:10');
INSERT INTO `translatables` VALUES ('105', 'products', '30', 'title', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `translatables` VALUES ('106', 'products', '30', 'description', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `translatables` VALUES ('107', 'products', '30', 'short_description', '2019-10-09 15:29:41', '2019-10-09 15:29:41');
INSERT INTO `translatables` VALUES ('108', 'products', '31', 'title', '2019-10-09 15:29:42', '2019-10-09 15:29:42');
INSERT INTO `translatables` VALUES ('109', 'products', '31', 'description', '2019-10-09 15:29:42', '2019-10-09 15:29:42');
INSERT INTO `translatables` VALUES ('110', 'products', '31', 'short_description', '2019-10-09 15:29:42', '2019-10-09 15:29:42');
INSERT INTO `translatables` VALUES ('126', 'products', '32', 'title', '2019-10-14 09:26:47', '2019-10-14 09:26:47');
INSERT INTO `translatables` VALUES ('127', 'products', '32', 'description', '2019-10-14 09:26:47', '2019-10-14 09:26:47');
INSERT INTO `translatables` VALUES ('128', 'products', '32', 'short_description', '2019-10-14 09:26:47', '2019-10-14 09:26:47');
INSERT INTO `translatables` VALUES ('129', 'products', '33', 'title', '2019-10-14 10:19:01', '2019-10-14 10:19:01');
INSERT INTO `translatables` VALUES ('130', 'products', '33', 'description', '2019-10-14 10:19:01', '2019-10-14 10:19:01');
INSERT INTO `translatables` VALUES ('131', 'products', '33', 'short_description', '2019-10-14 10:19:01', '2019-10-14 10:19:01');
INSERT INTO `translatables` VALUES ('132', 'products', '34', 'title', '2019-10-14 10:06:57', '2019-10-14 10:06:57');
INSERT INTO `translatables` VALUES ('133', 'products', '34', 'description', '2019-10-14 10:06:57', '2019-10-14 10:06:57');
INSERT INTO `translatables` VALUES ('134', 'products', '34', 'short_description', '2019-10-14 10:06:57', '2019-10-14 10:06:57');
INSERT INTO `translatables` VALUES ('135', 'products', '35', 'title', '2019-10-14 10:22:27', '2019-10-14 10:22:27');
INSERT INTO `translatables` VALUES ('136', 'products', '35', 'description', '2019-10-14 10:22:27', '2019-10-14 10:22:27');
INSERT INTO `translatables` VALUES ('137', 'products', '35', 'short_description', '2019-10-14 10:22:28', '2019-10-14 10:22:28');
INSERT INTO `translatables` VALUES ('138', 'products', '36', 'title', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `translatables` VALUES ('139', 'products', '36', 'description', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `translatables` VALUES ('140', 'products', '36', 'short_description', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `translatables` VALUES ('141', 'products', '37', 'title', '2019-10-14 11:53:24', '2019-10-14 11:53:24');
INSERT INTO `translatables` VALUES ('142', 'products', '37', 'description', '2019-10-14 11:53:25', '2019-10-14 11:53:25');
INSERT INTO `translatables` VALUES ('143', 'products', '37', 'short_description', '2019-10-14 11:53:25', '2019-10-14 11:53:25');
INSERT INTO `translatables` VALUES ('144', 'products', '38', 'title', '2019-10-27 18:28:15', '2019-10-27 18:28:15');
INSERT INTO `translatables` VALUES ('145', 'products', '38', 'description', '2019-10-27 18:28:15', '2019-10-27 18:28:15');
INSERT INTO `translatables` VALUES ('146', 'products', '38', 'short_description', '2019-10-27 18:28:15', '2019-10-27 18:28:15');
INSERT INTO `translatables` VALUES ('148', 'products', '39', 'title', '2019-10-27 18:58:12', '2019-10-27 18:58:12');
INSERT INTO `translatables` VALUES ('149', 'products', '39', 'description', '2019-10-27 18:58:12', '2019-10-27 18:58:12');
INSERT INTO `translatables` VALUES ('150', 'products', '39', 'short_description', '2019-10-27 18:58:13', '2019-10-27 18:58:13');

-- ----------------------------
-- Table structure for `types`
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('1', 'Advanced Editor', '2018-01-28 08:30:05', '2018-01-28 08:30:05');
INSERT INTO `types` VALUES ('2', 'Normal Editor', '2018-01-28 08:30:14', '2018-01-28 08:30:14');
INSERT INTO `types` VALUES ('3', 'Image', '2018-01-28 08:30:29', '2018-01-28 08:30:29');
INSERT INTO `types` VALUES ('4', 'Video', '2018-01-28 08:30:39', '2018-01-28 08:30:39');
INSERT INTO `types` VALUES ('5', 'Audio', '2018-01-28 08:30:47', '2018-01-28 08:30:47');
INSERT INTO `types` VALUES ('6', 'File Manager Uploads Extensions', '2018-01-28 08:30:57', '2018-01-28 08:30:57');
INSERT INTO `types` VALUES ('7', 'selector', '2019-02-11 13:18:52', '2019-02-11 13:18:52');
INSERT INTO `types` VALUES ('8', 'map', '2019-10-07 11:12:24', '2019-10-07 11:12:27');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'super admin', 'super_admin@ivas.com', '$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2', '', '01234567890', 'a8k7jBkGkY1sdI7C0SVacQQQHawUdHAhmncIrTRtGL4r9uo1dPUrdcESAhJY', '2017-11-09 06:13:14', '2018-11-26 08:11:50');
INSERT INTO `users` VALUES ('2', 'admin', 'admin@yahoo.com', '$2y$10$FCCehYgednF3ZgJqLpAhj.0j6lh8yERgIip8z.RckDrEA16OVeTB2', null, '01128023506', 'FQc5sdooWg8Ey14OepDn0n2Hr4cDfKdof90aID4Rkq37Mrzi5TZmVc3Ag7Q3', '2019-09-29 13:35:44', '2019-09-29 13:35:44');

-- ----------------------------
-- Table structure for `user_has_permissions`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_permissions`;
CREATE TABLE `user_has_permissions` (
  `user_id` int(10) unsigned NOT NULL,
  `permission_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`permission_id`),
  KEY `user_has_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_has_permissions
-- ----------------------------

-- ----------------------------
-- Table structure for `user_has_roles`
-- ----------------------------
DROP TABLE IF EXISTS `user_has_roles`;
CREATE TABLE `user_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`user_id`),
  KEY `user_has_roles_user_id_foreign` (`user_id`),
  CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of user_has_roles
-- ----------------------------
INSERT INTO `user_has_roles` VALUES ('1', '1');
INSERT INTO `user_has_roles` VALUES ('6', '2');
