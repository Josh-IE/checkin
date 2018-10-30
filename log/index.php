<?php

$method = $_SERVER['REQUEST_METHOD'];
if ($method != 'GET'){
	http_response_code(405);
	echo json_encode(
 		array(
 			"message" => "this method is not allowed",
 			"status_code" => "00"
 		)
	);
}

if (isset($_POST["visitor_id"]) && isset($_POST["employee_id"]) && isset($_POST["purpose"])){
	http_response_code(200);
	echo json_encode(
 		array(
 			"message" => "successfully logged",
 			"status_code" => "01"
 		)
	);
}else{
	http_response_code(400);
	echo json_encode(
 		array(
 			"message" => "visitor_id, employee_id and purpose parameters are required",
 			"status_code" => "00"
 		)
	);
}






?>