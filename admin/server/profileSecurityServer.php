<?php
// File: admin/server/profileSecurityServer.php
// Author: Yash Balotiya
// Description: This file contains the code to update security details and password after login.
// Created on: 16 June 2024
// Last Modified: 11 July 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// // Checking if the task parameter is recieved or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "fetchSecurityAnswer") {
        fetchSecurityAnswers($conn);
    
    } elseif ($task === "setSecurityAnswers") {
        setSecurityAnswers($conn);

    } elseif ($task ==="changePassword") {
        changeLoginPassword($conn);

    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript."]);
}

// To fetch security answers
function fetchSecurityAnswers($conn) {
    $query = "SELECT security_question, security_answer, dob FROM admin_login_details;";
    $result = $conn->query($query);

    if ($result === false) {
        echo json_encode(["error" => "Fetching Security Answers query failed: " . $conn->error]);
        $conn->close();
        return;
    }

    $securityAnswers = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $securityAnswers[] = $row;
        }
        // Return the security answers as JSON
        echo json_encode($securityAnswers);
    } else {
        // Return a message indicating no results found
        echo json_encode(["message" => "No result found!!"]);
    }
}

// To update security answers
function setSecurityAnswers($conn) {
    if (!isset($_POST["securityQuestion"], $_POST["securityAnswer"], $_POST["dob"])) {
        echo json_encode(["error" => "Missing parameters"]);
        return;
    }

    $securityQuestion = $_POST["securityQuestion"];
    $securityAnswer = $_POST["securityAnswer"];
    $dob = $_POST["dob"];

    $query1 = "UPDATE admin_login_details SET security_question = ?, security_answer = ?, dob = ?;";

    $stmt = $conn->prepare($query1);
    if ($stmt === false) {
        echo json_encode(["error" => "Prepare failed: " . $conn->error]);
        return;
    }

    $stmt->bind_param("sss", $securityQuestion, $securityAnswer, $dob);
    $stmt->execute();

    if ($stmt->affected_rows >= 0) {
        echo json_encode(["status" => "data inserted"]);
    } else {
        echo json_encode(["status" => "data insertion failed", "error" => $stmt->error]);
    }

    $stmt->close();
}

// To change admin login password
function changeLoginPassword($conn) {
    if (!isset($_POST["existingPassword"], $_POST["newPassword"])) {
        echo json_encode(["error" => "Missing parameters"]);
        return;
    }

    $existingPassword = $_POST["existingPassword"];
    $newPassword = $_POST["newPassword"];

    $query1 = "SELECT password FROM admin_login_details;";
    $result = $conn->query($query1);

    if ($result === false) {
        echo json_encode(["error" => "Fetching Security Answers query failed: " . $conn->error]);
        $conn->close();
        return;
    }

    $currentPassword = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $currentPassword = $row['password'];
        }

        if (password_verify($existingPassword, $currentPassword)) {
            $query2 = "UPDATE admin_login_details SET password = ?;";
            $stmt = $conn->prepare($query2);
            
            if ($stmt === false) {
                echo json_encode(["error" => "Prepare failed: " . $conn->error]);
                return;
            }
        
            $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt->bind_param("s", $newHashedPassword);
            $stmt->execute();
        
            if ($stmt->affected_rows > 0) {
                echo json_encode(["status" => "password changed"]);
            } else {
                echo json_encode(["status" => "password changing failed", "error" => $stmt->error]);
            }
        
            $stmt->close();
        } else {
            echo json_encode(["status" => "incorrect current password"]);
        }
    } else {
        echo json_encode(["status" => "No result found!!"]);
    }
}
?>