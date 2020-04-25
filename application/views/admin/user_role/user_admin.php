<body id="page-top"> 
<!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
    <div class= 'row'>
    	<div class= "col-lg-7">
    		<!-- <?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>
    		<?= $this->session->flashdata('message'); ?>
 -->
			
	    <table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">NO</th>
			      <th scope="col">Nama</th>
			      <th scope="col">email</th>
			      <th scope="col">role id</th>
			      <th scope="col">Active</th>
			      <th scope="col">Action</th>			     
			    </tr>
			  </thead>
			  <tbody>
			  <?php $i=1; ?>
			  <?php foreach ($userAccess as $ua) : ?>
			    <tr>
			      <th scope="row"><?= $i; ?></th>
			      <td><?= $ua['username']; ?></td>
			      <td><?= $ua['email']; ?></td>
			      <td><?= $ua['role_id']; ?></td>
			      <td><?= $ua['is_active']; ?></td>
			      <td>
			      	<a href="<?= base_url('AdminSetUser/update/') ?><?= $ua['id']; ?>" class="btn btn-outline-success btn-sm">update</a> | 
					<a href="<?= base_url('AdminSetUser/delete/'); ?><?= $ua['id']; ?>" class="btn btn-outline-danger btn-sm">delete</a>
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

