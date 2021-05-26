<?php
session_start();
$user = $_SESSION['u_id'];
if( isset( $_POST['setprofile']))
{
  include 'dbconfig.php';
  include_once 'header.php';
function validate_data($data)
 {
 include 'dbconfig.php';
  $data = trim($data);
  $data = stripslashes($data);
  $data = strip_tags($data);
  $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($conn,$data);
  return $data;    
 }
 #########################################################
//Declare Variables 

 $title = ucfirst(validate_data( $_POST['title'] ));
 $pri = ucfirst(validate_data( $_POST['pri'] ));
 $sec = ucfirst(validate_data( $_POST['sec'] ));
 $col = validate_data( $_POST['col'] );
 $work = validate_data( $_POST['work'] );
 $exper = validate_data( $_POST['work_exp'] );

$county = ucfirst(validate_data( $_POST['county'] ));
 $subCounty = ucfirst(validate_data( $_POST['sub_county'] ));
 $street = ucfirst(validate_data( $_POST['street'] ));
 $HSE = validate_data( $_POST['houseno'] );
 $Mail = validate_data( $_POST['email'] );
 $phone1 = validate_data( $_POST['phone'] );
 $phone2 = validate_data( $_POST['phone-alt'] );
 $desc = validate_data( $_POST['desc'] );

 #########################################################
 //Handle form empty submissions
 
if(empty($title) || empty($pri) || empty($sec) || empty($col) || empty($work) || empty($exper) || empty($county) || empty($subCounty) || empty($street) || empty($Mail) || empty($phone1) || empty($phone2)||empty($desc)){
 $message = '<p style="color:red;text-align:center;">Sorry provide required fields !</p>';
}else{
  /*End Form Empty Handling*/
  ###########################################################
/*Confirm if the user has already register to avoid duplication of data*/

$sql_ ="SELECT * FROM `teacher_profile` WHERE u_id = '$user' LIMIT 1";
$query_ = mysqli_query($conn,$sql_);
$count_ = mysqli_num_rows($query_);
if ($count_ > 0) {
  //avoid double registration
 $message = '<p style="color:red;text-align:center;">Sorry ,Your Profile is Already Set !</p>';
 $link ='<a href="teacher.php" style="text-align: center;" class="btn btn-primary btn-flat">Exit</a>';
}elseif($count_ < 1){
         // GET USER IP ADDRESS
        $phones = $phone1."/".$phone2;
      
 $sql = "INSERT INTO `teacher_profile` (`u_id`, `title`, `pri_sch`, `sec_sch`, `post_sch`, `current_work`, `work_exp`, `county`, `sub_county`, `street`, `house_no`, `email`, `phones`, `other_desc`) 
  VALUES ('$user', '$title', '$pri', '$sec', '$col', '$work', '$exper', '$county', '$subCounty', '$street', '$HSE', '$Mail', '$phones', '$desc')";

             $insertdata = mysqli_query($conn,$sql);
             if ($insertdata == true) {
                $message = ' <p style="color:green;text-align:center;">Profile  was Set Successfully !</p>';
                 $link ='<a href="teacher.php" style="text-align: center;" class="btn btn-primary btn-flat">Exit</a>';
                //header('Location:login.php?login=success');
            }else{
	       $message = ' <p style="color:red;text-align:center;">Profile Set failed !</p>';
         $link ='<a href="teacher.php" style="text-align: center;" class="btn btn-danger btn-flat">TRY AGAIN</a>';
      }
    }
  }
}
?>
<div class="well">
  <?php 
if (!empty($message)) {
  echo $message;
}


?>
<div align="center">
   <?php 
if (!empty($link)) {
  echo $link;
}
  ?>
</div>

</div>
