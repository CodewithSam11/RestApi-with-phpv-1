<?php

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, X-Requested-with'); 

$data = json_decode(file_get_contents("php://input"),true);   //i have used this code bcoz i dont't know how i am geting th input that's why i have used this 

$employee_name = $data['ename'];
$employee_age = $data['eage'];
$employee_country = $data['ecountry'];

include "config.php";

$sql = "INSERT into employees(name, age, country) Values('{$employee_name}',{$employee_age},'{$employee_country}')"; 

if(mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student record inserted', 'status' => true));
} else {
    echo json_decode(array('message' => 'Student record not inserted.', 'status' => false));
}

?>