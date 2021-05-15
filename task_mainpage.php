<!DOCTYPE html>
<html>
<head>
	<title>
	</title>
	<?php
	include "library.php";
	?>
</head>
<body>
	<?php
	include "navbar.php";
	?>

	<div class="container pt-4">
		<div class="row d-flex justify-content-end filterClass">
			<div class="col-sm-2">
				<select class="form-select" aria-label="SelectFilter" id="SelectFilter">
					<option selected value="byLabel">By Label</option>
					<option value="byDate">By Date</option>
					<option value="byOwner">By Owner</option>
				</select>
			</div>
			<!-- Search Nama -->
			<!-- <div class="col-sm-5 row" >
				<div class="col-sm-4" >
					<div class="text-end" style="margin-top: 5px">Search: </div>
				</div>
				<div class="col-sm-8">
					<div class=" input-group ">
						<input class="form-control" type="text" aria-label="labelSearchInput" style="border-radius: 15px;" >
					</div>
				</div>
			</div> -->
			<!-- Search Waktu -->
			<!-- <div class="col-sm-8 row" >
				<div class="col-2" >
					<div class="text-end" style="margin-top: 5px">From: </div>
				</div>
				<div class="col-4">
					<div class=" input-group ">
						<input class="form-control" type="date" aria-label="labelSearchInput" style="border-radius: 15px;" >
					</div>
				</div>
				<div class="col-2" >
					<div class="text-end" style="margin-top: 5px">Until: </div>
				</div>
				<div class="col-4">
					<div class=" input-group ">
						<input class="form-control" type="date" aria-label="labelSearchInput" style="border-radius: 15px;" >
					</div>
				</div>
			</div> -->
			<!-- Search Group -->
			<div class="col-sm-4 row" >
				<select class="form-select" aria-label="SelectOwner" id="SelectOwner">
					<option selected value="personal">Private</option>
					<option value="G:Group1">Group1</option>
					<option value="G:Group2">Group2	</option>
				</select>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn">
					<img src="bootstrap/icons/search.svg" alt="Bootstrap" width="16" height="16">
				</button>
			</div>
		</div>
	</div>
</body>
</html>