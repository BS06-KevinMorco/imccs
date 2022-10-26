<?php include_once('../../database/config.php'); ?>

<?php
 
    $assessment_id = $_POST['assessment_id'];

    $query="SELECT * from assessment_tbl WHERE assessment_id = '" .$assessment_id. "'";


    $result = mysqli_query($mysqli,$query);

    $get_id = mysqli_fetch_array($result);

    if($get_id) {

     echo json_encode($get_id);

    } else {

     echo "Error: " . $sql . "" . mysqli_error($mysqli);

    }
 
?>