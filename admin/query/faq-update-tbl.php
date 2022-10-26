<?php include_once('../../database/config.php'); ?>

<?php
if (isset($_POST['id'])) {
    $title =  mysqli_real_escape_string($mysqli, $_POST['title']);
    $description =  mysqli_real_escape_string($mysqli, $_POST['description']);


    $query = "UPDATE faq_tbl set title='" . $title . "', description='" . $description . "' WHERE id='" . $_POST['id'] . "'"; // update form data from the database


    $res = mysqli_query($mysqli, $query);

    if ($res) {

        echo json_encode($res);
    } else {

        echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
}

?>
