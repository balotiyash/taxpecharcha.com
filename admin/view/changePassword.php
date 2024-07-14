<!-- 
    File: admin/view/changePassword.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the change or forget password page.
    Created on: 02 June 2024
    Last Modified: 14 July 2024
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
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Forgot password or Reset password page for the admin to change the current or existing password without login into the system.">

    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - Change/Forgot Password</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="../style/changePassStyle.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">
    
    <!-- Javascripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/loginScript.js"></script>

    <!-- Google Ads -->
    <meta name="google-adsense-account" content="ca-pub-2791961608830349">
</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>
    
    <!-- Main content area -->
    <main id="mainDiv">
        <div id="resetParentDiv">

            <!-- Information -->
            <div class="infoDiv">
                <h1 class="taxpecharchaTxt">Taxpecharcha</h1>
                <p class="slogan">"Maximize Savings, Minimize Taxes: Your Path to Financial Freedom."</p>
                <p class="loginTxt">Admin Password Reset</p>
                
                <!-- Toast messages -->
                <div id="error-msg" class="toast-msg"></div>
                <div id="success-msg" class="toast-msg"></div>
                <div id="info-msg" class="toast-msg"></div>
            </div>

            <!-- Reset form -->
            <form class="form" id="resetPassForm">
                <!-- Left Side -->
                <div id="inputForm">
                    <div id="part1">
                        <!-- Login ID -->
                        <div class="form-element">
                            <label for="emailTxt" class="disableSelect">Login - ID</label>
                            <input type="text" id="emailTxt" placeholder="Enter Login ID" autocomplete="off" required>
                        </div>

                        <!-- New password -->
                        <div class="form-element">
                            <label for="newPassTxt" class="disableSelect">New Password</label>
                            <div class="passHideShow">
                                <input type="password" placeholder="Enter New Password" id="newPassTxt" autocomplete="off" required>
                                <i class="fa-solid fa-eye togglePassword" id="eyePass1" onclick="hideShowPassword('newPassTxt')"></i>
                            </div>
                        </div>

                        <!-- Confirm password -->
                        <div class="form-element">
                            <label for="confirmPassTxt" class="disableSelect">Confirm Password</label>
                            <div class="passHideShow">
                                <input type="password" id="confirmPassTxt" placeholder="Re-enter New Password" autocomplete="off" required>
                                <i class="fa-solid fa-eye togglePassword" id="eyePass2" onclick="hideShowPassword('confirmPassTxt')"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div id="part2">
                        <!-- DOB -->
                        <div class="form-element">
                            <label for="dobInput" class="disableSelect">Date of Birth</label>
                            <input type="date" id="dobInput" required>
                        </div>

                        <!-- Security Question -->
                        <div class="form-element">
                            <label for="securityQuestion" class="disableSelect">Select Security Question</label>
                            <select id="securityQuestion" required>
                                <option value="" selected disabled>Select Question</option>
                                <option value="In what city were you born?">In what city were you born?</option>
                                <option value="What is your favorite color?">What is your favorite color?</option>
                                <option value="What is your favorite movie?">What is your favorite movie?</option>
                                <option value="Who was your childhood best friend?">Who was your childhood best friend?</option>
                                <option value="What is your favorite food?">What is your favorite food?</option>
                                <option value="Who is your favorite teacher?">Who is your favorite teacher?</option>
                            </select>
                        </div>

                        <!-- Security Answer -->
                        <div class="form-element">
                            <label for="securityAnswer" class="disableSelect">Answer</label>
                            <input type="text" id="securityAnswer" placeholder="Enter Your Answer" autocomplete="off" required>
                        </div>
                    </div>
                </div>

                <!-- Checkbox for confirmation -->
                <div class="form-element" id="reviewDiv">
                    <input type="checkbox" id="review" required>
                    <label for="review" class="disableSelect">I have reviewed my details.</label>
                </div>

                <!-- Submit button -->
                <div class="form-element" id="saveDetailsDiv">
                    <button type="submit" class="button-28" role="button" id="resetPassBtn">Submit</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>