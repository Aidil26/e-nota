<?php
$controller = $this->router->fetch_class();
$level = $this->session->userdata('ap_level');
?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
      
      <!-- sidebar menu-->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header nav-small-cap">Trans</li>
        <?php if($level == 'admin' OR $level == 'keuangan' OR $level == 'kasir') { ?>
        <li class="treeview active<?php if($controller == 'penjualan') { echo 'active'; } ?>">
          <a href="#"><i class='fa fa-shopping-cart fa-fw'></i><span>Transaksi</span>
            <span class="pull-right-container"><i class="fa fa-angle-right pull-right"></i></span></a>
          <ul class="treeview-menu">
            <?php if($level !== 'keuangan'){ ?>
            <li ><a href="<?php echo site_url('penjualan/transaksi'); ?>">Transaksi Penjualan</a></li>
            <?php } ?>
            <li><a href="<?php echo site_url('penjualan/history'); ?>">Riwayat Penjualan</a></li>
            <li><a href="<?php echo site_url('penjualan/pelanggan'); ?>">Data Pelanggan</a></li>
          </ul>
        </li>
        <?php } ?>


        <li class="nav-devider"></li>
        <li class="header nav-small-cap">Product</li>
        <li class="treeview nav-small-cap <?php if($controller == 'barang') { echo 'active'; } ?>">
          <a href="#"><i class='fa fa-cube fa-fw'></i> Item Barang<span class="pull-right-container"></span><i class="fa fa-angle-right pull-right"></i></a>
          <ul class="treeview-menu">
            <li><a href="<?php echo site_url('barang'); ?>">Semua Barang</a></li>
            <li><a href="<?php echo site_url('barang/list-merek'); ?>">List Merek</a></li>
            <li><a href="<?php echo site_url('barang/list-kategori'); ?>">List Kategori</a></li>
          </ul>
        </li>

        <li class="nav-devider"></li>
        <?php if($level == 'admin' OR $level == 'keuangan') { ?>
        <li <?php if($controller == 'laporan') { echo "class='active'"; } ?>><a href="<?php echo site_url('laporan'); ?>"><i class='fa fa-file-text-o fa-fw'></i> Laporan</a></li>
        <?php } ?>

        <?php if($level == 'admin') { ?>
        <li <?php if($controller == 'user') { echo "class='active'"; } ?>><a href="<?php echo site_url('user'); ?>"><i class='fa fa-users fa-fw'></i> List User</a></li>
        <?php } ?>



		
      </ul>
    </section>
  </aside>
    <div class="control-sidebar-bg"></div>
  