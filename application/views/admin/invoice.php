<div class="content-wrap">
	<div class="page-title">
		<h1>Data Pemesanan</h1>
		<p>Lihat data Pemesanan</p>
	</div>

	<div class="content-inner remove-ext5">
        <div class="row mrg20">
            <div class="col-md-12 col-sm-12 col-lg-12">
				<div class="wdgt-box tabl-wrp">
						<div class="ordr-tbl-wrp">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>No</th>
										<th>Nama Pemesan</th>
										<th>Telepon</th>
										<th>Alamat Pengiriman</th>
										<th>Tanggal Pemesanan</th>
										<th>Aksi</th>
									</tr>
								</thead>

								<tbody>
								<?php foreach ($invoice as $inv): ?>
								<tr>
									<td><?php echo $inv->id_invoice ?></td>
									<td><?php echo $inv->nama ?></td>
									<td><?php echo $inv->no_telp ?></td>
									<td><?php echo $inv->alamat ?></td>
									<td><?php echo $inv->tgl_pesan ?></td>
									<td>
									<a href="<?php echo base_url('admin/invoice/detail/'.$inv->id_invoice); ?>" class="btn btn-sm btn-outline-dark">Detail</a>
										<!-- <?php echo anchor('admin/invoice/detail/'.$inv->id_invoice, '<div class="btn btn-sm btn-outline-dark">Detail</div>') ?> -->
									</td>
								</tr>

								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
				</div>
			</div>
		</div>
	</div>
	
</div>
