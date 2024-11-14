
<div class="content-wrap">
	<div class="page-title">
		<h1>Data Produk</h1>
		<p>Lihat data Produk</p>
	</div>

    <button
        class="btn btn-sm btn-outline-dark mt-3 mb-3"
        data-toggle="modal"
        data-target="#tambah_barang">
        <i class="ion-android-add"></i> Tambah Produk
	</button>

	<div class="content-inner remove-ext5">
        <div class="row mrg20">
            <div class="col-md-12 col-sm-12 col-lg-12">
				<div class="wdgt-box tabl-wrp">
					<h4>Data Produk</h4>
						<div class="ordr-tbl-wrp">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>PRODUK</th>
										<th>NAMA PRODUK</th>
										<th>KETERANGAN</th>
										<th>KATEGORI</th>
										<th>HARGA</th>
										<th>STOK</th>
										<th>AKSI</th>
									</tr>
								</thead>

								<tbody>
									<?php foreach($barang as $brg) : ?>
									<tr>
										<td>
											<img
												src="<?php echo base_url('uploads/' . $brg->gambar); ?>"
												alt="<?php echo $brg->nama_barang; ?>"
												width="75"
												height="75">
										</td>
										<td><?php echo $brg->nama_barang ?></td>
										<td><?php echo $brg->keterangan ?></td>
										<td><?php echo $brg->kategori ?></td>
										<td><?php echo $brg->harga ?></td>
										<td><?php echo $brg->stok ?></td>
										<td>
											<?php echo anchor('admin/data_barang/edit/' . $brg->id_barang, '<div class="btn btn-outline-warning btn-sm"><i class="fa fa-edit"></i></div>')?>
											<?php echo anchor('admin/data_barang/hapus/' . $brg->id_barang, '<div class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i></div>')?>
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

	<!-- Modal -->
<div
    class="modal fade"
    id="tambah_barang"
    tabindex="-1"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-white text-black">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Baru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url().'admin/data_barang/tambah_aksi'; ?>"
                    method="post"
                    enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input
                            type="text"
                            id="nama_barang"
                            name="nama_barang"
                            class="form-control"
                            placeholder="Masukkan nama produk"
                            required="required">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea
                            id="keterangan"
                            name="keterangan"
                            class="form-control"
                            rows="3"
                            placeholder="Deskripsi singkat produk"
                            required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" class="form-control" name="kategori" required="required">
                            <option value="" disabled="disabled" selected="selected">Pilih Kategori</option>
                            <option>Furniture Ruang Makan</option>
                            <option>Furniture Ruang Tamu</option>
                            <option>Furniture Kamar Tidur</option>
                            <option>Furniture Kantor</option>
                            <option>Furniture Dapur dan Pantry</option>
                            <option>Aksesoris dan Dekorasi</option>
                            <option>Furniture Multifungsi</option>
                        </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="harga">Harga</label>
                            <input
                                type="number"
                                id="harga"
                                name="harga"
                                class="form-control"
                                placeholder="Masukkan harga"
                                required="required">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="stok">Stok</label>
                            <input
                                type="number"
                                id="stok"
                                name="stok"
                                class="form-control"
                                placeholder="Jumlah stok"
                                required="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar Produk</label>
                        <input type="file" id="gambar" name="gambar" class="form-control-file">
                        <small class="form-text text-muted">Format gambar: jpg, png, atau jpeg.</small>
                    </div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</div>
		</form>
    </div>
</div>
