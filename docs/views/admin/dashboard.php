<div class="content-wrap">
    <div class="home-title">
        <h1>Welcome<strong> <?php echo $this->session->userdata('username') ?> .</strong></h1>
        <p>Hasil Data Penjualan</p>
    </div>

	<br><br><br>
	
	<div class="container-fluid mb-10">
		
		<!-- Content Row -->
		<div class="row">

			<!-- Total Pelanggan -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
									Total Pelanggan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user ?></div>
							</div>

							<div class="col-auto">
								<i class="icon ion-android-people fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Total Pendapatan -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
								Total Pendapatan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_pendapatan ?></div>
							</div>
							<div class="col-auto">
								<i class="fa fa-money fa-2x"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Produk Tersedia -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
									Produk Tersedia
								</div>
								<div class="row no-gutters align-items-center">
									<div class="col-auto">
										<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= $barang ?></div>
									</div>
									<div class="col">
										<div class="progress progress-sm mr-2">
											<div class="progress-bar bg-info" role="progressbar"
												style="width: 50%" aria-valuenow="50" aria-valuemin="0"
												aria-valuemax="100"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-auto">
								<i class="fa fa-opencart fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Total Penjualan -->
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
									Total Penjualan</div>
								<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $jumlah ?></div>
							</div>
							<div class="col-auto">
								<i class="fa fa-tags fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>

			</div>
		</div>

            <div class="content-inner remove-ext5">


                <div class="row mrg20">

					<div class="col-md-8 col-sm-12 col-lg-12">
                        <div class="wdgt-box rvnu-chrt">
                            <div class="wdgt-opt">
                                <a class="refrsh-btn" href="#" title=""><i class="icon ion-ios-reload"></i></a>
                                <a class="expnd-btn" href="#" title=""><i class="icon ion-arrow-expand"></i></a>
                            </div>
                            <div class="wdgt-ldr">
                                <div class="ball-pulse">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                            <h4>Total Pendapatan</h4>
							<canvas id="salesChart" style="display: block; height: 350px; width: 100%;"></canvas>
                        </div>
                    </div>

					<div class="col-md-12 col-sm-12 col-lg-12">
						<div class="wdgt-box wrkng-ordr styl2">
							<div class="wdgt-opt">
								<a class="refrsh-btn" href="#" title=""><i class="icon ion-ios-reload"></i></a>
								<a class="expnd-btn" href="#" title=""><i class="icon ion-arrow-expand"></i></a>
							</div>
							<div class="wdgt-ldr">
								<div class="ball-pulse">
									<div></div>
									<div></div>
									<div></div>
								</div>
							</div>
							
							<h4>Pesanan Terbaru</h4>
							<div class="slct-box">
								<?php echo date('d-m-Y'); ?>
							</div>
							<div class="ordr-tbl-wrp">
								<table>
									<thead>
										<tr>
											<th>ID Pesanan</th>
											<th>Produk</th>
											<th>Harga</th>
											<th>Jumlah Barang</th>
											<th>Bukti Bayar</th> <!-- Menambahkan kolom untuk Bukti Bayar -->
										</tr>
									</thead>
									<tbody>
										<?php if (!empty($pesanan_terbaru)): ?>
											<?php foreach ($pesanan_terbaru as $row): ?>
												<tr>
													<td><?= $row->id; ?></td>
													<td>
														<h4>
															<a href="<?= base_url('invoice/detail/'.$row->id_invoice); ?>" title=""><?= $row->nama_barang; ?></a>
														</h4>
													</td>
													<td>Rp. <?= number_format($row->harga, 0, ',', '.'); ?></td>
													<td><?= $row->jumlah; ?></td>
													<td>
														<?php if (!empty($row->bukti_pembayaran)): ?>
															<img src="<?php echo base_url('uploads/' . $row->bukti_pembayaran); ?>" alt="Bukti Bayar" style="width: 100px; height: auto;">
														<?php else: ?>
															Tidak ada bukti bayar
														<?php endif; ?>
													</td> <!-- Menampilkan bukti bayar -->
												</tr>
											<?php endforeach; ?>
										<?php else: ?>
											<tr><td colspan="5">Tidak ada pesanan terbaru</td></tr>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>


                </div>
            </div>

    </div>
		








