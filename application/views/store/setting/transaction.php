<?php 
// var_dump($order['product_order']);
?>
<div class="container-fluid mt-3">
    <div class="card text-center" style="width: 20rem;">
        <?php if ($order['was_payed'] == 0) : ?>
            <div class="card-header alert-danger">
                Pesanan Belum Dibayar
            </div>
        <?php else : ?>
            <div class="card-header alert-success">
                Pesanan Sudah Dibayar
            </div>
        <?php endif; ?>
        <div class="card-body">
            <div class="detail-order mb-2">
                <?php foreach($order['product_order'] as $or) : ?>
                <div class="row">
                    <div class="col-4 mb-2">
                    <img src="<?= base_url('assets/upload/products/') . $or['product_image']; ?>" style="width: 80px;">
                    </div>
                    <div class="col-6 text-left">
                    <?= $or['product_name']; ?> <?= $or['product_option']; ?>
                    </div>
                    <div class="col-2">
                    <?= 'X ' . $or['product_quantity']; ?>
                    </div>
                </div>
                
                <?php endforeach; ?>
            </div>
            <?php if(count($order['product_order']) > 1) : ?>
            <div class="show-more">show more</div>
            <div class="show-less">show less</div>
            <hr>
            <?php endif;  ?>
            <p class="card-text text-left">Jasa Pengiriman <?= $order['courier']; ?></p>
            <p class="card-title text-danger font-weight-bold text-left">Pembayaran Rp <?= number_format($order['total'],0,',','.'); ?></p>
        </div>
        <div class="card-footer">
            <small>upload bukti transfer dibawah</small>
            <?php echo form_open_multipart('home/uploadBill');?>
                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" value="<?= uniqid (rand(), true); ?>">
                        <label class="custom-file-label text-left" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Pilih File</label>
                    </div>
                    <div class="input-group-append">
                        <button class="input-group-text bg-danger text-light" type="submit">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>