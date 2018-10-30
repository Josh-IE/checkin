<?php

include_once ('../includes/database.php');

$method = $_SERVER['REQUEST_METHOD'];

//check method
if ($method != 'GET'){
	http_response_code(405);
	echo json_encode(
 		array(
 			"message" => "this method is not allowed",
 			"status_code" => "00"
 		)
	);
}


http_response_code(200);
echo json_encode(
	array(
		"status_code" => "01",
		"data" => $employee_list
	)
);





?>