<?php echo'
	<nav class="navbar navbar-expand-lg navbar-light bg-info">
		<div class="container-fluid">
			<a class="navbar-brand" href="#" style="margin-right: 3em;">T</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item" style="margin-right: 3em;">
						<a class="nav-link" aria-current="page" href="#">My Tasks</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">My group</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="group.php">Following Group</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="owngroup.php">My own Group</a></li>
						</ul>
					</li>
					<li class="nav-item" style="margin-right: 3em;">
						<a class="nav-link" href="#">Account Setting</a>
					</li>
					<li class="nav-item" style="margin-right: 3em;">
						<a class="nav-link" href="#">Logout</a>
					</li>
          
				</ul>
			</div>
		</div>
	</nav>'
?>