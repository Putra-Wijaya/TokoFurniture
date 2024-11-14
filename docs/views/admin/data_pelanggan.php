<div class="content-wrap">
	<div class="page-title">
		<h1>Data Pelanggan</h1>
		<p>Lihat data Pelanggan</p>
	</div>


	<div class="content-inner remove-ext5">
        <div class="row mrg20">
            <div class="col-md-12 col-sm-12 col-lg-12">
				<div class="wdgt-box tabl-wrp">
					<h4>Data Pelanggan</h4>
					<div class="ordr-tbl-wrp">
						<table class="table table-hover">
							<thead>
							<tr>
									<th>No</th>
									<th>Nama</th>
									<th>Username</th>
									<th>Aksi</th>
									<!-- <th>Role ID</th> -->
								</tr>
							</thead>

							<tbody>
								<?php if (!empty($pelanggan)): ?>
									<?php foreach ($pelanggan as $pelang): ?>
										<tr>
											<td><?php echo $pelang->id; ?></td>
											<td><?php echo $pelang->nama; ?></td>
											<td><?php echo $pelang->username; ?></td>
											<td>
												<a href="<?php echo base_url('admin/data_pelanggan/hapus/' . $pelang->id); ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Anda yakin ingin menghapus pelanggan ini?')">Hapus</a>
											</td>
											<!-- <td><?php echo $pelang->role_id; ?></td> -->
										</tr>
									<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="5" class="text-center">Tidak ada data pelanggan.</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>


