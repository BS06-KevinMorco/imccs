<?php include_once('../../database/config.php'); ?>

<?php
$name = $_POST['name'];
$address = $_POST['address'];

$query = "UPDATE test_institution set  name='" . $name . "', address='" . $address . "' WHERE id='" . $_POST['id'] . "'"; // update form data from the database


$res = mysqli_query($mysqli, $query);

if ($res) {

    echo json_encode($res);

} else {

    echo "Error: " . $sql . "" . mysqli_error($mysqli);
}



?>
