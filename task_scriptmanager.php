<?php
session_start();
if(isset($_POST['addTask'])){
		//CHANGE THIS LATER
	$id_user = $_SESSION['idcurrentuser']; 

	require_once "connect.php";
	if($_POST["inputTaskNameToAdd"]==""){
		$tasknameAdd = '"'.'A Task'. '"';
	}else{
		$tasknameAdd = '"'.$_POST["inputTaskNameToAdd"]. '"';
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
	$query = 'INSERT INTO task VALUES (NULL, '.$id_user.', '.$tasknameAdd.', '.$tasklabelAdd.', '.$taskdateAdd.')';
	$result = mysqli_query($con, $query);

	if($result){
		$msg = 'add successful';
		echo $msg;
		header("location:task_mainpage.php?addsuccess=1");
	}else{
		$msg = 'add failed';
		echo $msg;
		header("location:task_mainpage.php?addsuccess=0");
	}
}
if(isset($_POST['ajaxAction'])&&$_POST['ajaxAction']=='deleteTask'){
		//CHANGE THIS LATER
	$id_user = $_SESSION['idcurrentuser'];  
	$id_tasktodelete = substr($_POST['idTasktodelete'],4);
	require_once "connect.php";
	
	$query = 'DELETE FROM task WHERE `id_task` = '.$id_tasktodelete.
		' AND `id_user` = '.$id_user;
	$result = mysqli_query($con, $query);

	if($result){
		$msg = 'delete successful';
		echo $msg;
	}else{
		$msg = mysqli_error($con);
		echo $msg;
	}
}
if(isset($_POST['ajaxAction'])&&$_POST['ajaxAction']=='deleteGroupTask'){
		//CHANGE THIS LATER
	$id_user = $_SESSION['idcurrentuser'];  
	$id_tasktodelete = substr($_POST['idTasktodelete'],9);
	require_once "connect.php";
	
	$query = 'INSERT INTO `sudah_melakukan` VALUES('.$id_user.', '.$id_tasktodelete.')';
	$result = mysqli_query($con, $query);

	if($result){
		$msg = 'delete successful';
		echo $msg;
	}else{
		$msg = mysqli_error($con);
		echo $msg;
	}
}
if(isset($_POST['editTask'])){
		//CHANGE THIS LATER
	$id_user = $_SESSION['idcurrentuser']; 

	require_once "connect.php";
	
	$query = 'UPDATE task SET 
		`name_task` = "'.$_POST["inputTaskNameToEdit"].'",
		`label_task` = "'.$_POST["inputLabelNameToEdit"].'",
		`date_task` = "'.$_POST["inputTaskDateToEdit"].'"
		WHERE `id_task` = '.substr($_POST["staticIDtoEdit"],4).
		' AND `id_user` = '.$id_user;
	$result = mysqli_query($con, $query);

	if($result){
		$msg = 'edit successful';
		header("location:task_mainpage.php?editsuccess=1");
	}else{
		// $msg = mysqli_error($con);
		// echo $msg;
		// $msg = 'edit failed';
		header("location:task_mainpage.php?editsuccess=0");
	}
}
?>