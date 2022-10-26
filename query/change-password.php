<?php
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $conn = new mySqli('localhost', 'root', '', 'capstone');
    if ($conn->connect_error) {
        die('Could not connect to the database');
    }

    $verifyQuery = $conn->query("SELECT * FROM user_tbl WHERE token = '$token'");

    if ($verifyQuery->num_rows == 0) {
        echo 'changed';
        exit();
    }

    if (isset($_POST['reset_pass'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['newpassword']);
        $hash = password_hash($password, PASSWORD_BCRYPT);



        $changeQuery = $conn->query("UPDATE user_tbl as user
            INNER JOIN student_faculty_profile_tbl as prfl ON user.user_id = prfl.user_id SET user.password = '$hash' WHERE prfl.email = '$email' and user.token = '$token'");

        if ($changeQuery) {
            echo '<script type="text/javascript">
            passChange();
               </script>';
        }
    }
    $conn->close();
} else {
    echo json_encode("wrong");
    exit();
}
?>