/** 
 * File: shared/controller/sharedJs.js
 * Author: Yash Balotiya
 * Description: This page contains all the js code which is shared throughout the application.
 * Created on: 17 June 2024
 * Last Modified: 17 June 2024
*/

// This function is used to hide login button and display bashboard button after login
function initializeDashboard() {
    document.getElementById("loginBtn").style.display = "none";
    document.getElementById("dashboardBtn").style.display = "block";
}

// Drop down function for navbar
document.addEventListener('DOMContentLoaded', function () {
    var dropdowns = document.querySelectorAll('.dropdown-toggle');

    dropdowns.forEach(function (dropdown) {
        dropdown.addEventListener('click', function (event) {
            event.preventDefault();
            var menu = this.nextElementSibling;
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        });
    });

    window.addEventListener('click', function (event) {
        if (!event.target.matches('.dropdown-toggle')) {
            var dropdowns = document.querySelectorAll('.dropdown-menu');
            dropdowns.forEach(function (menu) {
                menu.style.display = 'none';
            });
        }
    });
});

// Function to display custom toast message
const showToast = (target, message, duration = 3000) => {
    $(target).html(message).slideDown();

    setTimeout(function() {
        $(target).slideUp();
    }, duration);
}

// Function to display in the ajax method
const showError = (xhr, status, error) => {
    console.error("XHR response:", xhr.responseText);
    console.error("Status:", status);
    console.error("Error:", error);
    showToast("#error-msg", "An unexpected error occurred.");
}