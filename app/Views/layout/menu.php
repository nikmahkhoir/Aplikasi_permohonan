<!-- Start of Selection -->
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: linear-gradient(to bottom, #006A67, #009E9A);">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/bpkad.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> <!-- fotony logonya belum tau -->
      <span class="brand-text font-weight-light">&nbsp;</span> 
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/assets/dist/img/user.jpg" class="img-circle elevation-2" alt="User Image"> <!-- blm tau gambarnya apa -->
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo strtoupper(session('level')) ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <!-- <li class="nav-item">
            <a href="/pemohon" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Permohonan</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a href="/pemohon_baru" class="nav-link">
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>Pemohon Baru</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/persetujuan" class="nav-link">
              <i class="nav-icon fas fa-clipboard-check"></i>
              <p>Persetujuan</p>
            </a>
          </li>

          <?php
          if (session('level')=='asn') {
         
          ?>
          <li class="nav-item">
            <a href="/keluarga/<?php echo session('id_asn') ?>" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>Keluarga</p>
            </a>
          </li>
          <?php
          }
          ?>

          <!-- <li class="nav-item">
            <a href="/status" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>Status</p>
            </a>
          </li> -->
          <?php
          if (session('level')=='admin') {
         
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Data Master<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/alamatrumahdinas" class="nav-link">
                <i class="nav-icon fa fa-map"></i>
                  <p>Alamat Rumah Dinas</p>
                </a>
              </li>
       
              <li class="nav-item">
                <a href="/instansipencatatan" class="nav-link">
                <i class="nav-icon fa fa-building"></i>
                  <p>Instansi Pencatatan Rumah Dinas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/instansipemohon" class="nav-link">
                <i class="nav-icon fa fa-building"></i>
                  <p>Instansi Pemohon</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/golonganpangkat" class="nav-link">
                <i class="nav-icon fa fa-database"></i>
                  <p>Golongan Pangkat</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/golonganrumahdinas" class="nav-link">
                <i class="nav-icon fa fa-home"></i>
                  <p>Golongan Rumah Dinas</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/skpd" class="nav-link">
                <i class="nav-icon fa fa-building"></i>
                  <p>SKPD</p>
                </a>
              </li>
            </ul>
          </li>

          <?php
          }
          if (session('level')=='admin') {
         
          ?>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>Pengguna<i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
            
            <li class="nav-item">
                <a href="/asn" class="nav-link">
                  <i class="nav-icon fa fa-user"></i>
                  <p>ASN</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="/approver" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                  <p>Approver</p>
                </a>
              </li>
              <!-- <li class="nav-item">
                <a href="/admin" class="nav-link">
              
                  <p>Akun Admin</p>
                </a>
              </li> -->
            </ul>
          </li>
          <?php 
          }
          ?>
          <li class="nav-item">
            <a href="/logout" class="nav-link">
              <i class="nav-icon fa fa-power-off"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>