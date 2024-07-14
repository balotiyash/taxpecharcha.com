<!-- 
    File: user/view/profile.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the profile page.
    Created on: 26 May 2024
    Last Modified: 14 July 2024
-->

<!-- Session handling for login or dashboard button on the navbar -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Browse all articles on Taxpecharcha, covering topics related to Income Tax, GST, and Customs.">

    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - Profile</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Styles for navbar -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Footer Style -->
    <link rel="stylesheet" href="../../shared/style/footer.css">

    <!-- Fonts awesome is included in navbar -->

    <!-- Profile Page Style -->
    <link rel="stylesheet" href="../style/profileStyle.css">
    <link rel="stylesheet" href="../style/aboutStyle.css">

    <!-- Javascripts -->
    <script src="../../shared/controller/sharedJs.js"></script>

    <!-- Google Ads -->
    <meta name="google-adsense-account" content="ca-pub-2791961608830349">
</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>

    <!-- Main content area -->
    <main id="mainPage">
        
        <!-- LEFT Panel -->
        <div id="profile1" class="profileDivStyle">
            <div id="contactDiv">
                <!-- <div id="profileImg"></div> -->
                 <img src="../../asset/images/Manish.png" alt="Manish Suvasiya" id="profileImg">
                <h3>Manish Suvasiya</h3>
                <p>Founder of Taxpecharcha</p>

                <!-- Social Media -->
                <div id="socialMedia">
                    <a href="https://www.linkedin.com/in/manish-suvasiya-3a41251a0/" target="_main"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="https://wa.me/919833591469" target="_main"><i class="fa-brands fa-square-whatsapp"></i></a>
                    <a href="https://x.com/ManishSuvasiya3" target="_main"><i class="fa-brands fa-square-x-twitter"></i></a>
                    <a href="https://www.instagram.com/manish.suvasiya?igsh=MWw0YW9ja2toaTAzdg==" target="_main"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
            </div>

            <div id="contactInfo">
                <!-- Phone -->
                <div class="contactChild1">
                    <i class="fa-solid fa-phone"></i>
                    <div>
                        <p class="tag">Phone</p>
                        <p class="data">+91 98335 91469</p>
                    </div>
                </div> 

                <!-- Email -->
                <div class="contactChild1">
                    <i class="fa-solid fa-envelope"></i>
                    <div>
                        <p class="tag">Email</p>
                        <p class="data">camanishsuvasiya@gmail.com</p>
                    </div>
                </div> 

                <!-- Address -->
                <div class="contactChild1">
                    <i class="fa-solid fa-location-dot"></i>
                    <div>
                        <p class="tag">Address</p>
                        <p class="data">Chembur, Mumbai - 400 071</p>
                    </div>
                </div> 
            </div>
        </div>

        <!-- RIGHT Panel -->
        <?php include "../view/aboutMe.html" ?>
    </main>

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>
</body>
</html>