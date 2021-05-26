-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 05:04 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek_tekweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambartable`
--

CREATE TABLE `gambartable` (
  `id_gambar` int(11) NOT NULL,
  `url_gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambartable`
--

INSERT INTO `gambartable` (`id_gambar`, `url_gambar`) VALUES
(1, 'kids_theme.jpg'),
(2, 'study_theme.jpg'),
(5, 'music_theme.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id_group` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `name_group` varchar(50) NOT NULL,
  `desc_group` varchar(100) NOT NULL,
  `id_gambar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id_group`, `id_admin`, `name_group`, `desc_group`, `id_gambar`) VALUES
(1, 99, 'coba', 'coba', 0),
(2, 99, 'coba', 'coba', 0),
(3, 99, 'coba', 'coba', 0),
(4, 0, '', '', 0),
(5, 0, '', '', 0),
(6, 1, 'tekweb', 'task', 0),
(7, 1, 'cobalagi', 'cumacobasaja', 0),
(8, 1, 'cobalagi', 'cumacobasaja', 0),
(9, 1, 'prototype', 'coba test url image', 2);

-- --------------------------------------------------------

--
-- Table structure for table `grouptask`
--

CREATE TABLE `grouptask` (
  `id_grouptask` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `name_grouptask` varchar(50) NOT NULL,
  `label_grouptask` varchar(50) NOT NULL,
  `date_grouptask` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sudah_melakukan`
--

CREATE TABLE `sudah_melakukan` (
  `id_user` int(11) NOT NULL,
  `id_grouptask` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_task` varchar(50) NOT NULL,
  `label_task` varchar(50) NOT NULL,
  `date_task` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username_user` varchar(50) NOT NULL,
  `password_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username_user`, `password_user`) VALUES
(1, 'farrel', '123'),
(2, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambartable`
--
ALTER TABLE `gambartable`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `grouptask`
--
ALTER TABLE `grouptask`
  ADD PRIMARY KEY (`id_grouptask`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambartable`
--
ALTER TABLE `gambartable`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grouptask`
--
ALTER TABLE `grouptask`
  MODIFY `id_grouptask` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
