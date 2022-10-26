<?php include_once('../database/config.php'); ?>

<?php

if(isset($_POST['email'])){
   $email = mysqli_real_escape_string($mysqli,$_POST['email']);

   $query = "select count(*) as email_cnt from user_tbl where email='".$email."'";

   $result = mysqli_query($mysqli,$query);
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['email_cnt'];
    
      if($count > 0){
         echo json_encode(array("Email Exists"));
      }else{
         echo json_encode(array("This Email Doesn't Exist"));
      }
   
   }
   

   die;
}