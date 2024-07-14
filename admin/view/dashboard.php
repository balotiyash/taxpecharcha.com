<!-- 
    File: admin/view/dashboard.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the dashboard page after login.
    Created on: 02 June 2024
    Last Modified: 14 July 2024
-->

<!-- Session handling -->
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
    <!-- Meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Dashboard page of Taxpecharcha for admin to manage and maintain articles.">
    
    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardNavBtn.css">

    <!-- Fonts awesome included in navbar -->

    <!-- Footer Style -->
    <link rel="stylesheet" href="../../shared/style/footer.css">

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="../style/dashWlcmStyle.css">
    <link rel="stylesheet" href="../style/dashTallyStyle.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/dashboard.js"></script>

</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>

    <!-- Main Content Area -->
    <main id="mainDiv">
        <!-- Left side navigation code -->
        <?php include "../../shared/view/dashboardNavigation.html" ?>

        <!-- Right side Main Content -->
        <section id="dashContent">
            <div id="dashChild1">
                <div id="helloDiv">

                    <!-- Left Welcome Message -->
                    <div id="helloChild1">
                        <h3>Hello, Manish!</h3>
                        <p>Here, you have all the tools you need to create and manage content, monitor user engagement, and keep our community thriving.</p>
                        <button id="newPostBtn">Write new post</button>
                    </div>

                    <img src="../../asset/images/DashboardCalc.png" alt="Welcome Image" id="helloImg">
                </div>

                <!-- Left Recent Blogs -->
                <div id="topArticles">
                    <h3>Top Articles</h3>

                    <table id="topArticlesTable">
                        <!-- 1st article -->
                        <tr>
                            <td id="view1" class="viewsCol">~</td>
                            <td class="imageCol"><img src="../../asset/vectors/Not Found.svg" alt="Article Image" id="img1" class="articleImg"></td>
                            <td class="titleCol"><h4 id="title1">Details Not Found!</h4></td>
                            <td id="date1" class="dateCol">~</td>
                        </tr>

                        <!-- 2nd article -->
                        <tr>
                            <td id="view2" class="viewsCol">~</td>
                            <td class="imageCol"><img src="../../asset/vectors/Not Found.svg" alt="Article Image" id="img2" class="articleImg"></td>
                            <td class="titleCol"><h4 id="title2">Details Not Found!</h4></td>
                            <td id="date2" class="dateCo2">~</td>
                        </tr>

                        <!-- 3rd article -->
                        <tr>
                            <td id="view3" class="viewsCol">~</td>
                            <td class="imageCol"><img src="../../asset/vectors/Not Found.svg" alt="Article Image" id="img3" class="articleImg"></td>
                            <td class="titleCol"><h4 id="title3">Details Not Found!</h4></td>
                            <td id="date3" class="dateCo3">~</td>
                        </tr>

                        <!-- 4th article -->
                        <tr>
                            <td id="view4" class="viewsCol">~</td>
                            <td class="imageCol"><img src="../../asset/vectors/Not Found.svg" alt="Article Image" id="img4" class="articleImg"></td>
                            <td class="titleCol"><h4 id="title4">Details Not Found!</h4></td>
                            <td id="date4" class="dateCol">~</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Right Tally -->
            <div id="dashChild2">
                <!-- All blogs count -->
                <div class="tallyDiv" id="allTally">
                    <i class="fa-solid fa-earth-americas icons"></i>

                    <!-- Total -->
                    <div>
                        <h2 id="totalCnt">~</h2>
                        <p>Total Articles</p>
                    </div>
                </div>

                <!-- Image -->
                <img src="../../asset/images/Finance.jpg" id="financeImage" alt="Finance Image">
                
                <!-- Income tax -->
                <div class="tallyDiv" id="incomeTally">
                    <i class="fa-solid fa-sack-dollar icons"></i>

                    <div>
                        <h2 id="incomeCnt">~</h2>
                        <p>Income Tax Act Articles</p>
                    </div>
                </div>

                <!-- GST -->
                <div class="tallyDiv" id="gstTally">
                    <i class="fa-solid fa-coins icons"></i>

                    <div>
                        <h2 id="gstCnt">~</h2>
                        <p>GST Act Articles</p>
                    </div>
                </div>

                <!-- Custom -->
                <div class="tallyDiv" id="customeTally">
                    <i class="fa-solid fa-landmark icons"></i>

                    <div>
                        <h2 id="customsCnt">~</h2>
                        <p>Customs Act Articles</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>
</body>
</html>