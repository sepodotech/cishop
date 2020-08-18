<?php
$totalshopping = intval($this->session->userdata("shopping"));
?>
<div class="container-fluid">
  <div class="row mb-4">
	<div class="col-4 col-md-3 font-weight-bolder">Produk</div>
	<div class="col-4 col-md-3 font-weight-bolder">Item</div>
	<div class="col-4 col-md-3 font-weight-bolder">Sub Total</div>
  </div>

  <?php $i = 1; ?>
	<?php foreach ($this->cart->contents() as $items): ?>
	<div class="row mt-2">
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
		<!-- product subtotal price display when small width -->
		<div class="col-4 d-block d-md-none">
			<div class="row py-4 pl-3">
				<small><?= number_format($items['subtotal'],0,',','.'); ?></small>
			</div>
		</div>
	</div>
	<?php endforeach; ?>
	<hr>
	<?php if($this->session->userdata('drop_name')) : ?>
		<div class="card border-danger text-center mb-5">
			<div class="card-header alert-warning">
				<h4>DROPSHIP</h4>
			</div>
			<div class="card-body">
				<p class="card-text text-left">apakah kamu yakin kirim barang ke <?= $this->session->userdata('drop_name'); ?> alamat <?= $this->session->userdata('drop_detail'); ?>, alamat <?= $this->session->userdata('drop_subdistrict'); ?>, <?= $this->session->userdata('drop_city'); ?>, <?= $this->session->userdata('drop_province'); ?></p>
				<p class="text-left font-weight-bold">Jika ingin merubah klik dibawah ini</p>
			</div>
			<div class="card-footer alert-danger">
				<a href="<?= base_url('home/deleteTempData'); ?>">
					<div class="row justify-content-center">
						<h5 class="text-danger"> Hapus dropship</h5>
						<i class="fas fa-trash-alt fa-lg text-danger ml-3 mt-1"></i>
					</div>
				</a>
			</div>
		</div>
		<br>
	<?php endif; ?>
	
	<div class="d-lg-none">
		<nav class="navbar navbar-expand-lg navbar-light shadow-lg mb-1 bg-white rounded border fixed-bottom">
		    <ul class="d-flex flex-column navbar-nav mr-auto">
		      <li class="nav-item active">
		      	<small>total pembayaran</small>
		        
		      </li>
		      <li class="nav-item font-weight-bolder text-danger h5">
		        Rp <?= number_format($totalshopping,0,',','.'); ?>
		      </li>
		    </ul>
			<a href="<?= base_url('home/productOrder') ?>" class="btn btn-danger btn-lg my-2">Buat Pesanan</a>
		</nav>
	</div>  
		<!-- edit tempdata -->
		<div class="modal fade" id="edit_tempdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
