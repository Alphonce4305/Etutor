<?php
session_start();
//error_reporting(0);
include_once 'header.php';

include_once 'session.php';
require 'navbar2.php';

?>

<div style="margin-top: 50px; text-align: center;"> 
 	<?php
//GRAB USERS AND ITEMS SELECTED

if ($_GET['user_id']) {
	 $teacher_id = $_GET['user_id'];
           $query = mysqli_query($conn,"SELECT * FROM users WHERE user_id = '$teacher_id'");
           foreach ($query as $data) {
            $teacher_found = $data['fname']." ".$data['lname'];
            $sex = $data['sex'];
            if ($sex == 'M') {
            	$title = "Mr.";
            }elseif($sex == 'F'){
            	$title = "Madam";
            }elseif ($sex == 'O') {
            	$title = " ";
     }       }
}

if ($_GET['item']) {
	$item_code = $_GET['item'];
	$sql = "SELECT * FROM `items` WHERE id = '$item_code' ";
        $query = mysqli_query($conn,$sql);
        foreach ($query as $subject) {
        	$picked_item = $subject['unit_title'];
        }
}
 	?>
<div class="card-header bg-info"><h4><?php echo $title ." ".$teacher_found;?><br>
<b>SESSIONS</b></h4>
<br />
<h6><b><?php echo $picked_item; ?></b></h6>
<?php if (isset($msg)) {
	echo "<p>".$msg."</p>";
} ?>
</div>
<div class="card">
	<div class="card-body">
<?php 
$sql = "SELECT * FROM slots WHERE t_id = '$teacher_id'";
$query = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
	if ($row['slot1'] =='0') {
		$slot1 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot1&user='.$teacher_id.'&item='.$item_code.'">6.30am-7.30am </br> <i>Open</i></a> <span> </span>';
	}elseif ($row['slot1'] =='1') {
		$slot1 = '<p class="btn btn-danger btn-xl">6.30am-7.30am </br> <i>Closed</i></p><span> </span>';
	}
	if ($row['slot2'] =='0') {
		$slot2 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot2&user='.$teacher_id.'&item='.$item_code.'">8.00am-9.00am</br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot2'] =='1') {
		$slot2 = '<p class="btn btn-danger btn-xl">8.00am-9.00am</br> <i>Closed</i></p><span> </span>';
	}
	if ($row['slot3'] =='0') {
		$slot3 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot3&user='.$teacher_id.'&item='.$item_code.'">9.30am-10.30am</br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot3'] =='1') {
		$slot3 = '<p class="btn btn-danger btn-xl">9.30am-10.30am</br> <i>Closed</i></p><span> </span>';
	}
	if ($row['slot4'] =='0') {
		$slot4 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot4&user='.$teacher_id.'&item='.$item_code.'">11.00am-12.00pm </br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot4'] =='1') {
		$slot4 = '<p class="btn btn-danger btn-xl">11.00am-12.00pm</br><i>Closed</i></p><span> </span>';
	}
	if ($row['slot5'] =='0') {
		$slot5 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot5&user='.$teacher_id.'&item='.$item_code.'">1.30pm-2.30pm</br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot5'] =='1') {
		$slot5 = '<p class="btn btn-danger btn-xl">1.30pm-2.30pm</br><i>Closed</i></p><span> </span>';
	}
	if ($row['slot6'] =='0') {
		$slot6 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot6&user='.$teacher_id.'&item='.$item_code.'">3.00pm-4.00pm </br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot6'] =='1') {
		$slot6 = '<p class="btn btn-danger btn-xl">3.00pm-4.00pm </br><i>Closed</i></p><span> </span>';
	}
	if ($row['slot7'] =='0') {
		$slot7 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot7&user='.$teacher_id.'&item='.$item_code.'">4.30pm-5.30pm </br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot7'] =='1') {
		$slot7 = '<p class="btn btn-danger btn-xl">4.30pm-5.30pm</br><i>Closed</i></p><span> </span>';
	}
	if ($row['slot8'] =='0') {
		$slot8 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot8&user='.$teacher_id.'&item='.$item_code.'">6.00pm-7.00pm </br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot8'] =='1') {
		$slot8 = '<p class="btn btn-danger btn-xl">6.00pm-7.00pm</br><i>Closed</i></p><span> </span>';
	}
	if ($row['slot9'] =='0') {
		$slot9 = '<a class="btn btn-success btn-xl" href="setbooking.php?action=slot9&user='.$teacher_id.'&item='.$item_code.'">7.30pm-8.30pm </br> <i>Open</i></a><span> </span>';
	}elseif ($row['slot9'] =='1') {
		$slot9 = '<p class="btn btn-danger btn-xl">7.30pm-8.30pm</br><i>Closed</i></p><span> </span>';
	}

	echo "<b>Morning Sessions</b> </br>".$slot1, $slot2, $slot3,"<hr>"."<b>Afternoon Sessions</b> </br>". $slot4, $slot5, $slot6,"<hr>". "<b>Evening Sessions</b> </br>".$slot7,$slot8,$slot9;
}
 ?>
</div>
</div>
</div>
</div>
