<!-- 
    File: myBlogs.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code to fetch all the existing blogs in dashboard.
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
    <title>Taxpecharcha - My Blogs</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardStyle.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../style/myBlogsStyle.css">

    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body onload="initializeDashboard()">
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.html" ?>
    </header>

    <!-- Content area -->
    <main id="mainDiv">
        <!-- Left nav buttons -->
        <?php include "../../shared/view/dashboardNavigation.html" ?>

        <!-- Main information area -->
        <section id="dashContent">
            
            <!-- Search bar -->
            <div id="searchBar">
                <div id="mainCatDiv">
                    <label for="mainCatOption"><b>Select Category: </b></label>
                    <select name="" id="mainCatOption" required>
                        <option value="" selected disabled>Select Main Category</option>
                        <option value="">The Income Tax Act, 1961</option>
                        <option value="">The GST Act, 2017</option>
                        <option value="">The Customs Act, 1962</option>
                    </select>
                </div>

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

                <div id="searchDiv">
                    <label for="searchInput"><b>Search:</b></label>
                    <input type="text" name="" id="searchInput" placeholder="Article No.">
                    <i class="fa-solid fa-magnifying-glass" id="searchIcon"></i>
                </div>
            </div>

            <!-- Main Information area after search -->
            <div class="dataDiv">
                <img src="../../asset/vectors/Search.svg" alt="Searching image" id="searchImg">
                <p>No Result Found</p>
            </div>
        </section>
    </main>

    <!-- Scripts -->
    <script src="../controller/dashboard.js"></script>
</body>
</html>