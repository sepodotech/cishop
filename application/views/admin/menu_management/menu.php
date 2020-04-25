<body id="page-top"> 
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class= 'row'>
    	<div class= "col-lg-7">
    		<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
    		<?= $this->session->flashdata('message'); ?>

			<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#exampleModal">Tambah Menu</a>
	        <table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">NO</th>
			      <th scope="col">Menu</th>
			      <th scope="col">Action</th>			     
			    </tr>
			  </thead>
			  <tbody>
			  <?php $i=1; ?>
			  <?php foreach ($menu as $m) : ?>
			    <tr>
			      <th scope="row"><?= $i; ?></th>
			      <td><?= $m['menu']; ?></td>
			      <td>
			      	<a href="<?= base_url('AdminMenu/update/'); ?><?= $m['id']; ?>" class="btn btn-outline-success btn-sm">update</a> | 
					<a href="<?= base_url('AdminMenu/delete/'); ?><?= $m['id']; ?>" class="btn btn-outline-danger btn-sm">delete</a>
			      </td>			      
			    </tr>
			    <?php $i++; ?>
			   <?php endforeach; ?>			    
			  </tbody>
			</table>
		</div>
	</div>

    </div>
    <!-- /.container-fluid -->

</div>
      <!-- End of Main Content -->

      <!-- modal for tambah menu -->    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('AdminMenu/index') ?>" method="post">
      <div class="modal-body">
      	<div class="form-group">
		    <input type="text" class="form-control" id="menu" name="menu" placeholder="Nama menu">
		</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>