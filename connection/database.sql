-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2023 at 10:14 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `author` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `categories` varchar(225) NOT NULL,
  `post_content` longtext NOT NULL,
  `post_content_card` varchar(225) NOT NULL,
  `postuid` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `title`, `author`, `date`, `categories`, `post_content`, `post_content_card`, `postuid`) VALUES
(111, 'Java (programming language)', 'rushikesh@gmail.com', '2022-12-31', 'JAVA', '<p>Java is the name of a programming language created by Sun Microsystems. This company was bought out by Oracle Corporation, which continues to keep it up to date. As of September 2022, Java 19 is the latest version, released in September 2022 (will be supported until March 2023) while Java 17, 11 and 8 are the current long-term support (LTS) versions, with Java 17 released on September 14th, 2021. Being an LTS version means that it will continue getting updates for multiple years. The next planned LTS version is Java 21 (LTS), planned for September 2023.</p>\n<p>Being an open-source platform, Java isn\'t just supported by Oracle, e.g. Eclipse Adoptium also supports Java, to at least May 2026 for Java 8, and at least September 2027 for Java 17.</p>\n<p>Java, which was called Oak when it was still being developed, is object oriented, meaning it is based on objects that work together to make programs do their jobs. Java code looks like C, C++, or C#, but code written in those languages will not work in Java in most cases without being changed.</p>\n<p>Java runs on many different operating systems, including Android, the world\'s most popular mobile operating system[4] (while Java continues to be used on Android, even by its maker Google, they no longer prefer Java; now Kotlin is their preferred language, though it can also be used with all Java code). This makes Java platform independent. It does this by making the Java compiler turn code into Java bytecode instead of machine code. This means that when the program is executed, the Java Virtual Machine interprets the bytecode and translates it into machine code.</p>\n<p>Programming example:<br>\n<code>// This is a simple program in Java. It shows \"Hello World!\" on the screen. <br>\npublic class HelloWorld {<br>\n    public static void main(String[] args) {<br>\n         System.out.println(\"Hello World!\"); <br>\n    }<br>\n}<br></code></p>', '<p>Java is the name of a programming language created by Sun Microsystems. This company was bought out by Oracle Corporation, which continues to keep it up to date. As of September 2022, Java 1', 'post-63b053a577aa9'),
(112, 'HTML(Introduction)', 'rushikesh@gmail.com', '2022-12-31', 'HTML', '<p>The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript.</p>\n<p>Web browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for the appearance of the document.</p>\n<p>HTML elements are the building blocks of HTML pages. With HTML constructs, images and other objects such as interactive forms may be embedded into the rendered page. HTML provides a means to create structured documents by denoting structural semantics for text such as headings, paragraphs, lists, links, quotes, and other items. HTML elements are delineated by tags, written using angle brackets. Tags such as &lt;img &gt; and &lt;input &gt; directly introduce content into the page. Other tags such as <p> surround and provide information about document text and may include other tags as sub-elements. Browsers do not display the HTML tags but use them to interpret the content of the page.</p>\n<p>HTML can embed programs written in a scripting language such as JavaScript, which affects the behavior and content of web pages. The inclusion of CSS defines the look and layout of content. The World Wide Web Consortium (W3C), former maintainer of the HTML and current maintainer of the CSS standards, has encouraged the use of CSS over explicit presentational HTML since 1997. A form of HTML, known as HTML5, is used to display video and audio, primarily using the &lt;canvas&gt; element, in collaboration with JavaScript.</p>', '<p>The HyperText Markup Language or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Shee', 'post-63b0563848b0c'),
(118, 'Why CSS?', 'rushikesh@gmail.com', '2023-01-06', 'CSS', '<p class=\"intro\" style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 16px; font-family: Verdana, sans-serif;\">CSS is the language we use to style a Web page.</p>\r\n<hr style=\"box-sizing: content-box; height: 0px; overflow: visible; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; margin: 20px -16px; font-family: Verdana, sans-serif; font-size: 15px; border-color: #eeeeee initial initial initial;\" />\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">What is CSS?</h2>\r\n<ul style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 15px;\">\r\n<li style=\"box-sizing: inherit;\">CSS stands for Cascading Style Sheets</li>\r\n<li style=\"box-sizing: inherit;\">CSS describes how HTML elements are to be displayed on screen, paper, or in other media</li>\r\n<li style=\"box-sizing: inherit;\">CSS saves a lot of work. It can control the layout of multiple web pages all at once</li>\r\n<li style=\"box-sizing: inherit;\">External stylesheets are stored in CSS files</li>\r\n</ul>\r\n<hr style=\"box-sizing: content-box; height: 0px; overflow: visible; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; margin: 20px -16px; font-family: Verdana, sans-serif; font-size: 15px; border-color: #eeeeee initial initial initial;\" />\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">CSS Demo - One HTML Page - Multiple Styles!</h2>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif;\">Here we will show one HTML page displayed with four different stylesheets. Click on the \"Stylesheet 1\", \"Stylesheet 2\", \"Stylesheet 3\", \"Stylesheet 4\" links below to see the different styles:</p>\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">Why Use CSS?</h2>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif;\">CSS is used to define styles for your web pages, including the design, layout and variations in display for different devices and screen sizes.</p>\r\n<h3 style=\"box-sizing: inherit; font-size: 24px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px;\">CSS Example</h3>\r\n<div class=\"w3-code notranslate cssHigh\" style=\"box-sizing: inherit; font-family: Consolas, Menlo, \'courier new\', monospace; font-size: 15px; width: auto; padding: 8px 12px; border-left: 4px solid #04aa6d; overflow-wrap: break-word; margin-top: 16px !important; margin-bottom: 16px !important;\"><span class=\"cssselectorcolor\" style=\"box-sizing: inherit; color: brown;\">body&nbsp;<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">{</span><span class=\"csspropertycolor\" style=\"box-sizing: inherit; color: red;\"><br style=\"box-sizing: inherit;\" />&nbsp;&nbsp;background-color<span class=\"csspropertyvaluecolor\" style=\"box-sizing: inherit; color: mediumblue;\"><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">:</span>&nbsp;lightblue<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">;</span></span><br style=\"box-sizing: inherit;\" /></span><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">}</span><br style=\"box-sizing: inherit;\" /><br style=\"box-sizing: inherit;\" />h1&nbsp;<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">{</span><span class=\"csspropertycolor\" style=\"box-sizing: inherit; color: red;\"><br style=\"box-sizing: inherit;\" />&nbsp;&nbsp;color<span class=\"csspropertyvaluecolor\" style=\"box-sizing: inherit; color: mediumblue;\"><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">:</span>&nbsp;white<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">;</span></span><br style=\"box-sizing: inherit;\" />&nbsp;&nbsp;text-align<span class=\"csspropertyvaluecolor\" style=\"box-sizing: inherit; color: mediumblue;\"><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">:</span>&nbsp;center<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">;</span></span><br style=\"box-sizing: inherit;\" /></span><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">}</span><br style=\"box-sizing: inherit;\" /><br style=\"box-sizing: inherit;\" />p&nbsp;<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">{</span><span class=\"csspropertycolor\" style=\"box-sizing: inherit; color: red;\"><br style=\"box-sizing: inherit;\" />&nbsp; font-family<span class=\"csspropertyvaluecolor\" style=\"box-sizing: inherit; color: mediumblue;\"><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">:</span>&nbsp;verdana<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">;</span></span><br style=\"box-sizing: inherit;\" />&nbsp;&nbsp;font-size<span class=\"csspropertyvaluecolor\" style=\"box-sizing: inherit; color: mediumblue;\"><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">:</span>&nbsp;20px<span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">;</span></span><br style=\"box-sizing: inherit;\" /></span><span class=\"cssdelimitercolor\" style=\"box-sizing: inherit; color: black;\">}</span></span></div>\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">CSS Solved a Big Problem</h2>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">HTML was NEVER intended to contain tags for formatting a web page!</p>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">HTML was created to describe the content of a web page, like:</p>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">&lt;h1&gt;This is a heading&lt;/h1&gt;</p>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">&lt;p&gt;This is a paragraph.&lt;/p&gt;</p>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">When tags like &lt;font&gt;, and color attributes were added to the HTML 3.2 specification, it started a nightmare for web developers. Development of large websites, where fonts and color information were added to every single page, became a long and expensive process.</p>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">To solve this problem, the World Wide Web Consortium (W3C) created CSS.</p>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">CSS removed the style formatting from the HTML page!</p>', '<p class=\"intro\" style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 16px; font-family: Verdana, sans-serif;\">CSS is the language we use to style a Web page.</p>\r\n<h', 'post-63b8245168eb7'),
(121, 'Learn PHP', 'rushikesh@gmail.com', '2023-01-08', 'JAVA', '<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px;\">Learn PHP</h2>\r\n<p style=\"box-sizing: inherit; margin-top: 1em; margin-bottom: 1em; font-size: 15px; font-family: Verdana, sans-serif;\">PHP is a server scripting language, and a powerful tool for making dynamic and interactive Web pages.</p>\r\n<p style=\"box-sizing: inherit; margin-top: 1em; margin-bottom: 1em; font-size: 15px; font-family: Verdana, sans-serif;\">PHP is a widely-used, free, and efficient alternative to competitors such as Microsoft\'s ASP.</p>\r\n<hr style=\"box-sizing: content-box; height: 0px; overflow: visible; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; margin: 20px -16px; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff; border-color: #eeeeee initial initial initial;\" />\r\n<p class=\"intro\" style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 16px; font-family: Verdana, sans-serif; background-color: #ffffff;\">PHP code is executed on the server.</p>\r\n<hr style=\"box-sizing: content-box; height: 0px; overflow: visible; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; margin: 20px -16px; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff; border-color: #eeeeee initial initial initial;\" />\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">What You Should Already Know</h2>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">Before you continue you should have a basic understanding of the following:</p>\r\n<ul style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: inherit;\"><a style=\"box-sizing: inherit; background-color: transparent;\" href=\"https://www.w3schools.com/html/default.asp\">HTML</a></li>\r\n<li style=\"box-sizing: inherit;\"><a style=\"box-sizing: inherit; background-color: transparent;\" href=\"https://www.w3schools.com/css/default.asp\">CSS</a></li>\r\n<li style=\"box-sizing: inherit;\"><a style=\"box-sizing: inherit; background-color: transparent;\" href=\"https://www.w3schools.com/js/default.asp\">JavaScript</a></li>\r\n</ul>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">If you want to study these subjects first, find the tutorials on our&nbsp;<a style=\"box-sizing: inherit; background-color: transparent;\" href=\"https://www.w3schools.com/default.asp\">Home page</a>.</p>\r\n<hr style=\"box-sizing: content-box; height: 0px; overflow: visible; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; margin: 20px -16px; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff; border-color: #eeeeee initial initial initial;\" />\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">What is PHP?</h2>\r\n<ul style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: inherit;\">PHP is an acronym for \"PHP: Hypertext Preprocessor\"</li>\r\n<li style=\"box-sizing: inherit;\">PHP is a widely-used, open source scripting language</li>\r\n<li style=\"box-sizing: inherit;\">PHP scripts are executed on the server</li>\r\n<li style=\"box-sizing: inherit;\">PHP is free to download and use</li>\r\n</ul>\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">What is a PHP File?</h2>\r\n<ul style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: inherit;\">PHP files can contain text, HTML, CSS, JavaScript, and PHP code</li>\r\n<li style=\"box-sizing: inherit;\">PHP code is executed on the server, and the result is returned to the browser as plain HTML</li>\r\n<li style=\"box-sizing: inherit;\">PHP files have extension \"<code class=\"w3-codespan\" style=\"box-sizing: inherit; font-family: Consolas, Menlo, \'courier new\', monospace; font-size: 15.75px; color: crimson; background-color: rgba(222, 222, 222, 0.3); padding-left: 4px; padding-right: 4px;\">.php</code>\"</li>\r\n</ul>\r\n<hr style=\"box-sizing: content-box; height: 0px; overflow: visible; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; margin: 20px -16px; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff; border-color: #eeeeee initial initial initial;\" />\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">What Can PHP Do?</h2>\r\n<ul style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: inherit;\">PHP can generate dynamic page content</li>\r\n<li style=\"box-sizing: inherit;\">PHP can create, open, read, write, delete, and close files on the server</li>\r\n<li style=\"box-sizing: inherit;\">PHP can collect form data</li>\r\n<li style=\"box-sizing: inherit;\">PHP can send and receive cookies</li>\r\n<li style=\"box-sizing: inherit;\">PHP can add, delete, modify data in your database</li>\r\n<li style=\"box-sizing: inherit;\">PHP can be used to control user-access</li>\r\n<li style=\"box-sizing: inherit;\">PHP can encrypt data</li>\r\n</ul>\r\n<p style=\"box-sizing: inherit; margin-top: 1.2em; margin-bottom: 1.2em; font-size: 15px; font-family: Verdana, sans-serif; background-color: #ffffff;\">With PHP you are not limited to output HTML. You can output images or PDF files. You can also output any text, such as XHTML and XML.</p>\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">Why PHP?</h2>\r\n<ul style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: inherit;\">PHP runs on various platforms (Windows, Linux, Unix, Mac OS X, etc.)</li>\r\n<li style=\"box-sizing: inherit;\">PHP is compatible with almost all servers used today (Apache, IIS, etc.)</li>\r\n<li style=\"box-sizing: inherit;\">PHP supports a wide range of databases</li>\r\n<li style=\"box-sizing: inherit;\">PHP is free. Download it from the official PHP resource:&nbsp;<a style=\"box-sizing: inherit; background-color: transparent;\" href=\"http://www.php.net/\" target=\"_blank\" rel=\"noopener\">www.php.net</a></li>\r\n<li style=\"box-sizing: inherit;\">PHP is easy to learn and runs efficiently on the server side</li>\r\n</ul>\r\n<hr style=\"box-sizing: content-box; height: 0px; overflow: visible; border-right-style: initial; border-bottom-style: initial; border-left-style: initial; border-image: initial; margin: 20px -16px; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff; border-color: #eeeeee initial initial initial;\" />\r\n<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px; background-color: #ffffff;\">What\'s new in PHP 7</h2>\r\n<ul style=\"box-sizing: inherit; font-family: Verdana, sans-serif; font-size: 15px; background-color: #ffffff;\">\r\n<li style=\"box-sizing: inherit;\">PHP 7 is much faster than the previous popular stable release (PHP 5.6)</li>\r\n<li style=\"box-sizing: inherit;\">PHP 7 has improved Error Handling</li>\r\n<li style=\"box-sizing: inherit;\">PHP 7 supports stricter Type Declarations for function arguments</li>\r\n<li style=\"box-sizing: inherit;\">PHP 7 supports new operators (like the spaceship operator:&nbsp;<code class=\"w3-codespan\" style=\"box-sizing: inherit; font-family: Consolas, Menlo, \'courier new\', monospace; font-size: 15.75px; color: crimson; background-color: rgba(222, 222, 222, 0.3); padding-left: 4px; padding-right: 4px;\">&lt;=&gt;</code>)</li>\r\n</ul>', '<h2 style=\"box-sizing: inherit; font-size: 32px; font-family: \'Segoe UI\', Arial, sans-serif; font-weight: 400; margin: 10px 0px;\">Learn PHP</h2>\r\n<p style=\"box-sizing: inherit; margin-top: 1em;', 'post-63ba616c2de91');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `page_id` varchar(225) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT -1,
  `name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `submit_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `page_id`, `parent_id`, `name`, `content`, `submit_date`) VALUES
(12, 'post-63b053a577aa9', -1, 'rushikesh@gmail.com', 'nice post!!!', '2022-12-31 21:14:23'),
(13, 'post-63b053a577aa9', 12, 'rushikesh@gmail.com', 'Yeah!! It is.', '2022-12-31 21:14:49');

-- --------------------------------------------------------

--
-- Table structure for table `invitefrnd`
--

CREATE TABLE `invitefrnd` (
  `id` int(11) NOT NULL,
  `frndemail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invitefrnd`
--

INSERT INTO `invitefrnd` (`id`, `frndemail`) VALUES
(15, 'rushikeshfrnd@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(20) NOT NULL DEFAULT 'default.png',
  `joined` date NOT NULL DEFAULT current_timestamp(),
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `name`, `email`, `password`, `profile`, `joined`, `updated`) VALUES
(15, 'Rushikesh', 'rushikesh@gmail.com', '$2y$04$mpvlpcMaaNPpbOqni52H5.qbWoSs1kY.BxcbNRsI38IgF/2/wVG5e', 'default.png', '2022-12-31', '2023-01-08 08:19:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitefrnd`
--
ALTER TABLE `invitefrnd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `invitefrnd`
--
ALTER TABLE `invitefrnd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
