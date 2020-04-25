<!-- start navbar -->
    	<nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #05b7c2;">
		  
		    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		    </button>
			<a class="navbar-brand" href="<?= base_url('home') ?>">SHOP</a>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0 font-weight-bolder">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Kategori Produk
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Baju</a>
                  <a class="dropdown-item" href="#">Jaket</a>
                  <a class="dropdown-item" href="#">Kosmetik</a>
                </div>
              </li>
		      <li class="nav-item mr-2">
		        <a class="nav-link" href="#">Blog</a>
		      </li>
		      <form class="form-inline">
		        	<div class="input-group">
		                <input type="text" class="form-control bg-light border-0 small" placeholder="cari" aria-label="Search" aria-describedby="basic-addon2">
		                <div class="input-group-append">
		                  <button class="btn btn-primary" type="button">
		                    <i class="fas fa-search fa-sm"></i>
		                  </button>
		                </div>
		            </div>
			    </form>
		    </ul>

		  </div>  
		    <div class="mr-lg-5 my-2 my-lg-0">
		    	<div>
		    	<a href="<?= base_url('home/myCart') ?>" class="text-dark text-decoration-none">
				    <span class="fa-layers fa-fw">
					    <i class="fas fa-shopping-cart fa-2x" style="color:#2F4F4F"></i>
					    <i class="fas fa-circle fa-inverse fa-2x" data-fa-transform="shrink-5 up-6 right-7" style="color:Tomato"></i>
					    <span class="fa-layers-text fa-inverse fa-2x" data-fa-transform="shrink-10 up-6 right-10">
					    	<?php if ($this->cart->total_items() < 100) {
		                      echo $this->cart->total_items();
		                    } else {
		                      echo "+99";
		                    }  ?>
		                    	
                    	</span>
					</span>
				    <!--  -->
				</a>
		    	</div>
			    
		    </div>
		    <div class="topbar-divider d-none d-sm-block"></div>
		    <div class="my-2 my-lg-0">
		    	<?php if (!$user) : ?>
			    <a href="<?= base_url('auth') ?>" class="text-dark text-decoration-none">
			    	<div>
				    	<span class="d-none d-lg-inline font-weight-bolder">akun</span>
				    	<i class="fas fa-user-circle fa-2x"></i>
			    	</div>
			    </a>
			    <?php else : ?>
	              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['username']; ?></span>
	                <img class="img-profile rounded-circle" width="25px" src="<?= base_url('assets/upload/profile/') . $user['image']; ?>">
	              </a>
	              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
	                <a class="dropdown-item" href="<?= base_url('Profiles'); ?>">
	                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Profile
	                </a>
	                <a class="dropdown-item" href="#">
	                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Settings
	                </a>                
	                <div class="dropdown-divider"></div>
	                <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
	                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
	                  Logout
	                </a>
	              </div>
	            <?php endif; ?>
		    </div>

		  
		</nav>

		<!-- end navbar -->