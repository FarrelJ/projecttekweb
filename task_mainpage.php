<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<?php
	session_start();
	if(!isset($_SESSION['idcurrentuser'])||is_null($_SESSION['idcurrentuser'])){
	   header("location:login.php");
   }
	include "library.php";
	?>
	<style type="text/css">
		
		thead tr th{
		}

	</style>
	<script>
		var today = "<?php echo date("Y-m-d"); ?>";
		function toDate(dateStr) {
			var parts = dateStr.split("-")
			return new Date(parts[2], parts[1] - 1, parts[0])
		}
		function compareDate(dateA, dateB){

		}
		function sortTable($table,order){
			var $rows = $('tbody > tr', $table);
			$rows.sort(function (a, b) {
				var keyA = $('td .taskname', a).text();
				var keyB = $('td .taskname', b).text();
				alert(keyA);
				if (order=='asc') {
					return (keyA > keyB) ? 1 : 0;
				} else {
					return (keyA > keyB) ? 0 : 1;
				}
			});
			$.each($rows, function (index, row) {
				$table.append(row);
			});
		}
		$(document).ready(function(){
			
			//SortDate
			$('tbody tr').each(function() {
				var t = $(this).children('.taskdate').text().split('-');
				
				$(this).data('_ts', new Date(t[0], t[1]-1, t[2]).getTime());
			}).sort(function (a, b) {
				
				return $(a).data('_ts') - $(b).data('_ts');
			}).appendTo('tbody');
			/*
			$('#SelectFilter').on('change', function() {
				if(this.value=="byLabel"){
					$('#SelectLabel').show();
					// $('#SelectDate').hide();
					$('#SelectOwner').hide();
				}
				// }else if(this.value=="byDate"){
				// 	$('#SelectLabel').hide();
				// 	// $('#SelectDate').show();
				// 	$('#SelectOwner').hide();
				// }
				else if(this.value=="byOwner"){
					$('#SelectLabel').hide();
					// $('#SelectDate').hide();
					$('#SelectOwner').show();
				}
			});
			$('#SelectLabelToAdd').on('change', function() {
				
				if(this.value=="newLabel"){
					
					$(this).parent().removeClass('col-sm-10').addClass('col-sm-3');
					$('#newLabelInput').show();

				}else{
					$(this).parent().removeClass('col-sm-3').addClass('col-sm-10');
					$('#newLabelInput').hide();
				}
			});
			*/

			$('tr').on('click',function(e){
				if(e.target.nodeName=='INPUT'||e.target.nodeName=='TH'){
					return;
				}
				var taskElement = e.target.parentElement;
				if($(taskElement).attr('id').substring(0,4)!='Task'){
					alert("Can't Edit Group Task");
					return;
				}
				$('#inputTaskNameToEdit').val('');
				$('#inputLabelNameToEdit').val('');
				$('#inputTaskDateToEdit').val('');
				$('#editTaskModal').modal('toggle');
				
				// IMPORTANT : ADD ID 
				$('#inputTaskNameToEdit').val($(taskElement).find('.taskname').text());
				$('#inputLabelNameToEdit').val($(taskElement).find('.tasklabel').text());
				$('#inputTaskDateToEdit').val($(taskElement).find('.taskdate').text());
				$('#staticIDtoEdit').val($(taskElement).attr('id'));	

			})
			//Filter
			$("#SearchInput").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				if($('#SelectFilter').val()=="byLabel"){
					$("#TaskTable tbody tr").filter(function() {

						$(this).toggle($(this).children('.tasklabel').eq(0).text().toLowerCase().indexOf(value) > -1)
					});
				}else if($('#SelectFilter').val()=="byOwner"){
					$("#TaskTable tbody tr").filter(function() {

						$(this).toggle($(this).children('.taskowner').eq(0).text().toLowerCase().indexOf(value) > -1)
					});
				}
				
			});
			$("tr td input[type='checkbox']").change(function() {
				if(this.checked) {
					var ToBeDeleted = $(this).parent().parent() ;
					var action = 'deleteTask';
					if ($(ToBeDeleted).attr('id').substr(0,4)!='Task'){
						action = 'deleteGroupTask';
						
					}
		
					$.ajax({url: "task_scriptmanager.php", type : "POST", async:false, data:{
						ajaxAction : action,
						idTasktodelete : $(this).parent().parent().attr('id')
					}, success: function(msg){
						
						if(msg == 'delete successful'){
							$(ToBeDeleted).fadeOut("slow",function(){ $(this).remove(); })
							
						}else{

						}
					}});
				}
			});
			$("#addTaskModalBtn").click(function(){
				$("#inputTaskNameToAdd").val('');
				$("#inputLabelNameToAdd").val('');
				$("#inputDateToAdd").val(today);
				
			});
			
			

		});
	</script>
</head>
<body>
	<?php
	include "navbar.php";
	if(isset($_GET['filterDate'])){
		$filterDate = $_GET['filterDate'];
	}else{
		$filterDate = 'Today';
	}
	
	?>

	<div class="container pt-4">
		<div class="d-flex justify-content-between filterClass">
			<div class="col-md-5 row">
				<ul class="nav nav-pills nav-fill">
					<li class="nav-item">
						<?php echo '<a class="nav-link';
						if($filterDate=='Today'){
							echo " active";
						}
						echo '" aria-current="page" href="task_mainpage.php?filterDate=Today">Today</a>';?>
						
					</li>
					<li class="nav-item">
						<?php echo '<a class="nav-link';
						if($filterDate=='Late'){
							echo " active";
						}
						echo '" aria-current="page" href="task_mainpage.php?filterDate=Late">Late</a>';?>
					</li>
					<li class="nav-item">
						<?php echo '<a class="nav-link';
						if($filterDate=='Upcoming'){
							echo " active";
						}
						echo '" aria-current="page" href="task_mainpage.php?filterDate=Upcoming">Upcoming</a>';?>
					</li>
					
				</ul>
			</div>
			<div class="col-md-7 row d-flex">
				<div class="col-auto">
					<label class="col-form-label" for="SelectFilter">Filter: </label>
				</div>
				<div class="col-auto">
					<select class="form-select" aria-label="SelectFilter" id="SelectFilter">
						<option selected value="byLabel">By Label</option>
						<!-- <option value="byDate">By Date</option> -->
						<option value="byOwner">By Owner</option>
					</select>
				</div>
				<!-- Search Label -->
				<div class="col-auto flex-fill" id="SelectLabel">
					<div class=" input-group flex-fill">
						<input class="form-control" placeholder="Type here" type="text" aria-label="SearchInput" id="SearchInput" style="border-radius: 15px;" >
					</div>

				</div>
				<!-- Search Waktu -->
			<!-- 	<div class="col-auto row" id="SelectDate" style="display: none">
					<div class="col-auto" >
						<label class="col-form-label" for="startDateInput">From: </label>
					</div>
					<div class="col-auto">
						<div class=" input-group ">
							<input class="form-control" type="date" aria-label="startDateInput" style="border-radius: 15px;" >
						</div>
					</div>
					<div class="col-auto" >
						<label class="col-form-label" for="endDateInput">Until: </label>
					</div>
					<div class="col-auto">
						<div class=" input-group ">
							<input class="form-control" type="date" aria-label="endDateInput" style="border-radius: 15px;" >
						</div>
					</div>
				</div> -->
				<!-- Search Group -->

				<!-- <div class="col-auto flex-fill" id="SelectOwner" style="display: none">
					<select class="form-select" aria-label="SelectOwner">
						<option selected value="personal">Private</option>
						<option value="G:Group1">Group1</option>
						<option value="G:Group2">Group2	</option>
					</select>
				</div> -->

				<!-- <div class="col-auto">
					<button type="button" class="btn bg-info">
						<img src="bootstrap/icons/search.svg" alt="Bootstrap" width="16" height="16">
					</button>
				</div> -->
			</div>
		</div>
		<div >
			<table class="table table-info table-hover mt-4 mb-3" id="TaskTable">
				<thead>
					<tr>
						<th scope="col">v</th>
						<th scope="col">Name</th>
						<th scope="col">Label</th>
						<th scope="col">Owner</th>
						<th scope="col">Date</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					include_once 'task_gettotable.php';
					?>
				</tbody>
			</table>
		</div>

		
		<button class="btn btn-info fixed-bottom mx-4 mb-4" data-bs-toggle="modal" data-bs-target="#addTaskModal" id="addTaskModalBtn">+ ADD TASK</button>
		
		<!-- modal -->
		<div class="modal fade" id="addTaskModal" tabindex="-1" aria-labelledby="addTaskModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<form  action="task_scriptmanager.php" method="post">
						<div class="modal-header">
							<h5 class="modal-title" id="addTaskModalLabel">Create a New Task</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<div class="d-grid gap-2">
								<!-- Row Name -->
								<div class="row">
									<div class="col-sm-2">
										<label for="inputTaskNameToAdd" class="col-form-label">Task</label>

									</div> <div class="col-sm-10">

										<input type="text" class="form-control" id="inputTaskNameToAdd" placeholder="Task Name" name="inputTaskNameToAdd" value="A Task">
									</div>
								</div>
								<!-- Row Label -->
								<div class="row">
									<div class="col-sm-2">
										<label for="SelectLabelToAdd" class="col-form-label">Label</label>

									</div>
									<div class="col-sm-10" id="newLabelInput">
										<input type="text" class="form-control" id="inputLabelNameToAdd" placeholder="New Label Name" name="inputLabelNameToAdd">
									</div>
								</div>
								<!-- Row Date -->
								<div class="row">
									<div class="col-sm-2">
										<label for="inputTaskNameToAdd" class="col-form-label">Date</label>
									</div> <div class="col-sm-10">

										<input type="date"  class="form-control" id="inputDateToAdd" name="inputDateToAdd" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" >
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<button class="btn btn-primary" id="addTaskSaveBtn" name="addTask" type="submit" >Save New Task</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form action="task_scriptmanager.php" method="post">
					<div class="modal-header">
						<h5 class="modal-title" id="editTaskModalLabel">Edit Task</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<div class="d-grid gap-2">
							<input type="hidden" readonly class="form-control-plaintext" id="staticIDtoEdit" name="staticIDtoEdit" value="">
							<!-- Row Name -->
							<div class="row">
								<div class="col-sm-2">
									<label for="inputTaskNameToEdit" class="col-form-label">Task</label>

								</div> <div class="col-sm-10">

									<input type="text" class="form-control" id="inputTaskNameToEdit" name="inputTaskNameToEdit">
								</div>
							</div>
							<!-- Row Label -->
							<div class="row">
								<div class="col-sm-2">
									<label for="SelectLabelToEdit" class="col-form-label">Label</label>

								</div> 
								<div class="col-sm-10" id="newLabelInput">
									<input type="text" class="form-control" id="inputLabelNameToEdit" name="inputLabelNameToEdit">
								</div>
							</div>
							<!-- Row Date -->
							<div class="row">
								<div class="col-sm-2">
									<label for="inputTaskNameToAdd" class="col-form-label">Date</label>
								</div> <div class="col-sm-10">

									<input type="date" class="form-control" id="inputTaskDateToEdit" name="inputTaskDateToEdit">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button class="btn btn-primary" id="saveEdit" name="editTask" type="submit">Save changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</body>
</html>