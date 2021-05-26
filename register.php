<?php
include_once 'header.php';
if( isset( $_POST['register']))
{
  include 'dbconfig.php';
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
//Declare Variables for Personal Details

 $fname = ucfirst(validate_data( $_POST['fname'] ));
 $sname = ucfirst(validate_data( $_POST['sname'] ));
 $contact = ucfirst(validate_data( $_POST['contact'] ));
 $ID = validate_data( $_POST['idno'] );
 $location = validate_data( $_POST['location'] );
 $gender = validate_data( $_POST['sex'] );

  // Set user level depending of the tsc_no

  if (empty($_POST['tsno'])) {
    $tsc = "nill";
    $user_level = "parent";
  }elseif (!empty($_POST['tsno'])) {
    $tsc =validate_data($_POST['tsno']);
    $user_level = "teacher";
  }
 #########################################################
 //Handle form empty submissions
 
if(empty($fname) && empty($sname) && empty($ID) && empty($contact) && empty($gender) && empty($location)){
 $message = '<p style="color:red;text-align:center;">Sorry provide required fields !</p>';
}else{
        // Handle Passwords 
        if ($_POST['password'] !== $_POST['re-password']) {
            $message = '<p style="color:red;text-align:center;">Sorry passwords do no match !</p>';
          }else{
             $password =  hash('sha256', $_POST['password']);
          }
  /*End Form Empty Handling*/
  ###########################################################
 
/*Confirm if the user has already register to avoid duplication of data*/
include 'dbconfig.php';
$sql_ ="SELECT * FROM `users` WHERE idno = '$ID' LIMIT 1";
$query_ = mysqli_query($conn,$sql_);
$count_ = mysqli_num_rows($query_);
if ($count_ > 0) {
  //avoid double registration
 $message = '<p style="color:red;text-align:center;">Sorry ,there is a valid user !</p>';
  //exit();
}elseif($count_ < 1){
         // GET USER IP ADDRESS
        $ip = preg_replace('#[^0-9.]#', '', getenv('REMOTE_ADDR'));


          $sql = "INSERT INTO `users` (`user_id`, `fname`, `lname`, `contacts`, `idno`, `location`, `ip_address`, `tsc_no`, `sex`, `user_level`, `password`) 
            VALUES (NULL, '$fname', '$sname','$contact', '$ID', '$location', '$ip' ,'$tsc', '$gender', '$user_level', '$password')";
         
             $insertdata = mysqli_query($conn,$sql);
             if ($insertdata == true) {
            		$message = ' <p style="color:forestgreen;text-align:center;">Successfully Registered ,Thank you !</p>';
                header('Location:login.php?login=success');
            }else{
	       $message = ' <p style="color:red;text-align:center;">Registration failed !</p>';
      }
    }
  }
}
?>
<?php 
if (!empty($message)) {
  echo $message;
}
?>
	
    <div class="header bg-white" style="border: none;">

      <h3 style="font-size: 24px;color: red; font-weight: bold; font-family: 'Zen Dots', cursive; text-align: center;">
        <img src="img/logo.png" width="100" height="80"><br>
      E-tutor 
    </h3>
      <address align="center"><?php if (isset($error)) {
        echo $error;
      }else{
        echo "IDEATE. INTERNALIZE. MAKE";
      } ?></address>
    </div>
  <div class="container">
    <div class="card">
      <div class="card-body">
        <form action="" method="post">
          <div class="row">
          <div class="col">
            <label class="form-label text-primary">Fisrtname</label>
          <input type="text" class="form-control" placeholder="E.g John" required="" name="fname">
          </div>
          <div class="col">
            <label class="form-label text-primary">Lastname</label>
          <input type="text" class="form-control" placeholder="E.g Doe" required="" name="sname">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label class="form-label text-primary">National ID</label>
          <input type="text" class="form-control" placeholder="E.g 234444" required="" name="idno">
          </div>
          <div class="col">
            <label class="form-label text-primary">TSC No. (If parenet leave blank !)</label>
          <input type="text" class="form-control" placeholder="E.g 3433." name="tsno">
          </div>
        </div>

        <div class="row">
          <div class="col">
            <label class="form-label text-primary">Location</label>
          <input type="text" class="form-control" placeholder="E.g Bumala" required="" name="location">
          </div>
          <div class="col">
            <label class="form-label text-primary">Gender</label>
          <select class="form-control" name="sex" required="">
            <option value="M">Male</option>
            <option value="F">Female</option>
            <option value="O">Others</option>
          </select>
          </div>
        </div>

        
        <div class="form-group">
          <label class="form-label text-primary">Email / Mobile</label>
          <input type="text" class="form-control" placeholder="07 xxx xxx" required="" name="contact">
        </div>

        <div class="row">
          <div class="col">
            <label class="form-label text-primary">Password</label>
            <input type="password" class="form-control" placeholder="" required="" name="password">
          </div>
          <div class="col">
             <label class="form-label text-primary">Re-Password</label>
             <input type="password" class="form-control" placeholder="" required="" name="re-password">
          </div>
        </div>
        <br>
        <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-danger" name="register">Register</button>
       </div>

        </form>
      </div>
    </div>
    
        <div class="card-footer">
        	 <p class="text-info">Already a member ? <a href="./"><i>Login Here</i></a></p>
        </div>
      
    </div>

   
</body>
</html>