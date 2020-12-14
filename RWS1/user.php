<?php
	// Connect to database
	include("db.php");
	$request_method = $_SERVER["REQUEST_METHOD"];

	function getUsers()
	{
		global $conn;
		$query = "SELECT * FROM `user`";
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function getUser($account_id=0)
	{   
		global $conn;
	
		if($account_id != 0)
		{
			$query="SELECT * FROM `user` WHERE account_id=$account_id";
		}
		$response = array();
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		header('Content-Type: application/json');
		echo json_encode($response, JSON_PRETTY_PRINT);
	}
	
	function AddUser()
	{
		global $conn;
		$id = $_POST["account_id"];
		$email = $_POST["email"];
		$psw = $_POST["psw"];
		
	
		echo $query="INSERT INTO user VALUES('".$id."', '".$email."','".$psw."')";
		if(mysqli_query($conn, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Produit ajouté avec succès.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'ERREUR!.'. mysqli_error($conn)
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	
	switch($request_method)
	{
		
		case 'GET':
			if(!empty($_GET["account_id"]))
			{
				$id=$_GET['account_id'];
				getUser($id);
			}
			else
			{
                getUsers();
            }
			
			break;
		default:
			header("HTTP/1.0 405 Method Not Allowed");
			break;
			
		case 'POST':
			AddUser();
			break;
			

	}
?>