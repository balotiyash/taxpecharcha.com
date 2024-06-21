<!-- 
    File: admin/view/todo.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code for the todo page in the dashboard.
    Created on: 02 June 2024
    Last Modified: 21 June 2024
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
    <link rel="stylesheet" href="../../shared/style/dashboardNavBtn.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="../style/todoStyle.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">
</head>
<body>
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
                    <div>
                        <h2>TODO</h2>
                        <div id="horizontalLine"></div>
                    </div>
                    <button class="button-28 saveBtn" id="todoSaveBtn">Save</button>
                </div>
                <textarea name="textarea" id="default" required autocomplete="off"></textarea>
            </div>
        </section>
    </main>

    <!-- scripts -->
    <script src="../controller/tinymce/tinymce.min.js"></script>
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/todoScript.js"></script>
</body>
</html>