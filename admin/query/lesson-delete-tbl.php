<?php include_once('../../database/config.php'); ?>

<?php
session_start();
/*$id=$_GET['id']; */
$lesson_id = $_POST['lesson_id'];

$sql = "DELETE FROM lesson_tbl WHERE lesson_id='" . $lesson_id . "'";
if (mysqli_query($mysqli, $sql)) {
    echo "Record deleted successfully";
    header("Location: ../home-admin.php?page=samplepage1");
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>