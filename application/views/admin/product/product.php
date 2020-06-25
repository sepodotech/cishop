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
            <th scope="col">SKU</th>
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
            <td><?= $p['SKU']; ?></td> 
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

