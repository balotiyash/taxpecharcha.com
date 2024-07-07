<!-- 
    File: index.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the home/index page.
    Created on: 24 May 2024
    Last Modified: 07 July 2024
-->

<!-- Session handling for login or dashboard button on the navbar -->
<?php session_start(); ?>

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
    <title>Taxpecharcha</title>
    <link rel="icon" type="image/x-icon" href="asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="shared/style/navBarStyle.css">
    <link rel="stylesheet" href="shared/style/buttonStyle1.css">

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="user/style/homePageStyle.css">
    <link rel="stylesheet" href="shared/style/footer.css">
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
        <?php include "user/view/incomeTax.html" ?>
        <?php include "user/view/gstSection.html" ?>
        <?php include "user/view/customSection.html" ?>
    </main>

    <footer>
        <?php include "shared/view/footer.html" ?>
    </footer>

    <!-- Scripts -->
    <script src="shared/controller/jquery-3.7.1.min.js"></script>
    <script src="shared/controller/sharedJs.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="main.js"></script>
</body>

</html>