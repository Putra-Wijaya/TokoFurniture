	
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="<?= base_url () ?>assets/Front/img/Login.png">
						<div class="hover">
							<p>Lanjutkan daftar untuk melakukan login dan melakukan pemesanan produk, Sudah punya akun???</p>
							<a class="primary-btn" href="<?= base_url('Auth/login') ?>">Masuk</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Daftar Akun</h3>
						<?= $this->session->flashdata('pesan')?>

						<form method="post" action="<?= base_url('Registrasi/index')?>" class="user row login_form">
							<div class="col-md-12 form-group">
								<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Nama Lengkap" name="nama">
                                 <?= form_error('nama', '<div class="text-danger small ml-2">', '</div>') ?>
							</div>

							<div class="col-md-12 form-group">
								<input type="text" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email" name="username">
                                <?= form_error('username', '<div class="text-danger small ml-2">', '</div>') ?>
							</div>
							
							<div class="col-md-12 form-group">
								<input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password_1">
                                <?= form_error('password_1', '<div class="text-danger small ml-2">', '</div>') ?>
							</div>

							<div class="col-md-12 form-group">
								<input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Ulangi Password" name="password_2">
							</div>

							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Daftar</button>
								<a href="<?= base_url('welcome') ?>">Kembali</a>
							</div>
						</form>
						
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
