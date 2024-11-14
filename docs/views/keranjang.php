<br><br><br>

<section class="banner-area">
    <div class="container">
        <div
            class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
            <div class="col-first">
                <h1>Shopping Cart</h1>
                <nav class="d-flex align-items-center">
                    <a href="<?php echo base_url('welcome')?>">Home<span class="lnr lnr-arrow-right"></span></a>
                    <a href="<?php echo base_url('dashboard/belanja')?>">Keranjang</a>
                </nav>
            </div>
        </div>
    </div>
</section>

<!--================Cart Area =================-->
<section class="cart_area">
    <div class="container">
        <div class="cart_inner">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Produk</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Total</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($this->cart->contents() as $items) : ?>
                            <tr data-rowid="<?php echo $items['rowid']; ?>">
                                <td><?php echo $items['name']; ?></td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" value="<?php echo $items['qty']; ?>" class="input-text qty" readonly>
                                        <button class="increase items-count" data-rowid="<?php echo $items['rowid']; ?>"><i class="lnr lnr-chevron-up"></i></button>
                                        <button class="reduced items-count" data-rowid="<?php echo $items['rowid']; ?>"><i class="lnr lnr-chevron-down"></i></button>
                                    </div>
                                </td>
                                <td>Rp. <?php echo number_format($items['price'], 0, ',', '.'); ?></td>
                                <td class="subtotal">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.'); ?></td>
                                <td><a href="<?php echo base_url('dashboard/hapus_item/' . $items['rowid']); ?>" class="btn btn-sm btn-danger">Hapus</a></td>
                            </tr>
                        <?php endforeach; ?>
						
                        <tr  class="out_button_area">
						<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                            <td>
								<div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="<?php echo base_url('dashboard/hapus_keranjang')?>">Hapus Semua</a>
                                    <a class="primary-btn" href="<?php echo base_url('dashboard/pembayaran')?>">Pembayaran</a>
                                </div>
							</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!--================End Cart Area =================-->
