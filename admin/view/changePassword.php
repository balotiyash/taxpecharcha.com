<!-- 
    File: changePassword.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the change or forget password page.
    Created on: 02 June 2024
    Last Modified: 04 June 2024
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

    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="../style/changePassStyle.css">
    
</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.html" ?>
    </header>
    
    <!-- Main content area -->
    <main id="mainDiv">
        <div id="resetParentDiv">
            <!-- Information -->
            <div class="infoDiv">
                <h1 class="taxpecharchaTxt">Taxpecharcha</h1>
                <p class="slogan">"Maximize Savings, Minimize Taxes: Your Path to Financial Freedom."</p>
                <p class="loginTxt">Admin Password Reset</p>
            </div>

            <form onsubmit="" class="form" id="resetPassForm">
                <!-- Left Side -->
                <div id="inputForm">
                    <div id="part1">
                        <div class="form-element">
                            <label for="emailTxt">Email - ID</label>
                            <input type="text" name="emailTxt" id="emailTxt" placeholder="Enter Email ID" autocomplete="off" required>
                        </div>

                        <div class="form-element">
                            <label for="newPassTxt">New Password</label>
                            <div class="passHideShow">
                                <input type="password" placeholder="Enter New Password" id="newPassTxt" autocomplete="off" required>
                                <i class="fa-solid fa-eye togglePassword" id="eyePass1" onclick="hideShowPassword('newPassTxt')"></i>
                            </div>
                        </div>

                        <div class="form-element">
                            <label for="confirmPassTxt">Confirm Password</label>
                            <div class="passHideShow">
                                <input type="password" id="confirmPassTxt" placeholder="Re-enter New Password" autocomplete="off" required>
                                <i class="fa-solid fa-eye togglePassword" id="eyePass2" onclick="hideShowPassword('confirmPassTxt')"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side -->
                    <div id="part2">
                        <div class="form-element">
                            <label for="dobInput">Date of Birth</label>
                            <input type="date" name="" id="dobInput" required>
                        </div>

                        <div class="form-element">
                            <label for="securityQuestion">Select Security Question</label>
                            <select name="" id="securityQuestion" required>
                                <option value="" selected disabled>Select Question</option>
                                <option value="In what city were you born?">In what city were you born?</option>
                                <option value="What is your favorite color?">What is your favorite color?</option>
                                <option value="What is your favorite movie?">What is your favorite movie?</option>
                                <option value="Who was your childhood best friend?">Who was your childhood best friend?</option>
                                <option value="What is your favorite food?">What is your favorite food?</option>
                                <option value="Who is your favorite teacher?">Who is your favorite teacher?</option>
                            </select>
                        </div>

                        <div class="form-element">
                            <label for="securityAnswer">Answer</label>
                            <input type="text" name="" id="securityAnswer" placeholder="Enter Your Answer" autocomplete="off" required>
                        </div>
                    </div>
                </div>

                <!-- Checkbox for confirmation -->
                <div class="form-element" id="reviewDiv">
                    <input type="checkbox" name="" id="review" required>
                    <label for="review">I have reviewed my details.</label>
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