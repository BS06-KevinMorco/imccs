<?php include_once('../../database/config.php'); ?>

<?php
if (isset($_POST['user_id'])) {

    $fname =  mysqli_real_escape_string($mysqli, $_POST['fname']);
    $lname =  mysqli_real_escape_string($mysqli, $_POST['lname']);
    $institution =   mysqli_real_escape_string($mysqli, $_POST['institution']);
    $grade_level =   mysqli_real_escape_string($mysqli, $_POST['grade_level']);
    $email =   mysqli_real_escape_string($mysqli, $_POST['email']);
    $contact =   mysqli_real_escape_string($mysqli, $_POST['contact']);
    $username =   mysqli_real_escape_string($mysqli, $_POST['username']);



    /*$query = "UPDATE user set  user.username='" . $username . "', prfl.fname='" . $fname . "', prfl.lname='" . $lname . "' FROM user_tbl as user
INNER JOIN student_faculty_profile_tbl as prfl
ON user.user_id = prfl.user_id WHERE user.user_id =; // update form data from the database*/

    /*$query = "UPDATE user_tbl as user
INNER JOIN student_faculty_profile_tbl as prfl ON user.user_id = prfl.user_id
SET user.username = $username, prfl.fname = $fname, prfl.lname = $lname
WHERE user.user_id ";*/

    $query = "UPDATE user_tbl as user
INNER JOIN student_faculty_profile_tbl as prfl ON user.user_id = prfl.user_id  set  prfl.fname='" . $fname . "', prfl.lname='" . $lname . "' , prfl.institution='" . $institution . "',
prfl.grade_level='" . $grade_level . "', prfl.username='" . $username . "', prfl.contact_no='" . $contact . "',user.email='" . $email . "' WHERE user.user_id = '" . $_POST['user_id'] . "'"; // update form data from the database

    /*$query = "UPDATE user_tbl set  username='" . $username . "' WHERE user_id='" . $_POST['user_id'] . "'"; // update form data from the database */


    $res = mysqli_query($mysqli, $query);


    if ($res) {

        echo json_encode($res);
    } else {

        echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
}

?>
