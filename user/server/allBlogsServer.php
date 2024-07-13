<?php
// File: user/server/allBlogsServer.php
// Author: Yash Balotiya
// Description: This file contains the code to load blog data of the all articles page.
// Created on: 13 July 2024
// Last Modified: 13 July 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is received or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "allIncomeTax") {
        fetchArticles($conn, "The Income Tax Act, 1961");
    } else if ($task === "allGst") {
        fetchArticles($conn, "The GST Act, 2017");
    } else if ($task === "allCustoms") {
        fetchArticles($conn, "The Customs Act, 1962");
    } else if ($task === "search") {
        if (!isset($_POST["searchText"])) {
            echo json_encode(["error" => "Search Text Not Received."]);
            return;
        }
        fetchArticles($conn, $_POST["searchText"], true);
    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

// function to load articles
function fetchArticles($conn, $mainCategory, $isSearch = false)
{
    if (isset($_POST["pageNo"])) {
        $pageNo = intval($_POST["pageNo"]);
    } else {
        $pageNo = 1; // Default to page 1 if not set
    }

    $limit = 6;
    $offset = ($pageNo - 1) * $limit;

    if ($isSearch) {
        $query1 = "SELECT image, title, content, views, slug, id FROM blogs WHERE section LIKE ? ORDER BY date DESC LIMIT ?, ?";
        $mainCategory = '%' . $mainCategory . '%'; // Add wildcard characters for LIKE
    } else {
        $query1 = "SELECT image, title, content, views, slug, id FROM blogs WHERE main_category LIKE CONCAT('%', ?, '%') ORDER BY date DESC LIMIT ?, ?";
    }

    // Prepare the SQL statement
    $stmt = $conn->prepare($query1);
    if ($stmt === false) {
        echo json_encode(["error" => "Failed to prepare statement: " . $conn->error]);
        return;
    }

    $stmt->bind_param("sii", $mainCategory, $offset, $limit);

    // Execute the statement
    if (!$stmt->execute()) {
        echo json_encode(["error" => "Failed to execute statement: " . $stmt->error]);
        return;
    }

    // Get the result
    $result = $stmt->get_result();

    // Fetch data
    if ($result->num_rows > 0) {
        $output = "";

        while ($row = $result->fetch_assoc()) {
            $lastId = $row["id"];

            $output .= '<div class="articleContainer">
                <img src="' . $row["image"] . '" alt="Article Image" class="articleImg" id="">
                <div class="articleInfo">
                    <div>
                        <h1 id="">' . $row["title"] . '</h1>
                        <p class="desc" id="">' . substr($row["content"], 0, 100) . '...</p>
                        <a href="article.php?slug=' . $row["slug"] . '">Read full article</a>
                    </div>
                </div>
                <div class="articleDetails">
                    <p><b><i>Manish Suvasiya</i></b></p>
                    <div>
                        <i class="fa-solid fa-eye"></i>
                        <p id="">' . $row["views"] . '</p>
                    </div>
                </div>
            </div>';
        }

        echo json_encode(["success" => $output, "lastId" => $lastId]);
    } else {
        echo json_encode(["message" => "No blogs found"]);
    }

    // Free result and close statement
    $result->free();
    $stmt->close();
}
?>
