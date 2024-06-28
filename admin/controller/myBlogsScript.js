/**
 * File: admin/controller/myBlogsScript.js
 * Author: Yash Balotiya
 * Description: This file contains all the js and ajax code to deal with the server of the my blogs page to fetch existing blog.
 * Created on: 28 June 2024
 * Last Modified: 28 June 2024
 */

// This function invokes on load of the page
$(document).ready(() => {

    // For pagination
    const itemsPerPage = 10;
    let currentPage = 1;

    // Function to handle change event of the main category list
    $("#mainCatOption").change((e) => {
        $('input[name="subCategory"]').prop('checked', false);
        $("#noResultDiv").css("display", "flex");
        $("#searchResultDiv").css("display", "none");
    });

    // Function to handle onclick event of the act radio button to fetch the respective details
    $("#actRadio").on("click", (e) => {
        currentPage = 1;
        fetchViaCategory("Act");
    });

    // Function to handle onclick event of the CIRCULAR NOTIFICATION radio button to fetch the respective details
    $("#circularRadio").on("click", (e) => {
        currentPage = 1;
        fetchViaCategory("Circular / Notification");
    });

    // Function to actually fetch the details using ajax from database PHP
    const fetchViaCategory = (subCategory) => {
        const mainCategory = $("#mainCatOption").val();

        if (mainCategory === '' || mainCategory === null) {
            showToast("#info-msg", `${infoSymbol} Main Category is Mandatory to be selected!`);
            $('input[name="subCategory"]').prop('checked', false);
            return;
        }

        $.ajax({
            type: "POST",
            url: "../server/myBlogsServer.php",
            data: {
                task: "fetchBlogs",
                mainCategory: mainCategory,
                subCategory: subCategory,
                page: currentPage,
                itemsPerPage: itemsPerPage
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#searchResultDiv").html(response.data);
                    $("#noResultDiv").css("display", "none");
                    $("#searchResultDiv").css("display", "block");

                    // Bind pagination buttons
                    bindPaginationButtons(subCategory);
                } else {
                    $("#noResultDiv").css("display", "flex");
                    $("#searchResultDiv").css("display", "none");
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    };

    // Function to handle pagination click events
    const bindPaginationButtons = (subCategory) => {
        // Back button
        $(".prevBtn").on("click", (e) => {
            if (currentPage > 1) {
                currentPage--;
                fetchViaCategory(subCategory);
            }
        });

        // Next button
        $(".nextBtn").on("click", (e) => {
            currentPage++;
            fetchViaCategory(subCategory);
        });
    };
});
