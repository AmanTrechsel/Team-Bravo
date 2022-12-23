-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 22, 2022 at 07:44 PM
-- Server version: 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Morgister_Starstudent`
--

-- --------------------------------------------------------

--
-- Table structure for table `Absence`
--

CREATE TABLE `Absence` (
  `id` int(11) NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `Date` varchar(25) DEFAULT NULL,
  `reason` varchar(85) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Absence`
--

INSERT INTO `Absence` (`id`, `scholar_id`, `Date`, `reason`) VALUES
(5, 1, '', NULL),
(6, 107, '', 'ziekte'),
(7, 104, '', 'Dokter');

-- --------------------------------------------------------

--
-- Table structure for table `Accounts`
--

CREATE TABLE `Accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Accounts`
--

INSERT INTO `Accounts` (`account_id`, `username`, `password`, `role`) VALUES
(1, 'Kevin', '$2y$10$IoU2BwQAN3JSJexgN9zrOOsfUhlc6e6T/9xLMOYexY30/sX3ex7xW', 2),
(2, 'user', '$2y$10$BMdQhDlHuLWSIM8.AbIXYOwiwdW.g3U4tlOoh.CfsxujzPHLdtYU2', 1),
(3, 'ouder', '$2y$10$FlCxJm5g2mgjMY9OmFODCeS1TlJTebC/e6tGlv4a8ZEI9vpwB0hwe', 0),
(4, 'Veninga', '$2y$10$FKIY89xw80y4gPjMvo7DPe9ckxztqF6up9dZasmEzuHnJZ/y1Z6DS', 0),
(5, 'Nijveld', '$2y$10$lcYy9vogG42fCoHdbDz8E.krJcyz3RwNJ.PgvHHN/Eaxi/aWO4kHa', 0),
(6, 'Visscher', '$2y$10$hMyPOqXvH.2cnm8oYDCFd.C0rFR8uTgu6NCFmxkv90hnHZ522ISzq', 0),
(7, 'Smit', '$2y$10$sDhlAb/Dys4g3V17lF9ho.ygoJfCM7lR2QkQKi1almBtnrg4pDhjm', 0),
(8, 'De_Geus', '$2y$10$zCwNxc9AB29sY7N1/EC8XOajxqaguCfuwhQcD8Nz60BXynVCA1iX6', 0),
(9, 'Trechsel', '$2y$10$I8hvby4TmWQ6zQMczaAx4OvwLvFd0qDd2OXFmI5EQQOepudDR6bvm', 0),
(10, 'Spalink', '$2y$10$sc7ynrZayLjkG5NMAdJWRuB0GPioRhByL4EXu29eYO3PAeJkDRSM2', 0),
(11, 'van_Oenen', '$2y$10$A8xJLAjRHWvQ5ILPyoGsU.putOpzh.y8ICSd45Nt2aXuaevyi/o7.', 0),
(12, 'Baron', '$2y$10$qiKMWfKz7od8dOGT9s6sZOClzVgtDXVsnfR5kEuNLAXvJ.W4aS0pS', 0),
(13, 'Smit', '$2y$10$54NoVS8BQmMGLEzdoOBsKOTjqhNF2cagm6wk6Px0swN8cvJR6308O', 0),
(14, 'Jagersma', '$2y$10$Pn3b5lt5rmO8QjPxWL7FsOYVHyone5tepf/nkVLNJQs4h.GMI5wL6', 0),
(17, 'de_jonge', '$2y$10$adH7sjGeavWYXPeIaB3.mubjWvADdbJlSyFkcx3noifsezLF02ZU.', 0),
(18, 'docent_groep_3', '$2y$10$L0OfKMm1nHW3/2qgsoo62e0hZI9sHkPEtG.fHw7F.C30k2pvy2Mvi', 1),
(19, 'docent_groep_4', '$2y$10$TlIWoUZRw9WLzZjg7VPSgu2S93Zk3rN0wb14UDMrcfDT6cEBB76ce', 1),
(20, 'docent_groep_5', '$2y$10$1Hfkjes4/IBYwaQJb8iiPOtJoIx.NKDIWPC6ZBxzagoiAmmkQ0uEW', 1),
(21, 'docent_groep_6', '$2y$10$BZeTL1K0tCjtzEVifoR/quip8nWcqlVxZNkHqlB3s3q34MqXvvdpi', 1),
(22, 'docent_groep_7', '$2y$10$COaNDqmJ/.OIV7rP/uqqVuhFsTpTK/0vShMzZwf4WK6gRsPca1xKO', 1),
(23, 'docent_groep_8', '$2y$10$fUxI3MkDLpVEOhN.ss4sweDydUy9P3B2W5Gb8I7evKhDERLgA4mEW', 1),
(24, 'administratie', '$2y$10$UknkaAxvTHRvQyIDQKQ0seWxbWyAgLDplq9H0aU9RPtygaPvnG0MO', 2),
(25, 'Directeur', '$2y$10$jy0nnOtXFeKqHotZDL4o7ekLVlSg96yKdEd4pEeeI/FShV3R0jn8S', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Books`
--

CREATE TABLE `Books` (
  `book_id` int(10) NOT NULL,
  `book_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Books`
--

INSERT INTO `Books` (`book_id`, `book_name`) VALUES
(1, 'Nederlands'),
(2, 'Engels'),
(3, 'Rekenen'),
(4, 'Aardrijkskunde'),
(5, 'Geschiedenis'),
(6, 'Biologie'),
(7, 'Handvaardigheid'),
(8, 'Gym');

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE `Events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`event_id`, `title`, `description`, `date`) VALUES
(1, 'Nieuwe schoolwebsite', 'dit is een nieuw evenement over de schoolwebsite verstuurd via het evenementen formulier', '2022-12-16'),
(2, 'Test Evenement', 'Dit is nog een evenement toegevoegd vanuit het evenementen formulier', '2022-12-03'),
(3, 'Super event', 'mooi event niet?', '2022-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `Grades`
--

CREATE TABLE `Grades` (
  `grade_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `scholar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Grades`
--

INSERT INTO `Grades` (`grade_id`, `grade`, `subject_id`, `scholar_id`) VALUES
(1, 8, 1, 1),
(2, 5, 2, 1),
(3, 3, 3, 1),
(4, 9, 4, 1),
(5, 10, 5, 1),
(6, 4, 6, 1),
(7, 7, 7, 1),
(8, 4, 1, 1),
(9, 2, 1, 1),
(10, 2, 1, 1),
(11, 3, 1, 1),
(12, 1, 1, 1),
(13, 5, 1, 1),
(14, 5, 1, 1),
(15, 3, 1, 1),
(16, 5, 2, 1),
(17, 6, 1, 3),
(18, 8, 4, 3),
(19, 9, 1, 1),
(20, 3, 1, 4),
(21, 2, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Homework`
--

CREATE TABLE `Homework` (
  `homework_id` int(10) NOT NULL,
  `subject_id` int(10) DEFAULT NULL,
  `book_id` int(10) NOT NULL,
  `exercises` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Homework`
--

INSERT INTO `Homework` (`homework_id`, `subject_id`, `book_id`, `exercises`) VALUES
(1, 1, 1, 'opdrachten 1 tot 10');

-- --------------------------------------------------------

--
-- Table structure for table `Parent`
--

CREATE TABLE `Parent` (
  `parent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Parent`
--

INSERT INTO `Parent` (`parent_id`, `name`, `surname`, `email`, `adress`, `account_id`) VALUES
(1, 'Ouder', 'Achternaam ouder', 'ouder@gmail.com', 'adress regel 1', 3),
(4, 'Bram', 'Veninga', 'ouder@gmail.com', 'adress regel 1', 4),
(5, 'Brandon', 'Nijveld', 'ouder@gmail.com', 'adress regel 1', 5),
(6, 'Kimmy', 'Visscher', 'ouder@gmail.com', 'adress regel 1', 6),
(7, 'Wesley', 'Smit', 'ouder@gmail.com', 'adress regel 1', 7),
(8, 'Tim', 'De_Geus', 'ouder@gmail.com', 'adress regel 1', 8),
(9, 'Aman', 'Trechsel', 'ouder@gmail.com', 'adress regel 1', 9),
(10, 'Kevin', 'Spalink', 'ouder@gmail.com', 'adress regel 1', 10),
(11, 'Gerjan', 'van_Oenen', 'ouder@gmail.com', 'adress regel 1', 11),
(12, 'Marcel', 'Baron', 'ouder@gmail.com', 'adress regel 1', 12),
(13, 'Rob', 'Smit', 'ouder@gmail.com', 'adress regel 1', 13),
(16, 'Elleke', 'Jagersma', 'ouder@gmail.com', 'adress regel 1', 14),
(17, 'Albert', 'de_jonge', 'ouder@gmail.com', 'adress regel 1', 17);

-- --------------------------------------------------------

--
-- Table structure for table `Scholar`
--

CREATE TABLE `Scholar` (
  `scholar_id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT current_timestamp(),
  `gender` varchar(10) DEFAULT NULL,
  `grade` int(10) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Scholar`
--

INSERT INTO `Scholar` (`scholar_id`, `name`, `surname`, `date_of_birth`, `gender`, `grade`, `address`, `parent_id`) VALUES
(1, 'Leerling ', 'een', '2022-12-01', 'Male', 2, 'Test adress 2', 1),
(3, 'Harry', 'Potter', '2022-12-21', 'Man', 4, 'Harry potter straat 1', 3),
(4, 'Place ', NULL, '2022-12-20', NULL, NULL, NULL, 3),
(5, 'Place', 'Holder', '2022-12-05', 'Vrouw', 3, 'vsfdvsf', 3),
(6, 'Place', 'Holder', '2022-12-22', 'man', 5, 'akjdadfa', 3),
(7, 'Place', 'Holder', '2022-12-18', 'man', 3, 'akdjfafd', 3),
(8, 'Place', 'Holder', '2022-12-29', 'fafa', 2, 'dfa', 3),
(9, 'fadfa', 'fadfa', '2022-12-22', 'fad', 2, 'fge', 3),
(10, 'adfa', 'fdafa', '2022-12-18', 'fa', 2, 'afd', 3),
(101, 'Jan', 'Joppe', '2012-12-19', 'Man', 2, 'Jan Joppe Laan 33', 3),
(103, 'Aaron', 'de Jonge', '2012-02-01', 'man', 6, 'statenweg 67 Zwolle', 3),
(104, 'Daan', 'de Vries', '2012-12-12', 'man', 5, 'Jongenherenstraat 60 Zwolle', 3),
(105, 'Henri', 'Bakker', '2013-12-08', 'man', 7, 'Rodehaanstraat 4 Zwolle', 3),
(106, 'Maarten', 'Bos', '2012-07-23', 'man', 8, 'Zuiderzeestraatweg 80 Zwolle', 3),
(107, 'Amber', 'Janssen', '2012-10-31', 'vrouw', 6, 'Hooiweg 54 Zwolle', 3),
(108, 'Froukje', 'Peters', '2012-05-27', 'Vrouw', 7, 'Helderlichtsteeg 3 Zwolle', 3),
(109, 'Sara', 'de Boer', '2012-04-03', 'Vrouw', 8, 'Hogenkampsweg 67 Zwolle', 3),
(110, 'Paula', 'de Ruiter', '2012-08-04', 'Vrouw', 7, 'Rieteweg 49 Zwolle', 3),
(111, 'Lieke', 'van Vliet', '2012-04-14', 'Vrouw', 7, 'Campuspad 87 Zwolle', 3),
(112, 'Stien', 'Dijkstra', '2012-04-01', 'Vrouw', 8, 'Lunenpad 89 Zwolle', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Subjects`
--

CREATE TABLE `Subjects` (
  `subject_id` int(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `book_id` int(10) DEFAULT NULL,
  `homework_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Subjects`
--

INSERT INTO `Subjects` (`subject_id`, `subject_name`, `book_id`, `homework_id`) VALUES
(1, 'Nederlands', NULL, NULL),
(2, 'Engels', NULL, NULL),
(3, 'Rekenen', NULL, NULL),
(4, 'Geschiedenis', NULL, NULL),
(5, 'Biologie', NULL, NULL),
(6, 'Handvaardigheid', NULL, NULL),
(7, 'Gym', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

CREATE TABLE `Teachers` (
  `teacher_id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `date_of_birth` date DEFAULT current_timestamp(),
  `adress` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `grade` int(10) DEFAULT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`teacher_id`, `name`, `surname`, `date_of_birth`, `adress`, `email`, `gender`, `grade`, `account_id`) VALUES
(2, 'Kevin', 'Spalink', '2002-08-23', 'Adress 1', 'kevin@morgenster.nl', 'Male', 2, 1),
(3, 'user', 'usersurname', '2022-12-07', 'Who cares1', 'user@morgensster.nl', 'Male', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Tests`
--

CREATE TABLE `Tests` (
  `test_id` int(10) NOT NULL,
  `subject_id` int(10) DEFAULT NULL,
  `test_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Tests`
--

INSERT INTO `Tests` (`test_id`, `subject_id`, `test_name`) VALUES
(1, 1, 'Nederlands toets');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Absence`
--
ALTER TABLE `Absence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scholar_id` (`scholar_id`);

--
-- Indexes for table `Accounts`
--
ALTER TABLE `Accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `Books`
--
ALTER TABLE `Books`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `boek_id` (`book_id`);

--
-- Indexes for table `Events`
--
ALTER TABLE `Events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `Grades`
--
ALTER TABLE `Grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `Homework`
--
ALTER TABLE `Homework`
  ADD PRIMARY KEY (`homework_id`),
  ADD UNIQUE KEY `huiswerk_id` (`homework_id`);

--
-- Indexes for table `Parent`
--
ALTER TABLE `Parent`
  ADD PRIMARY KEY (`parent_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `Scholar`
--
ALTER TABLE `Scholar`
  ADD PRIMARY KEY (`scholar_id`),
  ADD UNIQUE KEY `scholar_id` (`scholar_id`),
  ADD KEY `FK_Parentid` (`parent_id`);

--
-- Indexes for table `Subjects`
--
ALTER TABLE `Subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `vakken_id` (`subject_id`),
  ADD UNIQUE KEY `vak_id` (`subject_id`);

--
-- Indexes for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`teacher_id`),
  ADD UNIQUE KEY `teacher_id` (`teacher_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `Tests`
--
ALTER TABLE `Tests`
  ADD PRIMARY KEY (`test_id`),
  ADD UNIQUE KEY `test_id` (`test_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Absence`
--
ALTER TABLE `Absence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Accounts`
--
ALTER TABLE `Accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `Books`
--
ALTER TABLE `Books`
  MODIFY `book_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Events`
--
ALTER TABLE `Events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Grades`
--
ALTER TABLE `Grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Homework`
--
ALTER TABLE `Homework`
  MODIFY `homework_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Parent`
--
ALTER TABLE `Parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Scholar`
--
ALTER TABLE `Scholar`
  MODIFY `scholar_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `Subjects`
--
ALTER TABLE `Subjects`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Teachers`
--
ALTER TABLE `Teachers`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Tests`
--
ALTER TABLE `Tests`
  MODIFY `test_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Parent`
--
ALTER TABLE `Parent`
  ADD CONSTRAINT `Parent_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`account_id`);

--
-- Constraints for table `Scholar`
--
ALTER TABLE `Scholar`
  ADD CONSTRAINT `FK_Parentid` FOREIGN KEY (`parent_id`) REFERENCES `Parent` (`parent_id`);

--
-- Constraints for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD CONSTRAINT `account_id` FOREIGN KEY (`account_id`) REFERENCES `Accounts` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
