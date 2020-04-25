<body id="page-top"> 
    <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    
	<div class="row">
		<div class="col-lg-2">
			
		</div>
		<div class="col-lg-4">
			<div class="card" style="width: 18rem;">
			  <img src="<?= base_url('assets/upload/products/') . $product['image']; ?>" class="card-img-top">
			  <div class="card-body">
			    <h5 class="card-title"><?= $product['name']; ?></h5>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			  </div>
			</div>
		</div>


	</div>
    
  </div>

