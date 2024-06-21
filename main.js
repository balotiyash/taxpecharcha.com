/** 
 * File: main.js
 * Author: Yash Balotiya
 * Description: // TODO
 * Created on: 25 May 2024
 * Last Modified: 21 June 2024
*/

// Onload to change the src of images of navbar as the navbar is used on multiple pages
document.querySelector("#rsLogo").src = "asset/vectors/Rupees.svg";
document.querySelector("#logo").src = "asset/images/Slogan.png";
document.querySelector("#homeLink").href = "index.php";
document.querySelector("#aboutLink").href = "user/view/profile.php";

// Function to open login page
document.querySelector("#loginBtn").onclick = function() {
    window.location.href = "admin/view/login.php";
}