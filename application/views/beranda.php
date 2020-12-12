<?php 
    if (empty($this->session->userdata['level_user'])) {
        redirect(site_url('akses/'));
    }else{
        if ($this->session->userdata['level_user'] == "owner") {
            $master = "hidden";
            $menu_dashboard = "";
            $menu_manajemen_user = "";
            $menu_produk = "";
            $menu_penjualan = "";
            $menu_laporan = "";
        }else if($this->session->userdata['level_user'] == "karyawan"){
            $master = "";
            $menu_dashboard = "";
            $menu_manajemen_user = "hidden";
            $menu_produk = "";
            $menu_penjualan = "";
            $menu_laporan = "";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="<?= base_url('assets/node_modules/materialize-css/dist/css/materialize.min.css') ?>"
    />
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>" />

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <title><?= $title; ?></title>
  </head>

  <body>
    <!-- header -->
    <div class="navbar-fixed">
      <nav>
        <div class="nav-wrapper blue accent-1">
          <a class="brand-logo" style="margin-left: 20px;">
            Admin <span class="black-text lighten-2"> Manajer</span>
          </a>

          <ul class="right hide-on-med-and-down">
            <!-- Dropdown Trigger -->
            <li>
              <a class="dropdown-trigger" href="#!" data-target="dropdown1">
                <i class="material-icons left">person</i><?= $this->session->userdata['level_user'] ?><i
                  class="material-icons right"
                  >arrow_drop_down</i
                ></a
              >
            </li>
          </ul>
        </div>
      </nav>
      <ul id="dropdown1" class="dropdown-content rounded">
        <li class="divider"></li>
        <li><a href="#modal2" class="modal-trigger">Logout</a></li>
      </ul>
    </div>
    <!-- end of header -->
    <!-- modal logout -->

    <div id="modal2" class="modal">
      <div class="modal-content">
        <p>apa anda ingin Logout?</p>
      </div>
      <div class="modal-footer">
        <a
          href="<?= site_url('akses/logout') ?>"
          class="modal-close waves-effect waves-green btn-flat green lighten-2"
          >YA</a
        >
        <a href="#!" class="modal-close waves-effect waves-green btn-flat red"
          >Tidak</a
        >
      </div>
    </div>
    <!-- end of modal logout -->

    <!-- sidebar container -->
    <div class="navigation blue accent-2" id="sidebarList">
      
      <ul>
        <li <?= $menu_dashboard; ?> <?= $this->uri->segment(1) == 'beranda' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('beranda/p') ?>">
            <span class="material-icons icon">dashboard</span>
            <span class="title">Dashboard</span>
          </a>
        </li>

        <li <?= $menu_manajemen_user; ?> <?= $this->uri->segment(1) == 'user' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('user/p') ?>">
            <span class="material-icons icon">person</span>
            <span class="title">Manajemen User</span>
            <span class="material-icons">keyboard_arrow_down</span>
          </a>
          <ul id="demo">
          <li>
              <a href="<?= site_url('user/p') ?>">
                <span class="material-icons sub-icon">person_add</span
                >Karyawan</a
              >
            </li>
            <li>
              <a href="<?= site_url('konsumen/p') ?>">
                <span class="material-icons sub-icon">person_add</span
                >Konsumen</a
              >
            </li>
          </ul>
        </li>
        <li <?= $menu_produk; ?> <?= $this->uri->segment(1) == 'produk' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('produk/p') ?>">
            <span class="material-icons icon">shopping_cart</span>
            <span class="title">Produk</span>
          </a>
        </li>
        <li <?= $menu_penjualan; ?> <?= $this->uri->segment(1) == 'penjualan' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('penjualan/p') ?>">
            <span class="material-icons icon">shopping_cart</span>
            <span class="title">Penjualan</span>
          </a>
        </li>
        <li <?= $menu_laporan; ?> <?= $this->uri->segment(1) == 'laporan' || $this->uri->segment(1) == '' ? 'class="active"' : '' ?>>
          <a href="<?= site_url('laporan/p') ?>">
            <span class="material-icons icon">library_books</span>
            <span class="title">Laporan</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- end of sidebar Container -->

    <!-- main content -->
    <!-- Content -->
    <section class="content">
        <div class="container-fluid">
            <?php include $folder."/".$p.".php"; ?>
        </div>
    </section>
    <!-- #END# Content -->
    <script src="<?= base_url('assets/laporan/plugins/jquery/jquery.min.js'); ?>"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="http://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

    <script src="<?= base_url('assets/js/app.js') ?>" type="module"></script>
    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
    <script type="text/javascript">
        function cetak(div) {
            var b = document.getElementById(div).innerHTML;
            window.frames["print_frame"].document.title = document.title;
            window.frames["print_frame"].document.body.innerHTML = b;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>
    <script>
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
  </body>
</html>
