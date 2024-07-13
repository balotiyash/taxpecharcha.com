<!-- 
    File: user/view/allBlogs.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of income tax act blogs all.
    Created on: 13 July 2024
    Last Modified: 13 July 2024
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

    <!-- TODO Tab Data -->
    <title>Taxpecharcha</title>
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
    </main>

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/allBlogsScript.js"></script>
</body>

</html>