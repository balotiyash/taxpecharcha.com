/** 
 * File: admin/controller/profilePageScript.js
 * Author: Yash Balotiya
 * Description: This page contains all the js ajax code to validate and interact with the server side code of the change password and security answers page inside profile page.
 * Created on: 16 June 2024
 * Last Modified: 14 July 2024
*/

// If the page loads successfully then this function runs
$(document).ready(() => {

    // To fetch security answers on load
    const loadSecurityAnswer = () => { 
        $.ajax({
            type: "POST",
            url: "../server/profileSecurityServer.php",
            data: { task: "fetchSecurityAnswer" }, // Use an empty object instead of null for better readability
            dataType: "json",
            success: (response) => {
                if (response.error) {
                    showToast("#error-msg", `${errorSymbol} Error: ${response.error}.`);

                } else if (response.message) {
                    showToast("#info-msg", `${infoSymbol} ${response.message}.`);

                } else {
                    response.forEach((item) => {
                        $("#securityQuestion").val(item.security_question);
                        $("#changeSecurityTxt").val(item.security_answer);
                        $("#dobTxt").val(item.dob);
                    });
                }
            },
            error: (xhr, status, error) => {
                console.error("Error loading security answer: ", error);
                showError(xhr, status, error);
            }
        });
    };
    
    // Calling the onload function to fetch security answers
    loadSecurityAnswer();

    // To update security answers
    $("#securitySubmitBtn").on("click", (e) => {
        e.preventDefault();
        
        if (confirm("You're about to change your security answer or date of birth. Are you sure you want to make this change?")) {

            const securityQuestion = $("#securityQuestion").val().trim();
            const securityAnswer = $("#changeSecurityTxt").val().trim().toLowerCase();
            const dob = $("#dobTxt").val();
    
            if (!securityQuestion || !securityAnswer || !dob) {
                showToast("#info-msg", `${infoSymbol} Answer field or DOB field cannot be empty.`);
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
                success: (response) => {
                    if (response.status === "data inserted") {
                        showToast("#success-msg", `${successSymbol} Security answer(s) changed.`);
                        
                    } else if (response.status === "data insertion failed" || response.error) {
                        showToast("#error-msg", `${errorSymbol} Error: ${response.error}.`);

                    } else {
                        showToast("#info-msg", `${infoSymbol} No message (response) to display.`);
                    }
                },
                error: (xhr, status, error) => {
                    showError(xhr, status, error);
                }
            });
        }
    });
    
    // To change profile password
    $("#changePassBtn").on("click", (e) => {
        e.preventDefault();

        const existingPassword = $("#currentPassTxt").val().trim();
        const newPassword = $("#newPassTxt").val().trim();
        const confirmPassword = $("#cfmPassTxt").val().trim();
        const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
        
        if (!existingPassword || !newPassword || !confirmPassword) {
            showToast("#info-msg", `${infoSymbol} All fields are mandatory to fill.`);
            return;
        }
        
        if (!passwordRegex.test(newPassword)) {
            showToast("#info-msg", `${infoSymbol} Password must include:<br>- At least 8 characters<br>- At least 1 uppercase letter<br>- At least 1 lowercase letter<br>- At least 1 number<br>- At least 1 special character (!@#$%^&*).`, 10000);
            return;
        }
        
        if (newPassword !== confirmPassword) {
            showToast("#info-msg", `${infoSymbol} New Password & Confirm Password didn't matched!`);
            return;
        }
        
        if (confirm("You're about to change your account password. Are you sure you want to make this change?")) {
            $.ajax({
                type: "POST",
                url: "../server/profileSecurityServer.php",
                data: {
                    task: "changePassword",
                    existingPassword: existingPassword,
                    newPassword: confirmPassword
                },
                dataType: "json",
                success: (response) => {
                    if (response.status === "password changed") {
                        showToast("#success-msg", `${successSymbol} Password changed successfully.`);
                        $("#changePasswordForm").trigger("reset");
    
                    } else if (response.status === "password changing failed") {
                        showToast("#error-msg", `${errorSymbol} Error: ${response.error}`);
    
                    } else if (response.status === "incorrect current password") {
                        showToast("#error-msg", `${errorSymbol} Incorrect current password entered.`);
    
                    } else if (response.status === "No result found!!") {
                        showToast("#info-msg", `${infoSymbol} Login credentials not found!`);
    
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
        }
    });
});