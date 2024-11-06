<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

include "config.php";

$sql = "SELECT * FROM employees"; // Add space after *

$result = mysqli_query($conn, $sql);

if (!$result) {
    echo json_encode(array('message' => 'Query execution failed', 'status' => false, 'error' => mysqli_error($conn)));
    exit();
}

if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result, MYSQLI_ASSOC); // Convert to multi-dimensional associative array
    echo json_encode($output); // Convert array to JSON
} else {
    echo json_encode(array('message' => 'No record found', 'status' => false));
}

?>
