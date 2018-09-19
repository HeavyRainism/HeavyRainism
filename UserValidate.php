UserValidate.php
<?php
	$con = mysqli_connect("localhost", "root", "dbalsgh2", "root");

	$userID = $_POST["userID"];
	$userPassword = $_POST["userPassword"];
	$userGender = $_POST["userGender"];
	$userMajor = $_POST["userMajor"];
	%userEmail = $_POST["userEmail"];

	$statement = mysqli_prepare($con, "INSERT INTO USER VALUES (?, ?, ?, ?, ?)");
	mysqli_stmt_bind_param($statement, "sssss". $userID, $userPassword, $userGender, $userMajor, $userEmail);
	mysqli_stmt_excute($statement);

	$response = array();
	$response["success"] = true;

	while(mysqli_stmt_fetch($statement)){
		$response["success"] = false;
		$response["userID"] = $userID;
	}

	echo json_encode($response);
?>