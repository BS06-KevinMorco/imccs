
<?php


if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
    $password = mysqli_real_escape_string($mysqli, $_POST['password']);
    $sql = "SELECT * FROM user_tbl INNER JOIN student_faculty_profile_tbl WHERE user_tbl.user_id = student_faculty_profile_tbl.user_id AND email = '$email'";
    $result = mysqli_query($mysqli, $sql);
    /*$row = mysqli_fetch_array($result);
    $no_rows = mysqli_num_rows($result); */

    /* Will change to prepared statement as development goes by
    $stmt = mysqli_prepare($mysqli, "SELECT username, password, usertype FROM user_tbl WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password, $usertype);
    $stmt->store_result();
    
    $row = $stmt->fetch_array();
    if ($stmt->num_rows){
    header("location:admin/home-admin.php");

    }
    
    */

    /*if ($username != '' and $password != '') {
        if ($no_rows == 1 && $row["usertype"] == "Student") {

            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];
            header("location:section-pages/student-dashboard.php");
        } else if ($no_rows == 1 && $row["usertype"] == "admin") {

            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['usertype'] = $row['usertype'];
            header("location:admin/home-admin.php");
        } else {
            $_SESSION['errMsg'] = "Invalid Username or Password";
            $_SESSION['success'] = 'danger';

            header("location:index.php?page=login");
        }
    } else {
        $_SESSION['errMsg'] = "Please fill up all the fields";
        header("location:index.php?page=login");
    }*/

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if (password_verify($password, $row["password"]) && $row["usertype"] == "Student") {
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['usertype'] = $row['usertype'];
                header("location:home-student.php?page=student-welcome-page");
            } else if (password_verify($password, $row["password"]) && $row["usertype"] == "Faculty") {
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['usertype'] = $row['usertype'];
                header("location:home-student.php?page=student-welcome-page");
            }else if(password_verify($password, $row["password"]) && $row["usertype"] == "Admin"){
                $_SESSION['loggedin'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['usertype'] = $row['usertype'];
                header("location:admin/home-admin.php?page=admin-dashboard");
            }else{
                $_SESSION['errMsg'] = "Invalid Username or Password";
                $_SESSION['success'] = 'danger';
                header("location:index.php?page=login");
            }
        }
    } else {
        $_SESSION['errMsg'] = "This Account Doesn't Exist";
        $_SESSION['success'] = 'danger';
        header("location:index.php?page=login");
    }
}
