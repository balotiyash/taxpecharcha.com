/** 
 * File: admin/controller/blogsScript.js
 * Author: Yash Balotiya
 * Description: This page contains all the js ajax code of the articles / blogs page to interact with the server.
 * Created on: 11 July 2024
 * Last Modified: 13 July 2024
*/

$(document).ready(() => {
    // Click event of search button
    $("#searchIcon").on("click", () => {
        const searchText = $("#searchInput").val();

        if (!searchText) {
            alert("Search text cannot be empty!!");
            return;
        }

        window.location.href = `allBlogs.php?task=search&article=${encodeURIComponent(searchText)}`;
    });
});