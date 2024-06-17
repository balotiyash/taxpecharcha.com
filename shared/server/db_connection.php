<?php
// File: shared/server/db_connection.php
// Author: Yash Balotiya
// Description: This file contains the shared connection variable for the database.
// Created on: 16 June 2024
// Last Modified: 17 June 2024

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "taxpecharcha_db";

$tinymceAPIKey = "jrdy5yjibmg02ir6g0t9r327kio35hjmj0e8fy951w88eqi9";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
