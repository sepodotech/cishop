<div class="d-lg-none">
	<nav class="navbar navbar-expand-lg navbar-dark shadow-lg mb-1 bg-white rounded border fixed-bottom" >
         
        <button type="button" class="btn col-4">
          <i class="fab fa-whatsapp fa-2x text-success" id="item-bottom"></i>
        </button>
        <button type="button" class="btn col-4" data-toggle="modal" data-target="#cart">
          <i class="fas fa-shopping-cart fa-2x text-info" id="item-bottom"></i>
        </button>
	</nav>
</div>

<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
            <div class="modal-header">
              <h5 class="modal-title text-uppercase font-weight-bold"><?= $product['name']; ?>
              </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <p class="justify-content-left text-capitalize">
            <?= 'harga : '.'Rp ' . $product['price']; ?>
                  
            </p>

            <form action="<?= base_url('home/addCart'); ?>" method="post">
                  <input type="hidden" name="id" value="<?= $product['id']; ?>">
                  <input type="hidden" id="name" name="name" value="<?= $product['name']; ?>">
                  <label for="qty">Quantity : </label>
                  <input type="number" class="" id="qty" name="qty" value="1">
                  <input type="hidden" id="price" name="price" value="<?= $product['price']; ?>">
                  <input type="hidden" id="image" name="image" value="<?= $product['image']; ?>">
                  <input type="hidden" id="weight" name="weight" value="<?= $product['weight']; ?>">
                  <input type="hidden" id="option1" name="option1" value="">
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" class="btn btn-primary">Tambah Keranjang</button>
            </div>
            </form>
      
    </div>
  </div>
</div>