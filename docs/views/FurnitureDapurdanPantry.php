<br><br><br>
	<!-- Start Banner Area -->
	<section class="banner-area">
			<div class="container">
				<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
					<div class="col-first">
						<h1>Belanja</h1>
						<nav class="d-flex align-items-center">
							<a href="<?php echo base_url('welcome') ?>">Beranda<span class="lnr lnr-arrow-right"></span></a>
							<a href="<?php echo base_url('dashboard/belanja') ?>">Belanja</a>
						</nav>
					</div>
				</div>
			</div>
	</section>
	<!-- End Banner Area -->
	<br><br><br>


<!-- End Banner Area -->



	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">

				<div class="sidebar-categories">
					<div class="head">Kategori</div>
					
					<ul class="main-categories">
                    
						<li class="main-nav-list child">
							<a href="<?php echo base_url('dashboard/belanja') ?>">Semua Kategori</a>
						</li>

						<li class="main-nav-list child">
							<a href="<?php echo base_url('kategori/FurnitureRuangTamu') ?>">Furniture Ruang Tamu</a>
						</li>

						<li class="main-nav-list child">
							<a href="<?php echo base_url('kategori/FurnitureKamarTidur') ?>">Furniture Kamar Tidur</a>
						</li>

						<!-- <li class="main-nav-list child">
							<a href="<?php echo base_url('kategori/FurnitureRuangMakan') ?>">Furniture Ruang Makan</a>
						</li> -->
						
						<li class="main-nav-list child">
							<a href="<?php echo base_url('kategori/FurnitureKantor') ?>">Furniture Kantor</a>
						</li>
						
						<li class="main-nav-list child">
							<a href="<?php echo base_url('kategori/FurnitureDapurdanPantry') ?>">Furniture Dapur dan Pantry</a>
						</li>
						
						<li class="main-nav-list child">
							<a href="<?php echo base_url('kategori/AksesorisdanDekorasi') ?>">Aksesoris dan Dekorasi</a>
						</li>
						
						<li class="main-nav-list child">
							<a href="<?php echo base_url('kategori/FurnitureMultifungsi') ?>">Furniture Multifungsi</a>
						</li>
					</ul>

				</div>

			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">
						<!-- single product -->
						<?php foreach ($FurnitureDapurdanPantry as $brg) : ?>
						<div class="col-lg-4 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="<?php echo base_url() .'/uploads/' .$brg->gambar?>" alt="">
								<div class="product-details">
									<h6><?php echo $brg->nama_barang ?></h6>
									<p><?php echo $brg->keterangan ?></p>
									<div class="price">
										<h6>Rp. <?php echo number_format($brg->harga, 0,',','.') ?></h6>
									</div>
									<div class="prd-bottom">

										<a href="<?php echo base_url('dashboard/tambah_ke_keranjang/' . $brg->id_barang); ?>" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">Keranjang</p>
										</a>
										<a href="<?php echo base_url('dashboard/detail/' . $brg->id_barang); ?>" class="social-info">
											<span class="ti-search"></span>
											<p class="hover-text">Detail</p>
										</a>
										
									</div>
								</div>
							</div>
						</div>
						<?php endforeach;  ?>
					</div>
				</section>
				<!-- End Best Seller -->

			</div>
		</div>
	</div>

<br><br><br>


















