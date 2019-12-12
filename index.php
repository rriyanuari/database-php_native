<?php
	
	require_once "core/init.php";
		
	if ( !isset($_SESSION['user']) ){
		header('location: 11-login.php');
	} else {

?>

<!DOCTYPE html>
<html>
<?php include '01-header.php' ?>
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
							<span class="name">Hallo, selamat datang  <?=$_SESSION['user']?> | </span>
							<a href="12-logout.php">Logout</a> 
						</div>
					</div>
				</nav>
			</div>
		<!-- --------- -->
		<!-- sidenav -->
			<ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform: translateX(0%);">
				<li class="li-nav">
					<ul class="">
						<li>
							<a href="index.php" class="collapsible-header">Dashboard</a>
							<div class="">
								<ul>
									<li><a href="?pt=gcal"	class="collaps-body-1" id="gcal">	GCAL	</a></li>
									<li><a href="?pt=ffi"		class="collaps-body-1" id="ffi"	>	FFI		</a></li>
									<li><a href="?pt=wkk"		class="collaps-body-1" id="wkk"	>	WKK		</a></li>
									<li><a href="?pt=paca"	class="collaps-body-1" id="paca">	PACA	</a></li>
									<li><a href="?pt=sr"		class="collaps-body-1" id="sr"	>	SR		</a></li>
								</ul>	
							</div>
						</li>
					</ul>
				</li>
				<!-- <li class="li-nav">
					<a class="collapsible-header">Data</a>
				</li> -->
			</ul>
		<!-- ------- -->
	</header>
	<main>
		<div class="row">
		<!------- Isi Content - Jquery ------->
			<div id="isi">
				<?php require_once '21-dashboard.php' ?>
			</div>
		<!-- ------------------------------ -->
    </div>
	</main>
	<?php include '02-footer.php' ?>
</body>
</html>

<?php } ?>