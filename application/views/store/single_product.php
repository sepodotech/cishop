<img class="w-100" src="<?= base_url('assets/upload/products/') . $product['image']; ?>">
<div class="container-fluid">
    <div class="row mt-3">
        <!-- <div class="col-md-12 col-lg-6">
            <div class="d-flex justify-content-center">
            <img class="w-100 rounded" src="<?= base_url('assets/upload/products/') . $product['image']; ?>">
            </div>
        </div> -->
        <div class="col-md-12 col-lg-4 ml-3 mt-4">
            <div class="d-flex justify-content-center text-uppercase mb-2">
                <h4 class="font-weight-bolder"><?= $product['name']; ?></h4>
            </div>
            <div class="justify-content-left text-capitalize">
                <h5 class="text-info font-weight-bolder"><?='Rp ' . number_format($product['price'],0,',','.'); ?></h5>
            </div>
            <?php if(!array_key_exists('option1',$product)) : ?>
                <hr>
                <p><?= 'STOK ' . $product['quantity']; ?></p>
            <?php else : ?>
                <hr>
                <div class="stock">
                    <p class="text-danger">klik varian dibawah</p>
                </div>
                <p class="text-uppercase font-weight-bolder"><?= $product['option1'][0]['option_name']; ?></p>
                <?php foreach($product['option1'] as $key => $result) : ?>
                    <button class=" option1 btn btn-sm btn-outline-secondary text-uppercase mr-2" value="<?= $result['id']; ?>"><?= $result['option_value']; ?></button>
                <?php endforeach; ?>
            <?php endif; ?>
            <hr id="detile-product">
            <div class="justify-content-left text-capitalize">
                <h5 class="font-weight-bolder">Kategori : </h5>
                <h5><?= $product['category_id']; ?></h5>
            </div>
            <div class="justify-content-left text-capitalize">
                <h5 class="font-weight-bolder">Deskripsi : </h5>
                <h5><?= $product['description']; ?></h5>
            </div>
            <!-- visible only in large scale -->
            <div class="d-none d-lg-block">
                <button type="button" class="btn col-4 btn-success">
                  <i class="fab fa-whatsapp fa-2x" id="item-bottom"></i>
                </button>
                <button type="button" class="btn col-4 btn-primary ml-5" data-toggle="modal" data-target="#cart">
                  <i class="fas fa-shopping-cart fa-2x" id="item-bottom"></i>
                </button>
            </div>
        </div>
    </div>

</div>