<?php include_once('../../database/config.php'); ?>

<?php
	$name=$_POST['name'];
	$address=$_POST['address'];
    $timestamp = date("Y-m-d H:i:s");

	$sql = "INSERT INTO test_institution( name, address, created_at) 
	VALUES ('$name','$address','$timestamp')";
	if (mysqli_query($mysqli, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($mysqli);
?>