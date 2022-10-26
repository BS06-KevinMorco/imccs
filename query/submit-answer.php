<?php include_once('../database/config.php');?>

<?php
if (isset($_POST['user_id'])) {
    mysqli_autocommit($mysqli, FALSE);
    $user_id =  mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $assessment_id =  mysqli_real_escape_string($mysqli, $_POST['assessment_id']);

    //$checkAssessmentChosen = mysqli_query($mysqli, "select count(*) as institution_cnt FROM assessment_chosen WHERE user_id = 726  AND assessment_id = 37 ");
    $checkAssessmentChosen = mysqli_query($mysqli, "select * FROM assessment_chosen WHERE user_id = '$user_id'  AND assessment_id = '$assessment_id' ");
    $rowcount=mysqli_num_rows($checkAssessmentChosen);

    foreach ($_REQUEST['answer'] as $key => $value) {
        $question_id = $_POST['question_id'][$key];

        $insert1 = mysqli_query($mysqli, "INSERT INTO answer_tbl(user_id, assessment_id,question_id,question_answer) 
    VALUES ('$user_id','$assessment_id','$question_id','$value')");
    }
    $insert2 = mysqli_query($mysqli, "INSERT INTO assessment_chosen(user_id,assessment_id)  VALUES('$user_id','$assessment_id') ");


    if ($rowcount == 0) {
        if ($insert1 && $insert2) {
            echo json_encode(array("NotTaken"));
            mysqli_query($mysqli, "COMMIT");

        }
    } else if($rowcount > 0) {
        echo json_encode(array("Taken"));
        mysqli_query($mysqli, "ROLLBACK");

    }
    

}
mysqli_query($mysqli, "SET AUTOCOMMIT=1");
mysqli_close($mysqli);
?>