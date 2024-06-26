<!-- 
    File: admin/view/newBlog.php
    Author: Yash Balotiya
    Description: This file contains all the HTML5 code of the create new blog page in dashboard.
    Created on: 02 June 2024
    Last Modified: 25 June 2024
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
    <title>Taxpecharcha - New Blog</title>
    <link rel="icon" type="image/x-icon" href="../../asset/vectors/Rupees.svg">

    <!-- Stylesheets -->
    <!-- Navbar style -->
    <link rel="stylesheet" href="../../shared/style/navBarStyle.css">
    <link rel="stylesheet" href="../../shared/style/buttonStyle1.css">
    
    <!-- Fonts awesome included in navbar -->

    <!-- Left nav buttons style -->
    <link rel="stylesheet" href="../../shared/style/dashboardNavBtn.css">

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="../style/newBlogStyle.css">
    <link rel="stylesheet" href="../../shared/style/toastMsgStyle.css">

</head>
<body>
    <!-- Navbar -->
    <header>
        <?php include "../../shared/view/navBar.html" ?>
    </header>

    <!-- Main content area -->
    <main id="mainDiv">
        <!-- Left nav buttons -->
        <?php include "../../shared/view/dashboardNavigation.html" ?>

        <!-- Actual data info -->
        <form id="dashContent">
            <!-- Info -->
            <div id="blogData">
                <h2>Create New Blog</h2>
                <div id="horizontalLine"></div>
                
                <!-- title of the blog -->
                <div>
                    <label for="titleTxt"><b>Title</b><span class="note">*</span></label><br>
                    <input type="text" id="titleTxt" required autocomplete="off">
                </div>

                <!-- main category of the blog -->
                <div>
                    <label for="mainCatOption"><b>Select Category</b><span class="note">*</span></label><br>
                    <select id="mainCatOption" required>
                        <option value="" selected disabled>Select Main Category</option>
                        <option value="The Income Tax Act, 1961">The Income Tax Act, 1961</option>
                        <option value="The GST Act, 2017">The GST Act, 2017</option>
                        <option value="The Customs Act, 1962">The Customs Act, 1962</option>
                    </select>
                </div>
                
                <!-- sub category of the blog -->
                <div class="subCatRadioDiv">
                    <label for="subCatRadioChild"><b>Select Sub-Category</b><span class="note">*</span></label><br>
                    <div id="subCatRadioChild">
                        <div>
                            <input type="radio" name="subCategory" id="actRadio" value="Act" required>
                            <label for="actRadio">Act</label>
                        </div>
    
                        <div>
                            <input type="radio" name="subCategory" id="circularRadio" value="Circular / Notification" required>
                            <label for="circularRadio">Circular / Notification</label>
                        </div>
                    </div>
                </div>

                <!-- article no. of the blog -->
                <div>
                    <label for="articleNoTxt"><b>Article / Section No.</b><span class="note">*</span></label><br>
                    <input type="text" id="articleNoTxt" required autocomplete="off">
                </div>

                <!-- keywords of the blog -->
                <div>
                    <label for="keywordsTxt"><b>Keywords</b><span class="note">*</span></label><br>
                    <input type="text" id="keywordsTxt" required autocomplete="off">
                    <p class="note">Note: Seperate each keywords with a comma (,)</p>
                </div>

                <!-- blog image -->
                <div>
                    <label for="blogImgInput"><b>Select Blog Image</b><span class="note">*</span></label><br>
                    <input class="form-control form-control-sm" id="blogImgInput" type="file" accept="image/png, image/gif, image/jpeg, image/jpg, image/svg" required>
                    <p class="note">Note: Choosing Landscape Image is preferred.</p>
                </div>

                <div>
                    <input type="button" id="blogSubmit" class="button-28" value="Upload">
                    <input type="reset" id="blogReset" class="button-28" value="Reset">
                </div>
            </div>

            <!-- Advanced text area -->
            <div id="blogTxtArea">
                <textarea name="textarea" id="default" required autocomplete="off"></textarea>
            </div>
        </form>
    </main>

    <!-- Scripts -->
    <script src="../controller/tinymce/tinymce.min.js"></script>
    <script src="../../shared/controller/jquery-3.7.1.min.js"></script>
    <script src="../../shared/controller/sharedJs.js"></script>
    <script src="../controller/newBlogScript.js"></script>

</body>
</html>