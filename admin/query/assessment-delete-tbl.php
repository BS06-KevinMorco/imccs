<?php include_once('../../database/config.php'); ?>

<?php
session_start();
/*$id=$_GET['id']; */
$assessment_id = $_POST['assessment_id'];


$sql = "DELETE FROM assessment_tbl WHERE assessment_id='" . $assessment_id . "'";
if (mysqli_query($mysqli, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>