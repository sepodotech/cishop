<div class="container-fluid">
    <h1><?= $title; ?></h1>
    <form method="post" action="<?= base_url('adminProduct/addSubvariant/' . $variant_id . '/' .$product_id) ?>">
        <input type="hidden" name="option_id" value="<?= $variant_id; ?>">
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="jenis opsi cth= color,size,dll">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="value" placeholder="nilai">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="stock" placeholder="stok">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
