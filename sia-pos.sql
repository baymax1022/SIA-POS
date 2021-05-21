-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 09:50 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sia-pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ingredients`
--

CREATE TABLE `tbl_ingredients` (
  `ing_id` int(11) NOT NULL,
  `ing_name` varchar(255) NOT NULL,
  `ing_quantity` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ingredients`
--

INSERT INTO `tbl_ingredients` (`ing_id`, `ing_name`, `ing_quantity`, `prod_id`) VALUES
(1, '5 1/2 tablespoons sugar', 10, 3),
(2, '3/4 cup warm water', 10, 3),
(3, '1/4 cup plus 1 tablespoon Asian fish sauce (preferably from Phu Quoc)', 10, 3),
(4, '2 tablespoons rice vinegar (not seasoned)', 10, 3),
(5, '2 teaspoons fresh lime juice (optional)', 10, 3),
(6, '2 garlic cloves, minced', 10, 3),
(7, '2 fresh Thai chiles (2 to 3 inches; preferably red; including seeds), thinly sliced crosswise', 10, 3),
(8, '20 finger chili', 10, 4),
(9, '20 Spring rolls or lumpia wrappers', 10, 4),
(10, '1 box cheddar cheese , sliced into small strips\r\n', 10, 4),
(11, '1 cooking oil, for deep frying', 10, 4),
(12, '1 ground beef or pork (optional)', 10, 4),
(13, '20 ham (optional)', 10, 4),
(14, 'test', 10, 0),
(15, 'test 2', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` int(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_quantity` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_price`, `product_type`, `product_quantity`) VALUES
(3, 'Fried Spring Rolls', 170, 'For Starters', 1),
(4, 'Chili Cheese Stick', 140, 'For Starters', 1),
(5, 'Chili Chicken Wing (4pcs)', 298, 'For Starters', 1),
(6, 'Chicharon Bulaklak', 175, 'For Starters', 1),
(7, 'Pochero Beef Soup', 560, 'Soup For The Soul', 1),
(8, 'Tiyan Ng Bangus Sinigang', 330, 'Soup For The Soul', 1),
(9, 'Sinigang Na Baboy', 390, 'Soup For The Soul', 1),
(10, 'Sinigang Na Hipon', 390, 'Soup For The Soul', 1),
(11, 'Seafood Pancit Canton', 280, 'Oodles Of Noodles', 1),
(12, 'Pancit Canton w/ asstd Meat', 230, 'Oodles Of Noodles', 1),
(13, 'Pancit Bihon Guisado', 230, 'Oodles Of Noodles', 1),
(14, 'Seafood Rice Noodle', 280, 'Oodles Of Noodles', 1),
(15, 'Seafood Pancit Canton (SOLO)', 150, 'Oodles Of Noodles', 1),
(16, 'Pancit Canton w/ asstd Meat (SOLO)', 130, 'Oodles Of Noodles', 1),
(17, 'Pancit Bihon Guisado (SOLO)', 130, 'Oodles Of Noodles', 1),
(18, 'Seafood Rice Noodle (SOLO) ', 160, 'Oodles Of Noodles', 1),
(19, 'Thai BBQ Chicken', 390, 'From The Grill', 1),
(20, 'Boneless Chicken BBQ', 360, 'From The Grill', 1),
(21, 'Inihaw na Liempo', 340, 'From The Grill', 1),
(22, 'Chicken Inasal (3PCS)', 298, 'From The Grill', 1),
(23, 'Grilled Assorted Seafoods', 560, 'From The Grill', 1),
(24, 'Grilled Squid', 325, 'From The Grill', 1),
(25, 'Grilled Boneless Bangus', 298, 'From The Grill', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_email`, `user_password`, `user_name`) VALUES
(1, 'admin', 'password', 'Test User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  ADD PRIMARY KEY (`ing_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ingredients`
--
ALTER TABLE `tbl_ingredients`
  MODIFY `ing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
