     <!-- copyright -->
      <footer class="sticky-footer font-weight-bolder">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SEPODO 2019-<?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of copyright -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">INGIN KELUAR?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan tombol "Logout" untuk keluar dari halaman.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
        </div>
      </div>
    </div>
  </div>

     <!-- jquery -->
    <script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
    <!-- bootstrap -->
    <script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- fontawesome -->
    <script src="<?= base_url('assets/') ?>vendor/fontawesome-free/js/all.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>
    
    
    <!-- plugin sb admin-->
    <script src="<?= base_url('assets/') ?>vendor/sbadmin/js/sb-admin-2.min.js"></script>

    <!-- custom js -->
    <script src="<?= base_url('assets/') ?>/vendor/custom/js/custom.js"></script>
    
</body>

</html>