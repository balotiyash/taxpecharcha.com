/** 
 * File: main.js
 * Author: Yash Balotiya
 * Description: This page contains all the initialization, js, ajax code to deal with the server of the index page
 * Created on: 25 May 2024
 * Last Modified: 17 July 2024
*/

// This invokes on load
$(document).ready(() => {
    // Onload to change the src of images of navbar as the navbar is used on multiple pages
    document.querySelector("#rsLogo").src = "asset/vectors/Rupees.svg";
    document.querySelector("#logo").src = "asset/images/Slogan.png";
    document.querySelector("#articleLink").href = "user/view/blogs.php";
    document.querySelector("#aboutLink").href = "user/view/profile.php";
    document.querySelector("#rupeesLogo").src = "asset/vectors/Rupees.svg";
    document.querySelector("#rupeesLogo").src = "asset/vectors/Rupees.svg";
    document.querySelector("#aboutMeLink").href = "user/view/profile.php";
    document.querySelector("#algoDevsImg").src = "asset/images/AlgoDevs.png";

    // Dashboard Button click event
    $("#dashboardBtn").on("click", () => {
        window.location.href = "admin/view/dashboard.php";
    });

    // Login Button click event
    $("#loginBtn").on("click", () => {
        window.location.href = "admin/view/login.php";
    });

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
        strings: ["Maximize Savings, Minimize Taxes:<br>Your Path to Financial Freedom."],
        typeSpeed: 50,
        backSpeed: 100,
        loop: false
    });

    // Function to fetch recent articles displayed on the index page from the db
    const fetchRecentArticles = () => {
        $.ajax({
            type: "POST",
            url: "user/server/homePageServer.php",
            data: { task: "fetchRecentArticles" },
            dataType: "json",
            success: (response) => {
                if (response.success) {
                    for (let i = 0; i < response.success.length; i++) {
                        $(`#articleImg${i + 1}`).attr("src", response.success[i]["image"]);
                        $(`#articleTitle${i + 1}`).html(response.success[i]["title"]);
                        $(`#articleContent${i + 1}`).html(response.success[i]["content"]);
                        $(`#articleViews${i + 1}`).html(response.success[i]["views"]);
                        $(`#articleLink${i + 1}`).attr("href", `user/view/article.php?slug=${response.success[i]["slug"]}`);
                    }
                } else if (response.error) {
                    alert(`Error: ${response.error}`);

                } else if (response.message) {
                    alert(`${response.message}`);
                }
            },
            error: (xhr, status, error) => {
                showError(xhr, status, error);
            }
        });
    }

    fetchRecentArticles();
});