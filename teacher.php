    

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

<!--Teachers interface-------------------------------------------------------------------------------------------------------->
 <!--Navigation-->
<?=require 'navbar.php';?>
 <br><br><br>
 
<!--Teacher interface-------------------------------------------------------------------------------------------------------->
<section id="teacher">

  <h2 style="text-align:center;text-transform: uppercase;">Teacher Dashboard</h2>
  <h6 class="text-success" style="text-align:center;text-transform: uppercase;" ><?php echo($logged_in_user);?></h6>
  <?php
echo $msg;
 ?>
<div class="container" style="padding-bottom: 40px;">
<div class="row">

<div style="clear: both;"></div>
<?php
session_start();
error_reporting(0);
include_once 'header.php';
include_once 'dbconfig.php';

?>

<div class="container"> 
<div class="card text-center text-info"> 
<div class="card-header bg-info text-danger"><h5>MY SESSIONS</h5></div>
<div class="card-body">
<?php 
$sql = "SELECT * FROM slots WHERE t_id = '$user'";
$query = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
  if ($row['slot1'] =='1') {
    $slot1 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot1&user='.$user.'">6.30am-7.30am </br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot1'] =='0') {
    $slot1 = '<p class="btn btn-success btn-xl">6.30am-7.30am </br> <i>Open</i></p><span> </span>';
  }
  if ($row['slot2'] =='1') {
    $slot2 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot2&user='.$user.'">6.30am-7.30am </br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot2'] =='0') {
    $slot2 = '<p class="btn btn-success btn-xl">8.00am-9.00am</br> <i>Open</i></p><span> </span>';
  }
  if ($row['slot3'] =='1') {
    $slot3 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot3&user='.$user.'">6.30am-7.30am </br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot3'] =='0') {
    $slot3 = '<p class="btn btn-success btn-xl">9.30am-10.30am</br> <i>Open</i></p><span> </span>';
  }
  if ($row['slot4'] =='1') {
    $slot4 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot4&user='.$user.'">6.30am-7.30am </br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot4'] =='0') {
    $slot4 = '<p class="btn btn-success btn-xl">11.00am-12.00pm</br><i>Open</i></p><span> </span>';
  }
  if ($row['slot5'] =='1') {
    $slot5 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot5&user='.$user.'">1.30pm-2.30pm</br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot5'] =='0') {
    $slot5 = '<p class="btn btn-success btn-xl">1.30pm-2.30pm</br><i>Open</i></p><span> </span>';
  }
  if ($row['slot6'] =='1') {
    $slot6 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot6&user='.$user.'">3.00pm-4.00pm</br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot6'] =='0') {
    $slot6 = '<p class="btn btn-success btn-xl">3.00pm-4.00pm </br><i>Open</i></p><span> </span>';
  }
  if ($row['slot7'] =='1') {
    $slot7 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot7&user='.$user.'">>4.30pm-5.30pm</br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot7'] =='0') {
    $slot7 = '<p class="btn btn-success btn-xl">4.30pm-5.30pm</br><i>Open</i></p><span> </span>';
  }
  if ($row['slot8'] =='1') {
    $slot8 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot8&user='.$user.'"6.00pm-7.00pm</br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot8'] =='0') {
    $slot8 = '<p class="btn btn-success btn-xl">6.00pm-7.00pm</br><i>Open</i></p><span> </span>';
  }
  if ($row['slot9'] =='1') {
    $slot9 = '<a class="btn btn-danger btn-xl" href="slots.php?action=slot9&user='.$user.'">7.30pm-8.30pm</br> <i>Booked</i></a> <span> </span>';
  }elseif ($row['slot9'] =='0') {
    $slot9 = '<p class="btn btn-success btn-xl">7.30pm-8.30pm</br><i>Open</i></p><span> </span>';
  }

  echo "<b>Morning Sessions</b> </br>".$slot1, $slot2, $slot3,"<hr>"."<b>Afternoon Sessions</b> </br>". $slot4, $slot5, $slot6,"<hr>". "<b>Evening Sessions</b> </br>".$slot7,$slot8,$slot9;
}
 ?>
</div>
</div>
</div>
  
<!-- /end techers -->
<div class="clear" style="clear: both;"></div>


<div class="col-md-12">
<div class="container bg-info"> 
 <div class="well text-center text-success"> 
<h4>Current Booking Requests</h4>
        
  <table class="table table-stripped" id="myTable">
    <thead>
      <tr style="text-transform: uppercase;">
        <th>#</th>
        <th>Date</th>
        <th>Subject</th>
        <th>Client Name</th>
        <th>Session Picked</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
  <?php
         $x="1";
$sql = "SELECT * FROM `bookings` WHERE teacher_id = $user";
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
           $cliet = $row['parent_id'];
           $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$cliet'");
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
            <?php
            if ($row['status'] == '00') {
             echo ' <a href="actions.php?action=delete&item='.$row['id'].'"><i class="glyphicon glyphicon-trash glyphicon-sm text-danger"></i></a>';
            }elseif ($row['status'] == '01') {
              echo '  <a href="actions.php?action=approve&item='.$row['id'].'"><i class="glyphicon glyphicon-check glyphicon-sm text-success"></i></a> |
            <a href="actions.php?action=reject&item='.$row['id'].'" style="font-weight: bold;color: red;text-decoration: none;" >X</a> |
            <a href="actions.php?action=delete&item='.$row['id'].'"><i class="glyphicon glyphicon-trash glyphicon-sm text-danger"></i></a>
                    ';
            }elseif ($row['status']=='11') {
              echo "<i class='glyphicon glyphicon-ok'></i><i class='glyphicon glyphicon-ok'></i>";
            }
            ?>
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
</body>
   
<!--Add profile modal-->

<!-- Modal -->
<div class="modal fade" id="setprofile" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">UPDATE PROFILE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
       
 <form class="form-horizontal" role="form" action="setprofile.php" method="post">

  <div class="form-group">
  <label for="" class="form-label">Title</label>
 <select class="form-control" name="title" required="">
  <option>Select your title...</option>
   <option value="Mr">Mr.</option>
   <option value="Mrs">Mrs.</option>
   <option value="Madam">Madam</option>
   <option value="Dr">Dr.</option>
   <option value="Prof">Prof.</option>
   <option value="Eng">Eng.</option>
   <option value="Tech">Tech.</option>
 </select>
</div> 
<br>

  <h5 class="text-primary">Education Background</h5>
<div class="form-group">
  <input type="text" class="form-control" name="pri" placeholder="Enter Primary School" required="">
</div> 
<br>
  <div class="form-group">
      <input type="text" class="form-control" name="sec" placeholder="Enter Secondary School" required="">
    </div>
<br>
  <div class="form-group">
      <input type="text" class="form-control" name="col" placeholder="Enter Post-Secondary School" required="">
    </div>
<br>
  <h5 class="text-primary">Work Background</h5>
  <hr>
  <div class="form-group">
      <input type="text" class="form-control" name="work" placeholder="Enter Current Work" required="">
    </div>
  <br>
  <div class="form-group">
      <input type="number" class="form-control" name="work_exp" placeholder="Enter Work Experience" required="" min="0" max="30">
    </div>
  <br>
   <h5 class="text-primary">Resdential Background</h5>
   <hr>
     <div class="form-group">
      <input type="text" class="form-control" name="county" placeholder="Enter Current County" required="">
    </div>
  <br>
    <div class="form-group">
      <input type="text" class="form-control" name="sub_county" placeholder="Enter Sub-County" required="">
    </div>
  <br>
  <div class="form-group">
      <input type="text" class="form-control" name="street" placeholder="Enter Street Address" required="">
    </div>
  <br>

    <div class="form-group">
      <input type="text" class="form-control" name="houseno" placeholder="Enter House Number" required="">
    </div>
  <br>
   <h5 class="text-primary">Contact Information</h5>
   <hr>
  <div class="form-group">
      <input type="email" class="form-control" name="email" placeholder="Enter Email Address" required="">
    </div>
  <br> 
  <div class="form-group">
      <input type="number" class="form-control" name="phone" placeholder="Enter Phone Number" required="">
    </div>
 <br>
  <div class="form-group">
      <input type="number" class="form-control" name="phone-alt" placeholder="Enter Alternative Phone Number">
    </div>
 <br>
  <h5 class="text-primary">Brief Biography</h5>
  <div class="form-group">
      <textarea name="desc" class="form-control" maxlength="250" style="max-height: 25%; max-width: 100%;min-width: 100%; min-height: 25%;" required="" placeholder="Not more than 250 words...."></textarea>
    </div>
  <br>
     
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="setprofile">Submit</button>
    </div>
  </div>
</form> 
</div>         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- end profile -->


<!--Add subject modal-->

<div class="modal fade" id="subjectForm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">ADD SUBJECTS TO TEACH</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="container">
         <form class="form-horizontal" role="form" action="settings.php?action=addsubject" method="post">
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 1</label>
      
    <select class="form-control sm" name="item1">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
<br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 2</label>
      
    <select class="form-control sm" name="item2">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
    
    <br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 3</label>
      
    <select class="form-control sm" name="item3">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      <br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 4</label>
      
    <select class="form-control sm" name="item4">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      <br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 5</label>
      
    <select class="form-control sm" name="item5">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
    <br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 6</label>
      
    <select class="form-control sm" name="item6">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      <br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 7</label>
      
    <select class="form-control sm" name="item7">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
     <br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 8</label>
      
    <select class="form-control sm" name="item8">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
      <br>
</div> 
 <div class="form-group">
  <label class="control-label col-sm-2">Unit 9</label>
      
    <select class="form-control sm" name="item9">
       <option>--SELECT SUBJECT--</option>
        <?php 
        require 'dbconfig.php';
        $sql = "SELECT * FROM `items` ";
        $query = mysqli_query($conn,$sql);
        while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)) {
          echo "<option value='".$row['id']."'>".$row['unit_title']."</option>";
        }
         ?>
         <option value="0">None</option>
    </select>
     <br>
</div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary" name="addsubject">SAVE SUBJECTS</button>
    </div>
  </div>
</form>          
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end add subjects -->

<!-- My subjects -->
<!-- Modal -->
<div class="modal fade" id="mySubjects" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="mySubjects" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">MY SUBJECTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <?php
        $query_items = mysqli_query($conn, " SELECT * FROM `subjects`WHERE t_id = '$user' ");
        while ($row = mysqli_fetch_assoc($query_items)) {
          $item1 = $row['sub1'];
          $item2 = $row['sub2'];
          $item3 = $row['sub3'];
          $item4 = $row['sub4'];
          $item5 = $row['sub5'];
          $item6 = $row['sub6'];
          $item7 = $row['sub7'];
          $item8 = $row['sub8'];
          $item9 = $row['sub9'];
        }
        if ($item1 !=0 || $item2 !=0 ||$item3 !=0 ||$item4 !=0 ||$item5 !=0 ||$item6 !=0 ||$item7 !=0 || $item8 !=0 ||$item9 !=0) {
         $sql_get_subjects = mysqli_query($conn, "SELECT * FROM `items` WHERE id ='$item1' OR id ='$item2' OR id ='$item3' OR id ='$item4' OR id ='$item5' OR id ='$item6' OR id ='$item7' OR id ='$item8' OR id ='$item9'");
         foreach ($sql_get_subjects as $values) {
           $units = $values['unit_title'];
           echo "<p>".$units."</p>";
         }
        }

        ?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end my subjects -->

<!-- slots -->
<div class="modal fade" id="setSlot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="setSlot" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">SET SLOTS</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <?php 
          $slot_query = mysqli_query($conn,"SELECT * FROM slots WHERE t_id = '$user'");
          $count_slots = mysqli_num_rows($slot_query);
          if ($count_slots > 0) {
            $display = "<p style='font-weight:bold;color:red;font-family:Tohama;text-align:center;'>You already have an active slot set</p>";
          }else{
            $display ="<h5 style='text-align:center;'>You do not have an active slot</h5> </br><a href='settings.php?action=addslot' style='text-align:center;margin-left:30%;'><p class='btn btn-danger btn-sm'>Click here to create your slot...</p></a>";
          }
        ?>
        <?php echo $display;?>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- end slots -->
<?php include 'footer.php'; ?>
</html>    
