<?php include_once('../database/config.php'); ?>

<?php
if (!empty($_POST)) {
    mysqli_autocommit($mysqli, FALSE);

    $email = mysqli_real_escape_string($mysqli, ($_POST['email']));
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    $usertype = mysqli_real_escape_string($mysqli, ucwords($_POST['usertype']));
    $fname = mysqli_real_escape_string($mysqli, ucwords($_POST['fname']));
    $lname = mysqli_real_escape_string($mysqli, ucwords($_POST['lname']));
    $institution = mysqli_real_escape_string($mysqli, ucwords($_POST['institution']));
    $grade_level = mysqli_real_escape_string($mysqli, ucwords($_POST['grade_level']));
    $username = mysqli_real_escape_string($mysqli, ($_POST['username']));
    $contact = mysqli_real_escape_string($mysqli, $_POST['contact']);
    $date = date("Y-m-d H:i:s");

    $checkInstitution = mysqli_query($mysqli, "SELECT name from institution_tbl WHERE name='$institution'");

    $checkEmail = mysqli_query($mysqli, "SELECT email from user_tbl WHERE email='$email'");
    // Insert some values
    $insert1 = mysqli_query($mysqli, "INSERT INTO user_tbl (email,password, usertype, created_at)
       VALUES ('$email','$hash','$usertype','$date')");
    $insert2 = mysqli_query($mysqli, "INSERT INTO student_faculty_profile_tbl (user_id, fname, lname, institution, grade_level, username, contact_no, created_at)
       VALUES (LAST_INSERT_ID(),'$fname','$lname','$institution', '$grade_level', '$username', '$contact' ,'$date')");



    if (mysqli_num_rows($checkInstitution) == 1 && mysqli_num_rows($checkEmail) != 1 && strlen($username) >= 5 && strlen($contact) == 11) {
        if ($insert1 && $insert2) {
            echo json_encode(array("Existing Code"));
            mysqli_query($mysqli, "COMMIT");
        }
    } else if (strlen($username) < 5) {
        echo json_encode(array("Username Length is Invalid"));
        mysqli_query($mysqli, "ROLLBACK");
    } else if (strlen($contact) != 11) {
        echo json_encode(array("Contact Number Length is Invalid"));
        mysqli_query($mysqli, "ROLLBACK");
    } else if (mysqli_num_rows($checkEmail) == 1) {
        echo json_encode(array("Email Exists Already"));
        mysqli_query($mysqli, "ROLLBACK");
    } else {
        echo json_encode(array("No Existing Code"));
        mysqli_query($mysqli, "ROLLBACK");
    }
}
mysqli_query($mysqli, "SET AUTOCOMMIT=1");
mysqli_close($mysqli);
?>



