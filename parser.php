<?php

include_once 'dbconfig.php';
session_start();

$current_user_id = $_SESSION['u_id'];
$current_user_name = $_SESSION['u_name'];
echo $current_user_name;


//Get user category and re-direct

$sql = " SELECT user_id , idno , user_level FROM users WHERE user_id = '$current_user_id' AND idno = '$current_user_name' LIMIT 1 ";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) > 0) {
	foreach ($query as $user) {
	$user_cat = $user['user_level'];
	}
	// Assign dashboard

	if ($user_cat == 'teacher') {//Teacher is logged in
		header('location:teacher.php');
	}elseif ($user_cat == 'parent') {
		header('location:parent.php');
	}else{
		header('location:login.php');
	}
}else{
	header('location:login.php');
}
?>