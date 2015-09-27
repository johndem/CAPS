-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 09, 2015 at 10:13 PM
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
-- Table structure for table `agegroups`
--

CREATE TABLE `agegroups` (
`id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agegroups`
--

INSERT INTO `agegroups` (`id`, `title`) VALUES
(1, 'Kids'),
(2, 'Teens'),
(3, 'Adults'),
(4, 'Elders'),
(5, 'Groups');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
`id` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `volunteerID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `eventID`, `volunteerID`) VALUES
(1, 25, 1),
(2, 22, 1),
(3, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
`id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Education'),
(2, 'Healthcare'),
(3, 'Environment'),
(4, 'Animals'),
(5, 'Emergency'),
(6, 'Communities');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
`id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `title`) VALUES
(1, 'Ανω Τούμπα'),
(2, 'Αμπελόκηποι Θεσσαλονίκης'),
(3, 'Ασβεστοχώρι'),
(4, 'Βάρνα'),
(5, 'Κωνσταντινοπολίτικα'),
(6, 'Σαράντα Εκκλησιές'),
(7, 'Κάτω Τούμπα'),
(8, 'Καλαμαριά'),
(9, 'Πυλαία');

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
  `ddesc` text NOT NULL,
  `image` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COMMENT='Holds the data for the events';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `org_id`, `title`, `category`, `address`, `str_num`, `zipcode`, `area`, `day`, `time`, `agegroup`, `skills`, `sdesc`, `ddesc`, `image`, `image2`, `image3`, `status`) VALUES
(1, 1, 'Opportunity 1 for kids', 'Animals', 'some street', 12, 55133, 'Ανω Τούμπα', '2015-05-05', '11:00:00', 'Kids', '41', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula.', 'Nunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\r\n\r\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.', '', '', '', 0),
(2, 3, 'An event about animals of our City', 'Animals', 'alexander', 12, 33333, 'Πυλαία', '2015-05-06', '01:00:00', 'Teens', '39', 'Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.', 'Nunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\r\n\r\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.', '', '', '', 0),
(3, 3, 'Teenagers gather', 'Environment', 'soupa', 12, 11111, 'Καλαμαριά', '2015-09-10', '04:04:00', 'Teens', '42', 'Vestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu.', 'Nunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\r\n\r\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.', '', '', '', 0),
(4, 4, 'Hospital aiding for our citizens!', 'Healthcare', 'Some Address', 3, 10001, 'Βάρνα', '2015-05-16', '04:03:00', 'Adults', '55', 'Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Nunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\r\n\r\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.', '', '', '', 0),
(5, 2, 'Testing for our City!', 'Emergency', 'Papadopo', 23, 10004, 'Κωνσταντινοπολίτικα', '2015-05-14', '03:07:07', 'Groups', '40', 'Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nEtiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nEtiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', '', '', '', 0),
(6, 1, 'Testing Detailed Desc', 'Education', 'Χαλκηδόνας', 8, 55133, 'Καλαμαριά', '0000-00-00', '03:05:00', 'Adults', '37', 'This is just a test atesting detailed description ok? One more thing, don&#039;t trust the Wind internet provider. They suck ASS. Worst company ever.', 'Being a trustee is a life changing experience and can bring vital knowledge, skills and leadership to the charity. We are offering four trustee training sessions at City Hall throughout 2015.\r\n\r\nOne of the best aspects of my job is the chance it gives me every week to meet Londoners who are in one way or another doing something for our city and our communities. We saw such a fantastic example of this over the summer of 2012 when London showed its very best to the world. Our volunteers are backed by thousands of voluntary groups and charities in the capital manned by heroic staff who give their time to help make London a better place. Our challenge now is to build on the experiences of the summer, ensuring a lasting legacy for volunteering in London. For those of you who want to volunteer, there are literally hundreds of opportunities on this website, from helping young people gain new skills, to creating community gardens or befriending an older person. I encourage you all, organisations and individuals, to sign up to do something great for our city and communities. Team London can help all Londoners, whatever their background or age, to come together to address our city’s greatest needs: making our communities a better place to live, and increasing opportunities for young people. Team London aims to make volunteering easy to do and even easier to find out about. We will also measure the impact of our programmes so that Londoners know what difference their efforts have made. I know that these are challenging times for the voluntary sector and indeed for many people concerned about their own financial prospects. In spite of this, there appears to be no shortage of goodwill among Londoners to play their part in the life of our city - last year over 60% of Londoners volunteered informally, compared to 49% the year before. All successful teams are greater than the sum of their individual parts. I believe we can achieve even more when we all act together. Team London is about renewed focus and more effective coordination. It is about greater recognition, enjoyment and celebration. Above all, it is about results. I want every hour of Londoners’ volunteering time to achieve the greatest possible impact – for our communities, for the next generation and for London as a whole.', '', '', '', 0),
(7, 1, 'GEOcoding', 'Education', 'Geographical', 23, 34343, 'Αμπελόκηποι Θεσσαλονίκης', '2015-05-01', '05:00:00', 'Adults', '37', 'Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nEtiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nEtiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', '', '', '', 1),
(8, 1, 'Another geo test for Citizens', 'Healthcare', 'Palaiologou', 34, 34343, 'Αμπελόκηποι Θεσσαλονίκης', '2015-05-13', '03:04:00', 'Adults', '41', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Nunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\r\n\r\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.', '', '', '', 1),
(9, 1, 'A greener future for all of us!', 'Environment', 'Greeny', 2, 54621, 'Αμπελόκηποι Θεσσαλονίκης', '2015-05-09', '03:04:00', 'Adults', '39', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', '', '', '', 0),
(10, 1, 'Alert for our kids!', 'Environment', 'Coperti', 3, 32232, 'Ασβεστοχώρι', '2015-05-07', '01:00:00', 'Teens', '39', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', '', '', '', 0),
(11, 1, 'Teach kids about sheltering animals', 'Education', 'Catz', 3, 44444, 'Αμπελόκηποι Θεσσαλονίκης', '2015-07-22', '01:00:00', 'Adults', '40', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', '', '', '', 0),
(12, 1, 'Volunteers for healthcare needed', 'Healthcare', 'Hospital', 22, 33333, 'Σαράντα Εκκλησιές', '2015-05-28', '12:00:00', 'Adults', '40', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', '', '', '', 0),
(13, 1, 'A Real Event for green life', 'Environment', 'Βαζελώνος', 30, 55132, 'Καλαμαριά', '2015-05-14', '03:57:00', 'Adults', '39', 'What more is there to say? This is not fake and a test. You be at the specified address at the specified time to do some volunteering. Your city needs you!', 'Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.\r\n\r\nSed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque.', '', '', '', 0),
(18, 1, 'An Event', 'Communities', 'adad', 23, 33333, 'Ανω Τούμπα', '2015-07-08', '14:02:00', 'Kids', '37', 'An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event ', 'An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event An Event v', '', '', '', 0),
(21, 1, 'Artistic festival volunteers required', 'Education', 'Χαλκηδόνος', 8, 55133, 'Καλαμαριά', '2015-06-08', '00:00:05', 'Adults', '39', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit.', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.', 'images/Alucard 3.jpg', '', '', 0),
(22, 1, 'Look after the Elderly', 'Education', 'Χαλκηδόνος', 8, 55133, 'Καλαμαριά', '2015-06-11', '00:00:05', 'Adults', '39', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat bibendum pretium. Aenean vel nisl nec enim pulvinar finibus.', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.', 'images/tommylee.jpg', '', '', 0),
(25, 1, 'Plant trees and grass', 'Education', 'Βαζελώνος', 30, 55133, 'Καλαμαριά', '2015-06-02', '00:00:19', 'Adults', '37', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat bibendum pretium. Aenean vel nisl nec enim pulvinar finibus.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat bibendum pretium. Aenean vel nisl nec enim pulvinar finibus. Nunc sit amet condimentum lacus, id gravida elit. Vestibulum nec felis placerat purus commodo efficitur. Nulla vel purus in dui imperdiet lobortis ac vitae purus. Nulla risus felis, bibendum sed condimentum et, varius ac est. Nulla vitae finibus leo, in aliquam tellus.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat bibendum pretium. Aenean vel nisl nec enim pulvinar finibus. Nunc sit amet condimentum lacus, id gravida elit. Vestibulum nec felis placerat purus commodo efficitur. Nulla vel purus in dui imperdiet lobortis ac vitae purus. Nulla risus felis, bibendum sed condimentum et, varius ac est. Nulla vitae finibus leo, in aliquam tellus.', 'images/Daedric.jpg', 'images/Ebony.jpg', 'images/Elven.jpg', 1),
(26, 1, 'A Cancelled Event', 'Education', 'Cuz', 1, 11111, 'Ανω Τούμπα', '0000-00-00', '00:00:01', 'Adults', '37', 'Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because ', 'Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because \n\nJust because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because Just because ', '', '', '', -1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='A table to store homepage news.';

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `body`) VALUES
(1, 'Development of the Volunteering platform has commenced!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula.', 'images/hands.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula. Nullam quis pulvinar purus. In faucibus viverra cursus. Curabitur in euismod lacus. Nullam condimentum, tortor sed tempus blandit, odio ex eleifend nisl, eget rutrum odio enim sit amet purus. Phasellus non neque dolor.\r\n\r\nNunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\r\n\r\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.\r\n\r\nDonec rhoncus varius tellus, eget sollicitudin magna tristique sed. Aliquam lobortis, tellus quis vehicula vulputate, lectus urna faucibus nunc, non rhoncus tortor dui at ipsum. Integer suscipit a massa nec varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam commodo magna quis dui rhoncus, vitae condimentum arcu blandit. Quisque varius pharetra fringilla. Proin congue porta mauris, ut blandit ex dapibus id. Nullam varius tellus sem, sit amet sagittis nisl tincidunt eu. Sed gravida facilisis sapien, in sagittis dolor. Ut vel dapibus orci. Aliquam id efficitur nisl. Maecenas ullamcorper, leo nec tempor pellentesque, purus eros sodales magna, eu fermentum nulla ante vel ligula. Donec faucibus consectetur nibh a dignissim.\r\n\r\nProin et leo a velit congue vestibulum at at quam. Fusce pretium nibh eget ullamcorper aliquet. Nullam ipsum mauris, euismod vitae tincidunt in, sagittis at metus. Praesent libero elit, interdum quis mattis vel, viverra eu dolor. Fusce sit amet dapibus sem. Vestibulum molestie dictum justo in auctor. Morbi urna nisl, euismod eu justo quis, volutpat maximus tellus. Ut ac mattis erat, eu volutpat lectus. Mauris non sapien sodales arcu pretium pretium vel a elit. Praesent non dapibus sem. Ut vitae leo dui. In consectetur lorem et nibh blandit, id tempor ligula gravida. Fusce a tempus lectus, vitae hendrerit odio. Fusce quis risus consectetur, faucibus purus non, faucibus velit.'),
(2, 'Alpha Version is now out, check it out!', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula.', 'images/vi.png', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula. Nullam quis pulvinar purus. In faucibus viverra cursus. Curabitur in euismod lacus. Nullam condimentum, tortor sed tempus blandit, odio ex eleifend nisl, eget rutrum odio enim sit amet purus. Phasellus non neque dolor.\r\n\r\nNunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\r\n\r\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.\r\n\r\nDonec rhoncus varius tellus, eget sollicitudin magna tristique sed. Aliquam lobortis, tellus quis vehicula vulputate, lectus urna faucibus nunc, non rhoncus tortor dui at ipsum. Integer suscipit a massa nec varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam commodo magna quis dui rhoncus, vitae condimentum arcu blandit. Quisque varius pharetra fringilla. Proin congue porta mauris, ut blandit ex dapibus id. Nullam varius tellus sem, sit amet sagittis nisl tincidunt eu. Sed gravida facilisis sapien, in sagittis dolor. Ut vel dapibus orci. Aliquam id efficitur nisl. Maecenas ullamcorper, leo nec tempor pellentesque, purus eros sodales magna, eu fermentum nulla ante vel ligula. Donec faucibus consectetur nibh a dignissim.\r\n\r\nProin et leo a velit congue vestibulum at at quam. Fusce pretium nibh eget ullamcorper aliquet. Nullam ipsum mauris, euismod vitae tincidunt in, sagittis at metus. Praesent libero elit, interdum quis mattis vel, viverra eu dolor. Fusce sit amet dapibus sem. Vestibulum molestie dictum justo in auctor. Morbi urna nisl, euismod eu justo quis, volutpat maximus tellus. Ut ac mattis erat, eu volutpat lectus. Mauris non sapien sodales arcu pretium pretium vel a elit. Praesent non dapibus sem. Ut vitae leo dui. In consectetur lorem et nibh blandit, id tempor ligula gravida. Fusce a tempus lectus, vitae hendrerit odio. Fusce quis risus consectetur, faucibus purus non, faucibus velit.');

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
  `description` text NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='A table to store organisation account information.';

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`org_id`, `username`, `email`, `password`, `name`, `website`, `facebook`, `twitter`, `other`, `description`, `picture`) VALUES
(1, 'org1', 'org@org.gr', '123', 'Org For Kids', 'https://www.google.gr/webhp?sourceid=chrome-instant&amp;ion=1&amp;espv=2&amp;ie=UTF-8#q=jquery+ajax+file+upload+contenttype', 'https://www.google.gr/webhp?sourceid=chrome-instant&amp;ion=1&amp;espv=2&amp;ie=UTF-8#q=jquery+ajax+file+upload+contenttype', 'https://www.google.gr/webhp?sourceid=chrome-instant&amp;ion=1&amp;espv=2&amp;ie=UTF-8#q=jquery+ajax+file+upload+contenttype', 'https://www.google.gr/webhp?sourceid=chrome-instant&amp;ion=1&amp;espv=2&amp;ie=UTF-8#q=jquery+ajax+file+upload+contenttype', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/John Greyjoy.png'),
(2, 'org2', 'org2@org.gr', 'abc', 'Brand new organisation', 'https://www.youtube.com/', 'https://www.youtube.com/', '', '', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit.', 'images/profile.png'),
(3, 'org3', 'someorg@sth.com', 'qwe', 'Greener energy for all!', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.youtube.com/', '', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', 'images/profile.png'),
(4, 'org4', 'org@yahoo.com', 'qaz', 'Airport corporation', 'https://www.youtube.com/', 'https://www.youtube.com/', '', '', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', 'images/profile.png'),
(5, 'organization5', 'org5@yahoo.gr', '1234567890', 'Organization 5', '', '', '', '', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/profile.png'),
(6, 'organization6', 'org6@yahoo.gr', '1234567890', 'Just org 6', '', '', '', '', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/profile.png'),
(7, 'organization7', 'org7@hotmail.com', '1234567890', 'Organization 7 Thess', '', '', '', '', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/profile.png'),
(8, 'organization8', 'org8@hotmail.gr', '1234567890', 'Organization 8 Energy', '', '', '', '', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/profile.png'),
(9, 'organization9', 'org9@yahoo.gr', '1234567890', 'Organization 9 For the City', '', '', '', '', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/profile.png'),
(10, 'organization10', 'org10@yahoo.gr', '1234567890', 'Organization 9', '', '', '', '', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/profile.png'),
(11, 'organization11', 'org11@yahoo.gr', '1234567890', 'Organization 11 Plants', '', '', '', '', 'Praesent et auctor nisi. Aliquam erat volutpat. Fusce ornare efficitur erat, nec feugiat felis elementum ut. Praesent a quam sed justo suscipit placerat. Vivamus et maximus ante. Curabitur porttitor urna varius malesuada suscipit. Donec sed dolor euismod, varius orci in, eleifend odio.Ok yes.', 'images/profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
`id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='Volunteers that participated in each event';

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`id`, `event_id`, `volunteer_id`) VALUES
(1, 25, 1),
(2, 25, 2),
(3, 25, 7),
(4, 25, 8),
(5, 7, 1),
(6, 7, 2),
(7, 8, 1),
(8, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
`skill_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='Optional skills for events';

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`skill_id`, `value`, `skill`) VALUES
(1, 37, 'Administration'),
(2, 38, 'Advice, Information and Support'),
(3, 39, 'Architecture, Building and Construction'),
(4, 40, 'Arts, Entertainment and Music'),
(5, 41, 'Befriending, Buddying and Mentoring'),
(6, 42, 'Business, Management and Research'),
(7, 43, 'Campaigning and Lobbying'),
(8, 44, 'Caring'),
(9, 45, 'Catering'),
(10, 46, 'Counselling'),
(11, 47, 'Driving'),
(12, 48, 'Events and Stewarding'),
(13, 49, 'Finance and accountancy'),
(14, 50, 'First Aid'),
(15, 51, 'Fundraising'),
(16, 52, 'Gardening and Conservation'),
(17, 53, 'General and Helping'),
(18, 54, 'Group Volunteering'),
(19, 55, 'Hostel Work'),
(20, 56, 'Languages'),
(21, 57, 'Legal and the Law'),
(22, 58, 'Local Events'),
(23, 59, 'Manual Work and DIY'),
(24, 60, 'Marketing, Media and Communications'),
(25, 61, 'Officials'),
(26, 62, 'Retail and Charity Shops'),
(27, 63, 'Sports and Coaching'),
(28, 64, 'Teaching, Training and Leading'),
(29, 65, 'Technology and the Internet'),
(30, 66, 'Trusteeship and Committees'),
(31, 67, 'Youth Work');

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
  `date` date NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='A table storing user account information.';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `pasword`, `phone`, `address`, `str_number`, `zip`, `city`, `date`, `picture`) VALUES
(1, 'John', 'Cool', 'johncool', 'john@csd.gr', '12345', '', '', 0, 0, 'Thessalonki', '0000-00-00', 'images/Alucard.jpg'),
(2, 'Jack', 'Lemon', 'leming', 'lemon@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', 'images/profile.png'),
(3, 'JackieX', 'ChanY', 'chan76', 'jchan@hotmail.com', '1234567890', '2222222222', 'china', 11, 44444, 'Thessaloniki', '0000-00-00', 'images/Garrus.jpg'),
(5, 'Babis', 'Babis', 'babis123', 'babis@csd.auth.gr', '1234567890', '', '', 11, 22222, 'Thessaloniki', '0000-00-00', 'images/profile.png'),
(6, 'Jason B.', 'Statham', 'jsonstatham', 'json@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', ''),
(7, 'Yani Xontro', 'Coral', 'yannii', 'xontro@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', ''),
(8, 'Sir', 'Pudding', 'puddy', 'puddy@yahoo.com', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', 'images/profile.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agegroups`
--
ALTER TABLE `agegroups`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply`
--
ALTER TABLE `apply`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
 ADD PRIMARY KEY (`id`);

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
-- Indexes for table `participation`
--
ALTER TABLE `participation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
 ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agegroups`
--
ALTER TABLE `agegroups`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;