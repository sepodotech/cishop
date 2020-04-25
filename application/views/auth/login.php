 <div class="container" >

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-2 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang!</h1>
                  </div>
                  <form class="user" action="<?= base_url('auth') ?>" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="email" name="email" placeholder="masukkan email" value="<?= set_value('email'); ?>">
                    </div>
                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                    </div>
                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">Login</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href=" <?= base_url('auth/forgetPassword') ?>">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registration')  ?>">Buat Akun</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
