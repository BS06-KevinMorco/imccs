<?php include_once('../../database/config.php'); ?>

<?php
/*
$datas = explode('|',$_POST['title']);
$assessment_id = $datas[0];
$title = $datas[1];
*/

if (isset($_POST['question_id'])) {
    $datas = explode('|', $_POST['assessment_title']);
    $assessment_id = $datas[0];
    $title = $datas[1];

    $assessment_question =  mysqli_real_escape_string($mysqli, $_POST['assessment_question']);
    $ch1 =  mysqli_real_escape_string($mysqli, $_POST['assessment_choice1']);
    $ch2 =  mysqli_real_escape_string($mysqli, $_POST['assessment_choice2']);
    $ch3 =  mysqli_real_escape_string($mysqli, $_POST['assessment_choice3']);
    $ch4 =  mysqli_real_escape_string($mysqli, $_POST['assessment_choice4']);
    $answer =  mysqli_real_escape_string($mysqli, $_POST['assessment_answer']);

    //$timestamp = date("Y-m-d H:i:s");

    $sql = "UPDATE assessment_question_tbl set assessment_id='" . $assessment_id . "', assessment_title='" . $title . "',  assessment_question='" . $assessment_question . "', assessment_choice1='" . $ch1 . "', assessment_choice2='" . $ch2 . "', assessment_choice3='" . $ch3 . "', assessment_choice4='" . $ch4 . "', assessment_answer='" . $answer . "' WHERE question_id='" . $_POST['question_id'] . "'"; // update form data from the database



    if (mysqli_query($mysqli, $sql)) {
        echo json_encode(array("statusCode" => 200));
    } else {
        echo json_encode(array("statusCode" => 201));
    }
    mysqli_close($mysqli);
}
?>
