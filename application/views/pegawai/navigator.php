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
                <img alt="Image placeholder" src="<?= base_url('assets/argon') ?>/img/perusahaan/<?= $data_perusahaan['logo_perusahaan'] ?>
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
          <li class="nav-item <?= ($this->uri->segment(1)) == "pegawai" && $this->uri->segment(2) == "" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class=" nav-link <?= ($this->uri->segment(1)) == "pegawai" && $this->uri->segment(2) == "" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('pegawai') ?>"> 
                <i class="ni ni-tv-2 text-orange"></i> Dashboard
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "pegawai" && $this->uri->segment(2) == "tugas" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "pegawai" && $this->uri->segment(2) == "tugas" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('pegawai/tugas') ?>">
              <i class="fas fa-briefcase text-orange"></i> Tugas
            </a>
          </li>
          <li class="nav-item <?= ($this->uri->segment(1)) == "pegawai" && $this->uri->segment(2) == "setting" && $this->uri->segment(3) == "" ? "active":"" ?>">
            <a class="nav-link <?= ($this->uri->segment(1)) == "pegawai" && $this->uri->segment(2) == "setting" && $this->uri->segment(3) == "" ? "active":"" ?>" href="<?= base_url('pegawai/setting') ?>">
              <i class="ni ni-settings-gear-65 text-orange"></i> Setting
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url('auth/logout') ?>">
              <i class="ni ni-user-run text-orange"></i> Logout
            </a>
          </li>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
      </div>
    </div>
  </nav>