/** 
 * File: main.js
 * Author: Yash Balotiya
 * Description: // TODO
 * Created on: 25 May 2024
 * Last Modified: 22 June 2024
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

// Home page image sliding
const slides = document.querySelectorAll('.slide');
let currentIndex = 0;
const intervalTime = 5000; // 3 seconds
const transitionTime = 1000; // 1 second

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.classList.add('visible');
        } else {
            slide.classList.remove('visible');
        }
    });
}

function nextSlide() {
    currentIndex = (currentIndex + 1) % slides.length;
    showSlide(currentIndex);
}

setInterval(nextSlide, intervalTime);

// Typing effect
var typed = new Typed(".auto-type", {
    strings: ["Maximize Savings, Minimize Taxes: Your Path to Financial Freedom."],
    typeSpeed: 50,
    backSpeed: 100,
    loop: false
});