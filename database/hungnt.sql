/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : hungnt

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2016-12-13 02:02:34
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `tbl_actionmapping`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_actionmapping`;
CREATE TABLE `tbl_actionmapping` (
  `action_id` int(11) NOT NULL,
  `action_name` varchar(200) NOT NULL,
  `security_check` int(19) DEFAULT NULL,
  PRIMARY KEY (`action_id`,`action_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_actionmapping
-- ----------------------------
INSERT INTO tbl_actionmapping VALUES ('0', 'Save', '0');
INSERT INTO tbl_actionmapping VALUES ('0', 'SavePriceBook', '1');
INSERT INTO tbl_actionmapping VALUES ('0', 'SaveVendor', '1');
INSERT INTO tbl_actionmapping VALUES ('1', 'DetailViewAjax', '1');
INSERT INTO tbl_actionmapping VALUES ('1', 'EditView', '0');
INSERT INTO tbl_actionmapping VALUES ('1', 'PriceBookEditView', '1');
INSERT INTO tbl_actionmapping VALUES ('1', 'QuickCreate', '1');
INSERT INTO tbl_actionmapping VALUES ('1', 'VendorEditView', '1');
INSERT INTO tbl_actionmapping VALUES ('2', 'Delete', '0');
INSERT INTO tbl_actionmapping VALUES ('2', 'DeletePriceBook', '1');
INSERT INTO tbl_actionmapping VALUES ('2', 'DeleteVendor', '1');
INSERT INTO tbl_actionmapping VALUES ('3', 'index', '0');
INSERT INTO tbl_actionmapping VALUES ('3', 'Popup', '1');
INSERT INTO tbl_actionmapping VALUES ('4', 'DetailView', '0');
INSERT INTO tbl_actionmapping VALUES ('4', 'PriceBookDetailView', '1');
INSERT INTO tbl_actionmapping VALUES ('4', 'TagCloud', '1');
INSERT INTO tbl_actionmapping VALUES ('4', 'VendorDetailView', '1');
INSERT INTO tbl_actionmapping VALUES ('5', 'Import', '0');
INSERT INTO tbl_actionmapping VALUES ('6', 'Export', '0');
INSERT INTO tbl_actionmapping VALUES ('8', 'Merge', '0');
INSERT INTO tbl_actionmapping VALUES ('9', 'ConvertLead', '0');
INSERT INTO tbl_actionmapping VALUES ('10', 'DuplicatesHandling', '0');

-- ----------------------------
-- Table structure for `tbl_group2role`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_group2role`;
CREATE TABLE `tbl_group2role` (
  `group_id` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`,`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_group2role
-- ----------------------------
INSERT INTO tbl_group2role VALUES ('2', 'H4');
INSERT INTO tbl_group2role VALUES ('3', 'H2');
INSERT INTO tbl_group2role VALUES ('4', 'H3');

-- ----------------------------
-- Table structure for `tbl_group2rs`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_group2rs`;
CREATE TABLE `tbl_group2rs` (
  `group_id` int(11) NOT NULL,
  `role_and_sub_id` varchar(255) NOT NULL,
  PRIMARY KEY (`group_id`,`role_and_sub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_group2rs
-- ----------------------------
INSERT INTO tbl_group2rs VALUES ('2', 'H5');
INSERT INTO tbl_group2rs VALUES ('3', 'H3');
INSERT INTO tbl_group2rs VALUES ('4', 'H3');

-- ----------------------------
-- Table structure for `tbl_groups`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_groups`;
CREATE TABLE `tbl_groups` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`group_id`),
  UNIQUE KEY `groups_groupname_idx` (`group_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_groups
-- ----------------------------
INSERT INTO tbl_groups VALUES ('2', 'Team Selling', 'Group Related to Sales');
INSERT INTO tbl_groups VALUES ('3', 'Marketing Group', 'Group Related to Marketing Activities');
INSERT INTO tbl_groups VALUES ('4', 'Support Group', 'Group Related to providing Support to Customers');

-- ----------------------------
-- Table structure for `tbl_menuitems`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menuitems`;
CREATE TABLE `tbl_menuitems` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `page_id` int(10) unsigned DEFAULT NULL,
  `position` int(10) unsigned NOT NULL DEFAULT '0',
  `target` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgt` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_root` tinyint(1) NOT NULL DEFAULT '0',
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `menu__menuitems_menu_id_foreign` (`menu_id`),
  CONSTRAINT `tbl_menuitems_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_menuitems
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_menuitem_translations`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menuitem_translations`;
CREATE TABLE `tbl_menuitem_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menuitem_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uri` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu__menuitem_translations_menuitem_id_locale_unique` (`menuitem_id`,`locale`),
  KEY `menu__menuitem_translations_locale_index` (`locale`),
  CONSTRAINT `tbl_menuitem_translations_ibfk_1` FOREIGN KEY (`menuitem_id`) REFERENCES `tbl_menuitems` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_menuitem_translations
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_menus`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menus`;
CREATE TABLE `tbl_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `primary` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_menus
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_menu_translations`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menu_translations`;
CREATE TABLE `tbl_menu_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `menu__menu_translations_menu_id_locale_unique` (`menu_id`,`locale`),
  KEY `menu__menu_translations_locale_index` (`locale`),
  CONSTRAINT `tbl_menu_translations_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `tbl_menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_menu_translations
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_parenttab`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_parenttab`;
CREATE TABLE `tbl_parenttab` (
  `parent_tab_id` int(11) NOT NULL,
  `parent_tab_label` varchar(100) NOT NULL,
  `sequence` int(10) NOT NULL,
  `visible` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`parent_tab_id`),
  KEY `parenttab_parenttabid_parenttabl_label_visible_idx` (`parent_tab_id`,`parent_tab_label`,`visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_parenttab
-- ----------------------------
INSERT INTO tbl_parenttab VALUES ('1', 'My Home Page', '1', '0');
INSERT INTO tbl_parenttab VALUES ('2', 'Marketing', '2', '0');
INSERT INTO tbl_parenttab VALUES ('3', 'Sales', '3', '0');
INSERT INTO tbl_parenttab VALUES ('4', 'Support', '4', '0');
INSERT INTO tbl_parenttab VALUES ('5', 'Analytics', '5', '0');
INSERT INTO tbl_parenttab VALUES ('6', 'Inventory', '6', '0');
INSERT INTO tbl_parenttab VALUES ('7', 'Tools', '7', '0');
INSERT INTO tbl_parenttab VALUES ('8', 'Settings', '8', '0');

-- ----------------------------
-- Table structure for `tbl_parenttabrel`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_parenttabrel`;
CREATE TABLE `tbl_parenttabrel` (
  `parent_tab_id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `sequence` int(3) NOT NULL,
  KEY `parenttabrel_tabid_parenttabid_idx` (`tab_id`,`parent_tab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_parenttabrel
-- ----------------------------
INSERT INTO tbl_parenttabrel VALUES ('1', '9', '2');
INSERT INTO tbl_parenttabrel VALUES ('1', '28', '4');
INSERT INTO tbl_parenttabrel VALUES ('1', '3', '1');
INSERT INTO tbl_parenttabrel VALUES ('3', '7', '1');
INSERT INTO tbl_parenttabrel VALUES ('3', '6', '2');
INSERT INTO tbl_parenttabrel VALUES ('3', '4', '3');
INSERT INTO tbl_parenttabrel VALUES ('3', '2', '4');
INSERT INTO tbl_parenttabrel VALUES ('3', '20', '5');
INSERT INTO tbl_parenttabrel VALUES ('3', '22', '6');
INSERT INTO tbl_parenttabrel VALUES ('3', '23', '7');
INSERT INTO tbl_parenttabrel VALUES ('3', '19', '8');
INSERT INTO tbl_parenttabrel VALUES ('3', '8', '9');
INSERT INTO tbl_parenttabrel VALUES ('4', '13', '1');
INSERT INTO tbl_parenttabrel VALUES ('4', '15', '2');
INSERT INTO tbl_parenttabrel VALUES ('4', '6', '3');
INSERT INTO tbl_parenttabrel VALUES ('4', '4', '4');
INSERT INTO tbl_parenttabrel VALUES ('4', '8', '5');
INSERT INTO tbl_parenttabrel VALUES ('5', '1', '2');
INSERT INTO tbl_parenttabrel VALUES ('5', '25', '1');
INSERT INTO tbl_parenttabrel VALUES ('6', '14', '1');
INSERT INTO tbl_parenttabrel VALUES ('6', '18', '2');
INSERT INTO tbl_parenttabrel VALUES ('6', '19', '3');
INSERT INTO tbl_parenttabrel VALUES ('6', '21', '4');
INSERT INTO tbl_parenttabrel VALUES ('6', '22', '5');
INSERT INTO tbl_parenttabrel VALUES ('6', '20', '6');
INSERT INTO tbl_parenttabrel VALUES ('6', '23', '7');
INSERT INTO tbl_parenttabrel VALUES ('7', '24', '1');
INSERT INTO tbl_parenttabrel VALUES ('7', '27', '2');
INSERT INTO tbl_parenttabrel VALUES ('7', '8', '3');
INSERT INTO tbl_parenttabrel VALUES ('2', '26', '1');
INSERT INTO tbl_parenttabrel VALUES ('2', '6', '2');
INSERT INTO tbl_parenttabrel VALUES ('2', '4', '3');
INSERT INTO tbl_parenttabrel VALUES ('2', '28', '4');
INSERT INTO tbl_parenttabrel VALUES ('4', '28', '7');
INSERT INTO tbl_parenttabrel VALUES ('2', '7', '5');
INSERT INTO tbl_parenttabrel VALUES ('2', '9', '6');
INSERT INTO tbl_parenttabrel VALUES ('4', '9', '8');
INSERT INTO tbl_parenttabrel VALUES ('2', '8', '8');
INSERT INTO tbl_parenttabrel VALUES ('3', '9', '11');

-- ----------------------------
-- Table structure for `tbl_persistences`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_persistences`;
CREATE TABLE `tbl_persistences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `persistences_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_persistences
-- ----------------------------
INSERT INTO tbl_persistences VALUES ('8', '2', 'uGeYEkn7IbYREYPKHPcCoxOXCZv9s2Js', '2016-12-06 22:34:12', '2016-12-06 22:34:12');
INSERT INTO tbl_persistences VALUES ('9', '2', 'vghVhtvYNih8dm5dK0C66iapF2nG0Ng0', '2016-12-06 22:42:19', '2016-12-06 22:42:19');
INSERT INTO tbl_persistences VALUES ('10', '2', 'bpxPfmLb9lTgiJxQYusHLRxsBDRfi9KB', '2016-12-06 22:44:36', '2016-12-06 22:44:36');
INSERT INTO tbl_persistences VALUES ('11', '2', 'tqjFYc8PXrbH9Yo6nzPTaZQ4PshFMsiu', '2016-12-07 15:58:13', '2016-12-07 15:58:13');
INSERT INTO tbl_persistences VALUES ('12', '2', 'wkpt8YofsoGa4pzpO1cVpaJSjMrVlrNU', '2016-12-10 22:03:10', '2016-12-10 22:03:10');
INSERT INTO tbl_persistences VALUES ('13', '2', 'joEM3IL1aMWNQ1Z0rKBFMzr6neEqWu8B', '2016-12-10 22:04:13', '2016-12-10 22:04:13');
INSERT INTO tbl_persistences VALUES ('14', '2', 'G3ESQwmci8pfGq85KV4defzU5QHUko9D', '2016-12-10 23:07:37', '2016-12-10 23:07:37');
INSERT INTO tbl_persistences VALUES ('15', '2', 'fhqb0AT1IBXlX5feYVOXe2ruxIkAQ19v', '2016-12-11 09:10:21', '2016-12-11 09:10:21');
INSERT INTO tbl_persistences VALUES ('16', '2', 'esT94nPIfB2rfOuZhn5L1zDrg0B2jhlH', '2016-12-11 09:43:07', '2016-12-11 09:43:07');
INSERT INTO tbl_persistences VALUES ('17', '2', '3L5BYBuTiExzmvvOHjRe57CceMsoyt6w', '2016-12-12 15:38:08', '2016-12-12 15:38:08');
INSERT INTO tbl_persistences VALUES ('18', '2', 'WqYs11IbosJsbOuvL9tAaxIrwtoPPnfx', '2016-12-12 16:09:06', '2016-12-12 16:09:06');

-- ----------------------------
-- Table structure for `tbl_profile`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profile`;
CREATE TABLE `tbl_profile` (
  `profile_id` int(10) NOT NULL AUTO_INCREMENT,
  `profile_name` varchar(50) NOT NULL,
  `description` text,
  PRIMARY KEY (`profile_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_profile
-- ----------------------------
INSERT INTO tbl_profile VALUES ('1', 'Administrator', 'Admin Profile');
INSERT INTO tbl_profile VALUES ('2', 'Sales Profile', 'Profile Related to Sales');
INSERT INTO tbl_profile VALUES ('3', 'Support Profile', 'Profile Related to Support');
INSERT INTO tbl_profile VALUES ('4', 'Guest Profile', 'Guest Profile for Test Users');

-- ----------------------------
-- Table structure for `tbl_profile2tab`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profile2tab`;
CREATE TABLE `tbl_profile2tab` (
  `profile_id` int(11) DEFAULT NULL,
  `tab_id` int(10) DEFAULT NULL,
  `permissions` int(10) NOT NULL DEFAULT '0',
  KEY `profile2tab_profileid_tabid_idx` (`profile_id`,`tab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_profile2tab
-- ----------------------------
INSERT INTO tbl_profile2tab VALUES ('1', '1', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '2', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '3', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '4', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '6', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '7', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '8', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '9', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '10', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '13', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '14', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '15', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '16', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '18', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '19', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '20', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '21', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '22', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '23', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '24', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '25', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '26', '0');
INSERT INTO tbl_profile2tab VALUES ('1', '27', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '1', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '2', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '3', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '4', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '6', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '7', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '8', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '9', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '10', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '13', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '14', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '15', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '16', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '18', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '19', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '20', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '21', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '22', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '23', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '24', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '25', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '26', '0');
INSERT INTO tbl_profile2tab VALUES ('2', '27', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '1', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '2', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '3', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '4', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '6', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '7', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '8', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '9', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '10', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '13', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '14', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '15', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '16', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '18', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '19', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '20', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '21', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '22', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '23', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '24', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '25', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '26', '0');
INSERT INTO tbl_profile2tab VALUES ('3', '27', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '1', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '2', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '3', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '4', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '6', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '7', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '8', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '9', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '10', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '13', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '14', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '15', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '16', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '18', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '19', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '20', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '21', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '22', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '23', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '24', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '25', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '26', '0');
INSERT INTO tbl_profile2tab VALUES ('4', '27', '0');

-- ----------------------------
-- Table structure for `tbl_profile2utility`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_profile2utility`;
CREATE TABLE `tbl_profile2utility` (
  `profile_id` int(11) NOT NULL,
  `tab_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `permission` int(1) DEFAULT NULL,
  PRIMARY KEY (`profile_id`,`tab_id`,`activity_id`),
  KEY `profile2utility_profileid_tabid_activityid_idx` (`profile_id`,`tab_id`,`activity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_profile2utility
-- ----------------------------
INSERT INTO tbl_profile2utility VALUES ('1', '2', '5', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '2', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '2', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '4', '5', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '4', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '4', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '4', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '6', '5', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '6', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '6', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '6', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '7', '5', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '7', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '7', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '7', '9', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '7', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '8', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '13', '5', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '13', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '13', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '13', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '14', '5', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '14', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '14', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '18', '5', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '18', '6', '0');
INSERT INTO tbl_profile2utility VALUES ('1', '18', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '2', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '2', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '2', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '4', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '4', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '4', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '4', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '6', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '6', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '6', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '6', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '7', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '7', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '7', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '7', '9', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '7', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '8', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '13', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '13', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '13', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '13', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '14', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '14', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '14', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('2', '18', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '18', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('2', '18', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '2', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '2', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '2', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '4', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '4', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '4', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '4', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '6', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '6', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '6', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '6', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '7', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '7', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '7', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '7', '9', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '7', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '8', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '13', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '13', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '13', '8', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '13', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '14', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '14', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '14', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('3', '18', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '18', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('3', '18', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '2', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '2', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '2', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '4', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '4', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '4', '8', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '4', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '6', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '6', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '6', '8', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '6', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '7', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '7', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '7', '8', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '7', '9', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '7', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '8', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '13', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '13', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '13', '8', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '13', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '14', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '14', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '14', '10', '0');
INSERT INTO tbl_profile2utility VALUES ('4', '18', '5', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '18', '6', '1');
INSERT INTO tbl_profile2utility VALUES ('4', '18', '10', '0');

-- ----------------------------
-- Table structure for `tbl_role`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_role`;
CREATE TABLE `tbl_role` (
  `role_id` varchar(255) NOT NULL,
  `role_name` varchar(200) DEFAULT NULL,
  `parent_role` varchar(255) DEFAULT NULL,
  `depth` int(19) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_role
-- ----------------------------
INSERT INTO tbl_role VALUES ('H1', 'Organisation', 'H1', '0');
INSERT INTO tbl_role VALUES ('H2', 'CEO', 'H1::H2', '1');
INSERT INTO tbl_role VALUES ('H3', 'Vice President', 'H1::H2::H3', '2');
INSERT INTO tbl_role VALUES ('H4', 'Sales Manager', 'H1::H2::H3::H4', '3');
INSERT INTO tbl_role VALUES ('H5', 'Sales Person', 'H1::H2::H3::H4::H5', '4');
INSERT INTO tbl_role VALUES ('N1', 'Account FrontEnd', 'N1', '0');

-- ----------------------------
-- Table structure for `tbl_role2profile`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_role2profile`;
CREATE TABLE `tbl_role2profile` (
  `role_id` varchar(255) NOT NULL,
  `profile_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`profile_id`),
  KEY `role2profile_roleid_profileid_idx` (`role_id`,`profile_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_role2profile
-- ----------------------------
INSERT INTO tbl_role2profile VALUES ('H2', '1');
INSERT INTO tbl_role2profile VALUES ('H3', '2');
INSERT INTO tbl_role2profile VALUES ('H4', '2');
INSERT INTO tbl_role2profile VALUES ('H5', '2');

-- ----------------------------
-- Table structure for `tbl_settings`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_settings`;
CREATE TABLE `tbl_settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `plainValue` text COLLATE utf8_unicode_ci,
  `isTranslatable` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_settings
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_setting_translations`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting_translations`;
CREATE TABLE `tbl_setting_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `setting_id` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `setting__setting_translations_setting_id_locale_unique` (`setting_id`,`locale`),
  KEY `setting__setting_translations_locale_index` (`locale`),
  CONSTRAINT `tbl_setting_translations_ibfk_1` FOREIGN KEY (`setting_id`) REFERENCES `tbl_settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tbl_setting_translations
-- ----------------------------

-- ----------------------------
-- Table structure for `tbl_tab`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tab`;
CREATE TABLE `tbl_tab` (
  `tab_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(25) NOT NULL,
  `presence` int(19) NOT NULL DEFAULT '1',
  `tab_sequence` int(10) DEFAULT NULL,
  `tab_label` varchar(25) NOT NULL,
  `modifiedby` int(19) DEFAULT NULL,
  `modifiedtime` int(19) DEFAULT NULL,
  `customized` int(19) DEFAULT NULL,
  `ownedby` int(19) DEFAULT NULL,
  `isentitytype` int(11) NOT NULL DEFAULT '1',
  `parent` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`tab_id`),
  UNIQUE KEY `tab_name_idx` (`name`),
  KEY `tab_modifiedby_idx` (`modifiedby`),
  KEY `tab_tabid_idx` (`tab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_tab
-- ----------------------------
INSERT INTO tbl_tab VALUES ('1', 'Dashboard', '0', '12', 'Dashboards', null, null, '0', '1', '0', 'Analytics');
INSERT INTO tbl_tab VALUES ('2', 'Potentials', '0', '7', 'Potentials', null, null, '0', '0', '1', 'Sales');
INSERT INTO tbl_tab VALUES ('3', 'Home', '0', '1', 'Home', null, null, '0', '1', '0', null);
INSERT INTO tbl_tab VALUES ('4', 'Contacts', '0', '6', 'Contacts', null, null, '0', '0', '1', 'Sales');
INSERT INTO tbl_tab VALUES ('6', 'Accounts', '0', '5', 'Accounts', null, null, '0', '0', '1', 'Sales');
INSERT INTO tbl_tab VALUES ('7', 'Leads', '0', '4', 'Leads', null, null, '0', '0', '1', 'Sales');
INSERT INTO tbl_tab VALUES ('8', 'Documents', '0', '9', 'Documents', null, null, '0', '0', '1', 'Tools');
INSERT INTO tbl_tab VALUES ('9', 'Calendar', '0', '3', 'Calendar', null, null, '0', '0', '1', 'Tools');
INSERT INTO tbl_tab VALUES ('10', 'Emails', '0', '10', 'Emails', null, null, '0', '1', '1', 'Tools');
INSERT INTO tbl_tab VALUES ('13', 'HelpDesk', '0', '11', 'HelpDesk', null, null, '0', '0', '1', 'Support');
INSERT INTO tbl_tab VALUES ('14', 'Products', '0', '8', 'Products', null, null, '0', '0', '1', 'Inventory');
INSERT INTO tbl_tab VALUES ('15', 'Faq', '0', '-1', 'Faq', null, null, '0', '1', '1', 'Support');
INSERT INTO tbl_tab VALUES ('16', 'Events', '2', '-1', 'Events', null, null, '0', '0', '1', null);
INSERT INTO tbl_tab VALUES ('18', 'Vendors', '0', '-1', 'Vendors', null, null, '0', '1', '1', 'Inventory');
INSERT INTO tbl_tab VALUES ('19', 'PriceBooks', '0', '-1', 'PriceBooks', null, null, '0', '1', '1', 'Inventory');
INSERT INTO tbl_tab VALUES ('20', 'Quotes', '0', '-1', 'Quotes', null, null, '0', '0', '1', 'Sales');
INSERT INTO tbl_tab VALUES ('21', 'PurchaseOrder', '0', '-1', 'PurchaseOrder', null, null, '0', '0', '1', 'Inventory');
INSERT INTO tbl_tab VALUES ('22', 'SalesOrder', '0', '-1', 'SalesOrder', null, null, '0', '0', '1', 'Sales');
INSERT INTO tbl_tab VALUES ('23', 'Invoice', '0', '-1', 'Invoice', null, null, '0', '0', '1', 'Sales');
INSERT INTO tbl_tab VALUES ('24', 'Rss', '0', '-1', 'Rss', null, null, '0', '1', '0', 'Tools');
INSERT INTO tbl_tab VALUES ('25', 'Reports', '0', '-1', 'Reports', null, null, '0', '1', '0', 'Analytics');
INSERT INTO tbl_tab VALUES ('26', 'Campaigns', '0', '-1', 'Campaigns', null, null, '0', '0', '1', 'Marketing');
INSERT INTO tbl_tab VALUES ('27', 'Portal', '0', '-1', 'Portal', null, null, '0', '1', '0', 'Tools');
INSERT INTO tbl_tab VALUES ('28', 'Webmails', '0', '-1', 'Webmails', null, null, '0', '1', '1', null);
INSERT INTO tbl_tab VALUES ('29', 'Users', '0', '-1', 'Users', null, null, '0', '1', '0', null);

-- ----------------------------
-- Table structure for `tbl_user2role`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user2role`;
CREATE TABLE `tbl_user2role` (
  `user_id` int(11) NOT NULL,
  `role_id` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user2role_roleid_idx` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_user2role
-- ----------------------------
INSERT INTO tbl_user2role VALUES ('1', 'H2');
INSERT INTO tbl_user2role VALUES ('2', 'N1');

-- ----------------------------
-- Table structure for `tbl_users`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(200) DEFAULT NULL,
  `hash` varchar(32) DEFAULT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `reports_to_id` varchar(36) DEFAULT NULL,
  `is_admin` varchar(3) DEFAULT '0',
  `currency_id` int(19) NOT NULL DEFAULT '1',
  `description` text,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_user_id` varchar(36) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `phone_work` varchar(50) DEFAULT NULL,
  `phone_other` varchar(50) DEFAULT NULL,
  `phone_fax` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `secondaryemail` varchar(100) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `signature` varchar(1000) DEFAULT NULL,
  `address_street` varchar(150) DEFAULT NULL,
  `address_city` varchar(100) DEFAULT NULL,
  `address_state` varchar(100) DEFAULT NULL,
  `address_country` varchar(25) DEFAULT NULL,
  `address_postalcode` varchar(9) DEFAULT NULL,
  `tz` varchar(30) DEFAULT NULL,
  `holidays` varchar(60) DEFAULT NULL,
  `namedays` varchar(60) DEFAULT NULL,
  `workdays` varchar(30) DEFAULT NULL,
  `weekstart` int(11) DEFAULT NULL,
  `date_format` varchar(200) DEFAULT NULL,
  `hour_format` varchar(30) DEFAULT 'am/pm',
  `imagename` varchar(250) DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0',
  `confirm_password` varchar(300) DEFAULT NULL,
  `accesskey` varchar(36) DEFAULT NULL,
  `language` varchar(36) DEFAULT NULL,
  `time_zone` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_user_password_idx` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO tbl_users VALUES ('1', '$1$ad000000$hzXFXvL3XVlnUE/X.1n9t/', 'd41d8cd98f00b204e9800998ecf8427e', '', 'Administrator', '', 'on', '1', '', '2016-10-02 00:47:46', null, '', '', '', '', '', 'butachi@live.com', '', 'Active', '', '', '', '', '', '', null, null, null, null, null, 'mm-dd-yyyy', 'am/pm', '', '0', '$1$ad000000$nYTnfhTZRmUP.wQT9y1AE.', 'OCqYSlyjmxpvLjcn', 'en_us', 'America/Los_Angeles', null, null);
INSERT INTO tbl_users VALUES ('2', '$2y$10$eZw6HdoT4GA/QV9UBhssmeNfOTDbqO0nY7hIm7cUUq/ypaYTYis/W', null, null, null, null, '0', '1', null, '2016-12-12 16:09:07', null, null, null, null, null, null, 'hungtk49@yahoo.com', null, null, null, null, null, null, null, null, null, null, null, null, null, null, 'am/pm', null, '0', null, null, null, null, '2016-12-06 20:41:52', '2016-12-12 16:09:07');

-- ----------------------------
-- Table structure for `tbl_users2group`
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users2group`;
CREATE TABLE `tbl_users2group` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`group_id`,`user_id`),
  KEY `users2group_groupname_uerid_idx` (`group_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_users2group
-- ----------------------------
INSERT INTO tbl_users2group VALUES ('3', '1');
