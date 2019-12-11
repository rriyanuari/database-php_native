<?php 	
	require_once "core/init.php";
	
	if ( isset($_SESSION['user']) ){
		header('location: index.php');
	} else { 
?>

<!DOCTYPE html>
<html>

<?php require_once "01-header.php" ?>

<body>
	<main>
		<div class="container">
			<div class="row">
				<div id="card-login" class="col s12 m4 l4">
					<div class="card z-depth-3">
							<!-- Title Login Card-->
								<div class="card-title z-depth-1">
									<span>Login</span>
								</div>
							<!-- ----------------- -->
							<!-- Content Login Card-->
								<div class="card-content">
									<form method="GET">
										<div class="input-field icon-login">
											<i class="material-icons prefix">account_circle</i>
											<input id="username" name="username" type="text" class="input validate">
											<label for="username">Username</label>
										</div>
										<div class="input-field icon-login">
											<i class="material-icons prefix">lock_outline</i>
											<input id="password" name="password" type="password" class="input validate">
											<label for="password">Password</label>
										</div>
									</form>
								</div>
							<!-- ------------------ -->
							<!-- Footer Login Card-->
								<div class="card-footer">
									<button id="tmbl_login" class="btn waves-effect waves-light" type="submit">Submit</button>
								</div>
								<!----------------  -->
					</div>
				</div>
			</div>
		</div>
	</main>
	
	<script>
	// Agar button dapat ketrigger saat dienter
			const input = document.querySelectorAll(".input");
			input.forEach( inp => inp.addEventListener("keyup", function(event) {
				if (event.keyCode === 13) {
					event.preventDefault();
					document.getElementById("tmbl_login").click();
				}
			}));
	// --------------------------------------
  </script>

<?php require_once "02-footer.php" ?>

</body>
</html>

<?php 
    } 
?>
