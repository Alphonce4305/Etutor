<?php 
error_reporting(0);
if ($_REQUEST['login']=='success') {
	$message = ' <p class="alert alert-success" style="color:forestgreen;text-align:center;">You Have Been Successfully Registered ,Thank you !</p>';
}
session_start();
if (isset($_SESSION['u_id'])) {
	header('Location:parser.php');
}
include_once 'dbconfig.php';
include_once 'header.php';
// CHECK IF USER SESSION IS STILL ACTIVE
if (isset($_POST['login'])){
	
	$uid = mysqli_real_escape_string($conn,$_POST['username']);
	$pwd = mysqli_real_escape_string($conn,$_POST['password']);

	//Error Handling
	//Empty fields
		if (empty($uid) || empty($pwd) ) {
			
			$error ="<p class='alert alert-warning'style='font-size:12px;text-align:center;'>All Fields Are Required!</p>";
		}else{
			$sql="SELECT user_id,idno,tsc_no,password FROM users WHERE idno ='$uid' OR tsc_no = '$uid'";
			$checkuser =mysqli_query($conn,$sql);
			$user_exist=mysqli_num_rows($checkuser);

			if ($user_exist < 1) {
				$error ="<p class='alert alert-danger'style='font-size:12px;text-align:center;'>Sorrry  No User With that Account !</p>";
			}else{
				if ($row=mysqli_fetch_array($checkuser,MYSQLI_ASSOC)){
					//Hashing password
					$hashed_password = hash('sha256', $pwd);
					$dbPass =  $row['password'];
				
					if ($hashed_password !== $dbPass){
						$error ="<p class='alert alert-danger'style='font-size:12px;text-align:center;'>Invalid Login Credentials !</p>";
						
					}elseif ( $hashed_password === $dbPass) {
						//Log user in
						$getUser = "SELECT user_id,idno,tsc_no,password FROM users WHERE password ='$dbPass' AND idno ='$uid' OR tsc_no ='$uid' LIMIT 1";
						$DBusers = mysqli_query($conn,$getUser);
						foreach ($DBusers as $user) {
							//initialize sessions
						$_SESSION['u_id'] =  $user['user_id'];
						$_SESSION['u_name'] = $user['idno'];
						
						}
						header('Location:parser.php');
					   	
					}else{
						header('Location:login.php?login=failed');
					}
				}
			}
		}

}
?>
<br><br> 
<?php echo $message;?>
<div class="container">
  <div class="card" >
  	<div class="card-header">
  		<h3 style="font-size: 24px;color: red; font-weight: bold; font-family: 'Zen Dots', cursive; text-align: center;">E-tutor </h3>
  		<address align="center"><?php if (isset($error)) {
  			echo $error;
  		}else{
  			echo "IDEATE. INTERNALIZE. MAKE";
  		} ?></address>
  	</div>
  			<div class="card">
  				<div class="card-body">
  					<form action="" method="POST">
					<div class="form-group"> 
						<label for="username" class="sr-only">Username</label>
						<input type="text" name="username" id="username"  class="form-control" placeholder="Enter ID NO / TSC NO" autocomplete="off" style="height: 45px;"> 
					</div><br>
					<div class="form-group"> 
						<label for="password" class="sr-only">Password</label>
						<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" style="height: 45px;"> 
					</div>
					<br>
						<input type="submit" name="login" value="Login" class="btn btn-primary">
				</form>
				<br>
						<small style="text-align: center;">Not member ?
							<a href="register.php" style="text-decoration: none;font-weight: bold;"> &nbsp;SIGNUP 
							</a>
							<span>&nbsp;</span>Forgot ? <a href="#" target="_self" style="text-decoration: none;font-weight: bold;">RESET</a>
						</small>
  				</div>		
				</div>	
		</div>
		 
	</div>
<?php include 'footer.php'; ?>