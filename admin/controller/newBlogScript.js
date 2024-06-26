/** 
 * File: admin/controller/newBlogScript.js
 * Author: Yash Balotiya
 * Description: This file contains all the js and ajax code to create new blog and to interact with the server.
 * Created on: 03 June 2024
 * Last Modified: 26 June 2024
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

// This function invokes on load
$(document).ready(() => {

    // To send data to the server /db
    $("#blogSubmit").on("click", (e) => {
        e.preventDefault();

        const title = $("#titleTxt").val();
        const mainCategory = $("#mainCatOption").val();
        const subCategory = $('input[name="subCategory"]:checked').val();
        const articleNo = $("#articleNoTxt").val().trim();
        const keywords = $("#keywordsTxt").val().trim();
        const blogImage = $("#blogImgInput")[0].files[0];
        const content = tinymce.get("default").getContent();

        if (title === '' || mainCategory === '' || subCategory === '' || articleNo === '' || keywords === '' || blogImage === '' || content === '') {
            showToast("#info-msg", `${infoSymbol} All fields are mandatory to fill!`);
            return;
        }

        if (confirm("You are about to publish this blog. Are you sure you want to upload it?")) {
            const formData = new FormData();
            formData.append('task', 'uploadNewBlog');
            formData.append('title', title);
            formData.append('mainCategory', mainCategory);
            formData.append('subCategory', subCategory);
            formData.append('articleNo', articleNo);
            formData.append('keywords', keywords);
            formData.append('blogImage', blogImage);
            formData.append('content', content);

            $.ajax({
                type: "POST",
                url: "../server/newBlogServer.php",
                data: formData,
                contentType: false, // Prevent jQuery from setting the Content-Type header
                processData: false, // Prevent jQuery from processing the data
                dataType: "json",
                success: function (response) {
                    if (response.error) {
                        showToast("#error-msg", `${errorSymbol} ${response.error}`);
                    } else {
                        showToast("#success-msg", `${successSymbol} Blog uploaded successfully!`);
                    }
                },
                error: (xhr, status, error) => {
                    showToast("#error-msg", `${errorSymbol} An article already exists with same title!`);

                    console.error(xhr);
                    console.error(status);
                    console.error(error);
                }
            });
        }
    });
});