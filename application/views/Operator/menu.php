      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?=site_url('operator')?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Data Warga
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?=site_url('operator/warga')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Warga</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Data Jimpitan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=site_url('operator/jimpitan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jimpitan Hari ini</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('operator/list_jimpitan')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Jimpitan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('operator/jimpitan_perhari')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Jimpitan perhari</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('operator/formj/add')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Input jimpitan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=site_url('operator/jadwal')?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Jadwal Ronda
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="<?=site_url('operator/absensi')?>" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
               Data Absensi
              </p>
            </a>
    </li>
    <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"></i>
              <p>
                Cetak Laporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?=site_url('wargapdf')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data Warga</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('jimpitanpdf')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Jimpitan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=site_url('rekap_absensipdf')?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Laporan Data Absensi</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>