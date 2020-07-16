     <!-- copyright -->
      <footer class="sticky-footer font-weight-bolder">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; SEPODO <?= date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of copyright -->

  
  
  
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

    
<script type="text/javascript">
	$(document).ready(function (){
		// separate thousand with dot
		function formatNumber(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}

		// funtion to get data province
		function Province() {
			$.getJSON("<?= base_url('Shipping/province') ?>", function(data){
				$.each(data, function(i, opt) {
					$('.user-province').append('<option value="'+opt.province_id+'">'+opt.province+ '</option>')
				});
			});
		}
		Province();

		// funtion to get city
		function city(idprov){
			$.getJSON("<?= base_url('shipping/city/') ?>"+idprov, function(data){
				$.each(data, function(i, opt) {
					$('.user-city').append('<option value="'+opt.city_id+'">'+opt.type+' '+opt.city_name+'</option>')
				});
			});
		}

		// function to get cost
		function cost(origin,dest,weight,courier) {
			let totalBarang = <?= $this->cart->total(); ?>;
			$.getJSON("<?= base_url('shipping/cost/') ?>"+origin+"/"+dest+"/"+weight+"/"+courier, function(data){     
				
				let shippingCost = formatNumber(data);
				let biayaOngkir = `<P>biaya ongkirnya Rp `+shippingCost+`</P>`;
				$("#ongkir").html(biayaOngkir);

				let totalShoppig;
				totalShoppig = parseInt(data)+totalBarang;
				totalShoppig = formatNumber(totalShoppig);
				$("#totalShopping").text("Rp "+totalShoppig);
				$("#total-shopping").val(totalShoppig);
			});
		}

		// function to get address
		function getUserAddress(){
			let addressId;
			if (<?= json_encode($user); ?>.user_detail_id == undefined){
				return addressId = undefined;
			}else{
				return addressId = <?= json_encode($user); ?>.address_id;
			}
		}
		
		// create global variable for get user address id
		let userAddressId = getUserAddress();

		function getVariantProduct(optionId){
			$.getJSON("<?= base_url('product/getVariantProduct/') ?>"+optionId, function(data){
				let stock = data.option_stock;
				stock = `<p class="text-uppercase"> stok `+stock+`</p>`;
				$(".stock").html(stock);
			});
		}
		
	/*-------------start profile page--------------*/
		$(".user-province").on("change", function(e){
				e.preventDefault();
				let option = $('option:selected', this).val();
				let userProvince = $('option:selected', this).text();
				$('.user-city option:gt(0)').remove();
				$('.province').val(userProvince);
				city(option);
			});
			$(".user-city").on("change", function(e){
				e.preventDefault();
				let city = $('option:selected', this).val();
				let userCity = $('option:selected', this).text();
				$('#address_id').val(city);
				$('.city').val(userCity);
			});
	/*-------------end profile page--------------*/

	/*-------------start script for single product info--------------*/
		$(".option1").click(function(e){
			e.preventDefault();
			let optionId = $(this).val();
			getVariantProduct(optionId);

			let product_option = $(this).text();
			$("#option1").val(product_option);
		})
	/*-------------end script for single product info--------------*/

	/*-------------start script page my cart for shipping--------------*/
		$(".courier").on("change", function(e){
			e.preventDefault();
			let courier = $('option:selected', this).val();
			let origin = '149';
			let dest = userAddressId;
			let weight = <?php echo $weight; ?>;
			cost(origin,dest,weight,courier);
		});

		// if 
		// for checkbox dropship
		$('#dropshipping').hide();
		$('#dropship').on('click', function(){
			if ( $(this).prop('checked') ) {
				$('#dropshipping').fadeIn();
				$('#totalShopping').text('Rp 0');
				$(".user-province").on("change", function(e){
					e.preventDefault();
					let provId = $('option:selected', this).val();
					let prov = $('option:selected', this).text();
					$('.user-city option:gt(0)').remove();
					$('.province').val(prov);
					$('.courier').val('');
					console.log(provId);
					city(provId);
				});

				$(".user-city").on("change", function(e){
					e.preventDefault();
					var option = $('option:selected', this).val();
					let city = $('option:selected', this).text();
					$('.city').val(city);
					$('.courier').val('');
				});
				$(".courier").on("change", function(e){
					e.preventDefault();
					let courier = $('option:selected', this).val();
					let origin = '149';
					let dest = $(".user-city").val();
					let weight = <?php echo $weight; ?>;
					cost(origin,dest,weight,courier);
				});
			} 
			else {
				$('#dropshipping').hide();
				$('#totalShopping').text('Rp 0');
				$('#ongkir').html('');
				$('#dropship-name').val('');
				$('#dropship-phone').val('');
				$('#dropship-nation').val('');
				$('#dropship-province').val('');
				$('#dropship-city').val('');
				$('.dropship-province').val('');
				$('.dropship-city').val('');
				$('#subdistrict').val('');
				$('#complite_address').val('');
				$(".courier").on("change", function(e){
					e.preventDefault();
					let courier = $('option:selected', this).val();
					let origin = '149';
					let dest = userAddressId;
					let weight = <?php echo $weight; ?>;
					cost(origin,dest,weight,courier);
				});
			}
		});
		

		let $loading = $('.loading').hide();
		$('.btn-loading').hide();
		$(document)
		.ajaxStart(function () {
			$('#totalShopping').hide();
			$('.btn-checkout').hide();
			$('#dropship-city').hide();
			$('#ongkir').hide();
			$loading.show();
			$('.btn-loading').show();
		})
		.ajaxStop(function () {
			$('.btn-loading').hide();
			$loading.hide();
			$('#totalShopping').show();
			$('.btn-checkout').show();
			$('#dropship-city').show();
			$('#ongkir').show();
		});
	/*-------------end script page my_cart shipping--------------*/

	});
</script>

    
    
</body>

</html>