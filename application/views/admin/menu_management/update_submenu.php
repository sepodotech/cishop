<div class="card">
  <div class="card-header">
    Edit Sub Menu
  </div>

  <div class="card-body col-lg-6 col-xs">
  	<?= $this->session->flashdata('message'); ?>
	<form action="" method="post">
		<input type="hidden" id="id" name='id' value="<?= $subMenu[0]['id'];?>" >
		<div class="form-group">
		    <label for="menu_id">menu_id</label>
		    <input type="text" class="form-control" id="menu_id" name='menu_id' value="<?= $subMenu[0]['menu_id'];?>" >
		    <?= form_error('menu_id', '<small class="text-danger">', '</small>'); ?>
		</div>
		<div class="form-group">
		    <label for="title">title</label>
		    <input type="text" class="form-control" id="title" name='title' value="<?= $subMenu[0]['title'];?>" >
		    <?= form_error('title', '<small class="text-danger">', '</small>'); ?>
		</div>
		<div class="form-group">
		    <label for="url">url</label>
		    <input type="text" class="form-control" id="url" name='url' value="<?= $subMenu[0]['url'];?>">
		    <?= form_error('url', '<small class="text-danger">', '</small>'); ?>
		</div>
		<div class="form-group">
		    <label for="icon">icon</label>
		    <input type="text" class="form-control" id="icon" name='icon' value="<?= $subMenu[0]['icon'];?>">
		    <?= form_error('icon', '<small class="text-danger">', '</small>'); ?>
		</div>
		<div class="form-group form-check">
		  	<?php if($subMenu[0]['is_active'] == 1) : ?>
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