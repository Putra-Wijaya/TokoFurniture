<div class="content-wrap">
    <div class="page-title">
        <h1>Detail Pesanan</h1>
        <p><?php echo $invoice->id_invoice; ?></p>
    </div>

    <div class="content-inner remove-ext5">
        <div class="row mrg20">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class="wdgt-box invoc-wrp">
                    <div class="invoc-hed">
                        <div class="invoc-hed-lft">
                            <h1>Invoice</h1>
                            <ul class="invoc-dat-lst">
                                <li>Invoice No:<span><?php echo $invoice->id_invoice; ?></span></li>
                                <li>Tanggal Cetak :<span><?php echo date('d-m-Y'); ?></span></li>
                            </ul>
                        </div>
                    </div>

                    <div class="invoc-inf-wrp">
                        <div class="invoc-inf-innr invoc-inf-frm col-12">
                            <span>Nama Lengkap
                                <i class="cmpn-nam">: <?php echo $invoice->nama; ?></i>
                            </span>

                            <span>Alamat
                                <i>: <?php echo $invoice->alamat; ?></i>
                            </span>

                            <span>Phone
                                <i>: <?php echo $invoice->no_telp; ?></i>
                            </span>

                            <span>Tanggal Pemesanan
                                <i>: <?php echo $invoice->tgl_pesan; ?></i>
                            </span>

                            <!-- Menambahkan bagian untuk bukti pembayaran -->
                            <span>Bukti Pembayaran
                                <i>: 
                                    <?php if (!empty($invoice->bukti_pembayaran)): ?>
                                        <img src="<?php echo base_url('uploads/' . $invoice->bukti_pembayaran); ?>" alt="Bukti Pembayaran" style="width: 200px; height: auto;">
                                    <?php else: ?>
                                        Tidak ada bukti pembayaran.
                                    <?php endif; ?>
                                </i>
                            </span>
                        </div>
                    </div>

                    <div class="invoc-dta">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID BARANG</th>
                                    <th>NAMA PRODUK</th>
                                    <th>JUMLAH PESANAN</th>
                                    <th>HARGA SATUAN</th>
                                    <th>SUB-TOTAL</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php 
                                    $total = 0;
                                    foreach ($pesanan as $psn) :
                                        $subtotal = $psn->jumlah * $psn->harga;
                                        $total += $subtotal;
                                ?>
                                    <tr>
                                        <td><?php echo $psn->id_barang; ?></td>
                                        <td><?php echo $psn->nama_barang; ?></td>
                                        <td><?php echo $psn->jumlah; ?></td>
                                        <td><?php echo number_format($psn->harga, 0, ',', '.'); ?></td>
                                        <td><?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="invoc-tl">
                            <span>Total:<i> <?php echo number_format($total, 0, ',', '.'); ?></i></span>
                        </div>
                    </div>

                    <div class="invoc-not">
                        <p><span>Tanggal Cetak :</span> <?php echo date('d-m-Y'); ?></p>
                    </div>

                    <a class="btn btn-sm btn-outline-dark" href="<?php echo base_url('admin/invoice/index'); ?>">Kembali</a>
                    <button class="btn btn-sm btn-outline-info" onclick="window.location.href='<?= base_url('admin/invoice/export_pdf/'.$invoice->id_invoice); ?>'">Print</button>
                    <!-- <button class="btn btn-sm btn-success" onclick="window.location.href='<?= base_url('admin/invoice/export_excel/'.$invoice->id_invoice); ?>'">Export to Excel</button> -->

                </div>
            </div>
        </div>
    </div>
</div>
