<?php include_once('../../database/config.php'); ?>

<?php

if(isset($_POST['username'])){
   $username = mysqli_real_escape_string($mysqli,$_POST['username']);

   $query = "select count(*) as username_cnt from user_tbl where username='".$username."'";

   $result = mysqli_query($mysqli,$query);
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['username_cnt'];
    
      if($count > 0){
         echo json_encode(array("Username Exist"));
      }else{
         echo json_encode(array("Username Doesn't Exist"));
      }
   
   }
   

   die;
}