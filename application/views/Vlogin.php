<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login KLINIK</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">

</head>
<body>
	<div class="container">
	    <div class="row">
			<div class="span12">
				<form class="form-horizontal" action="<?php echo base_url().'login/cek_login'?>" method="POST">
				  <fieldset>
				    <div id="legend">
				      <legend class="text-center">Aplikasi Manajemen Klinik</legend>
				      <p style="background-color: red;"><?php echo $this->session->flashdata('msg');?></p>
				    </div>
				    <div class="control-group">
				      <!-- Username -->
				      <label class="control-label"  for="username">Username</label>
				      <div class="controls">
				        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
				      </div>
				    </div>
				    <div class="control-group">
				      <!-- Password-->
				      <label class="control-label" for="password">Password</label>
				      <div class="controls">
				        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
				      </div>
				    </div>
				    <div class="control-group">
				      <!-- Button -->
				      <div class="controls">
				        <button class="btn btn-success">Login</button>
				      </div>
				    </div>
				  </fieldset>
				</form>
			</div>
		</div>
	</div>
	<!-- CORE JQUERY  -->
    <script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.js"></script>
</body>
</html>