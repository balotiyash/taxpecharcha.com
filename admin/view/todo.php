<!-- 
    File: todo.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code for the todo page in the dashboard.
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
    <title>Taxpecharcha - TODO</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardStyle.css">

    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="../style/todoStyle.css">
</head>
<body onload="initializeDashboard()">
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.html" ?>
    </header>

    <!-- Main content area -->
    <main id="mainDiv">
        <!-- Left nav buttons -->
        <?php include "../../shared/view/dashboardNavigation.html" ?>

        <!-- Main advanced text editor -->
        <section id="dashContent">
            <div>
                <div id="heading">
                    <h2>TODO</h2>
                    <div id="horizontalLine"></div>
                </div>
                <textarea name="textarea" id="default" required autocomplete="off"></textarea>
            </div>
        </section>
    </main>

    <!-- scripts -->
    <script src="../controller/tinymce/tinymce.min.js"></script>
    <script src="../controller/dashboard.js"></script>
    <script src="../controller/todoScript.js"></script>
</body>
</html>