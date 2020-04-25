<div class="container-fluid">
    <div class="row">
        <div class="col-12 px-auto text-center bg-dark mt-3">
            <h1 class=" h3 font-weight-bolder text-uppercase text-light"><?= $title ?></h1>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12 col-lg-6">
            <div class="d-flex justify-content-center">
            <img class="w-75" src="<?= base_url('assets/upload/products/') . $singleProduct['image']; ?>">
            </div>
        </div>
        <div class="col-md-12 col-lg-4 ml-3 mt-4">
            <div class="d-flex justify-content-center text-uppercase">
            <h4 class="font-weight-bolder"><?= $singleProduct['name']; ?></h4>
            </div>

            <hr id="detile-product">
            <div class="d-flex justify-content-left text-capitalize">
            <h5><?= 'Harga : ' . 'Rp' . $singleProduct['price']; ?></h5>
            </div>
          
            <div class="d-flex justify-content-left text-capitalize">
            <h5><?= 'kategori : ' . $singleProduct['category_id']; ?></h5>
            </div>
            <div class="d-flex justify-content-left text-capitalize">
            <h5><?= 'deskripsi : ' . $singleProduct['description']; ?></h5>
            </div>
            <hr>
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