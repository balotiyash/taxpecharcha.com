/** 
 * File: admin/controller/todoScript.js
 * Author: Yash Balotiya
 * Description: // TODO
 * Created on: 03 June 2024
 * Last Modified: 17 June 2024
*/

// This is the script for the advanced text editor on the todo page
const editorWidth = $(window).width() * 0.75; // 80% of the window width
const editorHeight = $(window).height() * 0.7; // 60% of the window height

tinymce.init({
    selector: 'textarea#default',
    width: editorWidth,
    height: editorHeight,
    license_key: 'gpl',
    plugins:[
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media', 
        'table', 'emoticons', 'template', 'codesample'
    ],
    toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' + 
    'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
    'forecolor backcolor emoticons',
    menu: {
        favs: {title: 'menu', items: 'code visualaid | searchreplace | emoticons'}
    },
    menubar: 'favs file edit view insert format tools table',
    content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}'
});

$(document).ready(() => {
    
    // To fetch todo data onload
    function fetchTodoData() {
        $.ajax({
            type: "POST",
            url: "../server/todoServer.php",
            data: {task: "fetchTodoData"},
            dataType: "json",
            success: function (response) {
                if (response.todoData) {
                    $("#default").val(response.todoData);
                } else if (response.error) {
                    showToast("#error-msg", "Error: " + response.error);
                } else if (response.message) {
                    showToast("#info-msg", response.message);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    }

    fetchTodoData();

    // To handle click event of save button
    $("#todoSaveBtn").on("click", (e) => {
        e.preventDefault();

        const todoData = tinymce.get("default").getContent();

        $.ajax({
            type: "POST",
            url: "../server/todoServer.php",
            data: {
                task: "setTodoData",
                todoData: todoData
            },
            dataType: "json",
            success: function (response) {
                if (response.status == "data inserted") {
                    showToast("#success-msg", "Your TODO list is updated.");
                } else if ((response.status == "data insertion failed") || response.error) {
                    showToast("#error-msg", "Error: " + response.error);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    })
});