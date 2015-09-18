-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 24, 2015 at 05:27 PM
-- Server version: 5.5.40
-- PHP Version: 5.4.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `caps`
--
CREATE DATABASE IF NOT EXISTS `caps` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `caps`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
`id` int(11) NOT NULL,
  `org_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `category` text NOT NULL,
  `address` text NOT NULL,
  `str_num` int(4) NOT NULL,
  `zipcode` int(5) NOT NULL,
  `area` text NOT NULL,
  `day` date NOT NULL,
  `time` time NOT NULL,
  `agegroup` text NOT NULL,
  `skills` text NOT NULL,
  `sdesc` text NOT NULL,
  `ddesc` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Holds the data for the events';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `org_id`, `title`, `category`, `address`, `str_num`, `zipcode`, `area`, `day`, `time`, `agegroup`, `skills`, `sdesc`, `ddesc`) VALUES
(1, 1, 'Opportunity 1 for kids', 'Animals', 'some street', 12, 55133, 'Ανω Τούμπα', '0000-00-00', '11:00:00', 'Kids', '41', 'ase me', ''),
(2, 3, 'bitches and peahces', 'Animals', 'alexander', 12, 33333, 'Πυλαία', '0000-00-00', '01:00:00', 'Teens', '39', 'afise me', ''),
(3, 3, 'teenagers gather', 'Evnironement', 'soupa', 12, 11111, 'Καλαμαριά', '0000-00-00', '04:04:00', 'Teens', '42', 'lol teens sfdsf asdf dafgad fadf adfadf adf adf daf daf adf adf da fadf daf daf adf', ''),
(4, 4, 'Spit and cum', 'Healthcare', 'lololol', 3, 10001, 'Βάρνα', '0000-00-00', '04:03:00', 'Adults', '55', 'sssssssssssssssssssssssssssssssssssssssssssssssss s', ''),
(5, 2, 'Testing stuff', 'Emergency', 'ase', 23, 10004, 'Κωνσταντινοπολίτικα', '0000-00-00', '00:00:00', 'Groups', '40', 'sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasdasdasdasdasd sadasd', ''),
(6, 1, 'Testing Detailed Desc', 'Education', 'wind', 23, 12334, 'Καλαμαριά', '0000-00-00', '03:05:00', 'Adults', '37', 'This is just a test atesting detailed description ok? One more thing, don&#039;t trust the Wind internet provider. They suck ASS. Worst company ever.', 'Being a trustee is a life changing experience and can bring vital knowledge, skills and leadership to the charity. We are offering four trustee training sessions at City Hall throughout 2015.\r\n\r\nOne of the best aspects of my job is the chance it gives me every week to meet Londoners who are in one way or another doing something for our city and our communities. We saw such a fantastic example of this over the summer of 2012 when London showed its very best to the world. Our volunteers are backed by thousands of voluntary groups and charities in the capital manned by heroic staff who give their time to help make London a better place. Our challenge now is to build on the experiences of the summer, ensuring a lasting legacy for volunteering in London. For those of you who want to volunteer, there are literally hundreds of opportunities on this website, from helping young people gain new skills, to creating community gardens or befriending an older person. I encourage you all, organisations and individuals, to sign up to do something great for our city and communities. Team London can help all Londoners, whatever their background or age, to come together to address our city’s greatest needs: making our communities a better place to live, and increasing opportunities for young people. Team London aims to make volunteering easy to do and even easier to find out about. We will also measure the impact of our programmes so that Londoners know what difference their efforts have made. I know that these are challenging times for the voluntary sector and indeed for many people concerned about their own financial prospects. In spite of this, there appears to be no shortage of goodwill among Londoners to play their part in the life of our city - last year over 60% of Londoners volunteered informally, compared to 49% the year before. All successful teams are greater than the sum of their individual parts. I believe we can achieve even more when we all act together. Team London is about renewed focus and more effective coordination. It is about greater recognition, enjoyment and celebration. Above all, it is about results. I want every hour of Londoners’ volunteering time to achieve the greatest possible impact – for our communities, for the next generation and for London as a whole.');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
`id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='A table to store homepage news.';

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `body`) VALUES
(1, 'Alien sighted in China Town!', 'One of the best aspects of my job is the chance it gives me every week to meet Londoners who are in one way or another doing something for our city and our communities.', 'images/Garrus.jpg', 'One of the best aspects of my job is the chance it gives me every week to meet Londoners who are in one way or another doing something for our city and our communities. We saw such a fantastic example of this over the summer of 2012 when London showed its very best to the world. Our volunteers are backed by thousands of voluntary groups and charities in the capital manned by heroic staff who give their time to help make London a better place.\r\n\r\nOur challenge now is to build on the experiences of the summer, ensuring a lasting legacy for volunteering in London. For those of you who want to volunteer, there are literally hundreds of opportunities on this website, from helping young people gain new skills, to creating community gardens or befriending an older person. I encourage you all, organisations and individuals, to sign up to do something great for our city and communities.\r\n\r\nTeam London can help all Londoners, whatever their background or age, to come together to address our city’s greatest needs: making our communities a better place to live, and increasing opportunities for young people.\r\n\r\nTeam London aims to make volunteering easy to do and even easier to find out about. We will also measure the impact of our programmes so that Londoners know what difference their efforts have made.\r\n\r\nI know that these are challenging times for the voluntary sector and indeed for many people concerned about their own financial prospects. In spite of this, there appears to be no shortage of goodwill among Londoners to play their part in the life of our city - last year over 60% of Londoners volunteered informally, compared to 49% the year before.\r\n\r\nAll successful teams are greater than the sum of their individual parts. I believe we can achieve even more when we all act together. Team London is about renewed focus and more effective coordination. It is about greater recognition, enjoyment and celebration. Above all, it is about results. I want every hour of Londoners’ volunteering time to achieve the greatest possible impact – for our communities, for the next generation and for London as a whole.'),
(2, 'Just another title, whatca gonna do bout it?', 'Being a trustee is a life changing experience and can bring vital knowledge, skills and leadership to the charity. We are offering four trustee training sessions at City Hall throughout 2015.', 'images/Alucard.jpg', 'One of the best aspects of my job is the chance it gives me every week to meet Londoners who are in one way or another doing something for our city and our communities. We saw such a fantastic example of this over the summer of 2012 when London showed its very best to the world. Our volunteers are backed by thousands of voluntary groups and charities in the capital manned by heroic staff who give their time to help make London a better place.\r\n\r\nOur challenge now is to build on the experiences of the summer, ensuring a lasting legacy for volunteering in London. For those of you who want to volunteer, there are literally hundreds of opportunities on this website, from helping young people gain new skills, to creating community gardens or befriending an older person. I encourage you all, organisations and individuals, to sign up to do something great for our city and communities.\r\n\r\nTeam London can help all Londoners, whatever their background or age, to come together to address our city’s greatest needs: making our communities a better place to live, and increasing opportunities for young people.\r\n\r\nTeam London aims to make volunteering easy to do and even easier to find out about. We will also measure the impact of our programmes so that Londoners know what difference their efforts have made.\r\n\r\nI know that these are challenging times for the voluntary sector and indeed for many people concerned about their own financial prospects. In spite of this, there appears to be no shortage of goodwill among Londoners to play their part in the life of our city - last year over 60% of Londoners volunteered informally, compared to 49% the year before.\r\n\r\nAll successful teams are greater than the sum of their individual parts. I believe we can achieve even more when we all act together. Team London is about renewed focus and more effective coordination. It is about greater recognition, enjoyment and celebration. Above all, it is about results. I want every hour of Londoners’ volunteering time to achieve the greatest possible impact – for our communities, for the next generation and for London as a whole.'),
(3, 'TEST TEST TEST TEST TEST thats tight biyches', 'Being a trustee is a life changing experience and can bring vital knowledge, skills and leadership to the charity. We are offering four trustee training sessions at City Hall throughout 2015.', 'images/Jensen.jpg', 'One of the best aspects of my job is the chance it gives me every week to meet Londoners who are in one way or another doing something for our city and our communities. We saw such a fantastic example of this over the summer of 2012 when London showed its very best to the world. Our volunteers are backed by thousands of voluntary groups and charities in the capital manned by heroic staff who give their time to help make London a better place.\r\n\r\nOur challenge now is to build on the experiences of the summer, ensuring a lasting legacy for volunteering in London. For those of you who want to volunteer, there are literally hundreds of opportunities on this website, from helping young people gain new skills, to creating community gardens or befriending an older person. I encourage you all, organisations and individuals, to sign up to do something great for our city and communities.\r\n\r\nTeam London can help all Londoners, whatever their background or age, to come together to address our city’s greatest needs: making our communities a better place to live, and increasing opportunities for young people.\r\n\r\nTeam London aims to make volunteering easy to do and even easier to find out about. We will also measure the impact of our programmes so that Londoners know what difference their efforts have made.\r\n\r\nI know that these are challenging times for the voluntary sector and indeed for many people concerned about their own financial prospects. In spite of this, there appears to be no shortage of goodwill among Londoners to play their part in the life of our city - last year over 60% of Londoners volunteered informally, compared to 49% the year before.\r\n\r\nAll successful teams are greater than the sum of their individual parts. I believe we can achieve even more when we all act together. Team London is about renewed focus and more effective coordination. It is about greater recognition, enjoyment and celebration. Above all, it is about results. I want every hour of Londoners’ volunteering time to achieve the greatest possible impact – for our communities, for the next generation and for London as a whole.');

-- --------------------------------------------------------

--
-- Table structure for table `organisations`
--

CREATE TABLE `organisations` (
`org_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `website` text,
  `facebook` text,
  `twitter` text,
  `other` text,
  `description` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='A table to store organisation account information.';

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`org_id`, `username`, `email`, `password`, `name`, `website`, `facebook`, `twitter`, `other`, `description`) VALUES
(1, 'org1', 'org@org.gr', '123', 'Bitch Org for kids', 'https://www.google.gr/webhp?hl=el', 'https://www.google.gr/webhp?hl=el', 'https://www.google.gr/webhp?hl=el', 'https://www.google.gr/webhp?hl=el', 'test test test test'),
(2, 'org2', 'org2@org.gr', 'abc', 'Brand new organisation', '', '', '', '', 'Testing stuff.'),
(3, 'org3', 'someorg@sth.com', 'qwe', 'None of your business', '', '', '', '', 'Tis but a barren wasteland'),
(4, 'org4', 'org@yahoo.com', 'qaz', 'No Name plis', '', '', '', '', 'NOOOOOOOOOOOOOOOOOOOOOOO');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
`id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `lastname` text NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `pasword` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `str_number` int(4) NOT NULL,
  `zip` int(7) NOT NULL,
  `city` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='A table storing user account information.';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `pasword`, `phone`, `address`, `str_number`, `zip`, `city`, `date`) VALUES
(1, 'John', 'Dem', 'johndem', 'john@csd.gr', '12345', '23232', 'street 1', 21, 54621, 'Thessalonki', '2015-03-04'),
(2, 'Jack', 'Lemon', 'leming', 'lemon@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisations`
--
ALTER TABLE `organisations`
 ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
