<?php
require 'dbconfig.php';

if( isset($_SESSION['u_id']) ){

  $user = $_SESSION['u_id'];
  $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$user' LIMIT 1 ");
  $count = mysqli_num_rows($query);

  if ($count > 0) {
   while ( $data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
     $logged_in_user = $data['fname']." ".$data['lname'];
     $user_level = $data['user_level'];
   }
  }elseif ($count < 1) {
    echo "No user";
  }
}
?>