<!-- 
    File: profile.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the profile page.
    Created on: 26 May 2024
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
    <title>Taxpecharcha - Profile</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Styles for navbar -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Profile Page Style -->
    <link rel="stylesheet" href="../style/profileStyle.css">
    <link rel="stylesheet" href="../style/aboutStyle.css">

    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.html" ?>
    </header>

    <!-- Main content area -->
    <main id="mainPage">
        
        <!-- LEFT Panel -->
        <div id="profile1" class="profileDivStyle">
            <div id="contactDiv">
                <div id="profileImg"></div>
                <h3>Manish Suvasiya</h3>
                <p>Chartered Accountant</p>

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
</body>
</html>