-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 11:20 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxpecharcha_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_details`
--

CREATE TABLE `admin_login_details` (
  `login_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `security_question` varchar(255) NOT NULL,
  `security_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login_details`
--

INSERT INTO `admin_login_details` (`login_id`, `password`, `dob`, `security_question`, `security_answer`) VALUES
('admin', '$2y$10$nPV8dv5IRO8InF8Dp6Py6uaTlerU894PrT0zR8LT/8t9ykAEErlua', '2002-05-08', 'In what city were you born?', 'mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `main_category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` mediumtext NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `author` varchar(255) NOT NULL DEFAULT 'C. A. Manish Suvasiya',
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `slug`, `title`, `main_category`, `sub_category`, `section`, `keywords`, `image`, `content`, `views`, `author`, `date`) VALUES
(1, 'self-assessment-tax-section-59', 'SELF ASSESSMENT TAX (SECTION 59)', 'The GST Act, 2017', 'Act', 'Section 59', 'Self Assessement tax, GSTR 3B, Tax Laibility', '../../asset/uploads/3156.jpg', '<p dir=\"ltr\">Every registered person shall himself assess the tax liability and pay to the government (Eg.. Calculation of GST Payable at the time of GSTR 3B)</p>', 10, 'C. A. Manish Suvasiya', '2024-07-10 17:00:00'),
(3, 'provisional-assessment-section-60', 'PROVISIONAL ASSESSMENT (SECTION 60)', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 60', 'Provision Assessment, Final Assessment, Applicability of Provisional Assessment, Joint Commissioner, Additional Commissioner, Interest Rate etc.', '../../asset/uploads/4937.jpg', '<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Person unable to determine the value of Supply or rate of Tax can pay tax under sec. 60</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Payment should be made on the execution of the bond with the GST Department.</p>\r\n</li>\r\n</ul>\r\n<p dir=\"ltr\"><strong>Final Assessment</strong></p>\r\n<p dir=\"ltr\">Final assessment should be completed within the period of 6 month from the date of above order.</p>\r\n<p dir=\"ltr\">Extension can be given by the Joint commissioner/Additional Commissioner for 6 more month but not exceeding 4 years.</p>\r\n<p dir=\"ltr\">If after conclusion of the final assessment it is seen that assesse has short paid the tax amount then tax shall be payable by the assesse with interest u/s 50 i.e. 18% p.a.</p>\r\n<p dir=\"ltr\">If assessee has excess paid the taxes, then refund shall be given by the department u/s 56 i.e. 6% p.a..</p>', 29, 'C. A. Manish Suvasiya', '2024-07-10 17:10:01'),
(4, 'scrutiny-of-return-section-61', 'SCRUTINY OF RETURN (SECTION 61)	', 'The Customs Act, 1962', 'Act', 'Section 61', 'Scrutiny of Return, Examination of return, Section 65,66,67,73,74', '../../asset/uploads/9519.jpg', '<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">In order to verify the accuracy of the return the proper officer may examine the return and seek explanation.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">If explanation offered by the assessee is adequate and satisfactory to the officer then in this case no further action to be taken.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">If no explanation offered or unsatisfactory explanation offered to the officer then action to be taken under section 65,66,67,73 or 74.</p>\r\n</li>\r\n</ul>', 7, 'C. A. Manish Suvasiya', '2024-07-10 17:01:01'),
(6, 'assessment-of-a-non---filer-of-return-section-62', 'Assessment of a Non - Filer of Return (Section 62)', 'The Customs Act, 1962', 'Act', 'Section 62', 'Assessment of a Non – Filer, Notices, annual return, 60days, Rs.100 late fee etc.', '../../asset/uploads/good-service-tax-concept-with-financial-elements_1302-10253.png', '<p dir=\"ltr\"><strong>Assessment of a Non - Filer of Return (Section 62)</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">If assessee not furnished return even after service of the notice u/s 46.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Proper officer shall assess the liability of tax within the period of 5 years from the due date specified under section 44 for furnishing annual return i.e. 31st December of next financial year.<strong><br></strong></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Apart from the above, if registered person furnishes a valid return within the period of 60 days of serving of the assessement order, the order passed earlier shall be consider as withdrawal of order but the payment of interest or late fee shall be continued.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">If registered person failed to furnish a valid return within the period of 60 days of serving of the assessement order he may furnish a return within the period of further 60 days on payment of the additional 100Rs. Penalty per day beyond 60 days i.e. from 61st day</p>\r\n</li>\r\n</ul>', 4, 'C. A. Manish Suvasiya', '2024-07-10 17:01:47'),
(7, 'assessment-of-a-unregisterd-person-section-63', 'Assessment of a Unregisterd person (Section 63)', 'The GST Act, 2017', 'Act', 'Section 63', 'Assessment of a Unregisterd person, Notices, 15 days etc.', '../../asset/uploads/Taxpecharcha Dashboard1 (2).png', '<p dir=\"ltr\"><strong>Assessment of a Unregisterd person (Section 63)</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">This section is applicable to the unregistered person i.e. person who are liable to obtain registration under section 22 and have failed to obtain registration.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">This provisions also covers the cases whose registration was cancelled.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">For assessment under this section, notice has to be issued by the proper officer. The notice would contain the grounds on which the assessment is proposed to be made on best judgment basis.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The taxable person is allowed a time of 15 days to furnish his reply,&nbsp; After conidering the said explanation, the order will be passed.<strong><br></strong></p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Proper officer to the best of his judgment may issue an assessment order within a period of 5 years from the due date specified u/s 44 for furnishing annual return.</p>\r\n</li>\r\n</ul>', 3, 'C. A. Manish Suvasiya', '2024-06-26 05:57:11'),
(8, 'summary-assessment-in-certain-special-cases-section-64', 'Summary Assessment in certain special cases (Section 64)', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 64', 'tax liability, Joint Commissioner, additional commissioner, withdrawal of the order, section 73 & 74', '../../asset/uploads/Taxpecharcha Dashboard1 (4).png', '<p dir=\"ltr\"><strong>SUMMARY ASSESSMENT IN CERTAIN SPECIAL CASES (SECTION 64)</strong></p>\r\n<p dir=\"ltr\">The summary assessment can be undertaken in case all of the following conditions are satisfied:</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The proper officer must have a evidence that there may be tax liability.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The proper office has obtained proper permission of additional /Joint&nbsp; Commissioner to assess the tax liability summarily.</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">The proper must have a sufficient ground to believe that any delay in passing assessment order would result in loss of revenue.</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Such failure to pay tax, penalty or interest must be due to reasons attributable to the tax payer (Eg: Insolvency, Instances of defaulting, absconding etc.)</p>\r\n<p dir=\"ltr\"><strong>Withdrawals of Order</strong></p>\r\n<p dir=\"ltr\">The summary assessment order can be withdrawn by the AC/JC, if he consider that such order is erroneous.</p>\r\n<p dir=\"ltr\">On application by the taxable person for withdrawal of the summary assessment order within the period of 30 days from the date of receipt of order OR on his own motion and follow the producer laid down in Section 73 or Section 74 for determination of tax liability of such taxable person.</p>', 9, 'C. A. Manish Suvasiya', '2024-07-10 17:07:32'),
(9, 'section-115bac-of-income-tax-act-1961-applicability-tax-rates-surcharge-conditions-deduction-not-allowed-etc', 'Section 115BAC of Income Tax Act 1961: Applicability, Tax Rates, Surcharge, Conditions, deduction not allowed etc.', 'The Income Tax Act, 1961', 'Act', '115BAC', 'Section 115BAC of Income Tax Act 1961                     Applicability                    Tax Rates                       Surcharge                    Conditions                      Default tax regime', '../../asset/uploads/Taxpecharcha Dashboard1.png', '<p dir=\"ltr\">Applicability: This section is applicable to the Assessee who is Individual, HUF (Hindu undivided family), AOP/BOI and Artificial Judicial Person.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Tax Rates:&nbsp;</p>\r\n<p dir=\"ltr\">Tax rates before Assessment year 2024-2025 (1.0)</p>\r\n<p dir=\"ltr\"><img src=\"https://lh7-us.googleusercontent.com/docsz/AD_4nXeMCneumEXNILgKs0r71tLJWIS3AwWMQf_r4cpqFqUVoNnIlpbsUTVytL6DuFy0eCGXi9fxba0S7gS_LnDrezRP4Ka3g9UzzeHy5pMqQD_TD1PVRA4bBp9UkyMCV0jW8Ayl-BdQJd950-W_q7vUuqd_WBPBfb9upCa_zNkRfqxjetYB05vo3XE?key=TT2jhDoCCPTDM-Vay1sU7A\" width=\"383\" height=\"178\"></p>\r\n<p dir=\"ltr\">Tax rates from and after Assessment year 2024-2025 (2.0)</p>\r\n<p dir=\"ltr\"><img src=\"https://lh7-us.googleusercontent.com/docsz/AD_4nXeNbGpBXkfjwBodCxn6fpj4RkpeGCE6aKOjRQ08gHkQCCt2-_phtmgyBitW8NAgHIpuAXR1cbxhOdQP4BYxyE36x77VcYvVD6cQOijkNslrqUCt2xM-K0FUoj30O_fzjr-XTnQHnf2qFWXk2NfZ2wfqo-gUpYaZ4Te7NXd0IgVIsnl4gtuC-nc?key=TT2jhDoCCPTDM-Vay1sU7A\" width=\"382\" height=\"152\"></p>\r\n<p dir=\"ltr\">Under both the scenario, Special income i.e. income chargeable under section 111A, 112, 112A, winning etc, shall be taxed under special rates only.</p>\r\n<p dir=\"ltr\">Surcharge: Surcharge in case of the section 115BAC shall be 10% (if income is more than Rs.50 lakhs but upto Rs. 1 crore), 15% (If income is more than Rs. 1 crore but upto Rs. 2 crore), 25% (If income is more than Rs. 2 crore)</p>\r\n<p dir=\"ltr\">Note: Higher surcharge which is 37% is not applicable in case of Section 115BAC.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Deduction not allowed: Deails of the same is given under below table&nbsp;&nbsp;</p>\r\n<p dir=\"ltr\"><img src=\"https://lh7-us.googleusercontent.com/docsz/AD_4nXeIENa8nPkdCGsMURr5LYsfig0--5o9Zt8Dc4SnSjVH6fYa5ie-Icgh7Mcavi9BSn2RiWRiy3hWliYHGBQJn6UyND9KTKfasPrXxmgCu8C1d_vp0f4NHS6tTJIwfkLz9ZYVzeGEF2P_qY_G3jGuO3ZCufhXtBKUGH5jlrGs-dqQIJPqrg9vz8Q?key=TT2jhDoCCPTDM-Vay1sU7A\" width=\"539\" height=\"527\"></p>\r\n<p dir=\"ltr\">Rebate section 87A: Rebate will be given only to the Resident Individual&nbsp; having Total Income upto Rs.7,00,000/-&nbsp;</p>\r\n<p dir=\"ltr\">Rebate will be equal to</p>\r\n<ol>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Amount equal to the Tax payable&nbsp;</p>\r\n</li>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Rs. 25,000/-</p>\r\n</li>\r\n</ol>\r\n<p dir=\"ltr\">Whichever Is lower</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<p dir=\"ltr\">Other Important Point:&nbsp;</p>\r\n<p dir=\"ltr\">Section 115BAC is a default tax regime. However assessee &nbsp;can avail the benefit of regular tax regime by exercising the option.</p>\r\n<p><strong>&nbsp;</strong></p>\r\n<ul>\r\n<li dir=\"ltr\" aria-level=\"1\">\r\n<p dir=\"ltr\" role=\"presentation\">Assessee does not have Income from Business &amp; Profession:&nbsp;</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>', 14, 'C. A. Manish Suvasiya', '2024-06-26 06:00:33'),
(79, 'sample-blog-225', 'Sample Blog 225', 'The GST Act, 2017', 'Circular / Notification', 'Section 225', 'gst, compliance, returns', '../../asset/uploads/download (1).jpeg', '<p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n<p>Yash</p>', 101, 'C. A. Manish Suvasiya', '2024-07-10 16:54:45'),
(80, 'sample-blog-3', 'Sample Blog 3', 'The Customs Act, 1962', 'Act', 'Section 3', 'customs, import, export', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(81, 'sample-blog-4', 'Sample Blog 4', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 4', 'tax, assessment, penalties', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 46, 'C. A. Manish Suvasiya', '2024-07-10 16:58:13'),
(83, 'sample-blog-6', 'Sample Blog 6', 'The Income Tax Act, 1961', 'Act', 'Section 6', 'tax, capital gains, exemptions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(84, 'sample-blog-7', 'Sample Blog 7', 'The GST Act, 2017', 'Circular / Notification', 'Section 7', 'gst, place of supply, invoices', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(85, 'sample-blog-8', 'Sample Blog 8', 'The Customs Act, 1962', 'Act', 'Section 8', 'customs, duties, regulations', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(86, 'sample-blog-9', 'Sample Blog 9', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 9', 'tax, deductions, computation', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(87, 'sample-blog-10', 'Sample Blog 10', 'The GST Act, 2017', 'Act', 'Section 10', 'gst, compliance, penalties', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(88, 'sample-blog-11', 'Sample Blog 11', 'The Income Tax Act, 1961', 'Act', 'Section 11', 'tax, exemptions, deductions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(89, 'sample-blog-12', 'Sample Blog 12', 'The GST Act, 2017', 'Circular / Notification', 'Section 12', 'gst, input tax, returns', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(90, 'sample-blog-13', 'Sample Blog 13', 'The Customs Act, 1962', 'Act', 'Section 13', 'customs, import, export', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 82, 'C. A. Manish Suvasiya', '2024-07-10 16:47:35'),
(91, 'sample-blog-14', 'Sample Blog 14', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 14', 'tax, assessment, penalties', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(93, 'sample-blog-16', 'Sample Blog 16', 'The Income Tax Act, 1961', 'Act', 'Section 16', 'tax, capital gains, exemptions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(94, 'sample-blog-17', 'Sample Blog 17', 'The GST Act, 2017', 'Circular / Notification', 'Section 17', 'gst, place of supply, invoices', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(95, 'sample-blog-18', 'Sample Blog 18', 'The Customs Act, 1962', 'Act', 'Section 18', 'customs, duties, regulations', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(96, 'sample-blog-19', 'Sample Blog 19', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 19', 'tax, deductions, computation', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(97, 'sample-blog-20', 'Sample Blog 20', 'The GST Act, 2017', 'Act', 'Section 20', 'gst, compliance, penalties', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(99, 'sample-blog-22', 'Sample Blog 22', 'The GST Act, 2017', 'Circular / Notification', 'Section 22', 'gst, input tax, returns', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(100, 'sample-blog-23', 'Sample Blog 23', 'The Customs Act, 1962', 'Act', 'Section 23', 'customs, import, export', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(101, 'sample-blog-24', 'Sample Blog 24', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 24', 'tax, assessment, penalties', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(102, 'sample-blog-25', 'Sample Blog 25', 'The GST Act, 2017', 'Act', 'Section 25', 'gst, input tax credit', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(103, 'sample-blog-26', 'Sample Blog 26', 'The Income Tax Act, 1961', 'Act', 'Section 26', 'tax, capital gains, exemptions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(104, 'sample-blog-27', 'Sample Blog 27', 'The GST Act, 2017', 'Circular / Notification', 'Section 27', 'gst, place of supply, invoices', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(105, 'sample-blog-28', 'Sample Blog 28', 'The Customs Act, 1962', 'Act', 'Section 28', 'customs, duties, regulations', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(106, 'sample-blog-29', 'Sample Blog 29', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 29', 'tax, deductions, computation', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(107, 'sample-blog-30', 'Sample Blog 30', 'The GST Act, 2017', 'Act', 'Section 30', 'gst, compliance, penalties', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(108, 'sample-blog-31', 'Sample Blog 31', 'The Income Tax Act, 1961', 'Act', 'Section 31', 'tax, exemptions, deductions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(109, 'sample-blog-32', 'Sample Blog 32', 'The GST Act, 2017', 'Circular / Notification', 'Section 32', 'gst, input tax, returns', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(110, 'sample-blog-33', 'Sample Blog 33', 'The Customs Act, 1962', 'Act', 'Section 33', 'customs, import, export', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(111, 'sample-blog-34', 'Sample Blog 34', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 34', 'tax, assessment, penalties', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(112, 'sample-blog-35', 'Sample Blog 35', 'The GST Act, 2017', 'Act', 'Section 35', 'gst, input tax credit', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(113, 'sample-blog-36', 'Sample Blog 36', 'The Income Tax Act, 1961', 'Act', 'Section 36', 'tax, capital gains, exemptions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(114, 'sample-blog-37', 'Sample Blog 37', 'The GST Act, 2017', 'Circular / Notification', 'Section 37', 'gst, place of supply, invoices', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(115, 'sample-blog-38', 'Sample Blog 38', 'The Customs Act, 1962', 'Act', 'Section 38', 'customs, duties, regulations', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(116, 'sample-blog-39', 'Sample Blog 39', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 39', 'tax, deductions, computation', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(117, 'sample-blog-40', 'Sample Blog 40', 'The GST Act, 2017', 'Act', 'Section 40', 'gst, compliance, penalties', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(118, 'sample-blog-41', 'Sample Blog 41', 'The Income Tax Act, 1961', 'Act', 'Section 41', 'tax, exemptions, deductions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(119, 'sample-blog-42', 'Sample Blog 42', 'The GST Act, 2017', 'Circular / Notification', 'Section 42', 'gst, input tax, returns', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(120, 'sample-blog-43', 'Sample Blog 43', 'The Customs Act, 1962', 'Act', 'Section 43', 'customs, import, export', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(121, 'sample-blog-44', 'Sample Blog 44', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 44', 'tax, assessment, penalties', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(122, 'sample-blog-45', 'Sample Blog 45', 'The GST Act, 2017', 'Act', 'Section 45', 'gst, input tax credit', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 2, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(123, 'sample-blog-46', 'Sample Blog 46', 'The Income Tax Act, 1961', 'Act', 'Section 46', 'tax, capital gains, exemptions', '../../asset/uploads/3156.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(124, 'sample-blog-47', 'Sample Blog 47', 'The GST Act, 2017', 'Circular / Notification', 'Section 47', 'gst, place of supply, invoices', '../../asset/uploads/3156.jpg', 'Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(125, 'sample-blog-48', 'Sample Blog 48', 'The Customs Act, 1962', 'Act', 'Section 48', 'customs, duties, regulations', '../../asset/uploads/3156.jpg', 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(126, 'sample-blog-49', 'Sample Blog 49', 'The Income Tax Act, 1961', 'Circular / Notification', 'Section 49', 'tax, deductions, computation', '../../asset/uploads/3156.jpg', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21'),
(127, 'sample-blog-50', 'Sample Blog 50', 'The GST Act, 2017', 'Act', 'Section 50', 'gst, compliance, penalties', '../../asset/uploads/3156.jpg', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'C. A. Manish Suvasiya', '2024-06-28 16:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `todo_data`
--

CREATE TABLE `todo_data` (
  `data` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo_data`
--

INSERT INTO `todo_data` (`data`) VALUES
('<p>Hello</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_details`
--
ALTER TABLE `admin_login_details`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
