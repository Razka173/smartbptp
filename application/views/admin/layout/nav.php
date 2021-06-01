    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fa fa-seedling"></i>
        </div>
        <div class="sidebar-brand-text mx-3">
          <?php echo 'Smart BPTP Admin' ?>
        </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- MENU DASHBOARD -->
      <li class="nav-item <?php if(strpos(strtolower($title),'dashboard')){echo 'active';} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/dasbor') ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- MENU BUKU TAMU -->
      <li class="nav-item <?php if(strpos(strtolower($title),'tamu')){echo 'active';} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/bukutamu') ?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Buku Tamu</span></a>
      </li>

      <!-- MENU PKL/MAGANG -->
      <li class="nav-item <?php if(strpos(strtolower($title),'magang')){echo 'active';} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/magang') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>PKL/Magang</span></a>
      </li>

      <!-- MENU PELATIHAN TEKNOLOGIN -->
      <li class="nav-item <?php if(strpos(strtolower($title),'pelatihan')){echo 'active';} ?>">
        <a class="nav-link" href="<?php echo base_url('admin/pelatihan') ?>">
          <i class="fas fa-fw fa-users"></i>
          <span>Pelatihan Teknologi</span></a>
      </li>

      <!-- MENU ADMIN -->
      <li class="nav-item <?php if(strpos(strtolower($title),'admin')){echo 'active';} ?>">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
          <i class="fas fa-fw fa-lock"></i>
          <span>Admin</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingPengguna" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Menu:</h6>
            <a class="collapse-item" href="<?php echo base_url('admin/user') ?>"><i class="fas fa-fw fa-table"></i> Data Admin</a>
            <a class="collapse-item" href="<?php echo base_url('admin/user/tambah') ?>"><i class="fas fa-fw fa-plus"></i> Tambah Admin</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->