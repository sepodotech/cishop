<body id="page-top"> 
    <!-- Begin Page Content -->
  <div class="container-fluid">

      <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class= 'row'>
      <div class= "col-lg ">
       <?php if (validation_errors()) : ?>
        <div class="alert alert-danger" role="alert">          
          <?= validation_errors(); ?>
        </div>
        <?php endif; ?>
        <?= $this->session->flashdata('message'); ?>

      <a href="<?= base_url(); ?>adminProduct/addProduct" class="btn btn-primary mb-3">Tambah produk</a>
          <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">NO</th>
            <th scope="col">Name</th>
            <th scope="col">Gambar</th>
            <th scope="col">Harga</th>
            <th scope="col">Harga member</th>
            <th scope="col">Action</th>          
          </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        <?php foreach ($product as $p) : ?>
          <tr>
            <th scope="row"><?= $i; ?></th>
            <td><?= $p['name']; ?></td>
            <td>
              <img src="<?= base_url('assets/upload/products/') . $p['image'];?>" alt="" class="img-thumbnail w-50">
            </td>
            <td><?= $p['price']; ?></td>
            <td><?= $p['member_price']; ?></td> 
            <td>               
              <a href="<?= base_url(); ?>adminProduct/singleProduct/<?= $p['id']; ?>" class="btn btn-outline-primary btn-sm">detail</a> |
              <a href="<?= base_url(); ?>adminProduct/delete/<?= $p['id']; ?>" class="btn btn-outline-danger btn-sm" >delete</a>
            </td>           
          </tr>
          <?php $i++; ?>
         <?php endforeach; ?>         
        </tbody>
      </table>
    </div>
  </div>

</div>

<!-- Modal -->
<!-- <div class="modal fade" id="ProductModal" tabindex="-1" role="dialog" aria-labelledby="ProductModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ProductModalLabel">Tambah Produk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php echo form_open_multipart('AdminProduct/index');?>
      <div class="modal-body">
        <input type="hidden" class="form-control" id="id" name="id">
        <div class="form-group">
          <input type="file" class="form-control" id="image" name="image" value="<?= uniqid (rand(), true); ?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="name" name="name" placeholder="name">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="category_id" name="category_id" placeholder="category_id">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="description" name="description" placeholder="description">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="quantity" name="quantity" placeholder="quantity">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="price" name="price" placeholder="price">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="member_price" name="member_price" placeholder="member_price">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="weight" name="weight" placeholder="weight">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="shipping_origin" name="shipping_origin" placeholder="shipping_origin">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div> -->