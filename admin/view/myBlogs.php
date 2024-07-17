<!-- 
    File: admin/view/myBlogs.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code to fetch all the existing blogs in dashboard.
    Created on: 02 June 2024
    Last Modified: 17 July 2024
-->

<!-- Session management -->
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
    
    <meta name="description" content="Page displaying all articles written and uploaded by the admin on TaxPeCharcha, allowing for viewing, editing, or deleting articles.">

    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - My Articles</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardNavBtn.css">

    <!-- Footer Style -->
    <link rel="stylesheet" href="../../shared/style/footer.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../style/myBlogsStyle.css">
    <link rel="stylesheet" href="../style/myBlogsTable.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/myBlogsScript.js"></script>

    <!-- Google Ads -->
    <meta name="google-adsense-account" content="ca-pub-2791961608830349">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-2791961608830349"
     crossorigin="anonymous"></script>
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

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>
</body>
</html>