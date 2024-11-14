<!-- Start Banner Area -->
<section class="banner-area">
    <div class="container">
        <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Pembayaran</h1>
                <nav class="d-flex align-items-center">
                    <a href="index.html">Beranda<span class="lnr lnr-arrow-right"></span></a>
                    <a href="category.html">Pembayaran</a>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Detail Pembayaran</h3>
                    <form class="row contact_form" method="post" action="<?php echo base_url('dashboard/proses_pesanan'); ?>" id="form-pesanan" enctype="multipart/form-data">
                        <div class="col-md-12 form-group p_star">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama" placeholder="Nama Lengkap Anda" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>Alamat Lengkap</label>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap Anda" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>No. Telepon</label>
                            <input type="text" name="no_telp" placeholder="No Telepon Anda" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <label>Pilih Bank</label>
                            <select class="country_select" name="bank" required>
                                <option value="">Pilih Bank</option>
                                <option>BCA - 1298432423895</option>
                                <option>BNI - 5684324211225</option>
                                <option>BRI - 8914732854254</option>
                                <option>MANDIRI - 1284325425</option>
                            </select>
                        </div>
                        <p>Lakukan pembayaran terlebih dahulu melalui no.Rek yang tersedia, lalu upload bukti pembayaran dan klik pesan. Terima Kasih!</p>
                </div>

                <div class="col-lg-4">
                    <?php $grand_total = 0; if ($keranjang = $this->cart->contents()): ?>
                    <div class="order_box">
                        <h2>Pesanan Anda</h2>
                        <ul class="list">
                            <li><a href="#">Produk<span>Total</span></a></li>
                            <?php foreach ($keranjang as $item): ?>
                            <li>
                                <a href="#"><?php echo $item['name']; ?>
                                    <span class="middle">x <?php echo $item['qty']; ?></span>
                                    <span class="last">Rp. <?php echo number_format($item['subtotal'], 0, ',', '.'); ?></span>
                                </a>
                            </li>
                            <?php $grand_total += $item['subtotal']; ?>
                            <?php endforeach; ?>
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Total<span>Rp. <?php echo number_format($grand_total, 0, ',', '.'); ?></span></a></li>
                        </ul>
                    </div>
                    
                    <div class="order_box">
                        <label>Upload Bukti Pembayaran</label>
                        <input type="file" name="userfile" size="290" class="form-control" required />
                    </div>
                    
                    <button type="submit" class="btn btn-block btn-dark mb-3">Pesan</button>
                    <a href="<?php echo base_url('dashboard/detail_keranjang'); ?>" class="btn btn-block btn-danger">Kembali ke Keranjang</a>

                    <?php else: ?>
                    <p>Keranjang belanja Anda kosong.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
