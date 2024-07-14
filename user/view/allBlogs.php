<!-- 
    File: user/view/allBlogs.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of income tax act blogs all.
    Created on: 13 July 2024
    Last Modified: 14 July 2024
-->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Browse all articles on Taxpecharcha, covering topics related to Income Tax, GST, and Customs.">

    <meta name="keywords" content="Manish Suvasia, Yash Balotiya, Income Tax Articles, GST Articles, Customs Act Articles, Tax Blogs, Financial Freedom, Tax Savings, Professional Articles, Taxation Information, Tax Law, Tax Notifications, Income Tax Act 1961, GST Act 2017, Customs Act 1962, Tax Circulars, Tax Notifications, Financial Planning, Tax Consultancy, Tax Advice, Indian Tax Law, Tax Compliance, Tax Updates, GST Compliance, Income Tax Compliance, Custom Duties, Tax News, Financial Articles, Tax Expert, Tax Solutions, Tax Management, Wealth Management, Tax Strategies, Personal Finance, Corporate Tax, Indirect Tax, Direct Tax, Accounting, Audit, Tax Filing, Tax Refund, Tax Regulations, Taxpayer Resources, Tax Policy, Tax Amendments, Tax, Income, GST, Act, Notification, Circular, Yash Balotiya">

    <meta name="author" content="Yash Balotiya">
    <meta name="application-name" content="taxpecharcha">

    <!-- Tab Data -->
    <title>Taxpecharcha - Expert Insights on Tax Laws and Regulations</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Styles for navbar -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Footer Style -->
    <link rel="stylesheet" href="../../shared/style/footer.css">

    <!-- Fonts awesome is included in navbar -->

    <!-- Main Style -->
    <link rel="stylesheet" href="../style/allBlogsStyle.css">

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/allBlogsScript.js"></script>
</head>

<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>

    <!-- Main content area -->
    <main>
        <!-- Title Section -->
        <section>
            <div class="title">
                <h2 id="incomeTitle">The Income-tax Acts, 1961</h2>
                <h2 id="gstTitle">The GST Acts, 2017</h2>
                <h2 id="customsTitle">The Customs Acts, 1962</h2>
            </div>
        </section>
        
        <!-- No Data Found Section -->
        <section id="notFoundDiv">
            <img src="../../asset/vectors/Not Found.svg" alt="Data not found!!" id="notFoundImg">
            <p><b>Data Not Found!!</b></p>
        </section>

        <!-- Main Data Section -->
        <section id="mainSection"></section>

        <!-- Load more btn -->
        <section>
            <button id="loadMoreBtn" class="loadMoreBtn">Load More</button>
        </section>

        <!-- Whatsapp Logo -->
        <section>
            <a href="https://wa.me/919833591469" target="_blank"><img src="../../asset/images/WhatsappLogo.png" alt="Whatsapp" id="whatsappLogo"></a>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>
</body>

</html>