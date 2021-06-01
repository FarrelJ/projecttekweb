<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//change this IMPORTANT
$currentuserid = $_SESSION['idcurrentuser']; 
require_once "connect.php";

//TASK BIASA
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

//GROUPTASK 
if($filterDate=="Upcoming"){
	$datesqlquery = " AND DATE(`date_grouptask`) > CURDATE() ";
}else if($filterDate=="Late"){
	$datesqlquery = " AND DATE(`date_grouptask`) < CURDATE() ";
}else {
	$datesqlquery = " AND DATE(`date_grouptask`) = CURDATE() ";
}

$query = 'SELECT `grouptask`.*, `group`.`name_group` FROM `grouptask` LEFT JOIN `group` on `grouptask`.`id_group` = `group`.`id_group`  WHERE `grouptask`.`id_group` IN (SELECT A.`id_group` FROM `follow` A WHERE `id_user` = '.$currentuserid.')'.' AND `grouptask`.`id_grouptask` NOT IN (SELECT A.`id_grouptask` FROM `sudah_melakukan` A WHERE `id_user` = 3)'.$datesqlquery;

$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_array($result)) {
	echo '<tr id="GroupTask'.$row['id_grouptask'].'" name="GroupTask'.$row['id_grouptask'].'" class="private">
	<td><input class="form-check-input" type="checkbox"></td>
	<td class="taskname">'.$row['name_grouptask'].'</td>
	<td class="tasklabel">'.$row['label_grouptask'].'</td>
	<td class="taskowner">'.$row['name_group'].'</td>
	<td class="taskdate">'.$row['date_grouptask'].'</td>
	</tr>';
}

?>