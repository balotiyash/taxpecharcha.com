<?php
// File: admin/server/todoServer.php
// Author: Yash Balotiya
// Description: This file contains the code to update and display todo data.
// Created on: 17 June 2024
// Last Modified: 21 June 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is recieved or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "fetchTodoData") {
        fetchTodoData($conn);

    } elseif ($task === "setTodoData") {
        setTodoData($conn);

    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

// To load data on load
function fetchTodoData($conn) {
    $query = "SELECT * FROM todo_data";
    $result = $conn->query($query);

    if ($result === false) {
        echo json_encode(["error" => "Fetching TODO Data query failed: " . $conn->error]);
        $conn->close();
        return;
    }

    $todoData = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $todoData = $row["data"];
        }
        echo json_encode(["todoData" => $todoData]);
    } else {
        echo json_encode(["message" => "No result found"]);
    }
}

// To update todo data
function setTodoData($conn) {
    if (!isset($_POST["todoData"])) {
        echo json_encode(["error" => "Missing parameters."]);
        return;
    }

    $todoData = $_POST["todoData"];
    $query1 = "UPDATE todo_data SET data = ?;";

    $stmt = $conn->prepare($query1);
    if ($stmt === false) {
        echo json_encode(["error" => "Prepare failed: " . $conn->error]);
        return;
    }

    $stmt->bind_param("s", $todoData);
    $stmt->execute();

    if ($stmt->affected_rows >= 0) {
        echo json_encode(["status" => "data inserted"]);
    } else {
        echo json_encode(["status" => "data insertion failed", "error" => $stmt->error]);
    }

    $stmt->close();
}
?>