<br><br><br>
<!-- Start Banner Area -->
<section class="banner-area">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Kontak</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Beranda<span class="lnr lnr-arrow-right"></span></a>
						<a href="category.html">Kontak</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	
	<br><br><br>
	<!--================Contact Area =================-->
    <section class="contact_area section_gap_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="contact_info">
                        <div class="info_item">
                            <i class="lnr lnr-home"></i>
                            <h6>Jakarta, Indonesia</h6>
                            <p>Jakarta Timur 13230</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-phone-handset"></i>
                            <h6><a href="#">0897 2838 21341</a></h6>
                            <p>Senin Sampai Jum'at <br> 09.00 AM - 06.00 PM</p>
                        </div>
                        <div class="info_item">
                            <i class="lnr lnr-envelope"></i>
                            <h6><a href="#">FurnitureHome@Gmail.com</a></h6>
                            <p>Kirim Pertanyaan Anda</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9">
                    <?php if ($this->session->flashdata('success')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <form class="row contact_form" action="<?php echo site_url('kontak/send_message'); ?>" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 text-right">
							<br>
                            <button type="submit" class="btn btn-block btn-dark">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
	<!--================Contact Area =================-->
