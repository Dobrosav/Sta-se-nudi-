-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2021 at 04:07 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stasenudi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAd` int(18) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAd`,`username`, `password`) VALUES
('1','admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `idc` int(18) NOT NULL,
  `user_to` int(18) NOT NULL,
  `user_from` int(18) NOT NULL,
  `message` varchar(256) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idK` int(18) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `surname` varchar(25) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `num` varchar(20) DEFAULT NULL,
  `date` DATE NOT NULL,
  `img`BLOB NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idK`, `username`, `name`, `surname`, `mail`, `password`, `country`, `num`, `date`) VALUES
(1,'admin','admin','adminic','admin@admin.com',MD5('sifra1'),'Srbija','0645828828', '2021-06-01'),
(2,'Aleks','Aleksandra','Milovic','aleksandra.milovic@gmail.com',MD5('sifra2'),'Srbija','0632547898', '2021-06-01'),
(3,'Ducko','Dusan','Gradojevic','dusan.gradojevic@gmail.com',MD5('sifra3'),'Srbija','0606981984', '2021-06-01'),
(4,'Dobri','Dobrosav','Vlaskovic','dobri.vlah@admin.com',MD5('sifra4'),'Srbija','0698745896', '2021-06-01'),
(5,'Laki','Lazar','Gospavic','gospavic@admin.com',MD5('sifra5'),'Srbija','0652563516', '2021-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `idO` int(18) NOT NULL,
  `title` varchar(256) DEFAULT NULL,
  `text` varchar(1000) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `isValid` tinyint(1) DEFAULT NULL,
  `idK` int(18) NOT NULL,
  `category` varchar(30) DEFAULT NULL,
  `date` DATE NOT NULL,
  `state` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `img` varchar(1000) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`idO`, `title`, `text`, `type`, `isValid`, `idK`, `category`,`state`,`country`, `img`) VALUES
(1, 'Povodac za pse', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate itaque, labore saepe tempora rerum modi aliquid voluptatibus, velit!', 'Poklanjanje', 1, 2, 'Ljubimci','Kao novo','Srbija', 'povodac.jpg'),
(2, 'MacBook', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate itaque, labore saepe tempora rerum modi aliquid voluptatibus! ', 'Razmena', 1, 3, 'Tehnika','Korisceno','Hrvatska', 'macbook.png'),
(3, 'Fen', 'Panasonic fen', 'Razmena', 0, 5, 'Tehnika', 'Korisceno', 'Srbija', 'fen.jpg'),
(4, 'Popcorn popper', 'Pucac kokica iz tehnomanije', 'Razmena', 1, 4, 'Tehnika', 'Korisceno', 'Srbija', 'popper.jpg'),
(5, 'Patike za trcanje', 'Original nove patike nekoriscene', 'Razmena', 1, 3, 'Odeca', 'Kao novo', 'Srbija', 'patike.jpg'),
(6, 'Bluetooth slusalice', 'Kenwood', 'Razmena', 0, 5, 'Tehnika', 'Osteceno', 'Srbija', 'slusalice.jpg'),
(7, 'Jakna', 'hnggrfgthhthyytfrggthjyuyhtrgrrgfe', 'Poklanjanje', 1, 2, 'Odeca','Korisceno','Srbija', 'jakna.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `IdR` int(18) NOT NULL,
  `rate` int(18) DEFAULT NULL,
  `user_rater` int(18) NOT NULL,
  `user_rated` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`idR`, `rate`, `user_rater`, `user_rated`) VALUES
(1, 2, 3, 2),
(2, 5, 2, 4),
(3, 4, 4, 3),
(4, 5, 3, 4),
(5, 1, 4, 5),
(6, 3, 3, 5);



-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `idA` int(18) NOT NULL,
  `title` varchar(25) DEFAULT NULL,
  `text` varchar(250) DEFAULT NULL,
  `idAd` int(18) NOT NULL,
  `date` DATE NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`idA`, `title`, `text`, `idAd`, `date`) VALUES
(1,'Poruka dobrodoslice!', 'Dobro dosli na sajt Sta se nudi!',1,'2021-06-01'),
(2,'Izmene na sajtu!', 'Izmene na sajtu stupaju na snagu!',1,'2021-06-05');

-- --------------------------------------------------------


--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAd`);
  
  --
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`idA`),
  ADD KEY `R_5` (`idAd`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `R_2` (`user_to`),
  ADD KEY `R_3` (`user_from`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idK`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`idO`),
  ADD KEY `R_1` (`idK`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`IdR`),
  ADD KEY `R_6` (`user_rated`),
  ADD KEY `R_7` (`user_rater`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `idc` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;




--
-- AUTO_INCREMENT for table `announcement``
--
ALTER TABLE `announcement`
  MODIFY `idA` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idK` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `idO` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `IdR` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--


--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `R_5` FOREIGN KEY (`idAd`) REFERENCES `admin` (`idAd`);


--
-- Constraints for table `chats`
--
ALTER TABLE `chats`
  ADD CONSTRAINT `R_2` FOREIGN KEY (`user_to`) REFERENCES `users` (`idK`),
  ADD CONSTRAINT `R_3` FOREIGN KEY (`user_from`) REFERENCES `users` (`idK`);

--
-- Constraints for table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `R_1` FOREIGN KEY (`idK`) REFERENCES `users` (`idK`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `R_6` FOREIGN KEY (`user_rated`) REFERENCES `users` (`idK`),
  ADD CONSTRAINT `R_7` FOREIGN KEY (`user_rater`) REFERENCES `users` (`idK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
