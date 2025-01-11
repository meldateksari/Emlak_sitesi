<aside style="background-color:black" class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Emlak Sitesi</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Emlak Danışmanı </a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


             <li class="nav-item">
               <a href="index.php" class="nav-link">
                 <i style="color:white" class="nav-icon fas fa-th"></i>
                 <p>
                   Anasayfa
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="kategori.php" class="nav-link">
                 <i class="fa fa-folder-open"></i>
                 <p>
                   Kategoriler
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="danismanlar.php" class="nav-link">
                 <i class="fa fa-users"></i>
                 <p>
                   Danışmanlar
                 </p>
               </a>
             </li>

        <li class="nav-item <?php echo ($_SERVER['REQUEST_URI'] == '/yazilim/emlaksitesi/Admin/ayarlar.php') ? 'menu-open' : ''; ?> ">
          <a href="#" class="nav-link <?php echo ($_SERVER['REQUEST_URI'] == '/yazilim/emlaksitesi/Admin/ayarlar.php') ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Site Bilgileri
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="ayarlar.php" class="nav-link ">
                <i class="fa fa-cog"></i>
                <p>Site Ayarları</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="hakkimizda.php" class="nav-link">
                <i class="fa fa-address-card"></i>
                <p>Hakkımızda</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item">
          <a href="cikis" class="nav-link">
            <i class="fa fa-sign-out-alt"></i>
            <p>
              Çıkış Yap
            </p>
          </a>
        </li>



      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
