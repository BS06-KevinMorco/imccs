<?php include_once('../database/config.php'); ?>

<?php
if (isset($_POST['user_id'])) {
    $unlockcourse = false;

    $user_id =  mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $lesson_id =  mysqli_real_escape_string($mysqli, $_POST['lesson_id']);
    $checkLesson = mysqli_query($mysqli, "SELECT lesson_id, user_id from topic_chosen WHERE user_id='$user_id' AND lesson_id=$lesson_id");
    $sql = "INSERT INTO topic_chosen(user_id, lesson_id) 
    VALUES ('$user_id','$lesson_id')";
    if (mysqli_num_rows($checkLesson) == 0) {
        if (mysqli_query($mysqli, $sql)) {
            $unlockcourse = false;
            echo json_encode(array("statusCode" => 200));
        }
    } else {
        $unlockcourse = true;
        echo json_encode(array("You have already taken this topic"));
    }
    
}
mysqli_close($mysqli);
?>