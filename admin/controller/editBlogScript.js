/** 
 * File: admin/controller/editBlogScript.js
 * Author: Yash Balotiya
 * Description: This file contains all the js and ajax code to edit existing blog and to interact with the server.
 * Created on: 30 June 2024
 * Last Modified: 11 July 2024
*/

// This is the script for the advanced text editor on the todo page
const editorWidth = $(window).width() * 0.5;
const editorHeight = $(window).height() * 0.79;

// This is the script for the advanced text editor on the create new blog page
tinymce.init({
    selector: 'textarea#default',
    width: editorWidth, //750
    height: editorHeight, //500
    license_key: 'gpl',
    plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
        'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
        'forecolor backcolor emoticons',
    menu: {
        favs: { title: 'menu', items: 'code visualaid | searchreplace | emoticons' }
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
});

// to fetch id from url GET method
const urlParams = new URLSearchParams(window.location.search);

// On load function
$(document).ready(() => {

    // Function to load blog data to be edited on load
    const loadBlogData = () => {
        $.ajax({
            type: "GET",
            url: "../server/editBlogServer.php",
            data: {
                task: "fetchBlogDetails",
                id: urlParams.get('id')
            },
            dataType: "json",
            success: function (response) {
                if (response.error) {
                    showToast("#error-msg", `${errorSymbol} ${response.error}`);
                    
                } else if (response.message) {
                    showToast("#info-msg", `${infoSymbol} ${response.message}`);

                } else {
                    $("#titleTxt").val(response.title);
                    $("#mainCatOption").val(response.mainCategory);

                    if (response.subCategory === "Act") {
                        $("#actRadio").prop("checked", true);
                    } else if (response.subCategory === "Circular / Notification") {
                        $("#circularRadio").prop("checked", true);
                    }
                    $("#articleNoTxt").val(response.section);
                    $("#keywordsTxt").val(response.keywords);
                    $("#default").val(response.content);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    }
    loadBlogData();

    // Function to save edit into database
    $("#blogSubmit").on("click", (e) => {
        e.preventDefault();

        const title = $("#titleTxt").val();
        const mainCategory = $("#mainCatOption").val();
        const subCategory = $('input[name="subCategory"]:checked').val();
        const articleNo = $("#articleNoTxt").val().trim();
        const keywords = $("#keywordsTxt").val().trim();
        const blogImage = $("#blogImgInput")[0].files[0];
        const content = tinymce.get("default").getContent();

        if (title === '' || mainCategory === '' || subCategory === '' || articleNo === '' || keywords === '' || content === '') {
            showToast("#info-msg", `${infoSymbol} All fields are mandatory to fill!`);
            return;
        }

        if (confirm("Are you sure you want to update this article? This action is irreversible.")) {
            const formData = new FormData();
            formData.append('title', title);
            formData.append('mainCategory', mainCategory);
            formData.append('subCategory', subCategory);
            formData.append('articleNo', articleNo);
            formData.append('keywords', keywords);
            formData.append('content', content);
            formData.append('id', urlParams.get('id'));

            let task = null;

            if (blogImage === undefined) {
                task = "updateWithoutImage";
            } else {
                formData.append('blogImage', blogImage);
                task = "updateWithImage";
            }

            formData.append('task', task);

            $.ajax({
                type: "POST",
                url: "../server/createOrEditBlogServer.php",
                data: formData,
                contentType: false, // Prevent jQuery from setting the Content-Type header
                processData: false, // Prevent jQuery from processing the data
                dataType: "json",
                success: function (response) {
                    if (response.error) {
                        showToast("#error-msg", `${errorSymbol} ${response.error}`);
                    } else {
                        showToast("#success-msg", `${successSymbol} Article updated successfully! Redirecting to 'My Articles' page in 5 seconds.`);

                        setTimeout(() => {
                            window.location.href = "../view/myBlogs.php";
                        }, 5000);
                    }
                },
                error: (xhr, status, error) => {
                    showToast("#error-msg", `${errorSymbol} An article already exists with same title!`);
                    showError(xhr, status, error);
                }
            });
        }
    });
});