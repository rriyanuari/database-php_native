<?php

	require_once "core/init.php";

	if ( !isset($_SESSION['user']) ){
		header('location: 11-login.php');
	} else {

?>

<!DOCTYPE html>
<html>
	<?php require_once '01-header.php' ?>
	<body class="has-fixed-sidenav" >

		<header>

			<!-- navbar -->
				<div class="navbar-fixed">
					<nav class="navbar">
						<div class="nav-wrapper">
							<a href="#" data-target="sidenav-left" class="sidenav-trigger"><i class="material-icons">menu</i></a>
							<div class="brand-logo valign-wrapper">
								<img class="left logo" src="assets/css/img/gcal-logo.png" />
								<h4 class="left margin-0">Database Legal</h4>
							</div>
							<div class="right">
								<span class="name">Date : <?= date('d-m-Y'); ?> | </span>
								<a href="12-logout.php">Logout</a> 
							</div>
						</div>
					</nav>
				</div>
			<!-- --------- -->

			<!-- sidenav -->
				<ul id="sidenav-left" class="sidenav sidenav-fixed tabs" style="transform: translateX(0%);">
					<li class="tab"><a href="#dashboard">Dashboard</a></li>
					<li class="tab"><a href="#tambahData">Tambah Data Baru</a></li>
				</ul>
			<!-- ------- -->
		</header>
		
		<main>
			<div class="row">
				<!------- Isi Content - Jquery ------->
					<!-- <div class="row">
						<div class="col s12">
							<ul class="tabs">
								<li class="tab col s3"><a href="#test1">Test 1</a></li>
								<li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>
								<li class="tab col s3 disabled"><a href="#test3">Disabled Tab</a></li>
								<li class="tab col s3"><a href="#test4">Test 4</a></li>
							</ul>
						</div>
						<div id="test1" class="col s12">Test 1</div>
						<div id="test2" class="col s12">Test 2</div>
						<div id="test3" class="col s12">Test 3</div>
						<div id="test4" class="col s12">Test 4</div>
					</div> -->
        
					<div id="dashboard" ><?php include_once '21-dashboard.php' ?></div>
					<div id="tambahData"><?php include_once '22-add.php' ?></div>
						
				<!-- ------------------------------ -->
			</div>
		</main>

		<?php require_once "02-footer.php" ?>
	</body>
</html>


<?php } ?>