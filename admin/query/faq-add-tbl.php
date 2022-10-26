<?php include_once('../../database/config.php'); ?>

<?php
$title =   mysqli_real_escape_string($mysqli,$_POST['title']);
$description =  mysqli_real_escape_string($mysqli,$_POST['description']);
$timestamp = date("Y-m-d H:i:s");

$sql = "INSERT INTO faq_tbl(title, description, created_at) 
	VALUES ('$title','$description','$timestamp')";
if (mysqli_query($mysqli, $sql)) {
    echo json_encode(array("statusCode" => 200));
} else {
    echo json_encode(array("statusCode" => 201));
}
mysqli_close($mysqli);
?>