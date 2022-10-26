<?php include_once('../database/config.php'); ?>

<?php
if (isset($_POST['user_id'])) {

    $email =  mysqli_real_escape_string($mysqli, $_POST['email']);
    $contact_no =  mysqli_real_escape_string($mysqli, $_POST['contact_no']);




    /*$query = "UPDATE user set  user.username='" . $username . "', prfl.fname='" . $fname . "', prfl.lname='" . $lname . "' FROM user_tbl as user
INNER JOIN student_faculty_profile_tbl as prfl
ON user.user_id = prfl.user_id WHERE user.user_id =; // update form data from the database*/

    /*$query = "UPDATE user_tbl as user
INNER JOIN student_faculty_profile_tbl as prfl ON user.user_id = prfl.user_id
SET user.username = $username, prfl.fname = $fname, prfl.lname = $lname
WHERE user.user_id ";*/

    $query = "UPDATE user_tbl as user
INNER JOIN student_faculty_profile_tbl as prfl ON user.user_id = prfl.user_id  set  user.email='" . $email . "', prfl.contact_no='" . $contact_no . "' WHERE user.user_id = '" . $_POST['user_id'] . "'"; // update form data from the database

    /*$query = "UPDATE user_tbl set  username='" . $username . "' WHERE user_id='" . $_POST['user_id'] . "'"; // update form data from the database */


    $res = mysqli_query($mysqli, $query);


    if ($res) {

        echo json_encode($res);
    } else {

        echo "Error: " . $sql . "" . mysqli_error($mysqli);
    }
}

?>
