-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2016 at 02:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `link`, `caption`) VALUES
(35, 'upload/slider/d729e7440b.jpg', 'http://ad2.com', 'Free e-books!!'),
(36, 'upload/slider/cb89dc07f0.jpg', 'http://ad3.com', 'get Free Mobile!!!'),
(37, 'upload/slider/265d6b7782.png', 'http://ad4.com', 'Great offer !!!');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE IF NOT EXISTS `tbl_admins` (
  `admin_id` int(2) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(55) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL,
  `role_id` int(2) NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`admin_id`, `admin_name`, `email`, `username`, `password`, `address`, `about`, `mobile`, `admin_image`, `role_id`) VALUES
(1, 'zakaria ahammed', 'provincialkid@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'BB hall , rOOM : 402\r\nKU', 'hi i''m zakaria from jessore', '01746373966', 'upload/profile/6e4adccb86.jpg', 1),
(2, 'Biswajit Biswash', 'biswajitbiswashku@gmail.com', 'biswajit130235', '9cb67ffb59554ab1dabb65bcb370ddd9', 'BB hall , ROOM : 301\r\nKU', 'hi i''m', '0101748986', 'upload/profile/biswajit.jpg', 2),
(3, 'Shamim hasan nayan', 'shamim130240@gmail.com', 'nayan130240', 'e1cb35207fd8e4f4af038c54d32fca0b', 'BB hall,room: 301\r\nKU', 'hi i''m nayan', '01746373966', 'upload/profile/de2cd51671.png', 2),
(9, 'sohel rana', 'sohel@gmail.com', 'sohel', '78c6248d3bb0201f47f7d2154d23b0a1', '', '', '', 'upload/profile/780f25c657.jpg', 2),
(11, 'S. M. Shakir Ahsan Romeo', 'romeo.fbfan@gmail.com', 'romeo', '3779a40335abfe5e962768bb0d21ea36', '', '', '', 'upload/profile/e4b5f0205b.png', 2),
(12, 'Rahim Uddin', 'rahim@g.com', 'rahim', '2eab53c41a3ec1922ba6e35907a2311d', '', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE IF NOT EXISTS `tbl_application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `about` text NOT NULL,
  `msg` text NOT NULL,
  `app_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`id`, `fname`, `lname`, `email`, `about`, `msg`, `app_image`) VALUES
(1, 'usiru', 'ekriehr', 'ehfjeg@j.com', 'djfgjdgf', 'hdjfdgf', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(2) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(55) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `cat_name`) VALUES
(1, 'JAVA'),
(2, 'c#'),
(3, 'c'),
(4, 'PHP'),
(5, 'HTML'),
(6, 'Algorithms');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `fname`, `lname`, `email`, `msg`, `flag`) VALUES
(1, 'zakaria', 'ahammed', 'provincialkid@gmail.com', 'hi i''m zakaria fro khajura', 1),
(5, 'zakaria', 'ahammed', 'provincialkid@gmail.com', 'hi i''m zakaria fro khajura', 1),
(6, 'zakaria', 'ahammed', 'provincialkid@gmail.com', 'hi i''m zakaria fro khajura', 1),
(7, 'zakaria', 'ahammed', 'provincialkid@gmail.com', 'hi i''m zakaria fro khajura', 1),
(8, 'Rahim', 'Uddin', 'pk@gmail.com', 'hi, blogger i''m rahim', 1),
(9, 'Rahim', 'Uddin', 'pk@gmail.com', 'hi, blogger i''m rahim', 1),
(10, 'Rahim', 'Uddin', 'pk@gmail.com', 'hi, blogger i''m rahim\r\nhi, blogger i''m rahim\r\nhi, blogger i''m rahim\r\nhi, blogger i''m rahim\r\nhi, blogger i''m rahim', 1),
(11, 'treutr', 'ehr', 'adjjfg@ga.com', 'ieteiur ehgfe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_message`
--

CREATE TABLE IF NOT EXISTS `tbl_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_to` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_message`
--

INSERT INTO `tbl_message` (`id`, `send_to`, `sender`, `subject`, `msg`) VALUES
(1, 'biswajit@gmail.com', 'From: provincialkid@gmail.com', 'jdsfkjf', 'dsfhkjsd sjdfhjsd\r\nsdfjhdsjf ssdhfs');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_id` int(2) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `admin_id` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `tag_id` (`tag`),
  KEY `author_id` (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `image`, `body`, `date`, `cat_id`, `tag`, `admin_id`) VALUES
(1, 'Java oop concept', 'upload/ef49fd8c14.jpg', '<p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\n', '2016-09-10 12:03:25', 1, 'java,oop', 1),
(4, 'PHP oop concept', 'upload/3fa8dbac53.jpg', '<p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2016-09-10 12:05:05', 4, 'php,oop', 2),
(7, 'Introduction to java oop ', 'upload/352bcd1a89.jpg', '<p>Java is a general-purpose computer programming language that is concurrent, class-based, object-oriented,[14] and specifically designed to have as few implementation dependencies as possible. It is intended to let application developers &quot;write once, run anywhere&quot; (WORA),[15] meaning that compiled Java code can run on all platforms that support Java without the need for recompilation.[16] Java applications are typically compiled to bytecode that can run on any Java virtual machine (JVM) regardless of computer architecture. As of 2016, Java is one of the most popular programming languages in use,[17][18][19][20] particularly for client-server web applications, with a reported 9 million developers.[21] Java was originally developed by James Gosling at Sun Microsystems (which has since been acquired by Oracle Corporation) and released in 1995 as a core component of Sun Microsystems&#39; Java platform. The language derives much of its syntax from C and C++, but it has fewer low-level facilities than either of them.</p>\r\n\r\n<p>The original and reference implementation Java compilers, virtual machines, and class libraries were originally released by Sun under proprietary licences. As of May 2007, in compliance with the specifications of the Java Community Process, Sun relicensed most of its Java technologies under the GNU General Public License. Others have also developed alternative implementations of these Sun technologies, such as the GNU Compiler for Java (bytecode compiler), GNU Classpath (standard libraries), and IcedTea-Web (browser plugin for applets).</p>\r\n\r\n<p>The latest version is Java 8, which is the only version currently supported for free by Oracle, although earlier versions are supported both by Oracle and other companies on a commercial basis.</p>\r\n', '2016-09-10 13:36:37', 1, 'gdfg', 1),
(10, 'Recursion 3rd Part', 'upload/ddc0824272.png', '<p>Before you use recursion, you need to be carefull about few things. Recursive calls work with system stack. So, gather informatiion about your system compiler and then take the decision whether you want to use recursion or not. In programming competetions, recursive functions are needed in techniques like Backtracking and Dynamic Programming.</p>\r\n\r\n<p>Before you use recursion, you need to be carefull about few things. Recursive calls work with system stack. So, gather informatiion about your system compiler and then take the decision whether you want to use recursion or not. In programming competetions, recursive functions are needed in techniques like Backtracking and Dynamic Programming.</p>\r\n\r\n<p>Before you use recursion, you need to be carefull about few things. Recursive calls work with system stack. So, gather informatiion about your system compiler and then take the decision whether you want to use recursion or not. In programming competetions, recursive functions are needed in techniques like Backtracking and Dynamic Programming.Before you use recursion, you need to be carefull about few things. Recursive calls work with system stack. So, gather informatiion about your system compiler and then take the decision whether you want to use recursion or not. In programming competetions, recursive functions are needed in techniques like Backtracking and Dynamic Programming.Before you use recursion, you need to be carefull about few things. Recursive calls work with system stack. So, gather informatiion about your system compiler and then take the decision whether you want to use recursion or not. In programming competetions, recursive functions are needed in techniques like Backtracking and Dynamic Programming.</p>\r\n\r\n<p>Before you use recursion, you need to be carefull about few things. Recursive calls work with system stack. So, gather informatiion about your system compiler and then take the decision whether you want to use recursion or not. In programming competetions, recursive functions are needed in techniques like Backtracking and Dynamic Programming.</p>\r\n', '2016-09-18 04:12:50', 3, 'Programming Tactics,c', 1),
(11, 'Depth-first search (DFS)', 'upload/73c66ab9ff.png', '<p><strong>Depth-first search</strong>&nbsp;(<strong>DFS</strong>) is an&nbsp;<a href="https://en.wikipedia.org/wiki/Algorithm">algorithm</a>&nbsp;for traversing or searching&nbsp;<a href="https://en.wikipedia.org/wiki/Tree_data_structure">tree</a>&nbsp;or&nbsp;<a href="https://en.wikipedia.org/wiki/Graph_(data_structure)">graph</a>&nbsp;data structures. One starts at the&nbsp;<a href="https://en.wikipedia.org/wiki/Tree_(data_structure)#Terminology">root</a>(selecting some arbitrary node as the root in the case of a graph) and explores as far as possible along each branch before<a href="https://en.wikipedia.org/wiki/Backtracking">backtracking</a>.</p>\n\n<p>A version of depth-first search was investigated in the 19th century by French mathematician&nbsp;<a href="https://en.wikipedia.org/wiki/Charles_Pierre_Tr%C3%A9maux">Charles Pierre Tr&eacute;maux</a><a href="https://en.wikipedia.org/wiki/Depth-first_search#cite_note-1">[1]</a>&nbsp;as a strategy for&nbsp;<a href="https://en.wikipedia.org/wiki/Maze_solving_algorithm">solving mazes</a>.<a href="https://en.wikipedia.org/wiki/Depth-first_search#cite_note-2">[2]</a><a href="https://en.wikipedia.org/wiki/Depth-first_search#cite_note-3">[3]</a>&nbsp;<br />\n&nbsp;</p>\n\n<h2>Example</h2>\n\n<p>For the following graph:</p>\n\n<p><a href="https://en.wikipedia.org/wiki/File:Graph.traversal.example.svg"><img alt="Graph.traversal.example.svg" src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/Graph.traversal.example.svg/200px-Graph.traversal.example.svg.png" style="height:162px; width:200px" /></a></p>\n\n<p>a depth-first search starting at A, assuming that the left edges in the shown graph are chosen before right edges, and assuming the search remembers previously visited nodes and will not repeat them (since this is a small graph), will visit the nodes in the following order: A, B, D, F, E, C, G. The edges traversed in this search form a&nbsp;<a href="https://en.wikipedia.org/wiki/Tr%C3%A9maux_tree">Tr&eacute;maux tree</a>, a structure with important applications in&nbsp;<a href="https://en.wikipedia.org/wiki/Graph_theory">graph theory</a>.</p>\n\n<p>Performing the same search without remembering previously visited nodes results in visiting nodes in the order A, B, D, F, E, A, B, D, F, E, etc.</p>\n\n<p>forever, caught in the A, B, D, F, E cycle and never reaching C or G.</p>\n\n<p><a href="https://en.wikipedia.org/wiki/Iterative_deepening_depth-first_search">Iterative deepening</a>&nbsp;is one technique to avoid this infinite loop and would reach all nodes.</p>\n\n<p><img alt="" src="/ckfinder/userfiles/images/zakaria/DFS.png" style="height:300px; width:300px" /></p>\n\n<p>figure- example.</p>\n', '2016-10-15 15:10:51', 6, 'DFS ', 1),
(14, 'Text Title', 'upload/c720f157f4.png', '<p>Hello World</p>\r\n', '2016-10-17 08:47:51', 1, 'text', 1),
(15, 'Introduction to HTML and CSS', 'upload/8255d16eee.jpg', '<p>If you&#39;re just beginning, you can start to&nbsp;learn HTML here.</p>\r\n\r\n<h3><strong>Greatest Hits</strong></h3>\r\n\r\n<p>HTML Quick&nbsp;Lists: A complete list of all&nbsp;tags&nbsp;and&nbsp;attributes, with links to pages about each of them.</p>\r\n\r\n<p>For an introduction to modern HTML see&nbsp;logical tags&nbsp;&amp;&nbsp;Semantic Markup. Be sure to check out our&nbsp;CSS tutorials&nbsp;and also how&nbsp;media in HTML5&nbsp;works.</p>\r\n\r\n<p>Popup Window Tutorial&nbsp; A complete tutorial on creating &quot;popup windows&quot;, including working examples and ready-to-use scripts<img alt="" src="/ckfinder/userfiles/images/book-paragraph.jpg" style="border-style:solid; border-width:2px; float:right; height:125px; margin:2px; width:200px" /></p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<h3>&nbsp;</h3>\r\n\r\n<h3><strong>HTML Tutorials</strong></h3>\r\n\r\n<ol>\r\n	<li>HTML Structure</li>\r\n	<li>Using CSS</li>\r\n	<li>Links&nbsp;&amp;&nbsp;Menus</li>\r\n	<li>Images</li>\r\n	<li>Forms</li>\r\n	<li>Fonts &amp; Typography</li>\r\n	<li>Lists</li>\r\n	<li>Tables</li>\r\n	<li>Frames</li>\r\n</ol>\r\n', '2016-11-05 13:21:41', 5, 'Html,web Design', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE IF NOT EXISTS `tbl_role` (
  `role_id` int(2) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(55) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Author'),
(3, 'Editor');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD CONSTRAINT `tbl_admins_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tbl_role` (`role_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
