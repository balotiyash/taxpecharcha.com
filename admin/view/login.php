<!-- 
    File: admin/view/login.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the login page.
    Created on: 25 May 2024
    Last Modified: 02 July 2024
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TODO -->
    <meta name="description" content="Free Web tutorials">
    <meta name="keywords" content="HTML, CSS, JavaScript">
    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="">

    <!-- Tab Data -->
    <title>Taxpecharcha - Admin Login</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Main Page Style -->
    <link rel="stylesheet" href="../style/loginStyle.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">
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

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/loginScript.js"></script>
</body>
</html>