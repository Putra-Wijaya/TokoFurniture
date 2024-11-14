
	<div class="content-wrap">
            <div class="page-title">
                <h1>Edit Produk</h1>
                <p>Management of Heading and Paragraph</p>
            </div>

            <div class="content-inner remove-ext5">
                <div class="row mrg20">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="wdgt-box frm-wrp">
                            
							<?php foreach($barang as  $brg)  : ?>
							<div class="wdgt-titl">
								<div class="row">
									<img src="<?php echo base_url('uploads/' . $brg->gambar); ?>" alt="<?php echo $brg->nama_barang; ?>" width="75" height="75">
									<h4><?php echo $brg->nama_barang?></h4>
								</div>
                                <p>Masukan data produk terbaru </p>
                            </div>

                            <form class="cont-frm" method="post" action="<?php echo base_url().'admin/data_barang/update' ?>">
                                
								<div class="row mrg20">

                                    <div class="col-md-12 col-sm-12 col-lg-12">
										<label>Nama Barang</label>
										<input type="text" name="nama_barang" class="form-control" value="<?php echo $brg->nama_barang?>">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-12">
										<label>Keterangan</label>
										<input type="hidden" name="id_barang" class="form-control" value="<?php echo $brg->id_barang?>">
            							<input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan?>">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-12">
										<label>Kategori</label>
										<input type="text" name="kategori" class="form-control" value="<?php echo $brg->kategori?>">
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-lg-12">
										<label>Harga</label>
										<input type="text" name="harga" class="form-control" value="<?php echo $brg->harga?>">
                                    </div>
                                    
									<div class="col-md-12 col-sm-12 col-lg-12">
										<label>Stok</label>
            							<input type="text" name="stok" class="form-control" value="<?php echo $brg->stok?>">
                                    </div>

									<button type="submit">
										<i class="fa fa-paper-plane"></i>
										Simpan
									</button>
									
                                </div>
                            </form>
							<?php endforeach; ?>

                        </div>
                       
                    </div>
                </div>
            </div>
    </div><!-- Contant Wrap -->
