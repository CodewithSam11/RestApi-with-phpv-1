<!--  this is for the single record -->

<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, X-Requested-with'); 

$data = json_decode(file_get_contents("php://input"),true);

$employee_id = $data["eid"];   /// i will pass the sid key in the form data in the postman 

include "config.php";

$sql = "DELETE FROM employees where id = {$employee_id}"; 

if(mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student record deleted successfully', 'status' => true));
} else {
    echo json_decode(array('message' => 'Student record not deleted.', 'status' => false));
}
////////////////////////  there is no validation checks and existence check otherwise code is perfect////////////
?>