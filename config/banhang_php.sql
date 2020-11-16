-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2019 at 10:06 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banhang_php`
--

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`id`, `user_id`, `status`) VALUES
(9, 1, 2),
(10, 1, 2),
(11, 3, 1),
(12, 1, 2),
(13, 1, 2),
(14, 1, 1),
(15, 1, 1),
(16, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Cart_item`
--

CREATE TABLE `Cart_item` (
  `id` int(11) NOT NULL,
  `id_card` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `Cart_item`
--

INSERT INTO `Cart_item` (`id`, `id_card`, `id_item`, `date`) VALUES
(14, 9, 11, '2019-04-03 11:25:32'),
(15, 9, 10, '2019-04-03 11:25:35'),
(17, 10, 3, '2019-04-03 11:28:20'),
(18, 11, 13, '2019-04-04 09:16:55'),
(19, 11, 11, '2019-04-04 09:16:58'),
(25, 12, 3, '2019-04-04 02:58:26'),
(26, 13, 20, '2019-04-04 03:08:58'),
(36, 14, 18, '2019-04-16 10:57:45'),
(37, 14, 17, '2019-04-16 10:57:48'),
(40, 15, 14, '2019-04-16 11:04:15'),
(41, 15, 20, '2019-04-16 01:57:14'),
(43, 16, 18, '2019-04-16 02:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE `Categories` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`id`, `name`) VALUES
(1, 'Sách giáo khoa'),
(2, 'Sách văn học'),
(3, 'Truyện');

-- --------------------------------------------------------

--
-- Table structure for table `Item`
--

CREATE TABLE `Item` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_vietnamese_ci NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `avatar` text COLLATE utf8_vietnamese_ci NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `Item`
--

INSERT INTO `Item` (`id`, `name`, `price`, `avatar`, `id_category`) VALUES
(3, 'Fujiko F. Fujio Đại Tuyển Tập - Doraemon Truyện Ngắn - Tập 1 (Ấn Bản Kỉ Niệm 60 Năm NXB Kim Đồng)', 172000, 'https://salt.tikicdn.com/cache/280x280/media/catalog/product/d/o/doraemon-dai-tuyen-tap---truyen-ngan.u4972.d20170531.t163159.716408.jpg', 3),
(10, 'Harry Potter Part 7: Harry Potter And The Deathly Hallows (Paperback) - Harry Potter và bảo bối tử thần', 231000, 'https://salt.tikicdn.com/cache/280x280/ts/product/96/03/b1/b2bf654981872c536e7517c6a8db185a.jpg', 3),
(11, 'The Go-Giver: A Little Story About A Powerful Business Idea - Paperback', 189400, 'https://salt.tikicdn.com/cache/280x280/media/catalog/product/4/1/41kcgm8goll._sx324_bo1,204,203,200_.u2487.d20160714.t231623.jpg', 1),
(12, 'Where Men Win Glory: The Odyssey of Pat Tillman', 353000, 'https://salt.tikicdn.com/cache/280x280/media/catalog/product/i/m/image_1_1166.jpg', 2),
(13, 'Bộ Truyện Cookie Và Mẹ Tạp Dề', 348000, 'https://salt.tikicdn.com/cache/280x280/ts/product/a7/e5/8f/adadded85d80704fc656912c0f14df69.jpg', 3),
(14, 'Freakonomics – Penguin Books Ltd (UK)', 139000, 'https://salt.tikicdn.com/cache/280x280/ts/product/f2/6f/31/36f8ce1391270dabfe00a0b239b374af.jpg', 2),
(15, 'First Friends 2: Numbers Book', 98000, 'https://salt.tikicdn.com/cache/280x280/media/catalog/product/i/m/image_13102.jpg', 3),
(16, 'Discover Science: Polar Lands', 99000, 'https://salt.tikicdn.com/cache/280x280/ts/product/44/4a/af/d0018fd509e249389d11103d39a24f51.jpg', 1),
(17, 'Funny Stories For 5 Year Olds', 99000, 'https://salt.tikicdn.com/cache/280x280/ts/product/3c/51/3d/6c68ec4a0a77474739542b391d567329.jpg', 2),
(18, 'Discover Science: Rocks And Fossils', 129000, 'https://salt.tikicdn.com/cache/280x280/ts/product/e0/cc/19/f59b021e17b2c79312aae0efa669f5be.jpg', 1),
(19, 'The Girl In The Spider\'s Web - Cô gái trong lưới nhện ảo', 109000, 'https://salt.tikicdn.com/cache/280x280/ts/product/8f/ee/44/2dadbbb475ec8a4dca67c1eae5047fa6.jpg', 3),
(20, 'Usborne Big Picture Book of General Knowledge Ver-02', 172000, 'https://salt.tikicdn.com/cache/280x280/ts/product/cb/22/b5/0546fbe34cb35b0f32cecfa93fc5e7f0.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Security`
--

CREATE TABLE `Security` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_vietnamese_ci NOT NULL,
  `password` text COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `Security`
--

INSERT INTO `Security` (`id`, `username`, `password`) VALUES
(1, 'admin', 'qweasdzxc'),
(2, 'guest1', '123456'),
(3, 'cuong999', 'oo0099'),
(4, 'cuong0298', '123456789'),
(5, 'phannguyen2019', 'qpwoeiruty'),
(6, 'duytrannhat', '090090');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_vietnamese_ci NOT NULL,
  `permission` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `permission`) VALUES
(1, 'Mai Duy', 1),
(2, 'Phan Anh', 0),
(3, 'Huy Cuong 2', 0),
(4, 'Phạm Nhật Cường', 0),
(5, 'Trần Phan Nguyên', 0),
(6, 'Duy Tran', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cart_fk0` (`user_id`);

--
-- Indexes for table `Cart_item`
--
ALTER TABLE `Cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cart_item_fk0` (`id_card`),
  ADD KEY `Cart_item_fk1` (`id_item`);

--
-- Indexes for table `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Item`
--
ALTER TABLE `Item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Item_fk0` (`id_category`);

--
-- Indexes for table `Security`
--
ALTER TABLE `Security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Cart_item`
--
ALTER TABLE `Cart_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `Categories`
--
ALTER TABLE `Categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Item`
--
ALTER TABLE `Item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Security`
--
ALTER TABLE `Security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `Cart_fk0` FOREIGN KEY (`user_id`) REFERENCES `User` (`id`);

--
-- Constraints for table `Cart_item`
--
ALTER TABLE `Cart_item`
  ADD CONSTRAINT `Cart_item_fk0` FOREIGN KEY (`id_card`) REFERENCES `Cart` (`id`),
  ADD CONSTRAINT `Cart_item_fk1` FOREIGN KEY (`id_item`) REFERENCES `Item` (`id`);

--
-- Constraints for table `Item`
--
ALTER TABLE `Item`
  ADD CONSTRAINT `Item_fk0` FOREIGN KEY (`id_category`) REFERENCES `Categories` (`id`);

--
-- Constraints for table `Security`
--
ALTER TABLE `Security`
  ADD CONSTRAINT `Security_fk0` FOREIGN KEY (`id`) REFERENCES `User` (`id`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_fk0` FOREIGN KEY (`id`) REFERENCES `Security` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
