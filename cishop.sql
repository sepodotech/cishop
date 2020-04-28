-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2020 at 11:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_access_menu`
--

CREATE TABLE `admin_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_access_menu`
--

INSERT INTO `admin_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 2, 4),
(6, 1, 5),
(7, 2, 5);

-- --------------------------------------------------------

--
-- Table structure for table `admin_menu`
--

CREATE TABLE `admin_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_menu`
--

INSERT INTO `admin_menu` (`id`, `menu`) VALUES
(1, 'Admin utama'),
(2, 'user role'),
(3, 'Menu Management'),
(4, 'Transaksi'),
(5, 'Produk');

-- --------------------------------------------------------

--
-- Table structure for table `admin_submenu`
--

CREATE TABLE `admin_submenu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_submenu`
--

INSERT INTO `admin_submenu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'userAccess/dashboard', 'fas fa-fw fa-tachometer-alt', 1),
(2, 3, 'Menu Utama', 'adminMenu/index', 'far fa-fw fa-folder', 1),
(3, 3, 'Sub Menu', 'adminSubMenu/index', 'far fa-fw fa-folder-open', 1),
(4, 4, 'Pesanan', 'useraccess/admin', 'fas fa-fw fa-shopping-cart', 1),
(5, 2, 'User Role', 'adminSetUser/index', 'fas fa-fw fa-user-edit', 1),
(6, 5, 'Produk', 'adminProduct/index', 'fas fa-fw fa-box-open', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_url` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `address_id` varchar(100) NOT NULL,
  `detail` varchar(150) NOT NULL,
  `subtotal` varchar(100) NOT NULL,
  `created_at` varchar(100) DEFAULT NULL,
  `order_closed` int(1) NOT NULL,
  `order_fulfilment_code` varchar(150) NOT NULL,
  `delivery_address` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT 'default.jpg',
  `name` varchar(100) NOT NULL,
  `category_id` varchar(128) NOT NULL,
  `description` varchar(225) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `member_price` varchar(100) NOT NULL,
  `weight` varchar(100) DEFAULT NULL,
  `shipping_origin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `category_id`, `description`, `quantity`, `price`, `member_price`, `weight`, `shipping_origin`) VALUES
(1, 'default.jpg', 'test', '1', 'sahdchdksbkjdsbcjkhclaksnkahckhsdcxksnczkjcxhksahdkahdjanxkjhckahsdcjkabsckjbakjjdhkahsdkajcxaskj', '1', '10000', '122423', '112321', 0),
(2, '99187bd1033c5992fe6dcacb2d4c765d.jpg', 'firda birel', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(3, '98010df42c9e7af5087dbd2375783b7d.jpg', 'firda coklat', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(4, '02aaf597b2b5b7171056ca0d0f52d2c8.jpg', 'firda emerald', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(5, '1c58d2decfda807c95ddff5b99c31f8e.jpg', 'firda hijau botol', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(6, '70270ff31d2c0bf08ba8ba258d6aa667.jpg', 'firda maroon', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(7, '911c2f9d807a05de02814807c5757bbb.jpg', 'firda navi', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(8, '947e21fdd363c37c26f801ed59c93e86.jpg', 'firda orange bata', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(9, 'da9e9daec295e7ff2f5051569295761d.jpg', 'firda salmon', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0),
(10, 'c8b9d977769e4d5df884aeba86c0f796.jpg', 'firda tosca', '1', ' GAMIS FIRDA by Swarga Hijab  BAHAN : Royal Twist Karakteristik bahan  - Bahannya Lembut, Dingin, Jatuh, Menyerap keringat dan sangat nyaman di pakai.   DETAIL - Lebar bawah 2.5 Meter - Resleting depan - Lipid kombinasi bagia', '120', '375000', '300000', '1000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(5) NOT NULL,
  `member_status` int(1) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `image`, `password`, `role_id`, `member_status`, `is_active`, `date_created`) VALUES
(4, 'habib', 'habib@gmail.com', 'default.jpg', '$2y$10$TmYQSy3pJuRja7BC7gMrMemy3yL6VfkrOnM9cvmy6r0RTeeLg/bsm', 1, 0, 1, 0),
(6, 'isna', 'isna@gmail.com', 'default.jpg', '$2y$10$fYr7vK0Fs5h6GorFpNX1JOxnpV8D1WIq8RBnznmf5ArH2uC6rdXVq', 2, 0, 1, 0),
(7, 'isnatul', 'isnatul@gmail.com', 'default.jpg', '$2y$10$d.Z8FR4lA8laXdL4OUyK9ui1HSmeQ0fumTGeVRPn6.ovIprXj5aSi', 3, 0, 0, 1583337842),
(8, 'pelanggan', 'pelanggan1@gmail.com', 'default.jpg', '$2y$10$UsjzPxn90D6zux.7ybs2vOI0TJdVD/AR1FPafK6O5JyAPSYpr/o.6', 3, 0, 0, 1588082617);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL COMMENT 'foreign key user table',
  `phone` varchar(20) NOT NULL,
  `province` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `subdistrict` varchar(50) NOT NULL,
  `complite_address` varchar(200) NOT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `latitude` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'CEO'),
(2, 'admin'),
(3, 'member'),
(4, 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `valid_from_date` int(10) UNSIGNED NOT NULL,
  `valid_to_date` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1-enabled, 0-disabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_menu`
--
ALTER TABLE `admin_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_submenu`
--
ALTER TABLE `admin_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_access_menu`
--
ALTER TABLE `admin_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin_menu`
--
ALTER TABLE `admin_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_submenu`
--
ALTER TABLE `admin_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
