-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2021 at 06:59 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vcnp`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `name`) VALUES
(2044, 'Beeksisa caalbaasii'),
(2041, 'beeksisa carraa barnootaa'),
(2043, 'beeksisa jijjiirraa'),
(2038, 'Beeksisa qacarrii');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `title`, `start_date`, `end_date`, `date`) VALUES
(11, 108, 'walgahii ariifachiisa akka qabnu isin beeksisudha', '2020-09-22 22:00:00', '2020-09-27 22:00:00', '2020-09-25 21:13:39'),
(13, 108, 'Software Design Next step is to bring down whole knowledge of requirements ', '2020-09-23 22:00:00', '2020-09-28 22:00:00', '2020-09-25 21:13:39'),
(14, 110, 'beeksisa qacarrii qULQILLEESSITOOTAA', '2020-09-25 21:21:23', '2020-09-28 21:00:00', '2020-09-26 21:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `user_id`, `text`, `date`) VALUES
(1, 79, 'huhuhu', '2020-09-25 16:41:25'),
(2, 80, 'Beeksisni isi baasa jirtan gaaridhu garuu osoo Beeksisni isi baasa jirtan gaaridhu garuu osoo Beeksisni isi baasa jirtan gaaridhu garuu osoo Beeksisni isi baasa jirtan gaaridhu garuu osoo Beeksisni isi baasa jirtan gaaridhu garuu osoo Beeksisni isi baasa jirtan gaaridhu garuu osoo Beeksisni isi baasa jirtan gaaridhu garuu osoo ', '2020-09-25 16:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `forgot_table`
--

CREATE TABLE `forgot_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forgot_table`
--

INSERT INTO `forgot_table` (`id`, `user_id`, `question`, `answer`) VALUES
(1, 8, 'what?', 'yes'),
(2, 87, 'What is your favourite food name?', 'injera'),
(12, 80, 'What is your favourite food name?', 'Shiro'),
(30, 105, 'What is your hobby?', 'funny'),
(31, 116, 'What is your favourite food name?', 'pizza'),
(32, 117, 'What is your hobby?', 'richman');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `user_id`, `fname`, `mname`, `lname`, `phone`, `gender`, `role`) VALUES
(16, 12, 'Mubarik', 'Tamiru', 'Bekele', '0941208840', 'M', 'Admin'),
(17, 108, 'Usman', 'Tamiru', 'Bekele', '0917245599', '', 'Admin'),
(18, 110, 'Mube', 'Tame', 'Bekele', '0941208840', '', 'Admin'),
(19, 111, 'Mubarik', 'Tamiru', 'Bekele', '0967673240', '', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `job_applied`
--

CREATE TABLE `job_applied` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Vac_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `not_id` int(11) NOT NULL,
  `text` varchar(767) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`not_id`, `text`, `date`, `status`, `user_id`) VALUES
(13, 'time now is', '2020-09-23 08:19:42', 0, 109),
(15, 'daafaatii beeksisa kana baasaa', '2020-09-23 08:54:32', 1, 109),
(16, 'husvg', '2020-09-23 09:09:50', 1, 109),
(17, 'jhgf', '2020-09-23 09:10:52', 1, 109),
(20, 'htejdjvbhvb bv b', '2020-09-23 09:11:58', 1, 109),
(21, 'vdzvz', '2020-09-23 09:21:10', 1, 109),
(22, 'mmmmmmmmmmmmmmmmmmmmmmmmmmmmm', '2020-09-23 09:26:13', 1, 109),
(23, 'please dafattii beeksisa kana baasuu yaalaa osoo dandaamnaa ariifattanii  baayyee \r\nfilatamaadha wan ', '2020-09-23 09:26:29', 1, 109),
(24, 'please dafattii beeksisa kana baasuu yaalaa osoo dandamamnaa ariifattanii  baayyee \r\nfilatamaadha wan taefidhaaaaaaaaaaaaaa', '2020-09-23 09:26:50', 1, 109),
(25, 'huhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2020-09-23 11:09:22', 1, 109),
(26, 'AKKA DAFTANII.............', '2020-09-24 04:47:00', 1, 109),
(28, 'beeksisni kun akka dafee bahuu\r\n', '2020-09-24 05:09:23', 1, 109),
(29, 'huhuhuhuhuhuhhhuhhhhhhhuhuhuhuhhu', '2020-12-18 13:26:19', 1, 109),
(30, 'hgfdfs', '2020-12-19 22:35:57', 0, 109);

-- --------------------------------------------------------

--
-- Table structure for table `replay`
--

CREATE TABLE `replay` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `not_id` int(11) NOT NULL,
  `replay_text` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replay`
--

INSERT INTO `replay` (`id`, `user_id`, `not_id`, `replay_text`, `date`) VALUES
(6, 87, 23, 'ajajni kee nu qaqaabeera yeroo dhiyootti hijuuii irri nii olchinaa', '2020-09-24 05:18:50'),
(7, 87, 25, 'maalin waansa', '2020-09-24 05:41:23'),
(8, 87, 12, 'jkbjkjg', '2020-09-24 05:55:42'),
(9, 87, 24, 'jh', '2020-09-24 13:24:08'),
(10, 87, 15, 'accepted', '2020-09-25 16:16:38'),
(11, 112, 29, 'fghf', '2020-12-18 13:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suggestion`
--

CREATE TABLE `suggestion` (
  `id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Vac_id` int(11) NOT NULL,
  `Comment` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suggestion`
--

INSERT INTO `suggestion` (`id`, `User_id`, `Vac_id`, `Comment`, `date`) VALUES
(13, 87, 68, 'great', '2020-09-15 14:30:03'),
(15, 87, 68, 'hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh\r\nhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh\r\nhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', '2020-09-15 14:32:12'),
(16, 87, 70, 'kfdkvbj', '2020-09-15 14:53:40'),
(34, 87, 74, 'Cool', '2020-09-22 17:11:34'),
(35, 87, 74, 'K', '2020-09-22 17:11:42'),
(37, 104, 70, 'hyhu', '2020-09-24 14:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Mname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Gender` varchar(255) NOT NULL,
  `Doccument` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Birth_Date` varchar(255) NOT NULL,
  `Skill` varchar(255) NOT NULL,
  `Qualificacion` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `zone` varchar(255) NOT NULL,
  `woreda` varchar(255) NOT NULL,
  `kebele` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `Fname`, `Mname`, `Lname`, `Phone`, `Gender`, `Doccument`, `Email`, `Birth_Date`, `Skill`, `Qualificacion`, `Address`, `photo`, `password`, `role`, `nationality`, `region`, `zone`, `woreda`, `kebele`) VALUES
(8, 'Caalaa', 'Bultumee', 'desisa', '   0977348437', 'Male', '', 'batter@gmail.com', '2004-01-14', '  Composa', 'Masters', '   jimma', 'pic7.jpg.40', '25d55ad283aa400af464c76d713c07ad', 'Employee', '', '', '', '', ''),
(76, 'Sadam', 'ahmed', 'moroda', '0987654322', 'male', '', '', '', '', '', 'bedele', 'kuno.jpg.50', '25d55ad283aa400af464c76d713c07ad', 'Employee', '', '', '', '', ''),
(79, 'Amir', 'edris', 'ahmed', '098877', 'Male', '', '', '', '', '', 'Dambi', '', 'jvnp_5228', 'Employee', '', '', '', '', ''),
(80, 'Jedar', 'Tum', 'Kiya', '09876544', 'male', '', '', '', '', '', 'Adama', '', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', '', '', '', '', ''),
(87, 'Fortran', 'Sultan', 'Moreda', '0954078859', 'Male', '', '', '', '', '', 'Bedele', 'Untitled-3png.png.6', 'e10adc3949ba59abbe56e057f20f883e', 'Employee', 'Ethiopia', 'Oromia', 'B/Bedele', 'Bedele', '01'),
(88, 'rooner', 'gggg', 'juju', '09890', 'male', '', '', '', '', '', 'Adama', '', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', '', '', '', '', ''),
(104, 'test', 'caalaa', 'Abraham', '093440251490', 'male', '', '', '', '', '', 'tr', '', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', '', '', '', '', ''),
(105, 'o', 'i', 'i', '989889', 'male', '', '', '', '', '', 'iu', '', '90bed51510b09ad5d325d8d174fa616c', 'Candidatee', '', '', '', '', ''),
(109, 'tola', 'bariso', 'keenya', '0941208841', 'Male', '', '', '', '', '', 'Adama', '', 'e10adc3949ba59abbe56e057f20f883e', 'Manager', '', '', '', '', ''),
(112, 'Mark', 'zucker', 'burg', ' 0909090909', '', '', '', '', ' ', 'disabled', ' Adama', '', 'e10adc3949ba59abbe56e057f20f883e', 'Admin', '', '', '', '', ''),
(113, 'hatahu', 'caalaa', 'testfather', '0977348437', 'male', '', '', '', '', '', 'Adamaa', '', '202cb962ac59075b964b07152d234b70', 'Candidate', '', '', '', '', ''),
(114, 'boonsa', 'caalaa', 'Abraham', '094120884', 'male', '', '', '', '', '', 'Dukem', '', 'd79c8788088c2193f0244d8f1f36d2db', 'Candidate', '', '', '', '', ''),
(115, 'gurmesa', 'd', 'gamtesa', '09540788598', 'male', '', '', '', '', '', 'bedele', '', '202cb962ac59075b964b07152d234b70', 'Candidate', '', '', '', '', ''),
(116, 'cristiano', 'ronaldo', 'santos', '0977348432', 'male', '', '', '', '', '', 'Italy', '', 'e10adc3949ba59abbe56e057f20f883e', 'Candidate', '', '', '', '', ''),
(117, 'yosef', 'ferede', 'legese', '0941208842', 'male', '', '', '', '', '', 'Adamaa', '', 'fcea920f7412b5da7be0cf42b8c93759', 'Candidate', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `User_Id` int(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `category` varchar(255) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Last_Date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `User_Id`, `Title`, `Description`, `category`, `Date`, `Last_Date`) VALUES
(68, 8, 'Beeksisa guddina sadarkaa', '  Maqaa Mana hojii:-Waajjira SSBG/Bul/ Magaala Beddellee\r\n1.	Waamama gita hojii Ogeessa HoggansaQabeenya Namaa VIII\r\nLakka eenyuma 01/BMBD-18 Sadarka PS-7\r\nMinda jiâ€™a qarshii 4461(Kuma Afurif Dhibba Afurii fi Jaatamii tokko)\r\n     Dandeettiwan barbachisoo:- \r\n 	Dippiloomaa olaanaa Koollejii Muuxxannoo hojii Waggaa 13\r\n 	Koollejii Waggaa 4ffaa kan xumure Muuxxannoo hojii Waggaa 13\r\n 	Digirii Baachilarii Muuxannoo hojii Waggaa 9\r\n 	Barumsa Seeraa,Faarmaasii fi Mahandisii hin taaneen Digirii Mastireetii Muuxxannoo hojii Waggaa 5\r\nGuyyaa galmee 10/5/2008 hanga 20/5/2008 guyyaa qormaata 21/05/2008 Waj SS Bul/Mag/Beddelleetti saâ€™aatti 3:00 irratti \r\nHubachisa piroofaayilif ragaan barnoota fi madaaliin marsaa lama kara mana hojichatiin qophaâ€™ee dhiyata. \r\nNagaa Wajjin!\r\n', 'guddina sad', '2020-09-13 18:32:42', '2020-09-15 21:00:00'),
(70, 76, 'Dorgomtoota Dhaabbilee Barnoota Olaanaa irraa Eebbifaniif ', 'Akkuma mata-daree irratti ibsamuuf yaalame Waj/SSBG/Go/I/A/Booraa xalayaa Lakk.BHN/354/12 gaafa guyyaa 21/05/2006 nuu barreesseen barattoota dhaabbilee barnoota olaanaa irraa Eebbifaman galmeessinee a.kka isaaniif erginuuf nu gaafaachuun isaa ni yaadatama.\r\n           Buâ€™uuruma kanan galmee kana galmeessinee yemmuu erginu barattoota bara 2004 fi isaan dura ebbifaman sababaa waraqaa hojii dhabdummaa hin qabneef baratoota ragaan isaanii deebiâ€™e:-\r\n1.	Geetaahun Nagaraa Wayyeessaa\r\n2.	Dinqaayyoo Asaffaa Wayyeessaa\r\n3.	Kafanaa Atoomsaa Gajaâ€™aa\r\n4.	Alamtsahaay Gaaddisaa Uummataa\r\n5.	Yoonaas Teessoo Boggaalee \r\n6.	Ifaa Sheeldoo Bushaâ€™aa\r\n7.	Rabirraa Abarraa Goshuu yemmuu taâ€™anu dorgomtoonni maqaan keessan armaan olitti caqasame kun raga barnoota keessanii dhiyaatanii fudhachuu kan dandeessanu taâ€™u keenya ni beeksisnaa.\r\nNagaa Wajjin\r\n', 'Beeksisa qacarrii', '2020-09-14 17:52:42', '2020-09-19 22:00:00'),
(74, 87, 'beeksisa qacarrii qULQILLEESSITOOTAA', 'JFHCJSDUHGFUVJSBDJVB\r\nSDFVSDGFYKVGUHVUHGFVU\r\nFJGVIFDHUGVFDIGVUFHFDUGB\r\nFVBHFIDHVUIFDHUBHFUDHBUHDS\r\nGUDFHGUIFDHUVFDHHUFHB\r\nFUIVBHFUIDHBUIHFDUBHUD\r\nFGBIJUFDIOBHUOHYUIDOFTU89UIFFTHFD', 'Beeksisa qacarrii', '2020-09-17 05:47:59', '2020-09-24 21:00:00'),
(75, 87, 'walgahii arifachiisaa', 'akkuma beekamu magaalaa keenya kana keessatii  namoonnii yeroo amma kana', 'Carraa Barn', '2020-09-18 08:11:22', '2020-09-23 22:00:00'),
(78, 112, 'Software evolution The software must evolve to meet changing customer needs', 'In some form, these activities are part of all software processes. In practice, of\r\ncourse, they are complex activities in themselves and include sub-activities such as\r\nrequirements validation, architectural design, unit testing, etc. There are also supporting process activities such as documentation and software configuration management.\r\nWhen we describe and discuss processes, we usually talk about the activities in\r\nthese processes such as specifying a data model, designing a user interface, etc., and\r\nthe ordering of these activities. However, as well as activities, process descriptions\r\nmay also include', 'beeksisa carraa barnootaa', '2020-09-27 17:58:41', '2020-09-29 22:00:00'),
(79, 112, 'Process activities', 'Real software processes are interleaved sequences of technical, collaborative, and\r\nmanagerial activities with the overall goal of specifying, designing, implementing,\r\nand testing a software system. Software developers use a variety of different software\r\ntools in their work. Tools are particularly useful for supporting the editing of different\r\ntypes of document and for managing the immense volume of detailed information\r\nthat is generated in a large software project.\r\nThe four basic process activities of specification, development, validation, and evolution are organized differently in different development processes. In the waterfall\r\nmodel, they are organized in sequence, whereas in incremental development they are\r\ninterleaved. How these activities are carried out depends on the type of software,\r\npeople, and organizational structures involved. In extreme programming, for example,\r\nspecifications are written on cards. Tests are executable and developed before the\r\nprogram itself.', 'beeksisa carraa barnootaa', '2020-09-27 18:00:06', '2020-09-29 22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_owner`
--

CREATE TABLE `vacancy_owner` (
  `id` int(11) NOT NULL,
  `Vac_id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Adress` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `view_count`
--

CREATE TABLE `view_count` (
  `Id` int(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `Vac_id` int(11) NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `view_count`
--

INSERT INTO `view_count` (`Id`, `ip_address`, `Vac_id`, `visit_date`) VALUES
(7, '::1', 70, '2020-09-18 08:00:37'),
(8, '::1', 74, '2020-09-18 08:01:09'),
(9, '78:87:89:67', 74, '2020-09-18 08:02:19'),
(11, '::1', 75, '2020-09-18 08:11:34'),
(12, '192.168.43.1', 75, '2020-09-18 08:27:26'),
(13, '192.168.43.1', 70, '2020-09-18 08:30:34'),
(14, '::1', 68, '2020-09-19 17:53:36'),
(15, '192.168.43.1', 74, '2020-09-22 17:11:28'),
(16, '::1', 79, '2020-09-30 17:47:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `forgot_table`
--
ALTER TABLE `forgot_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `job_applied`
--
ALTER TABLE `job_applied`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `Vac_id` (`Vac_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`not_id`),
  ADD UNIQUE KEY `text` (`text`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `replay`
--
ALTER TABLE `replay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Comment` (`Comment`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Vac_id` (`Vac_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Cat_Id` (`category`);

--
-- Indexes for table `vacancy_owner`
--
ALTER TABLE `vacancy_owner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Vac_id` (`Vac_id`);

--
-- Indexes for table `view_count`
--
ALTER TABLE `view_count`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Vac_id` (`Vac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2045;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forgot_table`
--
ALTER TABLE `forgot_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `job_applied`
--
ALTER TABLE `job_applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `not_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `replay`
--
ALTER TABLE `replay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suggestion`
--
ALTER TABLE `suggestion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `vacancy_owner`
--
ALTER TABLE `vacancy_owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `view_count`
--
ALTER TABLE `view_count`
  MODIFY `Id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE;

--
-- Constraints for table `forgot_table`
--
ALTER TABLE `forgot_table`
  ADD CONSTRAINT `forgot_table_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_applied`
--
ALTER TABLE `job_applied`
  ADD CONSTRAINT `job_applied_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_applied_ibfk_2` FOREIGN KEY (`Vac_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `suggestion`
--
ALTER TABLE `suggestion`
  ADD CONSTRAINT `suggestion_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `suggestion_ibfk_2` FOREIGN KEY (`Vac_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `vacancy_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `user` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vacancy_owner`
--
ALTER TABLE `vacancy_owner`
  ADD CONSTRAINT `vacancy_owner_ibfk_1` FOREIGN KEY (`Vac_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `view_count`
--
ALTER TABLE `view_count`
  ADD CONSTRAINT `view_count_ibfk_1` FOREIGN KEY (`Vac_id`) REFERENCES `vacancy` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
