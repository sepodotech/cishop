<body id="page-top"> 
    <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    
	<div class="row">
		<div class="col-lg-7">
			<div class="card">
				<div class="card-header">
					<h4><?= $product['name']; ?></h4>
				</div>
				<div class="card-body">
					<h6 class="font-weight-bold">Kwantitas :</h6>
					<p><?= $product['quantity']; ?></p>
					<h6 class="font-weight-bold">Harga :</h6>
					<p><?= $product['price']; ?></p>
					<h6 class="font-weight-bold">Harga Member :</h6>
					<p><?= $product['member_price']; ?></p>
				</div>
			</div>
		</div>
		<div class="col-lg-5">
			<img src="<?= base_url('assets/upload/products/') . $product['image']; ?>" alt="single-product" class="img-thumbnail">	
		</div>
	</div>
	<div class="row mt-5">
		<div class="col-lg-12">
		<div class="card">
			<div class="card-body">
				<h6 class="font-weight-bold">Kategori :</h6>
				<p><?= $product['category_id']; ?></p>
				<h6 class="font-weight-bold">Berat :</h6>
				<p><?= $product['weight']; ?></p>
				<h6 class="font-weight-bold">Dikirim Dari :</h6>
				<p><?= $product['shipping_origin']; ?></p>
				<h6 class="font-weight-bold">Deskripsi :</h6>
				<p><?= $product['description']; ?></p>
			</div>
			<div class="card-footer">
				<a href="" class="btn btn-primary">edit</a>
			</div>
		</div>
		</div>
	</div>
    
  </div>

