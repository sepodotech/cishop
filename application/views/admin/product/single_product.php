<body id="page-top"> 
    <!-- Begin Page Content -->
	<div class="container-fluid">
		<h2 class="text-center text-uppercase font-weight-bolder"><?= $product['name']; ?></h2>
		<div class="row">
			<div class="col-lg-4 mb-2">
				<img src="<?= base_url('assets/upload/products/') . $product['image']; ?>" alt="single-product" class="img-thumbnail">	
			</div>
			<div class="col-lg-8">
				<div class="card-group">
					<div class="card">
						<div class="card-body">
						<h6 class="font-weight-bold">SKU :</h6>
							<p><?= $product['SKU']; ?></p>
							<h6 class="font-weight-bold">Kwantitas :</h6>
							<p><?= $product['quantity']; ?></p>
							<h6 class="font-weight-bold">Harga :</h6>
							<p><?= $product['price']; ?></p>
							<h6 class="font-weight-bold">Harga Member :</h6>
							<p><?= $product['member_price']; ?></p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h6 class="font-weight-bold">Kategori :</h6>
							<p><?= $product['category_id']; ?></p>
							<h6 class="font-weight-bold">Berat :</h6>
							<p><?= $product['weight']; ?></p>
							<h6 class="font-weight-bold">Dikirim Dari :</h6>
							<p><?= $product['shipping_origin']; ?></p>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<h6 class="font-weight-bold">Deskripsi :</h6>
							<p><?= $product['description']; ?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Varian1">Tambah Varian</button>
			</div>
		</div>

		<!-- table varian -->
		<?php if(array_key_exists('option1',$product)) : ?>
			<?php foreach($product['option1'] as $op1) : ?>
			<table class="table mt-3">
				<thead class="thead-dark">
					<tr>
					<th scope="col"><?= $op1['option_name']; ?></th>
					<th scope="col" class="text-uppercase"><?= $op1['option_value']; ?></th>
					<?php if ($op1['option_stok'] != NULL) : ?>
						<th scope="col">
							<i class="fas fa-edit fa-lg"></i> | <i class="fas fa-trash-alt fa-lg"></i>
						</th>
						<th scope="col"> STOK = <?= $op1['option_stok']; ?> </th>
					<?php endif; ?>
					<?php if ($op1['option_stok'] == NULL) : ?>
						<th scope="col" colspan="2">
							<i class="fas fa-edit fa-lg"></i> | <i class="fas fa-trash-alt fa-lg"></i>
						</th>
					<?php endif; ?>
					
					</tr>
				</thead>
				<thead class="thead-dark">
					<tr>
						<th colspan="4">	
						<a href="<?= base_url('adminProduct/addSubvariant/'. $op1['id'] . '/' . $product['id']) ;?>" class="text-light text-decoration-none">
							<i class="fas fa-folder-plus fa-lg"></i> Tambah Subvarian
						</a>
						</th>
					</tr>
				</thead>
				<?php if (array_key_exists('option2',$op1)) : ?>
				
				<thead class="thead-light">
					<tr>
					<th scope="col">NO</th>
					<th scope="col"><?= $op1['option2'][0]['option2_name'] ?></th>
					<th scope="col">Stok</th>
					<th scope="col">Action</th>
					</tr>
				</thead>
				<?php $i = 1;
				foreach($op1['option2'] as $op2) :
				?>
				<tbody>
					<tr>
					<th scope="row"><?= $i++?></th>
					<td><?= $op2['option2_value']; ?></td>
					<td><?= $op2['option2_stok']; ?></td>
					<td><i class="fas fa-edit fa-lg"></i> | <i class="fas fa-trash-alt fa-lg"></i></td>
					</tr>
				</tbody>
				<?php endforeach; ?>
				<?php endif; ?>
			</table>
			<?php endforeach; ?>
		<?php endif; ?>
		
	</div>

<!-- Modal Varian 1 -->
<div class="modal fade" id="Varian1" tabindex="-1" role="dialog" aria-labelledby="Varian1Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Varian1Label">Tambah Varian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
	  </div>
	  <form action="<?= base_url('adminProduct/addVariant/'). $product['id'];?>" method="post">
      <div class="modal-body">
		<!-- <input type="hidden" name="id" value="<?= $product['id'];?>"> -->
		<input type="hidden" name="sku" value="<?= $product['SKU'];?>">
	  	<div class="form-group">
			<select class="form-control" name="name">
				<option>Color</option>
				<option>Size</option>
			</select>
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="value" placeholder="Varian">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="stok" placeholder="stok">
			<small>kosongkan input stok jika ingin menambah subvarian</small>
		</div>	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
	  </div>
	  </form>
    </div>
  </div>
</div>

