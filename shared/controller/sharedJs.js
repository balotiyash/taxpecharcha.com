/** 
 * File: shared/controller/sharedJs.js
 * Author: Yash Balotiya
 * Description: This page contains all the js code which is shared throughout the application.
 * Created on: 17 June 2024
 * Last Modified: 21 January 2025
*/

// Drop down function for navbar
// document.addEventListener('DOMContentLoaded', function () {
//     var dropdowns = document.querySelectorAll('.dropdown-toggle');

//     dropdowns.forEach(function (dropdown) {
//         dropdown.addEventListener('click', function (event) {
//             event.preventDefault();
//             var menu = this.nextElementSibling;
//             menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
//         });
//     });

//     window.addEventListener('click', function (event) {
//         if (!event.target.matches('.dropdown-toggle')) {
//             var dropdowns = document.querySelectorAll('.dropdown-menu');
//             dropdowns.forEach(function (menu) {
//                 menu.style.display = 'none';
//             });
//         }
//     });
// });

// Fonts awesome symbols
const errorSymbol = '<i class="fa-solid fa-circle-exclamation"></i>';
const successSymbol = '<i class="fa-solid fa-circle-check"></i>';
const infoSymbol = '<i class="fa-solid fa-circle-info"></i>';

// Function to display custom toast message
const showToast = (target, message, duration = 5000) => {
    $(target).html(message).slideDown();

    setTimeout(function() {
        $(target).slideUp();
    }, duration);
}

// Function to display error in the ajax method
const showError = (xhr, status, error) => {
    console.error("XHR response:", xhr.responseText);
    console.error("Status:", status);
    console.error("Error:", error);
    showToast("#error-msg", `${errorSymbol} Error: An unexpected error occurred.`);
}

$(document).ready(() => {
    $("#logoutBtn").on("click", () => {
        if (confirm("Confirm Logout!")) {
            $.ajax({
                type: "POST",
                url: "../../admin/server/dashboardServer.php",
                data: { task: "logout" },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        window.location.href = "https://www.taxpecharcha.com/";
                    }
                }
            });
        }
    });
});

// Function to open homepage onclick of logo on the navbar
function openTaxpecharcha() {
    window.open("https://www.taxpecharcha.com/", "_self");
}

// Function to open Yash Balotiya's Profile
function openYashProfile() {  
    window.open("https://balotiyash.github.io/Personal-Portfolio/")
}

// Function to open Blogs Page
function navigateToArticles() {
    window.location.href = "user/view/blogs.php";
}

// Function to handle Responsive screen Navbar
function showSidebar() {
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'flex'
}

function hideSidebar() {
    const sidebar = document.querySelector('.sidebar')
    sidebar.style.display = 'none'
}