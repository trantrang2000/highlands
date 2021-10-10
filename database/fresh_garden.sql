-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 04:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fresh_garden`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `display_order` int(11) NOT NULL,
  `is_external` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `thumbnail`, `link`, `display_order`, `is_external`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Abc', 'public/images/upload/banner/1636184219home1-slide1.jpg', '', 1, 0, 1, '2021-11-06 07:36:59', '2021-11-06 07:36:59'),
(10, 'Xyz', 'public/images/upload/banner/1636184231home1-slide2.jpg', '', 2, 0, 1, '2021-11-06 07:37:11', '2021-11-06 07:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `display_order` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `thumbnail`, `parent_id`, `type`, `status`, `display_order`, `created_at`, `updated_at`) VALUES
(21, 'Bánh mì tươi', NULL, NULL, 1, 1, 1, '2021-11-06 07:37:39', '2021-11-06 07:37:39'),
(22, 'Bánh kem tươi', NULL, NULL, 1, 1, 2, '2021-11-06 07:37:55', '2021-11-06 07:37:55');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `title`, `status`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Sáng', 1, 'http://localhost/fresh-garden/public/images/upload/collection/collection1.jpg', '2021-09-03 10:53:11', '2021-09-03 10:53:11'),
(2, 'Trưa', 1, 'http://localhost/fresh-garden/public/images/upload/collection/collection2.jpg', '2021-09-03 10:54:52', '2021-09-03 10:54:52'),
(3, 'Chiều', 1, 'http://localhost/fresh-garden/public/images/upload/collection/collection3.jpg', '2021-09-03 10:55:00', '2021-09-03 10:55:00'),
(4, 'Tối', 1, 'http://localhost/fresh-garden/public/images/upload/collection/collection4.jpg', '2021-09-03 10:55:08', '2021-09-03 10:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_money` int(11) NOT NULL,
  `total_quantity` int(11) NOT NULL,
  `payment_method_id` int(11) DEFAULT NULL,
  `shipping_method_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_money`, `total_quantity`, `payment_method_id`, `shipping_method_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 75000, 3, 1, 1, 3, '2021-11-06 09:09:03', '2021-11-06 09:09:03'),
(7, 1, 75000, 3, 1, 1, 1, '2021-11-06 14:54:06', '2021-11-06 14:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 6, 11, 25000, 3, '2021-11-06 09:09:03', '2021-11-06 09:09:03'),
(6, 7, 11, 25000, 3, '2021-11-06 14:54:06', '2021-11-06 14:54:06');

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Thanh toán tiền mặt khi nhận hàng', '2021-11-06 07:31:33', '2021-11-06 07:31:33'),
(2, 'Thanh toán bằng chuyển khoản', '2021-11-06 07:31:33', '2021-11-06 07:31:33');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `original_price` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `include` varchar(255) DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `is_hot` tinyint(4) NOT NULL DEFAULT 0,
  `views` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `collection_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `original_price`, `price`, `description`, `content`, `include`, `thumbnail`, `status`, `quantity`, `is_hot`, `views`, `category_id`, `collection_id`, `created_at`, `updated_at`) VALUES
(11, 'Bánh tươi xúc xích phô mai', 30000, 25000, 'Bánh tươi sử dụng nguyên liệu cao cấp. Chiếc bánh hình tam giác được kẹp xúc xích hòa quyện lớp phô mai tươi', '<p>Nội dung….</p>', 'Bột bánh burger (bột mỳ, men, đường, muối, trứng, bơ, nước), xúc xích (thịt gà & thịt lợn),phô mai, sốt bơ tỏi, sốt Mayonnaise, bột bánh gối', 'public/images/upload/product/1636184347hummingbird-printed-t-shirt.jpg', 1, 5, 1, NULL, 21, 1, '2021-11-06 07:39:07', '2021-11-06 07:39:07'),
(12, 'Bánh tươi xúc xích', 0, 20000, 'Bánh tươi sử dụng nguyên liệu cao cấp. Vỏ bánh mềm mịn cuộn lớp xúc xích và phomai tươi.\r\n', '<p>Nội dung…</p>', 'Bột bánh mỳ tươi (bột mỳ, đường, men, sữa bột, trứng gà, muối, bơ, nước), xúc xích (thịt gà & thịt lợn), phomai, hành lá', 'public/images/upload/product/1636184393the-adventure-begins-framed-poster.jpg', 1, 11, 0, NULL, 21, 2, '2021-11-06 07:39:53', '2021-11-06 07:39:53'),
(13, 'Bánh tươi nhân kem vani', 50000, 35000, 'Bánh tươi sử dụng nguyên liệu cao cấp. Mặt bánh phủ xúc xích và ngô hạt\r\n', '<p>Bánh tươi sử dụng nguyên liệu cao cấp. Mặt bánh phủ xúc xích và ngô hạt</p>', 'Bột bánh mỳ tươi (bột mỳ, đường, men, sữa bột, trứng gà, muối, bơ, nước) phomai, xúc xích, ngô hạt, sốt Mayonnaise                      ', 'public/images/upload/product/1636184470the-best-is-yet-to-come-framed-poster.jpg', 1, 100, 1, NULL, 21, 3, '2021-11-06 07:41:10', '2021-11-06 07:41:10'),
(14, 'Bánh tươi cuộn xúc xích', 44000, 34000, 'Bánh tươi sử dụng nguyên liệu cao cấp. Vỏ bánh mềm mịn cuộn xúc xích đặc biêt.\r\n', '<p>Bánh tươi sử dụng nguyên liệu cao cấp. Vỏ bánh mềm mịn cuộn xúc xích đặc biêt.</p>', 'Bột bánh mỳ tươi (bột mỳ, đường, men, sữa bột, trứng gà, muối, bơ, nước), xúc xích, bột ớt không cay                      ', 'public/images/upload/product/1636184510today-is-a-good-day-framed-poster.jpg', 1, 100, 1, NULL, 21, 4, '2021-11-06 07:41:50', '2021-11-06 07:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_methods`
--

CREATE TABLE `shipping_methods` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_methods`
--

INSERT INTO `shipping_methods` (`id`, `title`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Giao tiêu chuẩn (3 - 5 ngày)', 30000, '2021-11-06 07:32:28', '2021-11-06 07:32:28'),
(2, 'Hoả tốc (giao ngay trong ngày)', 50000, '2021-11-06 07:32:28', '2021-11-06 07:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `role` tinyint(4) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `address`, `phone`, `thumbnail`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin', '123', 'admin@gmail.com', 'hanoi', '0973793711', NULL, 2, 'a206da55c9956f9a747a95e7e32d16b8', '2021-09-05 10:55:52', '2021-09-05 10:55:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `payment_method_id_fk` (`payment_method_id`),
  ADD KEY `shipping_method_id_fk` (`shipping_method_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id_fk` (`order_id`),
  ADD KEY `product_id_fkk` (`product_id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id_fk` (`category_id`),
  ADD KEY `collection_id_fkk` (`collection_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id_fk` (`product_id`);

--
-- Indexes for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shipping_methods`
--
ALTER TABLE `shipping_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `payment_method_id_fk` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shipping_method_id_fk` FOREIGN KEY (`shipping_method_id`) REFERENCES `shipping_methods` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id_fk` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id_fkk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `collection_id_fkk` FOREIGN KEY (`collection_id`) REFERENCES `collections` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
