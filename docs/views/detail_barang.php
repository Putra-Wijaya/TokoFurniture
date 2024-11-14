<br><br><br>

<!--================Single Product Area =================-->
<div class="product_image_area">
    <div class="container">
        <?php foreach ($barang as $brg): ?>
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product">
                        <div class="single-prd-item">
                            <img src="<?php echo base_url() . '/uploads/' . $brg->gambar ?>" class="card-img-top">
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3><?php echo $brg->nama_barang ?></h3>
                        <h2>Rp. <?php echo number_format($brg->harga, 0, ',', '.'); ?></h2>
                        <ul class="list">
                            <li><a class="active" href="#"><span>Kategori</span> : <?php echo $brg->kategori ?></a></li>
                            <li><a href="#"><span>Availability</span> : <?php echo $brg->stok ?></a></li>
                        </ul>
                        <p><?php echo $brg->keterangan ?></p>

                        <div class="card_area d-flex align-items-center">
                            <a class="primary-btn col-12 text-center" href="<?= base_url('dashboard/tambah_ke_keranjang/' . $brg->id_barang) ?>">Pesan</a>
                        </div>

							<!-- <a class="genric-btn danger radius" href="<?= base_url('dashboard/belanja/') ?>">Kembali</a> -->
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<!--================End Single Product Area =================-->
<br><br><br>


