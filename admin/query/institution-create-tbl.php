<?php include_once('../../database/config.php'); ?>

<?php
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$code = substr(str_shuffle($chars), 0, 8);
$name =  mysqli_real_escape_string($mysqli,$_POST['name']);
$street_name =  mysqli_real_escape_string($mysqli,$_POST['street_name']);
$barangay =  mysqli_real_escape_string($mysqli,$_POST['barangay']);
$municipality =   mysqli_real_escape_string($mysqli,$_POST['municipality_city']);
$province =   mysqli_real_escape_string($mysqli,$_POST['province']);
$status =  mysqli_real_escape_string($mysqli,$_POST['status']);
$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO institution_tbl(code, name, street_name, barangay, municipality_city, province, status, created_at) 
	VALUES ('$code','$name','$street_name','$barangay','$municipality','$province','$status','$timestamp')";
if (mysqli_query($mysqli, $sql)) {
    echo json_encode(array("Institution Added"));
} else {
    echo json_encode(array("Institution Not Added"));
}
mysqli_close($mysqli);
?>