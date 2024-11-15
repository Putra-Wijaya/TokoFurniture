
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="<?php echo base_url () ?>assets/Front/img/Login.png">
						<div class="hover">
							<!-- <h4>New to our website?</h4> -->
							<p>Lanjutkan Login untuk melakukan pemesanan produk, dan kami dapat melakukan custom produk sesuai request anda!</p>
							<a class="primary-btn" href="<?php echo base_url('registrasi/index');?>">Create an Account</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Masuk</h3>
						<?php echo $this->session->flashdata('pesan')?>
						
						<form method="post" action="<?php echo base_url('auth/login') ?>" class="user row login_form">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" name="username">
								<?php echo form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
							</div>

							<div class="col-md-12 form-group">
								<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password">
								<?php echo form_error('password', '<div class="text-danger small ml-2">', '</div>') ?>
							</div>

							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Log In</button>
								<a href="<?= base_url('welcome') ?>">Kembali</a>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
