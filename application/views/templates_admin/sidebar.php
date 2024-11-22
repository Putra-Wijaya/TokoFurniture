	<main class="header-expand">
        <div class="topbar">
            
			<div class="logo">
				<a href="<?= base_url() ?>" title="Logo">
					<img src="<?php echo base_url () ?>assets/Front/img/homef.png">
				</a>
			</div>

            <span class="menu-btn"><i class="fa fa-align-right"></i></span>

        </div>
		
		<!-- Topbar -->
        <header class="light-bg">
            
			<div class="usr-inf" style="background-image: url(assets/images/usr-inf-bg.jpg);">
                <div class="usr-inf-inner">
                    <!-- <span class="usr-img"><img src="<?= base_url() ?>assets/admin/images/resources/user-img.jpg" alt="user-img.jpg"><i class="usr-sts onln"></i></span> -->
                    <div class="usr-nm-desg">
                        <h4 style="color: black;"><?php echo $this->session->userdata('nama') ?></h4>
                    </div>
                </div>
            </div>

            <nav>
                <ul>

                    <li><a href="<?php echo base_url('admin/dashboard_admin') ?>" title=""><i class="icon ion-android-home"></i><span>Dashboard</span></a></li>
                    <li><a href="<?php echo base_url('admin/data_barang') ?>" title=""><i class="icon ion-bag"></i><span>Data Barang </span></a></li>
                    <li><a href="<?php echo base_url('admin/data_pelanggan') ?>" title=""><i class="icon ion-ios-people"></i><span>Data Pelanggan </span></a></li>
                    <li><a href="<?php echo base_url('admin/invoice') ?>" title=""><i class="icon ion-clipboard"></i><span>Data Pemesanan</span></a></li>

                    <!-- <li><a href="<?php echo base_url('admin/') ?>" title=""><i class="icon ion-clipboard"></i><span>Invoice</span></a></li> -->

					<li><a href="<?php echo base_url('auth/logout') ?>" title=""><i class="icon ion-log-out"></i><span>Logout</span></a></li>
						
                </ul>
            </nav>
			<!-- Nav -->
        </header>
		<!-- Header -->
				