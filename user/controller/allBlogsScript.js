/** 
 * File: admin/controller/allBlogsScript.js
 * Author: Yash Balotiya
 * Description: This page contains all the JS AJAX code of the all articles page to interact with the server.
 * Created on: 13 July 2024
 * Last Modified: 14 July 2024
*/

// Executes on load successfully
$(document).ready(() => {

    let currentPage = 1;
    let loading = false; // Flag to prevent multiple simultaneous requests
    let flag = false;

    // Function to load data
    const loadData = (page) => {
        const task = getTaskFromURL();
        const articleNo = getArticleFromURL();
        const searchText = articleNo ? articleNo : null;

        // If already loading, do not send another request
        if (loading) return;
        loading = true; // Set loading to true

        $.ajax({
            type: "POST",
            url: "../server/allBlogsServer.php",
            data: {
                task: task,
                pageNo: page,
                searchText: searchText
            },
            dataType: "json",
            success: (response) => {
                if (response.success) {
                    $("#notFoundDiv").css("display", "none");
                    $("#loadMoreBtn").css("display", "block");

                    // Display titles based on task
                    if (task === "allIncomeTax" || task === "incomeTaxAct" || task === "incomeTaxCircular") {
                        $("#incomeTitle").css("display", "block");

                    } else if (task === "allGst" || task === "gstAct" || task === "gstCircular") {
                        $("#gstTitle").css("display", "block");

                    } else if (task === "allCustoms" || task === "customsAct" || task === "customsCircular") {
                        $("#customsTitle").css("display", "block");
                    }

                    // Append fetched data to main section
                    $("#mainSection").append(response.success);
                    $(".loadMoreBtn").attr("data-id", response.lastId);
                    
                    loading = false; // Reset loading flag
                    flag = true;

                } else if (response.error) {
                    alert(`Error: ${response.error}`);
                    loading = false; // Reset loading flag

                } else if (response.message) {
                    // Display no more articles message
                    if (flag) {
                        $(".loadMoreBtn").html("All Articles Fetched").prop('disabled', true); // Disable button
                        $(".loadMoreBtn").css("backgroundColor", "green"); // Example UI update

                    } else {
                        $("#notFoundDiv").css("display", "block");
                    }

                    loading = false; // Reset loading flag
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
                loading = false; // Reset loading flag on error
            }
        });
    }

    // Initial data load
    loadData(currentPage);

    // Click event for "Load More" button
    $("#loadMoreBtn").on("click", function() {
        currentPage += 1;
        loadData(currentPage); // Load next page of data
    });
});

// Function to fetch task from URL
function getTaskFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('task');
}

// Function to fetch article number from URL
function getArticleFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('article');
}