-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 25, 2019 at 05:54 AM
-- Server version: 5.7.25
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwtraining`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'training', 'training@deerwalk.edu.np', 'Training123!');

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `id` int(11) NOT NULL,
  `verification_id` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `today` date NOT NULL,
  `fromDate` date NOT NULL,
  `toDate` date NOT NULL,
  `course` varchar(255) NOT NULL,
  `photo` varchar(250) NOT NULL,
  `course_duration` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `trainer` varchar(255) NOT NULL,
  `trainer_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`id`, `verification_id`, `name`, `vid`, `today`, `fromDate`, `toDate`, `course`, `photo`, `course_duration`, `title`, `trainer`, `trainer_title`) VALUES
(5, 'DTC-20181004-001', 'Alon Kumar Shrestha', '001', '2018-10-04', '2018-10-01', '2018-11-30', 'International English Language Testing System (IELTS)', 'uploads/1fa53b2.png', '187', 'MR. ', 'Pravin Thapaliya', 'OFFICER PACKAGE TRAINER'),
(6, 'DTC-20181005-001', 'Kiran Parajuli', '001', '2018-10-05', '2018-09-13', '2018-11-30', 'JAVA', 'uploads/6735307.jpg', '120', 'MR. ', 'Sushant Pandey', 'JAVA'),
(7, 'DTC-20181008-001', 'Pravin Thapalia', '001', '2018-10-08', '2018-10-01', '2018-11-30', 'JAVA', '', '120', 'MR. ', 'Prakash Bhatt', 'JAVA TRAINER'),
(12, 'DTC-20190222-001', 'Saurav Bhandari', '001', '2019-02-22', '2019-02-01', '2019-03-31', 'JAVA', '', '77', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(13, 'DTC-20190222-002', 'Saurav Bhandari', '002', '2019-02-22', '2019-02-01', '2019-03-31', 'JAVA', '', '77', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(14, 'DTC-20190222-003', 'Saurav Bhandaria', '003', '2019-02-22', '2019-02-01', '2019-03-24', 'JAVA', '', '76', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(15, 'DTC-20190222-004', 'Saurav Bhandaria', '004', '2019-02-22', '2019-02-01', '2019-03-24', 'JAVA', '', '76', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(16, 'DTC-20190222-005', 'Saurav Bhandaria', '005', '2019-02-22', '2019-02-01', '2019-03-24', 'JAVA', '', '76', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(17, 'DTC-20190222-006', 'Saurav Bhandaria', '006', '2019-02-22', '2019-02-01', '2019-03-24', 'JAVA', '', '76', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(18, 'DTC-20190222-007', 'Saurav Bhandaria', '007', '2019-02-22', '2019-02-01', '2019-03-24', 'JAVA', 'uploads/Saurav_DTC-20190222-007.jpg', '76', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(19, 'DTC-20190222-008', 'Saurav Bhandaria', '008', '2019-02-22', '2019-02-01', '2019-03-24', 'JAVA', '', '76', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(20, 'DTC-20190222-009', 'Saurav Bhandaria', '009', '2019-02-22', '2019-02-01', '2019-03-24', 'JAVA', 'uploads/Saurav_DTC-20190222-009.jpg', '76', 'MR. ', 'Pravin Thapaliya', 'JAVA'),
(21, 'DTC-20190222-010', 'Saurav Bhandari', '010', '2019-02-22', '2019-02-04', '2019-03-31', 'ANDROID (Operating system) ', '', '12', 'MR. ', 'Sushant Pandey', 'JAVA'),
(22, 'DTC-20190227-001', 'Raman Kumar Pandey', '001', '2019-02-27', '2019-01-10', '2019-02-13', 'ANDROID (Operating system) ', 'uploads/Raman Kumar_DTC-20190227-001.jpg', '1212', 'MS. ', 'Sushant Pandey', 'JAVA'),
(23, 'DTC-20190319-001', 'Bishesh  Amatya', '001', '2019-03-19', '2019-03-01', '2019-03-23', 'PYTHON (programming language)', 'uploads/Bishesh _DTC-20190319-001.png', '123', 'MR. ', 'Shristi Baral', 'PYTHON TRAINER'),
(24, 'DTC-20190410-001', 'Saras  Karanjit', '001', '2019-04-10', '2019-04-10', '2019-04-26', 'MICROSOFT SQL SERVER', 'uploads/Saras _DTC-20190410-001.jpg', '111', 'MR. ', 'Suraj Ghimire', 'MICROSOFT SQL SERVER'),
(25, 'DTC-20190624-001', 'Saurav  Bhandari', '001', '2019-06-24', '2019-06-05', '2019-06-12', 'PROGRAMMING IN .NET ', 'uploads/Saurav _DTC-20190624-001.jpg', '111', 'MR. ', 'Suraj Ghimire', 'MICROSOFT SQL SERVER');

-- --------------------------------------------------------

--
-- Table structure for table `certificate_teachers`
--

CREATE TABLE `certificate_teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `vid` varchar(255) NOT NULL,
  `verification_id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificate_teachers`
--

INSERT INTO `certificate_teachers` (`id`, `name`, `vid`, `verification_id`, `title`) VALUES
(3, 'Puja gajmer', '001', 'DTT-20181124-001', 'MS. '),
(4, 'Alisha Shrestha', '002', 'DTT-20181124-002', 'MS. '),
(5, 'Maitra Subba', '003', 'DTT-20181124-003', 'MS. '),
(6, 'rojana Shrestha', '004', 'DTT-20181124-004', 'MS. '),
(8, 'Anita maharjan', '005', 'DTT-20181124-005', 'MS. '),
(9, 'Sabita Shahi', '006', 'DTT-20181124-006', 'MS. '),
(10, 'Chandrakala baskota', '007', 'DTT-20181124-007', 'MS. '),
(11, 'Gita Gurung', '008', 'DTT-20181124-008', 'MS. '),
(13, 'Sumitra Acharya', '009', 'DTT-20181124-009', 'MS. '),
(14, 'Nirmala Pokharel', '010', 'DTT-20181124-010', 'MS. '),
(15, 'Chandrika Bajracharya', '011', 'DTT-20181124-011', 'MS. '),
(16, 'Amrita pokharel', '012', 'DTT-20181124-012', 'MS. '),
(17, 'Eda Joshi', '013', 'DTT-20181124-013', 'MS. '),
(18, 'Preksha Shrestha', '014', 'DTT-20181124-014', 'MS. '),
(19, 'nilam Khatri', '015', 'DTT-20181124-015', 'MS. '),
(20, 'Malati Basnet', '016', 'DTT-20181124-016', 'MS. '),
(22, 'Santosh Shrestha', '017', 'DTT-20181124-017', 'MR. '),
(23, 'juna Gurung', '018', 'DTT-20181124-018', 'MS. '),
(24, 'sostika thapa', '019', 'DTT-20181124-019', 'MS. '),
(25, 'Solpha Rai', '020', 'DTT-20181124-020', 'MS. '),
(26, 'SOFI raghubamsh Shrestha', '021', 'DTT-20181124-021', 'MS. '),
(27, 'Sharmila bhandari Khadka', '022', 'DTT-20181124-022', 'MS. '),
(28, 'Sunita Lama Suwal', '023', 'DTT-20181124-023', 'MS. '),
(29, 'sunita Karki', '024', 'DTT-20181124-024', 'MS. '),
(30, 'Rasana Kumari Rai', '025', 'DTT-20181124-025', 'MS. '),
(31, 'Sangeeta Rumba', '026', 'DTT-20181124-026', 'MS. '),
(32, 'urmila Amatya', '027', 'DTT-20181124-027', 'MS. '),
(33, 'Nisha Tandukar', '028', 'DTT-20181124-028', 'MS. '),
(34, 'ritu kATUWAL', '029', 'DTT-20181124-029', 'MS. '),
(35, 'Sita Shrestha', '030', 'DTT-20181124-030', 'MS. '),
(36, 'Rachana maharjan', '031', 'DTT-20181124-031', 'MS. '),
(37, 'sANITA Dangol', '032', 'DTT-20181124-032', 'MS. '),
(38, 'samjhana Thapa', '033', 'DTT-20181124-033', 'MS. '),
(39, 'Poonam Nepali', '034', 'DTT-20181124-034', 'MS. '),
(40, 'Prajeena Shahi', '035', 'DTT-20181124-035', 'MS. '),
(41, 'Puja Joshi', '036', 'DTT-20181124-036', 'MS. '),
(42, 'Anjana Luintel', '037', 'DTT-20181124-037', 'MS. '),
(43, 'Asmita Thapa', '038', 'DTT-20181124-038', 'MS. '),
(44, 'dipika Gurung Shrestha', '039', 'DTT-20181124-039', 'MS. '),
(45, 'Barsha Poudel', '040', 'DTT-20181124-040', 'MS. '),
(46, 'sujan Bhusal', '041', 'DTT-20181124-041', 'MR. '),
(47, 'mandira budhathoki', '042', 'DTT-20181124-042', 'MS. '),
(48, 'goma magar', '043', 'DTT-20181124-043', 'MS. '),
(49, 'Alisha Khadka', '044', 'DTT-20181124-044', 'MS. '),
(50, 'Puja Simkhada', '045', 'DTT-20181124-045', 'MS. '),
(51, 'rumi Gurung', '046', 'DTT-20181124-046', 'MS. '),
(52, 'sharmila tamang', '047', 'DTT-20181124-047', 'MS. '),
(53, 'Nima Dolma Lama', '048', 'DTT-20181124-048', 'MS. '),
(54, 'nitya Arjel', '049', 'DTT-20181124-049', 'MS. '),
(55, 'Ranjana  Thapa', '050', 'DTT-20181124-050', 'MS. '),
(56, 'sumi Rai', '051', 'DTT-20181124-051', 'MS. '),
(57, 'Sabitri Tandukar', '052', 'DTT-20181124-052', 'MS. '),
(58, 'jasmine Jha', '053', 'DTT-20181124-053', 'MS. '),
(59, 'Samjhana Mainali', '054', 'DTT-20181124-054', 'MS. '),
(60, 'keshab Prasain', '055', 'DTT-20181124-055', 'MR. '),
(61, 'Mamata KC', '056', 'DTT-20181124-056', 'MS. '),
(62, 'Rojina Khadka', '057', 'DTT-20181124-057', 'MS. '),
(63, 'Arpana Aryal', '058', 'DTT-20181124-058', 'MS. '),
(64, 'anu poudel', '059', 'DTT-20181124-059', 'MS. '),
(65, 'sujita Shrestha', '060', 'DTT-20181124-060', 'MS. '),
(66, 'Rupa Poudyal', '061', 'DTT-20181124-061', 'MS. '),
(67, 'Subekshya Shrestha', '062', 'DTT-20181124-062', 'MS. '),
(68, 'Seema Shrestha', '063', 'DTT-20181124-063', 'MS. '),
(69, 'trishna pandey', '064', 'DTT-20181124-064', 'MS. '),
(70, 'Sabina Shrestha', '065', 'DTT-20181124-065', 'MS. '),
(71, 'Chandika Chalise', '066', 'DTT-20181124-066', 'MS. '),
(72, 'Shova Rana', '067', 'DTT-20181124-067', 'MS. '),
(73, 'Usha Limbu', '068', 'DTT-20181124-068', 'MS. '),
(74, 'Rajani Kumari Bhaukaji', '069', 'DTT-20181124-069', 'MS. '),
(75, 'Ramila Shrestha', '070', 'DTT-20181124-070', 'MS. '),
(76, 'Ganga Gurung', '071', 'DTT-20181124-071', 'MS. '),
(77, 'Ranju darnal', '072', 'DTT-20181124-072', 'MS. '),
(78, 'Januka kandel', '073', 'DTT-20181124-073', 'MS. '),
(79, 'Sarita Dangol', '074', 'DTT-20181124-074', 'MS. '),
(81, 'Bhawana Nakarmi', '075', 'DTT-20181124-075', 'MS. '),
(82, 'Benju Karki', '076', 'DTT-20181124-076', 'MS. '),
(83, 'bandana shrestha', '077', 'DTT-20181124-077', 'MS. '),
(84, 'Srijana Gurung', '078', 'DTT-20181124-078', 'MS. '),
(85, 'Sujita Aryal', '079', 'DTT-20181124-079', 'MS. '),
(86, 'Geeta Khadka', '080', 'DTT-20181124-080', 'MS. '),
(87, 'Durga Shrestha', '081', 'DTT-20181124-081', 'MS. '),
(88, 'Sarmila Sharma', '082', 'DTT-20181124-082', 'MS. '),
(89, 'Nitu Karki', '083', 'DTT-20181124-083', 'MS. '),
(90, 'Priya Karkee', '084', 'DTT-20181124-084', 'MS. '),
(91, 'Riju Karkee', '085', 'DTT-20181124-085', 'MS. '),
(92, 'Preeti Karna', '086', 'DTT-20181124-086', 'MS. '),
(93, 'Preeti Karna', '087', 'DTT-20181124-087', 'MS. '),
(94, 'Shilpa Tandulkar', '088', 'DTT-20181124-088', 'MS. '),
(95, 'Dolma Lama', '089', 'DTT-20181124-089', 'MS. '),
(96, 'Binita Nagarkoti', '090', 'DTT-20181124-090', 'MS. '),
(97, 'Anita Basnet', '091', 'DTT-20181124-091', 'MS. '),
(98, 'Aruna Basnet', '092', 'DTT-20181124-092', 'MS. '),
(99, 'Ashmita Marsang Magar', '093', 'DTT-20181124-093', 'MS. '),
(100, 'Aastha Tandukar', '094', 'DTT-20181124-094', 'MS. '),
(101, 'Rabita Khadgi', '095', 'DTT-20181124-095', 'MS. '),
(102, 'Mamata Ghalan', '096', 'DTT-20181124-096', 'MS. ');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `cdescription` varchar(1000) NOT NULL,
  `content` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `cname`, `cdescription`, `content`) VALUES
(6, 'PROGRAMMING IN JAVA', 'The DWIT Training - Java course is targeted for beginners who want to. Learn how to think and write meaningful piece of code in Java. Learn how to read Java code that has been written by somebody else.\r\nLearn how to map literary description of a problem (requirement) to an application/library coded in Java. In summary, this course teaches how to program using Java programming language. This is a core basic level course that is essential for anyone who have no prior programming experience but wish to be a professional Java engineer in future\r\n', '59acf5188c2da3.62214616Java.pdf'),
(17, 'ANDROID (Operating system) ', 'The DWIT Training - Android course is targeted for beginners who want to learn how to think and write a meaningful piece of code in Android. Learn how to read Android code that has been written by somebody else. Learn how to map literary description of a problem (requirement) to an application/library coded in Android. In summary, this course teaches how to program using Android programming language. This is a core basic level course that is essential for anyone who has no prior programming experience but wishes to be a professional Android engineer in future', '59b13991b33570.38008636Android.pdf'),
(9, 'PROGRAMMING IN .NET ', 'The DWIT Training â€“ DOT NET course is targeted for beginners who want to learn how to think and write the meaningful piece of code in DOT NET. Learn how to read DOT NET code that has been written by somebody else. Learn how to map literary description of a problem (requirement) to an application/library coded in Python. In summary, this course teaches how to program using DOT NET programming language. This is a core basic level course that is essential for anyone who has no prior programming experience but wishes to be a professional DOT NET engineer in future', '59ad43673a8ba0.46532861DOT NET.pdf'),
(15, 'PYTHON (programming language)', 'The DWIT Training - Python course is targeted for beginners who want to learn how to think and write a meaningful piece of code in Python. Learn how to read PYTHON code that has been written by somebody else. Learn how to map literary description of a problem (requirement) to an application/library coded in Python. In summary, this course teaches how to program using Python programming language. This is a core basic level course that is essential for anyone who has no prior programming experience but wishes to be a professional Python engineer in future', '59b137a55dccd1.41644353Python.pdf'),
(16, 'MICROSOFT SQL SERVER', 'The DWIT Training - Database design and Implementation course is targeted for beginners who want to learn how to think and write a meaningful piece of code in Database design and Implementation. Learn how to read Database design and Implementation code that has been written by somebody else. Learn how to map literary description of a problem (requirement) to an application/library coded in Database design and Implementation. In summary, this course teaches how to program using Database design and Implementation programming language. This is a core basic level course that is essential for anyone who has no prior programming experience but wishes to be a professional Database design and Implementation engineer in future', '59b13890a1a177.34811611Microsoft SQL Server.pdf'),
(11, 'GIS (Geographical Information System)', 'The DWIT Training - GIS course is targeted for beginners who want to learn how to think and write a meaningful piece of code in GIS. Learn how to read GIS code that has been written by somebody else.    Learn how to map literary description of a problem (requirement) to an application/library coded in GIS. In summary, this course teaches how to program using GIS programming language. This is a core basic level course that is essential for anyone who has no prior programming experience but wishes to be a professional GIS engineer in future.', '59ae3767572d72.23913161GIS.pdf'),
(12, 'PHP/MYSQL', 'The DWIT Training - PHP/MYSQL course is targeted for beginners who want to learn how to think and write a meaningful piece of code in PHP/MYSQL. Learn how to read PHP/MYSQL code that has been written by somebody else. Learn how to map literary description of a problem (requirement) to an application/library coded in PHP/MYSQL. In summary, this course teaches how to program using PHP/MYSQL programming language. This is a core basic level course that is essential for anyone who has no prior programming experience but wishes to be a professional PHP/MYSQL engineer in future', '59ae3fc6adf360.81308444PHP-MYSQL.pdf'),
(14, 'PHOTOGRAPHY', 'Anyone who has some basic knowledge about Photography and wants to learn to write applications in PHOTOGRAPHY for any purpose e.g. curiosity, hobby, to complete an academic project, to work towards a career as PHOTOGRAPHY programmer, to help in project management, etc.', '59ae7ea4abaec8.01201496PHOTOGRAPHY.pdf'),
(19, 'Red Hat Certified Engineer - RHCE', 'The course aims to make students will fully understand the most important and advanced concepts of Linux server administration, and will be able to put those concepts to use in real-world situations.', '5b113687eb6761.91270715RHEC.pdf'),
(20, 'ORACLE', 'Oracle Database Quality of Service Management allows system administrators to directly manage application service levels hosted by Oracle Real Application Cluster databases. Using a policy-based architecture, QoS Management correlates accurate run-time performance and resource metrics, analyzes this data with its expert system to identify bottlenecks, and produces recommended resource adjustments to meet and maintain performance objectives under dynamic load conditions. Should sufficient resources not be available QoS will preserve the more business critical objectives at the expense of the less critical ones.', '5b1137e93ba939.90952923Oracle.pdf'),
(21, 'Saurav', 'sAURAV', '5b11387388bd79.93037946Statistical Analysis using R.pdf'),
(22, 'MAYA', 'The DWIT Training â€“ AutoDesk MAYA course is targeted for beginners who want to provide a solid understanding of the concept and usage of Autodesk Maya. To enable new users to understand the user interface and operate Autodesk Maya independently. Understand the production pipeline and workflows used in the industry.  Create and manipulate 3D assets in the application Create appealing looks by using Autodesk Mayaâ€™s surfacing tools Make use of Autodesk Mayaâ€™s lighting tools to manipulate the mood of the environment.  Bring 3D objects to life by using Mayaâ€™s animation tools. AutoCAD for the daily working process.  Navigate throughout AutoCAD using major navigating tools. Understand the concept and techniques to draw.  Create multiple designs using several tools. Create layers to control the objectsâ€™ visibility.  Explain drawing using annotations. Plot or print the drawing scale. To use a constraint for certain design. ', '5b11392ac6e2c3.15032760MAYA.pdf'),
(23, 'International English Language Testing System (IELTS)', 'IELTS Preparation course is targeted for advanced level English learners who want to prepare for the IELTS for study or work abroad.  The course focuses on skill development for the listening, reading, speaking, and writing papers of IELTS. The course is taught by a TESOL-certificated native speaker of English with nearly seven years of English teaching experience in Nepal.\r\n\r\n', '5b28b43664be72.37029991IELTS.pdf'),
(24, '1', '1', '5b3ca2a393a2f2.41430905General English Proficiency Courses.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `coursedate`
--

CREATE TABLE `coursedate` (
  `course_id` int(11) NOT NULL,
  `course_date_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `duration` varchar(3) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursedate`
--

INSERT INTO `coursedate` (`course_id`, `course_date_id`, `startdate`, `duration`, `status`) VALUES
(6, 3, '2017-06-01', '120', 2),
(6, 4, '2017-06-10', '120', 2),
(6, 5, '2017-07-26', '120', 2),
(6, 7, '2017-08-14', '120', 2),
(6, 9, '2017-10-23', '120', 1),
(7, 10, '2017-10-30', '120', 0),
(8, 11, '2017-10-23', '110', 1),
(9, 12, '2017-10-30', '120', 1),
(10, 13, '2017-10-30', '80', 0),
(11, 14, '2017-10-23', '60', 1),
(12, 15, '2017-10-23', '110', 1),
(13, 16, '2017-10-30', '80', 0),
(14, 17, '2017-10-30', '30', 0),
(15, 18, '2017-10-23', '110', 1),
(23, 30, '2018-07-16', '55', 0),
(6, 31, '2018-07-30', '120', 1),
(9, 33, '2018-07-30', '120', 1),
(17, 34, '2018-07-30', '120', 1),
(15, 35, '2018-07-30', '110', 1),
(20, 36, '2018-07-30', '80', 1),
(19, 37, '2018-07-30', '120', 1),
(21, 38, '2018-07-30', '80', 1),
(16, 39, '2018-07-30', '80', 1),
(22, 40, '2018-07-30', '110', 1),
(14, 41, '2018-07-30', '20', 1),
(24, 44, '2018-07-31', '60', 1),
(23, 45, '2018-07-30', '60', 1),
(9, 47, '2018-08-31', '120', 1),
(15, 48, '2018-08-31', '110', 1),
(16, 49, '2018-08-31', '80', 1),
(20, 51, '2018-08-31', '80', 1),
(23, 52, '2018-08-31', '60', 1),
(12, 53, '2018-08-31', '110', 1),
(22, 54, '2018-08-31', '110', 1),
(15, 57, '2018-10-15', '110', 1),
(23, 62, '2018-10-15', '60', 1),
(16, 63, '2018-10-15', '80', 1),
(6, 84, '2019-02-04', '120', 1),
(15, 85, '2019-02-04', '110', 1),
(15, 86, '2019-02-04', '110', 1),
(9, 87, '2019-02-04', '120', 1),
(16, 88, '2019-02-04', '80', 1),
(19, 89, '2019-02-04', '110', 1),
(20, 90, '2019-02-04', '80', 1),
(11, 91, '2019-02-04', '60', 1),
(21, 92, '2019-02-04', '110', 1),
(12, 93, '2019-02-04', '110', 1),
(22, 94, '2019-02-04', '110', 1),
(25, 95, '2019-02-04', '80', 1),
(23, 96, '2019-02-04', '60', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coursetime`
--

CREATE TABLE `coursetime` (
  `coursedate_id` int(11) NOT NULL,
  `coursetime_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `starttime` varchar(20) NOT NULL,
  `endtime` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursetime`
--

INSERT INTO `coursetime` (`coursedate_id`, `coursetime_id`, `course_id`, `starttime`, `endtime`) VALUES
(3, 5, 6, '03:00 PM', '05:00 PM'),
(4, 6, 6, '07:00 AM', '09:00 AM'),
(5, 7, 6, '03:30 PM', '05:30 PM'),
(7, 9, 6, '07:30 AM', '09:30 AM'),
(9, 12, 6, '07:30 AM', '09:30 AM'),
(9, 13, 6, '03:00 PM', '05:00 PM'),
(10, 14, 7, '07:30 AM', '09:30 AM'),
(11, 15, 8, '07:30 AM', '09:30 AM'),
(11, 16, 8, '03:00 PM', '05:00 PM'),
(12, 17, 9, '07:30 AM', '09:30 AM'),
(13, 18, 10, '07:00 AM', '09:00 AM'),
(14, 19, 11, '07:00 AM', '09:00 AM'),
(14, 20, 11, '03:00 PM', '05:00 PM'),
(15, 21, 12, '07:00 AM', '09:00 AM'),
(15, 22, 12, '03:00 PM', '05:00 PM'),
(16, 23, 13, '07:30 AM', '09:30 AM'),
(17, 24, 14, '07:30 AM', '09:30 AM'),
(18, 25, 15, '07:00 AM', '09:00 AM'),
(18, 26, 15, '03:00 PM', '05:00 PM'),
(30, 39, 23, '08:00 AM', '09:30 AM'),
(30, 40, 23, '02:00 PM', '03:30 PM'),
(31, 41, 6, '07:00 AM', '09:00 AM'),
(33, 43, 9, '07:00 AM', '09:00 AM'),
(34, 44, 17, '07:00 AM', '09:00 AM'),
(34, 45, 17, '03:00 PM', '05:00 PM'),
(35, 46, 15, '07:00 AM', '09:00 AM'),
(35, 47, 15, '03:00 PM', '05:00 PM'),
(36, 48, 20, '07:00 AM', '09:00 AM'),
(37, 49, 19, '07:00 AM', '09:00 AM'),
(38, 50, 21, '07:00 AM', '09:00 AM'),
(39, 51, 16, '07:00 AM', '09:00 AM'),
(40, 52, 22, '07:00 AM', '09:00 AM'),
(41, 53, 14, '07:00 AM', '09:00 AM'),
(44, 58, 24, '09:00 AM', '10:30 AM'),
(44, 59, 24, '02:00 AM', '03:30 PM'),
(45, 60, 23, '09:00 AM', '10:30 AM'),
(45, 61, 23, '03:00 PM', '04:30 PM'),
(47, 64, 9, '07:00 AM', '09:00 AM'),
(48, 65, 15, '07:00 AM', '09:00 AM'),
(49, 66, 16, '07:00 AM', '09:00 AM'),
(51, 68, 20, '07:00 AM', '09:00 AM'),
(52, 69, 23, '07:00 AM', '09:00 AM'),
(53, 70, 12, '07:00 AM', '09:00 AM'),
(54, 71, 22, '07:00 AM', '09:00 AM'),
(57, 75, 15, '07:00 AM', '09:00 AM'),
(57, 76, 15, '03:00 PM', '05:00 PM'),
(62, 81, 23, '07:00 AM', '08:30 AM'),
(63, 82, 16, '07:00 AM', '09:00 AM'),
(84, 107, 6, '07:00 AM', '09:00 AM'),
(84, 108, 6, '03:00 PM', '05:00 PM'),
(85, 109, 15, '07:00 AM', '09:00 AM'),
(85, 110, 15, '01:00 PM', '03:00 PM'),
(86, 111, 15, '07:00 AM', '09:00 AM'),
(86, 112, 15, '01:00 PM', '03:00 PM'),
(87, 113, 9, '07:00 AM', '09:00 AM'),
(88, 114, 16, '01:00 PM', '03:00 PM'),
(88, 115, 16, '07:00 AM', '09:00 AM'),
(89, 116, 19, '07:00 AM', '09:00 AM'),
(90, 117, 20, '07:00 AM', '09:00 AM'),
(91, 118, 11, '07:00 AM', '09:00 AM'),
(92, 119, 21, '07:00 AM', '09:00 AM'),
(93, 120, 12, '07:00 AM', '09:00 AM'),
(94, 121, 22, '07:00 AM', '09:00 AM'),
(95, 122, 25, '07:00 AM', '09:00 AM'),
(96, 123, 23, '07:00 AM', '09:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `mailinglist`
--

CREATE TABLE `mailinglist` (
  `mail_id` int(11) NOT NULL,
  `mail_name` varchar(150) NOT NULL,
  `mail_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mailinglist`
--

INSERT INTO `mailinglist` (`mail_id`, `mail_name`, `mail_type`) VALUES
(14, 'saurav.bhandari012@gmail.com', 0),
(15, 'saurav.bhandari012@gmail.com', 1),
(16, 'saurav.bhandari012@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `register_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `registrationdate` datetime NOT NULL,
  `course_id` int(11) NOT NULL,
  `preferabletime` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`register_id`, `firstname`, `lastname`, `email`, `phone`, `registrationdate`, `course_id`, `preferabletime`) VALUES
(1, 'Saurav', 'Bhandari', 'saurav.bhandari012@gmail.com', '9843500114', '2019-02-01 13:07:40', 15, 25),
(3, 'Saurav', 'Bhandari', 'saurav@yahoo.com', '9843500114', '2019-01-01 13:07:40', 15, 25),
(4, 'Saurav', 'Bhandari', 'saurav@yahoo.com', '9843500114', '2019-01-08 13:07:40', 15, 25),
(5, 'Saurav', 'Bhandari', 'saurav@yahoo.com', '9843500114', '2019-01-11 13:07:40', 15, 25),
(6, 'Saurav', 'Bhandari', 'saurav@yahoo.com', '9843500114', '2019-02-11 13:07:40', 15, 25),
(7, 'Saurav ', 'Bhandari ', 'saurav.bhandari012@gmail.com', '9843500114 ', '2019-02-22 09:19:09', 6, 0),
(8, 'Saurav', 'Bhandari', 'saurav.bhandari012@gmail.com', '9843500114', '2019-02-22 09:19:31', 17, 44);

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `requestdate` datetime DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `requestcourse` varchar(250) DEFAULT NULL,
  `class_size` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `requestdate`, `firstname`, `lastname`, `email`, `phone`, `requestcourse`, `class_size`, `level`, `start_date`) VALUES
(3, '2018-07-04 06:57:51', 'Biraj', 'Joshi', 'biraj.josi@gmail.com', '9841605705', 'Advanced Android and Advanced IOS Training', '2', 'Advanced', '2018-07-23'),
(4, '2018-08-01 07:32:49', 'Manoj', 'Timilsaina', 'timilsaina.manoj@gmail.com', '9810682874', 'CCNA CCNP', '1', 'Beginner', '2018-09-03'),
(5, '2018-08-12 13:41:05', 'Deepak', 'Pradhan', 'deepak.pradhan048@gmail.com', '9845662948', 'JAVA SCRIPT', '1', 'Beginner', '0000-00-00'),
(6, '2018-09-06 07:01:36', 'Sujan', 'Rajbharat', 'sujanrajbharat0@gmail.com', '9860708944', 'Laravel framework', '1', 'Advanced', '0000-00-00'),
(7, '2018-10-19 12:30:33', 'Kishwor', 'Shahi', 'kisworshahi@gmail.com', '9843888344', 'Data science', '', 'Beginner', '2018-11-01'),
(8, '2018-11-05 08:17:22', 'Rambabu', 'Deo', 'rambabudeo@gmail.com', '9841611255', 'CCNA', '1', 'Beginner', '2018-12-17'),
(9, '2018-11-28 01:12:55', 'Samit', 'Gurung', 'samitgurung69@gmail.com', '9861358631', 'php', '1', 'Advanced', '2018-12-03'),
(10, '2018-12-02 08:02:13', 'Eliza', 'Shrestha', 'elizashrestha0933@gmail.com', '9823230283', 'QA', '2', 'Beginner', '0000-00-00'),
(11, '2018-12-02 10:33:03', '', 'Sabita B.K.', 'Sabita B.K.@gmail.Com', '9840554169', 'Beginner', '', '', '0000-00-00'),
(12, '2019-01-05 14:35:02', 'Dipesh', 'Ydv', 'dipeshkumaryadav47@gmail.com', '9852833456', 'MySql', '1', 'Beginner', '2019-02-01'),
(13, '2019-01-05 14:34:57', 'Dipesh', 'Ydv', 'dipeshkumaryadav47@gmail.com', '9852833456', 'MySql', '1', 'Beginner', '2019-02-01'),
(14, '2019-01-17 02:46:24', 'Kapil', 'Adhikari', 'meh_kapil@live.com', '9863866660', 'MEAN/MERN stack development', '2', 'Beginner', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id`, `name`, `title`) VALUES
(1, 'Pravin Thapaliya', 'OFFICER PACKAGE TRAINER'),
(2, 'Sushant Pandey', 'JAVA'),
(3, 'Prakash Bhatt', 'JAVA TRAINER'),
(4, 'Shristi Baral', 'PYTHON TRAINER'),
(5, 'Suraj Ghimire', 'MICROSOFT SQL SERVER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificate_teachers`
--
ALTER TABLE `certificate_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `coursedate`
--
ALTER TABLE `coursedate`
  ADD PRIMARY KEY (`course_date_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `coursetime`
--
ALTER TABLE `coursetime`
  ADD PRIMARY KEY (`coursetime_id`),
  ADD KEY `coursedate_id` (`coursedate_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `mailinglist`
--
ALTER TABLE `mailinglist`
  ADD PRIMARY KEY (`mail_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`register_id`),
  ADD KEY `startdate` (`course_id`),
  ADD KEY `course_id` (`course_id`) USING BTREE;

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `trainer`
--
ALTER TABLE `trainer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `certificate_teachers`
--
ALTER TABLE `certificate_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `coursedate`
--
ALTER TABLE `coursedate`
  MODIFY `course_date_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `coursetime`
--
ALTER TABLE `coursetime`
  MODIFY `coursetime_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `mailinglist`
--
ALTER TABLE `mailinglist`
  MODIFY `mail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `register_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trainer`
--
ALTER TABLE `trainer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursetime`
--
ALTER TABLE `coursetime`
  ADD CONSTRAINT `coursetime_ibfk_1` FOREIGN KEY (`coursedate_id`) REFERENCES `coursedate` (`course_date_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
