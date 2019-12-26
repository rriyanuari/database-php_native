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
								<span class="name">Hallo, selamat datang <?=$_SESSION['user']?> | </span>
								<a href="12-logout.php">Logout</a> 
							</div>
						</div>
					</nav>
				</div>
			<!-- --------- -->

			<!-- sidenav -->
				<ul id="sidenav-left" class="sidenav sidenav-fixed" style="transform: translateX(0%);">
					<li class="li-nav"><a class="collapsible-header" href="index.php">Dashboard</a></li>
					<li class="li-nav"><a class="collapsible-header" href="add.php">Tambah Data Baru</a></li>
				</ul>
			<!-- ------- -->

		</header>

		<main>

			<form id="form-index" class="row" method="GET">

				<?php
					$pt 			= "";
					$kategori = "";
					
					if(isset($_GET['pt'])){
						$pt 			=  $_GET['pt'];
					}
					if(isset($_GET['kategori'])){
						$kategori	=  $_GET['kategori'];
					}
				?>

				<div class="input-field col s5">
					<select name="pt" id="pt">
						<option value="" disabled selected>-</option>
						<?php
							$data_pt				= tampilkan_pt();
							while( $row = mysqli_fetch_assoc($data_pt) ): 
						?>
								<option value="<?=$row['pt']?>"<?php if($pt == $row['pt']) echo"selected"; ?>><?=$row['pt']?></option>
							<?php endwhile ?>
					</select>
					<label>Perusahaan :</label>
				</div>

				<div class="input-field col s5">
					<select name="kategori" id="kategori">
						<option value="" selected>-</option>
						<?php
							$data_kategori	= tampilkan_kategori();
							while( $row = mysqli_fetch_assoc($data_kategori) ): 
						?>
								<option value="<?=$row['kategori']?>"<?php if($kategori == $row['kategori']) echo"selected"; ?>><?=$row['kategori']?></option>
							<?php endwhile ?>
					</select>
					<label>Kategori :</label>
				</div>

				<div class="input-field col s2">
					<button class="btn">Submit</button>
				</div>

			</form>

			<div class="row">
				<!------- Isi Content - Jquery ------->
					<div id="isi">
						<?php require_once '21-dashboard.php' ?>
					</div>
				<!-- ------------------------------ -->
			</div>

		</main>

		<?php require_once '02-footer.php' ?>
	</body>
</html>

<?php } ?>