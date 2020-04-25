

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
          <i class="fas fa-fw fa-store"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN CENTER</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- query menu -->

      <?php
      $role_id = $this->session->userdata('role_id');
    
      $queryMenu = "SELECT `admin_menu` . `id`, `menu`
                    FROM `admin_menu` JOIN `admin_access_menu` 
                    ON `admin_menu` . `id` = `admin_access_menu` . `menu_id`
                  WHERE `admin_access_menu`.`role_id` = $role_id
                  ORDER BY `admin_access_menu` . `role_id` ASC
      ";


      $menu = $this->db->query($queryMenu)->result_array();

      ?>

       <!-- looping menu -->

       <?php foreach ($menu as $m) : ?>
      <div class="sidebar-heading">
        <?= $m['menu']; ?>
      </div>

      <!-- query sub menu ex dashboard, produk dll -->
          <?php 
            $menuId = $m['id'];
            $querySubMenu = "SELECT *
                              FROM `admin_submenu` JOIN `admin_menu` 
                                ON `admin_submenu`.`menu_id` = `admin_menu`.`id`
                             WHERE `admin_submenu`.`menu_id` = $menuId 
                              AND `admin_submenu`. `is_active` = 1
                             ";
            $subMenu = $this->db->query($querySubMenu)->result_array();

           ?>
            <?php foreach ($subMenu as $sm) : ?>
            <?php if ($title == $sm['title']) : ?>
            <li class="nav-item active">
              <?php else : ?>
                <li class="nav-item">
            <?php endif; ?>
              <a class="nav-link" href="<?= base_url($sm['url']); ?>">
                <i class="<?= $sm['icon']; ?>"></i>
                <span><?= $sm['title']; ?></span></a>
            </li>

            <?php endforeach; ?>

      <!-- Divider -->
      <hr class="sidebar-divider">
     
      <?php endforeach; ?>

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->
