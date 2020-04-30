
<div class="container-fluid">
  <div class="row mb-4">
	<div class="col-4 col-md-3 font-weight-bolder d-none d-sm-block">Produk</div>
	<div class="col-4 col-md-3 font-weight-bolder d-none d-sm-block">Item</div>
	<!-- product name display when small width -->
	<div class="col-4 d-block d-md-none font-weight-bolder ml-auto">
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
	    ubah
	  </button>
	</div>
	<div class="col-md-3 font-weight-bolder d-none d-sm-block">Sub Total</div>
	<div class="col-md-3 font-weight-bolder d-none d-sm-block">Perubahan</div>
  </div>

  <?php $i = 1; ?>
  <?php foreach ($this->cart->contents() as $items): ?>
  <div class="row my-2">
  	<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
  	<div class="col-4 col-md-3 ">
  		<div class="row">
  			<div class="col-12 col-md-6 col-lg-4">
  				<img src="<?= base_url('assets/upload/products/') . $items['image']; ?>" style="width: 80px;">
  			</div>
  			<!-- product name display when medium or upper width -->
  			<div class="col-12 col-md-6 col-lg-8 d-none d-sm-block">
  				<?= $items['name']; ?>
  			</div>
  		</div>
  	</div>
	<div class="col-4 col-md-3 ">
		<div class="row">
			<!-- product name display when small width -->
			<div class="col-12 d-block d-md-none">
				<small><?= $items['name']; ?></small>
			</div>
			<!-- product quantity display when medium or upper width -->
			<div class="col-md-3 col-lg-2 d-none d-sm-block">
				<?= $items['qty']; ?> X
			</div>
			<!-- product quantity display when small width -->
			<div class="col-12 d-block d-md-none">
				<small><?= $items['qty']; ?> X</small>
			</div>
			<!-- product price display when medium or upper width -->
			<div class="col-md-9 d-none d-sm-block">
				<?= number_format($items['price'],0,',','.');?>
			</div>
			<!-- product price display when small width -->
			<div class="col-12 col-md-9 d-block d-md-none">
				<small><?= number_format($items['price'],0,',','.');?></small>
			</div>
		</div>
	</div>
	<!-- product subtotal price display when medium or upper width -->
	<div class="col-md-3 d-none d-sm-block">
		<?= number_format($items['subtotal'],0,',','.'); ?>
	</div>
	<div class="col-md-3 d-none d-sm-block">
		<a href="#" class="text-decoration-none" data-toggle="modal" data-target="#edit_cart">
		    <i class="fas fa-edit fa-lg"></i>   
		</a>
		<a class="pl-2 text-danger" data-toggle="modal" data-target="#delete_cart">
				<i class="fas fa-trash-alt fa-lg"></i>
		</a>
	</div>
	<!-- product subtotal price display when small width -->
	<div class="col-4 d-block d-md-none">
		<div class="collapse show" id="collapseExample">
			<div class="row py-4 pl-3">
				<small><?= number_format($items['subtotal'],0,',','.'); ?></small>
			</div>
		</div>
		<div class="collapse" id="collapseExample">
			<div class="row py-4">
				<div class="col-6">
					<a href="#" class="text-decoration-none" data-toggle="modal" data-target="#edit_cart">
		                 <i class="fas fa-edit fa-lg"></i>   
		            </a>
				</div>
				<div class="col-6">
					<a class="pl-2 text-danger" data-toggle="modal" data-target="#delete_cart">
	            		<i class="fas fa-trash-alt fa-lg"></i>
	    			</a>
				</div>
			</div>
		</div>
	</div>
  </div>
  <?php endforeach; ?>
	<hr>
	<!-- check whether user has address or not -->
	<?php if ($user) : ?>
		<?php if ($getAddress) : ?>
			<div class="row">
				<div>pilih ongkir</div>
			</div>
		<?php 	else : ?>
			<div class="row">
				<div>isikan alamat</div>
				<a href="<?= base_url('home/setting') ?>" class="btn btn-primary btn-sm ml-2">klik disini</a>
			</div>
		<?php endif; ?>
		<!-- user dosn't login but already input address form -->
	<?php elseif ($this->session->userdata('name')) : ?>
	<div class="row">
		<div>pilih ongkir tanpa login</div>
	</div>
	<?php else : ?>
	<h5>Masukkan Identitas</h5>
	<form action="<?= base_url('home/tempAddress'); ?>" method="post">
		<div class="form-group">
			<label for="name">nama</label>
			<input type="text" class="form-control" id="name" name="name">
		</div>
		<div class="form-group">
			<label for="phone">Nomer HP</label>
			<input type="text" class="form-control" id="phone" name="phone">
		</div>
		<div class="form-group">
			<label for="Province">Provinsi</label>
			<select class="form-control" id="Province" name="province">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
		<div class="form-group">
			<label for="city">kabupaten/kota</label>
			<select class="form-control" id="city" name="city">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
		<div class="form-group">
			<label for="subdistrict">kecamatan</label>
			<input type="text" class="form-control" id="subdistrict" name="subdistrict">
		</div>
		<div class="form-group">
			<label for="detail-address">Alamat Lebih Lengkap</label>
			<textarea class="form-control" id="detail-address" name="detail-address" rows="4"></textarea>
		</div>
		<button class="btn btn-primary mb-4" type="submit">simpan</button>
	</form>
	
	<?php endif; ?>
	<!-- buttom navbar visible only small dan medium size -->
      <div class="d-lg-none">
			<nav class="navbar navbar-expand-lg navbar-light shadow-lg mb-1 bg-white rounded border fixed-bottom">
			    <ul class="d-flex flex-column navbar-nav mr-auto">
			      <li class="nav-item active">
			      	<small>Total Belanja</small>
			        
			      </li>
			      <li class="nav-item font-weight-bolder text-danger h5">
			        Rp <?= number_format($this->cart->total(),0,',','.'); ?>
			      </li>
			    </ul>
			    <form class="form-inline my-2 my-lg-0" method="post" action="<?= base_url('home/checkout') ?>">
			    	<button type="submit" class="btn btn-danger btn-lg">
			    		<a href="<?= base_url('home/checkout') ?>" class="text-light text-decoration-none">
			    			Checkout
			    		</a>
			    	</button>
			      
			    </form>
			  
			</nav>

	<!-- modal for edit order -->
  <div class="modal fade" id="edit_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            
                  <div class="modal-header">
                    <h5 class="modal-title text-uppercase font-weight-bold">masukkan jumlah barang
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <p class="justify-content-left text-capitalize">
                  
                  </p>

                  <form action="<?= base_url('home/updateCart') ?>" method="post">
                      <input type="hidden" name="rowid" value="<?= $items['rowid']; ?>">
                      <input type="number" name="qty" value="<?= $items['qty']; ?>">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Tambah Jumlah Produk</button>
                  </div>
                  </form>
            
          </div>
        </div>
      </div>
	  </div>
      <!-- modal for delete cart -->
      <div class="modal fade" id="delete_cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title text-uppercase font-weight-bold text-danger">Yakin Ingin Hapus
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('home/removeCart/') . $items['rowid']; ?>" class="btn btn-danger">Hapus</a>
                  </div>
          </div>
        </div>
      </div>
</div>