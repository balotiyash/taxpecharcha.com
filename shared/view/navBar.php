<!-- 
    File: shared/view/navBar.php
    Author: Yash Balotiya
    Description: This file contains the HTML5 code of navigation bar.
    Created on: 24 May 2024
    Last Modified: 08 July 2024
-->

<!-- FontsAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Navigation Panel -->
<nav id="navBar">
    <!-- Logo -->
    <div id="navBarChild1">
        <img src="../../asset/vectors/Rupees.svg" alt="Rupees" id="rsLogo">
        <img src="../../asset/images/Slogan.png" alt="Taxpecharcha" id="logo" onclick="openTaxpecharcha()">
    </div>

    <!-- Links -->
    <div id="navBtns">
        <ul id="navList">
            <li><a href="https://www.taxpecharcha.com/" id="homeLink">Home</a></li>
            <li><a href="#">Articles</a></li>
            <li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" aria-expanded="false">
                        Services <i class="fa-solid fa-caret-down"></i>
                    </a>

                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="https://wa.me/919833591469" target="_blank">Income Tax</a></li>
                        <li><a class="dropdown-item" href="https://wa.me/919833591469" target="_blank">GST</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="../../user/view/profile.php" id="aboutLink">About</a></li>
        </ul>

        <!-- login -->
        <!-- Session handling for login or dashboard button on the navbar -->
        <?php
        if (isset($_SESSION["isAdminLoggedin"])) {
        ?>
            <button class="button-28" id="dashboardBtn" onclick="window.location.href = '../../admin/view/dashboard.php'">Dashboard</button>
        <?php
        } else {
        ?>
            <button class="button-28" id="loginBtn" onclick="window.location.href = '../../admin/view/login.php'">Login</button>
        <?php
        }
        ?>

    </div>
</nav>