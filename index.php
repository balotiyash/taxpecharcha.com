<!-- 
    File: index.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the home/index page.
    Created on: 24 May 2024
    Last Modified: 14 July 2024
-->

<!-- Session handling for login or dashboard button on the navbar -->
<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta name="viewport" content="width=1200"> -->

    <meta name="description" content="Browse all articles on Taxpecharcha, covering topics related to Income Tax, GST, and Customs.">

    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - Expert Insights on Tax Laws and Regulations</title>
    <link rel="icon" type="image/x-icon" href="asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="shared/style/navBarStyle.css">
    <link rel="stylesheet" href="shared/style/buttonStyle1.css">

    <!-- Footer -->
    <link rel="stylesheet" href="shared/style/footer.css">
    
    <!-- Main stylesheet -->
    <link rel="stylesheet" href="user/style/homePageStyle.css">
    <link rel="stylesheet" href="style.css">

    <!-- Scripts -->
    <script src="shared/controller/jquery-3.7.1.min.js"></script>
    <script src="shared/controller/sharedJs.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="main.js"></script>

    <!-- Google Ads -->
    <meta name="google-adsense-account" content="ca-pub-2791961608830349">
</head>

<body>
    <!-- Navbar -->
    <header>
        <?php include "shared/view/navBar.php" ?>
    </header>

    <main>
        <!-- Section 1: Image Banner & Welcome Screen -->
        <section id="welcomeSection">
            <div id="imageContainer">
                <img src="asset/images/Taxpecharcha Dashboard2 RBG.png" class="slide visible">
                <img src="asset/images/Taxpecharcha Dashboard1 RBG.png" class="slide">
                <img src="asset/images/Taxpecharcha Dashboard3 RBG.png" class="slide">
                <img src="asset/images/Taxpecharcha Dashboard5 RBG.png" class="slide">
                <img src="asset/images/Taxpecharcha Dashboard4 RBG.png" class="slide">
            </div>
            <div id="welcomeDiv">
                <p id="welcomeTxt">Welcome to,</p>
                <h1 id="taxpecharchaTxt"><span id="taxTxt">Tax</span><span id="underlineTxt">pecharcha</span></h1>
                <br>
                <p id="sloganTxt"><span class="auto-type"></span></p>
            </div>
        </section>

        <!-- Section 2: Income Tax -->
        <?php include "user/view/incomeTax.html" ?>

        <!-- Section 3: GST -->
        <?php include "user/view/gstSection.html" ?>

        <!-- Section 4: Customs -->
        <?php include "user/view/customSection.html" ?>
    </main>

    <!-- Footer -->
    <footer>
        <?php include "shared/view/footer.html" ?>
    </footer>
</body>

</html>