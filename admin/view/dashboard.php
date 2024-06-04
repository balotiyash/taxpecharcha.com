<!-- 
    File: dashboard.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the dashboard page after login.
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
    <title>Taxpecharcha - Dashboard</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardStyle.css">

    <!-- Main stylesheet -->
    <link rel="stylesheet" href="../style/dashWlcmStyle.css">
    <link rel="stylesheet" href="../style/dashTallyStyle.css">

    <!-- Fonts awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body onload="initializeDashboard()">
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.html" ?>
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
                <div id="recentBlogs">
                    <h3>Top Articles</h3>

                    <!-- TODO: php dynamic loop -->
                    <div class="recentChild">
                        <div>
                            <p>01</p>
                            <img src="../../asset/images/DashboardCalc.png" alt="Article Image" class="articleImg">
                            <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius reiciendis delectus voluptatibus.</h4>
                        </div>
                        
                        <p>02-06-2024</p>
                    </div>

                    <div class="recentChild">
                        <div>
                            <p>02</p>
                            <img src="../../asset/images/DashboardCalc.png" alt="Article Image" class="articleImg">
                            <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius reiciendis delectus voluptatibus.</h4>
                        </div>
                        
                        <p>02-06-2024</p>
                    </div>

                    <div class="recentChild">
                        <div>
                            <p>03</p>
                            <img src="../../asset/images/DashboardCalc.png" alt="Article Image" class="articleImg">
                            <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius reiciendis delectus voluptatibus.</h4>
                        </div>
                        
                        <p>02-06-2024</p>
                    </div>

                    <div class="recentChild">
                        <div>
                            <p>04</p>
                            <img src="../../asset/images/DashboardCalc.png" alt="Article Image" class="articleImg">
                            <h4>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eius reiciendis delectus voluptatibus.</h4>
                        </div>
                        
                        <p>02-06-2024</p>
                    </div>
                </div>
            </div>

            <!-- Right Tally -->
            <div id="dashChild2">
                <div class="tallyDiv" id="allTally">
                    <i class="fa-solid fa-earth-americas"></i>

                    <div>
                        <h2>50</h2>
                        <p>Total Blogs</p>
                    </div>
                </div>

                <img src="../../asset/images/Finance.jpg" id="financeImage" alt="Finance Image">
                
                <div class="tallyDiv" id="incomeTally">
                    <i class="fa-solid fa-sack-dollar"></i>

                    <div>
                        <h2>10</h2>
                        <p>Income Tax Act Blogs</p>
                    </div>
                </div>

                <div class="tallyDiv" id="gstTally">
                    <i class="fa-solid fa-coins"></i>

                    <div>
                        <h2>15</h2>
                        <p>GST Act Blogs</p>
                    </div>
                </div>

                <div class="tallyDiv" id="customeTally">
                    <i class="fa-solid fa-landmark"></i>

                    <div>
                        <h2>25</h2>
                        <p>Custome Act Blogs</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Scripts -->
    <script src="../controller/dashboard.js"></script>
</body>
</html>