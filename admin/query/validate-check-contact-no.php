<?php include_once('../../database/config.php'); ?>

<?php

if(isset($_POST['contact'])){
   $contact = mysqli_real_escape_string($mysqli,$_POST['contact']);

   $query = "select count(*) as contact_no_cnt from student_faculty_profile_tbl where contact_no='".$contact."'";

   $result = mysqli_query($mysqli,$query);
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['contact_no_cnt'];
    
      if($count > 0){
         echo json_encode(array("This Number is Already Registered"));
      }else{
         echo json_encode(array("This Number Doesn't Exist"));
      }
   
   }
   

   die;
}