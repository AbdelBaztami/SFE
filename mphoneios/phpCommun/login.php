<div class="employe_container">
<?php $title="Employe-Space";
require '../phpCommun/header_first.php'; ?>

	<div class="card_container">
		<div class="card">
			<div class="card-header">
                <br>
				<h1>Sign In</h1>
			</div>
			<div class="card-body">
				<form method="POST" action="login_trt.php">
				<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     				<?php } ?>
					<div class="input-group form-group">
						<input type="text" name="uname" class="form-control" placeholder="username">
					</div>
					<div class="input-group form-group">
						<input type="password" name="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
<div class="footeremp">
  <?php require 'footer_first.php';?>
</div>
</div>