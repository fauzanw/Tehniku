<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index.html">
        <img src="<?= base_url('assets/argon') ?>/img/brand/blue.png" class="navbar-brand-img" alt="...">
      </a>
      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?= base_url('assets/argon') ?>/img/admin/<?= $data_admin['foto_admin'] ?>
">
              </span>
            </div>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
              <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-single-02"></i>
              <span>My profile</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-settings-gear-65"></i>
              <span>Settings</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-calendar-grid-58"></i>
              <span>Activity</span>
            </a>
            <a href="./examples/profile.html" class="dropdown-item">
              <i class="ni ni-support-16"></i>
              <span>Support</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#!" class="dropdown-item">
              <i class="ni ni-user-run"></i>
              <span>Logout</span>
            </a>
          </div>
        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="<?= base_url('assets/argon') ?>/img/brand/blue.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Navigation -->
        <ul class="navbar-nav">
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class=" nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin') ?>"> 
                <i class="ni ni-tv-2 text-primary"></i> Dashboard
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "perusahaan" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "perusahaan" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/perusahaan') ?>">
              <i class="fas fa-city text-blue"></i> Data perusahaan
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "pegawai" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "pegawai" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/pegawai') ?>">
              <i class="fas fa-users text-orange"></i> Data Pegawai
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "material" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "material" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/material') ?>">
            <i class="ni ni-app text-orange"></i> Data Material
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "merek" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "merek" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/merek') ?>">
            <i class="ni ni-app text-orange"></i> Data Merek
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "jasa" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "jasa" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/jasa') ?>">
            <i class="fas fa-toolbox text-orange"></i> Data Jasa
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "customer" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "customer" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/customer') ?>">
              <i class="fas fa-users text-orange"></i> Data Customer
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "verifikasi" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "verifikasi" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/verifikasi') ?>">
              <i class="fas fa-clipboard-list text-orange"></i> Data Verifikasi &nbsp;<?= (sizeof($data_verifikasi) > 0) ? '<p class="badge badge-danger">'.sizeof($data_verifikasi).'</p>':null; ?>
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "setting" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "admin" && $this->uri->segment(2) == "setting" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('admin/setting') ?>">
              <i class="ni ni-settings-gear-65 text-red"></i> Setting
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('admin/logout') ?>">
              <i class="fas fa-sign-out-alt text-red"></i> Logout
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
      </div>
    </div>
  </nav>