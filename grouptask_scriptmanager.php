<?php
session_start();
if(isset($_POST['addGroupTask'])){
		//CHANGE THIS LATER
	$id_user = $_SESSION['idcurrentuser'];
	$id_group = $_POST['staticIDGroup'];
	require_once "connect.php";
	if($_POST["inputGroupTaskNameToAdd"]==""){
		$tasknameAdd = '"'.'A Group Task'. '"';
	}else{
		$tasknameAdd = '"'.$_POST["inputGroupTaskNameToAdd"]. '"';
	}
	if($_POST["inputLabelNameToAdd"]==""){
		$tasklabelAdd = '"No Label"';
	}else{
		$tasklabelAdd =  '"'.$_POST["inputLabelNameToAdd"].'"';
	}
	if($_POST["inputDateToAdd"]==""){
		$taskdateAdd = '"'.date('Y-m-d').'"';
	}else{
		$taskdateAdd =  '"'.date('Y-m-d', strtotime($_POST["inputDateToAdd"])).'"';

	}
	$query = 'INSERT INTO grouptask VALUES (NULL, '.$id_group.', '.$tasknameAdd.', '.$tasklabelAdd.', '.$taskdateAdd.')';
	$result = mysqli_query($con, $query);

	if($result){
		$msg = 'add successful';
		echo $msg;
		header("location:isigroup.php?id=".$id_group."&addsuccess=1");
	}else{
		$msg = 'add failed';
		echo $msg;
		header("location:isigroup.php?id=".$id_group."&addsuccess=0");
	}
}
if(isset($_POST['ajaxAction'])&&$_POST['ajaxAction']=='deleteTask'){
		//CHANGE THIS LATER
	$id_user = $_SESSION['idcurrentuser'];
	$id_tasktodelete = substr($_POST['idTasktodelete'],9);
	require_once "connect.php";

	$query = 'DELETE FROM `grouptask` WHERE `id_grouptask` = '.$id_tasktodelete;
	$result = mysqli_query($con, $query);
	$query = 'DELETE FROM `sudah_melakukan` WHERE `id_grouptask` = '.$id_tasktodelete;
	mysqli_query($con, $query);
	
	if($result){
		$msg = 'delete successful';
		echo $msg;
	}else{
		$msg = mysqli_error($con);
		echo $msg;
	}
}
if(isset($_POST['editGroupTask'])){
		//CHANGE THIS LATER
	$id_user = $_SESSION['idcurrentuser']; 
	$id_group = $_POST['staticIDGroup'];

	require_once "connect.php";
	
	$query = 'SELECT * FROM `group` WHERE `id_admin` = '.$id_user.' AND `id_group` = '.$id_group;
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result)==1){
		$query = 'UPDATE grouptask SET 
		`name_grouptask` = "'.$_POST["inputTaskNameToEdit"].'",
		`label_grouptask` = "'.$_POST["inputLabelNameToEdit"].'",
		`date_grouptask` = "'.$_POST["inputTaskDateToEdit"].'"
		WHERE `id_grouptask` = '.substr($_POST["staticIDtoEdit"],9);
		$result = mysqli_query($con, $query);

		if($result){
			$msg = 'edit successful';
			header("location:isigroup.php?id=".$id_group."&editsuccess=1");
		}else{
		// $msg = mysqli_error($con);
		// echo $msg;
		// $msg = 'edit failed';
			header("location:isigroup.php?id=".$id_group."&editsuccess=0");
		}
	}else{
		header("location:isigroup.php?id=".$id_group."&editsuccess=0");
	}

	
}
?>