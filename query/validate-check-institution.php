<?php include_once('../database/config.php'); ?>

<?php

if(isset($_POST['institution'])){
   $institution = mysqli_real_escape_string($mysqli,$_POST['institution']);

   $query = "select count(*) as institution_cnt from institution_tbl where name='".$institution."'";

   $result = mysqli_query($mysqli,$query);
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['institution_cnt'];
    
      if($count > 0){
         echo json_encode(array("Institution Exists"));
      }else{
         echo json_encode(array("Institution Doesnt Exist"));
      }
   
   }

   die;
}