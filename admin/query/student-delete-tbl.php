<?php include_once('../../database/config.php'); ?>

<?php
session_start();
/*$id=$_GET['id']; */
$user_id = $_POST['user_id'];

$sql = "DELETE FROM user_tbl WHERE user_id='" . $user_id . "'";
if (mysqli_query($mysqli, $sql)) {
    echo "Record deleted successfully";
    header("Location: ../home-admin.php?page=samplepage1");
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>