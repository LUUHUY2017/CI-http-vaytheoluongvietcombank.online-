<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/bootstrap.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/bootstrap.js"></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>media/css/login_style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col"></div>
			<div class="col-6 formdangnhap">
				<div class="card">
					<div class="card-body">
						<?php
							if(validation_errors())
							{
								echo validation_errors('<div class="alert alert-danger alert-dismissible">
    								<button type="button" class="close" data-dismiss="alert">×</button>
    								<strong>','
  								</strong></div>');
							}
							if($this->session->flashdata('error_msg'))
							{
								echo '<div class="alert alert-danger alert-dismissible">
    								<button type="button" class="close" data-dismiss="alert">×</button>
    								<strong>'.$this->session->flashdata('error_msg').'
  								</strong></div>';
							}
						?>
						<h4 class="card-title text-center">Login Page</h4>
						<form action="" method="post">
							<div class="form-group">
								<label for="username">Username:</label>
							    <input type="text" class="form-control" name="txtusername" autocomplete="off" placeholder="Please type your username...">
							</div>
							<div class="form-group">
							    <label for="pwd">Password:</label>
							    <input type="password" class="form-control" id="pwd" name="txtpassword" placeholder="Please type your password...">
							</div>
							<input type="submit" name="btnlogin" class="btn btn-primary" value="Login">
						</form>
					</div>
				</div>
			</div>
			<div class="col"></div>
		</div>
	</div>
</body>
	<script type="text/javascript" src="<?php echo base_url(); ?>media/js/script.js"></script>
</html>