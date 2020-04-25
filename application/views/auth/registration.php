<div class="container">
      <div class="row justify-content-center">

      <div class="col-lg-5">

            <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  <div class="col-lg-12">
                    <div class="p-5">
                      <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Buat Akun!</h1>
                      </div>
                      <form class="user" method="post" action=" <?= base_url('auth/registration') ?> ">
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="username" value="<?= set_value('username'); ?>">
                        </div>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        <div class="form-group">
                          <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                        </div>
                        <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                        </div>
                        <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                        </div>
                        <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                          Buat Akun
                        </button>                
                      </form>
                      <hr>
                      <div class="text-center">
                        <a class="small" href="<?= base_url('auth/forgetPassword') ?>">Lupa Password?</a>
                      </div>
                      <div class="text-center">
                        <a class="small" href="<?= base_url('auth') ?>">Kamu Sudah Punya Akun? Login!</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

       </div>

    </div>

  </div>