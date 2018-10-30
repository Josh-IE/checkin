<?php
include_once ('../../includes/database.php');

$method = $_SERVER['REQUEST_METHOD'];
if ($method != 'POST'){
	$response_code = 405;
	$response_array = array(
 		"message" => "this method is not allowed",
 		"status_code" => "00"
 	);
 	http_response_code($response_code);
	echo json_encode($response_array);
}


if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phone_no"]) ){
	//generate id, insert into empolyee_list variable
	$response_code = 200;
	$response_array = array(
 		"message" => "signed up successfully",
 		"visitor_id" => rand(pow(10, $digits-1), pow(10, $digits)-1),
 		"status_code" => "01"
 	);
}else{
	$response_code = 400;
	$response_array = array(
 		"message" => "missing parameter. name, email, phone number required",
 		"status_code" => "00"
 	);
}

http_response_code($response_code);
echo json_encode($response_array);





?>
