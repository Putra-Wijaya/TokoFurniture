<!-- Start Header Area -->
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="#"><img src="<?php echo base_url () ?>assets/Front/img/homef.png" alt=""></a>

					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url('welcome') ?>">Beranda</a></li>
							
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url('dashboard/belanja') ?>">Belanja</a></li>
							
							<li class="nav-item"><a class="nav-link" href="<?php echo base_url('Kontak/index') ?>">Kontak</a></li>
						</ul>

						<ul class="nav navbar-nav navbar-right">
							<li class="nav-item">
								<?php 
									$keranjang = '<i class="ti-bag"></i> ' . $this->cart->total_items(); 
									echo anchor('dashboard/detail_keranjang', $keranjang, ['class' => 'nav-link keranjang-link']);
								?>
							</li>
							
							<li class="nav-item ml-3">
								<?php if ($this->session->userdata('username')): ?>
									<?php echo anchor('auth/logout', 'Logout', ['class' => 'nav-link btn ml-2']); ?>
								<?php else: ?>
									<?php echo anchor('auth/login', 'Login', ['class' => 'nav-link btn ml-2']); ?>
								<?php endif; ?>
							</li>
						</ul>



					</div>
				</div>
			</nav>
		</div>

</header>
<!-- End Header Area -->
