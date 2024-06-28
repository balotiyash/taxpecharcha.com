<?php
// File: admin/server/myBlogsServer.php
// Author: Yash Balotiya
// Description: This file contains the code to fetch and display all the blogs category-wise or search-wise data.
// Created on: 28 June 2024
// Last Modified: 28 June 2024

// Including the database connection
include_once "../../shared/server/db_connection.php";

// Checking if the task parameter is received or not, if yes then what is the task
if (isset($_POST["task"])) {
    $task = $_POST["task"];

    if ($task === "fetchBlogs") {
        fetchBlogs($conn);
    } elseif ($task === "fetchBySearch") {
        fetchBySearch($conn);
    } else {
        echo json_encode(["error" => "Invalid task: " . $task]);
    }

    $conn->close();
} else {
    echo json_encode(["error" => "Task parameter not received from JavaScript"]);
}

// Function to fetch category wise data and render it to js
function fetchBlogs($conn) {
    if (!isset($_POST["mainCategory"], $_POST["subCategory"], $_POST["page"], $_POST["itemsPerPage"])) {
        echo json_encode(["error" => "Missing parameters."]);
        return;
    }

    $mainCategory = $_POST["mainCategory"];
    $subCategory = $_POST["subCategory"];
    $page = (int)$_POST["page"];
    $itemsPerPage = (int)$_POST["itemsPerPage"];
    $offset = ($page - 1) * $itemsPerPage;

    $query = "SELECT id, slug, title, section, views, date FROM blogs WHERE main_category = ? AND sub_category = ? LIMIT ?, ?;";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssii", $mainCategory, $subCategory, $offset, $itemsPerPage);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = "";

    if ($result->num_rows > 0) {
        $data .= '<table>
                    <thead>
                        <tr>
                            <th id="blogSrNo">Sr. No.</th>
                            <th id="blogTitle">Title</th>
                            <th id="blogSectionNo">Section No.</th>
                            <th id="blogViews">Views</th>
                            <th id="blogDate">Date & Time</th>
                            <th id="blogEdit">Edit</th>
                            <th id="blogDelete">Delete</th>
                        </tr>
                    </thead>
                    <tbody>';

        $srNo = $offset + 1;
        while ($row = $result->fetch_assoc()) {
            $data .= '<tr>
                            <td>' . $srNo++ . '</td>
                            <td class="title"><input type="text" readonly value="' . htmlspecialchars($row["title"]) . '" /></td>
                            <td>' . htmlspecialchars($row["section"]) . '</td>
                            <td>' . htmlspecialchars($row["views"]) . '</td>
                            <td>' . substr(htmlspecialchars($row["date"]), 0, 10) . '</td>
                            <td><button id="' . htmlspecialchars($row["id"]) . '" class="button-28 actionBtns editBtn"><i class="fa-solid fa-pen-to-square"></i></button></td>
                            <td><button id="' . htmlspecialchars($row["id"]) . '" class="button-28 actionBtns deleteBtn"><i class="fa-solid fa-trash"></i></button></td>
                        </tr>';
        }

        $data .= '</tbody></table>';

        // Fetch total number of records for pagination
        $countQuery = "SELECT COUNT(*) as total FROM blogs WHERE main_category = ? AND sub_category = ?";
        $countStmt = $conn->prepare($countQuery);
        $countStmt->bind_param("ss", $mainCategory, $subCategory);
        $countStmt->execute();
        $countResult = $countStmt->get_result();
        $totalRecords = $countResult->fetch_assoc()["total"];
        $totalPages = ceil($totalRecords / $itemsPerPage);

        $pagination = '<div id="paginationDiv">
                    <p>Page ' . $page . ' of ' . $totalPages . '</p>
                    <div>
                        <button class="prevBtn" ' . ($page == 1 ? 'disabled' : ' ') . '>Back</button>
                        <button class="nextBtn" ' . ($page == $totalPages ? 'disabled' : ' ') . '>Next</button>
                    </div>
                </div>';

        echo json_encode(["success" => "Data fetched successfully", "data" => $data . $pagination]);
    } else {
        echo json_encode(["message" => "No data found"]);
    }

    $stmt->close();
    if (isset($countStmt)) {
        $countStmt->close();
    }
}

function fetchBySearch($conn) {
    // Implement search functionality
}
?>
