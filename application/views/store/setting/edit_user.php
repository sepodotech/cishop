<div class="container-fluid">
<form method="post" action="<?= base_url('home/editUserDetail') ?>">
    <input type="hidden" name="user-detail-id" class="form-control" value="<?= $user['user_detail_id']; ?>">   
    <div class="form-group">
        <label for="fullname">Nama Lengkap :</label>
        <input type="text" name="fullname" class="form-control" id="fullname" value="<?= $user['name']; ?>">
        <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
    </div>
    <input type="hidden" name="user_id" class="form-control" value="<?= $user['id']; ?>">
    <div class="form-group">
        <label for="phone">NO HP :</label>
        <input type="text" name="phone" class="form-control" id="phone" value="<?= $user['phone']; ?>">
        <?= form_error('phone', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="form-group">
        <label for="nation">Negara :</label>
        <input type="text" name="nation" class="form-control" id="nation" value="<?= $user['nation']; ?>">
        <?= form_error('nation', '<small class="text-danger">', '</small>'); ?>
    </div>
    <div class="form-group">
        <label for="province">Provinsi :</label>
        <br>
        <small class="text-success">jika belum muncul, mohon tunggu!</small>
        <select class="user-province form-control" id="province">
            <option value=""><?= $user['province']; ?></option>
        </select>
    </div>
    <input type="hidden" name="province" class="province">
    <div class="form-group">
        <label for="city">Kab/Kota :</label>
        <br>
        <small class="text-success">jika belum muncul, mohon tunggu!</small>
        <select class="user-city form-control" id="city">
            <option value=""><?= $user['city']; ?></option>
        </select>
    </div>
    <input type="hidden" name="city" class="city">
    <div class="form-group">
        <label for="subdistrict">Kecamatan :</label>
        <input type="text" name="subdistrict" class="form-control" id="subdistrict" value="<?= $user['subdistrict']; ?>">
        <?= form_error('subdistrict', '<small class="text-danger">', '</small>'); ?>
    </div>
    <input type="hidden" name="address_id" class="form-control" id="address_id" value="">
    <div class="form-group">
        <label for="complete_address">Alamat Lengkap :</label>
        <textarea type="text" name="complete_address" class="form-control" id="complete_address" value=""><?= $user['complete_address']; ?></textarea>
        <?= form_error('complete_address', '<small class="text-danger">', '</small>'); ?>
    </div>
    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
</form>
</div>