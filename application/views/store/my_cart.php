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
	<!-- check whether user has loggin or not -->
	<?php if ($user) : ?>
		<!-- when user logged in, check there wes address or not -->
		<?php if (array_key_exists('user_detail_id',$user)) : ?>
			<div class="form-check">
				<input class="form-check-input" type="checkbox" id="dropship">
				<label class="form-check-label" for="dropship">Dropship</label>
			</div>
		<form action="<?= base_url('home/addTempAddress'); ?>" method="post">
			<div id="dropshipping">
				<div class="form-group">
					<label for="dropship-name">Nama</label>
					<input type="text" class="form-control" id="dropship-name" name="dropship-name">
				</div>
				<div class="form-group">
					<label for="dropship-phone">No HP</label>
					<input type="text" class="form-control" id="dropship-phone" name="dropship-phone">
				</div>
				<div class="form-group">
					<label for="dropship-nation">Negara</label>
					<input type="text" class="form-control" id="dropship-nation" name="dropship-nation">
				</div>
				<div class="form-group">
					<label for="province">Provinsi :</label>
					<br>
					<small class="text-success">jika belum muncul, mohon tunggu!</small>
					<select class="user-province form-control" id="dropship-province">
						<option value=""> Pilih Provinsi</option>
					</select>
            	</div>
				<input type="hidden" name="province" class="dropship-province">
				<div class="form-group">
					<label for="city">Kab/Kota :</label>
					<br>
					<li class="spinner-border text-info loading" role="status">
						<span class="sr-only">Loading...</span>
					</li>
					<select class="user-city form-control" id="dropship-city">
						<option value=""> Pilih Kab/Kota</option>
					</select>
				</div>
				<input type="hidden" name="city" class="dropship-city">
				<div class="form-group">
					<label for="subdistrict">Kecamatan :</label>
					<input type="text" name="subdistrict" class="form-control" id="subdistrict">
					<?= form_error('subdistrict', '<small class="text-danger">', '</small>'); ?>
				</div>
				<div class="form-group">
					<label for="complite_address">Alamat Lengkap :</label>
					<textarea type="text" name="complete_address" class="form-control" id="complite_address"></textarea>
					<?= form_error('complete_address', '<small class="text-danger">', '</small>'); ?>
				</div>
			</div>
			<div class="form-group">
				<label for="courier">Pilih Jasa Kirim</label>
				<select class="form-control courier" id="courier" name="courier">
					<option value="" >Pilih Ongkir</option>	
					<option value="jne" >JNE Reguler</option>
					<option value="pos" >POS Kilat Khusus</option>
				</select>
			</div>
			<input type="hidden" name="weight" value="<?= $weight; ?>">
			<li class="spinner-border text-info loading" role="status">
				<span class="sr-only">Loading...</span>
			</li>
			<div id="ongkir"></div>
			<!-- buttom navbar visible only small dan medium size -->
			<div class="d-lg-none">
				<nav class="navbar navbar-expand-lg navbar-light shadow-lg mb-1 bg-white rounded border fixed-bottom">
					<ul class="d-flex flex-column navbar-nav mr-auto">
						<li class="nav-item active">
						<small>Total Belanja dan ongkir</small>
						<li class="spinner-border text-info loading" role="status">
							<span class="sr-only">Loading...</span>
						</li>
						</li>
						<li class="nav-item font-weight-bolder text-danger h5" id="totalShopping">
						Rp 0
						</li>
					</ul>
						<input type="hidden" value="" id="total-shopping" name="total-shopping">
						<button type="submit" class="btn btn-danger btn-lg btn-checkout">Checkout</button>
						<button class="btn btn-danger btn-lg btn-loading" type="button" disabled>
							<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
							Loading...
						</button>
				</nav>
			</div>
		</form>
		<?php 	else : ?>
			<div class="d-lg-none">
				<nav class="navbar navbar-expand-lg navbar-light shadow-lg mb-1 bg-white rounded border fixed-bottom">
						<a href="<?= base_url('home/profile') ?>" type="submit" class="btn btn-secondary btn-lg ml-auto">Isi Alamat</a>
				</nav>
			</div>
		<?php endif; ?>
	<?php else : ?>
	<!-- buttom navbar visible only small dan medium size -->
	<div class="d-lg-none">
		<nav class="navbar navbar-expand-lg navbar-light shadow-lg mb-1 bg-white rounded border fixed-bottom">
				<a href="<?= base_url('auth/registration') ?>" type="submit" class="btn btn-secondary btn-lg ml-auto">Registrasi</a>
		</nav>
	</div>
	<?php endif; ?>		
		
	<!-- modal for edit cart -->
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
					<button type="submit" id="edit_cart" class="btn btn-primary">Tambah Jumlah Produk</button>
				</div>
				</form>
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


