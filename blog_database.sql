-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 05:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masterarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `email_verification_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`, `created_time`, `updated_time`, `email_verification_code`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$y5gMSB5cuOCDPmrljmlaM.kroKl5MqikVZDE3.b1bERUP.wt5f89m', 1, '2017-11-13 18:31:36', '2017-11-13 18:31:36', 689089);

-- --------------------------------------------------------

--
-- Table structure for table `categories_table`
--

CREATE TABLE `categories_table` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_description` text NOT NULL,
  `publication_status` tinyint(4) NOT NULL COMMENT 'Published=1,Unpublished=0',
  `category_slug` varchar(250) DEFAULT NULL,
  `category_image` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories_table`
--

INSERT INTO `categories_table` (`id`, `category_name`, `category_description`, `publication_status`, `category_slug`, `category_image`) VALUES
(13, 'Html', '                                                                    ', 1, 'html', 'portfolio2-1-1-3-768x4321.jpg'),
(14, 'Question Hub', '', 1, 'question-hub', 'download.png');

-- --------------------------------------------------------

--
-- Table structure for table `client_table`
--

CREATE TABLE `client_table` (
  `client_id` int(11) NOT NULL,
  `image` varchar(250) NOT NULL,
  `client_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_table`
--

INSERT INTO `client_table` (`client_id`, `image`, `client_link`) VALUES
(3, 'sandy-brown-e1610367366358-1-32.png', 'https://storybook.ae/'),
(4, 'logopep-1-31.png', 'https://peperonity.in'),
(5, 'Untitled-17-1-3.png', 'https://hydfairybakes.com/'),
(6, '654-2-1-3.png', 'https://indiaexpresslive.com'),
(7, 'sturj.png', 'https://sturjdesign.com/');

-- --------------------------------------------------------

--
-- Table structure for table `cmt_table`
--

CREATE TABLE `cmt_table` (
  `cmt_id` int(11) NOT NULL,
  `cmt_author` varchar(250) NOT NULL,
  `cmt_post_id` text NOT NULL,
  `cmt_email` varchar(250) NOT NULL,
  `cmt_url` text NOT NULL,
  `cmt_data` varchar(250) NOT NULL,
  `cmt_on` int(11) NOT NULL,
  `cmt_approved` bit(1) NOT NULL DEFAULT b'0',
  `cmt_user_id` int(11) NOT NULL,
  `read_unread` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cmt_table`
--

INSERT INTO `cmt_table` (`cmt_id`, `cmt_author`, `cmt_post_id`, `cmt_email`, `cmt_url`, `cmt_data`, `cmt_on`, `cmt_approved`, `cmt_user_id`, `read_unread`) VALUES
(2, 'john smith', 'how-to-start-writing-a-blog', 'test@masterarts.net', 'https://masterarts.net', 'hello nice post dude', 1618980829, b'1', 0, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `contact_table`
--

CREATE TABLE `contact_table` (
  `contact_id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `mubile_number` int(11) NOT NULL,
  `about` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `sent_on` int(11) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `read_unread` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_table`
--

INSERT INTO `contact_table` (`contact_id`, `full_name`, `mubile_number`, `about`, `comment`, `sent_on`, `email`, `read_unread`) VALUES
(2, 'Namdnh', 5663241, 'Landing page for marketing', '\\\\\\5363543', 1619240386, 'nk@gmail.com', b'1'),
(3, 'nkmeawadaaa', 546524454, 'Business static website', 'dfghgfgdfsstfs', 1619245143, 'nk@gm.com', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `email_setup_table`
--

CREATE TABLE `email_setup_table` (
  `ID` int(11) NOT NULL,
  `email_from` varchar(100) NOT NULL,
  `email_to` varchar(100) NOT NULL,
  `protocol` varchar(100) NOT NULL,
  `smtp_host` varchar(100) NOT NULL,
  `smtp_port` varchar(100) NOT NULL,
  `smtp_user` varchar(100) NOT NULL,
  `smtp_pass` varchar(100) NOT NULL,
  `mailtype` varchar(100) NOT NULL,
  `charset` varchar(100) NOT NULL,
  `wordwrap` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `email_setup_table`
--

INSERT INTO `email_setup_table` (`ID`, `email_from`, `email_to`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `mailtype`, `charset`, `wordwrap`) VALUES
(1, 'noreply@example.com', 'nk@example.com', 'smtp', 'smtp.hosting.com', '587', 'noreply@example.com', 'kkkk', 'html', 'iso-8859-1', 'TRUE');

-- --------------------------------------------------------

--
-- Table structure for table `footer_table`
--

CREATE TABLE `footer_table` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(30) NOT NULL,
  `custom_menu_link` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `footer_table`
--

INSERT INTO `footer_table` (`menu_id`, `menu_title`, `custom_menu_link`) VALUES
(1, 'Home', 'https://masterarts.net/'),
(2, 'About Us', 'https://masterarts.net/about'),
(3, 'Terms', 'https://masterarts.net/terms'),
(4, 'Privacy Policy', 'https://masterarts.net/privacy-policy'),
(5, 'Contact Us', 'https://masterarts.net/contact/');

-- --------------------------------------------------------

--
-- Table structure for table `identity_table`
--

CREATE TABLE `identity_table` (
  `option_id` int(11) NOT NULL,
  `site_logo` varchar(100) NOT NULL,
  `site_favicon` varchar(100) NOT NULL,
  `site_copyright` varchar(255) NOT NULL,
  `site_keywords` varchar(160) NOT NULL,
  `site_desc` varchar(100) NOT NULL,
  `site_insta_link` varchar(100) NOT NULL,
  `contact_title` varchar(255) NOT NULL,
  `contact_subtitle` varchar(255) NOT NULL,
  `contact_description` text NOT NULL,
  `company_location` varchar(255) NOT NULL,
  `company_number` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_facebook` varchar(100) NOT NULL,
  `company_twitter` varchar(100) NOT NULL,
  `site_title` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identity_table`
--

INSERT INTO `identity_table` (`option_id`, `site_logo`, `site_favicon`, `site_copyright`, `site_keywords`, `site_desc`, `site_insta_link`, `contact_title`, `contact_subtitle`, `contact_description`, `company_location`, `company_number`, `company_email`, `company_facebook`, `company_twitter`, `site_title`) VALUES
(1, 'MASTERARTS.png', 'logo2.png', '© By Master Arts', 'web development, free web development courses', 'Our team consists of professional developer and designers in the industry and the best “visualizes” ', 'https://www.plus.google.com', 'Get Free Quote', 'We can develop your website as per your requirement and budget.', '                                                                        <p xss=removed>You will find our experts knowledgeable about customer needs and ready to help reach customer goals, and most importantly, our quick responsiveness to customer queries has won a lot of consumer appreciation.</p><p xss=removed> </p><p xss=removed>Our mission is to ensure complete customer satisfaction and to provide our customers with flexible and cost effective website designing services, including all graphical needs like logo design, flash intros, flash website templates, and custom website templates. custom website templates.</p>\r\n                                \r\n                                ', '                                                                        4/3 Shyam comp, Ganesh nagar, Rawal pada, Dahisar (East), Mumbai-40068, Maharashtra (IND)                                                                                              ', '+915446156161', 'nk@masterarts.net', 'https://www.facebook.com', 'https://www.twitter.com', 'Master Arts - Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `parent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(255) NOT NULL DEFAULT '',
  `url` varchar(255) NOT NULL DEFAULT '',
  `position` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `group_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `title`, `url`, `position`, `group_id`) VALUES
(1, 0, 'Home', '', 1, 1),
(2, 0, 'About', 'controller/about', 3, 1),
(3, 0, 'Html', 'categories/html', 2, 1),
(5, 3, 'Dropdown 2', 'dropdown/Dropdown2', 1, 1),
(7, 3, 'Dropdown 3', 'dropdown/Dropdown3', 2, 1),
(10, 2, 'Dropdown 4', 'dropdown/Dropdown-4', 1, 1),
(11, 0, 'Question Hub', 'https://masterarts.net/question-hub', 5, 1),
(12, 0, 'Contact Us', '/contact-us', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_group`
--

CREATE TABLE `menu_group` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_group`
--

INSERT INTO `menu_group` (`id`, `title`) VALUES
(1, 'Main Menu');

-- --------------------------------------------------------

--
-- Table structure for table `menu_table`
--

CREATE TABLE `menu_table` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(256) NOT NULL,
  `menu_link` text NOT NULL,
  `menu_option` varchar(20) NOT NULL DEFAULT 'main_menu',
  `custom_menu_link` text DEFAULT NULL,
  `menu_position` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu_table`
--

INSERT INTO `menu_table` (`menu_id`, `menu_title`, `menu_link`, `menu_option`, `custom_menu_link`, `menu_position`) VALUES
(2, 'Question Hub', 'category/question-hub', 'main_menu', '', '2'),
(3, 'Peperonity', '', 'sub_menu', 'https://peperonity.in', '2A'),
(4, 'Home', '', 'main_menu', 'https://masterarts.net', '1'),
(5, 'Services', '', 'main_menu', 'https://masterarts.net/services', '3'),
(6, 'About Us', '', 'main_menu', 'https://masterarts.net/about-us', '4'),
(7, 'Contact Us', '', 'main_menu', 'https://masterarts.net/contact-us', '5'),
(8, 'Html', 'category/html', 'sub_menu', '', '2B');

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_data` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `post_keywords` text DEFAULT NULL,
  `post_category` varchar(250) NOT NULL,
  `post_description` varchar(160) NOT NULL,
  `post_author` int(11) NOT NULL,
  `post_view` int(11) NOT NULL DEFAULT 0,
  `published_date` int(11) NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `post_slug` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`post_id`, `post_title`, `post_data`, `post_image`, `post_keywords`, `post_category`, `post_description`, `post_author`, `post_view`, `published_date`, `publication_status`, `post_slug`) VALUES
(21, 'How to get AdSense approval in 15 days?', '                                                                                                                                                <p xss=\"removed\">Friends, must have heard and read a lot for the approval app. If you do this, then you will do it. Am I right? Today, I will tell you what to do exceptionally for approval.</p><p xss=\"removed\">Previously, Google AdSense approve give all type of sites . Now there is a little bit of tension The reason you know is the lack of unique content in search engines. Google wants you to write unique articles.</p><h2 xss=\"removed\">Unique Articles or contain</h2><p xss=\"removed\">AdSense approves such sites only. Sites that have unique content. Not meant to be copied from anywhere. This is because they want you to work a little bit if you want to earn money from AdSense. It has the advantage of both. If there is good content on your site then visitors will come to your site. Google will then get data for its search engine.</p><p xss=\"removed\">You have to write minimum 15 or 20 posts. Everything should be unique. Written by himself The length of an article should be minimum 400 then 1000 words. If you do this work, then it is enough. You will definitely get approval of AdSense if you want approval for your blog in 15 days. Whether or not Visitor is on your site, it doesn’t matter to Adsense. If the content is unique on your site, then you will definitely get the approval.</p><p xss=\"removed\">It is not that only blogs and article rallied sites get approval. If your site is not blog related, then you can still get approval. Your site should not just have adult content. Such as images, videos and text abusing. AdSense does not allow chatting sites.</p><p xss=\"removed\">adsense need good containt only that’s main point so work in this first. Do not think that there are many sites like mine, they are not getting approval. Work hard on your site.</p><h2 xss=\"removed\">Must add this Before Submit site For adsense aprovel</h2><ol xss=\"removed\"><li xss=\"removed\">Pilgrims check for your sites articals. Here you can do this <a rel=\"noreferrer noopener\" href=\"https://smallseotools.com/plagiarism-checker/\" target=\"_blank\" xss=\"removed\">Https://smallseotools.com/plagiarism-checker/</a></li><li xss=\"removed\">Privacy policy <span class=\"has-inline-color has-vivid-cyan-blue-color\" xss=\"removed\"><a href=\"https://www.privacypolicygenerator.info/\" target=\"_blank\" rel=\"noreferrer noopener\" xss=\"removed\">https://www.privacypolicygenerator.info/</a></span></li><li xss=\"removed\">terms and condition <a href=\"https://www.termsandconditionsgenerator.com/\" target=\"_blank\" rel=\"noreferrer noopener\" xss=\"removed\">https://www.termsandconditionsgenerator.com/</a></li><li xss=\"removed\">Disclaimer <a href=\"https://www.disclaimergenerator.net/\" target=\"_blank\" rel=\"noreferrer noopener\" xss=\"removed\">https://www.termsandconditionsgenerator.com/</a></li><li xss=\"removed\">About us</li><li xss=\"removed\">Contact us</li></ol><h2 xss=\"removed\">Remove this type of containt Before Submiting for aprovel</h2><ol xss=\"removed\"><li xss=\"removed\">Illegal content</li><li xss=\"removed\">Intellectual property abuse</li><li xss=\"removed\">Endangered or threatened species</li><li xss=\"removed\">Dangerous or derogatory content</li><li xss=\"removed\">Enabling dishonest behavior</li><li xss=\"removed\">Misrepresentative content</li><li xss=\"removed\">Malicious or unwanted software</li><li xss=\"removed\">Sexually explicit content</li><li xss=\"removed\">Mail order brides</li><li xss=\"removed\">Adult themes in family content</li><li xss=\"removed\">Child sexual abuse and exploitation</li></ol><p xss=\"removed\">Just do this 200% your site will get approval in 2 weeks or even earlier.</p><p xss=\"removed\">Thanks for visit here. If you like this post share it with your friends. Or any doubts still?? Write us.</p>                                                                                                                                ', 'Adscense-32.jpg', 'AdSense,  How to get AdSense approval in 15 days', 'html', 'AdSense approves such sites only. Sites that have unique content. Not meant to be copied from anywhere. This is because they want you to work a little bit if yo', 1, 1, 1618774016, 1, 'how-to-get-adsense-approval-in-15-days'),
(24, 'Get Traffic from Google Question hub', '                                    <h4 xss=\"removed\">Can a blog be created to answer questions from Google Question Hub?</h4><h4 xss=\"removed\"><p xss=\"removed\">Yes, You can create a blog for Questions of Google Question Hub and you can write related articles. This is the best way to write articles on the blog, this will bring you traffic from Google. So let’s know what the whole process is.</p><ol xss=\"removed\"><li xss=\"removed\">Add your site or blog to Google search console</li><li xss=\"removed\">Sign up to question hub add site or blog</li><li xss=\"removed\">Add question you are interested in</li><li xss=\"removed\">copy question and write article</li><li xss=\"removed\">copy article link and add it to answer box in question hub</li></ol></h4><h4 xss=\"removed\">Add your site or blog to Google search console</h4><div><p xss=\"removed\">First of all, you have to register your site and blog in the search console and verify. You will not do this, you will not add a link to your article in the answer of question hub. It is very easy to verify by adding a site to the search console. As soon as you add the site, you will get the verification code, you have to put it between the head tag and verify your site.</p><p xss=\"removed\">If you blogging on WordPress, you can use Site Kit by Google.</p><p xss=\"removed\">If you blogging on Blogger.com, you will get an option in the side bar.</p><h4 xss=\"removed\">Sign up to question hub add site or blog & Add question you are interested in</h4></div><div><p xss=\"removed\">After adding a site to the search console, you register in question hub. This is very easy to do, sign and click on the ad question and select the topic on which you want to write the article. No need to add site here google will automatic get your site from search console when you answer question.</p><h4 xss=\"removed\">copy question and write article</h4><p xss=\"removed\">Question Hub will give 10 questions on your interest topic. Copy the question that you like and make a heading for the article. Start writing articles about that. If you write the article yourself, it is very good. If you copy paste from somewhere, Google will not send you traffic. So please write your self.</p><p xss=\"removed\">Article should be at least 600 words and Max as much as you can write. The article should be worth reading. Paragraph 100 Words Max.</p><h4 xss=\"removed\">copy article link and add it to answer box in question hub</h4><p xss=\"removed\">When finished writing the article, check it once and then publish it. After publishing, click on the link to that article and click on it to submit the link on question hub.</p><h4 xss=\"removed\">Links of Search console and question hub</h4><p xss=\"removed\"><a href=\"https://search.google.com/search-console/about\" target=\"_blank\" rel=\"noreferrer noopener\" xss=\"removed\">Search console</a></p><p xss=\"removed\"><a href=\"https://questionhub.google.com/\" target=\"_blank\" rel=\"noreferrer noopener\" xss=\"removed\">Question hub</a></p><p xss=\"removed\">If you have any trouble to do this. You can write us. we can defiantly help you.</p></div>                                ', 'download1.png', 'Get Traffic from Google Question hub,', 'question-hub', 'Can a blog be created to answer questions from Google Question Hub? Yes, You can create a blog for Questions of Google Question Hub and you can write related ar', 1, 0, 1619435293, 1, 'get-traffic-from-google-question-hub');

-- --------------------------------------------------------

--
-- Table structure for table `post_views`
--

CREATE TABLE `post_views` (
  `ID` int(11) NOT NULL,
  `post_id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_views`
--

INSERT INTO `post_views` (`ID`, `post_id`, `ip`, `time`) VALUES
(17, 'how-to-get-adsense-approval-in-15-days', '::1', 1618994937),
(18, 'how-to-start-writing-a-blog', '::1', 1619001996),
(19, 'adsense-related-questions-answers', '::1', 1619002187),
(20, 'html-tutorial-for-beginners', '::1', 1619512193);

-- --------------------------------------------------------

--
-- Table structure for table `rep_table`
--

CREATE TABLE `rep_table` (
  `rep_id` int(11) NOT NULL,
  `rep_cmt_id` int(11) NOT NULL,
  `rep_data` varchar(250) NOT NULL,
  `rep_on` int(11) NOT NULL,
  `admin_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rep_table`
--

INSERT INTO `rep_table` (`rep_id`, `rep_cmt_id`, `rep_data`, `rep_on`, `admin_id`) VALUES
(1, 3, 'hello test', 1618989047, 'Admin'),
(2, 3, 'test 2', 1618990209, 'admin'),
(3, 2, 'thank you', 1618990227, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `slider_table`
--

CREATE TABLE `slider_table` (
  `slider_id` int(11) NOT NULL,
  `slider_title` varchar(255) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `slider_btn_text` varchar(255) NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `slider_btn_link` varchar(256) DEFAULT NULL,
  `slider_sub_title` varchar(256) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_table`
--

INSERT INTO `slider_table` (`slider_id`, `slider_title`, `slider_image`, `slider_btn_text`, `publication_status`, `slider_btn_link`, `slider_sub_title`, `position`) VALUES
(9, 'Looking for your business website ?', 'portfolio2-1-1-3-768x4322.jpg', 'Contact Us', 1, 'https://masterarts.net/contact/', 'Sit back and relax because we are here to transform your business goals into reality. We spend a decent amount of time to analyze your business, then we make the most apt strategy to improve your website', 'first'),
(10, 'We deliver best quality works more then your Requirements', 'portfolio3-1-1-3.jpg', 'Get Started ', 1, 'https://masterarts.net/contact', 'We deliver best approach comprising creative and technical aspects for the notable online visibility of your business. At Master Arts, we offer variety of packages depending on your business requirements.', '3rd'),
(11, 'We build your website beautiful and fully responsive.', 'portfolio4-1-1-3.jpg', 'get free quote', 1, 'https://masterarts.net/contact', 'Our team consists of professional developer and designers in the industry and the best “visualizes” available, who find creative, new-generation e-commerce solutions for our web design and development services. Our designers are multi-talented and creative', '2nd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `categories_table`
--
ALTER TABLE `categories_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_table`
--
ALTER TABLE `client_table`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `cmt_table`
--
ALTER TABLE `cmt_table`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `contact_table`
--
ALTER TABLE `contact_table`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `email_setup_table`
--
ALTER TABLE `email_setup_table`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `footer_table`
--
ALTER TABLE `footer_table`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_group`
--
ALTER TABLE `menu_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_table`
--
ALTER TABLE `menu_table`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_views`
--
ALTER TABLE `post_views`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `rep_table`
--
ALTER TABLE `rep_table`
  ADD PRIMARY KEY (`rep_id`);

--
-- Indexes for table `slider_table`
--
ALTER TABLE `slider_table`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories_table`
--
ALTER TABLE `categories_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `client_table`
--
ALTER TABLE `client_table`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cmt_table`
--
ALTER TABLE `cmt_table`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_table`
--
ALTER TABLE `contact_table`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_setup_table`
--
ALTER TABLE `email_setup_table`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `footer_table`
--
ALTER TABLE `footer_table`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menu_group`
--
ALTER TABLE `menu_group`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_table`
--
ALTER TABLE `menu_table`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `post_views`
--
ALTER TABLE `post_views`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rep_table`
--
ALTER TABLE `rep_table`
  MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `slider_table`
--
ALTER TABLE `slider_table`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
