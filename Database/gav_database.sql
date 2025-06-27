-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2017 at 05:27 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gav_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(10) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `admin_about` text NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullname`, `admin_image`, `admin_about`, `created_date`, `updated_date`, `admin_user`, `admin_password`) VALUES
(18, 'Therenze Stephen Amante', '14355756_963534293756238_8280559324443203376_n.jpg', 'gwapo ako karajaw', 'Tuesday, 11th July 2017 ', '', 'renze', 'renze'),
(19, 'admin1', '20707697_1414463325307641_522350627_n.jpg', 'hahaha', 'Wednesday, 9th August 2017 ', '', 'admin1', 'admin1'),
(20, 'test2', 'u.png', 'gwapo ni', 'Friday, 11th August 2017 ', '', 'test2', 'test2'),
(21, 'admin2', 'u.png', 'this is the admin2', 'Tuesday, 15th August 2017 ', '', 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
`booking_id` int(11) NOT NULL,
  `total` varchar(255) NOT NULL,
  `pickup_date` varchar(255) NOT NULL,
  `pickup_time` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `passenger` varchar(205) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `username` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL,
  `other` text NOT NULL,
  `picking_place` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `date_updated` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `total`, `pickup_date`, `pickup_time`, `vehicle`, `destination`, `passenger`, `created_date`, `username`, `status`, `other`, `picking_place`, `duration`, `date_updated`) VALUES
(209, '', '9-1-2017', '1:00 AM', 'Isuzo NHR VAN', 'Butuan City', 'Family 10-15 person', '8-9-2017 ', 'therenze', 'CONFIRMED', 'assadasd ', 'San Francisco Anao-aon S,D,N', '', ''),
(216, '', '11/22/2017', '1:00 PM', 'Isuzo NHR VAN', 'Butuan City', 'Family 10-15 person', '11-20-2017 ', 'therenze', 'ON PENDING', 'asadsad ', 'San Francisco Anao-aon S,D,N', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`concern_id` int(10) NOT NULL,
  `gav_user_username` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `concern` text NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`concern_id`, `gav_user_username`, `created_date`, `concern`) VALUES
(1, 'therenze', 'Thursday, 13th July 2017 ', 'i love you admin'),
(2, 'therenze', 'Thursday, 13th July 2017 ', 'i love you admin'),
(3, 'therenze', '8-3-2017', 'hi helo jaon koi problema maam/sir'),
(4, 'therenze', 'Thursday, 3rd August 2017 ', 'asdasd'),
(6, 'therenze', 'Tuesday, 15th August 2017 ', 'this is a new message');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
`driver_id` int(11) NOT NULL,
  `driver_fullname` varchar(255) NOT NULL,
  `place_address` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `driver_age` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `driver_status` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `driver_image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_fullname`, `place_address`, `email_address`, `objective`, `driver_age`, `experience`, `driver_status`, `created_date`, `driver_image`) VALUES
(4, 'Therenze stephe anmante a', 'San Francisco Surigail del Norte', 'asd@asd', ' This is asd This is asd This is asd This is asd This is asd  This is asd This is asd This is asd This is asd This is asd  This is asd This is asd This is asd This is asd This is asd', '16', ' This is asd This is asd This is asd This is asd This is asd  This is asd This is asd This is asd This is asd This is asd  This is asd This is asd This is asd This is asd This is asd', 'single', 'Thursday, 13th July 2017 ', 'family1.png'),
(6, 'drivere', 'San Francisco Surigail del Norteeee', 'nsad@sda.comeee', ' This is sample This is sample This is sample This is sample This is sample This is sample This is sample  This is sample This is sample This is sample This is sample This is sample This is sample This is sampleeee', 'san', ' This is sample This is sample This is sample This is sample This is sample This is sample This is sampleeee', 'email', 'Thursday, 13th July 2017 ', 'butuan.jpg'),
(8, 'Stephen Curry Amante', 'San Francisco Surigail del Norteeee', 'nsad@sda.comeee', 'asdasd', '12', 'asdasd', 'single', 'Thursday, 16th November 2017 ', '127013.gif');

-- --------------------------------------------------------

--
-- Table structure for table `gav_user`
--

CREATE TABLE IF NOT EXISTS `gav_user` (
`id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_num` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `created_date` varchar(255) NOT NULL,
  `updated_date` varchar(255) NOT NULL,
  `user_status` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `gav_user`
--

INSERT INTO `gav_user` (`id`, `first_name`, `last_name`, `phone_num`, `age`, `email`, `address`, `username`, `password`, `user_image`, `about`, `created_date`, `updated_date`, `user_status`) VALUES
(44, 'therenze', 'amante', '09487626186', '18', 'no_Fear123456@yahoo.com', 'San_francisco anao-aon Surigao del norte', 'therenze', 'f176584053dbfeb447a4649e2ba8c201', 'unnamed.jpg', 'im a programmer', 'Thursday, 27th July 2017 ', 'Tuesday, 1st August 2017 ', 'Online'),
(45, 'Jawa', 'Kulira', '09098764785', '1000', 'jawakulirakw@gmail.com', 'bangog', 'fucker', 'acc6f2779b808637d04c71e3d8360eeb', '', 'because this is a porn', 'Thursday, 16th November 2017 ', '', 'Offline');

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE IF NOT EXISTS `updates` (
`van_id` int(11) unsigned zerofill NOT NULL,
  `image` varchar(255) NOT NULL,
  `vehicle_discription` text NOT NULL,
  `vehicle_name` varchar(200) NOT NULL,
  `vehicle_price` varchar(200) NOT NULL,
  `vehicle_usage` varchar(255) NOT NULL,
  `vehicle_status` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`van_id`, `image`, `vehicle_discription`, `vehicle_name`, `vehicle_price`, `vehicle_usage`, `vehicle_status`, `created_date`) VALUES
(00000000073, 'Isuzu_NHR_IVAN_2_.jpg', 'this car is amazing too', 'Isuzo NHR VAN', '6000', 'Available', 'Active', 'Monday, 10th July 2017 '),
(00000000074, 'NISSAN NV350 URVAN.jpg', 'The Nissan NV350 hauls big loads and big volumes with impressive ease. And itâ€™s all easy loading, thanks to a low sill height and large, wide-opening doors on the side and in back. And with a functional and durable cargo interior, itâ€™s capable of delivering as many payloads as miles.', 'Nissan NV350 Urvans', '6000', 'Available', 'Active', 'Thursday, 27th July 2017 '),
(00000000075, '127013.gif', 'ehehah heah hfhahdf aheh', 'test', '988989899', 'Available', '', 'Thursday, 16th November 2017 '),
(00000000076, '127013.gif', 'sdada', 'Nissan NV350 Urvan', '6000', 'On-Repair', '', 'Thursday, 16th November 2017 ');

-- --------------------------------------------------------

--
-- Table structure for table `updates_place`
--

CREATE TABLE IF NOT EXISTS `updates_place` (
`place_id` int(11) unsigned zerofill NOT NULL,
  `place_image` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `place_name` varchar(255) NOT NULL,
  `place_price` varchar(255) NOT NULL,
  `place_usage` varchar(255) NOT NULL,
  `created_date` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `updates_place`
--

INSERT INTO `updates_place` (`place_id`, `place_image`, `discription`, `place_name`, `place_price`, `place_usage`, `created_date`) VALUES
(00000000010, 'butuan.jpg', 'Butuan, officially the City of Butuan (Butuanon: Dakbayan hong Butuan; Cebuano: Dakbayan sa Butuan) and often referred to as Butuan City, is a highly urbanized city in the Philippines and the regional center of Caraga. It is located at the northeastern part of the Agusan Valley, Mindanao, sprawling across the Agusan River. ', 'Butuan City', '2000', 'Available', 'Thursday, 13th July 2017 '),
(00000000011, 'misamis oriental.png', 'Misamis Oriental is a province located in the region of Northern Mindanao in the Philippines. Its capital and provincial center is the city of Cagayan de Oro, which is governed independently from the province.', 'Misamis Oriental', '3000', 'Available', 'Thursday, 13th July 2017 '),
(00000000012, 'davao.png', 'Davao City is the largest city in the Philippines in terms of land areaand the most populous city in the country outside of Metro Manila and Luzon. A Highly Urbanized city on Mindanao Island with a total land area of 2,444 square kilometers,[2] it has a population of 1,632,991 people based on the 2015 census. This figure also makes it the third-most-populous city in the Philippines and the most populous in Mindanao. ', 'Davao', '5000', 'Available', 'Thursday, 13th July 2017 '),
(00000000013, 'tagana-an.png', 'Tagana-an is a municipality in the province of Surigao del Norte, Philippines. According to the 2015 census, it has a population of 16,428 people. The town was created by virtue of Republic Act No. 194 on June 22, 1947.', 'Tagana-an Surigao del Norte', '500', 'Available', 'Thursday, 27th July 2017 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
 ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`concern_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
 ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `gav_user`
--
ALTER TABLE `gav_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
 ADD PRIMARY KEY (`van_id`);

--
-- Indexes for table `updates_place`
--
ALTER TABLE `updates_place`
 ADD PRIMARY KEY (`place_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=217;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `concern_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `gav_user`
--
ALTER TABLE `gav_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
MODIFY `van_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `updates_place`
--
ALTER TABLE `updates_place`
MODIFY `place_id` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
