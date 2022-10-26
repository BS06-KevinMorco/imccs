<?php include_once('../../database/config.php'); ?>

<?php
 
    $question_id = $_POST['question_id'];

    $query="SELECT * from assessment_question_tbl WHERE question_id = '" .$question_id. "'";


    $result = mysqli_query($mysqli,$query);

    $get_id = mysqli_fetch_array($result);

    if($get_id) {

     echo json_encode($get_id);

    } else {

     echo "Error: " . $sql . "" . mysqli_error($mysqli);

    }
 
?>