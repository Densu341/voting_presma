<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-sitemap" aria-hidden="true"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Vote Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider ">

  <!-- Query Menu -->
  <?php
  $role_id = $this->session->userdata('role_id');
  $queryMenu = "SELECT `user_menu`.`menu_id`, `menu`
                      FROM `user_menu` JOIN `user_access_menu`
                        ON `user_menu`.`menu_id` = `user_access_menu`.`menu_id`
                     WHERE `user_access_menu`.`role_id` = $role_id
                  ORDER BY `user_access_menu`.`menu_id` ASC
                    ";
  $menu = $this->db->query($queryMenu)->result_array();
  ?>

  <!-- Looping Menu -->
  <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
      <?= $m['menu']; ?>
    </div>

    <!-- Sub Menu Sesuai Menu -->
    <?php
    $menuId = $m['menu_id'];
    $querySubMenu = "SELECT *
                         FROM `sub_menu` JOIN `user_menu`
                           ON `sub_menu`.`menu_id` = `user_menu`.`menu_id`
                        WHERE `sub_menu`.`menu_id` = $menuId
                          AND `sub_menu`.`is_active` = 1
                      ";
    $subMenu = $this->db->query($querySubMenu)->result_array();
    ?>
    <?php foreach ($subMenu as $sm) : ?>
      <?php if ($title == $sm['title']) : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
          <i class="<?= $sm['icon']; ?>"></i>
          <span><?= $sm['title']; ?></span></a>
        </li>
      <?php endforeach; ?>
      <!-- Divider -->
      <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

    <!-- Nav Item Menu -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url() ?>auth/logout" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-fw"></i>
        <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->