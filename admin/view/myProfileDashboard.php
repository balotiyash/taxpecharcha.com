<!-- 
    File: admin/view/myProfileDashboard.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the My Profile Page in dashboard.
    Created on: 02 June 2024
    Last Modified: 28 January 2025
-->

<!-- Session management -->
<?php
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION["isAdminLoggedin"])) {
        // Redirect to login page
        header("location: login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    
    <meta name="description" content="My profile page for the admin to view basic information, and to change or update the login password and security answer on Taxpecharcha.">

    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - My Profile</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/responsive/navBarResponsive.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardNavBtn.css">

    <!-- Footer Style -->
    <link rel="stylesheet" href="../../shared/style/footer.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Main stylesheets -->
    <link rel="stylesheet" href="../style/myProfilePart1.css">
    <link rel="stylesheet" href="../style/myProfilePart2.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/profilePageScript.js"></script>

    <!-- Google Ads -->
    <meta name="google-adsense-account" content="ca-pub-2791961608830349">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2791961608830349"
     crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>

    <!-- Main content area -->
    <main id="mainDiv">
        <!-- Left nav buttons -->
        <?php include "../../shared/view/dashboardNavigation.html" ?>

        <!-- Main information area -->
        <section id="dashContent">
            <!-- Left personal details section -->
            <?php include "profileInfo.html" ?>

            <!-- Right changing settings -->
            <?php include "profileSecurity.html" ?>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>
</body>
</html>