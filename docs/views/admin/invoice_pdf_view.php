

<div class="content-wrap">
            <div class="content-inner remove-ext5">
                <div class="row mrg20">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="wdgt-box invoc-wrp">
                            <div class="invoc-hed">
                                <div class="invoc-hed-lft">
                                    <h1>Invoice</h1>
									<br>
                                    <ul class="invoc-dat-lst">
                                        <li>Invoice No : <span><?php echo $invoice->id_invoice; ?></span></li><br>
                                        <li>Tanggal Cetak : <span> <?php echo date('d-m-Y'); ?></span></li><br>
                                    </ul>
                                </div>
                            </div>

                            <div class="invoc-inf-wrp">

                                <div class="invoc-inf-innr invoc-inf-frm">
                                    <span>Nama Lengkap
										<i class="cmpn-nam">: <?php echo $invoice->nama; ?></i>
									</span>

									<br>

                                    <span>Alamat
										<i>: <?php echo $invoice->alamat; ?></i>
									</span>

									<br>

                                    <span>Phone
										<i>: </i>
									</span>

									<br>

                                    <span>Tanggal Pemesanan
										<i>: <?php echo $invoice->tgl_pesan; ?></i>
									</span>

									<br>

									<span>Bukti Pembayaran
										<i>: 
											<?php if (!empty($invoice->bukti_pembayaran)): ?>
												<img src="<?php echo base_url('uploads/' . $invoice->bukti_pembayaran); ?>" alt="Bukti Pembayaran" style="width: 100px; height: auto;">
											<?php else: ?>
												Tidak ada bukti pembayaran.
											<?php endif; ?>
										</i>
									</span>

									<br>
                                </div>
                            </div>

							<hr>
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
								<hr>
                                <div class="invoc-tl">
                                    <span>Total:<i> <?php echo number_format($total, 0, ',', '.'); ?></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- Contant Wrap -->

