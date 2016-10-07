-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 06, 2016 at 10:49 PM
-- Server version: 5.5.45
-- PHP Version: 5.4.45

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caps`
--
CREATE DATABASE IF NOT EXISTS `caps` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `caps`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', '123');

-- --------------------------------------------------------

--
-- Table structure for table `agegroups`
--

CREATE TABLE `agegroups` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agegroups`
--

INSERT INTO `agegroups` (`id`, `title`) VALUES
(1, 'Παιδιά'),
(2, 'Έφηβοι'),
(3, 'Ενήλικες'),
(4, 'Ηλικιωμένοι'),
(5, 'Groups'),
(6, 'Όλοι');

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE `apply` (
  `id` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `volunteerID` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL,
  `selected` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`id`, `eventID`, `volunteerID`, `skill_id`, `selected`) VALUES
(4, 21, 2, 46, 0),
(12, 21, 1, 48, 0);

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
(1, 'Εκπαίδευση'),
(2, 'Περίθαλψη'),
(3, 'Περιβάλλον'),
(4, 'Ζώα'),
(5, 'Έκτακτη Ανάγκη'),
(6, 'Κοινότητες');

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='Holds the data for the events';

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `org_id`, `title`, `category`, `address`, `str_num`, `zipcode`, `area`, `day`, `time`, `agegroup`, `skills`, `sdesc`, `ddesc`, `image`, `image2`, `image3`, `status`) VALUES
(21, 2, 'Eθελοντική στήριξη του Πασχαλινού Bazaar του ιδρύματος για παιδιά ΕΛΕΠΑΠ', 'Κοινότητες', 'Κομνηνών', 58, 55132, 'Καλαμαριά', '2016-04-12', '17:00:00', 'Ενήλικες', '41', 'Το Πάσχα πλησιάζει και οι προετοιμασίες της ΕΛΕΠΑΠ για την υλοποίηση του Πασχαλινού Bazaar εντείνονται. Τα έσοδα του Bazaar θα διατεθούν για την υποστήριξη της επαγγελματικής και κοινωνικής ένταξης των ενηλίκων αποφοίτων των προγραμμάτων της ΕΛΕΠΑΠ.', 'Η ΕΛΙΞ και φέτος υποστηρίζει το έργο του ιδρύματος για παιδιά με αναπηρίες ΕΛΕΠΑΠ στην Θεσσαλονίκη και ζητά την εθελοντική σας βοήθεια.\n\nΤο Πάσχα πλησιάζει και οι προετοιμασίες της ΕΛΕΠΑΠ για την υλοποίηση του Πασχαλινού Bazaar εντείνονται. Τα έσοδα του Bazaar θα διατεθούν για την υποστήριξη της επαγγελματικής και κοινωνικής ένταξης των ενηλίκων αποφοίτων των προγραμμάτων της ΕΛΕΠΑΠ.\n\nΤώρα μπορείς και εσύ να συμβάλλεις σε αυτή την προσπάθεια!\n \nΤο εργαστήρι της ΕΛΕΠΑΠ ARTεμείς αναζητά εθελοντές για την κατασκευή δώρων.\n \nΔείγματα της δουλειάς τους εμφανίζονται στον ιστότοπο της ΕΛΕΠΑΠ, www.elepap.gr. (E-SHOP).\n \nΟ χρόνος που θα αφιερώσεις εξαρτάται από την διαθεσιμότητα σου και συμφωνείται μετά από συνεννόηση με τον υπεύθυνο των εθελοντών.\n \n- Αν είσαι δημιουργικός και υπεύθυνος στη δέσμευση που αναλαμβάνεις, με αίσθημα αλληλεγγύης και ομαδικό πνεύμα\n- Aν διαθέτεις χρόνο και διάθεση να προσφέρεις, δημιουργικότητα και δεξιότητα στις κατασκευές.\n \nΟι εθελοντές μετά το πέρας της εκδήλωσης θα λάβουν πιστοποιητικό για την συμμετοχή τους και την εθελοντική εργασία από το ΕΛΕΠΑΠ.', '../images/event-pics/volunteering5.jpg', '', '', 1),
(25, 1, 'Βοηθάμε στη συντήρηση έργων τέχνης και γλυπτών, για τον πλούσιο πολιτισμό μας.', 'Εκπαίδευση', 'Βαζελώνος', 30, 55133, 'Καλαμαριά', '2015-09-28', '20:00:00', 'Ενήλικες', '37', 'Με την έλευση του φθινοπώρου ήρθε η ώρα και φέτος να προσφέρουμε βοήθεια αλλά και να μάθουμε στο Αρχαιολογικό Μουσείο Θεσσαλονίκης.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat bibendum pretium. Aenean vel nisl nec enim pulvinar finibus. Nunc sit amet condimentum lacus, id gravida elit. Vestibulum nec felis placerat purus commodo efficitur. Nulla vel purus in dui imperdiet lobortis ac vitae purus. Nulla risus felis, bibendum sed condimentum et, varius ac est. Nulla vitae finibus leo, in aliquam tellus.\n\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam placerat bibendum pretium. Aenean vel nisl nec enim pulvinar finibus. Nunc sit amet condimentum lacus, id gravida elit. Vestibulum nec felis placerat purus commodo efficitur. Nulla vel purus in dui imperdiet lobortis ac vitae purus. Nulla risus felis, bibendum sed condimentum et, varius ac est. Nulla vitae finibus leo, in aliquam tellus.', '../images/event-pics/diavazw.png', '', '', 1),
(29, 3, 'Ελάτε να φτιάξουμε ένα δάσος', 'Περιβάλλον', 'Κομνηνών', 58, 55132, 'Καλαμαριά', '2016-04-26', '10:30:00', 'Όλοι', '37', 'Ο Περιβαλλοντικός Οικολογικός Σύλλογος Καλαμαριάς, σας προσκαλεί να συμμετάσχετε  στη  μεγάλη Δεντροφύτευση που θα πραγματοποιηθεί την Τρίτη 26 Απριλίου 2016 και ώρα 10:30 π.μ., στον πεζόδρομο Καλαμαριάς.', 'Ο Περιβαλλοντικός Οικολογικός Σύλλογος Καλαμαριάς, σας προσκαλεί να συμμετάσχετε  στη  μεγάλη Δεντροφύτευση που θα πραγματοποιηθεί την Τρίτη 26 Απριλίου 2016 και ώρα 10:30 π.μ., στον πεζόδρομο Καλαμαριάς.\n\nΤη δεντροφύτευση διοργανώνει ο Περιβαλλοντικός Οικολογικός Σύλλογος Καλαμαριάς σε συνεργασία με τη Διεύθυνση Αναδασώσεων Κεντρικής Μακεδονίας, το Ράδιο Θεσσαλονίκη 94,5 και το τηλεοπτικό κανάλι ΣΚΑΪ και θα βοηθήσουν εθελοντικά στην αρτιότερη υλοποίηση της, δεκάδες σύλλογοι και φορείς της ευρύτερης περιοχής.\n\nΑν και ο Δήμος θα διαθέσει σκαπτικά εργαλεία, οι εθελοντικές ομάδες, σύλλογοι, φορείς, μεμονωμένοι πολίτες που θα συμμετέχουν, μπορούν  να φέρουν τα εργαλεία (πατόφτυαρο, σκαλιστήρι, τσάπα κ.λ.π.) που διαθέτουν και αυτό θα διευκολύνει τη δράση.\n', '../images/event-pics/titan.png', '../images/event-pics/forest.png', '../images/event-pics/eukarpia.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `text`) VALUES
(1, 'Συγχαρητήρια για το νέο σας λογαριασμό!'),
(2, 'Μία δράση που καταχωρήσατε έχει ανασταλεί.'),
(3, 'Μία δράση που καταχωρήσατε έχει διαγραφεί.'),
(4, 'Συγχαρητήρια για την συμμετοχή σας σε μια εθελοντική δράση!'),
(5, 'Έχετε δηλώσει συμμετοχή σε μια εθελοντική δράση.'),
(6, 'Έχετε επιλεγεί για να συμμετάσχετε σε μια εθελοντική δράση.'),
(7, 'Συμμετείχατε επιτυχώς σε μια εθελοντική δράση και κερδίσατε πόντους!'),
(8, 'Μια εθελοντική δράση στην οποία δηλώσατε συμμετοχή έχει υποστεί επεξεργασία.'),
(9, 'Μια εθελοντική δράση στην οποία δηλώσατε συμμετοχή, έχει διαγραφεί.'),
(10, 'Μια εθελοντική δράση που καταχωρήσατε έχει εγκριθεί.'),
(11, 'Μια εθελοντική δράση που καταχωρήσατε έχει απορριφθεί.');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='A table to store homepage news.';

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `image`, `body`) VALUES
(8, 'Ξεκίνησε η ανάπτυξη της πλατφόρμας εθελοντισμού eθελοντισμός', 'Στόχος είναι να προμηθεύσει τους πολίτες, εθελοντές και οργανισμούς, με τα κατάλληλα εργαλεία αλλά και τα κίνητρα για την όσο το δυνατόν πιο αποτελεσματική οργάνωση ενός καθολικού δικτύου εθελοντισμού.', '../images/news-pics/volunteer2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula. Nullam quis pulvinar purus. In faucibus viverra cursus. Curabitur in euismod lacus. Nullam condimentum, tortor sed tempus blandit, odio ex eleifend nisl, eget rutrum odio enim sit amet purus. Phasellus non neque dolor.\n\nNunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\n\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.\n\nDonec rhoncus varius tellus, eget sollicitudin magna tristique sed. Aliquam lobortis, tellus quis vehicula vulputate, lectus urna faucibus nunc, non rhoncus tortor dui at ipsum. Integer suscipit a massa nec varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam commodo magna quis dui rhoncus, vitae condimentum arcu blandit. Quisque varius pharetra fringilla. Proin congue porta mauris, ut blandit ex dapibus id. Nullam varius tellus sem, sit amet sagittis nisl tincidunt eu. Sed gravida facilisis sapien, in sagittis dolor. Ut vel dapibus orci. Aliquam id efficitur nisl. Maecenas ullamcorper, leo nec tempor pellentesque, purus eros sodales magna, eu fermentum nulla ante vel ligula. Donec faucibus consectetur nibh a dignissim.\n\nProin et leo a velit congue vestibulum at at quam. Fusce pretium nibh eget ullamcorper aliquet. Nullam ipsum mauris, euismod vitae tincidunt in, sagittis at metus. Praesent libero elit, interdum quis mattis vel, viverra eu dolor. Fusce sit amet dapibus sem. Vestibulum molestie dictum justo in auctor. Morbi urna nisl, euismod eu justo quis, volutpat maximus tellus. Ut ac mattis erat, eu volutpat lectus. Mauris non sapien sodales arcu pretium pretium vel a elit. Praesent non dapibus sem. Ut vitae leo dui. In consectetur lorem et nibh blandit, id tempor ligula gravida. Fusce a tempus lectus, vitae hendrerit odio. Fusce quis risus consectetur, faucibus purus non, faucibus velit.'),
(9, 'Eθελοντική στήριξη του Πασχαλινού Bazaar του ιδρύματος για παιδιά ΕΛΕΠΑΠ', 'Το Πάσχα πλησιάζει και οι προετοιμασίες της ΕΛΕΠΑΠ για την υλοποίηση του Πασχαλινού Bazaar εντείνονται. Τα έσοδα του Bazaar θα διατεθούν για την υποστήριξη της επαγγελματικής και κοινωνικής ένταξης των ενηλίκων αποφοίτων των προγραμμάτων της ΕΛΕΠΑΠ.', '../images/news-pics/volunteering5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula. Nullam quis pulvinar purus. In faucibus viverra cursus. Curabitur in euismod lacus. Nullam condimentum, tortor sed tempus blandit, odio ex eleifend nisl, eget rutrum odio enim sit amet purus. Phasellus non neque dolor.\n\nNunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\n\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.\n\nDonec rhoncus varius tellus, eget sollicitudin magna tristique sed. Aliquam lobortis, tellus quis vehicula vulputate, lectus urna faucibus nunc, non rhoncus tortor dui at ipsum. Integer suscipit a massa nec varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam commodo magna quis dui rhoncus, vitae condimentum arcu blandit. Quisque varius pharetra fringilla. Proin congue porta mauris, ut blandit ex dapibus id. Nullam varius tellus sem, sit amet sagittis nisl tincidunt eu. Sed gravida facilisis sapien, in sagittis dolor. Ut vel dapibus orci. Aliquam id efficitur nisl. Maecenas ullamcorper, leo nec tempor pellentesque, purus eros sodales magna, eu fermentum nulla ante vel ligula. Donec faucibus consectetur nibh a dignissim.\n\nProin et leo a velit congue vestibulum at at quam. Fusce pretium nibh eget ullamcorper aliquet. Nullam ipsum mauris, euismod vitae tincidunt in, sagittis at metus. Praesent libero elit, interdum quis mattis vel, viverra eu dolor. Fusce sit amet dapibus sem. Vestibulum molestie dictum justo in auctor. Morbi urna nisl, euismod eu justo quis, volutpat maximus tellus. Ut ac mattis erat, eu volutpat lectus. Mauris non sapien sodales arcu pretium pretium vel a elit. Praesent non dapibus sem. Ut vitae leo dui. In consectetur lorem et nibh blandit, id tempor ligula gravida. Fusce a tempus lectus, vitae hendrerit odio. Fusce quis risus consectetur, faucibus purus non, faucibus velit.'),
(10, 'Η δημιουργία εφαρμογής για κινητά τηλέφωνα Android είναι σε εξέλιξη', 'Σκοπός της είναι να προσφέρει τις κατάλληλες λειτουργίες που υποστηρίζει η web εφαρμογή στην ευκολία της κινητής συσκευής εξυπηρετώντας την φορητότητα της πλατφόρμας.', '../images/news-pics/volunteer1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula. Nullam quis pulvinar purus. In faucibus viverra cursus. Curabitur in euismod lacus. Nullam condimentum, tortor sed tempus blandit, odio ex eleifend nisl, eget rutrum odio enim sit amet purus. Phasellus non neque dolor.\n\nNunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\n\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.\n\nDonec rhoncus varius tellus, eget sollicitudin magna tristique sed. Aliquam lobortis, tellus quis vehicula vulputate, lectus urna faucibus nunc, non rhoncus tortor dui at ipsum. Integer suscipit a massa nec varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam commodo magna quis dui rhoncus, vitae condimentum arcu blandit. Quisque varius pharetra fringilla. Proin congue porta mauris, ut blandit ex dapibus id. Nullam varius tellus sem, sit amet sagittis nisl tincidunt eu. Sed gravida facilisis sapien, in sagittis dolor. Ut vel dapibus orci. Aliquam id efficitur nisl. Maecenas ullamcorper, leo nec tempor pellentesque, purus eros sodales magna, eu fermentum nulla ante vel ligula. Donec faucibus consectetur nibh a dignissim.\n\nProin et leo a velit congue vestibulum at at quam. Fusce pretium nibh eget ullamcorper aliquet. Nullam ipsum mauris, euismod vitae tincidunt in, sagittis at metus. Praesent libero elit, interdum quis mattis vel, viverra eu dolor. Fusce sit amet dapibus sem. Vestibulum molestie dictum justo in auctor. Morbi urna nisl, euismod eu justo quis, volutpat maximus tellus. Ut ac mattis erat, eu volutpat lectus. Mauris non sapien sodales arcu pretium pretium vel a elit. Praesent non dapibus sem. Ut vitae leo dui. In consectetur lorem et nibh blandit, id tempor ligula gravida. Fusce a tempus lectus, vitae hendrerit odio. Fusce quis risus consectetur, faucibus purus non, faucibus velit.'),
(11, 'Η Alpha έκδοση της πλατφόρμας είναι διαθέσιμη στον ιστοχώρο του πανεπιστημίου', 'Με την διαδικασία ανάπτυξης της ιστοσελίδας του eθελοντισμός να προχωράει με γοργούς ρυθμούς, έχει ανέβει το πρώτο δείγμα γραφής με σκοπό την αποτελεσματικότερη αποσφαλμάτωση.', '../images/news-pics/volunteer3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In pellentesque sem quis varius condimentum. Integer at tortor dictum, ultricies erat eget, semper odio. Vivamus non augue suscipit, posuere neque id, tristique ligula. Nullam quis pulvinar purus. In faucibus viverra cursus. Curabitur in euismod lacus. Nullam condimentum, tortor sed tempus blandit, odio ex eleifend nisl, eget rutrum odio enim sit amet purus. Phasellus non neque dolor.\n\nNunc quis turpis purus. Phasellus diam neque, rutrum sed purus eu, malesuada dictum eros. Integer venenatis, massa eu interdum pellentesque, lorem quam tincidunt sem, ut luctus orci dui in ipsum. Donec facilisis ex at ante faucibus, nec congue urna condimentum. Nullam vitae convallis est, ut venenatis dui. Proin nunc justo, eleifend fermentum fringilla eu, ullamcorper id sem. Nullam suscipit semper convallis. Praesent vitae efficitur elit, vitae eleifend risus. Donec vel urna laoreet, lacinia mauris quis, luctus dui. Cras accumsan sit amet enim quis venenatis. Maecenas vel gravida quam, non mattis ante. Sed faucibus porta odio, efficitur bibendum nisi tincidunt vitae.\n\nVestibulum gravida porttitor lorem. Mauris ipsum nibh, maximus ac eros a, varius feugiat nisi. Etiam laoreet mollis urna, quis molestie nunc auctor eu. Sed a quam at urna imperdiet auctor. Morbi magna tortor, accumsan vitae aliquet eget, interdum viverra sapien. Cras eleifend ac dolor quis pellentesque. Sed hendrerit vel enim sed sodales. Pellentesque accumsan elementum viverra. Quisque quis quam volutpat, condimentum mauris in, tincidunt leo. In mollis quis risus in efficitur. Nulla eget faucibus lectus. Praesent aliquet sed nisi eget fringilla.\n\nDonec rhoncus varius tellus, eget sollicitudin magna tristique sed. Aliquam lobortis, tellus quis vehicula vulputate, lectus urna faucibus nunc, non rhoncus tortor dui at ipsum. Integer suscipit a massa nec varius. Interdum et malesuada fames ac ante ipsum primis in faucibus. Etiam commodo magna quis dui rhoncus, vitae condimentum arcu blandit. Quisque varius pharetra fringilla. Proin congue porta mauris, ut blandit ex dapibus id. Nullam varius tellus sem, sit amet sagittis nisl tincidunt eu. Sed gravida facilisis sapien, in sagittis dolor. Ut vel dapibus orci. Aliquam id efficitur nisl. Maecenas ullamcorper, leo nec tempor pellentesque, purus eros sodales magna, eu fermentum nulla ante vel ligula. Donec faucibus consectetur nibh a dignissim.\n\nProin et leo a velit congue vestibulum at at quam. Fusce pretium nibh eget ullamcorper aliquet. Nullam ipsum mauris, euismod vitae tincidunt in, sagittis at metus. Praesent libero elit, interdum quis mattis vel, viverra eu dolor. Fusce sit amet dapibus sem. Vestibulum molestie dictum justo in auctor. Morbi urna nisl, euismod eu justo quis, volutpat maximus tellus. Ut ac mattis erat, eu volutpat lectus. Mauris non sapien sodales arcu pretium pretium vel a elit. Praesent non dapibus sem. Ut vitae leo dui. In consectetur lorem et nibh blandit, id tempor ligula gravida. Fusce a tempus lectus, vitae hendrerit odio. Fusce quis risus consectetur, faucibus purus non, faucibus velit.');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `not_id` int(11) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `event_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ok` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id`, `not_id`, `role`, `event_id`, `date`, `ok`) VALUES
(1, 0, 1, 0, 0, '0000-00-00 00:00:00', 0),
(2, 12, 1, 1, 0, '0000-00-00 00:00:00', 0),
(3, 11, 1, 0, 0, '0000-00-00 00:00:00', 0),
(4, 11, 5, 0, 22, '0000-00-00 00:00:00', 0),
(5, 11, 6, 0, 22, '0000-00-00 00:00:00', 0),
(7, 2, 8, 0, 0, '0000-00-00 00:00:00', 1),
(8, 3, 8, 0, 0, '0000-00-00 00:00:00', 0),
(9, 11, 8, 0, 0, '0000-00-00 00:00:00', 0),
(11, 2, 11, 1, 5, '0000-00-00 00:00:00', 0),
(13, 1, 2, 1, 22, '0000-00-00 00:00:00', 1),
(15, 11, 5, 0, 21, '0000-00-00 00:00:00', 0),
(16, 1, 5, 0, 21, '2015-09-24 12:23:00', 1),
(17, 10, 5, 0, 21, '0000-00-00 00:00:00', 1),
(18, 1, 6, 0, 21, '2015-09-26 11:29:12', 1),
(19, 11, 6, 0, 21, '0000-00-00 00:00:00', 0),
(21, 10, 5, 0, 7, '0000-00-00 00:00:00', 1),
(23, 11, 9, 0, 21, '0000-00-00 00:00:00', 0),
(25, 10, 9, 0, 21, '0000-00-00 00:00:00', 1),
(26, 0, 3, 1, 7, '0000-00-00 00:00:00', 0),
(27, 1, 9, 0, 7, '0000-00-00 00:00:00', 1),
(28, 10, 9, 0, 7, '0000-00-00 00:00:00', 1),
(29, 12, 1, 0, 0, '2015-09-05 10:09:56', 0),
(30, 13, 1, 0, 0, '2015-09-05 10:15:34', 0),
(31, 14, 1, 0, 0, '2015-09-05 10:18:56', 0),
(32, 15, 1, 0, 0, '2015-09-05 10:50:13', 1),
(33, 16, 1, 0, 0, '2015-09-18 12:47:53', 0),
(35, 10, 5, 0, 21, '2015-09-20 09:56:02', 1),
(39, 1, 10, 1, 21, '2015-09-20 20:53:29', 1),
(40, 1, 5, 0, 21, '2015-09-20 21:14:50', 1),
(41, 2, 5, 0, 21, '2015-09-20 21:15:47', 0),
(42, 1, 5, 0, 21, '2015-10-19 21:45:38', 1),
(43, 1, 5, 0, 21, '2015-10-19 21:46:26', 1),
(44, 1, 5, 0, 21, '2015-10-19 21:55:42', 1),
(45, 1, 5, 0, 21, '2015-10-19 22:14:26', 1),
(46, 1, 5, 0, 21, '2015-10-19 22:39:18', 1),
(47, 1, 5, 0, 21, '2015-10-19 22:40:10', 1),
(48, 1, 5, 0, 21, '2015-10-19 22:43:02', 1),
(49, 1, 5, 0, 21, '2015-10-20 17:50:03', 1),
(50, 0, 1, 0, 0, '2015-12-04 23:12:45', 0),
(51, 33, 5, 0, 25, '2015-12-04 23:15:16', 1),
(52, 0, 1, 0, 0, '2016-10-06 17:44:24', 0),
(53, 0, 1, 0, 0, '2016-10-06 17:45:50', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='A table to store organisation account information.';

--
-- Dumping data for table `organisations`
--

INSERT INTO `organisations` (`org_id`, `username`, `email`, `password`, `name`, `website`, `facebook`, `twitter`, `other`, `description`, `picture`) VALUES
(1, 'parallaxi', 'info@parallaximag.gr', '123', 'Parallaxi', 'http://parallaximag.gr/', 'https://www.facebook.com/Parallaxi', 'https://twitter.com/parallaximag', '', 'Η Parallaxi με 25 χρόνια αδιάλειπτης παρουσίας στα έντυπα Μέσα της Θεσσαλονίκης, έχει εισβάλλει δυναμικά και στο Διαδίκτυο, με έναν ιστότοπο που αποτελεί την ηλεκτρονική φωνή της πόλης.Κάθε μήνα περισσότεροι από 200.000 μοναδικοί επισκέπτες, και πάνω από 450.000 pageviews, επισκέπτονται την  ιστοσελίδα της Parallaxi www.parallaximag.gr', '../images/profile-pics/parallaxi.jpg'),
(2, 'elix', 'elix@elix.org.gr', 'abc', 'ΕΛΙΞ', 'http://www.elix.org.gr/index.php/el/elix-ngo-gr', 'https://www.facebook.com/Elix-%CE%95%CE%BB%CE%B9%CE%BE-%CE%A0%CF%81%CE%BF%CE%B3%CF%81%CE%AC%CE%BC%CE%BC%CE%B1%CF%84%CE%B1-%CE%95%CE%B8%CE%B5%CE%BB%CE%BF%CE%BD%CF%84%CE%B9%CE%BA%CE%AE%CF%82-%CE%95%CF%81%CE%B3%CE%B1%CF%83%CE%AF%CE%B1%CF%82-171356932922261/', '', '', 'Η ΕΛΙΞ (πρώην ΠΕΕΠ - Προγράμματα Εθελοντικής Εργασίας για το Περιβάλλον) ιδρύθηκε το 1987 ύστερα από ατομική πρωτοβουλία της κας Ελένης Γαζή, σημερινή πρόεδρος του Δ.Σ. της οργάνωσης. Η συμμετοχή της σε ένα διεθνές πρόγραμμα εθελοντικής εργασίας στην Ισπανία αποτέλεσε κίνητρο για την ίδρυση της οργάνωσης ώστε να δοθεί η δυνατότητα σε περισσότερους ανθρώπους να ζήσουν μια παρόμοια εμπειρία με στόχο την ευρύτερη προώθηση της εθελοντικής προσφοράς.\n \nΤο 2007, η Μη Κυβερνητική Οργάνωση ΕΛΙΞ - Προγράμματα Εθελοντικής Εργασίας συμπλήρωσε 20 χρόνια ενεργής συμμετοχής με δράσεις, σε όλη την Ελλάδα και το εξωτερικό. Στις 11 Μαΐου, στα πλαίσια του εορτασμού αυτού, η οργάνωση Προγράμματα Εθελοντικής Εργασίας για το Περιβάλλον - Π.Ε.Ε.Π. απέκτησε το νέο της όνομα, ΕΛΙΞ, καθώς και την καινούρια εταιρική της ταυτότητα Το νέο όνομα και η ανάπτυξη νέων δράσεων αποτελούν μέρος μιας εξέλιξη που διατηρεί ως βασικός στόχος τη συμβολή στην προσωπική ανάπτυξη του ατόμου και την εξέλιξή του ως πολίτη του κόσμου μέσα από την ενεργή συμμετοχή στα κοινά.', '../images/profile-pics/elix.png'),
(3, 'diavazw', 'info@giatousallous.gr', 'qwe', 'ΔΙΑΒΑΖΩ ΓΙΑ ΤΟΥΣ ΑΛΛΟΥΣ', 'http://www.giatousallous.gr/', 'https://www.facebook.com/giatousallous', 'https://twitter.com/GiaTousAllous', '', 'Το δίκτυo Διαβάζω για τους Άλλους είναι μια μη κερδοσκοπική ομάδα εθελοντών που έχει στόχο την ανάγνωση βιβλίων σε όσους δεν μπορούν να το κάνουν μόνοι τους, όπως πχ σε τυφλούς συμπολίτες μας, σε ιδρύματα με παιδιά και ηλικιωμένους, σε νοσοκομεία, σε κλινικές τετραπληγικών, και γενικότερα σε χώρους με ευπαθείς ομάδες. Μια από τις κυριότερες δράσεις μας είναι και η ηχογράφηση ακουστικών βιβλίων για άτομα με περιορισμένη όραση.', '../images/profile-pics/diavazw.png'),
(4, 'mporoume', 'mazimporoume@gmail.com', 'qaz', 'Μαζί Μπορούμε', 'https://www.youtube.com/', 'https://www.youtube.com/', '', '', 'Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit', '../images/profile-pics/profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `participation`
--

CREATE TABLE `participation` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `volunteer_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Volunteers that participated in each event';

--
-- Dumping data for table `participation`
--

INSERT INTO `participation` (`id`, `event_id`, `volunteer_id`) VALUES
(2, 25, 2),
(3, 25, 7),
(4, 25, 8),
(6, 7, 2),
(8, 8, 8),
(9, 25, 1),
(10, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `skill_id` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `skill` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='Optional skills for events';

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
(8, 44, 'Φροντίδα'),
(9, 45, 'Catering'),
(10, 46, 'Συμβουλευτική'),
(11, 47, 'Οδήγηση'),
(12, 48, 'Events και Επιτήρηση'),
(13, 49, 'Οικονομικά και Λογιστική'),
(14, 50, 'Πρώτες Βοήθειες'),
(15, 51, 'Fundraising'),
(16, 52, 'Κηπουρική και Συντήρηση'),
(17, 53, 'Γενική βοήθεια'),
(18, 54, 'Ομαδικός Εθελοντισμός'),
(19, 55, 'Εργασία στέγασης'),
(20, 56, 'Γλώσσες'),
(21, 57, 'Νομική'),
(22, 58, 'Τοπικά Events'),
(23, 59, 'Manual Work and DIY'),
(24, 60, 'Marketing, Media and Communications'),
(25, 61, 'Officials'),
(26, 62, 'Retail and Charity Shops'),
(27, 63, 'Sports and Coaching'),
(28, 64, 'Teaching, Training and Leading'),
(29, 65, 'Technology and the Internet'),
(30, 66, 'Trusteeship and Committees');

-- --------------------------------------------------------

--
-- Table structure for table `skill_req`
--

CREATE TABLE `skill_req` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `skill_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skill_req`
--

INSERT INTO `skill_req` (`id`, `event_id`, `skill_id`) VALUES
(1, 32, 0),
(2, 33, 0),
(3, 33, 0),
(4, 33, 0),
(5, 34, 45),
(6, 34, 46),
(7, 34, 47),
(8, 22, 41),
(9, 21, 44),
(10, 21, 46),
(11, 21, 48),
(14, 7, 38),
(15, 7, 61),
(16, 28, 61),
(17, 29, 52),
(18, 29, 53),
(19, 29, 54),
(22, 30, 39),
(23, 31, 38),
(24, 31, 39);

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
  `password` text NOT NULL,
  `phone` text NOT NULL,
  `address` text NOT NULL,
  `str_number` int(4) NOT NULL,
  `zip` int(7) NOT NULL,
  `city` text NOT NULL,
  `date` date NOT NULL,
  `picture` text NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='A table storing user account information.';

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `phone`, `address`, `str_number`, `zip`, `city`, `date`, `picture`, `points`) VALUES
(1, 'Γιάννης', 'Παπαδόπουλος', 'johnpap', 'johnpap@email.gr', '12345', '', '', 1, 55555, 'Θεσσαλονίκη', '1992-09-20', '../images/profile-pics/Moriarty.jpg', 40),
(2, 'Γιώργος', 'Θεοφανίδης', 'leming', 'lemon@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', '../images/profile-pics/profile.png', 125),
(3, 'JackieX', 'ChanY', 'chan76', 'jchan@hotmail.com', '1234567890', '2222222222', 'china', 11, 44444, 'Thessaloniki', '0000-00-00', '../images/profile-pics/Garrus.jpg', 0),
(5, 'Αγγελική', 'Πατίδου', 'babis123', 'babis@csd.auth.gr', '1234567890', '', '', 11, 22222, 'Thessaloniki', '0000-00-00', '../images/profile-pics/profile.png', 45),
(7, 'Αμαλία', 'Χωριατά', 'yannii', 'xontro@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', '../images/profile-pics/Amalia.png', 80),
(8, 'Sir', 'Pudding', 'puddy', 'puddy@yahoo.com', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', '../images/profile-pics/profile.png', 0),
(10, 'indiana', 'jones', 'junior', 'junior@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', '../images/profile-pics/profile.png', 0),
(11, 'chandler', 'bing', 'chanchan', 'bing@csd.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '0000-00-00', '../images/profile-pics/profile.png', 0),
(35, 'a', 'a', 'admin', 'a@a.gr', '1234567890', '', '', 0, 0, 'Thessaloniki', '2016-10-02', '../images/profile-pics/profile.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
-- Indexes for table `skill_req`
--
ALTER TABLE `skill_req`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `agegroups`
--
ALTER TABLE `agegroups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `apply`
--
ALTER TABLE `apply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `organisations`
--
ALTER TABLE `organisations`
  MODIFY `org_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `participation`
--
ALTER TABLE `participation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `skill_req`
--
ALTER TABLE `skill_req`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
