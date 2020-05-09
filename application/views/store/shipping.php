



<div class="container">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="card">
				<form>
					<div class="card-header">
						<p class="card-header-title text-center">Cek Ongkir Disini</p>
					</div>
					
					<div class="card-content">
						<div class="content">
							<div class="field">
								<!-- provinsi tujuan -->
								<label class ="ml-2" for="asal">Tujuan&nbsp;<i class="fas fa-plane-arrival"></i></label>
								<div class="mt-1 mx-4">
									<select class="destination_province form-control" id="destination_province" onChange="">
										<option value=""> Pilih Provinsi</option>
									</select>
								</div>
								
								<!-- kota tujuan -->
								<div class="mt-1 mx-4">
									<select class="destination_city form-control" id="destination_city">
										<option value=""> Pilih Kota</option>
									</select>
								</div>
							</div>

							<hr>

							<div class="field">
								<!-- provinsi asal -->
								<label class="mt-1 ml-2" for="asal">Asal&nbsp;<i class="fas fa-plane-departure"></i></label>
								<div class="mt-1 mx-4  ">
									<input class="form-control" type="text" placeholder="Jawa timur" readonly>
									
								</div>

								<!-- kota asal -->
								<div class="mt-1 mx-4">
									
									<input class="form-control" type="text" placeholder="tulungagung" readonly>
								</div>
							</div>

							<hr>

							<label class ="mt-2 ml-2" for="berat">Berat Barang&nbsp;<i class="fas fa-weight"></i></label>
							<div class="mb-3 mx-5">
							<div class="row">
									<input type="number" value="1" min="1" class="berat form-control col-md-6 mr-1" id="berat" placeholder="Masukkan berat barang">
									<div class="input-group-text">Gram</div>
								    
							    </div>
							</div>

							<!-- pilih jasa pengiriman -->
							<label class ="ml-2" for="kurir">Pilih Jasa Pengiriman&nbsp;<i class="fas fa-check-circle"></i></label>
							<div class="mt-1 mx-4">
								<select class="kurir form-control" id="kurir">
									<option value="jne">JNE</option>
									<option value="tiki">TIKI</option>
									<option value="pos">POS Indonesia</option>
								</select>
							</div>

							
						</div>
					</div>
					<!-- <div class="card-footer text-center">
						<button class="btn btn-primary">Submit</button>
					</div> -->
				</form>
				
			</div>

			<hr>

			<div class="hasil mt-5"></div>
		</div>
	</div>
</div>
	

<script type="text/javascript">
$(document).ready(function (){
	function Province() {
		$.getJSON("<?= base_url('shipping/province') ?>", function(data){
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

	$(".destination_province").on("change", function(e){
	  e.preventDefault();
	  var option = $('option:selected', this).val();
	  $('.destination_city option:gt(0)').remove();
	  $('.kurir').val('');

	  if(option==='')
	  {
	    alert('null');    
	    $(".destination_city").prop("disabled", true);
	    $(".kurir").prop("disabled", true);
	  }
	  else
	  {        
	    $(".destination_city").prop("disabled", false);
	    city(option);
	  }
	});


	

	$(".destination_city").on("change", function(e){
	  e.preventDefault();
	  var option = $('option:selected', this).val();
	  $('.kurir').val('');

	  if(option==='')
	  {
	    alert('null');    
	    $(".kurir").prop("disabled", true);
	  }
	  else
	  {        
	    $(".kurir").prop("disabled", false);    
	  }
	});

	
	$(".kurir").on("change", function(e){
	  e.preventDefault();
	  let cour = $('option:selected', this).val();
	  let origin = "492"; // id kota tulungagung
	  let des = $(".destination_city").val();
	  let qty = $(".berat").val();
	  
	  if(qty==='0' || qty==='')
	  {
	    alert('jumlah barang belum di isi');
	  }
	  else if(cour==='')
	  {
	    alert('pilih jasa pengiriman');        
	  }
	  else
	  {            
	    cost(origin,des,qty,cour);
	  }
	});

	function cost(origin,des,qty,cour) {
	  
	  var i, j, x = "";
	  
	  $.getJSON("<?= base_url('shipping/cost/') ?>"+origin+"/"+des+"/"+qty+"/"+cour, function(data){     
	  	// console.log(data[0].costs[0].cost[0].value)
	    $.each(data, function(i,field){  
	    	

	      for(i in field.costs)
	      {
	          x += "<p class='mb-0'><b>" + field.costs[i].service + "</b> : "+field.costs[i].description+"</p>";

	           for (j in field.costs[i].cost) {
	                x += field.costs[i].cost[j].value +"<br>"+field.costs[i].cost[j].etd+"<br>"+field.costs[i].cost[j].note;
	            }
	         
	      }

	      $(".hasil").html(x);

	    });
	  });
	}
});

</script>

