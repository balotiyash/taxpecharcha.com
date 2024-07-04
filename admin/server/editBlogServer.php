<?php
// File: admin/server/editBlogServer.php
// Author: Yash Balotiya
// Description: This file contains the code to fetch and display all the blogs details to update them.
// Created on: 01 July 2024
// Last Modified: 02 July 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is received or not, if yes then what is the task
if (isset($_GET["task"]) || isset($_POST["task"])) {

    $task = (isset($_GET["task"])) ? $_GET["task"] : $_POST["task"];

    if ($task === "fetchBlogDetails") {
        fetchBlogDetails($conn);

    } elseif ($task === "deleteBlog") {
        deleteBlog($conn);

    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

// Function to fetch or load selected blog data on load
function fetchBlogDetails($conn) {
    if (!isset($_GET["id"])) {
        // echo "<script>alert('Missing parameters.');</script>";
        echo json_encode(["error" => "Missing parameters."]);
        return;
    }
    
    $id = $_GET["id"];
    $query = "SELECT title, main_category, sub_category, section, keywords, content FROM blogs WHERE id = ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $blogDetails = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $blogDetails["title"] = $row['title'];
            $blogDetails["mainCategory"] = $row['main_category'];
            $blogDetails["subCategory"] = $row["sub_category"];
            $blogDetails["section"] = $row['section'];
            $blogDetails["keywords"] = $row['keywords'];
            // $blogDetails["image"] = $row['image'];
            $blogDetails["content"] = $row['content'];
        }
        echo json_encode($blogDetails);
    } else {
        echo json_encode(["message" => "No data found"]);
    }

    $stmt->close();
}

// Function to handle update existing articles is integrated with create new blog server named createOrEditServer.php

// Function to delete the blog
function deleteBlog($conn) {
    if (!isset($_POST["id"])) {
        echo json_encode(["error" => "Missing parameters."]);
        return;
    }

    $id = $_POST["id"];
    $query = "DELETE FROM blogs WHERE id = ?;";
    $stmt = $conn->prepare($query);

    if (!$stmt) {
        echo json_encode(["error" => "Failed to prepare the statement."]);
        return;
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => "Article deleted successfully."]);
    } else {
        echo json_encode(["message" => "No record found or nothing was deleted."]);
    }

    $stmt->close();
}
?>