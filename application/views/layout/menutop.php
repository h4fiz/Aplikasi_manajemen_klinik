<section class="menu-section">
	<div class="container">
		<div class="row ">
			<div class="col-md-12">
				<div class="navbar-collapse collapse ">
					<ul id="menu-top" class="nav navbar-nav navbar-right">
						<li><a href="<?php echo base_url('Cdashboard'); ?>" class="menu-top-<?php echo (isset($menudashboard)) ? "active": "" ;?>">Home</a></li>
						<?php if ($this->session->userdata('group_user')=== '1'): ?>
							<li><a href="<?php echo base_url('pasien'); ?>" class="menu-top-<?php echo (isset($menupasien)) ? "active": "" ;?>">Data Pasien</a></li>
							<li><a href="<?php echo base_url('users'); ?>" class="menu-top-<?php echo (isset($menuusers)) ? "active": "" ;?>">Data User</a></li>
						<?php endif ?>
						<?php if ($this->session->userdata('group_user')=== '2'): ?>
							<li><a href="<?php echo base_url('medical'); ?>" class="menu-top-<?php echo (isset($menumedical)) ? "active": "" ;?>">Data Medical</a></li>
						<?php endif ?>						
					</ul>
				</div>
			</div>

		</div>
	</div>
</section>