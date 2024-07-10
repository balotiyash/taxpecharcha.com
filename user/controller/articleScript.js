/** 
 * File: admin/controller/dashboard.js
 * Author: Yash Balotiya
 * Description: This page contains all the js ajax code of the article page to interact with the server.
 * Created on: 10 July 2024
 * Last Modified: 10 July 2024
*/

// Runs when doc is loaded successfully
$(document).ready(() => {
    const loadArticle = () => {
        const slug = getSlugFromURL(); // Assuming this function extracts the slug from the URL

        $.ajax({
            type: "POST",
            url: "../server/articlePageServer.php",
            data: {
                task: "fetchArticle",
                slug: slug
            },
            dataType: "json",
            success: function (response) {
                if (response.success) {
                    $("#articleTitle").html(response.success["title"]);
                    $("#articleImg").attr("src", response.success["image"]);

                    $("#blogDetails").css("display", "block");
                    $("#mainCatLi").html(`<b>Main Category:</b> ${response.success["main_category"]}.`);
                    $("#subCatLi").html(`<b>Sub Category:</b> ${response.success["sub_category"]}.`);
                    $("#secNoLi").html(`<b>Section No.:</b> ${response.success["section"]}.`);

                    $("#articleContent").html(response.success["content"]);

                    $("#viewsCount").html(response.success["views"]);
                    $("#datePublish").html(response.success["date"]);
                    
                } else if (response.error) {
                    showToast("#error-msg", `${successSymbol} Error: ${response.error}`);
                } else if (response.message) {
                    showToast("#info-msg", `${infoSymbol} ${response.message}`);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    };

    loadArticle();
});

function getSlugFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('slug');
}
