<?php include_once('../../database/config.php'); ?>

<?php
session_start();
/*$id=$_GET['id']; */
$institution_id = $_POST['institution_id'];

$sql = "DELETE FROM institution_tbl WHERE institution_id='" . $institution_id . "'";
if (mysqli_query($mysqli, $sql)) {
    echo "Record deleted successfully";
    header("Location: ../home-admin.php?page=samplepage1");
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>