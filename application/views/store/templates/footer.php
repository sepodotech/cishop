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

    <!-- /script js/ -->
    
<script type="text/javascript">
	$(document).ready(function (){

		// for page my_cart 
		function Province() {
			$.getJSON("<?= base_url('Shipping/province') ?>", function(data){
				$.each(data, function(i, opt) {
					$('.destination_province').append('<option value="'+opt.province_id+'">'+opt.province+ '</option>')
				});
			});
		}

		Province();

		function city(idprov){
			$.getJSON("<?= base_url('shipping/city/') ?>"+idprov, function(data){
				$.each(data, function(i, opt) {
					$('.destination_city').append('<option value="'+opt.city_id+'">'+opt.type+' '+opt.city_name+'</option>')
				});
			});
		}
		// get selection 
		$(".destination_province").on("change", function(data){
			data.preventDefault();
			var provi = $('option:selected', this).text();
			$('.province').val(provi);
		});

		$(".destination_province").on("change", function(e){
		e.preventDefault();
		var option = $('option:selected', this).val();
		$('.destination_city option:gt(0)').remove();
		$('.courier').val('');

		if(option==='')
		{
			alert('null');    
			$(".destination_city").prop("disabled", true);
			$(".courier").prop("disabled", true);
		}
		else
		{        
			$(".destination_city").prop("disabled", false);
			city(option);
		}
		});

		$(".destination_city").on("change", function(data){
			data.preventDefault();
			var city = $('option:selected', this).text();
			$('.city').val(city);
		});
		
		$(".destination_city").on("change", function(e){
		e.preventDefault();
		var option = $('option:selected', this).val();
		$('.courier').val('');

		if(option==='')
		{
			alert('null');    
			$(".courier").prop("disabled", true);
		}
		else
		{        
			$(".courier").prop("disabled", false);    
		}
		});

		
		$(".courier").on("change", function(e){
		e.preventDefault();
		let courier = $('option:selected', this).val();
		let origin = "492"; // id kota tulungagung
		let dest = $(".destination_city").val();
		let weight = <?php echo $weight ?>;
		
		if(weight==='0' || weight==='')
		{
			alert('jumlah barang belum di isi');
		}
		else if(courier==='')
		{
			alert('pilih jasa pengiriman');        
		}
		else
		{   
			cost(origin,dest,weight,courier);
		}
		});

		function cost(origin,dest,weight,courier) {
			let totalBarang = <?= $this->cart->total(); ?>;
			let biayaOngkir = "";
			// console.log(totalBelanja);
			$.getJSON("<?= base_url('shipping/cost/') ?>"+origin+"/"+dest+"/"+weight+"/"+courier, function(data){     
				
				biayaOngkir += `<P>biaya ongkir anda `+data+`</P>`;
				$("#ongkir").html(biayaOngkir);
				let totalShoppig = parseInt(data)+totalBarang;
				$("#totalShopping").text(totalShoppig);
				$("#total-shopping").val(totalShoppig);
			});
		}
	});

</script>
    
    
</body>

</html>