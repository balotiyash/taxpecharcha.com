<?php
// File: admin/server/newBlogServer.php
// Author: Yash Balotiya
// Description: This file contains the code to upload or update a blog.
// Created on: 25 June 2024
// Last Modified: 02 July 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is received or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "uploadNewBlog" || $task === "updateWithImage" || $task === "updateWithoutImage") {
        uploadOrUpdateBlog($conn, $task);
    } else {
        handleResponse(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    handleResponse(["error" => "Task parameter not received from JavaScript"]);
}

// Function to handle response as JSON
function handleResponse($response) {
    echo json_encode($response);
}

// To upload new blog or update existing blog
function uploadOrUpdateBlog($conn, $task) {
    // Check required parameters
    $requiredParams = ["title", "mainCategory", "subCategory", "articleNo", "keywords", "content"];
    foreach ($requiredParams as $param) {
        if (!isset($_POST[$param])) {
            handleResponse(["error" => "Missing parameter: " . $param]);
            return;
        }
    }

    // Handle image upload if required
    $isImageSaved = false;
    $imagePath = "";

    if (($task === "uploadNewBlog" || $task === "updateWithImage") && isset($_FILES["blogImage"])) {
        $imageName = $_FILES["blogImage"]["name"];
        $imageTempName = $_FILES["blogImage"]["tmp_name"];
        $savingPath = "../../asset/uploads/";
        $imageSavedPath = $savingPath . $imageName;

        // Check if image file is an actual image or fake image
        $check = getimagesize($imageTempName);
        if ($check === false) {
            handleResponse(["error" => "File is not an image."]);
            return;
        }

        // Move uploaded image to permanent location
        $isImageSaved = move_uploaded_file($imageTempName, $imageSavedPath);
        if ($isImageSaved) {
            $imagePath = $imageSavedPath;
        } else {
            handleResponse(["error" => "Failed to save image."]);
            return;
        }
    }

    // Prepare data for database insertion or update
    $title = $_POST["title"];
    $mainCategory = $_POST["mainCategory"];
    $subCategory = $_POST["subCategory"];
    $articleNo = $_POST["articleNo"];
    $keywords = $_POST["keywords"];
    $content = $_POST["content"];

    // Generate slug
    $slug = createSlug($title);

    // Determine SQL query based on task
    switch ($task) {
        case "uploadNewBlog":
            $sql = "INSERT INTO blogs (slug, title, main_category, sub_category, section, keywords, image, content) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $params = [$slug, $title, $mainCategory, $subCategory, $articleNo, $keywords, $imagePath, $content];
            break;

        case "updateWithImage":
            if (!isset($_POST["id"])) {
                handleResponse(["error" => "Missing parameter: id"]);
                return;
            }
            $sql = "UPDATE blogs SET slug = ?, title = ?, main_category = ?, sub_category = ?, section = ?, keywords = ?, image = ?, content = ? WHERE id = ?";
            $params = [$slug, $title, $mainCategory, $subCategory, $articleNo, $keywords, $imagePath, $content, $_POST["id"]];
            break;

        case "updateWithoutImage":
            if (!isset($_POST["id"])) {
                handleResponse(["error" => "Missing parameter: id"]);
                return;
            }
            $sql = "UPDATE blogs SET slug = ?, title = ?, main_category = ?, sub_category = ?, section = ?, keywords = ?, content = ? WHERE id = ?";
            $params = [$slug, $title, $mainCategory, $subCategory, $articleNo, $keywords, $content, $_POST["id"]];
            break;

        default:
            handleResponse(["error" => "Invalid task: " . $task]);
            return;
    }

    // Execute SQL query
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat("s", count($params)), ...$params);

    if ($stmt->execute()) {
        handleResponse(["success" => ($task === "uploadNewBlog" ? "Blog published successfully!" : "Blog updated successfully!")]);
    } else {
        handleResponse(["error" => "Failed to " . ($task === "uploadNewBlog" ? "upload" : "update") . " blog: " . $conn->error]);
    }

    $stmt->close();
}

// Function to create a slug from title
function createSlug($title) {
    $slug = strtolower($title);
    $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}
?>