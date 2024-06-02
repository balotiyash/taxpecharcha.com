/** 
 * File: main.js
 * Author: Yash Balotiya
 * Description: // TODO
 * Created on: 25 May 2024
 * Last Modified: 25 May 2024
*/

// Onload function to change the src of images of navbar as the navbar is used on multiple pages
function settle() {
    document.querySelector("#rsLogo").src = "asset/vectors/Rupees.svg";
    document.querySelector("#logo").src = "asset/images/Slogan.png";
    document.querySelector("#homeLink").href = "index.php";
    document.querySelector("#aboutLink").href = "user/view/profile.php";
}

// Function to open login page
// function openLoginPage() {
//     window.location.href = "admin/view/login.php";
// }

document.querySelector("#loginBtn").onclick = function() {
    window.location.href = "admin/view/login.php";
}