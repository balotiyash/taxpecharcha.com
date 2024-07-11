<!-- 
    File: user/view/blogs.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of all articles to be displayed and viewed by the users 2nd tab.
    Created on: 11 July 2024
    Last Modified: 11 July 2024
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
    <link rel="stylesheet" href="../style/blogsStyle.css">
</head>

<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.php" ?>
    </header>

    <!-- Main content area -->
    <main>
        <section id="searchBarSec">
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
        </section>

        <!-- Info / Main Section -->
        <section>
            <p id="infoTxt">Search or Select the Category</p>
        </section>

        <!-- Category Section -->
        <section id="categorySec">
            <div>
                <img src="../../asset/images/IncomeTax.jpg" alt="Income Tax">
                <big><b>The Income Tax Act, 1961</b></big>
            </div>

            <div>
                <img src="../../asset/images/GST.png" alt="GST">
                <big><b>The GST Act, 2017</b></big>
            </div>

            <div>
                <img src="../../asset/images/Customs.png" alt="Customs Act" id="customImg">
                <big><b>The Customs Act, 1962</b></big>
            </div>
            </section>

        <section>
            <a href="https://wa.me/919833591469" target="_blank"><img src="../../asset/images/WhatsappLogo.png" alt="Whatsapp" id="whatsappLogo"></a>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <?php include "../../shared/view/footer.html" ?>
    </footer>

    <!-- Scripts -->
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/blogsScript.js"></script>
</body>

</html>