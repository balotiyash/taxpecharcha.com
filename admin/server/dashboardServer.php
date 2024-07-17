<?php
// File: admin/server/dashboardServer.php
// Author: Yash Balotiya
// Description: This file contains the code to fetch the counts of the blogs category wise and to fetch the top viewed articles by users on the dashboard page.
// Created on: 26 June 2024
// Last Modified: 17 July 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is recieved or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "fetchBlogsCount") {
        fetchBlogsCount($conn);

    } elseif ($task === "fetchTopArticles") {
        fetchTopArticles($conn);
        
    } elseif ($task === "logout") {
        session_start();

        if (isset($_SESSION['isAdminLoggedin'])) {
            session_unset();
            session_destroy();
        }

        echo json_encode(["success" => "loggedOut"]);

    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

// Function to fetch and return all the blogs count category wise to the js
function fetchBlogsCount($conn) {
    $query1 = "SELECT main_category, COUNT(*) as count FROM blogs GROUP BY main_category;";
    $result = $conn->query($query1);

    if ($result === false) {
        echo json_encode(["error" => "Fetching blog counts query failed: " . $conn->error]);
        $conn->close();
        return;
    }

    // Initialize the array to store counts
    $counts = array('total' => 0, 'income' => 0, 'gst' => 0, 'customs' => 0);

    // Create a mapping from the database values to your desired keys
    $categoryMapping = array(
        'The Customs Act, 1962' => 'customs',
        'The GST Act, 2017' => 'gst',
        'The Income Tax Act, 1961' => 'income'
    );

    // Fetch results and store in the array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categoryKey = isset($categoryMapping[$row['main_category']]) ? $categoryMapping[$row['main_category']] : null;
            if ($categoryKey) {
                $counts[$categoryKey] = $row['count'];
            }
            $counts['total'] += $row['count'];
        }

        $counts['success'] = true;
        echo json_encode($counts);
    } else {
        echo json_encode(["message" => "No count result found"]);
    }
}

// Function to fetch most viewed 4 articles displayed ono the admin dashboard
function fetchTopArticles($conn) {

    $query1 = "SELECT views, image, title, date FROM blogs ORDER BY views DESC LIMIT 4;";
    $result = $conn->query($query1);

    if ($result === false) {
        echo json_encode(["error" => "Fetching top articles query failed: " . $conn->error]);
        $conn->close();
        return;
    }

    $topArticles = array();

    // Fetch results and store in the array
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $topArticles[] = array(
                'views' => $row['views'],
                'image' => $row['image'],
                'title' => $row['title'],
                'date' => $row['date']
            );
        }

        $topArticles['success'] = true;
        echo json_encode($topArticles);
    } else {
        echo json_encode(["message" => "No count result found"]);
    }
}

?>