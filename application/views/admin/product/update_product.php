<div class="card">
  <div class="card-header">
    Edit Sub Menu
  </div>
  <div class="card-body col-lg-6 col-xs">
  	
	<form action="" method="post">
		<div class="form-group">
		    <label for="title">title</label>
		    <input type="text" class="form-control" id="title" name='title' value="<?= $subMenu['title'];?>" >
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		</div>
		<div class="form-group">
		    <label for="url">url</label>
		    <input type="text" class="form-control" id="url" name='url' value="<?= $subMenu['url'];?>">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		</div>
		<div class="form-group">
		    <label for="icon">icon</label>
		    <input type="text" class="form-control" id="icon" name='icon' value="<?= $subMenu['icon'];?>">
		    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
		</div>
		  <div class="form-group form-check">
		  	<?php if($subMenu['is_active'] == 1) : ?>
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