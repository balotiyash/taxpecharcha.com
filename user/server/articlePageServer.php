<?php
// File: user/server/articlePageServer.php
// Author: Yash Balotiya
// Description: This file contains the code to load blog data of the articles page.
// Created on: 10 July 2024
// Last Modified: 14 July 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is received or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "fetchArticle") {
        fetchArticle($conn);

    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

// Function to fetch blog
function fetchArticle($conn) {
    if (!isset($_POST["slug"])) {
        echo json_encode(["error" => "Blog slug not found!"]);
        return;
    }

    $slug = $_POST["slug"];
    $query = "SELECT * FROM blogs WHERE slug = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $slug);
    $stmt->execute();
    $result = $stmt->get_result();

    $blogDetails = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $blogDetails["id"] = $row['id'];
            $blogDetails["slug"] = $row['slug'];
            $blogDetails["title"] = $row['title'];
            $blogDetails["main_category"] = $row['main_category'];
            $blogDetails["sub_category"] = $row['sub_category'];
            $blogDetails["section"] = $row['section'];
            $blogDetails["keywords"] = $row['keywords'];
            $blogDetails["image"] = $row['image'];
            $blogDetails["content"] = $row['content'];
            $blogDetails["views"] = $row['views'];
            $blogDetails["date"] = $row['date'];
        }
        
        updateBlog($conn);
        echo json_encode(["success" => $blogDetails]);
    } else {
        echo json_encode(["message" => "No data found"]);
    }

    $stmt->close();
}

// Function to update blog views
function updateBlog($conn) {
    if (!isset($_POST["slug"])) {
        echo json_encode(["error" => "Blog slug not found!"]);
        return;
    }

    $slug = $_POST["slug"];
    $query = "UPDATE blogs SET views = views + 1 WHERE slug = ?";

    $stmt = $conn->prepare($query);
    if (!$stmt) {
        echo json_encode(["error" => "Failed to prepare statement: " . $conn->error]);
        return;
    }

    $stmt->bind_param('s', $slug);
    $stmt->execute();

    $stmt->close();
}
?>
