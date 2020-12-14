<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css')  ?>" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css') ?>">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <!-- <script type="text/javascript">
   
</script> -->

    <title>Riwaba.co</title>
</head>

<body>
    <!-- navbar header content -->
    <header class="col s12">
        <nav class="navbar-top nav-wrapper blue lighten-1" id="navbarTop">
            <a href="index.html" class="brand-logo">Berkah<span>Selalu</span></a>

            <ul class="right">
                <li class="center"><a href="<?= site_url('home/p') ?>">Home</a></li>
                <!-- <li class="center"><a href=""><?= $this->session->userdata['level_user'] ?></a></li> -->
                <li class="center"><a href="<?= site_url('akses/logout') ?>">Logout</a></li>
            </ul>
            <a href="#" class="menu-icon-container right fixed sidenav-trigger" data-target="mobile-demo"
                onclick="myFunction();">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </a>
        </nav>
        <ul class="sidenav left blue lighten-1" id="mobile-demo">
            <li>
                <a class="sidenav-close" href="#!"><i class="ma material-icons">close</i></a>
            </li>
            <!-- <li class=""><a href="/index.html">Home</a></li> -->
            <li class=""><a href="/index.html">Home</a></li>
            <li class=""><a href="/about.html">About</a></li>
        </ul>
    </header>
    <!-- end of navbar header  -->

    <!-- main content -->
    <main class="row">
        <div class="container ">

            <form action="<?php echo base_url('home/send_transaction') ?>" method="post" class="col s12">
                <div class="card">
                    <div class="card-content">
                        <span>
                            <div class="card-title center">
                                <h4>Pembelian Berhasil, Harap siapkan Uang pembayaranya</h4>
                            </div>
                        </span>
                        <div class="row">
                            <div class="input-field col s6">
                                <input placeholder="username" id="username" type="text" class="validate"
                                    value="<?php echo $user['username'] ?>" disabled>
                                <label for="username" class="text-darken-4">Nama</label>
                                <input placeholder="id_user" id="id_user" name="id_user" type="text"
                                    value="<?php echo $user['id_user'] ?>" class="validate" hidden>
                            </div>
                            <div class="input-field col s6">
                                <input placeholder="address" id="address" type="text"
                                    value="<?php echo $user['address'] ?>" class="validate" disabled>
                                <label for="address">Alamat Pengiriman</label>
                            </div>
                        </div>
                        <div class="row">


                            <div class="input-field col s6">
                                <input placeholder="name_product" id="name_product" type="text"
                                    value="<?php echo $product['name_product'].' '.'Rp '.$product['selling_price'] ?>"
                                    class="validate" disabled>
                                <input placeholder="selling_price" id="selling_price" type="hidden"
                                    value="<?php echo $product['selling_price'] ?>" class="validate">
                                <input placeholder="id_product" name="id_product" id="id_product" type="hidden"
                                    value="<?php echo $product['id_product'] ?>" class="validate">

                                <label for="">Barang yang dibeli</label>
                            </div>

                            <div class="input-field col s6">
                                <input placeholder="masukan jumlah barang yang ingin dibeli" name="total_beli"
                                    id="total_beli" type="text" class="validate">
                                <label for="total_beli">Jumlah Barang</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 right  ">
                                <input placeholder="0" id="total_harga" name="total_harga" type="number"
                                    class="validate" readonly>
                                <label for="total_harga">Total Pembayaran</label>
                            </div>
                            <!-- <div class="input-field col s6">
          <input placeholder="bekasi" id="first_name" type="text" class="validate">
          <label for="first_name">Jumlah Barang</label>
        </div> -->
                        </div>
                        <div class="row">
                            <div class="input-field col s12 center-align">
                                <button type="submit" class="btn waves-effect darken-4 center-align"><span><i
                                            class="material-icons left">arrow_back</i> kembali ke halaman
                                        utama</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </main>
    <!-- end of main content -->

    <!-- footer content -->
    <footer class="page-footer blue lighten-1">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Berkah Selalu</h5>
                    <p class="grey-text text-lighten-4">
                        Kepuasan pelanggan prioritas kami
                    </p>
                </div>
            </div>
        </div>
        <div class="footer-copyright center">
            <div class="container">
                © 2020 Copyright berkah selalu
            </div>
        </div>
    </footer>
    <!-- end of footer -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script src="<?= base_url('assets/js/app.js') ?>" type="module"></script>
    <script>
    //animation for hamburger icon
    function myFunction(x) {
        x.classList.toggle('change');
    }
    $(document).ready(function() {
        $('#total_beli, #selling_price').keyup(function() {
            var selling_price = $('#selling_price').val();
            var total_beli = $('#total_beli').val();

            var total_harga = parseInt(selling_price) * parseInt(total_beli);
            // $('#total_harga').val(total_harga) ;
            if (!isNaN(total_harga)) {
                document.getElementById('total_harga').value = total_harga.toFixed(0);
            }
        });
    });
    </script>

</body>

</html>