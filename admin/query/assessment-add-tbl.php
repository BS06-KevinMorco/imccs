My Drive
<?php include_once('../../database/config.php'); ?>

<?php

$title =   mysqli_real_escape_string($mysqli, $_POST['title']);
$description =  mysqli_real_escape_string($mysqli, $_POST['description']);
$difficulty =  mysqli_real_escape_string($mysqli, $_POST['difficulty']);
$estimated_time =  mysqli_real_escape_string($mysqli, $_POST['estimated_time']);
$unit_time =  mysqli_real_escape_string($mysqli, $_POST['unit_time']);
$status =  mysqli_real_escape_string($mysqli, $_POST['status']);


$timestamp = date("Y-m-d H:i:s");
$pic=($_FILES['img']['name']);


$sql = "INSERT INTO assessment_tbl(title, description, difficulty, estimated_time,unit_time,  question_img, status, created_at) 
	VALUES ('$title','$description','$difficulty','$estimated_time','$unit_time','$pic','$status','$timestamp')";


    $dir = "../assets/img/";
    $imagelocation = $dir . basename($_FILES['img']['name']);
    $extension = pathinfo($imagelocation, PATHINFO_EXTENSION);
    if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
        echo "Upload only jpg,jpeg And png";
    } else {
        if (move_uploaded_file($_FILES['img']['tmp_name'], $imagelocation)) {
            if (mysqli_query($mysqli, $sql)) {
                echo json_encode(array("statusCode" => 200));
            }
        } else {

            echo "ERROR";
        }
    }

    
mysqli_close($mysqli);


?>