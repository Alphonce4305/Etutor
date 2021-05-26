<?php
session_start();
$user = $_SESSION['u_id'];
include_once 'dbconfig.php';

switch ($_GET['action']) {
	case 'addsubject':
	if (isset($_POST['addsubject'])) {
		$sub1 = $_POST['item1'];
		$sub2 = $_POST['item2'];
		$sub3 = $_POST['item3'];
		$sub4 = $_POST['item4'];
		$sub5 = $_POST['item5'];
		$sub6 = $_POST['item6'];
		$sub7 = $_POST['item7'];
		$sub8 = $_POST['item8'];
		$sub9 = $_POST['item9'];

	$query = Mysqli_query($conn, "INSERT INTO `subjects` (`id`, `t_id`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`) 
		VALUES (NULL, '$user', '$sub1', '$sub2', '$sub3', '$sub4', '$sub5', '$sub6', '$sub7', '$sub8', '$sub9')");
	if ($query == true) {
		header('location:teacher.php?msg=success');
	}else{
		header('location:teacher.php?msg=failed');
	}
	}else{header('location:teacher.php?msg=failed');}
		break;
	case 'addslot':

	$query = Mysqli_query($conn, "INSERT INTO `slots` (`id`, `t_id`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`, `slot8`, `slot9`) 
		VALUES (NULL, '$user', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
		if ($query == true) {
		header('location:teacher.php?msg=success');
	}else{
		header('location:teacher.php?msg=failed');
	}
		break;

	default:
		# code...
		break;
}




?>