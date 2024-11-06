<!--  this is for the single record -->

<?php

// {
//     "id" : "1"
// };                         i will send the data in form data in the postman for single record

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// $data = json_decode(file_get_contents("php://input"),true); these two lines used for post only we can do by GET using this below mentioned in line 16

// $search_value = $data["search"];   /// i will pass the sid key in the form data in the postman 

$search_value = isset($_GET['search']) ? $_GET['search'] : die();
// passing in the api http://localhost/php-restApi/api-search.php?search=suhail

include "config.php";

$sql = "SELECT * FROM employees where name LIKE '%{$search_value}%'"; 

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