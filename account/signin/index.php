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


if (isset($_POST["phone_no"])){
	if (in_array($_POST["phone_no"], $visitor_list)){
		$response_code = 200;
		$response_array = array(
 			"message" => "signed in successfully",
 			"visitor_id" => array_search($_POST["phone_no"], $visitor_list),
 			"status_code" => "01"
 		);		
	}else{
		$response_code = 400;
		$response_array = array(
 			"message" => "account does not exist",
 			"status_code" => "01"
 		);
	}	
}else{
	$response_code = 400;
	$response_array = array(
 		"message" => "phone_no parameter is required",
 		"status_code" => "00"
 	);
}

http_response_code($response_code);
echo json_encode($response_array);




?>