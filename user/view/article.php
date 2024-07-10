<!-- 
    File: user/view/article.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of actual article page to be displayed and viewed by the users.
    Created on: 10 July 2024
    Last Modified: 10 July 2024
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
    <link rel="stylesheet" href="../style/articleStyle.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>

    <!-- Main content area -->
    <main>
        <article>
            <h1 id="articleTitle">Article Not Found!!</h1>
            <img src="../../asset/vectors/Not Found.svg" alt="Article Image" id="articleImg">
            <ul id="blogDetails">
                <li id="mainCatLi"></li>
                <li id="subCatLi"></li>
                <li id="secNoLi"></li>
            </ul>
            <div id="articleContent"></div>
            <div id="blogWriterDetails">
                <p><b>Article Written By: </b>Manish Suvasiya</p>
                <p><b>Views: </b><span id="viewsCount"></span></p>
                <p><b>Published On: </b><span id="datePublish"></span></p>
            </div>
        </article>
    </main>

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/articleScript.js"></script>
</body>

</html>