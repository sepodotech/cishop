<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-2">Lupa Passwordmu??</h1>
                    <p class="mb-4">jangan panik. masukkan emailmu dibawah ini dan kami akan mengirim link reset passwordmu!</p>
                  </div>
                  <form class="user">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Masukkan Email...">
                    </div>
                    <button class="btn btn-primary btn-user btn-block">Kirim</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('auth/registration')  ?>">Buat Akun!</a>
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