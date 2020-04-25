
<div class="container-fluid">
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