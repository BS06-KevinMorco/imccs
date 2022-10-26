<?php include_once('../../database/config.php'); ?>

<?php
if (isset($_POST['institution_id'])) {
    $name =  mysqli_real_escape_string($mysqli, $_POST['name']);
    $code =  mysqli_real_escape_string($mysqli, $_POST['code']);
    $street_name =  mysqli_real_escape_string($mysqli, $_POST['street_name']);
    $barangay =  mysqli_real_escape_string($mysqli, $_POST['barangay']);
    $municipality =   mysqli_real_escape_string($mysqli, $_POST['municipality_city']);
    $province =   mysqli_real_escape_string($mysqli, $_POST['province']);
    $status =  mysqli_real_escape_string($mysqli, $_POST['status']);

    $query = "UPDATE institution_tbl set  name='" . $name . "', code='" . $code . "', street_name='" . $street_name . "', barangay='" . $barangay . "', municipality_city='" . $municipality . "', province='" . $province . "',status='" . $status . "' WHERE institution_id='" . $_POST['institution_id'] . "'"; // update form data from the database


    $res = mysqli_query($mysqli, $query);

    if ($res) {

        echo json_encode(array("Institution Added"));
    } else {

        echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
}

?>
