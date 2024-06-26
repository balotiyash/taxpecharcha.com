<?php
// File: admin/server/newBlogServer.php
// Author: Yash Balotiya
// Description: This file contains the code to upload new blog.
// Created on: 25 June 2024
// Last Modified: 25 June 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is received or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "uploadNewBlog") {
        uploadNewBlog($conn);
    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

// To upload new blog
function uploadNewBlog($conn)
{
    if (!isset($_POST["title"], $_POST["mainCategory"], $_POST["subCategory"], $_POST["articleNo"], $_POST["keywords"], $_FILES["blogImage"], $_POST["content"])) {
        echo json_encode(["error" => "Missing parameters."]);
        return;
    }

    $title = $_POST["title"];
    $mainCategory = $_POST["mainCategory"];
    $subCategory = $_POST["subCategory"];
    $articleNo = $_POST["articleNo"];
    $keywords = $_POST["keywords"];
    $content = $_POST["content"];

    $imageName = $_FILES["blogImage"]["name"];
    $imageTempName = $_FILES["blogImage"]["tmp_name"];
    $savingPath = "../../asset/uploads/";
    $imageSavedPath = $savingPath . $imageName;

    // Check if image file is an actual image or fake image
    $check = getimagesize($imageTempName);
    if ($check === false) {
        echo json_encode(["error" => "File is not an image."]);
        return;
    }

    // Check if file already exists
    // if (file_exists($imageSavedPath)) {
    //     echo json_encode(["error" => "Image already exists. Please rename it."]);
    //     return;
    // }

    $isImageSaved = move_uploaded_file($imageTempName, $imageSavedPath);

    if ($isImageSaved) {
        $slug = createSlug($title);
        $imagePath = $imageSavedPath;

        $sql = "INSERT INTO blogs (slug, title, main_category, sub_category, section, keywords, image, content) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssss", $slug, $title, $mainCategory, $subCategory, $articleNo, $keywords, $imagePath, $content);

        if ($stmt->execute()) {
            echo json_encode(["success" => "Blog published successfully!"]);
        } else {
            echo json_encode(["error" => "Failed to upload blog: " . $conn->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["error" => "Failed to save image. Hence, blog not saved!"]);
    }
}

function createSlug($title) {
    $slug = strtolower($title);
    $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
    $slug = trim($slug, '-');
    return $slug;
}
