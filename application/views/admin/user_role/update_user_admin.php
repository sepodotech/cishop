<div class="card">
  <div class="card-header">
    UPDATE USER ROLE
  </div>
  <div class="card-body col-lg-6 col-xs">
  	
	<form action="" method="post">		
		<input type="hidden" id="id" name='id' value="<?= $edit[0]['id']; ?>">
		<div class="form-group">
		    <label for="name">name</label>
		    <input type="text" class="form-control" id="name" name='name' value="<?= $edit[0]['name']; ?>">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		</div>
		<div class="form-group">
		    <label for="email">email</label>
		    <input type="text" class="form-control" id="email" name='email' value="<?= $edit[0]['email']; ?>">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		</div>
		<div class="form-group">
		    <label for="role_id">role id</label>
		    <input type="text" class="form-control" id="role_id" name='role_id' value="<?= $edit[0]['role_id']; ?>">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		</div>
		  <div class="form-group form-check">
		  	<?php if($edit[0]['is_active'] == 1) : ?>
			    <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
	            <label class="form-check-label" for="is_active">apakah aktif?</label>
            <?php else : ?>
				<input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active">
	            <label class="form-check-label" for="is_active">apakah aktif?</label>
			<?php endif; ?>
		  </div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
  </div>
</div>