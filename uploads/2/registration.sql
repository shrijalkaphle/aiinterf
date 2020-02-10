-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 08, 2020 at 10:12 PM
-- Server version: 5.6.46-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `applied`
--

CREATE TABLE `applied` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cv` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applied`
--

INSERT INTO `applied` (`id`, `cid`, `name`, `mobile`, `email`, `cv`) VALUES
(19, 4, 'Rashila Lamichhane ', '9867211827', 'rasilamichhane@gmail.com', 'cv/cv_Rashila Lamichhane .pdf'),
(18, 2, 'Neeyanta Shrestha', '9843436012', 'neeyanta15@gmail.com', 'cv/cv_Neeyanta Shrestha.pdf'),
(17, 2, 'Neeyanta Shrestha', '9843436012', 'neeyanta15@gmail.com', 'cv/cv_Neeyanta Shrestha.pdf'),
(16, 2, 'Neeyanta Shrestha', '9843436012', 'neeyanta15@gmail.com', 'cv/cv_Neeyanta Shrestha.pdf'),
(13, 4, 'Samip Rai', '9803562153', 'samipthulung3@gmail.com', 'cv/cv_Samip Rai.pdf'),
(14, 2, 'Rohan Maharjan', '9860102444', 'araulmaharjan@gmail.com', 'cv/cv_Rohan Maharjan.pdf'),
(15, 4, 'Rohan Maharjan', '9860102444', 'araulmaharjan@gmail.com', 'cv/cv_Rohan Maharjan.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE `career` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `deadline` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`id`, `position`, `description`, `deadline`, `status`) VALUES
(2, 'Business Analyst Intern', 'â€¢ Document and manage multiple, variable tasks and data review processes, as well as mass data entry, maintenance, and update projects<br>â€¢ Complete data audits and evaluations within core systems<br> â€¢ Identify and resolve complex issues, including mass change updates, reconciliation projects, and operate data from various sources<br> â€¢ Pull large amount of data on members and providers writing simple to complex SQL queries to customize and generate state reports<br> â€¢ Build new databases, create tables, and manipulate data structures to meet business needs, give user access to new users, and perform user acceptance testing.<br> â€¢ Extract, Transform, and Load (ETL)<br> â€¢ Design automation scripts in Toad and SSIS for simple repetitive tasks to be performed by machine<br>', '2019-12-31', 1),
(4, 'Machine Learning Engineer', ' â€¢ Model, train, test, and integrate reliable ML algorithms into software applications<br>â€¢ Collaborate with front-end and back-end developers\r\n<br>â€¢ TensorFlow knowledge preferred but not required<br>\r\nâ€¢ (Freshers will be considered for internship and experienced ones for contract position)<br>', '2020-06-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `filesUpload`
--

CREATE TABLE `filesUpload` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `filesUpload`
--

INSERT INTO `filesUpload` (`id`, `name`, `location`, `userid`) VALUES
(10, '23.png', 'uploads/gurungikarma/23.png', 1),
(12, 'CLASS9_CHARACTER_EVALUATION.xlsx', 'uploads/gurungikarma/CLASS9_CHARACTER_EVALUATION.xlsx', 2),
(13, 'AI-Counseling.xlsx', 'uploads/shambhalamart/AI-Counseling.xlsx', 9);

-- --------------------------------------------------------

--
-- Table structure for table `myed`
--

CREATE TABLE `myed` (
  `id` int(11) NOT NULL,
  `schoolname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `db_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `myed`
--

INSERT INTO `myed` (`id`, `schoolname`, `username`, `password`, `email`, `contact`, `db_name`) VALUES
(1, 'Padmai Ga-tshal Choiling School', 'admin', 'namasteNepal', '', '', 'academics'),
(2, 'Demo School', 'shrijal', 'shrijal', 'kaphle.shrijal9@gmail.com', '9843564504', 'myedUser');

-- --------------------------------------------------------

--
-- Table structure for table `newclient`
--

CREATE TABLE `newclient` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `proposetype` varchar(50) NOT NULL,
  `propose` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newclient`
--

INSERT INTO `newclient` (`id`, `name`, `email`, `phone`, `proposetype`, `propose`) VALUES
(57, '', '', '', '', ''),
(56, 'charli', 'charli@yahoo.com', '9825376347', 'Course', 'English'),
(55, 'Aavash Lamichhane', 'hansyhunk369@gmail.com', '9865011025', 'Product and Services', 'Marketing'),
(54, 'Abi chhetri', 'bcabinash930@gmail.com', '9808731045', 'Product and Services', 'Web Design'),
(53, '', '', '', '', ''),
(52, 'pawan khadka', 'pawankhad00@gmail.com', '3013684056', 'Product and Services', 'Web Design'),
(51, 'Ram Shrestha', 'ramstha7755@gmail.com', '9840855006', 'Course', 'Data Dnalysis'),
(50, 'Manoj sharma', 'ms7956199@gmail.com', '9800886776', 'Course', 'English'),
(42, 'PerryLaf', 'inbox402@glmux.com', '88626681288', 'Product and Services', 'Web Design'),
(41, 'Dipak mahara', 'dipakmahara934@gmail.com', '9863357830', 'Product and Services', 'Graphic Design'),
(43, 'broadway infosys', 'balayarkeshab12@gmail.com', '9848700008', 'Course', 'Business Analysis'),
(44, '', '', '', '', ''),
(45, '', '', '', '', ''),
(46, '', '', '', '', ''),
(47, '', '', '', '', ''),
(48, '', '', '', '', ''),
(49, 'Kamana Poudel', 'kamanapoudel554@gmail.com', '9816465855', 'Course', 'English');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `user` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `text`, `user`, `status`) VALUES
(1, '1', 2, 1),
(2, '12', 2, 1),
(3, '123', 2, 1),
(4, 'New Post has been Added', 7, 1),
(5, 'New Post has been Added', 2, 1),
(6, 'New Post has been Added', 2, 1),
(7, 'New Post has been Added', 2, 1),
(8, 'New Post has been Added', 7, 1),
(9, 'New Post has been Added', 7, 1),
(10, 'New Post has been Added', 8, 1),
(11, 'New Post has been Added', 8, 1),
(12, 'New Post has been Added', 8, 0),
(13, 'New Post has been Added', 2, 1),
(14, 'New Post has been Added', 9, 0),
(15, 'New Post has been Added', 9, 0),
(16, 'New Post has been Added', 9, 0),
(17, 'New Post has been Added', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` mediumint(9) NOT NULL,
  `user` mediumint(9) NOT NULL,
  `slug` varchar(300) NOT NULL,
  `label` varchar(300) NOT NULL,
  `title` varchar(200) NOT NULL,
  `header` varchar(300) NOT NULL,
  `body` longtext NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user`, `slug`, `label`, `title`, `header`, `body`, `location`) VALUES
(1, 7, 'home', 'Home', '1', 'Welcome to Analytical Intelligence Interface', 'The following analytical report is on the basis of five year academic remarks at SMD:\r\n<br> </br>\r\n<iframe width=\"452.3153638814016\" height=\"354.5\" seamless frameborder=\"0\" scrolling=\"no\" src=\"https://docs.google.com/spreadsheets/d/e/2PACX-1vSEXT7aIzySiPftnSiJnv21En4DZdLu8XFOdN5rRMzbwQ5InNPWT7FAkT1u8Ql8GqEyUqKmwIaQOmtD/pubchart?oid=1115440536&format=interactive\"></iframe>\r\n\r\n<br> </br>\r\n<p> 1. Tashi Delek! Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.</p>\r\n\r\n<iframe width=\"286.6999528726534\" height=\"392\" seamless frameborder=\"0\" scrolling=\"no\" src=\"https://docs.google.com/spreadsheets/d/e/2PACX-1vR5jNMyZ77YzLIgRFAQtF4T7cOIpLzCw9LuGIDbwdq5mXSIc-qJ_XmoxU5k0klmx6ZmpkB8lvmHD0Yx/pubchart?oid=314376773&format=interactive\"></iframe>\r\n\r\n<p> 2. Tashi Delek! Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.\r\n\r\nID 1: Karma Gurung</p>', ''),
(2, 2, '', 'About', '1', 'OVERLOOK OF SMD ACADEMIC ', ' 25th Mar 2019:\r\nWEEKS	JOBS	REMARKS\r\nFIRST	MEETING WITH THE MEMBERS	THREE MEMBERS WERE GATHER AND THE MEETING WAS DONE TO INTRODUCE ABOUT THE PROJECT THAT WE ARE GOING TO DO AND RESPONSIBILITY WERE DISTRIBUTED. \r\nMR. KARMA GURUNG:                 HEAD OF THE PROJECT \r\nMR. DEV RAJ PARIYAR:                 DATA ANALYST\r\nMR. TSEWANG DORJE LAMA:      DATA ENTRY COORDINATOR. \r\nSECOND 	PLAINNING FOR THE DATA ENTRY	DATA FROM THE SCHOOL WAS BEING COLLECTING BY MR. KARMA GURUNG AND WAS GIVEN TO MR. TSEWANG DORJE. \r\nFORTH, FIFTH AND SIXTH	DATA ENTRY	THE STUDENTS WERE COLLECTED TO DATA IN MS-EXCEL. \r\nTHE ENTRY LEVEL STUDENTS WERE SLEF VOLUNTEERED AND WAS SUPERVISED BY MR. TSEWANG DORJE ALL THE TIME WHEN IN DATA ENTRY PERIOD.\r\nSEVENTH	DATA FILTER 	MR DEV RAJ FILTERED  DATA \r\nEIGHTH	FINALIZATION OF THE DATA	AFTER THE ENTRY OF DATA FINISHED. THE ENTERED DATA WAS CHECKED AND CONFORMED BY MR KARMA GURUNG AND MR DEV RAJ\r\n		\r\n		\r\n\r\n\r\n<br> </br>\r\n   \r\n<iframe width=286.6999528726534 height=392 seamless frameborder=0 scrolling=no src=https://docs.google.com/spreadsheets/d/e/2PACX-1vR5jNMyZ77YzLIgRFAQtF4T7cOIpLzCw9LuGIDbwdq5mXSIc-qJ_XmoxU5k0klmx6ZmpkB8lvmHD0Yx/pubchart?oid=314376773&format=interactive></iframe>\r\n\r\n\r\nTHIS IS THE RESEARCH REPORT AND DATA ANALYSIS ON PROGRESS REPORT OF STUDENTS OF SHREE MANGAL DVIP BOARDING SCHOOL. THE RESEARCH AND ANALYSIS IS DONE WITH THE AUTHENTIC DATA THAT WAS PRESENT IN THE SCHOOL ADMINISTRATORS OFFICE. THIS RESEARCH IS DONE TO MAKE INFERENCE ABOUT THE ACADEMIC PROGRESS OF STUDENTS OF SHREE MANGAL DVIP SCHOOL AND THE RESEARCHERS ARE NOT BIASED IN ANY ASPECTS OF THE STUDY OR RESEARCH.      \r\n\r\n\r\nSHREE MANGAL DVIP BOARDING SCHOOL\r\n		\r\nTel 4915407\r\n	TINCHULI BOUDHA\r\n[Website]\r\n[Email]\r\n\r\n		\r\n<iframe width=358 height=419.96578265204386 seamless frameborder=0 scrolling=no src=https://docs.google.com/spreadsheets/d/e/2PACX-1vR5jNMyZ77YzLIgRFAQtF4T7cOIpLzCw9LuGIDbwdq5mXSIc-qJ_XmoxU5k0klmx6ZmpkB8lvmHD0Yx/pubchart?oid=1482507068&format=interactive></iframe>\r\n\r\n<br></br>\r\n\r\n\r\n12th Dec, 2018:\r\n<br></br>\r\nTrend Analysis:\r\n\r\n\r\nWHAT IT IS:\r\n\r\nTrend analysis is a technical analysis of the movement of a stock based on past performance.\r\n\r\nHOW IT WORKS:\r\n\r\nA trend analysis is a method of analysis that allows traders to predict what will happen with a stock in the future.  Trend analysis is based on historical data about the stock\'s performance given the overall trends of the market and particular indicators within the market.\r\n\r\nTrend analysis takes into account historical data points for a stock and, controlling for other factors like the general changes in the sector, market conditions, competition for similar stocks, it allows traders to forecast short, intermediate, and long term possibilities for the stock.\r\n\r\nWHY IT MATTERS:\r\n\r\nBy watching the general trends of the markets, a trader may be able to match purchases and sales of particular stocks, maximizing his or her potential for profits. At the same time, it is important to look at historical data in a larger context of conditions for the underlying company to understand if there are factors that may affect a stock\'s value irrespective of general market conditions or past performance.  For example, a trader should look inside the financial conditions of the company, understand the market and technologies, and anticipate competitive pressures on the company within its sector.  All of these tolls, as well as trend analysis, benefit a trader.  \r\n\r\nID2: Mr. Karma Gurung', ''),
(16, 7, 'Ayush.mp4', 'Label', '1', 'Karma Gurung', 'Body: Testing the body for ID\r\n25th Mar 2019: WEEKS JOBS REMARKS FIRST MEETING WITH THE MEMBERS THREE MEMBERS WERE GATHER AND THE MEETING WAS DONE TO INTRODUCE ABOUT THE PROJECT THAT WE ARE GOING TO DO AND RESPONSIBILITY WERE DISTRIBUTED. MR. KARMA GURUNG: HEAD OF THE PROJECT MR. DEV RAJ PARIYAR: DATA ANALYST MR. TSEWANG DORJE LAMA: DATA ENTRY COORDINATOR. SECOND PLAINNING FOR THE DATA ENTRY DATA FROM THE SCHOOL WAS BEING COLLECTING BY MR. KARMA GURUNG AND WAS GIVEN TO MR. TSEWANG DORJE. FORTH, FIFTH AND SIXTH DATA ENTRY THE STUDENTS WERE COLLECTED TO DATA IN MS-EXCEL. THE ENTRY LEVEL STUDENTS WERE SLEF VOLUNTEERED AND WAS SUPERVISED BY MR. TSEWANG DORJE ALL THE TIME WHEN IN DATA ENTRY PERIOD. SEVENTH DATA FILTER MR DEV RAJ FILTERED DATA EIGHTH FINALIZATION OF THE DATA AFTER THE ENTRY OF DATA FINISHED. THE ENTERED DATA WAS CHECKED AND CONFORMED BY MR KARMA GURUNG AND MR DEV RAJ', 'views/videos/Ayush.mp4'),
(28, 7, 'padoru padoru.mp4', '', '2', '', '', 'views/videos/padoru padoru.mp4'),
(30, 2, 'SampleVideo_1280x720_20mb.mp4', 'Chart/Label', '2', 'Header', '25th Mar 2019: WEEKS JOBS REMARKS FIRST MEETING WITH THE MEMBERS THREE MEMBERS WERE GATHER AND THE MEETING WAS DONE TO INTRODUCE ABOUT THE PROJECT THAT WE ARE GOING TO DO AND RESPONSIBILITY WERE DISTRIBUTED. MR. KARMA GURUNG: HEAD OF THE PROJECT MR. DEV RAJ PARIYAR: DATA ANALYST MR. TSEWANG DORJE LAMA: DATA ENTRY COORDINATOR. SECOND PLAINNING FOR THE DATA ENTRY DATA FROM THE SCHOOL WAS BEING COLLECTING BY MR. KARMA GURUNG AND WAS GIVEN TO MR. TSEWANG DORJE. FORTH, FIFTH AND SIXTH DATA ENTRY THE STUDENTS WERE COLLECTED TO DATA IN MS-EXCEL. THE ENTRY LEVEL STUDENTS WERE SLEF VOLUNTEERED AND WAS SUPERVISED BY MR. TSEWANG DORJE ALL THE TIME WHEN IN DATA ENTRY PERIOD. SEVENTH DATA FILTER MR DEV RAJ FILTERED DATA EIGHTH FINALIZATION OF THE DATA AFTER THE ENTRY OF DATA FINISHED. THE ENTERED DATA WAS CHECKED AND CONFORMED BY MR KARMA GURUNG AND MR DEV RAJ', 'views/videos/SampleVideo_1280x720_20mb.mp4'),
(31, 9, '', '', '1', '', '<iframe width=286.6999528726534 height=392 seamless frameborder=0 scrolling=no src=https://docs.google.com/spreadsheets/d/e/2PACX-1vR5jNMyZ77YzLIgRFAQtF4T7cOIpLzCw9LuGIDbwdq5mXSIc-qJ_XmoxU5k0klmx6ZmpkB8lvmHD0Yx/pubchart?oid=314376773&format=interactive></iframe>\r\n\r\n\r\nSummary about the July report', ''),
(32, 9, 'small.mp4', 'label', '2', 'Header', 'Note about the video on Analytics instead of presentation.', 'views/videos/small.mp4'),
(33, 2, '', 'Test label', '4', 'Test header', 'Test body', '');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` varchar(200) NOT NULL,
  `label` varchar(200) NOT NULL,
  `value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `label`, `value`) VALUES
('debug-status', 'Debug Status', '1'),
('site-title', 'Site Title', 'AI_Interf 0.01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first` varchar(200) NOT NULL,
  `last` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `type` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `username`, `password`, `email`, `status`, `type`) VALUES
(2, 'Mr. Karma', 'Gurung', 'gurungikarma', '17b7f504e9d3fecbc404eaa167d1ee87', 'gurungikarma@ymail.com', 1, 0),
(7, 'Shrijal', 'Kaphle', 'shrijal', '24a3fa841d6b2a7bc1f17bf1cdb92864', 'kaphle.shrijal9@gmail.com', 1, 1),
(8, 'Dev', 'Raj', 'Devraj', '9b82672e76df21d0b52ae1a37443d76f', 'test@gmail.com', 1, 1),
(9, 'Sonam ', 'Thargyal', 'shambhalamart', '153e95729a454510b4ff5fadee7ccd59', 'sonamdhargyal74@gmail.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applied`
--
ALTER TABLE `applied`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filesUpload`
--
ALTER TABLE `filesUpload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myed`
--
ALTER TABLE `myed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newclient`
--
ALTER TABLE `newclient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
-- AUTO_INCREMENT for table `applied`
--
ALTER TABLE `applied`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `filesUpload`
--
ALTER TABLE `filesUpload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `myed`
--
ALTER TABLE `myed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newclient`
--
ALTER TABLE `newclient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
