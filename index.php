<!-- 
    File: index.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the home/index page.
    Created on: 24 May 2024
    Last Modified: 22 June 2024
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
    <title>Taxpecharcha</title>
    <link rel="icon" type="image/x-icon" href="asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="shared/style/navBarStyle.css">
    <link rel="stylesheet" href="shared/style/buttonStyle1.css">

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "shared/view/navBar.html" ?>
    </header>

    <main>
        <section id="mainSection">
            <div>
                <img src="asset/images/Taxpecharcha Dashboard2 RBG.png" class="slide visible">
                <img src="asset/images/Taxpecharcha Dashboard1 RBG.png" class="slide">
                <img src="asset/images/Taxpecharcha Dashboard3 RBG.png" class="slide">
                <img src="asset/images/Taxpecharcha Dashboard5 RBG.png" class="slide">
                <img src="asset/images/Taxpecharcha Dashboard4 RBG.png" class="slide">
            </div>
            <div>
                <h6>Welcome to,</h6>
                <h1>Taxpecharcha</h1>
                <p><span class="auto-type"></span></p>
            </div>
        </section>
    </main>

    <!-- Scripts -->
    <script src="shared/controller/sharedJs.js"></script>
    <script src="https://unpkg.com/typed.js@2.0.16/dist/typed.umd.js"></script>
    <script src="main.js"></script>
</body>
</html>