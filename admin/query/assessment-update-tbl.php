<?php include_once('../../database/config.php'); ?>

<?php
if (isset($_POST['assessment_id'])) {
    $title =  mysqli_real_escape_string($mysqli, $_POST['title']);
    $description =  mysqli_real_escape_string($mysqli, $_POST['description']);
    $difficulty =  mysqli_real_escape_string($mysqli, $_POST['difficulty']);
    $estimatedTime =  mysqli_real_escape_string($mysqli, $_POST['estimated_time']);
    $unit_time =  mysqli_real_escape_string($mysqli, $_POST['unit_time']);
    $status =  mysqli_real_escape_string($mysqli, $_POST['status']);

    $questionImg = ($_FILES['update_img']['name']);


    $query = "UPDATE assessment_tbl set  title='" . $title . "', description='" . $description . "', difficulty='" . $difficulty . "', estimated_time='" . $estimatedTime . "', unit_time='" . $unit_time . "', question_img='" . $questionImg . "' , status='" . $status . "'WHERE assessment_id='" . $_POST['assessment_id'] . "'"; // update form data from the database

    $dir = "../assets/img/";
    $imagelocation = $dir . basename($_FILES['update_img']['name']);
    $extension = pathinfo($imagelocation, PATHINFO_EXTENSION);
    if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg') {
        echo "Upload only jpg,jpeg And png";
    } else {
        if (move_uploaded_file($_FILES['update_img']['tmp_name'], $imagelocation)) {
            if (mysqli_query($mysqli, $query)) {
                echo json_encode(array("statusCode" => 200));
            }
        } else {

            echo "ERROR";
        }
    }

    $res = mysqli_query($mysqli, $query);

    if ($res) {

        echo json_encode($res);
    } else {

        echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
}

?>
