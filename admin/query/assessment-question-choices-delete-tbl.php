<?php include_once('../../database/config.php'); ?>

<?php
session_start();
/*$id=$_GET['id']; */
$question_id = $_POST['question_id'];


$sql = "DELETE FROM assessment_question_tbl WHERE question_id='" . $question_id . "'";
if (mysqli_query($mysqli, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>