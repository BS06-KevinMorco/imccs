<?php include_once('../../database/config.php'); ?>

<?php
session_start();
/*$id=$_GET['id']; */
$id = $_POST['id'];

$sql = "DELETE FROM faq_tbl WHERE id='" . $id . "'";
if (mysqli_query($mysqli, $sql)) {
    echo "Record deleted successfully";
    header("Location: ../home-admin.php?page=samplepage1");
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>