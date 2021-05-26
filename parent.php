    

<?php
error_reporting(0);
session_start();

if ($_GET['msg']=='success') {
  $msg = "<p style='color:green;font-weight:bold;text-align:center;'>Operation completed successfully...</p>";
}elseif ($_GET['msg']=='failed') {
  $msg = "<p style='color:red;font-weight:bold;text-align:center;'>Oops ! uknown problem occured , try again later</p>";
}
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
include 'header.php';

?>
<?php

$query_bookings = mysqli_query($conn, "SELECT * FROM `bookings` WHERE parent_id = $user");
$getCount = mysqli_num_rows($query_bookings);

?>
<!--parents interface-------------------------------------------------------------------------------------------------------->
<!--Navigation-->
<?=require 'navbar2.php';?>
 <br><br><br>
<!--parents interface------------------------------------------------------------------------------------------>
<section id="parent">
  <h2 style="text-align:center;text-transform: uppercase;">Parent Dashboard</h2>
  <?php
echo $msg;
 ?>
<div class="container" style="padding-bottom: 40px;">
<div class="row">

<div style="clear: both;"></div>

<!-- teachers found -->
<div class="card">
<div class="card-body"> 
 
  <form action="" method="post">
    <select class="form-control sm" name="item-code">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
    </select>
    <br>
    <button type="submit" name="search" value="Search" class="btn btn-danger btn-sm pull-right">Search</button>
  </form> 
  
<h4>Teachers Found</h4>
      
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  <?php
  if (isset($_POST['search'])) {
    $item_code = $_POST['item-code'];
  }else{$item_code = null;}
         $x="1";
$sql = "SELECT * FROM `subjects` WHERE sub1 ='$item_code' OR sub2 ='$item_code' OR sub3 ='$item_code'OR sub4 ='$item_code' OR sub5 ='$item_code' OR sub6 ='$item_code' OR sub7 ='$item_code' OR sub8 ='$item_code' OR sub9 ='$item_code' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>
  <?php
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>
    
        <td><?php echo $x; $x++; ?>.</td>
        <td><?php 
           $teacher_id = $row['t_id'];
           $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$teacher_id'");
           foreach ($query as $data) {
            $teacher_found = $data['fname']." ".$data['lname'];
            echo $teacher_found;
           }

           ?></td>
         <td><?php 
           $teacher_id = $row['t_id'];
           $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$teacher_id'");
           foreach ($query as $data_) {
            $teacher_location = $data_['location'];
            echo $teacher_location;
           }

           ?></td>
         <td><?php 
           $teacher_id = $row['t_id'];
           $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$teacher_id'");
           foreach ($query as $_data) {
            $teacher_contact = $_data['contacts'];
            echo $teacher_contact;
           }

           ?></td>
         <td>
          <a  class="btn btn-info btn-xs" href="booking.php?user_id=<?php echo $teacher_id;?>&item=<?php echo $item_code;  ?>"><i>Click to hire...</i></a>|<a  class="btn btn-danger btn-xs" href="profile.php?user=<?php echo $teacher_id;?>&item=<?php echo $item_code;  ?>"><i>Read more...</i></a>
        </td>
      </tr>
   <?php    
    }

} else {
          
    echo "<tr>
        <td></td>
        <td>No records to show for now.</td>
        <td></td>
      </tr>";
}
?>
    </tbody>
  </table>
  </div>
</div>
</div>  
<!-- /end techers -->
<div class="clear" style="clear: both;"></div>

<br>

<div class="card"> 
  <div class="card-header"><h4>Current Booking Orders</h4></div>
 <div class="card-body"> 

  <table class="table table-hovered" id="myTable" >
    <thead style="text-transform: uppercase;">
      <tr>
        <th>#</th>
        <th>Date</th>
        <th>Subject Booked</th>
        <th>Teacher Booked</th>
        <th>Period</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
         $x="1";
$sql = "SELECT * FROM `bookings` WHERE parent_id = $user";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  ?>
  <?php
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) { ?>
    
      <tr>
        <td><?php echo $x; $x++; ?></td>
         <td><?php echo $row['book_date']; ?></td>
        <td>
          <?php 
         $subject = $row['subject_id'];
         $query = mysqli_query($conn,"SELECT * FROM items WHERE id = '$subject'");
           foreach ($query as $key) {
            $item = $key['unit_title'];
            echo $item;
           }
         ?>
         </td>
        <td>
          <?php 
           $booked_user = $row['teacher_id'];
           $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$booked_user'");
           foreach ($query as $key) {
            $teacher = $key['fname']." ".$key['lname'];
            echo $teacher;
           }

           ?>
           
          </td>
        <td>
          <?php if ($row['slot'] == 'slot1') {
          echo "6.30am-7.30am";
          }elseif ($row['slot'] == 'slot2') {
            echo "8.00am-9.00am";
          }elseif ($row['slot'] == 'slot3') {
            echo "9.30am-10.30am";
          }elseif ($row['slot'] == 'slot4') {
            echo "11.00am-12.00pm";
          }elseif ($row['slot'] == 'slot5') {
            echo "1.30pm-2.30pm";
          }elseif ($row['slot'] == 'slot6') {
            echo "3.00pm-4.00pm";
          }elseif ($row['slot'] == 'slot7') {
            echo "4.30pm-5.30pm";
          }elseif ($row['slot'] == 'slot8') {
            echo "6.00pm-7.00pm";
          }elseif ($row['slot'] == 'slot9') {
            echo "7.30pm-8.30pm";
          }


           ?>
            
          </td>
         <td>
          <?php if ( $row['status'] =='00') {
           echo "<i class='label label-danger'>Request Rejected....</i>";
         }elseif ( $row['status']=='01') {
           echo "<i class='label label-info'>Request Pending....</i>";
         }elseif ( $row['status']=='11') {
          echo "<i class='label label-success'>Request Approved....</i>";
         }

         ?>
           </td>
           <td><a href="delete.php?item=<?php echo $row['id'];?>" class="btn btn-danger">Cancel</i></a></td>
      </tr> 
      
   <?php    
    }

} else {
          
    echo "<tr>
        <td></td>
        <td>No records to show for now.</td>
        <td></td>
      </tr>";
}
?>
    </tbody>
  </table>
  </div>
</div>
</body>
<?php include 'footer.php'; ?>
</html>    
