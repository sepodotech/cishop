<div class="card">
  <div class="card-header">
    Edit Sub Menu
  </div>
  <div class="card-body col-lg-6 col-xs">
  	
	<form action="" method="post">
		<input type="hidden" id="id" name='id' value="<?= $menu['id']; ?>">
		<div class="form-group">
		    <label for="menu">menu</label>
		    <input type="text" class="form-control" id="menu" name='menu'value="<?= $menu['menu']; ?>">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
</div>