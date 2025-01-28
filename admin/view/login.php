<!-- 
    File: admin/view/login.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the login page.
    Created on: 25 May 2024
    Last Modified: 28 January 2025
-->

<!-- Session handling -->
<?php
    session_start();

    // Check if user is logged in
    if (isset($_SESSION["isAdminLoggedin"])) {
        // Redirect to login page
        header("location: https://www.taxpecharcha.com/");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Login page for the admin to access the Taxpecharcha system.">

    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - Admin Login</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/responsive/navBarResponsive.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Main Page Style -->
    <link rel="stylesheet" href="../style/loginStyle.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/loginScript.js"></script>

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
    <main id="mainPage">
        <div id="mainChildDiv">

            <!-- Left image -->
            <div id="imgDiv">
                <img src="../../asset/vectors/CAImage.svg" alt="Login Illustrative Image" id="taxImg">  
            </div>

            <!-- Right login form -->
            <div id="loginFormDiv">
                <form id="loginForm">
                    
                    <!-- Login message -->
                    <div id="wlcmDiv">
                        <p id="wlcmTxt" class="disableSelect">Welcome Back!</p>
                        <p class="greyTxt">Login to continue</p>
                    </div>

                    <!-- Error Message -->
                    <div id="error-msg"></div>
                    <div id="info-msg"></div>

                    <!-- Email Div -->
                    <div id="idDiv">
                        <label for="unameTxt" class="disableSelect">Login ID</label><br>
                        <input type="text" id="unameTxt" class="inputStyle" placeholder="abc@gmail.com" require autocomplete="off">
                    </div>

                    <!-- Pass Div -->
                    <div id="passDiv">
                        <label for="passTxt" class="disableSelect">Password</label><br>
                        <input type="password" id="passTxt" class="inputStyle" placeholder="• • • • • • • •" require autocomplete="off"><br>
                        <input type="checkbox" id="showPassCbk">
                        <label for="showPassCbk" class="greyTxt disableSelect">Show Password</label>
                    </div>
    
                    <!-- Save / reset password div -->
                    <div id="loginBtnDiv">
                        <input type="submit" id="submitBtn" class="button-28">
                        <p class="disableSelect">Forgot / Reset Password <a href="changePassword.php" id="resetPass">Click here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>