<?php include_once('../database/config.php'); ?>

<?php
if (isset($_POST['user_id'])) {

    $user_id =  mysqli_real_escape_string($mysqli, $_POST['user_id']);
    $lesson_id =  mysqli_real_escape_string($mysqli, $_POST['lesson_id']);
    $checkLesson = mysqli_query($mysqli, "SELECT lesson_id, user_id from topic_chosen WHERE user_id='$user_id' AND lesson_id=$lesson_id");
   
    if (mysqli_num_rows($checkLesson) == 0) {
        echo'lol';

    } else {
        echo'taken';

    }

    var_dump($checkLesson);
    
}
mysqli_close($mysqli);
?>