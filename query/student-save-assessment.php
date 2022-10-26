<?php include_once('../database/config.php'); ?>

<?php
if (isset($_GET['user_id'])) {

    $user_id =  mysqli_real_escape_string($mysqli, $_GET['user_id']);
    $assessment_id =  mysqli_real_escape_string($mysqli, $_GET['assessment_id']);
    $checkAssessment = mysqli_query($mysqli, "SELECT assessment_id, user_id from assessment_chosen WHERE user_id='$user_id' AND assessment_id='$assessment_id'");
    $checkAssessmentStatus = mysqli_query($mysqli, "SELECT * from assessment_tbl WHERE status = 'Active' AND assessment_id='$assessment_id'");


    if (mysqli_num_rows($checkAssessment) == 0) {
        if (mysqli_num_rows($checkAssessmentStatus) == 1) {
            echo json_encode(array("TakeNow"));
        } else {
            echo json_encode(array("Not Active"));
        }
    } else {
        echo json_encode(array("You have already taken this topic"));
    }
}
mysqli_close($mysqli);
?>