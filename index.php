<!-- 
    File: index.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the home/index page.
    Created on: 24 May 2024
    Last Modified: 16 June 2024
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

    

    <!-- Bootstrap -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="shared/style/navBarStyle.css">
    <link rel="stylesheet" href="shared/style/buttonStyle1.css">

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="style.css">
</head>
<body onload="settle()">
    <!-- Navbar -->
    <header>
        <?php include "shared/view/navBar.html" ?>
    </header>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="shared/controller/sharedJs.js"></script>
    <script src="main.js"></script>
</body>
</html>