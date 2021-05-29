<?php
	if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
	if(isset($_POST['ajaxAction'])&&$_POST['ajaxAction']=='followBtn'){
		require_once "connect.php";
		$query = 'INSERT INTO follow VALUES ('.$_SESSION['idcurrentuser'].
 		', '.$_POST['idGroup'].')';
 		$result = mysqli_query($con, $query);
 		echo mysqli_error($con);
	}
	if(isset($_POST['ajaxAction'])&&$_POST['ajaxAction']=='unfollowBtn'){
		require_once "connect.php";
		$query = 'DELETE FROM follow WHERE `id_USER` = '.$_SESSION['idcurrentuser'].
 		' AND `id_group` = '.$_POST['idGroup'];
 		$result = mysqli_query($con, $query);
 		echo mysqli_error($con);
	}

?>