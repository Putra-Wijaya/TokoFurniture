<!-- start footer Area -->
<footer class="footer-area">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Tentang</h6>
                    <p>
					Furniture Home menyediakan berbagai pilihan furniture berkualitas untuk mempercantik ruangan Anda. Dengan desain yang modern dan material yang tahan lama, produk kami dirancang untuk memenuhi kebutuhan dan gaya hidup Anda. 
                    </p>
                </div>
            </div>

			<div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Alamat</h6>
                    <p>
					Jl. Raya Jatiwaringin No.2, RT.8/RW.13, Cipinang Melayu, Kec. Makasar, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13620
                    </p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Ikuti </h6>
                    <p>Let us be social</p>
                    <div class="footer-social d-flex align-items-center">
                        <a href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-instagram"></i>
                        </a>
                        
                    </div>
                </div>
            </div>

        </div>

        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0"> 
                Copyright &copy; 
                <script>document.write(new Date().getFullYear()); </script>
                All rights reserved | 
                <a href="#">Furniture Home</a>
            </p>
        </div>
    </div>
	<hr>
</footer>
<!-- End footer Area -->

<!-- Scripts -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script> -->

<script src="<?php echo base_url() ?>assets/Front/js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url() ?>assets/Front/js/vendor/bootstrap.min.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/Front/js/jquery.ajaxchimp.min.js"></script> -->
<script src="<?php echo base_url() ?>assets/Front/js/jquery.nice-select.min.js"></script>
<script src="<?php echo base_url() ?>assets/Front/js/jquery.sticky.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/Front/js/nouislider.min.js"></script> -->
<!-- <script src="<?php echo base_url() ?>assets/Front/js/countdown.js"></script> -->
<script src="<?php echo base_url() ?>assets/Front/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/Front/js/owl.carousel.min.js"></script>

<script src="<?php echo base_url() ?>assets/Front/js/main.js"></script>



<script>
    $(document).ready(function () {
        // Menangani tombol increase
        $('.increase').on('click', function () {
            var rowid = $(this).data('rowid');
            updateCart(rowid, 1); // Tambah jumlah item dengan 1
        });

        // Menangani tombol reduce
        $('.reduced').on('click', function () {
            var rowid = $(this).data('rowid');
            updateCart(rowid, -1); // Kurangi jumlah item dengan 1
        });

        function updateCart(rowid, qtyChange) {
            $.ajax({
                url: "<?php echo base_url('dashboard/update_keranjang'); ?>",
                method: "POST",
                data: { rowid: rowid, qty: qtyChange },
                success: function (response) {
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        // Perbarui jumlah item, subtotal, dan total keseluruhan
                        $('[data-rowid="' + rowid + '"] .qty').val(data.qty);
                        $('[data-rowid="' + rowid + '"] .subtotal').text('Rp. ' + data.subtotal);
                        $('.cart-total').text('Rp. ' + data.total);
                    } else {
                        alert(data.message || 'Terjadi kesalahan.');
                    }
                },
                error: function () {
                    alert('Gagal memperbarui keranjang. Silakan coba lagi.');
                }
            });
        }
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        // Tangkap event submit form
        document
            .getElementById('form-pesanan')
            .onsubmit = function (event) {
                event.preventDefault(); // Stop form submission
                // Proses form dan tampilkan SweetAlert
                Swal
                    .fire(
                        {title: 'Pesanan Anda Telah Diproses!', text: 'Terima kasih telah berbelanja.', icon: 'success', confirmButtonText: 'OK'}
                    )
                    .then((result) => {
                        if (result.isConfirmed) {
                            // Submit form setelah alert di klik OK
                            this.submit();
                        }
                    });
            };
    </script>
	
	<script>
		// Fungsi untuk menambah quantity
		function incrementQty() {
			var quantityInput = document.getElementById('quantity_input');
			// Pengecualian: Cek apakah elemen quantity_input ada di halaman
			if (quantityInput) {
				var currentQty = parseInt(quantityInput.value);
				quantityInput.value = currentQty + 1;
			} else {
				// Log jika elemen quantity_input tidak ditemukan
				console.warn("Elemen quantity_input tidak ditemukan.");
			}
		}

		// Fungsi untuk mengurangi quantity, dengan batas minimum 1
		function decrementQty() {
			var quantityInput = document.getElementById('quantity_input');
			// Pengecualian: Cek apakah elemen quantity_input ada di halaman
			if (quantityInput) {
				var currentQty = parseInt(quantityInput.value);
				// Pengecualian: Cek apakah kuantitas lebih dari 1 sebelum mengurangi
				if (currentQty > 1) {
					quantityInput.value = currentQty - 1;
				} else {
					// Pesan pengecualian jika kuantitas kurang dari 1
					alert("Kuantitas tidak bisa kurang dari 1.");
				}
			} else {
				// Log jika elemen quantity_input tidak ditemukan
				console.warn("Elemen quantity_input tidak ditemukan.");
			}
		}
	</script>

</body>
</html>
