<div class="container-fluid">
    <div class="card border-light mt-3" style="width: 20rem;">
        <div class="row no-gutters">
            <div class="col-4">
                <img src="<?= base_url('assets/upload/profile/') . $user['image']; ?>" class="card-img mt-5" alt="...">
            </div>
            <div class="col-8">
            <div class="card-body">
                <h5 class="card-title text-capitalize font-weight-bolder"><?= $user['username']; ?></h5>
                <p class="card-text">Email : <?= $user['email']; ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            </div>
        </div>
    </div>
<?php if(array_key_exists('address_id', $user)): ?>
    <div class="card">
        <div class="card-header">
            Identitas
        </div>
        <div class="card-body">
            <p class="card-text">Nama Lengkap : <?= $user['name']; ?></p>
            <p class="card-text">NO HP : <?= $user['phone']; ?></p>
            <p class="card-text">Negara : <?= $user['nation']; ?></p>
            <p class="card-text">Provinsi : <?= $user['province']; ?></p>
            <p class="card-text">Kab/Kota : <?= $user['city']; ?></p>
            <p class="card-text">Kecamatan : <?= $user['subdistrict']; ?></p>
            <p class="card-text">Alamat Lengkap : <?= $user['complete_address']; ?></p>
        </div>
        <div class="card-footer text-muted">
            <a href="<?= base_url('home/editUserDetail') ?>" class="btn btn-sm btn-primary float-right">Edit</a>
        </div>
    </div>
<?php else : ?>
            <hr>
            <h5 class="font-weight-bolder mb-3">Isi Identitas Lengkap</h5>
        <form method="post" action="<?= base_url('home/profile') ?>">
            <div class="form-group">
                <label for="fullname">Nama Lengkap :</label>
                <input type="text" name="fullname" class="form-control" id="fullname">
                <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
            </div>
            <input type="hidden" name="user_id" class="form-control" value="<?= $user['id']; ?>">
            <div class="form-group">
                <label for="phone">NO HP :</label>
                <input type="text" name="phone" class="form-control" id="phone">
                <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="nation">Negara :</label>
                <input type="text" name="nation" class="form-control" id="nation">
                <?= form_error('nation', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
                <label for="province">Provinsi :</label>
                <br>
                <small class="text-success">jika belum muncul, mohon tunggu!</small>
                <select class="user-province form-control" id="province">
                    <option value=""> Pilih Provinsi</option>
                </select>
            </div>
            <input type="hidden" name="province" class="province">
            <div class="form-group">
                <label for="city">Kab/Kota :</label>
                <br>
                <small class="text-success">jika belum muncul, mohon tunggu!</small>
                <select class="user-city form-control" id="city">
                    <option value=""> Pilih Kab/Kota</option>
                </select>
            </div>
            <input type="hidden" name="city" class="city">
            <div class="form-group">
                <label for="subdistrict">Kecamatan :</label>
                <input type="text" name="subdistrict" class="form-control" id="subdistrict">
                <?= form_error('subdistrict', '<small class="text-danger">', '</small>'); ?>
            </div>
            <input type="hidden" name="address_id" class="form-control" id="address_id" value="">
            <div class="form-group">
                <label for="complite_address">Alamat Lengkap :</label>
                <textarea type="text" name="complete_address" class="form-control" id="complite_address"></textarea>
                <?= form_error('complete_address', '<small class="text-danger">', '</small>'); ?>
            </div>
            <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
        </form>
    <?php endif; ?>
</div>

