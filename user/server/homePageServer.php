<?php
// File: user/server/homePageServer.php
// Author: Yash Balotiya
// Description: This file contains the code to load blog data of the home page.
// Created on: 09 July 2024
// Last Modified: 09 July 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is recieved or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "fetchRecentArticles") {
        fetchRecentArticles($conn);

    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

function fetchRecentArticles($conn) {
    $query = "(
        SELECT id, slug, image, title, content, views 
        FROM blogs 
        WHERE main_category = 'The Income Tax Act, 1961'
        ORDER BY date DESC 
        LIMIT 3
    )
    UNION ALL
    (
        SELECT id, slug, image, title, content, views 
        FROM blogs 
        WHERE main_category = 'The GST Act, 2017'
        ORDER BY date DESC 
        LIMIT 3
    )
    UNION ALL
    (
        SELECT id, slug, image, title, content, views 
        FROM blogs 
        WHERE main_category = 'The Customs Act, 1962'
        ORDER BY date DESC 
        LIMIT 3
    );";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    $blogDetails = [];

    if ($result->num_rows > 0) {
        $i = 0;
        while ($row = $result->fetch_assoc()) {
            $blogDetails[$i]["id"] = $row['id'];
            $blogDetails[$i]["slug"] = $row['slug'];
            $blogDetails[$i]["image"] = substr($row['image'], 6);
            $blogDetails[$i]["title"] = $row['title'];
            $blogDetails[$i]["content"] = substr($row['content'], 0, 100) . "..."; // Use 0 as the starting position
            $blogDetails[$i]["views"] = $row['views'];
            $i++;
        }
        echo json_encode(["success" => $blogDetails]);
    } else {
        echo json_encode(["message" => "No data found"]);
    }

    $stmt->close();
}
?>