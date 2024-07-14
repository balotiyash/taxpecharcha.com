/** 
 * File: admin/controller/dashboard.js
 * Author: Yash Balotiya
 * Description: This page contains all the js ajax code of the dashboard page to interact with the server.
 * Created on: 02 June 2024
 * Last Modified: 14 July 2024
*/

// This is executed on load successfully
$(document).ready(() => {

    // Function to load all the counts displayed on the dashboard all, gst, incometax, customs
    const fetchBlogsCount = () => {
        $.ajax({
            type: "POST",
            url: "../server/dashboardServer.php",
            data: { task: "fetchBlogsCount" },
            dataType: "json",
            success: (response) => {
                if (response.success) {
                    $("#totalCnt").html(response.total);
                    $("#incomeCnt").html(response.income);
                    $("#gstCnt").html(response.gst);
                    $("#customsCnt").html(response.customs);

                } else if (response.message) {
                    showToast("#info-msg", `${infoSymbol} ${response.message}`);
                    
                } else if (response.error) {
                    showToast("#info-msg", `${errorSymbol} ${response.error}`);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    }
    fetchBlogsCount();

    // Function to load top 4 articles by view
    const fetchTopArticles = () => {
        $.ajax({
            type: "POST",
            url: "../server/dashboardServer.php",
            data: { task: "fetchTopArticles" },
            dataType: "json",
            success: (response) => {
                if (response.success) {
                    const topArticlesHtmlIds = [
                        ["view1", "img1", "title1", "date1"],
                        ["view2", "img2", "title2", "date2"],
                        ["view3", "img3", "title3", "date3"],
                        ["view4", "img4", "title4", "date4"]
                    ];

                    for (i in topArticlesHtmlIds) {
                        $(`#${topArticlesHtmlIds[i][0]}`).html(response[i]["views"]);
                        $(`#${topArticlesHtmlIds[i][1]}`).attr("src", response[i]["image"]);
                        $(`#${topArticlesHtmlIds[i][2]}`).html(response[i]["title"]);
                        $(`#${topArticlesHtmlIds[i][3]}`).html(response[i]["date"].substr(0, 10));
                    }
                } else if (response.message) {
                    showToast("#info-msg", `${infoSymbol} ${response.message}`);
                    
                } else if (response.error) {
                    showToast("#info-msg", `${errorSymbol} ${response.error}`);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    }
    fetchTopArticles();

    // Function to navigate to new blogs page
    $("#newPostBtn").on("click", (e) => {
        window.location.href = '../view/newBlog.php';
    });
});