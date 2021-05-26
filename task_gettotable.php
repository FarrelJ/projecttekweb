<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//change this IMPORTANT
$currentuserid = '1';
require_once "connect.php";

if($filterDate=="Upcoming"){
	$datesqlquery = " AND DATE(`date_task`) > CURDATE() ";
}else if($filterDate=="Late"){
	$datesqlquery = " AND DATE(`date_task`) < CURDATE() ";
}else {
	$datesqlquery = " AND DATE(`date_task`) = CURDATE() ";
}
$query = 'SELECT * FROM task WHERE `id_user` = '.$currentuserid.$datesqlquery;

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
	echo '<tr id="Task'.$row['id_task'].'" name="Task'.$row['id_task'].'" class="private">
	<td><input class="form-check-input" type="checkbox"></td>
	<td class="taskname">'.$row['name_task'].'</td>
	<td class="tasklabel">'.$row['label_task'].'</td>
	<td class="taskowner">Private</td>
	<td class="taskdate">'.$row['date_task'].'</td>
	</tr>';
}

?>