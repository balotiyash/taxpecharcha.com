/** 
 * File: admin/controller/articleScript.js
 * Author: Yash Balotiya
 * Description: This page contains all the js ajax code of the article page to interact with the server.
 * Created on: 10 July 2024
 * Last Modified: 21 July 2024
*/

// Runs when doc is loaded successfully
$(document).ready(() => {

    // function to load data on load of the home page
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
            success: (response) => {
                if (response.success) {
                    let content = response.success["content"];

                    $("#articleTitle").html(response.success["title"]);

                    const articleImage = response.success["image"];

                    if (articleImage === "../../asset/vectors/DefaultBlogImage.svg") {
                        $("#articleImg").css("display", "none");

                    } else {
                        $("#articleImg").attr("src", response.success["image"]);
                    }

                    $("#blogDetails").css("display", "block");
                    $("#mainCatLi").html(`<b>Main Category:</b> ${response.success["main_category"]}.`);
                    $("#subCatLi").html(`<b>Sub Category:</b> ${response.success["sub_category"]}.`);
                    $("#secNoLi").html(`<b>Section No.:</b> ${response.success["section"]}.`);

                    $("#articleContent").html(content);

                    $("#viewsCount").html(response.success["views"]);
                    $("#datePublish").html(response.success["date"]);

                    // META TAGS
                    // Update the meta description content
                    $("#metaDescription").attr("content", content.substr(0, 100) + '...');

                    // Update the title element content
                    $("#metaTitle").text(response.success["title"]);

                } else if (response.error) {
                    alert(`Error: ${response.error}`);
                    $("#blogWriterDetails").css("display", "none");

                } else if (response.message) {
                    // alert(response.message);
                    $("#blogWriterDetails").css("display", "none");
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    };

    loadArticle();
});

// Function to fetch slug from url
function getSlugFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('slug');
}
