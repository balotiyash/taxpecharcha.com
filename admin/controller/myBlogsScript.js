/**
 * File: admin/controller/myBlogsScript.js
 * Author: Yash Balotiya
 * Description: This file contains all the js and ajax code to deal with the server of the my blogs page to fetch existing blog.
 * Created on: 28 June 2024
 * Last Modified: 30 June 2024
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
        const mainCategory = $("#mainCatOption").val();
        currentPage = 1;
        fetchViaCategory(mainCategory, "Act", null, currentPage, itemsPerPage);
    });

    // Function to handle onclick event of the CIRCULAR NOTIFICATION radio button to fetch the respective details
    $("#circularRadio").on("click", (e) => {
        const mainCategory = $("#mainCatOption").val();
        currentPage = 1;
        fetchViaCategory(mainCategory, "Circular / Notification", null, currentPage, itemsPerPage);
    });

    // Function to fetch blogs using search text
    $("#searchIcon").on("click", (e) => {
        currentPage = 1;
        fetchViaText(currentPage, itemsPerPage);
    });

    // Function to actually fetch the details using ajax from database PHP
    const fetchViaCategory = (mainCategory, subCategory, searchText, currentPage, itemsPerPage) => {
        if (mainCategory === '' || mainCategory === null) {
            showToast("#info-msg", `${infoSymbol} Main Category is Mandatory to be selected!`);
            $('input[name="subCategory"]').prop('checked', false);
            return;
        }

        ajaxServerHandler("fetchBlogs", mainCategory, subCategory, searchText, currentPage, itemsPerPage);
    };

    // Function to fetch blogs using search input text
    const fetchViaText = (currentPage, itemsPerPage) => {
        const searchText = $("#searchInput").val();
        if (searchText === '') {
            showToast("#info-msg", `${infoSymbol} Search field cannot be empty!`);
            return;
        }

        ajaxServerHandler("fetchBySearch", null, null, searchText, currentPage, itemsPerPage);
    };

    // Ajax event handler for dynamic inputs, for all search via radio or text
    const ajaxServerHandler = (task, mainCategory, subCategory, searchText, currentPage, itemsPerPage) => {
        $.ajax({
            type: "POST",
            url: "../server/myBlogsServer.php",
            data: {
                task: task,
                mainCategory: mainCategory,
                subCategory: subCategory,
                searchText: searchText,
                page: currentPage,
                itemsPerPage: itemsPerPage
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#searchResultDiv").html(response.data);
                    $("#noResultDiv").css("display", "none");
                    $("#searchResultDiv").css("display", "block");

                    bindPaginationButtons(task, mainCategory, subCategory, searchText, itemsPerPage);
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
    const bindPaginationButtons = (task, mainCategory, subCategory, searchText, itemsPerPage) => {
        // Back button
        $(".prevBtn").off("click").on("click", (e) => {
            if (currentPage > 1) {
                currentPage--;
                if (task === "fetchBlogs") {
                    fetchViaCategory(mainCategory, subCategory, searchText, currentPage, itemsPerPage);
                } else {
                    fetchViaText(currentPage, itemsPerPage);
                }
            }
        });

        // Next button
        $(".nextBtn").off("click").on("click", (e) => {
            currentPage++;
            if (task === "fetchBlogs") {
                fetchViaCategory(mainCategory, subCategory, searchText, currentPage, itemsPerPage);
            } else {
                fetchViaText(currentPage, itemsPerPage);
            }
        });
    };
});