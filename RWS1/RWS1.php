<?php
header("Content-Type:application/json");
if (isset($_GET['account_id']) && $_GET['account_id']!="") {
	include('db.php');
	$account_id = $_GET['account_id'];
	$result = mysqli_query($conn,"SELECT * FROM `user` WHERE id=$account_id");
	if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_array($result);
	$email = $row['email'];
	$psw = $row['psw'];
   $response_code = $row['response_code'];
	$response_desc = $row['response_desc'];
	
	response($account_id, $email,$psw,$response_code,$response_desc);
	mysqli_close($conn);
	}else{
		response(NULL, NULL,NULL,200,"No Record Found");
		}
}else{
	response(NULL, NULL,NULL,400,"Invalid Request");
	}

function response($account_id,$email,$psw,$response_code,$response_desc)
{
	$response['account_id'] = $account_id;
	$response['$psw'] = $psw;
    $response['$email'] = $email;
    $response['response_code'] = $response_code;
	$response['response_desc'] = $response_desc;
	$json_response = json_encode($response);
	echo $json_response;
}
?>