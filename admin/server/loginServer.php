<?php
// File: admin/server/loginServer.php
// Author: Yash Balotiya
// Description: This file contains the code to authenticate login and to change password at login page at the server side.
// Created on: 20 June 2024
// Last Modified: 21 June 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is recieved or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "validateLogin") {
        validateLogin($conn);

    } elseif ($task === "resetPassword") {
        resetPassword($conn);

    } else {
        echo json_encode(["error" => "Invalid task: " + $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript."]);
}

// Function to authenticate login
function validateLogin($conn) {
    if (!isset($_POST["username"], $_POST["password"])) {
        echo json_encode(["error" => "Missing parameters."]);
        return;
    }

    $username = $_POST["username"];
    $password = $_POST["password"];
    $query1 = "SELECT login_id, password FROM admin_login_details;";

    $result = $conn->query($query1);

    if ($result === false) {
        echo json_encode(["error" => "Fetching Login Credentials query failed: " . $conn->error]);
        return;
    }

    $actualUname = $actualPassword = null;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $actualUname = $row["login_id"];
            $actualPassword = $row["password"];
        }
    } else {
        echo json_encode(["message" => "No result found!!"]);
        return;
    }

    if (($username === $actualUname) && (password_verify($password, $actualPassword))) {
        echo json_encode(["status" => "User Authenticated Successfully"]);
    } else {
        echo json_encode(["error" => "Invalid Login Crenditials!"]);
    }
}

// To reset password at login page
function resetPassword($conn) {
    if (!isset($_POST["username"], $_POST["newPassword"], $_POST["dob"], $_POST["securityQuestion"], $_POST["securityAnswer"])) {
        echo json_encode(["error" => "Missing parameters."]);
        return;
    }

    $username = $_POST["username"];
    $newPassword = $_POST["newPassword"];
    $dob = $_POST["dob"];
    $securityQuestion = $_POST["securityQuestion"];
    $securityAnswer = $_POST["securityAnswer"];

    $query1 = "SELECT * FROM admin_login_details;";
    $result1 = $conn->query($query1);

    if ($result1 === false) {
        echo json_encode(["error" => "Fetching Login Credentials query failed: " . $conn->error]);
        return;
    }
    
    $existingUname = $existingDob = $existingSecQuestion = $existingSecAnswer = null;

    if ($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()) {
            $existingUname = $row["login_id"];
            $existingDob = $row["dob"];
            $existingSecQuestion = $row["security_question"];
            $existingSecAnswer = $row["security_answer"];
        }
    } else {
        echo json_encode(["message" => "No result found!!"]);
        return;
    }

    if ($username !== $existingUname) {
        echo json_encode(["message" => "Incorrect Login ID Entered!"]);
        
    } elseif ($dob !== $existingDob) {
        echo json_encode(["message" => "Incorrect Date of Birth Entered!"]);
        
    } elseif ($securityQuestion !== $existingSecQuestion) {
        echo json_encode(["message" => "Incorrect Security Question Selected!"]);
        
    } elseif ($securityAnswer !== $existingSecAnswer) {
        echo json_encode(["message" => "Incorrect Security Answer Entered!"]);

    } else {
        $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $query2 = "UPDATE admin_login_details SET password = ?;";

        $stmt = $conn->prepare($query2);
        if ($stmt === false) {
            echo json_encode(["error" => "Prepare failed: " . $conn->error]);
            return;
        }

        $stmt->bind_param("s", $newHashedPassword);
        $stmt->execute();

        if ($stmt->affected_rows >= 0) {
            echo json_encode(["status" => "data inserted"]);
        } else {
            echo json_encode(["error" => "Data insertion failed: " . $stmt->error]);
        }
    
        $stmt->close();
    }
}
?>