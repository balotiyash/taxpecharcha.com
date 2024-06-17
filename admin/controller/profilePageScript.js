/** 
 * File: admin/controller/profilePageScript.js
 * Author: Yash Balotiya
 * Description: This page contains all the js ajax code to validate and interact with the server side code of the change password and security answers page inside profile page.
 * Created on: 16 June 2024
 * Last Modified: 17 June 2024
*/

// If the page loads successfully then this function runs
$(document).ready(function() {

    // To fetch security answers on load
    function loadSecurityAnswer() { 
        $.ajax({
            type: "POST",
            url: "../server/profileSecurityServer.php",
            data: {task: "fetchSecurityAnswer"}, // Use an empty object instead of null for better readability
            dataType: "json", // Set to the expected data type ("json" in this case)
            success: function(response) {
                // Handle the response from the server here
                if (response.error) {
                    showToast("#error-msg", "Error: " + response.error);
                } else if (response.message) {
                    showToast("#info-msg", response.message);
                } else {
                    // Update the UI with the response data
                    response.forEach(function(item) {
                        $("#securityQuestion").val(item.security_question);
                        $("#changeSecurityTxt").val(item.security_answer);
                        $("#dobTxt").val(item.dob);
                    });
                }
            },
            error: function(xhr, status, error) {
                // Handle any errors here
                console.error("Error loading security answer: ", error);
                showError(xhr, status, error);
            }
        });
    }
    
    // Calling the onload function to fetch security answers
    loadSecurityAnswer();

    // To update security answers
    $("#securitySubmitBtn").on("click", function(e) {
        e.preventDefault();
        
        const securityQuestion = $("#securityQuestion").val();
        const securityAnswer = $("#changeSecurityTxt").val();
        const dob = $("#dobTxt").val();

        if (securityQuestion == "" || securityAnswer == "" || dob == "") {
            showToast("#error-msg", "Answer field cannot be empty.");
            return;
        }
        
        $.ajax({
            type: "POST",
            url: "../server/profileSecurityServer.php",
            data: {
                task: "setSecurityAnswers",
                securityQuestion: securityQuestion,
                securityAnswer: securityAnswer,
                dob: dob
            },
            dataType: "json",
            success: function(response) {
                if (response.status == "data inserted") {
                    showToast("#success-msg", "Security Answer(s) Changed.");
                    
                } else if (response.status == "data insertion failed") {
                    showToast("#error-msg", "Error: " + response.error);
                
                } else if (response.error) {
                    showToast("#error-msg", response.error);
                }
            },
            error: function(xhr, status, error) {
                showError(xhr, status, error);
            }
        });
    });
    
    // To change profile password
    $("#changePassBtn").on("click", (e) => {
        e.preventDefault();

        const existingPassword = $("#currentPassTxt").val();
        const newPassword = $("#newPassTxt").val();
        const confirmPassword = $("#cfmPassTxt").val();
        const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

        if (existingPassword == "" || newPassword == "" || confirmPassword == "") {
            showToast("#info-msg", "All fields are mandatory to fill.");
            return;
        }

        if (!passwordRegex.test(newPassword)) {
            showToast("#info-msg", "Password must include:<br>- At least 8 characters<br>- At least 1 uppercase letter<br>- At least 1 lowercase letter<br>- At least 1 number<br>- At least 1 special character (!@#$%^&*)", 10000);
            return;
        }

        if (newPassword !== confirmPassword) {
            showToast("#info-msg", "New Password & Confirm Password didn't matched!");
            return;
        }

        $.ajax({
            type: "POST",
            url: "../server/profileSecurityServer.php",
            data: {
                task: "changePassword",
                existingPassword: existingPassword,
                newPassword: confirmPassword
            },
            dataType: "json",
            success: function (response) {
                if (response.status == "password changed") {
                    showToast("#success-msg", "Password changed successfully.");
                    $("#changePasswordForm").trigger("reset");

                } else if (response.status == "password changing failed") {
                    showToast("#error-msg", "Error: " + response.error);

                } else if (response.status == "incorrect current password") {
                    showToast("#info-msg", "Incorrect current password entered.");

                } else if (response.status == "No result found!!") {
                    showToast("#info-msg", "Login credentials not found.");

                } else if (response.error) {
                    showToast("#error-msg", "Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                showError(xhr, status, error);
            }
        });
    });
});