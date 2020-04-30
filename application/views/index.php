
<div class="container-fluid mt-2">
	<!-- banner carousel -->
	<div class="row">
		<div class="col-12 col-md-6">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
				<img src="<?= base_url('assets/upload/slider/slider1.jpg'); ?>" class="d-block w-100" alt="banner1">
				</div>
				<div class="carousel-item">
				<img src="<?= base_url('assets/upload/slider/slider2.jpg'); ?>" class="d-block w-100" alt="banner2">
				</div>
				<div class="carousel-item">
				<img src="<?= base_url('assets/upload/slider/slider3.jpg'); ?>" class="d-block w-100" alt="banner3">
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
			</div>
		</div>
	</div>
	<!--  -->
	<div class="row mt-2">
		<?php foreach ($product as $p) : ?>
		<div class="col-6 col-md-4 col-lg-2">
			<a class="text-dark text-decoration-none" href="<?= base_url('home/singleProduct/') . $p['id']; ?>">
				<div class="card border-3 shadow-lg my-1">
					
				    <img src="<?= base_url('assets/upload/products/') . $p['image']; ?>" class="card-img-top" alt="...">
				  
				    <div class="card-body">
				      <h6 class="card-title font-weight-bolder text-info"><?= $p['name'] ?></h6>
				      <small>Rp. <?= $p['price'] ?></small>
				     	<br>
				      <small class="font-weight-bold">STOK <?= $p['quantity'] ?></small>
				    </div>
				    
				</div>
			</a>
		</div>
		<?php endforeach; ?>
	</div>
</div>