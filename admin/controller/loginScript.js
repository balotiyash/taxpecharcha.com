/** 
 * File: admin/controller/loginScript.js
 * Author: Yash Balotiya
 * Description: This page contains all the js ajax code to validate, authenticate the admin and interact with the server side code of the login page.
 * Created on: 20 June 2024
 * Last Modified: 26 June 2024
*/

$(document).ready(() => {

    // Show password checkbox
    let isPasswordVisible = false;

    $("#showPassCbk").on("click", () => {
        const passwordInput = $("#passTxt");
        isPasswordVisible = !isPasswordVisible;

        if (isPasswordVisible) {
            passwordInput.attr('type', 'text'); 
        } else {
            passwordInput.attr('type', 'password'); 
        }
    });

    // Authentication Login Page
    $("#submitBtn").on("click", (e) => {
        e.preventDefault();

        const username = $("#unameTxt").val().trim().toLowerCase();
        const password = $("#passTxt").val().trim();

        if (username === '' || password === '') {
            showToast("#info-msg", `${infoSymbol} Please fill in the complete details.`);
            return;
        }

        $.ajax({
            type: "POST",
            url: "../server/loginServer.php",
            data: {
                task: "validateLogin",
                username: username,
                password: password
            },
            dataType: "json",
            success: (response) => {
                if (response.status == "User Authenticated Successfully") {
                    $("#loginForm").trigger("reset");
                    window.location.href = "../view/dashboard.php";

                } else if (response.message) {
                    showToast("#info-msg", `${infoSymbol} ${response.message}`);

                } else if (response.error) {
                    showToast("#error-msg", `${errorSymbol} Error: ${response.error}`);

                } else {
                    showToast("#info-msg", `${infoSymbol} No message (response) to display.`);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    });

    // Reset password / Forget Password
    $("#resetPassBtn").on("click", (e) => {
        e.preventDefault();

        const username = $("#emailTxt").val().trim().toLowerCase();
        const newPassword = $("#newPassTxt").val().trim();
        const confirmPassword = $("#confirmPassTxt").val().trim();
        const dob = $("#dobInput").val();
        const securityQuestion = $("#securityQuestion").val();
        const securityAnswer = $("#securityAnswer").val().trim().toLowerCase();
        const confirmReview = $("#review:checked");

        if (username === '' || newPassword === '' || confirmPassword === '' || dob === '' || securityQuestion === '' || securityAnswer === '') {
            showToast("#info-msg", `${infoSymbol} All fields are mandatory.`);
            return;
        }

        const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        if (!passwordRegex.test(newPassword)) {
            showToast("#info-msg", `${infoSymbol} Password must include:<br>- At least 8 characters.<br>- At least 1 uppercase letter.<br>- At least 1 lowercase letter.<br>- At least 1 number.<br>- At least 1 special character (!@#$%^&*).`, 10000);
            return;
        }

        if (newPassword !== confirmPassword) {
            showToast("#info-msg", `${infoSymbol} New Password and Confirm Password did not match. Please try again.`);
            return;
        }

        if (confirmReview.length <= 0) {
            showToast("#info-msg", `${infoSymbol} Please tick the 'I have reviewed my details.' checkbox to proceed further.`);
            return;
        }

        $.ajax({
            type: "POST",
            url: "../server/loginServer.php",
            data: {
                task: "resetPassword",
                username: username,
                newPassword: newPassword,
                dob: dob,
                securityQuestion: securityQuestion,
                securityAnswer: securityAnswer
            },
            dataType: "json",
            success: (response) => {
                if (response.status) {
                    showToast("#success-msg", `${successSymbol} Your password is changed successfully.`);
                    $("#resetPassForm").trigger("reset");

                } else if (response.message) {
                    showToast("#info-msg", `${infoSymbol} ${response.message}`);

                } else if (response.error) {
                    showToast("#error-msg", `${errorSymbol} Error: ${response.error}.`);

                } else {
                    showToast("#info-msg", `${infoSymbol} No message (response) to display.`);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    });
});

// Function to hide and show password at reset password page
const hideShowPassword = (role) => {
    if (role === "newPassTxt") {
        var passwordInput = document.getElementById('newPassTxt');
        var icon = document.getElementById('eyePass1');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.add('fa-eye-slash');
            icon.classList.remove('fa-eye');

        } else {
            passwordInput.type = 'password';
            icon.classList.add('fa-eye');
            icon.classList.remove('fa-eye-slash');
        }

    } else if (role === "confirmPassTxt") {
        var passwordInput = document.getElementById('confirmPassTxt');
        var icon = document.getElementById('eyePass2');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.add('fa-eye-slash');
            icon.classList.remove('fa-eye');
            
        } else {
            passwordInput.type = 'password';
            icon.classList.add('fa-eye');
            icon.classList.remove('fa-eye-slash');
        }
    }
};