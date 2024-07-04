<!-- 
    File: admin/view/myBlogs.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code to fetch all the existing blogs in dashboard.
    Created on: 02 June 2024
    Last Modified: 02 July 2024
-->

<?php
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION["isAdminLoggedin"])) {
        // Redirect to login page
        header("location: login.php");
        exit;
    }
?>

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
    <title>Taxpecharcha - My Blogs</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardNavBtn.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../style/myBlogsStyle.css">
    <link rel="stylesheet" href="../style/myBlogsTable.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">
</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>

    <!-- Content area -->
    <main id="mainDiv">
        <!-- Left nav buttons -->
        <?php include "../../shared/view/dashboardNavigation.html" ?>

        <!-- Main information area -->
        <section id="dashContent">
            
            <!-- Search bar -->
            <form id="searchBar">
                <!-- Main Category -->
                <div id="mainCatDiv">
                    <label for="mainCatOption"><b>Select Category: </b></label>
                    <select id="mainCatOption" required>
                        <option value="" selected disabled>Select Main Category</option>
                        <option value="The Income Tax Act, 1961">The Income Tax Act, 1961</option>
                        <option value="The GST Act, 2017">The GST Act, 2017</option>
                        <option value="The Customs Act, 1962">The Customs Act, 1962</option>
                    </select>
                </div>

                <!-- Sub Category -->
                <div id="subCatDiv">
                    <label for="actRadio"><b>Select Sub-Category: </b></label><br>
                    <div>
                        <input type="radio" name="subCategory" id="actRadio" required>
                        <label for="actRadio">Act</label><br>
                    </div>

                    <div>
                        <input type="radio" name="subCategory" id="circularRadio" required>
                        <label for="circularRadio">Circular / Notification</label>
                    </div>
                </div>

                <div id="verticalDivider"></div>

                <!-- Search by text input -->
                <div id="searchDiv">
                    <label for="searchInput"><b>Search:</b></label>
                    <input type="text" id="searchInput" placeholder="Article No.">
                    <i class="fa-solid fa-magnifying-glass icons" id="searchIcon"></i>
                </div>
            </form>

            <!-- Main Information area after search -->
            <div class="dataDiv" id="noResultDiv">
                <img src="../../asset/vectors/Search.svg" alt="Searching image" id="searchImg">
                <p>No Result Found</p>
            </div>
            <div class="dataDiv" id="searchResultDiv"></div>
        </section>
    </main>

    <!-- Scripts -->
    <script src="../controller/tinymce/tinymce.min.js"></script>
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/myBlogsScript.js"></script>
    <!-- <script src="../controller/editBlogScript.js"></script> -->
</body>
</html>