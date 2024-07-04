<!-- 
    File: admin/view/changePassword.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the change or forget password page.
    Created on: 02 June 2024
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
    <title>Taxpecharcha - Change Password</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="../style/changePassStyle.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">
    
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

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/loginScript.js"></script>
</body>
</html>